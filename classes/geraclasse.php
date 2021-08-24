<?php
require_once('variavelglobal.php');
require_once($DiretorioInclude.'includes.php');

$tabela					= $_GET['tabela'];
$ArrTabela				= SelecionaBanco('SHOW COLUMNS FROM ' . $tabela);
$Arquivo				= fopen("cls" . $tabela . ".php", "w+");
$quebra					= chr(13).chr(10);

fwrite($Arquivo, '<?php' . $quebra);
fwrite($Arquivo, "class $tabela {" . $quebra . $quebra);

if(is_array($ArrTabela)){
	foreach($ArrTabela as $campos){
		fwrite($Arquivo, 'var $' . $campos['Field'] . ';' . $quebra);
	}
}

fwrite($Arquivo, $quebra . 'function Insere(){' . $quebra);
fwrite($Arquivo, '$Sql  = "insert into ' . $tabela);

if(is_array($ArrTabela)){
	fwrite($Arquivo, '(');
	$compfields			= '';

	foreach($ArrTabela as $campos){
		fwrite($Arquivo, $compfields . $campos['Field']);
		$compfields		= ', ';
		
		if(strtolower($campos['Key']) == 'pri')
			$idtabela		= $campos['Field'];
	}
	
	fwrite($Arquivo, ') VALUES (";' . $quebra);
	$compfields			= ' . ", "';
	
	foreach($ArrTabela as $key => $campos){
		$tipo			= '';
		
		if(strtolower(substr($campos['Type'], 0, 3)) == 'var')
			$tipo		= 1;
		else if(strtolower(substr($campos['Type'], 0, 3)) == 'int')
			$tipo		= 2;
		else if(strtolower(substr($campos['Type'], 0, 3)) == 'dat')
			$tipo		= 3;
		else if(strtolower(substr($campos['Type'], 0, 3)) == 'lon')
			$tipo		= 1;
		
		
		fwrite($Arquivo, '$Sql .= FormataCampoBanco($this->' . $campos['Field'] . ', ' . $tipo . ', 1)' . $compfields . ';' . $quebra);
		
		if(($key + 2) < ContaTotal($ArrTabela))
			$compfields		= ' . ", "';
		else
			$compfields		= ''; 
	}
	
	fwrite($Arquivo, '$Sql .= ") ON DUPLICATE KEY UPDATE ');
	
	$compfields			= ''; 
	
	foreach($ArrTabela as $campos){
		fwrite($Arquivo, $compfields . $campos['Field'] . ' = values(' . $campos['Field'] . ')');
		$compfields		= ', ';
	}
	
	fwrite($Arquivo, '";' . $quebra);
	fwrite($Arquivo, '$this->' . $idtabela . '	= InsereBanco($Sql);' . $quebra);
	fwrite($Arquivo, '}' . $quebra . $quebra);
	
	/*-------------------- AQUI EU COMEÇO A GERAÇÃO DA FUNÇÃO SELECIONA*/
	
	fwrite($Arquivo, 'function Seleciona(){' . $quebra);
	fwrite($Arquivo, '$Sql  = "select * from ' . $tabela . ' where ' . $idtabela . ' = " . $this->' . $idtabela . ';' . $quebra);
	fwrite($Arquivo, '$ArrSql = SelecionaBanco($Sql);' . $quebra);
	fwrite($Arquivo, 'if(is_array($ArrSql[0]))' . $quebra);
	fwrite($Arquivo, 'foreach($ArrSql[0] as $key => $value)' . $quebra);
	fwrite($Arquivo, '$this->$key							= $value;' . $quebra);
	fwrite($Arquivo, '}' . $quebra . $quebra);
	
	/*-------------------- AQUI EU COMEÇO A GERAÇÃO DA FUNÇÃO EXCLUIR*/
	
	fwrite($Arquivo, 'function Excluir(){' . $quebra);
	fwrite($Arquivo, '$Sql 	= " delete from ' . $tabela . ' where ' . $idtabela . ' = " . $this->' . $idtabela . ';' . $quebra);
	fwrite($Arquivo, '$ArrSql = DeletaBanco($Sql);' . $quebra);
	fwrite($Arquivo, 'if($ArrSql)' . $quebra);
	fwrite($Arquivo, 'return true;' . $quebra);
	fwrite($Arquivo, 'else ' . $quebra);
	fwrite($Arquivo, 'return false; ' . $quebra);
	fwrite($Arquivo, '} ' . $quebra);
	fwrite($Arquivo, '} ' . $quebra);
	fwrite($Arquivo, '?> ' . $quebra);
}


fclose($Arquivo);
?>
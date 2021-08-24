<?php
class imagens {

var $idimagem;
var $arquivo;
var $arquivonome;
var $datacadastro;
var $dataultimaatualizacao;

function Insere(){
$Sql  = "insert into imagens(idimagem, arquivo, arquivonome, datacadastro, dataultimaatualizacao) VALUES (";
$Sql .= FormataCampoBanco($this->idimagem, 2, 1) . ", ";
$Sql .= FormataCampoBanco($this->arquivo, 1, 1) . ", ";
$Sql .= FormataCampoBanco($this->arquivonome, 1, 1) . ", ";
$Sql .= FormataCampoBanco($this->datacadastro, 3, 1) . ", ";
$Sql .= FormataCampoBanco($this->dataultimaatualizacao, 3, 1);
$Sql .= ") ON DUPLICATE KEY UPDATE idimagem = values(idimagem), arquivo = values(arquivo), arquivonome = values(arquivonome), datacadastro = values(datacadastro), dataultimaatualizacao = values(dataultimaatualizacao)";
$this->idimagem	= InsereBanco($Sql);
}

function Seleciona(){
$Sql  = "select * from imagens where idimagem = " . $this->idimagem;
$ArrSql = SelecionaBanco($Sql);
if(is_array($ArrSql[0]))
foreach($ArrSql[0] as $key => $value)
$this->$key							= $value;
}

function Excluir(){
$Sql 	= " delete from imagens where idimagem = " . $this->idimagem;
$ArrSql = DeletaBanco($Sql);
if($ArrSql)
return true;
else 
return false; 
} 
} 
?> 

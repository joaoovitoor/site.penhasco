<?php
	function FormataDataBanco($Data, $ComAspas = 1)
	{
		if ($Data != '')
		{
			if ($ComAspas == 1)
				return "'" . RetiraAnoPag($Data) . '-' . RetiraMesPag($Data) . '-' . RetiraDiaPag($Data) . "'";
			else 
               	return RetiraAnoPag($Data) . '-' . RetiraMesPag($Data) . '-' . RetiraDiaPag($Data);
		}
		else
			return null;
	}

	//Esta funcao recebe a data de duas formas: separada ou inteira e devolve formatada para a pagina 
	//A Separada dever? ser assim d , m , aaaa , 1  ( O tipo deve ser 1)
	//A junta s? passar a data  no primeiro parametro no seguinte formato aaaa-mm-dd (O tipo deve ser 0)
	function FormataDataPagina($Val1, $Val2 = 0, $Val3 = 0, $Tipo = 0)
	{
		if ($Tipo == 0)
			if ($Val1 != '')
	                	return  substr($Val1, 8, 2) . "/" .  substr($Val1, 5, 2) . "/" .  substr($Val1, 0, 4);
			else
				return "";
		else
			if ($Val1 != '' && $Val2 != '' && $Val3 != '')
		                return  substr("0" . $Val1, -2, 2) . "/" .  substr("0" . $Val2, -2, 2) . "/" .  $Val3;
			else
				return "";
			

	}

	//Formato que deve ser recebido aaaa-mm-dd hh:mm:ss
	function FormataDataHoraPagina($DataHora)
	{
		if ($DataHora != '')
			return substr($DataHora, 8, 2) . "/" .  substr($DataHora, 5, 2) . "/" .  substr($DataHora, 0, 4) . " " .  substr($DataHora, 11, 2) . ":" . substr($DataHora, 14, 2) . ":" . substr($DataHora, 17, 2);
		else 
			return "";
	
	}

	//Retira Hora inteira da Data
	function RetiraHoraInteiraPag($Data)
	{
		return substr($Data, 11, 8);
	}

	//Retira Data inteira da Data 
	function RetiraDataInteiraPag($Data)
	{
		return substr($Data, 0, 10);
	}

	// Formato que deve ser recebido dd/mm/aaaa
	function RetiraDiaPag($Data)
	{
		return substr($Data, 0, 2);
	}
	

	// Formato que deve ser recebido dd/mm/aaaa
	function RetiraMesPag($Data)
	{
		return substr($Data, 3, 2);
	}

	// Formato que deve ser recebido dd/mm/aaaa
	function RetiraAnoPag($Data)
	{
		return substr($Data, 6, 4);
	}

	// Formato que deve ser recebido hh:mm:ss
	function RetiraHoraPag($Hora)
	{
		return substr($Hora, 0, 2);
	}

	// Formato que deve ser recebido hh:mm:ss
	function RetiraMinutoPag($Hora)
	{
		return substr($Hora, 3, 2);
	}

	// Formato que deve ser recebido hh:mm:ss
	function RetiraSegundoPag($Hora)
	{
		return substr($Hora, 6, 2);
	}

	function FormataMoeda($Valor)
	{
		if($Valor != '')
			return number_format($Valor, 2, ',', '.');
		else
			return 0;
	}

	function FormataMoedaGrafico($Valor)
	{
		if($Valor != '')
			return $Valor;
		else
			return 0;
	}

	function FormataMoedaDolar($Valor)
	{
		if($Valor != '')
			return number_format($Valor, 4, ',', '.');
	}
	
	function FormataMoedaBanco($Valor)
	{
		$Valor			= str_replace('R$', '', $Valor);
		$Valor			= str_replace(':', '', $Valor);
		
		return str_replace(',', '.', str_replace('.', '', $Valor));
	}

	function FormataMoedaSemDecimal($Valor)
	{
    	return number_format($Valor, 0, ',', '.');	
	}

	function FormataCNPJCPF($Valor)
	{
		if (($Valor != '') && ($Valor != 0))
		{
			if (strlen(trim($Valor)) == 11)
			{
				$Valor = strrev($Valor);
				$ValorFormatado = substr($Valor, 0, 2) . '-' . substr($Valor, 2, 3) . '.' . substr($Valor, 5, 3) . '.' . substr($Valor, 8, 3) ;				
				$ValorFormatado = strrev($ValorFormatado);
			}
			else 
			{
				$Valor = strrev($Valor);
				$ValorFormatado = substr($Valor, 0, 2) . '-' . substr($Valor, 2, 4) . '/' . substr($Valor, 6, 3) . '.' . substr($Valor, 9, 3). '.' . substr($Valor, 12, 2) ;								
				$ValorFormatado = strrev($ValorFormatado);
			}		
		}
		return trim($ValorFormatado);		
	}

	function FormataTelefone($Valor)
	{
		if (($Valor != '') && ($Valor != 0))
		{		
			if ((strlen(trim($Valor)) <= 8) && (strlen(trim($Valor)) >= 5))
			{
				$Valor = strrev($Valor);
				$ValorFormatado = substr($Valor, 0, 4) . '-' . substr($Valor, 4, 4);				
				$ValorFormatado = strrev($ValorFormatado);
			}
			elseif (strlen(trim($Valor)) == 9)
			{
				$Valor = strrev($Valor);
				$ValorFormatado = substr($Valor, 0, 4) . '-' . substr($Valor, 4, 3) . ' )' . substr($Valor, 7, 4) . '(';
				$ValorFormatado = strrev($ValorFormatado);
			}		
			elseif (strlen(trim($Valor)) > 9)
			{
				$Valor = strrev($Valor);
				$ValorFormatado = substr($Valor, 0, 4) . '-' . substr($Valor, 4, 4) . ' )' . substr($Valor, 8, 4) . '(';
				$ValorFormatado = strrev($ValorFormatado);
			}		
			else 
				$ValorFormatado = $Valor;
		}
		return trim($ValorFormatado);		
	}
	
	function FormataCep($Valor)
	{
		if (($Valor != '') && ($Valor != 0))
		{		
			if (strlen(trim($Valor)) >= 6)
				$ValorFormatado = substr($Valor, 0, 5) . '-' . substr($Valor, 5, 3);				
			else 
				$ValorFormatado = $Valor;
		}
		return trim($ValorFormatado);		
	}
	
	
	// Funcao para contar os dia, ela recebe as datas no formata yyyymmdd
	function ContaDia($start, $end)
	{
		if( $start != '0000-00-00' and $end != '0000-00-00' )
		{
		       $timestamp_start = strtotime($start);
		       $timestamp_end = strtotime($end);
		       if( $timestamp_start >= $timestamp_end ) return 0;
			       $start_year = date("Y",$timestamp_start);
		       $end_year = date("Y", $timestamp_end);
		       $num_days_start = date("z",strtotime($start));
		       $num_days_end = date("z", strtotime($end));
		       $num_days = 0;
		       $i = 0;
		       if( $end_year > $start_year )
       		       {
		       		while( $i < ( $end_year - $start_year ) )
          			{
			        	$num_days = $num_days + date("z", strtotime(($start_year + $i)."-12-31"));
			                $i++;
          			}
        	       }
		       return ( $num_days_end + $num_days ) - $num_days_start;
   		}
		else
		{
			return 0;
    		}
	}

	// o Formato da data deve ser yyy/mm/dd h:m:s   e o unit deve ser "Y" ou "m" ou "d" ou "H", "i", "s"
	function dateadd($datestr, $num, $unit) 
	{
       		$units = array("Y","m","d","H","i","s");
	       	$unix = strtotime($datestr);
	       	while(list(,$u) = each($units)) $$u = date($u, $unix);
	       		$$unit += $num;
	
       		return date("d/m/Y", mktime($H, $i, $s, $m, $d, $Y));
	}
	// o Formato da data deve ser yyyy/mm/dd h:m:s   e o unit deve ser "Y" ou "m" ou "d" ou "H", "i", "s"
	function dateaddhora($datestr, $num, $unit) 
	{
       		$units = array("Y","m","d","H","i","s");
	       	$unix = strtotime($datestr);
	       	while(list(,$u) = each($units)) $$u = date($u, $unix);
	       		$$unit += $num;
				
//	       	echo date("d/m/Y H:i:s", mktime($H, $i, $s, $m, $d, $Y)) . "<br>";
       		return date("d/m/Y H:i:s", mktime($H, $i, $s, $m, $d, $Y));
	}
	// o Formato da data deve ser yyy/mm/dd h:m:s   e o unit deve ser "Y" ou "m" ou "d" ou "H", "i", "s"
	function datesub($datestr, $num, $unit) 
	{
       		$units = array("Y","m","d","H","i","s");
	       	$unix = strtotime($datestr);
	       	while(list(,$u) = each($units)) $$u = date($u, $unix);
	       		$$unit -= $num;
	
       		return date("d/m/Y", mktime($H, $i, $s, $m, $d, $Y));
	}
	
	// Retorna o Mes mes numerico
	function RetornaMes($mes)
	{
		if ($mes == 1)	
			$Retorno = 'Janeiro';
		elseif ($mes == 2)	
			$Retorno = 'Fevereiro';
		elseif ($mes == 3)	
			$Retorno = 'Mar�o';				
		elseif ($mes == 4)	
			$Retorno = 'Abril';				
		elseif ($mes == 5)	
			$Retorno = 'Maio';				
		elseif ($mes == 6)	
			$Retorno = 'Junho';								
		elseif ($mes == 7)	
			$Retorno = 'Julho';								
		elseif ($mes == 8)	
			$Retorno = 'Agosto';								
		elseif ($mes == 9)	
			$Retorno = 'Setembro';								
		elseif ($mes == 10)	
			$Retorno = 'Outubro';								
		elseif ($mes == 11)	
			$Retorno = 'Novembro';								
		elseif ($mes == 12)	
			$Retorno = 'Dezembro';								

		return $Retorno;
	}		
	
	
	// Retorna em numero ou Escrito o Dia da Semana pelo parametros TipoRetorno  1 = Numero e 2 = Escrito 
	// O formato da data passada deve ser dd/mm/aaaa
	function RetornaDiaSemana($Data, $TipoRetorno)
	{
		$ValorDia = date("w", mktime(0,0,0,RetiraMesPag($Data),RetiraDiaPag($Data), RetiraAnoPag($Data)));	
		if ($TipoRetorno == 1)
		{
			$Retorno = $ValorDia;
		}
		elseif ($TipoRetorno == 2)
		{
			if ($ValorDia == 0)	
				$Retorno = 'Domingo';
			elseif ($ValorDia == 1)	
				$Retorno = 'Segunda-Feira';
			elseif ($ValorDia == 2)	
				$Retorno = 'Ter?a-Feira';				
			elseif ($ValorDia == 3)	 
				$Retorno = 'Quarta-Feira';				
			elseif ($ValorDia == 4)	
				$Retorno = 'Quinta-Feira';				
			elseif ($ValorDia == 5)	
				$Retorno = 'Sexta-Feira';								
			elseif ($ValorDia == 6)	
				$Retorno = 'S?bado';								
		}

		return $Retorno;
	}		
		
	// Tipo 1 = String
	// Tipo 2 = Numero
	// Tipo 3 = Data ou Hora
	// AceitaNulo = 1
	// NaoAceitaNulo = 0
	// Muda Apostrofe por Acento Agudo = $AltApos
	function FormataCampoBanco($Valor, $Tipo, $AceitaNulo, $AltApos = 1)
	{
		$Aspas = "'";
		
		// String
		if ($Tipo == 1 )
		{
			// Aceita Nulo
			if ($AceitaNulo == 1)
			{
				if ($Valor == '')
					return 'null';
				elseif ($AltApos == 1)
					return $Aspas . addslashes(stripslashes(trim(str_replace("'","?",str_replace('"', "?", $Valor))))) . $Aspas;
				else 
					return $Aspas . addslashes(stripslashes(trim($Valor))) . $Aspas;	

			}
			// Nao Aceita Nulo
			else
				if ($AltApos == 1)
				return $Aspas . addslashes(stripslashes(trim(str_replace("'","?",str_replace('"', "?", $Valor))))) . $Aspas;
				else 
				return $Aspas . addslashes(stripslashes(trim($Valor))) . $Aspas;
		}
		// Numero
		else if ($Tipo == 2)
		{
			// Aceita Nulo
			if ($AceitaNulo == 1)
			{
				if ($Valor == '')
					return 'null';
				else
					return trim($Valor);

			}
			// Nao Aceita Nulo
			else
				return trim($Valor);			

		}
		// Data ou Hora
		else if ($Tipo == 3)
		{
			// Aceita Nulo
			if ($AceitaNulo == 1)
			{
				if ($Valor == '')
					return 'null';
				else
					return $Aspas . trim($Valor) . $Aspas;

			}
			// Nao Aceita Nulo
			else
				return $Aspas . trim($Valor) . $Aspas;
		}
	}

	function ExtensaoArquivo($NomeInput){
		$NomeArquivo			= $_FILES[$NomeInput]['name'];
		$ArrNomeArquivo			= explode(".", $NomeArquivo);
		$SomenteNome			= array_reverse($ArrNomeArquivo);
		$ExtensaoNomeArquivo	= strtolower($SomenteNome[0]);	
		
		return $ExtensaoNomeArquivo;
	}

	
	// Faz upload de arquivos e Valida o Tipo 1 = Imagens(gif, jpg, jpeg)
	// O NomeCopiar deve ser passado sem extens?o 
	function Upload($NomeInput, $NomeCopiar, $CaminhoSalvar, $Extensao, $TipoValidar){
		$NomeArquivo = $_FILES[$NomeInput]['name'];
		if (is_uploaded_file($_FILES[$NomeInput]['tmp_name'])){
			if ($TipoValidar == 1){
				if($Extensao != "gif" && $Extensao != "jpg" && $Extensao != "jpeg" && $Extensao != "png")
					$Retorno = 'formato invalido';
			}
		
			if ($Retorno != 'formato invalido'){
				$NomeArquivo = $NomeCopiar . '.' . $Extensao;				
		  		move_uploaded_file($_FILES[$NomeInput]['tmp_name'], $CaminhoSalvar . $NomeArquivo);
		  		$Retorno = $NomeArquivo;
			}
			
		} else{
			$Retorno = false;
		}
		return $Retorno;
    }
    
	// Funcao para listar o conteudo do diretorio e devolve um array com os nomes
	function ListaConteudoDiretorio($Diretorio){
		$ponteiro  = opendir($Diretorio);
		if ($ponteiro){
			while ($nome_itens = readdir($ponteiro)) { // monta o vetor com os itens da pasta
		    	$itens[] = $nome_itens;
			}
			sort($itens);
		}
		return $itens;		
	}
	
	function ExtensaoArquivoSimples($Nome){
		$ArrNomeArquivo 		= explode(".", $Nome);
		$SomenteNome			= array_reverse($ArrNomeArquivo);
		$ExtensaoNomeArquivo 	= strtolower($SomenteNome[0]);	
		return $ExtensaoNomeArquivo;
	}	
	
	// Funcao para Retornar o tipo do Arquivo
    function TipoArquivo($NomeArquivo) {
		if (!function_exists('mime_content_type')) 
		{
			function mime_content_type($f) 
			{
				$f = escapeshellarg($f);
				return trim( `file -bi $f` );
			}
		}
		
		$ArrNomeArquivo = explode( ".", $NomeArquivo);
		$ExtensaoNomeArquivo = strtolower($ArrNomeArquivo[1]);	                   		
		
	   	if ($ExtensaoNomeArquivo == 'asf') 
	   		$ContentType = "video/x-ms-asf";
	   	else if ($ExtensaoNomeArquivo == 'avi')
	   		$ContentType = "video/avi";
	   	else if ($ExtensaoNomeArquivo == 'doc')
	   		$ContentType = "application/msword";
	   	else if ($ExtensaoNomeArquivo == 'zip')
	   		$ContentType = "application/zip";
	   	else if ($ExtensaoNomeArquivo == 'xls')
	   		$ContentType = "application/vnd.ms-excel";
	   	else if ($ExtensaoNomeArquivo == 'gif')
	   		$ContentType = "image/gif";
	   	else if ($ExtensaoNomeArquivo == 'jpg' || $ExtensaoNomeArquivo == 'jpeg')
	   		$ContentType = "image/jpeg";
	   	else if ($ExtensaoNomeArquivo == 'wav')
	   		$ContentType = "audio/wav";
	   	else if ($ExtensaoNomeArquivo == 'mp3')
	   		$ContentType = "audio/mpeg3";
	   	else if ($ExtensaoNomeArquivo == 'mpg' || $ExtensaoNomeArquivo == 'mpeg')
	   		$ContentType = "video/mpeg";
	   	else if ($ExtensaoNomeArquivo == 'rtf')
	   		$ContentType = "application/rtf";
	   	else if ($ExtensaoNomeArquivo == 'htm' || $ExtensaoNomeArquivo == 'html')
	   		$ContentType = "text/html";
	   	else if ($ExtensaoNomeArquivo == 'xml') 
	   		$ContentType = "text/xml";
	   	else if ($ExtensaoNomeArquivo == 'xsl') 
	   		$ContentType = "text/xsl";
	   	else if ($ExtensaoNomeArquivo == 'css') 
	   		$ContentType = "text/css";
	   	else if ($ExtensaoNomeArquivo == 'php') 
	   		$ContentType = "text/php";
	   	else if ($ExtensaoNomeArquivo == 'asp') 
	   		$ContentType = "text/asp";
	   	else if ($ExtensaoNomeArquivo == 'pdf')
	   		$ContentType = "application/pdf";
		else 
			$ContentType = mime_content_type($NomeArquivo);
	 
		return $ContentType;
	}
	
	function RecebeParametro($NomeParametro){
		$Valor		= $_POST[$NomeParametro];
		
		if(empty($Valor))
			$Valor	= $_GET[$NomeParametro];
			
		return $Valor;
	}
	

function GeraURL()
{
        $numargs = func_num_args();
        $arg_list = func_get_args();

        $URL = $arg_list[0];

        if ( $numargs > 1 )
        {
                for ( $i = 1 ; $i < $numargs ; $i += 2 )
                {
                        if ( isset($arg_list[$i+1]) AND $arg_list[$i+1] != "" )
                        {
                                if ( strrchr ($URL, "?") )
                                        $URL .= "&";
                                else
                                        $URL .= "?";

                                $URL .= urlencode($arg_list[$i]) . "=" . urlencode($arg_list[$i+1]);
                        }
                }
        }

        return $URL;
}

// Substitui para Pesquisa
function RemoveCaracteres($Texto) {	
	$NovoTexto = str_replace("'", "\'", $Texto);
	$NovoTexto = str_replace("\n", "\n", $NovoTexto);
	$NovoTexto = str_replace("\r", "\r", $NovoTexto);
	$NovoTexto = str_replace("?", "", $NovoTexto);
	$NovoTexto = str_replace("%", "", $NovoTexto);
	$NovoTexto = str_replace(":", "", $NovoTexto);
	//$NovoTexto = str_replace("...", "..", $NovoTexto);
	//echo $NovoTexto;
	return $NovoTexto;
}

// Retorna somente os n?meros de uma string
function RetornaSomenteNumeros($Texto) {
	$Texto		= trim($Texto);
	$Numeros	= '';
	
	for ($i = 0; $i < strlen($Texto); $i++){
		$ValorInteiro	= (int) $Texto[$i];

		if($ValorInteiro !== 0)
			$Numeros	.= $Texto[$i]; 
	}
	
	return $Numeros;
}

// Retorna somente os n?meros de uma string
function RemoveNumeros($Texto) {
	$Texto		= trim($Texto);
	$Numeros	= '';
	
	for ($i = 0; $i < strlen($Texto); $i++){
		$ValorInteiro	= (int) $Texto[$i];

		if($ValorInteiro == 0)
			$Numeros	.= $Texto[$i]; 
	}
	
	return $Numeros;
}

// Retorna tudo para min?sculo
function RetornaMinusculo($Texto) {
	return strtr(strtolower($Texto),"??????????????????????????????","??????????????????????????????");
}

// Retorna tudo para maiusculas
function RetornaMaiuscula($Texto) {
	return strtr(strtoupper($Texto),"??????????????????????????????","??????????????????????????????"); 
}

function RemoveAcentos($Texto) {
    return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"),$Texto);
} 
 

function Nulos($valor) {

	if($valor != NULL) { return $valor; } else { return "NULO"; }
	
}

function NuloPorZero($valor){
		
		if (is_null($valor)){
		return  0;
		}else{
		return $valor;
		}		
}

function ContaTotal($Array){
	if(is_array($Array))
		return count($Array);
	else
		return 0;
} 

function AdicionaDia($date, $days) {
	$thisyear	=	substr($date, 0, 4);
	$thismonth	=	substr($date, 4, 2);
	$thisday	=	substr($date, 6, 2);
	$nextdate	=	mktime(0,0,0, $thismonth, $thisday + $days, $thisyear);
	
	return strftime("%Y-%m-%d", $nextdate);
}

function SubtraiDia($date, $days) {
	$thisyear	=	substr($date, 0, 4);
	$thismonth	=	substr($date, 4, 2);
	$thisday	=	substr($date, 6, 2);
	$nextdate	=	mktime(0,0,0, $thismonth, $thisday - $days, $thisyear);
	
	return strftime("%Y-%m-%d", $nextdate);
}

function AdicionaMes($date, $months) {
	$thisyear	=	substr($date, 0, 4);
	$thismonth	=	substr($date, 4, 2);
	$thisday	=	substr($date, 6, 2);
	$nextdate	=	mktime(0,0,0, $thismonth + $months, $thisday, $thisyear);
	
	return strftime("%Y-%m-%d", $nextdate);
}

function BuscarPorData($campo, $nome) {
	
		$R = explode('..', $campo);
		$BuscaPonto = FormataCep(" ");					
		
		if ((($R[0]) && (!$R[1]) && (substr_count($campo, '..') == 0)))	{
			$BuscaPonto .= " DATE(" . $nome . ") = '" . FormataDataBanco($R[0],0). " '";
		}
		if ((($R[0]) && (!$R[1]) && (substr_count($campo, '..') > 0))) {
			$BuscaPonto .= " DATE(" . $nome . ") >= '" . FormataDataBanco($R[0],0) . " '";
		}
		if (($R[0]) && ($R[1])) {
			$BuscaPonto .= " DATE(" . $nome . ") >= '" . FormataDataBanco($R[0],0) . " ' and DATE( " . $nome . ") <= '" . FormataDataBanco($R[1],0) . " '";
		}
		if ((!$R[0]) && ($R[1])) {
			$BuscaPonto .= " DATE(" . $nome . ") <= '" . FormataDataBanco($R[1],0) . "' ";
		}
		return $BuscaPonto . " ";
}

function BuscarPorHora($campo, $nome) {
	
		$R = explode('..', $campo);
		$BuscaPonto = FormataCep(" ");					
		
		if ((($R[0]) && (!$R[1]) && (substr_count($campo, '..') == 0)))	{
			$BuscaPonto .= " TIME(" .  $nome . ") = '" . $R[0]. "' ";
		}
		if ((($R[0]) && (!$R[1]) && (substr_count($campo, '..') > 0))) {
			$BuscaPonto .= " TIME(" . $nome . ") >= '" . $R[0] . "'";
		}
		if (($R[0]) && ($R[1])) {
			$BuscaPonto .= " TIME(" . $nome . ") >= '" . $R[0] . "' and TIME( . " . $nome . ") <= '" . $R[1] . "' ";
		}
		if ((!$R[0]) && ($R[1])) {
			$BuscaPonto .= " TIME(" . $nome . ") <= '" . $R[1] . "'";
		}
		
		return $BuscaPonto . " ";
}

function Sair(){
	session_destroy();
}

function PaginaAtual(){
	$ArrPagina = explode('/', $_SERVER["REQUEST_URI"]);
	$numero = count($ArrPagina) - 1;
	return $ArrPagina[$numero];
}

function Paginacao($NumeroPagina, $NumeroRegistros, $TotalRegistros){
    $max_paginas = 3;  // N?mero m?ximo de p?ginas a serem mostradas
    
	$html = '
	<nav aria-label="Paginação" style="margin-top: 10px">
	<ul class="pagination justify-content-center">';
  
    // Verifica Anterior
	if ($NumeroPagina > 0)
		$html .= '<li class="page-item"><a class="page-link" href="Javascript:;" onClick=\'Paginacao('.round($NumeroPagina-1) . ');\'>Anterior</a></li>';
	/*
	else
		$html .= '<li class="page-item"><a class="page-link" href="Javascript:;">Anterior</a></li>';    
*/
  
    // Numera??o de P?ginas
	if($NumeroRegistros > 0)
		$paginas = ceil($TotalRegistros / $NumeroRegistros);
		
		
    $arrPaginas = array();
    
	for ($i=0; $i < $paginas; $i++){
	  $arrPaginas[$i] = $i;
	}

	$metade = ceil($max_paginas / 2);
    if ((count($arrPaginas) > $metade) && (count($arrPaginas) > $max_paginas)){
		if ($NumeroPagina > $metade){
			if (($NumeroPagina + $metade) > $paginas)
          		$offset = $paginas - $max_paginas;
        	else
          		$offset = $NumeroPagina - $metade;
      	} else
        	$offset = 0;
			$arrPaginas = array_slice($arrPaginas, $offset, $max_paginas, true);
    }
	
	foreach ($arrPaginas as $p => $link){
		$pgAtual = $p + 1;
		if ($p == $NumeroPagina)
			$html .= '<li class="page-item active"><a class="page-link" href="Javascript:;">' . $pgAtual . '</a></li>';
		
			//$html .= '<li class="page-item"><a class="page-link" href="Javascript:;" onclick=\'Paginacao( ' . $p . ');\'>' . $pgAtual . '</a></li>';	        
	}
	  
    // Verifica pr?xima
	if (($NumeroPagina + 1) < $paginas)
		$html .= '<li class="page-item"><a class="page-link" href="Javascript:;" onclick=\'Paginacao( ' . round($NumeroPagina+1) . ');\'>Próximo</a></li>';
	/*else
		$html .= '<li class="page-item"><a class="page-link" href="Javascript:;">Próximo</a></li>';    
    */
	$html .= '
	</ul>
	</nav>';
	if(count($arrPaginas) >= 2)    return $html;
}

function FormataArrayBusca($array){
	$ArrAux		= explode(',', urldecode($array));
	if(is_array($ArrAux)){
		foreach ($ArrAux as $array){
			if($array != '')
				$ArrAux[]	= $array;
		}
	} else 
		$ArrAux	= urldecode($array);
	
	return $ArrAux;
}

function FormataArrayBuscaBanco($array){
	$ArrAux		= explode(',', urldecode($array));
	$condicao	= '';
	$comp		= '';
	if(is_array($ArrAux)){
		foreach ($ArrAux as $array){
			if($array != ''){
				$condicao	= $condicao . $comp . $array;
				$comp		= ', ';
			}
		}
		
	} else 
		$condicao			= urldecode($array);
	
	return $condicao;
}
  
function RetornaPrimeiroNome($Nome){
	$PrimeiroNome 		= explode(" ", $Nome);
	$PrimeiroNome		= $PrimeiroNome[0];
	return RemoveAcentos($PrimeiroNome);
}

function CalculaIdade($DataNascimento){
	$DataNascimento	= explode("/",$DataNascimento);
	$data			= date("d/m/Y");
	$data			= explode("/",$data);
	$anos			= $data[2]-$DataNascimento[2];

	if($DataNascimento[1] > $data[1]){
		return $anos-1;
	}
	
	if ($DataNascimento[1] == $data[1]){
		if($DataNascimento[0] <= $data[0]){
			return $anos;
		} else {
			return $anos-1;
		}
	}

	if($DataNascimento[1] < $data[1])
		return $anos;
}

function RetornaPrimeirasLetrasArray($string){
	$ArrPalavras		= explode(' ', $string);
	$retorno			= '';
	
	if(is_array($ArrPalavras)){
		foreach($ArrPalavras as $campo){
			$retorno	.= substr($campo, 0, 1);
		}
	} else 
		$retorno		= substr($string, 0, 1);
	
	return $retorno;
}

function CortaMeioTexto($Texto, $caracteres){
	$Retorno			= '';
	if(strlen($Texto) > ($caracteres + 3)){
		$Retorno		.= substr($Texto, 0, ($caracteres / 2));
		$Retorno		.= '...';
		$Retorno		.= substr($Texto, (strlen($Texto) - ($caracteres / 2)), ($caracteres / 2));
	} else
		$Retorno		= $Texto;
	
	return $Retorno;
}

//vem no formato 0000-00
function FormataMes($Data){
	$Data			= explode('-', $Data);
	
	return $Data[1] . '/' . $Data[0];
}

function browse($dir){
	global $filenames;
	global $diretorioatual;
	global $pastasfora;
	
	if($handle = opendir($dir)){
		while(false !== ($file = readdir($handle))){

			if(is_dir($dir . '/' . $file))
				$diretorioatual		= $file;

			if(is_array($pastasfora) && in_array($diretorioatual, $pastasfora))
				continue;
			
			if($file != "." && $file != ".." && is_file($dir.'/'.$file)){
				$filenames[] = $dir.'/'.$file;
			} else if ($file != "." && $file != ".." && is_dir($dir.'/'.$file)){
				browse($dir.'/'.$file);
			}
        }
        
        closedir($handle);
    }
    
    return $filenames;
}

function RemoveZeroComeco($string){
	$string				= trim($string);
	
	if(!empty($string)){
		if(is_numeric($string)){
			return (int) $string;
		} else {
			return $string;
		}
	}
}

function NumeroCartao($numerocartao){
	$numerocartao				= str_replace(' ', '', $numerocartao);
	$numerocartao				= substr($numerocartao, 0, 4) . '  ' . substr($numerocartao, 4, 4) . '  ' . substr($numerocartao, 8, 4) . '  ' . substr($numerocartao, 12, 4);
	
	return $numerocartao;
}

function Validade($validade){
	$validade					= RetornaSomenteNumeros($validade);
	$validade					= substr($validade, 0, 2) . '/' . substr($validade, 2);
	
	return $validade;
}

function Iniciais($String){
	$Arr						= explode(' ', $String);
	foreach($Arr as $word)
		$ret					.= $word[0];
	
	return $ret;
}

function Mobile(){
	$iphone		= strpos($_SERVER['HTTP_USER_AGENT'],"iPhone");
	$ipad		= strpos($_SERVER['HTTP_USER_AGENT'],"iPad");
	$android	= strpos($_SERVER['HTTP_USER_AGENT'],"Android");
	$palmpre	= strpos($_SERVER['HTTP_USER_AGENT'],"webOS");
	$berry		= strpos($_SERVER['HTTP_USER_AGENT'],"BlackBerry");
	$ipod		= strpos($_SERVER['HTTP_USER_AGENT'],"iPod");
	$symbian	=  strpos($_SERVER['HTTP_USER_AGENT'],"Symbian");
	
	$mobile		= 0;
	
	if($iphone || $ipad || $android || $palmpre || $ipod || $berry || $symbian == true){
		$mobile = 1;
	}
	
	return $mobile;
}

function GeraKeywords($string){
	
	$string = strip_tags($string); // replace whitespace
	$string = preg_replace('/\s\s+/i', '', $string); // replace whitespace
	$string = preg_replace('/[^a-zA-Z0-9\w. -]/', '', $string); // only take alphanumerical characters, but keep the spaces and dashes too
	preg_match_all('/\b.*?\b/i', $string, $matchWords);
	$matchWords = $matchWords[0];
	foreach($matchWords as $key=>$item){
		if($item == '' || strlen($item) <= 5){
			unset($matchWords[$key]);
		}
	}
	$wordCountArr = array();
	if(is_array($matchWords)){
		foreach($matchWords as $key => $val){
			$val = ucwords(strtolower($val));
			if(isset($wordCountArr[$val])){
				$wordCountArr[$val]++;
			} else {
				$wordCountArr[$val] = 1;
			}
		}
	}
	
	arsort($wordCountArr);
	
	$wordCountArr		= array_slice($wordCountArr, 0, 10);
	
	return $wordCountArr;
}

function extenso($valor = 0, $maiusculas = false) {
    if(!$maiusculas){
        $singular = ["centavo", "real", "mil", "milhão", "bilhão", "trilhão", "quatrilhão"];
        $plural = ["centavos", "reais", "mil", "milhões", "bilhões", "trilhões", "quatrilhões"];
        $u = ["", "um", "dois", "três", "quatro", "cinco", "seis",  "sete", "oito", "nove"];
    }else{
        $singular = ["CENTAVO", "REAL", "MIL", "MILHÃO", "BILHÃO", "TRILHÃO", "QUADRILHÃO"];
        $plural = ["CENTAVOS", "REAIS", "MIL", "MILHÕES", "BILHÕES", "TRILHÕES", "QUADRILHÕES"];
        $u = ["", "um", "dois", "TRÊS", "quatro", "cinco", "seis",  "sete", "oito", "nove"];
    }

    $c = ["", "cem", "duzentos", "trezentos", "quatrocentos", "quinhentos", "seiscentos", "setecentos", "oitocentos", "novecentos"];
    $d = ["", "dez", "vinte", "trinta", "quarenta", "cinquenta", "sessenta", "setenta", "oitenta", "noventa"];
    $d10 = ["dez", "onze", "doze", "treze", "quatorze", "quinze", "dezesseis", "dezesete", "dezoito", "dezenove"];

    $z = 0;
    $rt = "";

    $valor = number_format($valor, 2, ".", ".");
    $inteiro = explode(".", $valor);
    for($i=0;$i<count($inteiro);$i++)
    for($ii=strlen($inteiro[$i]);$ii<3;$ii++)
    $inteiro[$i] = "0".$inteiro[$i];

    $fim = count($inteiro) - ($inteiro[count($inteiro)-1] > 0 ? 1 : 2);
    for ($i=0;$i<count($inteiro);$i++) {
        $valor = $inteiro[$i];
        $rc = (($valor > 100) && ($valor < 200)) ? "cento" : $c[$valor[0]];
        $rd = ($valor[1] < 2) ? "" : $d[$valor[1]];
        $ru = ($valor > 0) ? (($valor[1] == 1) ? $d10[$valor[2]] : $u[$valor[2]]) : "";

        $r = $rc.(($rc && ($rd || $ru)) ? " e " : "").$rd.(($rd &&
        $ru) ? " e " : "").$ru;
        $t = count($inteiro)-1-$i;
        $r .= $r ? " ".($valor > 1 ? $plural[$t] : $singular[$t]) : "";
        if ($valor == "000")$z++; elseif ($z > 0) $z--;
        if (($t==1) && ($z>0) && ($inteiro[0] > 0)) $r .= (($z>1) ? " de " : "").$plural[$t];
        if ($r) $rt = $rt . ((($i > 0) && ($i <= $fim) && ($inteiro[0] > 0) && ($z < 1)) ? ( ($i < $fim) ? ", " : " e ") : " ") . $r;
    }

    if(!$maiusculas){
        $return = $rt ? $rt : "zero";
    } else {
        if ($rt) $rt = ereg_replace(" E "," e ",ucwords($rt));
            $return = ($rt) ? ($rt) : "Zero" ;
    }

    if(!$maiusculas){
        return ereg_replace(" E "," e ",ucwords($return));
    }else{
        return strtoupper($return);
    }
}

function extenso2($number) {

    $hyphen      = '-';
    $conjunction = ' e ';
    $separator   = ', ';
    $negative    = 'menos ';
    $decimal     = ' ponto ';
    $dictionary  = array(
        0                   => 'zero',
        1                   => 'um',
        2                   => 'dois',
        3                   => 'três',
        4                   => 'quatro',
        5                   => 'cinco',
        6                   => 'seis',
        7                   => 'sete',
        8                   => 'oito',
        9                   => 'nove',
        10                  => 'dez',
        11                  => 'onze',
        12                  => 'doze',
        13                  => 'treze',
        14                  => 'quatorze',
        15                  => 'quinze',
        16                  => 'dezesseis',
        17                  => 'dezessete',
        18                  => 'dezoito',
        19                  => 'dezenove',
        20                  => 'vinte',
        30                  => 'trinta',
        40                  => 'quarenta',
        50                  => 'cinquenta',
        60                  => 'sessenta',
        70                  => 'setenta',
        80                  => 'oitenta',
        90                  => 'noventa',
        100                 => 'cento',
        200                 => 'duzentos',
        300                 => 'trezentos',
        400                 => 'quatrocentos',
        500                 => 'quinhentos',
        600                 => 'seiscentos',
        700                 => 'setecentos',
        800                 => 'oitocentos',
        900                 => 'novecentos',
        1000                => 'mil',
        1000000             => array('milhão', 'milhões'),
        1000000000          => array('bilhão', 'bilhões'),
        1000000000000       => array('trilhão', 'trilhões'),
        1000000000000000    => array('quatrilhão', 'quatrilhões'),
        1000000000000000000 => array('quinquilhão', 'quinquilhões')
    );

    if (!is_numeric($number)) {
        return false;
    }

    if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
        // overflow
        trigger_error(
            'convert_number_to_words só aceita números entre ' . PHP_INT_MAX . ' à ' . PHP_INT_MAX,
            E_USER_WARNING
        );
        return false;
    }

    if ($number < 0) {
        return $negative . convert_number_to_words(abs($number));
    }

    $string = $fraction = null;

    if (strpos($number, '.') !== false) {
        list($number, $fraction) = explode('.', $number);
    }

    switch (true) {
        case $number < 21:
            $string = $dictionary[$number];
        case $number < 100:
            $tens   = ((int) ($number / 10)) * 10;
            $units  = $number % 10;
            $string = $dictionary[$tens];
            if ($units) {
                $string .= $conjunction . $dictionary[$units];
            }
        case $number < 1000:
            $hundreds  = floor($number / 100)*100;
            $remainder = $number % 100;
            $string = $dictionary[$hundreds];
            if ($remainder) {
                $string .= $conjunction . convert_number_to_words($remainder);
            }
        default:
            $baseUnit = pow(1000, floor(log($number, 1000)));
            $numBaseUnits = (int) ($number / $baseUnit);
            $remainder = $number % $baseUnit;
            if ($baseUnit == 1000) {
                $string = convert_number_to_words($numBaseUnits) . ' ' . $dictionary[1000];
            } elseif ($numBaseUnits == 1) {
                $string = convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit][0];
            } else {
                $string = convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit][1];
            }
            if ($remainder) {
                $string .= $remainder < 100 ? $conjunction : $separator;
                $string .= convert_number_to_words($remainder);
            }
    }

    if (null !== $fraction && is_numeric($fraction)) {
        $string .= $decimal;
        $words = array();
        foreach (str_split((string) $fraction) as $number) {
            $words[] = $dictionary[$number];
        }
        $string .= implode(' ', $words);
    }

    return $string;
}

function Filtrar($string){
	$string						= filter_var($string, FILTER_SANITIZE_STRING);
	
	return $string;
}

function FiltrarGlobais(){
	$ArrExclusoes				= array('links_titulo', 'politicasgerais','informacoesimportantes','aceitacao', 'mensagem_mesmodia', 'mensagem_finalizarcompra', 'mensagem_alacarte', 'mensagem_fechado', 'mensagem_topo', 'links_descricao', 'descricao', 'conteudo', 'instagram_link');
	if(is_array($_GET)){
		foreach($_GET as $field => $value){
			if(is_array($value)){
				foreach($value as $newfield => $newvalue){
					if(is_array($newvalue)){
						foreach($newvalue as $newfield2 => $newvalue2){
							foreach($newvalue2 as $newfield3 => $newvalue3){
								if(!is_array($newvalue3)){
									$_GET[$newfield3]			= Filtrar($newvalue3);
								}
							}
						}
					} else {
						$_GET[$newfield]			= Filtrar($newvalue);
					}
				}
			} else {
				$_GET[$field]			= Filtrar($value);
			}
		}
	}
	
	if(is_array($_POST)){
		foreach($_POST as $field => $value){
			if(in_array($field, $ArrExclusoes))
				continue;
			
			if(is_array($value)){
				foreach($value as $newfield => $newvalue){
					if(is_array($newvalue)){
						foreach($newvalue as $newfield2 => $newvalue2){
							foreach($newvalue2 as $newfield3 => $newvalue3){
								if(!is_array($newvalue3)){
									$_POST[$newfield3]			= Filtrar($newvalue3);
								}
							}
						}
					} else {
						$_POST[$newfield]			= Filtrar($newvalue);
					}
				}
			} else {
				$_POST[$field]			= Filtrar($value);
			}
		}
	}
}
?>
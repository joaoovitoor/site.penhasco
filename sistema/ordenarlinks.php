<?php
require_once('variavelglobal.php');
require_once($DiretorioInclude.'includes.php');

if(is_array($_GET['idpaginalink'])){
	foreach($_GET['idpaginalink'] as $posicao => $idpaginalink){
		AlteraBanco('update paginaslinks set ordem = ' . ($posicao + 1) . ' where idpaginalink = ' . $idpaginalink);
	}
}
?>
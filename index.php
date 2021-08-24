<?php
require_once('variavelglobal.php');

require_once($DiretorioRaiz.'topo.php');

if(RecebeParametro('pagina') != ''){
	require_once($DiretorioRaiz . RecebeParametro('pagina'));
} else {
	require_once($DiretorioRaiz . 'home.php');
}
	

require_once($DiretorioRaiz.'rodape.php');?> 


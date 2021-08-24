<?php
require_once($DiretorioClasses.'clsbanco.php');
require_once($DiretorioClasses.'clsalbuns.php');
require_once($DiretorioClasses.'clsconfiguracoes.php');
require_once($DiretorioClasses.'clsimagens.php');
require_once($DiretorioClasses.'clsmapas.php');
require_once($DiretorioClasses.'clspaginas.php');
require_once($DiretorioClasses.'clspaginaslinks.php');
require_once($DiretorioClasses.'clspopups.php');
require_once($DiretorioClasses.'clsusuarios.php');
require_once($DiretorioInclude.'FuncoesGenericas.php');

FiltrarGlobais();

$Objalbuns						= New albuns;
$Objconfiguracoes				= New configuracoes;
$Objimagens						= New imagens;
$Objmapas						= New mapas;
$Objpaginas						= New paginas;
$Objpaginaslinks				= New paginaslinks;
$Objpopups						= New popups;
$Objusuarios					= New usuarios;
?>
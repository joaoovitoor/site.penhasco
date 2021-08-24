<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
error_reporting(E_ERROR);

session_start();

$DiretorioRaiz						= '/var/www/penhasco/';
$DiretorioVirtualRaiz  				= '/';
$DiretorioSite						= 'https://' . $_SERVER['SERVER_NAME'] . '/';

$servidor							= 'localhost'; 
$banco 								= 'penhasco';
$usuario 							= 'root';
$senha 								= 'J040v1t0r';

$email_smtp							= 'mail.penhasco.com.br';
$email_port							= '25';
$email_username						= 'emailsistema@penhasco.com.br	';
$email_senha						= 'j040v1t0r';
 
$DiretorioClasses 					= $DiretorioRaiz.'classes/';
$DiretorioImg 						= $DiretorioRaiz.'img/';
$DiretorioInclude 					= $DiretorioRaiz.'includes/';

$DiretorioImgUsuario				= $DiretorioImg.'usuario/';

$DiretorioVirtualArquivo			= $DiretorioVirtualRaiz.'arquivo/';
$DiretorioVirtualImg 			  	= $DiretorioVirtualRaiz.'img/'; 
$DiretorioVirtualInclude 			= $DiretorioVirtualRaiz.'includes/';

$DiretorioVirtualImgUsuario			= $DiretorioVirtualImg.'usuario/';

$title							   	= 'SISTEMA GESTÃO DO SITE';
$idconfiguracao						= 1;

$ArrDatas							= array('datacadastro' => 'Data Cadastro', 'data' => 'Data Utilização');
$allowedTags						= '<p><strong><em><u><h1><h2><h3><h4><h5><h6><img><li><ol><ul><span><div><br><ins><del>';
$ArrStatusTiposIngressos			= array(1 => 'Ativo', 2 => 'Inativo');

$email_smtp							= 'mail.penhasco.com.br';
$email_port							= 465;
$email_username						= 'emailsistema@penhasco.com.br';
$email_senha						= 'j040v1t0r';
?>
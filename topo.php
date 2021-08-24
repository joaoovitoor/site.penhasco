<?php
//phpinfo();
require_once('variavelglobal.php');
require_once($DiretorioInclude.'includes.php');

if(RecebeParametro('acao') == 'contato'){
	require_once($DiretorioClasses.'clsmail.php');
	require($DiretorioRaiz.'recaptcha/src/autoload.php');
	$recaptcha												= new \ReCaptcha\ReCaptcha('6LcEMqsZAAAAANHp_LqtI6SoKbYbYhjQQWLV8okc');

	if(isset($_POST['g-recaptcha-response'])){
		$resp												= $recaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);
		if($resp->isSuccess()){

			$Objemail										= New PHPMailer;
			$Objemail->SetLanguage("br", "libs/");
			$Objemail->isSMTP();
			$Objemail->IsHTML(true); 
			$Objemail->CharSet								= 'UTF-8';
			$Objemail->SMTPAuth  							= true;
			$Objemail->SMTPSecure 							= 'ssl';
			$Objemail->Host       							= $email_smtp;
			$Objemail->Port       							= $email_port;
			$Objemail->Username								= $email_username;
			$Objemail->Password								= $email_senha;
			$Objemail->SetFrom($email_username, $email_nome);
			$Objemail->AddAddress('atendimento@penhasco.com.br');
			$Objemail->setFrom(RecebeParametro('email'), RemoveAcentos(RecebeParametro('nome')));
			$Objemail->AddReplyTo(RecebeParametro('email'), RemoveAcentos(RecebeParametro('nome')));
			$Objemail->SMTPDebug							= 1;
			$Objemail->Subject								= 'CONTATO - POUSADA PENHASCO';
			$Objemail->Body									= 
			'Foi recebido um novo contato pelo site, seguem os dados<br>
			Assunto: ' . RecebeParametro('assunto'). '<br>
			Nome: ' . RecebeParametro('nome'). '<br>
			E-mail: ' . RecebeParametro('email'). '<br>
			Telefone: ' . RecebeParametro('telefone'). '<br>
			Celular: ' . RecebeParametro('celular'). '<br>
			Mensagem:<br>' . RecebeParametro('mensagem');
			
			$Objemail->Send();
			
			$Msg								= 'Contato enviado com sucesso!';
		} else 
			$Msg											= 'Por favor preencha o RE-CAPTCHA PARA PROSSEGUIR!';
	} else
		$Msg												= 'Por favor preencha o RE-CAPTCHA PARA PROSSEGUIR!';
}

$ArrPopup								= SelecionaBanco('select * from popups where status = 1 order by idpopup desc limit 1');

$Objconfiguracoes->idconfiguracao		= 1;
$Objconfiguracoes->Seleciona();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-173521313-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-173521313-1');
	</script>


	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="João Vitor Ramos Tonolli">
	<meta name="sb.validation_hash" content="BLI-barmdgHKsNtQbqVpjGYytayCZneASIVuaNKwBtNdGhplsIzBNpyGaHYGDQdyiWGeapsDJYpotOWPGzlvYFseszZUnPgjtkZA" /></head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link rel="icon" href="<?php echo $DiretorioSite?>img/favicon.png">
	<script src="https://kit.fontawesome.com/45d9d497d9.js" crossorigin="anonymous"></script>
	<title><?php echo $Objconfiguracoes->titulo?></title>
	
	<meta property="og:locale" content="pt_BR">
	<meta property="og:url" content="https://www.penhasco.com.br/">
	<meta property="og:title" content="POUSADA PENHASCO">
	<meta property="og:site_name" content="<?php echo $Objconfiguracoes->titulo?>">
	<meta property="og:description" content="Restaurante Penhasco aberto com Buffet Completo aos sábados, domingos e feriados. Dias de semana sistema A La Carte">
	<meta property="og:image" content="https://www.penhasco.com.br/img/logo2.png">
	<meta property="og:image:type" content="image/png">
	<meta property="og:image:width" content="165"> /** PIXELS **/
	<meta property="og:image:height" content="94"> /** PIXELS **/
	<meta property="og:type" content="website">
	
	<link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">

</head>
<body>
<nav class="navbar navbar-expand-xl fixed-top navbar-dark menuverde">
	<div class="container-fluid">
		<a class="navbar-brand" href="<?php echo $DiretorioSite?>"><img src="<?php echo $DiretorioVirtualImg?>logo2.png" style="height: 50px"></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false">
			<span class="navbar-toggler-icon"></span>
		</button>
		 
		<div class="collapse navbar-collapse" id="navbarResponsive">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item active"><a class="nav-link text-light font-weight-bold" href="<?php echo $DiretorioVirtualRaiz?>">Home<span class="sr-only">(current)</span></a></li>
			<li class="nav-item"><a class="nav-link text-light font-weight-bold" href="<?php echo $DiretorioVirtualRaiz?>a-pousada/">A Pousada</a></li>
			<li class="nav-item dropdown">
				<a class="nav-link text-light font-weight-bold dropdown-toggle"  href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Serviços
				</a>
				<div class="dropdown-menu escuro " aria-labelledby="navbarDropdown">
					<a class="dropdown-item text-light" href="<?php echo $DiretorioVirtualRaiz?>hospedagem/">Hospedagem</a>
					<a class="dropdown-item text-light" href="<?php echo $DiretorioVirtualRaiz?>-dayuse/">Day Use</a>
					<a class="dropdown-item text-light" href="<?php echo $DiretorioVirtualRaiz?>reunioes/">Reuniões e Eventos</a>
					<a class="dropdown-item text-light" href="<?php echo $DiretorioVirtualRaiz?>gastronomia/">Gastronomia</a>
					<a class="dropdown-item text-light" href="<?php echo $DiretorioVirtualRaiz?>lazer/">Lazer</a>
					<a class="dropdown-item text-light" href="<?php echo $DiretorioVirtualRaiz?>fazendinha/">Fazendinha, Trilha e Mirante</a>
				</div>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link text-light font-weight-bold dropdown-toggle"  href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Reservas
				</a>
				<div class="dropdown-menu escuro " aria-labelledby="navbarDropdown">
					<a class="dropdown-item text-light" href="<?php echo $DiretorioVirtualRaiz?>aviso/">Hospedagem</a>
					<a class="dropdown-item text-light" href="https://dayuse.penhasco.com.br/">Day Use</a>
					<a class="dropdown-item text-light" href="https://almoco.penhasco.com.br/">Almoço</a>
				</div>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link text-light font-weight-bold dropdown-toggle"  href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Multimidia
				</a>
				<div class="dropdown-menu escuro " aria-labelledby="navbarDropdown">
					<a class="dropdown-item text-light" href="<?php echo $DiretorioVirtualRaiz?>multimidia/">Fotos e Vídeos</a>
					<a class="dropdown-item text-light" href="https://www.google.com/maps/@-15.47587,-55.75736,3a,75.0y,32.351223h,7.7259674t/data=!3m4!1e1!3m2!1sAF1QipNU26Cpc6j49GOrV4JjDHPHE3Ml7dD5p8RZuxvP!2e10?shorturl=1" target="_blank">Tour Virtual</a>
					<a class="dropdown-item text-light" href="<?php echo $DiretorioVirtualRaiz?>mapa/">Mapa Penhasco</a>
				</div>
			</li>
			<li class="nav-item"><a class="nav-link text-light font-weight-bold"  href="<?php echo $DiretorioVirtualRaiz?>contato/">Contato</a></li>
		</ul>
		
		<div class="float-right text-light d-none d-xl-block">
			
			<div class="btn-group btn-vertical float-right" role="group" aria-label="Basic example">
				<a href="Javascript:;" class="btn btn-success escuro"><i class="fas fa-phone-alt"></i> <?php echo $Objconfiguracoes->telefone1?></a>
				<a href="Javascript:;" class="btn btn-success escuro"><i class="fas fa-phone-alt"></i> <?php echo $Objconfiguracoes->telefone2?></a>
				<a href="Javascript:;" class="btn btn-success escuro"><i class="fab fa-whatsapp"></i> <?php echo $Objconfiguracoes->telefone3?></a>

				<a target="_blank" href="<?php echo $Objconfiguracoes->youtube?>" class="btn btn-success escuro"><i class="fab fa-youtube"></i></a>
				<a href="https://www.facebook.com/PenhascoPousada/" target="_blank" class="btn btn-success escuro"><i class="fab fa-facebook-f"></i></a>
				<a href="https://www.instagram.com/pousadapenhasco/" target="_blank" class="btn btn-success escuro"><i class="fab fa-instagram"></i></a>
			</div>
		</div>
	</div>
</nav>
<br><br><br>
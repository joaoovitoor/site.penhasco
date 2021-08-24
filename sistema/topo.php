<?php
require_once('variavelglobal.php');
require_once($DiretorioInclude.'includes.php');

if(empty($_SESSION['idusuario'])){
	echo '<script>window.location = "' . $DiretorioVirtualRaiz . 'login/"</script>';
}

if(!empty($_SESSION['idusuario'])){
	$ObjusuariosLogado						= New usuarios;
	$ObjusuariosLogado->idusuario			= $_SESSION['idusuario'];
	$ObjusuariosLogado->Seleciona();
}

$Objconfiguracoes->idconfiguracao			= 1;
$Objconfiguracoes->Seleciona();?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="João Vitor Ramos Tonolli">
	<title><?php echo $title?></title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.min.css" integrity="sha256-sJQnfQcpMXjRFWGNJ9/BWB1l6q7bkQYsRqToxoHlNJY=" crossorigin="anonymous">

	<link href="<?php echo $DiretorioVirtualInclude?>css.css" rel="stylesheet">
	 
	<title><?php echo $title?></title>
	<link rel="icon" href="<?php echo $DiretorioVirtualImg?>logo.png">
</head>
<body id="page-top">
	<nav class="navbar navbar-expand navbar-dark static-top" style="background-color: #212C31">
		<a class="navbar-brand mr-1" style="margin: 0px; padding: 0px" href="<?php echo $DiretorioVirtualRaiz?>"><img src="<?php echo $DiretorioVirtualImg?>logo2.png" style="margin: 0px; max-height: 35px"></a>
		<button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
			<i class="fas fa-bars"></i>
		</button>
		<div class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0"></div>
		<ul class="navbar-nav ml-auto ml-md-0 pull-right">
			<div class="topbar-divider d-none d-sm-block"></div>
            <li class="nav-item dropdown no-arrow">
				<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<span class="mr-2 d-none d-lg-inline text-white small"><strong><?php echo $ObjusuariosLogado->nome?></strong></span>
					<i class="fas fa-user text-white"></i>
				</a>
				<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
					<a class="dropdown-item" href="<?php echo $DiretorioVirtualRaiz?>usuarios/alterar/<?php echo $_SESSION['idusuario']?>">
						<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
						Meus Dados
					</a>
					
					<div class="dropdown-divider"></div>
					
					<a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
						<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
						Sair
					</a>
				</div>
			</li>
		</ul>
	</nav>

	<div id="wrapper">
		<ul class="sidebar sidebar-dark navbar-nav" style="background-color: #212C31">
			<hr class="sidebar-divider my-0">

			<li class="nav-item active">
				<a class="nav-link" href="<?php echo $DiretorioVirtualRaiz?>">
					<i class="fas fa-home"></i>
					<span>Página Inicial</span>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?php echo $DiretorioVirtualRaiz?>imagens/">
					<i class="fas fa-database"></i>
					<span>Banco de Imagens</span>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?php echo $DiretorioVirtualRaiz?>albuns/">
					<i class="far fa-images"></i>
					<span>Álbuns</span>
				</a>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="paginasdropwodn" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<i class="far fa-file"></i> Páginas
				</a>
				<div class="dropdown-menu" aria-labelledby="paginasdropwodn">
					<a class="dropdown-item" href="<?php echo $DiretorioVirtualRaiz?>paginas/novo/"><span>Nova Página</span></a>
					<?php
					$ArrPaginas			= SelecionaBanco('select * from paginas order by titulo asc');
					if(is_array($ArrPaginas)){
						foreach($ArrPaginas as $campo){?>
							<a class="dropdown-item" href="<?php echo $DiretorioVirtualRaiz?>paginas/alterar/<?php echo $campo['idpagina']?>"><span><?php echo $campo['titulo']?></span></a>
							<?php
						}
					}?>
				</div>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?php echo $DiretorioVirtualRaiz?>mapas/">
					<i class="fas fa-map-marker-alt"></i>
					<span>Mapas</span>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?php echo $DiretorioVirtualRaiz?>popups/">
					<i class="far fa-window-restore"></i>
					<span>Popups</span>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?php echo $DiretorioVirtualRaiz?>configuracoes/">
					<i class="fas fa-fw fa-cog"></i>
					<span>Configurações</span>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?php echo $DiretorioVirtualRaiz?>usuarios/">
					<i class="fas fa-users"></i>
					<span>Usuários</span>
				</a>
			</li>
		</ul>

		<div id="content-wrapper">
			<div class="container-fluid">
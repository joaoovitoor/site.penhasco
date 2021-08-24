<?php
require_once('variavelglobal.php');
require_once($DiretorioInclude.'includes.php');

if(RecebeParametro('acao') == 'sair'){
	unset($_SESSION);
	
	echo '<script>window.location = "' . $DiretorioVirtualRaiz . 'login/"</script>';

	setcookie('email', null, -1);
	setcookie('senha', null, -1);
	setcookie('lembrar', null, -1);
}

if(RecebeParametro('acao') == 'login'){
	$ArrUsuarios			  		= SelecionaBanco('select * from usuarios where email = "' . RecebeParametro('email') . '" and senha = "' . base64_encode(RecebeParametro('senha')) . '"');
	
	if(is_array($ArrUsuarios)){
		$_SESSION			    	= $ArrUsuarios[0];
		$_SESSION['token']			= md5(uniqid($ArrUsuarios[0]['email'], true));

		$expirar					= time() + 60 * 60 * 24 * 30;
		
		if(RecebeParametro('lembrar') == 1){
			setcookie('email', RecebeParametro('email'), $expirar);
			setcookie('senha', RecebeParametro('senha'), $expirar);
			setcookie('lembrar', RecebeParametro('lembrar'), $expirar);
		} else {
			setcookie('email', null, -1);
			setcookie('senha', null, -1);
			setcookie('lembrar', null, -1);
		}
		
		$ArrSistemasU				= explode(',', $ObjclientesusuariosLogado->idsistema);
		if(ContaTotal($ArrSistemasU) == 1){?>
			<script type="text/javascript">
				window.location						= '<?php echo $DiretorioVirtualRaiz . $ArrSistemas[$ArrSistemasU[0]]["url"]?>';
			</script>
			<?php
		} else 
			echo '<script>window.location = "' . $DiretorioVirtualRaiz . '"</script>';
	
	} else {
		setcookie('email', null, -1);
		setcookie('senha', null, -1);
		setcookie('lembrar', null, -1);

		$Msg				      	= 'Erro ao efetuar Login!';
	}
}

if(RecebeParametro('acao') == ''){
	if(!empty($_COOKIE['email']) && !empty($_COOKIE['senha'])){
		$ArrUsuarios			  		= SelecionaBanco('select * from usuarios where email = "' . $_COOKIE['email'] . '" and senha = "' . base64_encode($_COOKIE['senha']) . '"');
		if(is_array($ArrUsuarios)){
			$_SESSION			    	= $ArrUsuarios[0];
			$_SESSION['token']			= md5(uniqid($ArrUsuarios[0]['email'], true));
			
			$ArrSistemasU				= explode(',', $ObjclientesusuariosLogado->idsistema);
			if(ContaTotal($ArrSistemasU) == 1){?>
				<script type="text/javascript">
					window.location						= '<?php echo $DiretorioVirtualRaiz . $ArrSistemas[$ArrSistemasU[0]]["url"]?>';
				</script>
				<?php
			} else 
				echo '<script>window.location = "' . $DiretorioVirtualRaiz . '"</script>';
		}
	}
}?>
<!DOCTYPE html>
<html lang="PT-br">
<head>
	<link rel="icon" href="<?php echo $DiretorioVirtualImg?>logo.png">
	<meta name="viewport" content="width=device-width" />
	<title><?php echo $title?></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<style>
	
	.checkboxiconaaa {
		-ms-transform: scale(1.5); /* IE */
		-moz-transform: scale(1.5); /* FF */
		-webkit-transform: scale(1.5); /* Safari and Chrome */
		-o-transform: scale(1.5); /* Opera */
		
	}
	
	h4, p {
		font-family: Calibri, Arial;
		color: #4D4D4D;
		font-size: 16px;
		margin: 0px;
	}
	
	h4 {
		font-size: 22px;
	}
	
	.signinpanel form a {
		font-family: Calibri, Arial;
		color: #4D4D4D;
		font-size: 16px;
	}
	
	.form-control {
		height: 40px;
		font-family: Calibri, Arial;
		color: #4D4D4D;
		font-size: 16px;
	}

	</style>
	<script type="text/javascript">
	<?php
	if(!empty($Direciona)){?>
		window.location = '<?php echo $DiretorioVirtualRaiz . $Direciona?>';
		<?php
	}?>
	</script>
</head>
<body style="background-color: #212C31">
<div class="container">
	<div class="row justify-content-center">
		<?php 
		if(!empty($Msg)){?>
			<div class="alert alert-warning"><?php echo $Msg?></div>
			<?php 
		}?>
		<div class="col-xl-10 col-lg-12 col-md-9">
			<div class="card o-hidden border-0 shadow-lg my-5">
				<div class="card-body p-0">
					<div class="row">
						<div class="col-lg-6 d-flex align-items-center justify-content-center">
							<img src="<?php echo $DiretorioVirtualImg?>logo.png" class="img-fluid px-5 mt-2" >
						</div>
						<div class="col-lg-6">
							<div class="p-5"> 
								<div class="text-center">
									<h1 class="h4 text-gray-900 mb-4">Efetuar Login!</h1>
								</div>
								<form name="form1" method="post" autocomplete="off">
								<input type="hidden" name="recuperarsenha">
								<div class="form-group">
									<input type="email" name="email" value="<?php echo $_COOKIE['email']?>" class="form-control" placeholder="Endereço de E-mail" required="required" autofocus="autofocus">
								</div>
								<div class="form-group">
									<input type="password" name="senha" id="senha" value="<?php echo $_COOKIE['senha']?>" class="form-control" placeholder="Senha" required="required">
								</div>
								<div class="form-group">
									<div class="custom-control custom-checkbox small">
										<input type="checkbox" class="custom-control-input" name="lembrar" id="lembrar" value="1" <?php if($_COOKIE['lembrar'] == 1) echo 'checked';?>>
										<label class="custom-control-label" for="lembrar">Manter Logado</label>
									</div>
								</div>
								<button type="submit" name="acao" value="login" class="btn btn-primary btn-user btn-block">
								Login
								</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>
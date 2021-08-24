<?php
if(RecebeParametro('idpopup') > 0){
	$ObjpopupsAux						= New popups;
	$ObjpopupsAux->idpopup				= (int) RecebeParametro('idpopup');
	$ObjpopupsAux->Seleciona();
}

if(is_array($_POST))
	foreach($_POST as $key => $value)
		$Objpopups->$key					= filter_var($value, FILTER_SANITIZE_STRING);
	
$Objpopups->dataultimaatualizacao			= date('Y-m-d H:i:s');

if(empty($Objpopups->datacadastro))
	$Objpopups->datacadastro				= date('Y-m-d H:i:s');

if(RecebeParametro('acao') == 'salvar'){
	if(empty($Objpopups->status))
		$Objpopups->status					= 1;
	
	if(!empty($_FILES['imagem']['tmp_name'])){
		$arquivo_nome						= rand(00000, 99999) . '.' . ExtensaoArquivoSimples($_FILES['imagem']['name']);
		
		move_uploaded_file($_FILES['imagem']['tmp_name'], $DiretorioImg . $arquivo_nome);
		
		$Objpopups->imagem				= $arquivo_nome;
		
	} else 
		$Objpopups->imagem				= $ObjpopupsAux->imagem;
	
	
	if(!empty($Objpopups->titulo))
		$Objpopups->Insere();
	
	if(empty($Objpopups->idpopup))
		$Objpopups->idpopup			= (int) RecebeParametro('idpopup');
	
	$Msg									= 'Popups salvo com sucesso !';
	$Direciona								= 'popups/';

} else if(RecebeParametro('acao') == 'excluir'){
	if((int) RecebeParametro('idpopup') > 0){
		$Objpopups->idpopup				= (int) RecebeParametro('idpopup');
		$Objpopups->Excluir();
		
		$Msg								= 'Popups excluido com sucesso !';
		$Direciona							= 'popups/';
	} else {
		$Msg								= 'Erro ao excluir Popups!';
	}
}

if((int) RecebeParametro('idpopup') > 0){
	$Objpopups->idpopup						= (int) RecebeParametro('idpopup');
	$Objpopups->Seleciona();
}?>
<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="<?php echo $DiretorioVirtualRaiz?>">Página Inicial</a></li>
	<li class="breadcrumb-item">Popups</li>
	<li class="breadcrumb-item active"><?php echo $Objpopups->titulo?></li>
</ol>

<?php
if(!empty($Msg)){?>
	<div class="row">
		<div class="col-lg-12">
			<div class="alert alert-info"><?php echo $Msg?></div>
		</div>
	</div>
	<?php
}?>

<form class="form-horizontal form-label-left" name="form1" method="post" enctype="multipart/form-data">
<input type="hidden" name="master" id="master" value="<?php echo $Objpopups->master?>"> 
<input type="hidden" name="idpopup" id="idpopup" value="<?php echo $Objpopups->idpopup?>"> 
<div class="card mx-auto mt-12">
	<div class="card-header">Dados do Pop up</div>
	<div class="card-body">
		Título*
		<input type="text" name="titulo" id="titulo" value="<?php echo $Objpopups->titulo?>" class="form-control" placeholder="Título" required>
		
		Imagem
		<input type="file" name="imagem" id="imagem" placeholder="Selecione uma foto" class="form-control">
		<?php
		if(!empty($Objpopups->imagem) && !is_dir($DiretorioImg . $Objpopups->imagem) && file_exists($DiretorioImg . $Objpopups->imagem)){?>
			<img src="<?php echo $DiretorioVirtualImg . $Objpopups->imagem?>" class="thumbnail my-2" style="max-height: 110px">
			<?php
		}?>
		
		<br>
		Status*
		<select name="status" id="status" class="form-control">
			<option value=""> Seleciona </option>
			<?php
			if(is_array($ArrStatusTiposIngressos)){
				foreach($ArrStatusTiposIngressos as $status => $titulo){
					$selected			= '';
					if($status == $Objpopups->status)
						$selected		= 'selected';
					
					echo '<option value="' . $status . '" ' . $selected . '>' . $titulo . '</option>';
				}
			}?>
		</select>
	</div>
	<div class="card-footer text-center">
		<button type="button" class="btn btn-primary" onclick="javascript: window.history.go(-1)">voltar</button>
		<button type="submit" name="acao" value="salvar" class="btn btn-success">salvar</button>
		<?php
		if(($Objpopups->idpopup > 0) && ($_SESSION['master'] == 1)){?>
			<button type="submit" name="acao" value="excluir" class="btn btn-danger">excluir</button>
			<?php
		}?>
	</div>
</div>
</form>
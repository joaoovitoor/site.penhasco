<?php
if(RecebeParametro('idusuario') > 0){
	$ObjusuariosAux							= New usuarios;
	$ObjusuariosAux->idusuario				= RecebeParametro('idusuario');
	$ObjusuariosAux->Seleciona();
}

if(is_array($_POST))
	foreach($_POST as $key => $value)
		$Objusuarios->$key					= $value;
	
$Objusuarios->senha							= base64_encode(RecebeParametro('senha'));
$Objusuarios->datanascimento				= FormataDataBanco(RecebeParametro('datanascimento'), 0);
$Objusuarios->dataultimaatualizacao			= date('Y-m-d H:i:s');

if(empty($Objusuarios->datacadastro))
	$Objusuarios->datacadastro				= date('Y-m-d H:i:s');

if(RecebeParametro('acao') == 'salvar'){
	
	$Objusuarios->Insere();
	
	if(empty($Objusuarios->idusuario))
		$Objusuarios->idusuario				= RecebeParametro('idusuario');
	
	$Msg									= 'Usuário salvo com sucesso !';
	$Direciona								= '/';

} else if(RecebeParametro('acao') == 'excluir'){
	if((RecebeParametro('idusuario') != 0) && (RecebeParametro('idusuario') != '')){
		$Objusuarios->idusuario				= RecebeParametro('idusuario');
		$Objusuarios->Seleciona();
		
		if(!empty($Objusuarios->imagem) && !is_dir($DiretorioImgUsuario . $Objusuarios->imagem) && file_exists($DiretorioImgUsuario . $Objusuarios->imagem)){
			unlink($DiretorioImgUsuario . $Objusuarios->imagem);
		}
		
		$Objusuarios->Excluir();
		
		$Msg								= 'Usuário excluido com sucesso !';
		$Direciona							= 'usuarios/';
	} else {
		$Msg								= 'Erro ao excluir Usuário !';
	}
}

if(RecebeParametro('idusuario') > 0){
	$Objusuarios->idusuario						= RecebeParametro('idusuario');
	$Objusuarios->Seleciona();
}?>
<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="<?php echo $DiretorioVirtualRaiz?>">Página Inicial</a></li>
	<li class="breadcrumb-item">Usuários</li>
	<li class="breadcrumb-item active"><?php echo $Objusuarios->nome?></li>
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

<form class="form-horizontal form-label-left" name="form1" novalidate method="post" enctype="multipart/form-data">
<input type="hidden" name="master" id="master" value="<?php echo $Objusuarios->master?>"> 
<input type="hidden" name="idusuario" id="idusuario" value="<?php echo $Objusuarios->idusuario?>"> 
<div class="card mx-auto mt-12">
	<div class="card-header">Dados do Usuário</div>
	<div class="card-body">
		Nome*
		<input type="text" name="nome" id="nome" value="<?php echo $Objusuarios->nome?>" class="form-control" placeholder="Preencha aqui o seu nome" required>
		
		Email*
		<input type="text" name="email" id="email" value="<?php echo $Objusuarios->email?>" required placeholder="Insira aqui o seu e-mail" class="form-control">
		
		Telefone*
		<input type="text" name="telefone" id="telefone" value="<?php echo $Objusuarios->telefone?>" placeholder="Insira aqui o seu telefone no padrão (99) 99999-9999" data-validate-length-range="8,20" required class="form-control telefone">
	</div>
	<div class="card-header">Dados de Acesso</div>
	<div class="card-body">
		<?php
		if(($_SESSION['master'] == 1) || ($Objusuarios->idusuario == 0) || ($_SESSION['idusuario'] == $Objusuarios->idusuario)){?>
			Senha*
			<input type="password" name="senha" id="senha" value="<?php echo base64_decode($Objusuarios->senha)?>" class="form-control" required>
			<?php
		} else {?>
			<input type="hidden" name="senha" id="senha" value="<?php echo base64_decode($Objusuarios->senha)?>">
			<?php
		}?>
	</div>
	<div class="card-footer text-center">
		<div class="btn-group" role="group">
			<button type="button" class="btn btn-primary" onclick="javascript: window.history.go(-1)">voltar</button>
			<button type="submit" name="acao" value="salvar" class="btn btn-success">salvar</button>
			<?php
			if(($Objusuarios->idusuario > 0) && ($_SESSION['master'] == 1)){?>
				<button type="submit" name="acao" value="excluir" class="btn btn-danger">excluir</button>
				<?php
			}?>
		</div>
	</div>
</div>
</form>
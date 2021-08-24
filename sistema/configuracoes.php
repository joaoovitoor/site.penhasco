<?php
$idconfiguracao									= 1;

$ObjconfiguracoesAux							= New configuracoes;
$ObjconfiguracoesAux->idconfiguracao			= $idconfiguracao;
$ObjconfiguracoesAux->Seleciona();


if(is_array($_POST))
	foreach($_POST as $key => $value)
		$Objconfiguracoes->$key						= $value;
	
$Objconfiguracoes->dataultimaatualizacao			= date('Y-m-d H:i:s');

if(empty($Objconfiguracoes->datacadastro))
	$Objconfiguracoes->datacadastro					= date('Y-m-d H:i:s');

if(RecebeParametro('acao') == 'salvar'){
	$Objconfiguracoes->idcategoria					= implode(',', $_POST['idcategoria']);
	$Objconfiguracoes->conteudo						= htmlentities(RecebeParametro('conteudo'));
	$Objconfiguracoes->instagram_link				= htmlentities(RecebeParametro('instagram_link'));
	
	if(!empty($_FILES['servicos_imagem1']['tmp_name'])){
		$arquivo_nome								= rand(00000, 99999) . '.' . ExtensaoArquivoSimples($_FILES['servicos_imagem1']['name']);
		move_uploaded_file($_FILES['servicos_imagem1']['tmp_name'], $DiretorioImg . $arquivo_nome);
		
		$Objconfiguracoes->servicos_imagem1				= $arquivo_nome;
		
	} else 
		$Objconfiguracoes->servicos_imagem1				= $ObjconfiguracoesAux->servicos_imagem1;
	
	if(!empty($_FILES['servicos_imagem2']['tmp_name'])){
		$arquivo_nome								= rand(00000, 99999) . '.' . ExtensaoArquivoSimples($_FILES['servicos_imagem2']['name']);
		move_uploaded_file($_FILES['servicos_imagem2']['tmp_name'], $DiretorioImg . $arquivo_nome);
		
		$Objconfiguracoes->servicos_imagem2				= $arquivo_nome;
		
	} else 
		$Objconfiguracoes->servicos_imagem2				= $ObjconfiguracoesAux->servicos_imagem2;
	
	if(!empty($_FILES['servicos_imagem3']['tmp_name'])){
		$arquivo_nome								= rand(00000, 99999) . '.' . ExtensaoArquivoSimples($_FILES['servicos_imagem3']['name']);
		move_uploaded_file($_FILES['servicos_imagem3']['tmp_name'], $DiretorioImg . $arquivo_nome);
		
		$Objconfiguracoes->servicos_imagem3				= $arquivo_nome;
		
	} else 
		$Objconfiguracoes->servicos_imagem3				= $ObjconfiguracoesAux->servicos_imagem3;
	
	if(!empty($_FILES['servicos_imagem4']['tmp_name'])){
		$arquivo_nome								= rand(00000, 99999) . '.' . ExtensaoArquivoSimples($_FILES['servicos_imagem4']['name']);
		move_uploaded_file($_FILES['servicos_imagem4']['tmp_name'], $DiretorioImg . $arquivo_nome);
		
		$Objconfiguracoes->servicos_imagem4				= $arquivo_nome;
		
	} else 
		$Objconfiguracoes->servicos_imagem4				= $ObjconfiguracoesAux->servicos_imagem4;
	
	if(!empty($_FILES['servicos_imagem5']['tmp_name'])){
		$arquivo_nome								= rand(00000, 99999) . '.' . ExtensaoArquivoSimples($_FILES['servicos_imagem5']['name']);
		move_uploaded_file($_FILES['servicos_imagem5']['tmp_name'], $DiretorioImg . $arquivo_nome);
		
		$Objconfiguracoes->servicos_imagem5				= $arquivo_nome;
		
	} else 
		$Objconfiguracoes->servicos_imagem5				= $ObjconfiguracoesAux->servicos_imagem5;
	
	if(!empty($_FILES['servicos_imagem6']['tmp_name'])){
		$arquivo_nome								= rand(00000, 99999) . '.' . ExtensaoArquivoSimples($_FILES['servicos_imagem6']['name']);
		move_uploaded_file($_FILES['servicos_imagem6']['tmp_name'], $DiretorioImg . $arquivo_nome);
		
		$Objconfiguracoes->servicos_imagem6				= $arquivo_nome;
		
	} else 
		$Objconfiguracoes->servicos_imagem6				= $ObjconfiguracoesAux->servicos_imagem6;
	
	if(!empty($_FILES['instagram_imagem']['tmp_name'])){
		$arquivo_nome								= rand(00000, 99999) . '.' . ExtensaoArquivoSimples($_FILES['instagram_imagem']['name']);
		move_uploaded_file($_FILES['instagram_imagem']['tmp_name'], $DiretorioImg . $arquivo_nome);
		
		$Objconfiguracoes->instagram_imagem				= $arquivo_nome;
		
	} else 
		$Objconfiguracoes->instagram_imagem				= $ObjconfiguracoesAux->instagram_imagem;
	
	if(empty($Objconfiguracoes->idconfiguracao))
		$Objconfiguracoes->idconfiguracao				= $idconfiguracao;
	
	if(!empty($_FILES['mapa_imagem']['tmp_name'])){
		$arquivo_nome								= rand(00000, 99999) . '.' . ExtensaoArquivoSimples($_FILES['mapa_imagem']['name']);
		move_uploaded_file($_FILES['mapa_imagem']['tmp_name'], $DiretorioImg . $arquivo_nome);
		
		$Objconfiguracoes->mapa_imagem					= $arquivo_nome;
		
	} else 
		$Objconfiguracoes->mapa_imagem					= $ObjconfiguracoesAux->mapa_imagem;
	
	$Objconfiguracoes->Insere();
	
	$Msg											= 'Configuração salva com sucesso !';
	$Direciona										= 'configuracoes/';

} else if(RecebeParametro('acao') == 'excluir'){
	if(($idconfiguracao != 0) && ($idconfiguracao != '')){
		$Objconfiguracoes->idconfiguracao				= $idconfiguracao;
		
		if(!empty($Objconfiguracoes->imagem) && !is_dir($DiretorioImgconfiguracao . $Objconfiguracoes->imagem) && file_exists($DiretorioImgconfiguracao . $Objconfiguracoes->imagem)){
			unlink($DiretorioImgconfiguracao . $Objconfiguracoes->imagem);
		}
		
		$Objconfiguracoes->Excluir();
		
		$Msg										= 'Configuração excluida com sucesso !';
		$Direciona									= 'configuracoes/';
	} else {
		$Msg										= 'Erro ao excluir Configuração !';
	}
}

if($idconfiguracao > 0){
	$Objconfiguracoes->idconfiguracao					= $idconfiguracao;
	$Objconfiguracoes->Seleciona();
}?>
<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="<?php echo $DiretorioVirtualRaiz?>">Página Inicial</a></li>
	<li class="breadcrumb-item"><a href="<?php echo $DiretorioVirtualRaiz?>configuracoes/">Configurações</a></li>
	<li class="breadcrumb-item active"><?php if(empty($Objconfiguracoes->titulo)) echo 'Nova Configuração'; else echo $Objconfiguracoes->titulo?></li>
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
<input type="hidden" name="idconfiguracao" id="idconfiguracao" value="<?php echo $Objconfiguracoes->idconfiguracao?>">
<input type="hidden" name="status" id="status" value="<?php echo $Objconfiguracoes->status?>">
<div class="card shadow h-100 py-2">
	<div class="card-header">Dados da Configuração</div>
	<div class="card-body">
		<div class="row">
			<div class="col-sm-12">
				Título <i class="fas fa-certificate text-primary"></i>
				<input type="text" name="titulo" id="titulo" value="<?php echo $Objconfiguracoes->titulo?>" class="form-control" placeholder="Título" required>
			</div>
			<div class="col-sm-12">
				Meta Tag <small>para o google</small>
				<input type="text" name="meta" id="meta" value="<?php echo $Objconfiguracoes->meta?>" class="form-control" placeholder="Meta Tag">
			</div>
			<div class="col-sm-12">
				Description <small>para o google</small>
				<textarea name="description" id="description" class="form-control" rows="3" maxlength="255" placeholder="Description"><?php echo $Objconfiguracoes->description?></textarea>
			</div>
			<div class="col-sm-4">
				Telefone 1 <i class="fas fa-certificate text-primary"></i>
				<input type="text" name="telefone1" id="telefone1" value="<?php echo $Objconfiguracoes->telefone1?>" class="form-control celular" placeholder="Telefone 1" required>
			</div>
			<div class="col-sm-4">
				Telefone 2 <i class="fas fa-certificate text-primary"></i>
				<input type="text" name="telefone2" id="telefone2" value="<?php echo $Objconfiguracoes->telefone2?>" class="form-control celular" placeholder="Telefone 2" required>
			</div>
			<div class="col-sm-4">
				Telefone 3 <i class="fas fa-certificate text-primary"></i>
				<input type="text" name="telefone3" id="telefone3" value="<?php echo $Objconfiguracoes->telefone3?>" class="form-control celular" placeholder="Telefone 3" required>
			</div>
			<div class="col-sm-6">
				Email <i class="fas fa-certificate text-primary"></i>
				<input type="text" name="email" id="email" value="<?php echo $Objconfiguracoes->email?>" class="form-control" placeholder="E-mail" required>
			</div>
			<div class="col-sm-6">
				Email Grupo <i class="fas fa-certificate text-primary"></i>
				<input type="text" name="emailgrupo" id="emailgrupo" value="<?php echo $Objconfiguracoes->emailgrupo?>" class="form-control" placeholder="E-mail de Grupo" required>
			</div>
			<div class="col-sm-12">
				Youtube <i class="fas fa-certificate text-primary"></i>
				<input type="text" name="youtube" id="youtube" value="<?php echo $Objconfiguracoes->youtube?>" class="form-control" placeholder="Link Youtube" required>
			</div>
			<div class="col-sm-12">
				Facebook <i class="fas fa-certificate text-primary"></i>
				<input type="text" name="facebook" id="facebook" value="<?php echo $Objconfiguracoes->facebook?>" class="form-control" placeholder="Link Facebook" required>
			</div>
			<div class="col-sm-12">
				Instagram <i class="fas fa-certificate text-primary"></i>
				<input type="text" name="instagram" id="instagram" value="<?php echo $Objconfiguracoes->instagram?>" class="form-control" placeholder="Link instagram" required>
			</div>
			<div class="col-sm-12">
				A Pousada (link youtube)
				<textarea name="apousada" id="apousada" class="form-control" placeholder="A Pousada (link youtube)"><?php echo $Objconfiguracoes->apousada?></textarea>
			</div>
			<div class="col-sm-12">
				Aviso (link youtube)
				<textarea name="aviso" id="aviso" class="form-control" placeholder="Aviso (link youtube)"><?php echo $Objconfiguracoes->aviso?></textarea>
			</div>
		</div>
	</div>
	<div class="card-header">Dados de Endereço</div>
	<div class="card-body">
		<div class="row">
			<div class="col-sm-2">
				Cep
				<input type="text" name="cep" id="cep" value="<?php echo $Objconfiguracoes->cep?>" placeholder="CEP" class="form-control cep">
			</div>
			<div class="col-sm-6">
				Endereço
				<input type="text" name="endereco" id="endereco" value="<?php echo $Objconfiguracoes->endereco?>" placeholder="Endereço" class="form-control">
			</div>
			<div class="col-sm-2">
				Número
				<input type="text" name="numero" id="numero" value="<?php echo $Objconfiguracoes->numero?>" placeholder="Número" class="form-control">
			</div>
			<div class="col-sm-2">
				Complemento
				<input type="text" name="complemento" id="complemento" value="<?php echo $Objconfiguracoes->complemento?>" placeholder="Complemento CASA/APTO" class="form-control">
			</div>
			<div class="col-sm-4">
				Bairro
				<input type="text" name="bairro" id="bairro" value="<?php echo $Objconfiguracoes->bairro?>" placeholder="Bairro" class="form-control">
			</div>
			<div class="col-sm-4">	
				Cidade
				<input type="text" name="cidade" id="cidade" value="<?php echo $Objconfiguracoes->cidade?>" placeholder="Cidade" class="form-control">
			</div>
			<div class="col-sm-4">
				UF
				<input type="text" name="uf" id="uf" value="<?php echo $Objconfiguracoes->uf?>" placeholder="UF" class="form-control">
			</div>
		</div>
	</div>
	<div class="card-header">SERVIÇOS</div>
	<div class="card-body">
		Imagem 1
		<input type="file" name="servicos_imagem1" id="servicos_imagem1" class="form-control" placeholder="Imagem 1">
		
		Descrição 1
		<textarea name="servicos_descricao1" id="servicos_descricao1" class="form-control" placeholder="Descrição 1"><?php echo $Objconfiguracoes->servicos_descricao1?></textarea>
		
		Imagem 2
		<input type="file" name="servicos_imagem2" id="servicos_imagem2" class="form-control" placeholder="Imagem 2">
		
		Descrição 2
		<textarea name="servicos_descricao2" id="servicos_descricao2" class="form-control" placeholder="Descrição 2"><?php echo $Objconfiguracoes->servicos_descricao2?></textarea>
		
		Imagem 3
		<input type="file" name="servicos_imagem3" id="servicos_imagem3" class="form-control" placeholder="Imagem 3">
		
		Descrição 3
		<textarea name="servicos_descricao3" id="servicos_descricao3" class="form-control" placeholder="Descrição 3"><?php echo $Objconfiguracoes->servicos_descricao3?></textarea>
		
		Imagem 4
		<input type="file" name="servicos_imagem4" id="servicos_imagem4" class="form-control" placeholder="Imagem 4">
		
		Descrição 4
		<textarea name="servicos_descricao4" id="servicos_descricao4" class="form-control" placeholder="Descrição 4"><?php echo $Objconfiguracoes->servicos_descricao4?></textarea>
		
		Imagem 5
		<input type="file" name="servicos_imagem5" id="servicos_imagem5" class="form-control" placeholder="Imagem 5">
		
		Descrição 5
		<textarea name="servicos_descricao5" id="servicos_descricao5" class="form-control" placeholder="Descrição 5"><?php echo $Objconfiguracoes->servicos_descricao5?></textarea>
		
		Imagem 6
		<input type="file" name="servicos_imagem6" id="servicos_imagem6" class="form-control" placeholder="Imagem 6">
		
		Descrição 6
		<textarea name="servicos_descricao6" id="servicos_descricao6" class="form-control" placeholder="Descrição 6"><?php echo $Objconfiguracoes->servicos_descricao6?></textarea>
		
		Instagram Link
		<textarea name="instagram_link" id="instagram_link" class="form-control" placeholder="Instagram Link"><?php echo html_entity_decode($Objconfiguracoes->instagram_link)?></textarea>
		
		Instagram Imagem
		<input type="file" name="instagram_imagem" id="instagram_imagem" class="form-control" placeholder="Instagram Imagem">
		
		Mapa Imagem
		<input type="file" name="mapa_imagem" id="mapa_imagem" class="form-control" placeholder="Mapa Imagem">
	</div>
	<div class="card-footer text-center">
		<div class="btn-group" role="group">
			<button type="button" class="btn btn-primary" onclick="javascript: window.history.go(-1)">voltar</button>
			<button type="submit" name="acao" value="salvar" class="btn btn-success">salvar</button>
			<?php
			if(!empty($Objconfiguracoes->idconfiguracao)){?>
				<button type="submit" name="acao" value="excluir" formnovalidate class="btn btn-danger">excluir</button>
				<?php
			}?>
		</div>
	</div>
</div>
</form>
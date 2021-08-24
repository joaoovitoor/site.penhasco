<?php
if(RecebeParametro('idmapa') > 0){
	$ObjmapasAux						= New mapas;
	$ObjmapasAux->idmapa				= (int) RecebeParametro('idmapa');
	$ObjmapasAux->Seleciona();
}

if(is_array($_POST))
	foreach($_POST as $key => $value)
		$Objmapas->$key					= filter_var($value, FILTER_SANITIZE_STRING);
	
$Objmapas->dataultimaatualizacao			= date('Y-m-d H:i:s');

if(empty($Objmapas->datacadastro))
	$Objmapas->datacadastro				= date('Y-m-d H:i:s');

if(RecebeParametro('acao') == 'salvar'){
	if(empty($Objmapas->status))
		$Objmapas->status					= 1;
	
	$Objmapas->conteudo						= htmlentities(strip_tags(stripslashes($_POST['conteudo']), $allowedTags));
	
	if(!empty($_FILES['imagem']['tmp_name'])){
		$arquivo_nome						= rand(00000, 99999) . '.' . ExtensaoArquivoSimples($_FILES['imagem']['name']);
		
		move_uploaded_file($_FILES['imagem']['tmp_name'], $DiretorioImg . $arquivo_nome);
		
		$Objmapas->imagem				= $arquivo_nome;
		
	} else 
		$Objmapas->imagem				= $ObjmapasAux->imagem;
	
	
	if(!empty($Objmapas->titulo))
		$Objmapas->Insere();
	
	if(empty($Objmapas->idmapa))
		$Objmapas->idmapa			= (int) RecebeParametro('idmapa');
	
	$Msg									= 'Mapa salvo com sucesso!';
	$Direciona								= 'mapas/';

} else if(RecebeParametro('acao') == 'excluir'){
	if((int) RecebeParametro('idmapa') > 0){
		$Objmapas->idmapa				= (int) RecebeParametro('idmapa');
		$Objmapas->Excluir();
		
		$Msg								= 'Mapa excluido com sucesso!';
		$Direciona							= 'mapas/';
	} else {
		$Msg								= 'Erro ao excluir Mapa!';
	}
}

if((int) RecebeParametro('idmapa') > 0){
	$Objmapas->idmapa						= (int) RecebeParametro('idmapa');
	$Objmapas->Seleciona();
}?>
<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="<?php echo $DiretorioVirtualRaiz?>">Página Inicial</a></li>
	<li class="breadcrumb-item">Mapas</li>
	<li class="breadcrumb-item active"><?php echo $Objmapas->titulo?></li>
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
<script src="https://cdn.tiny.cloud/1/qagffr3pkuv17a8on1afax661irst1hbr4e6tbv888sz91jc/tinymce/5/tinymce.min.js"></script>
<script language="javascript" type="text/javascript">

tinymce.init({
  selector: 'textarea',
  height: 500,
  menubar: false,
  plugins: [
    'textcolor advlist autolink lists link image charmap print preview anchor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table paste code help wordcount'
  ],
  toolbar: 'undo redo | formatselect | ' + 
  'bold italic forecolor backcolor | alignleft aligncenter ' +
  'alignright alignjustify | bullist numlist outdent indent | ' +
  'removeformat | help',
  content_css: '//www.tiny.cloud/css/codepen.min.css'
});


</script>

<form class="form-horizontal form-label-left" name="form1" method="post" enctype="multipart/form-data">
<input type="hidden" name="master" id="master" value="<?php echo $Objmapas->master?>"> 
<input type="hidden" name="idmapa" id="idmapa" value="<?php echo $Objmapas->idmapa?>"> 
<div class="card mx-auto mt-12">
	<div class="card-header">Dados do Mapa</div>
	<div class="card-body">
		Título*
		<input type="text" name="titulo" id="titulo" value="<?php echo $Objmapas->titulo?>" class="form-control" placeholder="Título" required>
		
		<a class="btn btn-primary my-3 text-light">
			Marcar no Mapa
		</a>
		<br>

		<img id="bannerformmodal" src="<?php echo $DiretorioVirtualImg . $Objconfiguracoes->mapa_imagem?>">
		<br>
		Área Marcação <small>para geração do mapa</small>
		<input type="text" name="area" id="area" class="form-control" value="<?php echo $Objmapas->area?>">
		
		Conteúdo
		<textarea name="conteudo" id="conteudo" class="form-control" rows="2" placeholder="Conteúdo"><?php echo $Objmapas->conteudo?></textarea>
		
		Imagem
		<input type="file" name="imagem" id="imagem" placeholder="Selecione uma foto" class="form-control">
		<?php
		if(!empty($Objmapas->imagem) && !is_dir($DiretorioImg . $Objmapas->imagem) && file_exists($DiretorioImg . $Objmapas->imagem)){?>
			<img src="<?php echo $DiretorioVirtualImg . $Objmapas->imagem?>" class="thumbnail my-2" style="max-height: 110px">
			<?php
		}?>
	</div>
	<div class="card-footer text-center">
		<button type="button" class="btn btn-primary" onclick="javascript: window.history.go(-1)">voltar</button>
		<button type="submit" name="acao" value="salvar" class="btn btn-success">salvar</button>
		<?php
		if(($Objmapas->idmapa > 0) && ($_SESSION['master'] == 1)){?>
			<button type="submit" name="acao" value="excluir" class="btn btn-danger">excluir</button>
			<?php
		}?>
	</div>
</div>
</form>
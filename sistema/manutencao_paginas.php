<?php
if(is_array($_POST))
	foreach($_POST as $key => $value)
		$Objpaginas->$key						= $value;
	
$Objpaginas->dataultimaatualizacao				= date('Y-m-d H:i:s');
if(empty($Objpaginas->datacadastro))
	$Objpaginas->datacadastro					= date('Y-m-d H:i:s');

if(RecebeParametro('acao') == 'salvar'){
	if(is_array($_POST['idalbuns']))
		$Objpaginas->idalbuns					= implode(',', $_POST['idalbuns']);
	
	$Objpaginas->descricao						= htmlentities(strip_tags(stripslashes($_POST['descricao']), $allowedTags));
	$Objpaginas->Insere();
	
	if(empty($Objpaginas->idpagina))
		$Objpaginas->idpagina					= RecebeParametro('idpagina');
	
	$Msg										= 'Página salva com sucesso!';
	$Direciona									= 'paginas/alterar/' . $Objpaginas->idpagina;

} 

if(RecebeParametro('acao2') == 'salvarlink'){
	$Objpaginaslinks->idpaginalink				= RecebeParametro('idpaginalink');
	$Objpaginaslinks->idpagina					= RecebeParametro('idpagina');
	$Objpaginaslinks->titulo					= RecebeParametro('links_titulo');
	$Objpaginaslinks->descricao					= htmlentities(strip_tags(stripslashes($_POST['links_descricao']), $allowedTags));
	$Objpaginaslinks->botao						= RecebeParametro('links_botao');
	$Objpaginaslinks->nomebotao					= RecebeParametro('links_nomebotao');
	$Objpaginaslinks->ordem						= RecebeParametro('ordem');
	$Objpaginaslinks->datacadastro				= date('Y-m-d H:i:s');
	$Objpaginaslinks->dataultimaatualizacao		= date('Y-m-d H:i:s');
	$Objpaginaslinks->Insere();
	
	$Msg										= 'Link salvo com sucesso!';
	$Direciona									= 'paginas/alterar/' . $Objpaginas->idpagina;
}

if(RecebeParametro('acao') == 'excluir'){
	if((RecebeParametro('idpagina') != 0) && (RecebeParametro('idpagina') != '')){
		$Objpaginas->idpagina					= RecebeParametro('idpagina');
		$Objpaginas->Excluir();
		
		$Msg									= 'Página excluida com sucesso!';
		$Direciona								= ' /';
	} else {
		$Msg									= 'Erro ao excluir Página!';
	}
}

if(RecebeParametro('acao2') == 'excluirlink'){
	$Objpaginaslinks->idpaginalink			= RecebeParametro('idpaginalink');
	$Objpaginaslinks->Excluir();
	
	$Msg										= 'Link excluido com sucesso!';
	$Direciona									= 'paginas/alterar/' . $Objpaginas->idpagina;
}

if(RecebeParametro('idpagina') > 0){
	$Objpaginas->idpagina						= RecebeParametro('idpagina');
	$Objpaginas->Seleciona();
	
	$ArrLinks									= SelecionaBanco('select * from paginaslinks where idpagina = ' . $Objpaginas->idpagina . ' order by abs(ordem) asc');
}?>
<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="<?php echo $DiretorioVirtualRaiz?>">Página Inicial</a></li>
	<li class="breadcrumb-item">Páginas</li>
	<li class="breadcrumb-item active"><?php if(empty($Objpaginas->titulo)) echo 'Nova Página'; else echo $Objpaginas->titulo?></li>
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
<input type="hidden" name="acao2" id="acao2">
<input type="hidden" name="idpaginalink" id="idpaginalink">
<input type="hidden" name="idpagina" id="idpagina" value="<?php echo $Objpaginas->idpagina?>">
<input type="hidden" name="status" id="status" value="<?php echo $Objpaginas->status?>">
<div class="card shadow h-100 py-2">
	<div class="card-header">Dados da Página</div>
	<div class="card-body">
		Título <i class="fas fa-certificate text-primary"></i>
		<input type="text" name="titulo" id="titulo" value="<?php echo $Objpaginas->titulo?>" class="form-control" placeholder="Título" required>
		
		Álbuns
		<select name="idalbuns[]" id="idalbuns[]" class="form-control selectpicker" multiple data-title="Selecione os Álbuns" data-width="100%">
			<?php
			$ArrAlbuns		= SelecionaBanco('select * from albuns order by titulo asc');
			if(!empty($Objpaginas->idalbuns))
				$ArrAlbunsAdicionados	= explode(',', $Objpaginas->idalbuns);
			
			if(is_array($ArrAlbuns)){
				foreach($ArrAlbuns as $album){
					$selected		= '';
					if(in_array($album['idalbum'], $ArrAlbunsAdicionados))
						$selected	= 'selected';
					
					echo '<option value="' . $album['idalbum'] . '" ' . $selected . '> ' . $album['titulo'] . '</option>';
				}
			}?>
		</select>
		
		Descrição
		<textarea name="descricao" id="descricao" class="form-control" rows="5" placeholder="Descrição"><?php echo $Objpaginas->descricao?></textarea>
	</div>
	<div class="card-header">Links da Página</div>
	<div class="card-body">	
		<div class="row">
			<input type="hidden" name="ordem" id="ordem">
			<div class="col-sm-4">
				Título <i class="fas fa-certificate text-primary"></i><br>
				<input type="text" name="links_titulo" id="links_titulo" class="form-control">
			</div>
			<div class="col-sm-4">
				Botão <small>link do botão</small><br>
				<input type="text" name="links_botao" id="links_botao" class="form-control">
			</div>
			<div class="col-sm-4">
				Nome do Botão<br>
				<input type="text" name="links_nomebotao" id="links_nomebotao" class="form-control">
			</div>
			<div class="col-sm-12">
				Descrição <i class="fas fa-certificate text-primary"></i><br>
				<textarea name="links_descricao" id="links_descricao" class="form-control" rows="3"></textarea>
			</div>
			<div class="col-sm-12 mt-2">
				<button class="btn btn-block btn-success" type="button" onclick="SalvarLink()"> salvar link</button>
			</div>
		</div>
		
		<?php
		if(is_array($ArrLinks)){?>
			<ul class="list-group shadow h-100 mt-2" id="links">
				<?php
				foreach($ArrLinks as $campo){?>
					<li class="list-group-item w-100 justify-content-between" id="idpaginalink-<?php echo $campo['idpaginalink']?>"> 
						<h5 class="mb-1"><?php echo $campo['titulo']?></h5>
						<strong><?php echo $campo['botao']?> - <?php echo $campo['nomebotao']?></strong>
						<small class="float-right text-right">
							<button class="btn btn-primary btn-sm" type="button" onclick="AlterarLink(<?php echo $campo['idpaginalink']?>, '<?php echo $campo['titulo']?>', '<?php echo urlencode(html_entity_decode($campo['descricao']))?>', '<?php echo $campo['botao']?>', '<?php echo $campo['nomebotao']?>', <?php echo $campo['ordem']?>)"><i class="fas fa-edit"></i></button>
							<button class="btn btn-danger btn-sm" type="button" onclick="ExcluirLink(<?php echo $campo['idpaginalink']?>)"><i class="fas fa-eraser"></i></button>
						</small>
						<small>
							<?php echo html_entity_decode($campo['descricao'])?><br>
						</small>
					</li>
					<?php
				}?>
			</ul>
		<?php
		}?>
	</div>
	<div class="card-footer text-center">
		<div class="btn-group" role="group">
			<button type="button" class="btn btn-primary" onclick="javascript: window.history.go(-1)">voltar</button>
			<?php
			if(!empty($Objpaginas->idpagina)){?>
				<button type="submit" name="acao" value="salvar" class="btn btn-success">salvar</button>
				<button type="submit" name="acao" value="excluir" formnovalidate class="btn btn-danger">excluir</button>
				<?php
			} else {?>
				<button type="submit" name="acao" value="salvar" class="btn btn-warning">continuar</button>
				<?php
			}?>
		</div>
	</div>
</div>
</form>
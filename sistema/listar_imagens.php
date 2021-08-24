<?php
//exit(phpinfo());
$condicao		= '';
$comp			= '';

if(RecebeParametro('acao2') == 'apagarimagem'){
	$Objimagens->idimagem								= RecebeParametro('idimagem');
	$Objimagens->Seleciona();
	
	unlink($DiretorioImg . $Objimagens->arquivo);
	
	$Objimagens->Excluir();
	
	$Msg		= 'Imagem excluida com sucesso!';
}

if(RecebeParametro('acao') == 'enviarimagens'){
	if(is_array($_FILES['imagens']['tmp_name'])){
		foreach($_FILES['imagens']['tmp_name'] as $key => $tmp_name){
			if(!empty($_FILES['imagens']['tmp_name'][$key])){
				$arquivo_nome								= rand(00000, 99999) . '.' . ExtensaoArquivoSimples($_FILES['imagens']['name'][$key]);
				move_uploaded_file($_FILES['imagens']['tmp_name'][$key], $DiretorioImg . $arquivo_nome);
				
				$Objimagens								= New imagens;
				$Objimagens->arquivo					= $arquivo_nome;
				$Objimagens->arquivonome				= $_FILES['imagens']['name'][$key];
				$Objimagens->datacadastro				= date('Y-m-d H:i:s');
				$Objimagens->dataultimaatualizacao		= date('Y-m-d H:i:s');
				$Objimagens->Insere();
			}
		}
	}
	
	$Msg		= 'Imagens enviadas com sucesso!';
}

if(!empty($condicao))
	$condicao	= ' where ' . $condicao;

$ArrRegistros	= SelecionaBanco('select * from imagens');
?>
<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="<?php echo $DiretorioVirtualRaiz?>">Página Inicial</a></li>
	<li class="breadcrumb-item active"><a href="<?php echo $DiretorioVirtualRaiz?>imagens/">Banco de Imagens</a></li>
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
	<input type="hidden" name="acao2" id="acao2">
	<input type="hidden" name="idimagem" id="idimagem">
	<div class="row">
		<div class="col-sm-12">
			<div class="input-group">
				<input type="file" name="imagens[]" id="imagens" class="form-control" accept=".jpg, .jpeg, .png" multiple placeholder="Selecione as Imagens">
				<div class="input-group-append">
					<button class="btn btn-warning" name="acao" value="enviarimagens" type="submit">Enviar para o Banco</button>
				</div>	
			</div>	
		</div>
	</div>

	<div class="clearfix" style="height: 10px"></div>
	
	<div class="row">
	<?php
	if(is_array($ArrRegistros)){
		foreach($ArrRegistros as $campo){?>
			<div class="col-sm-2">
				<div class="card">
					<img src="<?php echo $DiretorioVirtualRaiz . 'redimensionaimagem.php?width=300&height=300&imagem=' . $DiretorioImg . $campo['arquivo']?>" class="card-img-top">
					<div class="card-body">
						<h5 class="card-title"><small><?php echo $campo['arquivonome']?></small></h5>
						<small>Cadastrado: <?php echo FormataDataPagina($campo['datacadastro'])?></small>
						<a href="Javascript:void(0);" onclick="DeletaImagem(<?php echo $campo['idimagem']?>)" class="btn btn-sm btn-danger float-right"><i class="fas fa-eraser"></i></a>
					</div>
				</div>
			</div>
			<?php
		}
	}?>
	</div>
</form>
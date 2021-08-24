<?php
$condicao		= '';
$comp			= '';
$status			= '';

if(!empty($_POST['status'])){
	$condicao	.= $comp . 'albuns.status in(' . implode(",", $_POST['status']) . ')';
	$comp		= ' and ';
}

if(RecebeParametro('titulo') != ''){
	$condicao	.= $comp . '(';
	
	$condicao	.= '(albuns.titulo like "%' . RecebeParametro('titulo') . '%")';
	$comp		= ' or ';
	
	$condicao	.= ')';
	$comp		= ' and ';
}

if(!empty($condicao))
	$condicao	= ' where ' . $condicao;

$ArrRegistros	= SelecionaBanco('select * from albuns ' . $condicao . ' order by idalbum desc');
?>
<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="<?php echo $DiretorioVirtualRaiz?>">Página Inicial</a></li>
	<li class="breadcrumb-item active"><a href="<?php echo $DiretorioVirtualRaiz?>albuns/">Álbuns</a></li>
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
<div class="row">
	<div class="col-sm-12">
		<a href="<?php echo $DiretorioVirtualRaiz?>albuns/novo/" class="btn btn-default btn-sm"><i class="fas fa-plus"></i> Adicionar</a>
	</div>
	<div class="col-sm-12">
		<div class="input-group">
			<input type="text" name="titulo" id="titulo" value="<?php echo RecebeParametro('titulo')?>" class="form-control" placeholder="Título do Álbum">
			<div class="input-group-append">
				<button class="btn btn-primary" type="submit">Buscar</button>
			</div>	
		</div>	
	</div>
</div>

<div class="clearfix" style="height: 10px"></div>

<div class="list-group shadow h-100">
<?php
if(is_array($ArrRegistros)){
	foreach($ArrRegistros as $campo){
		if(!empty($campo['idimagens']))
			$ArrFotos			= explode(',', $campo['idimagens']);
		?>
		<div class="list-group-item list-group-item-action flex-column align-items-start ">
			<div class=" w-100 justify-content-between">
				<h5 class="mb-1"><?php echo $campo['titulo']?></h5>
				<strong><?php echo $ArrStatusTiposIngressos[$campo['status']]?></strong>
			</div>
			<small class="float-right text-right">
				<a href="<?php echo $DiretorioVirtualRaiz?>albuns/alterar/<?php echo $campo['idalbum']?>" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
			</small>
			<small>
				Este Álbum possui <?php echo ContaTotal($ArrFotos)?> fotos<br>
				<?php echo nl2br($campo['descricao'])?><br>
			</small>
		</div>
		<?php
	}
}?>
</div>
</form>
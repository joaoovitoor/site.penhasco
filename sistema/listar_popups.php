<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="<?php echo $DiretorioVirtualRaiz?>">Página Inicial</a></li>
	<li class="breadcrumb-item active">Popups</li>
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
 

	<div class="row">
		<div class="col-sm-4">
			<a href="<?php echo $DiretorioVirtualRaiz?>popups/novo/" class="btn btn-default btn-sm"><i class="fas fa-plus"></i> Adicionar</a>
		</div>
	</div>

	<div class="clearfix" style="height: 10px"></div>

	<div class="list-group shadow h-100">
	<?php
	$ArrRegistros			= SelecionaBanco('select * from popups');
	if(is_array($ArrRegistros)){
		foreach($ArrRegistros as $campo){?>
			<div class="list-group-item list-group-item-action flex-column align-items-start ">
				<div class=" w-100 justify-content-between">
					<h5 class="mb-1"><?php echo $campo['titulo']?></h5>
				</div>
				<small class="float-right text-right">
					<br>
					<a href="<?php echo $DiretorioVirtualRaiz?>popups/alterar/<?php echo $campo['idpopup']?>" class="btn btn-default btn-sm"><i class="fas fa-edit"></i> editar</a>
				</small>
				<small>
					<?php echo $ArrStatusTiposIngressos[$campo['status']]?><BR>
					<td><?php echo FormataDataHoraPagina($campo['datacadastro'])?></td>
				</small>
			</div>
			<?php
		}
	}?>

</form>
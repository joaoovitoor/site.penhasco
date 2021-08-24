<?php
require_once('variavelglobal.php');
require_once($DiretorioInclude.'includes.php');

$condicao			= '';
$comp				= '';

if(!empty($_GET['idimagens'])){
	$condicao		.= $comp . 'idimagem not in(' . $_GET['idimagens'] . ')';
	$comp			= ' and ';
}

if(!empty($condicao))
	$condicao		= ' where ' . $condicao;
?>
<div class="card">
	<div class="card-header">
		<h5 class="card-title" id="exampleModalLabel">Banco de Imagens <button class="close float-right" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></h5>
	</div>
	<div class="card-body">
		<div class="row">
		<?php
		$ArrRegistros	= SelecionaBanco('select * from imagens' . $condicao);
		if(is_array($ArrRegistros)){
			foreach($ArrRegistros as $campo){?>
				<div class="col-sm-2">
					<div class="card">
						<img src="<?php echo $DiretorioVirtualRaiz . 'redimensionaimagem.php?width=300&height=300&imagem=' . $DiretorioImg . $campo['arquivo']?>" class="card-img-top">
						<div class="card-body text-center">
							<input type="checkbox" name="idimagem[]" id="idimagem[]" value="<?php echo $campo['idimagem']?>">
						</div>
					</div>
				</div>
				<input type="hidden" name="caminho[<?php echo $campo['idimagem']?>]" id="caminho[<?php echo $campo['idimagem']?>]" value="<?php echo $DiretorioVirtualRaiz . 'redimensionaimagem.php?width=300&height=300&imagem=' . $DiretorioImg . $campo['arquivo']?>">
				<?php
			}
		}?>
		</div>
	</div>
	<div class="card-footer">
		<a class="btn btn-success btn-block btn-sm text-white" onclick="AdicionarImagensCallback()">ADICIONAR SELECIONADOS</a>
	</div>
</div>
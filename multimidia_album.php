<?php
$Objalbuns->idalbum					= RecebeParametro('idalbum');
$Objalbuns->Seleciona();
?>
<div class="container-fluid" style="background-color: #Fbf8dc">
	<div class="container pt-1 pb-3" style="background-color: #Fbf8dc">
		<div class="row">
			<div class="col-sm-12 mb-1 py-1">
				<h1 class="display-4 font-weight-bold" style="color: #005100"><?php echo $Objalbuns->titulo?> <a href="<?php echo $DiretorioVirtualRaiz?>multimidia/" class="btn btn-warning btn-lg float-right"> Voltar para Multimidia</a></h1>
				<br>
				
				<?php echo html_entity_decode($Objalbuns->descricao)?>
			</div>
			<div class="col-sm-12">
				<?php
				$ArrImagens		= SelecionaBanco('select * from imagens where idimagem in(' . $Objalbuns->idimagens . ')');?>
				<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						<?php
						$active				= 'class="active"';
						for($i = 0; $i < ContaTotal($ArrImagens); $i++){?>
							<li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $i?>" <?php echo $active?>></li>
							<?php
							$active				= '';
						}?>
					</ol>

					<div class="carousel-inner" role="listbox">
					<?php
					$active						= ' active';
					if(is_array($ArrImagens)){
						foreach($ArrImagens as $campo){?>
							<div class="carousel-item<?php echo $active?>">
								<img src="<?php echo $DiretorioVirtualRaiz . 'redimensionaimagem.php?width=1920&height=1080&imagem=' . $DiretorioImg . $campo['arquivo']?>" class="d-block w-100">
							</div>
						  <?php
						  $active				= '';
						}
					}?>
					</div>
					<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Anterior</span>
					</a>
					<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Próximo</span>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
$Objpaginas->idpagina			= RecebeParametro('idpagina');
$Objpaginas->Seleciona();
?>
<div class="container-fluid" style="background-color: #Fbf8dc">
	<div class="container pt-1 pb-3" style="background-color: #Fbf8dc">
		<div class="row">
			<div class="col-lg-8 mb-1 py-1">
				<h1 class="display-4 font-weight-bold" style="color: #005100"><?php echo $Objpaginas->titulo?></h1>
				<br>
				
				<?php echo html_entity_decode($Objpaginas->descricao)?>
				
				<?php
				if(!empty($Objpaginas->idalbuns))
					$ArrImagensAlbun	= SelecionaBanco('select group_concat(albuns.idimagens) as idimagens from albuns where idalbum in(' . $Objpaginas->idalbuns . ')');
				if(!empty($ArrImagensAlbun[0]['idimagens']))
					$ArrImagens			= SelecionaBanco('select * from imagens where idimagem in (' . $ArrImagensAlbun[0]['idimagens'] . ') order by rand()');
				?>
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
								<img src="<?php echo $DiretorioVirtualRaiz . 'redimensionaimagem.php?width=730&height=410&imagem=' . $DiretorioImg . $campo['arquivo']?>" class="d-block w-100">
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
			<div class="col-lg-4 mb-1 py-1">
				<div class="accordion" id="accordionExample">
					<?php
					$show					= '';
					$ArrPaginasLinks		= SelecionaBanco('select * from paginaslinks where idpagina = ' . $Objpaginas->idpagina . ' order by ordem');
					if(is_array($ArrPaginasLinks)){
						foreach($ArrPaginasLinks as $campo){?>
							<div class="card mb-2" style="border: 2px solid #000000">
								<div class="card-header  text-center" id="headingOne" style="background-color: #Ede125"> 
									<button class="btn btn-block btn-link text-dark font-weight-bold" style="font-size: 140%; text-decoration: none;" type="button" data-toggle="collapse" data-target="#collapse<?php echo $campo['idpaginalink']?>" aria-expanded="true" aria-controls="collapse<?php echo $campo['idpaginalink']?>">
										<i class="fas fa-info-circle float-left"></i> <?php echo $campo['titulo']?>
									</button>
								</div>

								<div id="collapse<?php echo $campo['idpaginalink']?>" class="collapse <?php echo $show?>" aria-labelledby="heading<?php echo $campo['idpaginalink']?>" data-parent="#accordionExample" style="background-color: #Fbf8dc">
									<div class="card-body">
										<?php echo trim(html_entity_decode($campo['descricao']))?>
										<?php
										if(!empty($campo['botao'])){?>
											<div class="container-fluid text-center"><a href="<?php echo $campo['botao']?>" class="btn btn-secondary"><?php echo $campo['nomebotao']?></a></div>
											<?php
										}?>
										</div>
								</div>
							</div>
							<?php
							$show			= '';
						}
					}?>
				</div>
			</div>
		</div>
	</div>
</div>
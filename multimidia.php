<div class="container-fluid" style="background-color: #Fbf8dc">
	<div class="container pt-1 pb-3" style="background-color: #Fbf8dc">
		<!--<h1 class="display-4 font-weight-bold" style="color: #005100">MULTIMIDIA</h1>-->
		<div class="jumbotron container mt-4 text-light" style="background-color: #8c8a7a; padding-top: 20px; padding-bottom: 20px; ">
			<h1 class="font-weight-bold" style="font-size: 200%; color: #FFFFFF; ">FOTOS</h1>
			<?php
			$ArrAlbuns = SelecionaBanco('select * from albuns where status = 1 order by titulo asc');
			if(is_array($ArrAlbuns)){?>
				<div class="row">
				<?php
				foreach($ArrAlbuns as $campo){
					$ArrRegistros		= SelecionaBanco('select * from imagens where idimagem in(' . $campo['idimagens'] . ') order by rand()');?>
					<div class="col-sm-4 mb-3">
						<div class="card escuro" style="width: 100%;">
							<img class="card-img-top" src="<?php echo $DiretorioVirtualRaiz . 'redimensionaimagem.php?width=328&height=184&imagem=' . $DiretorioImg . $ArrRegistros[0]['arquivo']?>">
							<div class="card-body">
								<p class="card-text text-center" style="font-weight: bold;"><?php echo $campo['titulo']?> <a href="<?php echo $DiretorioVirtualRaiz?>multimidia/<?php echo $campo['idalbum']?>" class="btn btn-light btn-sm float-right"><i class="fa fa-search" aria-hidden="true"></i></a></p>
							</div>
						</div>
					</div>
					<?php
				}?>
				</div>
				<?php
			}?>
			
			<h1 class="font-weight-bold" style="font-size: 200%; color: #FFFFFF; ">VÍDEOS</h1>
			<iframe width="100%" height="315" src="https://www.youtube.com/embed/videoseries?list=PLmtvMJWna7E2G-B3x66X8jFkTrpn9ZURW" frameborder="0" allow="accelerometer; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

		</div>
	</div>
</div>
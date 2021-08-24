<header style="background-color: #Fbf8dc">
	<div class="d-none">
	<?php
	$ArrImagensAlbun	= SelecionaBanco('select albuns.idimagens from albuns where idalbum = 3');
	$ArrImagens			= SelecionaBanco('select * from imagens where idimagem in (' . $ArrImagensAlbun[0]['idimagens'] . ')');
	if(is_array($ArrImagens)){
		foreach($ArrImagens as $campo){?>
			<link rel="preload" as="image" href="<?php echo $DiretorioVirtualRaiz . 'redimensionaimagem.php?width=1920&height=1080&imagem=' . $DiretorioImg . $campo['arquivo']?>">

			<?php
		}
	}
	?>
	</div>
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

		<div class="carousel-inner" id="home" role="listbox">
			<?php
			$active						= ' active';
			if(is_array($ArrImagens)){
				foreach($ArrImagens as $campo){?>
					<!--<div class="carousel-item<?php echo $active?>" style="background-image: url('<?php echo $DiretorioVirtualRaiz . 'redimensionaimagem.php?width=1920&height=1080&imagem=' . $DiretorioImg . $campo['arquivo']?>')">-->
					<div class="carousel-item<?php echo $active?>" style="background-image: url('<?php echo $DiretorioVirtualImg . $campo['arquivo']?>')">
						<div class="carousel-caption"></div>
					</div>
				  <?php
				  $active				= '';
				}
			}?>
			<div class="carousel-caption">
				<div class="btn-group btn-vertical" role="group">
					<a href="#myModal" target="#myModal" data-toggle="modal" data-src="<?php echo $Objconfiguracoes->apousada?>" class="btn btn-success escuro btn-lg d-none d-lg-block video-btn" ><i class="fab fa-youtube fa-2x"></i> <br>A POUSADA<br><small style="font-size: 60%"><!-- style="line-height: 15px" (em 3 minutos)--></small></a>
					<div class="btn-group dropup">
						<button class="btn btn-success escuro btn-lg d-none d-lg-block dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<i class="fas fa-bed fa-2x"></i> <br>HOSPEDAGEM
						</button>
						<div class="dropdown-menu w-100 colado escuro" aria-labelledby="dropdownMenuButton">
							<a class="dropdown-item text-white" href="<?php echo $DiretorioVirtualRaiz?>hospedagem/">Informações</a>
							<a class="dropdown-item text-white" href="<?php echo $DiretorioVirtualRaiz?>aviso/">Reserva</a>
						</div>
					</div>
					<div class="btn-group dropup">
						<button class="btn btn-success escuro btn-lg d-none d-lg-block dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<i class="fas fa-umbrella-beach fa-2x"></i> <br>DAY USE
						</button>
						<div class="dropdown-menu w-100 colado escuro" aria-labelledby="dropdownMenuButton">
							<a class="dropdown-item text-white" href="<?php echo $DiretorioVirtualRaiz?>-dayuse/">Informações</a>
							<a class="dropdown-item text-white" href="https://dayuse.penhasco.com.br/">Reserva</a>
						</div>
					</div>
					<div class="btn-group dropup">
						<button class="btn btn-success escuro btn-lg d-none d-lg-block dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<i class="fas fa-utensils fa-2x"></i> <br>ALMOÇO
						</button>
						<div class="dropdown-menu w-100 colado escuro" aria-labelledby="dropdownMenuButton">
							<a class="dropdown-item text-white" href="<?php echo $DiretorioVirtualRaiz?>gastronomia/">Informações</a>
							<a class="dropdown-item text-white" href="https://almoco.penhasco.com.br/">Reserva</a>
						</div>
					</div>
					<div class="btn-group dropup">
						<button class="btn btn-warning btn-lg dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<i class="fas fa-calendar-alt fa-2x"></i> <br>RESERVA ONLINE
						</button>
						<div class="dropdown-menu amareloescuro w-100  colado" aria-labelledby="dropdownMenuButton">
							<a class="dropdown-item text-dark" href="<?php echo $DiretorioVirtualRaiz?>aviso/">Hospedagem</a>
							<a class="dropdown-item text-dark" href="https://dayuse.penhasco.com.br/">Day Use</a>
							<a class="dropdown-item text-dark" href="https://almoco.penhasco.com.br/">Almoço</a>
						</div>
					</div>
				</div>
			</div>
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
</header>

<div class="container-fluid" id="divservicos" style="background-color: #Fbf8dc; display: none">
	<div class="container text-center">
		<BR><BR>
		
		<span class="display-4 font-weight-bold text-center" style="font-size: 250%; color: #005100; padding: 7px; border: 5px solid #005100; border-radius: 10px;">SERVIÇOS</span>
		<br><br>
		
		<span style="font-size: 150%; font-weight-light; padding-bottom: 5px; border-bottom: 1px solid #000000;">Uma excelente estrutura para que você tenha momentos inesquecíveis</span>
		<br><br>

		<div class="row my-4">
			<div class="col-lg-4 containerimagem" style="cursor: pointer" onclick="window.location = '<?php echo $DiretorioVirtualRaiz?>hospedagem/'">
				<img src="<?php echo $DiretorioVirtualRaiz . 'redimensionaimagem.php?width=350&height=197&imagem=' . $DiretorioImg . $Objconfiguracoes->servicos_imagem1?>" alt="Hospedagem" class="image img-fluid rounded">
				<div class="overlay">
					<div class="textstrong">HOSPEDAGEM</div>
					<div class="text">
						<?php echo nl2br($Objconfiguracoes->servicos_descricao1)?>
					</div>
				</div>
				<div class="overlayhome">
					<div class="texthome"></div>
				</div>
			</div>
			<div class="col-lg-4 containerimagem" style="cursor: pointer" onclick="window.location = '<?php echo $DiretorioVirtualRaiz?>-dayuse/'">
				<img src="<?php echo $DiretorioVirtualRaiz . 'redimensionaimagem.php?width=350&height=197&imagem=' . $DiretorioImg . $Objconfiguracoes->servicos_imagem2?>" alt="Day Use" class="image img-fluid rounded">
				<div class="overlay">
					<div class="textstrong">DAY USE</div>
					<div class="text">
						<?php echo nl2br($Objconfiguracoes->servicos_descricao2)?>
					</div>
				</div>
				<div class="overlayhome">
					<div class="texthome"></div>
				</div>
			</div>
			<div class="col-lg-4 containerimagem" style="cursor: pointer" onclick="window.location = '<?php echo $DiretorioVirtualRaiz?>reunioes/'">
				<img src="<?php echo $DiretorioVirtualRaiz . 'redimensionaimagem.php?width=350&height=197&imagem=' . $DiretorioImg . $Objconfiguracoes->servicos_imagem3?>" alt="Reuniões" class="image img-fluid rounded">
				<div class="overlay">
					<div class="textstrong">REUNIÕES E EVENTOS</div>
					<div class="text">
						<?php echo nl2br($Objconfiguracoes->servicos_descricao3)?>
					</div>
				</div>
				<div class="overlayhome">
					<div class="texthome"></div>
				</div>
			</div>
		</div>
		<div class="row my-4 mb-0">
			<div class="col-lg-4 containerimagem" style="cursor: pointer" onclick="window.location = '<?php echo $DiretorioVirtualRaiz?>gastronomia/'">
				<img src="<?php echo $DiretorioVirtualRaiz . 'redimensionaimagem.php?width=350&height=197&imagem=' . $DiretorioImg . $Objconfiguracoes->servicos_imagem4?>" alt="Gastronomia" class="image img-fluid rounded">
				<div class="overlay">
					<div class="textstrong">GASTRONOMIA</div>
					<div class="text">
						<?php echo nl2br($Objconfiguracoes->servicos_descricao4)?>
					</div>
				</div>
				<div class="overlayhome">
					<div class="texthome"></div>
				</div>
			</div>
			<div class="col-lg-4 containerimagem" style="cursor: pointer" onclick="window.location = '<?php echo $DiretorioVirtualRaiz?>lazer/'">
				<img src="<?php echo $DiretorioVirtualRaiz . 'redimensionaimagem.php?width=350&height=197&imagem=' . $DiretorioImg . $Objconfiguracoes->servicos_imagem5?>" alt="Lazer" class="image img-fluid rounded">
				<div class="overlay">
					<div class="textstrong">LAZER</div>
					<div class="text">
						<?php echo nl2br($Objconfiguracoes->servicos_descricao5)?>
					</div>
				</div>
				<div class="overlayhome">
					<div class="texthome"></div>
				</div>
			</div>
			<div class="col-lg-4 containerimagem" style="cursor: pointer" onclick="window.location = '<?php echo $DiretorioVirtualRaiz?>fazendinha/'">
				<img src="<?php echo $DiretorioVirtualRaiz . 'redimensionaimagem.php?width=350&height=197&imagem=' . $DiretorioImg . $Objconfiguracoes->servicos_imagem6?>" alt="FAZENDINHA, TRILHA E MIRANTE" class="image img-fluid rounded">
				<div class="overlay">
					<div class="textstrong">FAZENDINHA, TRILHA E MIRANTE</div>
					<div class="text">
						<?php echo nl2br($Objconfiguracoes->servicos_descricao6)?>
					</div>
				</div>
				<div class="overlayhome">
					<div class="texthome"></div>
				</div>
			</div>
			<!--
			<div class="col-lg-4 containerimagem">
				<img src="http://penhasco.com.br/sistema/redimensionaimagem.php?width=480&height=250&imagem=/home1/penhas41/public_html/img/75798.png" alt="Mirante" class="image img-fluid">
				<div class="overlay">
					<div class="text">Mirante</div>
				</div>
				<div class="overlayhome">
					<div class="texthome">Mirante</div>
				</div>
			</div>
			-->
		</div>
	</div>
	<br>

<div class="row">
	<a href="<?php echo $DiretorioVirtualRaiz?>aviso/"><img src="<?php echo $DiretorioVirtualRaiz?>redimensionaimagem.php?width=1920&height=264&imagem=<?php echo $DiretorioImg?>banner.jpg" class="img-fluid" border="0"></a>
</div>
<div class="container my-4">
	<div class="row">
		<div class="col-lg-6 text-center">
			<?php echo html_entity_decode($Objconfiguracoes->instagram_link)?>
		</div>
		<div class="col-lg-6 text-center">
			<img src="<?php echo $DiretorioVirtualRaiz?>redimensionaimagem.php?width=540&height=540&imagem=<?php echo $DiretorioImg . $Objconfiguracoes->instagram_imagem?>" class="img-fluid" style="margin-top: 55px">
		</div>
	</div>
</div>

<div class="row bg-warning py-4">
	<div class="container my-4" style="font-weight: bold;">
		<i class="fa fa-map-marker" aria-hidden="true"></i> Avenida Penhasco, s/n - Bom Clima,Chapada dos Guimarães - MT
		
		<div class="input-group input-group-lg my-3">
			<input type="text" id="ondevoceesta" class="form-control" placeholder="Onde você está?" aria-label="Onde você está?">
			<div class="input-group-append">
				<button class="btn btn-success" type="button" onclick="AbreGoogle()">Como Chegar</button>
			</div>
		</div>
	</div>
	<br>
</div>
<BR>
</div>
<style>
.modal-backdrop.show {
    opacity: 0.9;
}
@media (max-width: 1024px) {
	.textstrong {
		display: none;
	}
	
	.containerimagem {
		margin-top: 25px;
	}
}

@media (min-width: 1024px) {

	.containerimagem {
	  position: relative;
	  width: 50%;
	}

	.image { 
	  display: block;
	  width: 100%;
	  height: auto;
	}

	.overlay {
	  position: absolute;
	  top: 0;
	  bottom: 0;
	  left: 0;
	  right: 0;
	  height: 100%;
	  width: 100%;
	  opacity: 0;
	  transition: .5s ease;
	  background-image: linear-gradient(to bottom, #c6ad03, #e2d002);
	  padding: 15px;
	}

	.containerimagem:hover .overlay {
	  opacity: 1;
	}

	.overlayhome {
	  position: absolute;
	  top: 0;
	  bottom: 0;
	  left: 0;
	  right: 0;
	  height: 100%;
	  width: 100%;
	  opacity: 0.85;
	}

	.containerimagem:hover .overlayhome {
		opacity: 0;
	}

	.text {
		margin-top: 20px;
		width: 100%;
		color: black;
		font-size: 15px;
		font-family: 'Balsamiq Sans', cursive;

		text-align: center;
	}


	.textstrong {
		color: #f9d161;
		font-size: 24px;
		background-color: #2b1a00;
		width: 100%!important;
		text-align: center;
		margin-top: 15px;
	}

	.texthome {
		color: white;
		font-size: 26px;
		font-weight: bold;
		position: absolute;
		top: 50%;
		left: 50%;
		-webkit-transform: translate(-50%, -50%);
		-ms-transform: translate(-50%, -50%);
		transform: translate(-50%, -50%);
		text-align: center;
	}
}
</style>
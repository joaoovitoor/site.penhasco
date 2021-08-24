<?php
$ArrMapas		= SelecionaBanco('select * from mapas order by idmapa asc');
?>
<div class="container-fluid" style="background-color: #Fbf8dc">
	<div class="container pt-1 pb-3" style="background-color: #Fbf8dc">
		<h1 class="display-4 font-weight-bold" style="color: #005100">Mapa Penhasco</h1>
		<p class="d-none d-lg-block">* Acesse os locais clicando na lista ou no mapa</p>
		<p class="d-lg-none d-xl-none">* Acesse os locais clicando na lista ou ampliando o mapa</p>
		
		<div class="row">
			<div class="col-xl-8">
				<img src="<?php echo $DiretorioVirtualImg . $Objconfiguracoes->mapa_imagem?>" id="penhasco_mapa" usemap="#workmap" class="img-fluid">
				<map name="workmap" border="1">
					<?php
					list($width, $height)	= getimagesize($DiretorioImg . $Objconfiguracoes->mapa_imagem);
					if(is_array($ArrMapas)){
						foreach($ArrMapas as $campo){
							if(!empty($campo['area'])){
								list($left, $top) 		= explode(',', $campo['area']);
								?>
								<area shape="circle" coords="<?php echo $left?>,<?php echo $top?>,10" href="javascript:void(0);" alt="<?php echo $campo['titulo']?>" onclick="AbreMapa(<?php echo $campo['idmapa']?>, '<?php echo $campo['titulo']?>', '<?php echo $DiretorioVirtualImg . $campo['imagem']?>', '<?php echo urlencode(html_entity_decode($campo['conteudo']))?>');" onmouseover="MouseMapa(<?php echo $campo['idmapa']?>)">
								<?php
							}
						}
					}?>
				</map>
			</div>
			<div class="col-xl-4 text-left text-light">
				<?php
				if(is_array($ArrMapas)){
					foreach($ArrMapas as $campo){
						if(!empty($campo['area'])){?>
							<div class="row mt-2">
							<span class="redondoverde px-2 py-1"><?php echo $campo['idmapa']?></span> 
							<a href="Javascript:;" class="mt-1 ml-1 text-dark" onclick="AbreMapa(<?php echo $campo['idmapa']?>, '<?php echo $campo['titulo']?>', '<?php echo $DiretorioVirtualImg . $campo['imagem']?>', '<?php echo urlencode(html_entity_decode($campo['conteudo']))?>');" onmouseover="MouseMapa(<?php echo $campo['idmapa']?>)">
								 <?php echo $campo['titulo']?>
							</a>
							</div>
							<?php
						}
					}
				}?>
			</div>
		</div>
	</div>
</div>
<style>
.redondoverde {
	background-color: #31422F;
	color: #FFFFFF;
	border-radius: 100%;
	border-color: #FFFFFF;
}
</style>
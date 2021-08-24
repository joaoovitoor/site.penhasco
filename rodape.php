<footer class="pt-4 pt-lg-5 menuverde text-light">
<div class="container-fluid">
	<div class="row">
		<?php
		if(RecebeParametro('pagina') != 'mapa.php'){?>
			<div class="col-lg-12 text-center <?php if(RecebeParametro('pagina') != '') echo 'd-none d-lg-block'?>">
				<a target="_blank" href="https://www.tripadvisor.com.br/Hotel_Review-g1600093-d2649514-Reviews-Pousada_Penhasco-Chapada_dos_Guimaraes_State_of_Mato_Grosso.html#REVIEWS">
					<img src="<?php echo $DiretorioVirtualImg?>trip-advisor.png" class="trip-advisor d-none d-lg-block" alt="Certificado de excelência pelo TripAdvisor" width="613" height="138">
					<img src="<?php echo $DiretorioVirtualImg?>trip-advisor-mobile.png" class="trip-advisor d-block d-lg-none" alt="Certificado de excelência pelo TripAdvisor" width="320" height="120">
				</a>
			</div>
			<?php
		}?>
		<div class="col-lg-4 text-center">
			<img src="<?php echo $DiretorioVirtualImg?>logo2.png" class="img-responsive mb-4 mt-4">
			
			<div id="armored_website">
				<param id="aw_preload" value="true" />
				<param id="aw_use_cdn" value="true" />
			</div>

			<script type="text/javascript" src="//cdn.siteblindado.com/aw.js"></script>
		</div>
		<div class="col-lg-6 text-center">
			
			<div class="d-flex flex-lg-row flex-column justify-content-center">
				<a href="Javascript:;" class="btn btn-primary-outline text-white"><i class="fas fa-phone-alt"></i> <?php echo $Objconfiguracoes->telefone1?></a>
				<a href="Javascript:;" class="btn btn-primary-outline text-white"><i class="fas fa-phone-alt"></i> <?php echo $Objconfiguracoes->telefone2?></a>
				<a href="Javascript:;" class="btn btn-primary-outline text-white"><i class="fab fa-whatsapp"></i> <?php echo $Objconfiguracoes->telefone3?></a>
			</div>
			
			<a target="_blank" href="<?php echo $Objconfiguracoes->youtube?>" class="btn btn-primary-outline text-white"><i class="fab fa-youtube"></i></a>
			<a href="https://www.facebook.com/PenhascoPousada/" target="_blank" class="btn btn-primary-outline text-white"><i class="fab fa-facebook-f"></i></a>
			<a href="https://www.instagram.com/pousadapenhasco/" target="_blank" class="btn btn-primary-outline text-white"><i class="fab fa-instagram"></i></a>
		
			
			<br>
			<div class="d-flex flex-lg-row flex-column justify-content-center">
				<a href="Javascript:;" class="btn btn-primary-outline text-white"><i class="fa fa-envelope" aria-hidden="true"></i> <?php echo $Objconfiguracoes->emailgrupo?><br> (reservas de grupo)</a>
				<a href="Javascript:;" class="btn btn-primary-outline text-white d-none d-lg-block" style="font-size: 200%">|</a>
				<a href="Javascript:;" class="btn btn-primary-outline text-white"><i class="fa fa-envelope" aria-hidden="true"></i> <?php echo $Objconfiguracoes->email?><br> (reservas individuais)</a>
			</div>
		</div>
		<div class="col-lg-2"></div>
		<div class="col-lg-12" style="height: 50px"></div>
	</div>
</div>
</footer>
 
<div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header" style="color: #000000"> 
				AVISO IMPORTANTE
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body mb-0 p-0">
				<img src="<?php echo $DiretorioVirtualImg . $ArrPopup[0]['imagem'];?>" style="width: 100%">
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
					<span aria-hidden="true">&times;</span>
				</button>        

				<div class="embed-responsive embed-responsive-16by9">
					<iframe class="embed-responsive-item" src="<?php echo $Objconfiguracoes->apousada?>" id="video"  allowscriptaccess="always" allow="autoplay"></iframe>
				</div>
			</div>
		</div>
	</div>
</div> 

<div class="modal fade" id="modal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<span class="redondoverde px-2 py-1 mr-1" id="colocaridmapa"></span> 
				<h5 class="modal-title" id="exampleModalLongTitle"></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<img src="" class="img-fluid p-4" id="imgmodal">   

				<p id="conteudomodal" class="p-4"></p>
			</div>
		</div>
	</div>
</div> 

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js" integrity="sha512-WNLxfP/8cVYL9sj8Jnp6et0BkubLP31jhTG9vhL/F5uEZmg5wEzKoXp1kJslzPQWwPT1eyMiSxlKCgzHLOTOTQ==" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
<script src="<?php echo $DiretorioVirtualRaiz?>js/imageMapResizer.min.js"></script>

<script id="script-infochat" src="https://cdn.asksuite.com/infochat.js?dataConfig=https://control.asksuite.com/api/companies/pousada-penhasco"></script>
<script>
jQuery(document).ready(function(){
    $("#divservicos").show();
});

$(document).ready(function() {

	$('#myModal').on('hide.bs.modal', function (e) {
		$("#video").attr('src', '');
	});
	
	<?php
	if((RecebeParametro('pagina') == '') || (RecebeParametro('pagina') == 'home.php')){
		if(is_array($ArrPopup)){?>
			$(window).on('load',function(){
				$('#modal2').modal('show');
			});
			<?php
		}
	}?>
	 
	$('.carousel').carousel({
		interval: 5000,
		pause: "false"
	})
	
	var $videoSrc;  
	$('.video-btn').click(function() {
		$videoSrc = $(this).data( "src" );
	});
	
	$('#myModal').on('shown.bs.modal', function (e){
		$("#video").attr('src',$videoSrc + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0" ); 
	})
	 
	$('.data').mask('99/99/9999');
	$('.cep').mask('99999-999');
	$('.money').mask('000.000.000.000.000,00', {reverse: true});
	$('.cpf').mask('999.999.999-99');
	$('.cnpj').mask('99.999.999/9999-99');
	$('.telefone').mask('(99) 9999-9999#9');
	
	$('map').imageMapResize();
});

function AbreMapa(idmapa, titulo, imagem, conteudo){
	$('#modal3').modal('show');
	$('#modal3').on('shown.bs.modal', function (e){
		$("#colocaridmapa").html(idmapa + ' '); 
		$("#exampleModalLongTitle").html(titulo); 
		$("#imgmodal").attr("src", imagem);
		$("#conteudomodal").html(decodeURIComponent(conteudo.replace(/\+/g, ' ')));
		
	})
}

function MouseMapa(idmapa){
	//alert(idmapa);
	$(this).css('cursor', 'pointer');
	
}

function AbreGoogle(){
	var ondevoceesta = $('#ondevoceesta').val();
	window.open('https://www.google.com.br/maps/dir/' + ondevoceesta + '/Pousada+Penhasco+-+Avenida+Penhasco,+s%2Fn+-+Jardim+Bom+Clima,+Chapada+dos+Guimar%C3%A3es+-+MT');
}
</script>
<style type="text/css">
.modal-dialog {
      max-width: 800px;
      margin: 100px auto;
  }



.modal-body {
  position:relative;
  padding:0px;
}

.close {
  z-index:999;
  font-size:2rem;
  font-weight: normal;
  opacity:1;
}

.trip-advisor {
  position: absolute;
  top: -115px;
}

@media (min-width: 1024px) {
  .trip-advisor {
    left: 30%;
  }
}

@media (max-width: 760px) {
  #penhasco_mapa {
    width: 100%;
  }
}

@media (max-width: 480px) {
  .trip-advisor {
    left: 2rem;
  }
}

@media (max-width: 320px) {
  .trip-advisor {
    left: 0;
  }
}

@media (max-width: 1024px) {
  .btn-vertical {
    position: relative;
    display: inline-block;
    vertical-align: middle;
  }
  .btn-vertical > .btn,
  .btn-group > .btn {
    position: relative;
    float: left;
  }
  .btn-vertical > .btn,
  .btn-vertical > .btn-group,
  .btn-vertical > .btn-group > .btn {
    display: block;
    float: none;
    width: 100%;
    max-width: 100%;
  }
  .btn-vertical > .btn-group > .btn {
    float: none;
  }
  .btn-vertical>.btn+.btn,
  .btn-vertical>.btn+.btn-group,
  .btn-vertical>.btn-group+.btn,
  .btn-vertical>.btn-group+.btn-group {
    margin-top: -1px;
    margin-left: 0;
  }
  .btn-vertical>.btn:not(:first-child):not(:last-child) {
    border-radius: 0;
  }
  .btn-vertical>.btn:first-child:not(:last-child) {
    border-top-right-radius: 0;
    border-top-left-radius: 0;
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 0;
  }
  .btn-vertical>.btn:last-child:not(:first-child) {
    border-top-left-radius: 0;
    border-top-right-radius: 0;
    border-bottom-left-radius: 0;
    border-bottom-right-radius: 0;
  }
  .btn-vertical>.btn-group:not(:first-child):not(:last-child)>.btn {
    border-radius: 0;
  }
  .btn-vertical>.btn-group:first-child:not(:last-child)>.btn:last-child,
  .btn-vertical>.btn-group:first-child:not(:last-child)>.dropdown-toggle {
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 0;
  }
  .btn-vertical>.btn-group:last-child:not(:first-child)>.btn:first-child {
    border-top-left-radius: 0;
    border-top-right-radius: 0;
  }
  body {
    background-color: lightblue;
  }
}
a, td, div, span, h1, h2, h3, h4 {
	font-family: 'Roboto', sans-serif;

}

#home .carousel-item {
  height: calc(100vh - 75px); 
  min-height: 350px;
  background: no-repeat left top;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}

@media (max-width: 1024px) {
	#home .carousel-item {
		height: calc(100vh - 75px); 
		min-height: 350px;
		background: no-repeat center top;
		-webkit-background-size: cover;
		-moz-background-size: cover;
		-o-background-size: cover;
		background-size: cover;
	}
}

.menuverde {
	background-image: linear-gradient(to bottom, #208228, #005100);
}

.escuro {
	background-image: linear-gradient(to bottom, #208228, #005100);
	border: #005100;
}

.escuro:hover .dropdown-item {
	background: none;
	
}

.amareloescuro {
	background-image: linear-gradient(to bottom, #FFC107, #E0A800);
	border: #E0A800;
}

.amareloescuro:hover .dropdown-item {
	background: none;
}
</style>
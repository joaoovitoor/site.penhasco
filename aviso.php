<?php
require_once('variavelglobal.php');
require_once($DiretorioInclude.'includes.php');

$Objpaginas->idpagina					= 13;
$Objpaginas->Seleciona();

$Objconfiguracoes->idconfiguracao		= 1;
$Objconfiguracoes->Seleciona();
?>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js" integrity="sha512-WNLxfP/8cVYL9sj8Jnp6et0BkubLP31jhTG9vhL/F5uEZmg5wEzKoXp1kJslzPQWwPT1eyMiSxlKCgzHLOTOTQ==" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
<link rel="shortcut icon" href="<?php echo $DiretorioVirtualImg?>favicon.png" type="image/png"> <script async src="https://www.googletagmanager.com/gtag/js?id=UA-122752899-1"></script> 
<style type="text/css"> 
.instagram{ height: 100%; background-color: white; padding: 10rem 0; } #chatbotmobile{ display:none; }</style>
<div class="instagram">
	<div class="container-fluid">
		<h1 class="display-4 font-weight-bold text-center" style="color: #005100; font-size: 250%">ORIENTAÇÕES PARA RESERVA ONLINE</h1>
		
		<div class="row"> 
			<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"></div> 
			<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8" style="text-align: center;padding-bottom: 1rem;"> 
				<a type="button" class="btn btn-danger" href="https://penhasco.com.br">X</a> 
				<a type="button" class="btn btn-success" href="//reservations.omnibees.com/default.aspx?q=6971" target="_blank" >Entendi</a>
			</div> 
			<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"></div> 
		</div>
		<div class="row">
			<div class="col-lg-2 col-md-2"></div>
			<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12" style="text-align: center;">
				<iframe width="100%" height="450" src="<?php echo $Objconfiguracoes->aviso?>" frameborder="0" allow="accelerometer; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			</div>
			<div class="col-lg-2 col-md-2"></div>
		</div>
	</div>
</div>

<div class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Aviso Importante</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php echo html_entity_decode($Objpaginas->descricao)?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Concordar e Fechar</button>
      </div>
    </div>
  </div>
</div>
 
<?php
if(!empty($Objpaginas->descricao)){?>
	<script type="text/javascript">
		$('.modal').modal('show');
	</script>
	<?php
}?>
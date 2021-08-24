<div class="container-fluid" style="background-color: #Fbf8dc">
	<div class="container pt-1 pb-3" style="background-color: #Fbf8dc">
		<form name="formcontato" method="post">
		<h1 class="container display-4 font-weight-bold" style="color: #005100">CONTATO</h1>
		<div class="jumbotron text-light" style="background-color: #8c8a7a">
			<?php
			if(!empty($Msg)){?>
				<div class="alert alert-warning"><?php echo $Msg?></div>
				
				<br>
				<br>
				<?php
			}?>
			
			Entre em contato conosco pelos telefones: <?php echo $Objconfiguracoes->telefone1?>, <?php echo $Objconfiguracoes->telefone2?>, <?php echo $Objconfiguracoes->telefone3?> ou preencha o formulário abaixo:
			<br>
			<br>
			
			Nome*
			<input type="text" name="nome" id="nome" class="form-control" placeholder="Escreva seu Nome" required>
			
			E-mail*
			<input type="text" name="email" id="email" class="form-control" placeholder="Escreva seu e-mail" required>
			
			Telefone
			<input type="text" name="telefone" id="telefone" class="form-control telefone" placeholder="Escreva seu Telefone">
			
			Celular
			<input type="text" name="celular" id="celular" class="form-control telefone" placeholder="Escreva seu Celular">
			
			Assunto
			<input type="text" name="assunto" id="assunto" class="form-control" placeholder="Qual o assunto">
			
			Mensagem
			<textarea name="mensagem" id="mensagem" class="form-control" rows="6"></textarea>
			
			<div class="g-recaptcha float-right mt-2 mb-2" data-sitekey="6LcEMqsZAAAAADxSH6PWt-pe8xbGcohrQuuhDa-E"></div>
			
			<button class="btn btn-block btn-success" type="submit" name="acao" value="contato">Enviar Contato</button>
		</div>
		</form>
	</div>
</div>
<script src='https://www.google.com/recaptcha/api.js?hl=pt-BR'></script>
<script type="text/javascript">
  var onloadCallback = function() {
	grecaptcha.render('html_element', {
	  'sitekey' : '6LcEMqsZAAAAADxSH6PWt-pe8xbGcohrQuuhDa-E'
	});
  };
  
function validateRecaptcha() {
	var response = grecaptcha.getResponse();
	if (response.length === 0) {
		alert("Por favor selecione o Captcha corretamente");
		return false;
	} else {
		return true;
	}
}
</script>
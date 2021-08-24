			</div>

			<br>
			<footer class="sticky-footer">
				<div class="container my-auto">
					<div class="copyright text-center my-auto">
						<span>Feito por contrateumprogramador.com</span>
					</div>
				</div>
			</footer>
		</div>
	</div>
	
	<a class="scroll-to-top rounded" href="#page-top">
		<i class="fas fa-angle-up"></i>
	</a>
	
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl">
		<div class="modal-content"></div>
	</div>
	</div>

	<!-- Logout Modal-->
	<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Tem certeza que deseja sair?</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">Se você clicar em SAIR novamente irá sair do sistema!</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
					<form name="logout" action="<?php echo $DiretorioVirtualRaiz?>login/" method="post">
					<button type="submit" name="acao" value="sair" class="btn btn-primary">Sair</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-xl" role="document">
			<div class="modal-content">
			</div>
		</div>
	</div>
	
	<form name="paginacao" method="get">
		<input type="hidden" name="NumeroPagina" id="NumeroPagina">
	</form>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.3/daterangepicker.js" integrity="sha256-zTde1SYEpUiY54BwIFLX07JyfYU46JlHZvyTiCmg6ig=" crossorigin="anonymous"></script>
	<script src="https://secondtruth.github.io/startmin/js/raphael.min.js"></script>
	<script src="https://secondtruth.github.io/startmin/js/morris.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js" integrity="sha256-ncetQ5WcFxZU3YIwggfwOwmewLVX4SHLBtDYnrsxooY=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.pt-BR.min.js" integrity="sha256-QN6KDU+9DIJ/9M0ynQQfw/O90ef0UXucGgKn0LbUtq4=" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" integrity="sha256-9w7XtQnqRDvThmsQHfLmXdDbGasYsSjF6FSXrDh7F6g=" crossorigin="anonymous" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.standalone.css" integrity="sha256-uN+x99pofVuHMbma2OauPsPOP6Y3bYewUszGyStlT28=" crossorigin="anonymous" />

</body>
</html>


<script type="text/javascript">
function DeletaImagem(idimagem){
	if(confirm("Tem certeza que deseja apagar esta imagem? Esta ação não pode ser desfeita!") == true){
		document.form1.idimagem.value		= idimagem;
		document.form1.acao2.value			= 'apagarimagem';
		document.form1.submit();
	}
}

function RemoverAlbum(idimagem){
	$('#imagem' + idimagem).remove();
}

function SalvarLink(){
	if($('#links_titulo').val() == ''){
		alert('O campo Título do Link é obrigatório!');
		$('#links_titulo').focus();
		return false;
	}
	
	document.form1.acao2.value			= 'salvarlink';
	document.form1.submit();
}

function AlterarLink(idpaginalink, titulo, descricao, botao, nomebotao, ordem){
	
	$('#idpaginalink').val(idpaginalink);
	$('#links_titulo').val(titulo);
	    tinyMCE.get('links_descricao').setContent(urldecode(descricao));

	//$('#links_descricao').val(descricao);
	$('#links_botao').val(botao);
	$('#links_nomebotao').val(nomebotao);
	$('#ordem').val(ordem);
	
	$('#links_titulo').focus();
	
}

function urldecode(url) {
  return decodeURIComponent(url.replace(/\+/g, ' '));
}


function ExcluirLink(idpaginalink){
	document.form1.idpaginalink.value	= idpaginalink;
	document.form1.acao2.value			= 'excluirlink';
	document.form1.submit();
}

function AdicionarImagensCallback(){
	var checkbox	= $('input:checkbox[name^=idimagem]:checked');
    if(checkbox.length > 0){
        checkbox.each(function(){
			var idimagem		= $(this).val();
			var caminho			= document.getElementById('caminho[' + idimagem + ']').value;
			var content			= '';
			content	+= '<div class="col-sm-2" id="imagem' + idimagem + '">';
			content += '<input type="hidden" name="idimagemalbum[]" id="idimagemalbum[]" value="' + idimagem + '">';
			content += '<div class="card">';
			content += '<img src="' + caminho + '" class="card-img-top">';
			content += '<div class="card-body">';
			content += '<a href="Javascript:void(0);" onclick="RemoverAlbum(' + idimagem + ')" class="btn btn-sm btn-danger"><i class="fas fa-eraser"></i> remover</a>';
			content += '</div>';
			content += '</div>';
			content += '</div>';
			
			$("#imagensalbum").append(content);
        });
		
		$('#myModal').modal('hide');
    } 
}

(function($){
	"use strict"; // Start of use strict
	
	$("#links").sortable({
		axis: 'y',
		update: function (event, ui) {
			var data = $(this).sortable('serialize') + '&idpagina=<?php echo $Objpaginas->idpagina?>';

			$.ajax({
				data: data,
				type: 'GET',
				url: '<?php echo $DiretorioVirtualRaiz?>ordenarlinks.php'
			});
		}
	});

	$("#sidebarToggle").click(function(e){
		e.preventDefault();
		$("body").toggleClass("sidebar-toggled");
		$(".sidebar").toggleClass("toggled");
	});

	// Prevent the content wrapper from scrolling when the fixed side navigation hovered over
	$('body.fixed-nav .sidebar').on('mousewheel DOMMouseScroll wheel', function(e) {
		if ($window.width() > 768){
			var e0 = e.originalEvent,
			delta = e0.wheelDelta || -e0.detail;
			this.scrollTop += (delta < 0 ? 1 : -1) * 30;
			e.preventDefault();
		}
	});

	$(document).scroll(function() {
		var scrollDistance = $(this).scrollTop();
		if (scrollDistance > 100) {
			$('.scroll-to-top').fadeIn();
		} else {
			$('.scroll-to-top').fadeOut();
		}
	});

	// Smooth scrolling using jQuery easing
	$(document).on('click', 'a.scroll-to-top', function(event) {
		var $anchor = $(this);
		
		$('html, body').stop().animate({
			scrollTop: ($($anchor.attr('href')).offset().top)
		}, 1000, 'easeInOutExpo');
		
		event.preventDefault();
	});

})(jQuery);

$(".all").click(function () {
    $('input:checkbox').not(this).prop('checked', this.checked);
});


$('.calendario').datepicker({
	autoclose: true,
	todayHighlight: true,
	format: "dd/mm/yyyy",
	language: 'pt-BR'
});

$(document).ready(function() {
	$("#myModal").on("show.bs.modal", function(e) {
		var link		= $(e.relatedTarget);	
		var imagens		= $('input:hidden[name^=idimagemalbum]');
		var idimagens	= '';
		var comp		= '';
		
		if(imagens.length > 0){
			imagens.each(function(){
				idimagens += comp + $(this).val();
				comp	= ',';
			});
		}
		
		$(this).find(".modal-content").load(link.attr("href") + '?idimagens=' + idimagens);
	});
	
	$('.selectpicker').selectpicker();

	$('.data').mask('99/99/9999');
	$('.cep').mask('99999-999');
	$('.money').mask('000.000.000.000.000,00', {reverse: true});
	$('.cpf').mask('999.999.999-99');
	$('.cnpj').mask('99.999.999/9999-99');
	$('.horarios').mask('99:99 - 99:99');
	$('.hora').mask('99:99');
	$('.numerocnj').mask('9999999-99.9999.9.99.9999');
	$('.numero').mask('0#');
	$('.validade').mask('99/99');
	$('.telefone').mask('(99) 9999-9999#9');
	$('.numerocartao').mask('9999 9999 9999 9999');
	$('.numero3').mask('999');

	
	$('#cep').blur(function(){
		$.ajax({
			url : '<?php echo $DiretorioVirtualRaizOriginal?>ajax/consultacep.php',
			type : 'POST',
			data: 'cep=' + $('#cep').val(),
			dataType: 'json',
			success: function(data){
				$('#endereco').val(data.rua);
				$('#bairro').val(data.bairro);
				$('#cidade').val(data.cidade);
				$('#uf').val(data.estado);
				$('#pais').val("Brasil");

				$('#numero').focus();
			}
		});  
		
		return false;    
	})
	
	var options = {
		onKeyPress: function (cpf, ev, el, op) {
			var masks = ['000.000.000-000', '00.000.000/0000-00'];
			$('.cpfOuCnpj').mask((cpf.length > 14) ? masks[1] : masks[0], op);
		}
	}

	$('.cpfOuCnpj').length > 11 ? $('.cpfOuCnpj').mask('00.000.000/0000-00', options) : $('.cpfOuCnpj').mask('000.000.000-00#', options);
	
	$('#pop').on('click', function() {
		$('#imagemodal').modal('show');   
	});
	
	<?php
	if(!empty($Direciona)){?>
		setTimeout(function(){
			window.location = '<?php echo $DiretorioVirtualRaiz . $Direciona?>';
		},2000);
		<?php
	}?>
	
	$('#bannerformmodal').bind('click', function (ev) {
		var $div = $(ev.target);
		
		var $display = $div.find('.display');

		var offset = $div.offset();
		var x = ev.clientX - offset.left;
		var y = ev.clientY - offset.top;
		
		$('#area').val(x + ',' + y)
	});
});
</script>
</body>
</html>

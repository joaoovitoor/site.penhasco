
 /* jQuery Preloader
  -----------------------------------------------*/
$(window).load(function(){
    $('.preloader').fadeOut(1000); // set duration in brackets    
});


$(document).ready(function() {

  /* Hide mobile menu after clicking on a link
    -----------------------------------------------*/
    $('.navbar-collapse a').click(function(){
        $(".navbar-collapse").collapse('hide');
    });


  /* jQuery to collapse the navbar on scroll
    -----------------------------------------------*/
  $(window).scroll(function() {
      if ($(".navbar").offset().top > 50) {
          $(".navbar-fixed-top").addClass("top-nav-collapse");
      } else {
          $(".navbar-fixed-top").removeClass("top-nav-collapse"); 
      }
  });


  /* Parallax section
    -----------------------------------------------*/
  function initParallax() {
    $('#home').parallax("100%", 0.1);
    $('#service').parallax("100%", 0.3);
    $('#about').parallax("100%", 0.2);
    $('#counter').parallax("100%", 0.3);
    $('#portfolio').parallax("100%", 0.1);
    $('#contact').parallax("100%", 0.3);

  }
  initParallax();


   /* Divider Counter
    -----------------------------------------------*/
  jQuery('.counter-item').appear(function() {
    jQuery('.counter-number').countTo();
    jQuery(this).addClass('funcionando');
    console.log('funcionando');
  });


  /* wow
  -------------------------------*/
  new WOW({ mobile: false }).init();

	$('.date').mask('00/00/0000');
	$('.time').mask('00:00:00');
	$('.date_time').mask('00/00/0000 00:00:00');
	$('.cep').mask('00000-000');
	$('.telefone').mask('(00) 0000-0000?0');
	$('.cpf').mask('000.000.000-00', {reverse: true});
	$('.cnpj').mask('00.000.000/0000-00', {reverse: true});
	$('.money').mask('000.000.000.000.000,00', {reverse: true});
	$('.money2').mask("#.##0,00", {reverse: true});
	
	var SPMaskBehavior = function (val){
		return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
	}, spOptions = {
		onKeyPress: function(val, e, field, options) {
		  field.mask(SPMaskBehavior.apply({}, arguments), options);
		}
	};

	$('.sp_celphones').mask(SPMaskBehavior, spOptions);
	
	$('.datepicker').datepicker({
		format: 'dd/mm/yyyy',                
		language: 'pt-BR' 
	});
	
	$('#cep').blur(function(){
		$.ajax({
			url : '/consultacep.php',
			type : 'POST',
			data: 'cep=' + $('#cep').val(),
			dataType: 'json',
			success: function(data){
				if(data.sucesso == 1){
					$('#endereco').val(data.rua);
					$('#bairro').val(data.bairro);
					$('#cidade').val(data.cidade);
					$('#uf').val(data.estado);

					$('#numero').focus();
				}
			}
		});  
		
		return false;    
	})

});


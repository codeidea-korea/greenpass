
$(document).ready(function(){

    $('.selectpicker').selectpicker();    

    val = $('.selectpicker option:selected').val();
    $('.all-icons i').css( "font-size", val + "px" );
    $('#content').removeClass().addClass("size"+val);

    $('.selectpicker').change(function(){
        val = $('.selectpicker option:selected').val();
		if(val == 'free') {
			$('.all-icons i').removeAttr( 'style');
		} else {
			$('.all-icons i').css( "font-size", val + "px" );
		}

    });

    $('#s1').change(function() {
       if($(this).is(":checked")) {
          $('body').addClass("dark");
          return;
       }
      $('body').removeClass("dark");
    });
	
	/*
    $('#nav').affix({
        offset: { top: $('#nav').offset().top },
    });

    $('#nav').on('affix.bs.affix', function () {
        $('#font_options_bar').height($("#nav").height());
    });

    $('#nav').on('affixed-top.bs.affix', function () {
        $('#font_options_bar').height('auto');
    });
	

    $(".code-value, .unicode, .unicode-text, .font-icon-name").click(function(){
      $(this).select();
    });

    $('.font-icon-detail').on("click", function(){
      $(this).find('.font-icon-name').select();
    });
	*/




}) // Ready









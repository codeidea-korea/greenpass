

//엘리먼트 온ㆍ오프 //match값은 ,구분 여러개 가능
function matchOnOff(elm, match, target, standard) {
	var val = $(elm).val();
	var arrMatch = match.split(",");
	if(standard == "hide") {
		$(target).show();
		for(var i in arrMatch) {
			if(val == arrMatch[i]) {
				$(target).hide();			
			}
		}
		$(elm).change(function (){
			var val = $(this).val();
			$(target).show();
			for(var i in arrMatch) {
				if(val == arrMatch[i]) {		
					$(target).hide();		
				}
			}
		});
	} else {
		$(target).hide();
		for(var i in arrMatch) {
			if(val == arrMatch[i]) {		
				$(target).show();	
			}
		}
		$(elm).change(function (){
			var val = $(this).val();
			$(target).hide();
			for(var i in arrMatch) {
				if(val == arrMatch[i]) {		
					$(target).show();	
				}
			}
		});
	}
}
//엘리먼트오프 //match값은 ,구분 여러개 가능
function matchOff(elm, match, target) {
	var val = $(elm).val();
	var arrMatch = match.split(",");
	for(var i in arrMatch) {
		if(val == arrMatch[i]) {
			$(target).hide();			
		}
	}
	$(elm).change(function (){
		var val = $(this).val();
		for(var i in arrMatch) {
			if(val == arrMatch[i]) {		
				$(target).hide();		
			}
		}
	});
}

function slideToggle(opener, closer, target, option='left') {
	if(option == 'left') {
		$(opener).click(function() {
			$(target).animate({"left": "0"}, 300, 'easeInOutExpo');
		});
		$(closer).click(function() {
			$(target).animate({"left": "-100%"}, 300, 'easeInOutExpo');
		});
	} else if(option == 'right') {
		$(opener).click(function() {
			$(target).animate({"right": "0"}, 360, 'easeInOutExpo');
		});
		$(closer).click(function() {
			$(target).animate({"right": "-100%"}, 340, 'easeInOutExpo');
		});
	} else {
		$(opener).click(function() {
			$(target).css({"right": "0"});
		});
		$(closer).click(function() {
			$(target).animate({"right": "-100%"});
		});
	}
	$(opener).click(function() {
		$('html').addClass('scrollDisable');
	});
	$(closer).click(function() {
		$('html').removeClass('scrollDisable');
	});
}

//document ready - start
$(document).ready(function(){
	
	var win_height = $(window).height();
	$('#wrapper').css('min-height',win_height);


	/* 레이어 팝업 */
	$('.popup-inline.inside').magnificPopup({
		type: 'inline',
		fixedContentPos: false,
		fixedBgPos: true,
		closeOnContentClick: false, 
        closeOnBgClick: true,
		overflowY: 'auto',
		closeBtnInside: true,
		preloader: false,
		midClick: true,
		removalDelay: 300,
		mainClass: 'my-mfp-zoom-in'
	});

	$('.popup-inline:not(.inside):not(.no-close)').magnificPopup({
		type: 'inline',
		fixedContentPos: false,
		fixedBgPos: true,
		closeOnContentClick: false, 
        closeOnBgClick: true,
		overflowY: 'auto',
		closeBtnInside: false,
		preloader: false,
		midClick: true,
		removalDelay: 300,
		mainClass: 'my-mfp-zoom-in'
	});

	$('.popup-inline.no-close').magnificPopup({
		type: 'inline',
		fixedContentPos: false,
		fixedBgPos: true,
		closeOnContentClick: false, 
        closeOnBgClick: false,
		overflowY: 'auto',
		closeBtnInside: true,
		preloader: false,
		removalDelay: 100,
		mainClass: 'my-mfp-zoom-in'
	});

	$(document).on('click', '.popClose', function (e) {
		e.preventDefault();
		$.magnificPopup.close();
	});
	$('.myClick').click();

	
});
//document ready - end







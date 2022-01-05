
$(document).ready(function(){
	
	//input + 버튼
	$('input:not([type="checkbox"]):not([type="radio"])').each(function() {
		var inner = $(this).next('.inner');
		var outer = $(this).next('.outer');
		if(inner.length){
			$(this).wrap('<div class="myform"></div>');
			inner.insertAfter(this);
			var inner_width = inner.outerWidth();
			$(this).css({'padding-right':inner_width + 20});
		}
		if(outer.length){
			$(this).wrap('<div class="myform"></div>');
			outer.insertAfter(this);
		}
	});
	//input 입력후
	$('input:not([type="checkbox"]):not([type="radio"])').bind("keyup", function() {
		var val = $(this).val();
		if(val) {		
			$(this).addClass('filled');
		} else {
			$(this).removeClass('filled');
		}
	});


	//checkbox , radio
	$('input[type="checkbox"], input[type="radio"]').each(function() {
		var labelClass = typeof $(this).data('class') !== typeof undefined && $(this).data('class') !== '' ? $(this).data('class') : '';
			label = typeof $(this).data('label') !== typeof undefined && $(this).data('label') !== '' ? $(this).data('label') : '';
			wrap = $(this).parent('label');
			span = $(this).next('span');
		if(wrap.length == 0){
			$(this).wrap('<label class="myform '+ labelClass + '"></label>');
		}
		if(span.length == 0){
			if(label) {
				if($(this).hasClass('radio-btn')) {
					$(this).after('<span>' + label + '</span>');
					$(this).parent('.myform').addClass('radio-btn');
					$(this).removeClass('radio-btn');
				} else if($(this).hasClass('radio-check')) {
					$(this).after('<span>' + label + '</span>');
					$(this).parent('.myform').addClass('radio-check');
					$(this).removeClass('radio-check');
				} else if($(this).hasClass('checkbox-btn')) {
					$(this).after('<span>' + label + '</span>');
					$(this).parent('.myform').addClass('checkbox-btn');
					$(this).removeClass('checkbox-btn');
				}  else {
					$(this).after('<span></span>' + label);
				}
			} else {
				$(this).after('<span></span>');
			}
		}		
	});


	


	//select
	$('select:not(.selectpicker)').each(function() {
		var thisClass = $(this).attr('class');
		var label = typeof $(this).data('label') !== typeof undefined && $(this).data('label') !== '' ? $(this).data('label') : '';

		$(this).removeClass();
		$(this).wrap('<label class="mySelect '+ thisClass + '"></label>');
		$(this).after('<span>' + label + '</span>');
		$(this).blur(function() {
			$(this).parent('.mySelect').removeClass("focus");						
		}).focus(function() {
			$(this).parent('.mySelect').addClass("focus");						
		});
		
		if($(this).val())		
			$(this).parent().addClass('filled');
	});

	$('select').change(function (){
		if($(this).val()) {		
			$(this).parent().addClass('filled');		
		} else {
			$(this).parent().removeClass('filled');
		}
	});
			
	//select date
	$('input.datepicker, .myform.datepicker input').each(function() {
		//$(this).wrap('<label class="labelDate"></label>');
		//$(this).after('<span></span>');
		$(this).datepicker({
			beforeShow: function(input, inst) {
				$('#ui-datepicker-div').removeClass(function() {
					return $('input').get(0).id; 
				});
				$('#ui-datepicker-div').addClass(this.id);
			},
			language: 'ko-KR',
			autoPick: false,
			ignoreReadonly: true, //모바일 키패드 사용안함
			format: 'yyyy.mm.dd'
		});
		
		$('.datapickerCloser').click(function() {
			$('.datepicker').hide();
		});
		
		//$('.datepicker').datepicker('setDate', '');
		
	});


	//color
	$('input.colorpicker, .myform.colorpicker input').each( function() {
		$(this).minicolors({
			control: $(this).attr('data-control') || 'hue',
			defaultValue: $(this).attr('data-defaultValue') || '',
			format: $(this).attr('data-format') || 'hex',
			keywords: $(this).attr('data-keywords') || '',
			inline: $(this).attr('data-inline') === 'true',
			letterCase: $(this).attr('data-letterCase') || 'lowercase',
			opacity: $(this).attr('data-opacity'),
			position: $(this).attr('data-position') || 'bottom',
			swatches: $(this).attr('data-swatches') ? $(this).attr('data-swatches').split('|') : [],
			change: function(hex, opacity) {
			var log;
			try {
				log = hex ? hex : 'transparent';
				if( opacity ) log += ', ' + opacity;
				console.log(log);
				} catch(e) {}
			},
			theme: 'default'
		});
	});

	//가격 입력시 콤마 찍기
	function inputNumberFormat(obj) {
		obj.value = comma(uncomma(obj.value));
	}
	function comma(str) {
		str = String(str);
		return str.replace(/(\d)(?=(?:\d{3})+(?!\d))/g, '$1,');
	}
	function uncomma(str) {
		str = String(str);
		return str.replace(/[^\d]+/g, '');
	}
	$("input.price.comma").bind("keyup", function(event) {
		inputNumberFormat(this);
	});
	$('input.price.comma').each(function() {
		inputNumberFormat(this);
	});


	//숫자만 입력
	$("input.number, .myform.number input").bind("keyup", function() {
		$(this).val($(this).val().replace(/[^0-9]/g,""));
	});

	//휴대폰 번호 입력
	function phoneFomatter(num,type) {
		var formatNum = '';
		if(num.length==11) {
			if(type==0) {
				formatNum = num.replace(/(\d{3})(\d{4})(\d{4})/, '$1-****-$3');
			} else {
				formatNum = num.replace(/(\d{3})(\d{4})(\d{4})/, '$1-$2-$3');
			}
		} else if(num.length==8) {
			formatNum = num.replace(/(\d{4})(\d{4})/, '$1-$2');
		} else {
			if(num.indexOf('02')==0) {
				if(type==0) {
					formatNum = num.replace(/(\d{2})(\d{4})(\d{4})/, '$1-****-$3');
				} else {
					formatNum = num.replace(/(\d{2})(\d{4})(\d{4})/, '$1-$2-$3');
				}
			} else {
				if(type==0){
					formatNum = num.replace(/(\d{3})(\d{3})(\d{4})/, '$1-***-$3');
				} else {
					formatNum = num.replace(/(\d{3})(\d{3})(\d{4})/, '$1-$2-$3');
				}
			}
		}
		return formatNum;
	}
	$("input.phone, .myform.phone input").bind("keyup", function(event) {
		$(this).val(phoneFomatter($(this).val().replace(/[^0-9]/g,"")));
	});

	//PX or % 단위 자동변경
	$('input.percent, .myform.percent input').bind("keyup", function(event) {
		var thisValue = $(this).val();
		var label = $(this).next('span');
		if(thisValue <= 100 ) {
			label.html('%');
		} else {
			label.html('PX');
		}
	});
	
	//textarea 자동조절
	function textareaResize(obj) {
		obj.style.height = "1px";
		obj.style.height = (2+obj.scrollHeight)+"px";
	}
	$("textarea.autosize").bind("keypress", function(event) {
		textareaResize(this);
	});
	$("textarea.autosize").bind("keyup", function(event) {
		textareaResize(this);
	});


	//file
	/*$('input[type="file"]').each(function(index) {
		var className = $(this).attr('class') ? $(this).attr('class') : '';
		var btnName = $(this).attr('data-btn-name') ? $(this).attr('data-btn-name') : '파일찾기';
		$(this).wrap('<div class="filebox ' + className + '"></div>');
		$(this).parent().siblings('.upImg').insertAfter($(this));
		$(this).before('<label for="upload_' + index + '" class="upload-btn">' + btnName + '</label>');
		$(this).attr('id', 'upload_' + index);
		$(this).addClass('upload-hidden');
		$(this).on('change', function(){ // 값이 변경되면
			if(window.FileReader){ // modern browser
				var filename = $(this)[0].files[0].name;
			} else { // old IE
				var filename = $(this).val().split('/').pop().split('\\').pop(); // 파일명만 추출
			} // 추출한 파일명 삽입
			$(this).siblings('.upload-name').val(filename);
		});
	});*/

	

});
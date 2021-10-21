
$(document).ready(function(){
	
	//checkbox
	$('input[type="checkbox"]').each(function() {
		if($(this).hasClass('toggle-light')) {
			var label_on = $(this).attr('data-on'),
				label_off = $(this).attr('data-off');
			$(this).removeClass('toggle-light');
			$(this).wrap('<label class="toggle-light"></label>');
			$(this).after('<span></span><span class="labelOn">' + label_on + '</span><span class="labelOff">' + label_off + '</span>');
		} else {
			if($(this).parent()[0].tagName == 'LABEL') {
				$(this).parent().addClass('checkbox-wrap');
				$(this).after('<span></span>');
			} else {
				var label = typeof $(this).attr('data-label') !== typeof undefined && $(this).attr('data-label') !== '' ? $(this).attr('data-label') : '';
				$(this).wrap('<label class="checkbox-wrap"></label>');
				$(this).after('<span></span>' + label);
				if(!label) $(this).parent('.checkbox-wrap').addClass('no-label');
			}
			var thisClass = typeof $(this).attr('data-class') !== typeof undefined && $(this).attr('data-class') !== '' ? $(this).attr('data-class') : '';
			$(this).parent('.checkbox-wrap').addClass(thisClass);
		}
	});

	//radio
	$('input[type="radio"]').each(function() {
		if($(this).parent()[0].tagName == 'LABEL') {
			$(this).parent().addClass('radio-wrap');
			$(this).after('<span></span>');
		} else {
			var label = typeof $(this).attr('data-label') !== typeof undefined && $(this).attr('data-label') !== '' ? $(this).attr('data-label') : '';
			if($(this).hasClass('radio-btn')) {
				$(this).wrap('<label class="radio-btn"></label>');
				$(this).removeClass('radio-btn');		
				$(this).after('<span>' + label + '</span>');			
			} else {			
				$(this).wrap('<label class="radio-wrap"></label>');
				$(this).after('<span></span>' + label);
			}
			var thisClass = typeof $(this).attr('data-class') !== typeof undefined && $(this).attr('data-class') !== '' ? $(this).attr('data-class') : '';
			$(this).parent('.radio-wrap').addClass(thisClass);
		}
	});

	//input label
	$('input:not([type="checkbox"]):not([type="radio"]):not([type="file"])').each(function() {
		var label =  typeof $(this).attr('data-label') !== typeof undefined && $(this).attr('data-label') !== '' ? $(this).attr('data-label') : '',
			label_right =  typeof $(this).attr('data-label-right') !== typeof undefined && $(this).attr('data-label-right') !== '' ? $(this).attr('data-label-right') : '',
			label_inline =  typeof $(this).attr('data-label-inline') !== typeof undefined && $(this).attr('data-label-inline') !== '' ? $(this).attr('data-label-inline') : '',
			label_id =  typeof $(this).attr('data-label-id') !== typeof undefined && $(this).attr('data-label-id') !== '' ? $(this).attr('data-label-id') : '',
			thisClass = typeof $(this).attr('data-class') !== typeof undefined && $(this).attr('data-class') !== '' ? $(this).attr('data-class') : '';
			//label_color = $(this).attr('data-label-color') ? ' ' + $(this).attr('data-label-color') : '';

		if($(this).hasClass('large')) {
			var inputSize = ' large';
		} else if($(this).hasClass('large')) {
			var inputSize = ' small';
		} else {
			var inputSize = '';
		}

		if(label || label_right || label_inline) {
			var label_id = label_id ? 'id="' + label_id + '"' : '';
			$(this).wrap('<label ' + label_id + ' class="input-label ' + thisClass + '"></label>');
			if(label) {
				$(this).before('<span class="label">' + label + '</span>');
			}
			if(label_right) {
				$(this).after('<span class="label">' + label_right + '</span>');
			}
			if(label_inline) {
				$(this).after('<span class="label-inline">' + label_inline + '</span>');
				var labelWidth = $(this).next('.label-inline').outerWidth();
				$(this).css({"padding-right":labelWidth});
			}
		}
	});

	$('select:not(.selectpicker)').each(function() {
		var select_class = $(this).attr('class');
		var input_label = $(this).attr('data-label') ? $(this).attr('data-label') : '';
		var input_label_mobile = $(this).attr('data-label-mobile') ? $(this).attr('data-label-mobile') : '';
		$(this).wrap('<div class="mySelect ' + select_class  + '" />');
		if(typeof input_label !== typeof undefined && input_label !== '') {
			$(this).before('<span class="label">' + input_label + '</span>');
		}
		if(typeof input_label_mobile !== typeof undefined && input_label_mobile !== '') {
			$(this).before('<span class="label">' + input_label_mobile + '</span>');
		}
	});

	$('.input-label input.mini').each(function() {
		$(this).parent().addClass('mini');
	});
	$('.input-label input.small').each(function() {
		$(this).parent().addClass('small');
	});
	$('.input-label .label:first-child').each(function() {
		$(this).parent().addClass('left-label');
	});
	$('.input-label .label:last-child').each(function() {
		$(this).parent().addClass('right-label');
	});
	$('.input-label input').blur(function() {
		$(this).parent().removeClass("focus");
	})
	.focus(function() {
		$(this).parent().addClass("focus")
	});

	//date
	$('input.datepicker').each(function() {
		$(this).wrap('<label class="labelDate"></label>');
		$(this).after('<span></span>');
		$(this).datepicker({
			language: 'ko-KR',
			autoPick: true,
			format: 'yyyy년 mm월 dd일'
		});
	});
	
	//color
	$('.colorpicker').each( function() {
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
	})

	//숫자만 입력
	$("input.number").bind("keyup", function() {
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
	$("input.phone").bind("keyup", function(event) {
		$(this).val(phoneFomatter($(this).val().replace(/[^0-9]/g,"")));
	});

	//PX or % 단위 자동변경
	$('input.percent').bind("keyup", function(event) {
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

	$('textarea.label').each(function() {
		var label = $(this).attr('data-label');
		$(this).wrap('<div class="textarea-wrap"></div>');
		$(this).after('<span class="textarea-label" data-label="' + label + '"><i class="label-icon"></i></span>');
	});

	

	// 업로드 이미지 미리보기
	$('input[type="file"]:not(.background)').each(function(index) {
		var upload = $(this)[0];
		$(this).next('.upImg').attr('id', 'holder_' + index);
		var holder = document.getElementById('holder_' + index);
		var container = $(this).parent();		
		upload.onchange = function (e) {
			e.preventDefault();
			var file = upload.files[0],
			reader = new FileReader();
			reader.onload = function (event) {
				var img = new Image();
				img.src = event.target.result;
				holder.innerHTML = '';
				holder.appendChild(img);
				container.addClass('fill');			
			};
			reader.readAsDataURL(file);
			return false;
		};
	});


});
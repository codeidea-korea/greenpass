
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
			var label = typeof $(this).attr('data-label') !== typeof undefined && $(this).attr('data-label') !== '' ? $(this).attr('data-label') : '';
			$(this).wrap('<label class="checkbox-wrap"></label>');
			$(this).after('<span></span>' + label);
		}
	});

	//radio
	$('input[type="radio"]').each(function() {
		var label = typeof $(this).attr('data-label') !== typeof undefined && $(this).attr('data-label') !== '' ? $(this).attr('data-label') : '';
		if($(this).hasClass('radio-btn')) {
			$(this).wrap('<label class="radio-btn"></label>');
			$(this).removeClass('radio-btn');		
			$(this).after('<span>' + label + '</span>');			
		} else {			
			$(this).wrap('<label class="radio-wrap"></label>');
			$(this).after('<span></span>' + label);
		}		
	});


	//input label
	$('input:not([type="checkbox"]):not([type="radio"])').each(function() {
		var label = typeof $(this).attr('data-label') !== typeof undefined && $(this).attr('data-label') !== '' ? $(this).attr('data-label') : '',
			label_right = typeof $(this).attr('data-label-right') !== typeof undefined && $(this).attr('data-label-right') !== '' ? $(this).attr('data-label-right') : '',
			label_inline = typeof $(this).attr('data-label-inline') !== typeof undefined && $(this).attr('data-label-inline') !== '' ? $(this).attr('data-label-inline') : '',
			label_color = typeof $(this).attr('data-label-color') !== typeof undefined && $(this).attr('data-label-color') !== '' ? ' ' + $(this).attr('data-label-color') : '';

		var inputWidth = $(this).hasClass('span') ? ' span' : '';

		if(label || label_right || label_inline) {
			$(this).wrap('<label class="inp-wrap' + inputWidth + '"></label>');

			if(label) $(this).before('<span class="label">' + label + '</span>');
			if(label_right) $(this).after('<span class="label">' + label_right + '</span>');

			if(label_inline) {
				$(this).after('<span class="label-inline">' + label_inline + '</span>');
				var labelWidth = $(this).next('.label-inline').outerWidth();
				$(this).css({"padding-right":labelWidth});
			}
		}

	});

	/*$('select').each(function() {
		var input_label = $(this).attr('data-label');
		var input_label_left = $(this).attr('data-label-left');
		var input_label_right = $(this).attr('data-label-right');
		var input_label_id = $(this).attr('data-label-id');
		var input_label_color = $(this).attr('data-label-color') ? ' ' + $(this).attr('data-label-color') : '';
		if($(this).hasClass('large')) {
			var labelSize = ' large';
		} else if($(this).hasClass('small')) {
			var labelSize = ' small';
		} else {
			var labelSize = '';
		}
		if((typeof input_label !== typeof undefined && input_label !== '') || (typeof input_label_left !== typeof undefined && input_label_left !== '') || (typeof input_label_right !== typeof undefined && input_label_right !== '')) {
			var label_id = typeof input_label_id !== typeof undefined && input_label_id !== '' ? 'id="' + input_label_id + '"' : '';
			$(this).parent().wrap('<label class="input-label mySelect ' + labelSize +'" ' + label_id + '></label>');
		}		
		if(typeof input_label !== typeof undefined && input_label !== '') {
			$(this).parent().before('<span class="label' + input_label_color +'">' + input_label + '</span>');
		} else if(typeof input_label_left !== typeof undefined && input_label_left !== '') {
			$(this).parent().before('<span class="label' + input_label_color +'">' + input_label_left + '</span>');
		}
		if(typeof input_label_right !== typeof undefined && input_label_right !== '') {
			$(this).parent().after('<span class="label' + input_label_color +'">' + input_label_right + '</span>');
		}
	});*/

	$('.inp-wrap .label:first-child').each(function() {
		$(this).parent().addClass('left-label');
	});
	$('.inp-wrap .label:last-child').each(function() {
		$(this).parent().addClass('right-label');
	});
	$('.inp-wrap input').blur(function() {
		$(this).parent().removeClass("focus");
	})
	.focus(function() {
		$(this).parent().addClass("focus");
	});



	//date
	$('input.datepicker').each(function() {
		$(this).wrap('<label class="labelDate"></label>');
		$(this).after('<span></span>');
		$(this).datepicker({
			language: 'ko-KR',
			autoPick: true,
			format: 'yyyy.mm.dd'
		});
	});

	//date
	$('input.search-date').each(function() {
		$(this).datepicker({
			language: 'ko-KR',
			//autoPick: true,
			format: 'yyyy.mm.dd'
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

	function numberFormat(inputNumber) {
	   return inputNumber.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
	}
	$("input.price").bind("keyup", function(event) {
		$(this).val(numberFormat($(this).val().replace(/[^0-9]/g,"")));
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
		obj.style.height = (1+obj.scrollHeight)+"px";
	}
	$("textarea.autoSize").bind("keypress", function(event) {
		textareaResize(this);
	});
	$("textarea.autoSize").bind("keyup", function(event) {
		textareaResize(this);
	});

	$('textarea.label').each(function() {
		var label = $(this).attr('data-label');
		$(this).wrap('<div class="textarea-wrap"></div>');
		$(this).after('<span class="textarea-label" data-label="' + label + '"><i class="label-icon"></i></span>');
	});


	// 쓰기페이지 pc,mobile Tabs
	$(".wrConTabs li").click(function(){
		$(this).siblings("li").removeClass('active');
		$(this).addClass('active');
		var target = $(this).attr('data-target');
		var $this = $(this).parent().parent();
		var $thisTarget = $this.find(".tabEditor." + target);
		$this.find(".tabEditor").removeClass('active');
		$thisTarget.addClass('active');
	});
	
	
	// 쓰기페이지 링크관련
	matchOnOff('#wr_link_target', 'attach', '#link-name');
	matchOnOff('#wr_link_target', 'popup', '#popup-option');
	$('#wr_link_target').change(function (){
		var val = $(this).val();
		if(val == 'alert') {
			$('#wr_link1').attr( 'placeholder', '엘럿 메시지를 입력해 주세요.' );
		} else {
			$('#wr_link1').attr( 'placeholder', 'http://' );
		}
	});



	//file
	$('input[type="file"]:not(.default)').each(function(index) {
		var className = $(this).attr('class') ? $(this).attr('class') : '';
		var btnName = $(this).attr('data-btn-name') ? $(this).attr('data-btn-name') : '파일찾기';
		$(this).wrap('<div class="filebox ' + className + '"></div>');
		$(this).parent().siblings('.upImg').insertAfter($(this));
		$(this).before('<input type="text" value="선택된 파일이 없습니다." class="upload-name" disabled="disabled"><label for="upload_' + index + '" class="upload-btn">' + btnName + '</label>');
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
	});

	// 업로드 이미지 미리보기
	$('input[type="file"]:not(.default)').each(function(index) {
		var upload = $(this)[0];
		$(this).next('.upImg').attr('id', 'holder_' + index);
		var holder = document.getElementById('holder_' + index);
		//var btn = $(this).parent().find('[class*=btn]');
			/*
		upload.onchange = function (e) {
			e.preventDefault();
			var file = upload.files[0],
			reader = new FileReader();
			reader.onload = function (event) {
				var img = new Image();
				img.src = event.target.result;
				//btn.hide();
				//holder.children('img').remove();
				holder.innerHTML = '';
				holder.appendChild(img);
				$("html").getNiceScroll().resize();
			};
			reader.readAsDataURL(file);
			return false;
		};
			*/
	});
	

});
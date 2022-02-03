@include('admin.header')

<div id="wrapper" style="min-height: 911px;">
	@include('admin.topContainer')

	<section id="wrtie" class="container">
		<div class="page-title _detailTitle">&nbsp;</div>

		<div class="wrtieContents">
			<div class="wr-wrap line label200">
				
				<div class="wr-list-con">
					<div class="wr-list">
                		<div class="wr-list-label flex-start">유형</div>
						<div class="wr-list-con">
							<select class="default selectColor-gray" name="type" id="type" onchange="chgType(this.value)">
								<option data-subtext="관리자 유형을 선택하세요." value="">관리자 유형을 선택하세요.</option>
								<option data-subtext="슈퍼관리자" value="AM">슈퍼관리자</option>
								<option data-subtext="국가 발주처" value="BG">국가 발주처</option>
								<option data-subtext="지역 발주처" value="BL">지역 발주처</option>
							</select>
						</div>
					</div>

					<div class="wr-list">
                		<div class="wr-list-label flex-start">ID</div>
						<div class="wr-list-con">
							<input type="text" name="id" id="id" onkeyup="setCheckDuplicated(false)" class="span200" placeholder="아이디로 사용할 이메일을 입력하세요.">
							<a href="#" onclick="checkDuplicated()" class="btn black ml5">중복 확인</a>
						</div>
					</div>
					<div class="wr-list">
                		<div class="wr-list-label flex-start">비밀번호</div>
						<div class="wr-list-con">
							<input type="password" name="pw" id="pw" class="span200" placeholder="비밀번호를 입력하세요.">
						</div>
					</div>
					<div class="wr-list _gov">
                		<div class="wr-list-label flex-start">국가</div>
						<div class="wr-list-con">
							<select class="default" name="depth1" id="depth1">
								<option data-subtext="국가를 선택하세요." value="">국가를 선택하세요.</option>
								<option data-subtext="대한민국" value="대한민국">대한민국</option>
								<option data-subtext="라오스" value="라오스">라오스</option>
								<option data-subtext="베트남" value="베트남">베트남</option>
							</select>
						</div>
					</div>
					<div class="wr-list _loc">
                		<div class="wr-list-label flex-start">지역</div>
						<div class="wr-list-con">
							<select class="default" name="depth2" id="depth2">
								<option data-subtext="광역시/도를 선택하세요." value="">광역시/도를 선택하세요.</option>
							</select>
							
							<select class="default" name="depth3" id="depth3">
								<option data-subtext="시/군/구를 선택하세요." value="">시/군/구를 선택하세요.</option>
							</select>
						</div>
					</div>
					<div class="wr-list">
                		<div class="wr-list-label flex-start">이름</div>
						<div class="wr-list-con">
							<input type="text" name="name" id="name" class="span200" placeholder="이름을 입력하세요.">
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="btnSet">
			<a href="#" onclick="addBuyer();" class="btn submit">확인</a>
			<a href="#" onclick="backList();" class="btn gray">취소</a>
		</div>
	</section>

	<!-- 한국 시/도 > 시/군/구 데이터 json -->
	<script type="application/javascript" src="/adm/js/hangjungdong.js"></script>
	<script>
	jQuery(document).ready(function(){
		//sido option 추가
		jQuery.each(hangjungdong.sido, function(idx, code){
			jQuery('#depth2').append(fn_option(code.sido, code.codeNm));
		});
		
		//sido 변경시 시군구 option 추가
		jQuery('#depth2').change(function(){
			jQuery('#depth3').show();
			jQuery('#depth3').empty();
			jQuery('#depth3').append(fn_option('','선택')); //
			jQuery.each(hangjungdong.sigugun, function(idx, code){
			if(jQuery('#depth2 > option:selected').val() == code.sido)
				jQuery('#depth3').append(fn_option(code.sigugun, code.codeNm));
			});
		
			//세종특별자치시 예외처리
			//옵션값을 읽어 비교
			if(jQuery('#depth2 option:selected').val() == '36'){
			jQuery('#depth3').hide();
			//index를 이용해서 selected 속성(attr)추가
			//기본 선택 옵션이 최상위로 index 0을 가짐
			jQuery('#depth3 option:eq(1)').attr('selected', 'selected');
			//trigger를 이용해 change 실행
			jQuery('#depth3').trigger('change');
			}
		});
	});
	function fn_option(code, name){
		return '<option value="' + code +'">' + name +'</option>';
	}
	</script>

	<script>
		var isCheckDuplicated = false;

		function backList(){
			location.href = '/admin/buyers';
		}
		function setCheckDuplicated(is) {
			isCheckDuplicated = is;
		}
		function chgType(val){
			if(val == 'BG' || val == 'BL') {
				$('._gov').show();
			} else {
				$('#depth1').val('');
				$('._gov').hide();
			}
			if(val == 'BL') {
				$('._loc').show();
			} else {
				$('#depth2').val('');
				$('#depth3').val('');
				$('._loc').hide();
			}
		}
		function checkDuplicated(){
			// 중복 확인
			var userId = $('input[name=id]').val();
			
			greenpassadm.methods.check.duplicated({ id: userId }, function(request, response){
				console.log('output : ' + response);
				if(!response.result){
					alert(response.ment);
					return false;
				}
				isCheckDuplicated = true;
				alert('가입이 가능한 아이디 입니다.');
			});
		}

		function chkValidation(){
			var userType = $('input[name=type]').val();
			var userId = $('input[name=id]').val();
			var pw = $('input[name=pw]').val();
			var depth1 = $('input[name=depth1]').val();
			var depth2 = $('input[name=depth2]').val();
			var depth3 = $('input[name=depth3]').val();
			var name = $('input[name=name]').val();

			if(!isCheckDuplicated) {
				alert('아이디 중복확인을 해주세요.');
				return false;
			}
			if(userType == '') {
				alert('관리자 유형을 선택해주세요.');
				return false;
			}
			if(userId == '') {
				alert('아이디를 입력해주세요.');
				return false;
			}
			if(pw == '') {
				alert('비밀번호를 입력해주세요.');
				return false;
			}
			if(pw.length < 4) {
				alert('비밀번호는 4자 이상이어야 합니다.');
				return false;
			}
			if(userType != 'AM') {
				if(depth1 == '') {
					alert('국가를 선택해주세요.');
					return false;
				}
				if(userType == 'BL') {
					if(depth2 == '' || depth3 == '') {
						alert('지역을 선택해주세요.');
						return false;
					}
				}
			}
			
			return true;
		}
		function clickSearch() {
			pageNo = 1;
			getList();
		}
		function pressSearch() {
			pageNo = 1;
			if (window.event.keyCode == 13) {
				getList();
			}
		}
		function getPartnerType(type){
			switch(type) {
				case "BG": return "국가 발주처";
				case "BL": return "지역 발주처";
				case "AM": return "슈퍼관리자";
				case "BR": return "가맹점";
				default: return "-";
			}
		}
		function getStatus(code){
			switch(code){
				case "A":
					return "승인완료";
				case "I":
					return "신청접수";
				case "N":
					return "반려";
				default:
					return "-";
			}
		}
		function addBuyer(){
			if(!chkValidation()){
				return false;
			}
			var userType = $('select[name=type]').val();
			var userId = $('input[name=id]').val();
			var pw = $('input[name=pw]').val();
			var depth1 = $('input[name=depth1]').val();
			var depth2 = $('input[name=depth2]').val();
			var depth3 = $('input[name=depth3]').val();
			var name = $('input[name=name]').val();
			var lgnCode = greenpassadm.methods.getMyLanguage();

			greenpassadm.methods.buyer.add({
				type: userType
				, id: userId
				, pw: pw
				, depth1: depth1
				, depth2: depth2
				, depth3: depth3
				, name: name
				, code: lgnCode
			}, function(request, response){
				console.log('output : ' + response);
				if(!response.result){
					alert(response.ment);
					return false;
				}

				alert('등록되었습니다.');
				location.href = '/admin/buyers';
			}, function(e){
				console.log(e);
				alert('서버 통신 에러');
			});
		}
		
		</script>
@include('admin.footer')
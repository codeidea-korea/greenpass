@include('admin.header')

<div id="wrapper" style="min-height: 911px;">
	@include('admin.topContainer')

	<section id="wrtie" class="container">
		<div class="page-title _detailTitle">&nbsp;</div>

		<div class="wrtieContents _passwordBefore">
			<div class="wr-wrap line label200">
				사업자 정보를 수정하시려면 계정 비밀번호를 입력하세요.
				<div class="wr-list">
                    <div class="wr-list-con">
                            <input type="password" name="password" id="password" class="span200" placeholder="비밀번호 입력">
                    </div>
                </div>
			</div>
			<div class="btnSet">
				<a href="#" onclick="checkPassword();" class="btn submit">등록</a>
			</div>
		</div>
		<div class="wrtieContents _passwordAfter">
			<div class="wr-wrap line label200">

                <div class="wr-list">
                    <div class="wr-list-label flex-start">국가</div>
                    <div class="wr-list-con">
                        <select class="default" name="depth1" id="depth1">
                            <option data-subtext="국가를 선택하세요." value="">국가를 선택하세요.</option>
                            <option data-subtext="대한민국" value="ko">대한민국</option>
                            <option data-subtext="라오스" value="lao">라오스</option>
                            <option data-subtext="베트남" value="vt">베트남</option>
                        </select>
                    </div>
                </div>
				
				<div class="wr-list">
                    <div class="wr-list-label flex-start">회사(법인)명</div>
                    <div class="wr-list-con">
                        
                            <input type="text" name="companyName" id="companyName" class="span200" placeholder="회사 이름을 입력하세요.">
                        
                    </div>
                </div>
                <div class="wr-list">
                    <div class="wr-list-label">사업자등록번호</div>
                    <div class="wr-list-con">
                        <label class="inp-wrap left-label">
                            <span class="label">사업자등록번호</span>
                            <input type="text" name="businessNo" id="businessNo" onkeyup="chkNumber(this.value)" class="span200" placeholder="숫자만 입력하세요.">
                        
                        <label class="inp-wrap left-label">
                            <span class="label">등록증 파일 업로드</span>
                            <div class="filebox ">
                                <input type="text" value="선택된 파일이 없습니다." name="upload" class="upload-name" disabled="disabled">
                                <label for="upload_0" class="upload-btn">파일찾기
                                <input name="" type="file" multiple="" id="upload_0" class="upload-hidden">
                            </div>
                        
                    </div>
                </div>
                <div class="wr-list">
                    <div class="wr-list-label flex-start">대표자명</div>
                    <div class="wr-list-con">
                        
                            <input type="text" name="partnerName" id="partnerName" class="span200" placeholder="대표자 이름을 입력하세요.">
                        
                    </div>
                </div>
                <div class="wr-list">
                    <div class="wr-list-label flex-start">사업장 전화번호</div>
                    <div class="wr-list-con">
                        
                            <input type="text" name="companyPhoneNo" id="companyPhoneNo" class="span200" placeholder="사업장 전화번호를 입력하세요.">
                        
                    </div>
                </div>
                <div class="wr-list">
                    <div class="wr-list-label flex-start">사업장 주소</div>
                    <div class="wr-list-con">
                        
                            <a href="#" onclick="openKakaoAddress()" class="btn black ml5">주소 찾기</a>
                            <input type="text" name="companyAddress3" id="companyAddress3" class="span200" placeholder="우편번호" disabled>
                            <input type="text" name="companyAddress1" id="companyAddress1" class="span200" disabled>
                        
                        
                            <input type="text" name="companyAddress2" id="companyAddress2" class="span500" placeholder="상세 주소를 입력하세요.">
                        
                    </div>
                </div>
                <div class="wr-list">
                    <div class="wr-list-label flex-start">긴급 전화번호</div>
                    <div class="wr-list-con">
                        
                            <input type="text" name="partnerPhoneNo" id="partnerPhoneNo" class="span200" placeholder="담당자의 휴대폰번호를 입력하세요.">
                        
                    </div>
                </div>
			</div>

			<div class="btnSet">
				<a href="#" onclick="modifyBranch();" class="btn submit">등록</a>
				<a href="#" onclick="backList();" class="btn gray">취소</a>
			</div>
		</div>

        <div id="map-pup" class="_custPup">
            <script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
            <main class="mainWrap" id="place-pup" style="z-index: 999;position: fixed;top: 0px;width: 100%;left: 0px;">
                <div class="content-container" id="addressMap">
                </div>
            </main>
        </div>
	</section>

<script>
function openKakaoAddress(){
	new daum.Postcode({
	    oncomplete: function(data) {
	        $('input[name=companyAddress3]').val(data.zonecode);
	        $('input[name=companyAddress1]').val(data.address);
	        $('#map-pup').hide();
	    }, onresize : function(size) {
	    	$('#addressMap').height($(window).height());
	    }, 
	    width : '100%',
	    height : '100%'
	}).embed($('#addressMap')[0]);
	$('#map-pup').show();
}
</script>

<script>
function backList(){
    history.back();
}
function chkNumber(val){
    if(val != '' && isNaN(Number(val))) {
        alert('숫자만 입력해주세요.');
        $('#businessNo').val('');
        return false;
    }
    return true;
}
var uploadFilePath = '';
function chkValidationPup(){
    var userId = $('input[name=id]').val();
    var companyName = $('input[name=companyName]').val();
    var businessNo = $('input[name=businessNo]').val();
    var partnerName = $('input[name=partnerName]').val();
    var companyPhoneNo = $('input[name=companyPhoneNo]').val();
    var partnerPhoneNo = $('input[name=partnerPhoneNo]').val();
    var companyAddress1 = $('input[name=companyAddress1]').val();
    var companyAddress2 = $('input[name=companyAddress2]').val();
    var companyAddress3 = $('input[name=companyAddress3]').val();

    if(userId == '') {
        alert('아이디로 사용할 이메일을 입력해주세요.');
        return false;
    }
    if(companyName == '') {
        alert('회사 명을 입력해주세요.');
        return false;
    }
    if(businessNo == '') {
        alert('사업자 등록번호를 입력해주세요.');
        return false;
    }
    if(!chkNumber(businessNo)) {
        return false;
    }
    if(partnerName == '') {
        alert('대표자명을 입력해주세요.');
        return false;
    }
    if(companyPhoneNo == '') {
        alert('사업장 전화번호를 입력해주세요.');
        return false;
    }
    if(partnerPhoneNo == '') {
        alert('담당자 전화번호를 입력해주세요.');
        return false;
    }
    if(companyAddress1 == '' || companyAddress2 == '' || companyAddress3 == '') {
        alert('사업장 주소를 입력해주세요.');
        return false;
    }

    return true;
}
function modifyBranch(){
    
    uploadFile();

    if(!chkValidationPup()){
        return false;
    }

    var userId = localStorage.getItem('user_no');
    var companyName = $('input[name=companyName]').val();
    var businessNo = $('input[name=businessNo]').val();
    var partnerName = $('input[name=partnerName]').val();
    var companyPhoneNo = $('input[name=companyPhoneNo]').val();
    var partnerPhoneNo = $('input[name=partnerPhoneNo]').val();
    var companyAddress1 = $('input[name=companyAddress1]').val();
    var companyAddress2 = $('input[name=companyAddress2]').val();
    var companyAddress3 = $('input[name=companyAddress3]').val();
//	var lgnCode = greenpassadm.methods.getMyLanguage();
	var lgnCode = $('select[name=depth1]').val(); // 2022.03.06. 국가 선택 // greenpassadm.methods.getMyLanguage();

    greenpassadm.methods.branch.edit({
        branchNo: userId
        , businessNo: businessNo
        , businessFilePath: uploadFilePath
        , companyName: companyName
        , partnerName: partnerName
        , companyPhoneNo: companyPhoneNo
        , companyAddress1: companyAddress1
        , companyAddress2: companyAddress2
        , companyAddress3: companyAddress3
//        , gpsX: gpsX
//        , gpsY: gpsY
        , partnerPhoneNo: partnerPhoneNo
		, code: lgnCode
    }, function(request, response){
        console.log('output : ' + response);
        if(!response.result){
            alert(response.ment);
            return false;
        }

        alert('수정 되었습니다.');
        backList();
        
    }, function(e){
        console.log(e);
        alert('서버 통신 에러');
    });
}
var isChangeFile = false;
function uploadFile(){
    var form = new FormData();
	form.append( "upload", $("#upload_0")[0].files[0] );
	
	if(!$("#upload_0")[0].files[0]) {
		return false;
	}
    
    jQuery.ajax({
        url : "/api/admin/upload"
        , type : "POST"
        , processData : false
        , contentType : false
        , data : form
        , async: false
        , success:function(response) {
            console.log(response);
			uploadFilePath = response.path;
        }
        ,error: function (jqXHR) 
        { 
            alert(jqXHR.responseText); 
        }
    });
}
$('._passwordAfter').hide();
$(document).ready(function(){
	getBranchInfo();
});
function getBranchInfo(){
	greenpassadm.methods.branch.one({ branchNo: localStorage.getItem('user_no') }, function(request, response){
		console.log('output : ' + response);
		if(!response.result){
			alert(response.ment);
			return false;
		}

		$('input[name=companyName]').val(response.data.branchInfo.company_name);
		$('input[name=businessNo]').val(response.data.branchInfo.business_registration_no);
		$('input[name=upload]').val(response.data.partnerInfo.business_registration_file);
		uploadFilePath = response.data.partnerInfo.business_registration_file;
		$('input[name=partnerName]').val(response.data.branchInfo.partner_name);
		$('input[name=companyPhoneNo]').val(response.data.branchInfo.company_phone);
		$('input[name=partnerPhoneNo]').val(response.data.branchInfo.partner_phone);
		$('input[name=companyAddress1]').val(response.data.partnerInfo.company_address1);
		$('input[name=companyAddress2]').val(response.data.partnerInfo.company_address2);
        $('input[name=companyAddress3]').val(response.data.partnerInfo.company_address3);
        
        $('select[name=depth1]').val(response.data.partnerInfo.language_code);
	});
}
function checkPassword(){
	// 비밀번호 검증
	var pw = $('input[name=password]').val();
	if(!pw || pw.length < 4) {
		alert('비밀번호를 입력해주세요.');
		return false;
	}

	greenpassadm.methods.check.password({ branchNo: localStorage.getItem('user_no'), pw:pw }, function(request, response){
		console.log('output : ' + response);
		if(!response.result){
			alert(response.ment);
			return false;
		}
		$('._passwordBefore').hide();
		$('._passwordAfter').show();
	});
}
</script>
@include('admin.footer')
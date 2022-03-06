
<style>
.layerPopup {
    color: #1b1b1b;
    margin: 60px auto;
    width: auto;
    min-width: 300px;
}
</style>

<div id="pop-branch" class="layerPopup zoom-anim-dialog mfp-hide">

    <section class="popcon-wrapper container" id="wrtie">

        <div class="wrtieContents">
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
                    <div class="wr-list-label flex-start">ID</div>
                    <div class="wr-list-con">
                        
                            <input type="text" name="id" id="id" onkeyup="setCheckDuplicated()" class="span200" placeholder="아이디로 사용할 이메일을 입력하세요.">
                            <a href="#" onclick="checkDuplicated()" class="btn black ml5">중복 확인</a>
                        
                    </div>
                </div>
                <div class="wr-list">
                    <div class="wr-list-label flex-start">비밀번호</div>
                    <div class="wr-list-con">
                        
                            <input type="password" name="pw" id="pw" class="span200" placeholder="비밀번호를 입력하세요.">
                        
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
                                <input type="text" value="선택된 파일이 없습니다." class="upload-name" disabled="disabled">
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
                    <div class="wr-list-label flex-start">긴급 전화번호</div>
                    <div class="wr-list-con">
                        
                            <input type="text" name="partnerPhoneNo" id="partnerPhoneNo" class="span200" placeholder="담당자의 휴대폰번호를 입력하세요.">
                        
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
            </div>
            <div class="btnSet mt30">
                <a href="#" id="auth-cancel-clk" onclick="addBranch()" class="btn green span">확인</a>
                <a href="#" id="auth-retry-clk" onclick="backList()" class="btn blue span">취소</a>
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
</div>


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
    location.href = '/admin/branchs';
}
function chkNumber(val){
    if(val != '' && isNaN(Number(val))) {
        alert('숫자만 입력해주세요.');
        $('#businessNo').val('');
        return false;
    }
    return true;
}
function openAddBranchPup(){
    $.magnificPopup.open({
        items: {
            src: '#pop-branch'
        },
        type: 'inline'
    });
}
function closeAddBranchPup(){
    $.magnificPopup.close({
        items: {
            src: '#pop-branch'
        },
        type: 'inline'
    });
}
var uploadFilePath = '';
function chkValidationPup(){
    var userId = $('input[name=id]').val();
    var pw = $('input[name=pw]').val();
    var companyName = $('input[name=companyName]').val();
    var businessNo = $('input[name=businessNo]').val();
    var partnerName = $('input[name=partnerName]').val();
    var companyPhoneNo = $('input[name=companyPhoneNo]').val();
    var partnerPhoneNo = $('input[name=partnerPhoneNo]').val();
    var companyAddress1 = $('input[name=companyAddress1]').val();
    var companyAddress2 = $('input[name=companyAddress2]').val();
    var companyAddress3 = $('input[name=companyAddress3]').val();

    if(!confirm('아이디 없이 지점 등록을 하시겠습니까? /n - 지점별 고객의 인증 처리는 가능합니다.\n - 지점별 관리자 접근이 불가능합니다.')) {
        if(userId == '') {
            alert('아이디로 사용할 이메일을 입력해주세요.');
            return false;
        }
        if(!isCheckDuplicated) {
            alert('아이디 중복확인을 해주세요.');
            return false;
        }
        if(pw == '' || pw.length < 4) {
            alert('비밀번호를 입력해주세요.');
            return false;
        }
    }
    if(companyName == '') {
        alert('회사 명을 입력해주세요.');
        return false;
    }
    if(businessNo == '') {
        alert('사업자 등록번호를 입력해주세요.');
        return false;
    }
    if(!uploadFilePath || uploadFilePath == '') {
        alert('사업자 등록증을 업로드해주세요.');
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
function addBranch(){
    
    uploadFile();

    if(!chkValidationPup()){
        return false;
    }

    var userId = $('input[name=id]').val();
    var pw = $('input[name=pw]').val();
    var companyName = $('input[name=companyName]').val();
    var businessNo = $('input[name=businessNo]').val();
    var partnerName = $('input[name=partnerName]').val();
    var companyPhoneNo = $('input[name=companyPhoneNo]').val();
    var partnerPhoneNo = $('input[name=partnerPhoneNo]').val();
    var companyAddress1 = $('input[name=companyAddress1]').val();
    var companyAddress2 = $('input[name=companyAddress2]').val();
    var companyAddress3 = $('input[name=companyAddress3]').val();
	var lgnCode = $('select[name=depth1]').val(); // 2022.03.06. 국가 선택 // greenpassadm.methods.getMyLanguage();

    greenpassadm.methods.branch.add({
        id: userId
        , pw: pw
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

        alert('등록되었습니다.');
        if(!nextMove || nextMove == '') {
            closeAddBranchPup();
        } else {
            location.href = nextMove;
        }
        
    }, function(e){
        console.log(e);
        alert('서버 통신 에러');
    });
}
function uploadFile(){
    var form = new FormData();
    form.append( "upload", $("#upload_0")[0].files[0] );
    
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

var isCheckDuplicated = false;
function setCheckDuplicated(){
    isCheckDuplicated = false;
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
</script>
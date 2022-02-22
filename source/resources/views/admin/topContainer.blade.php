<div id="topContainer">
    <ul class="gbMenu">
        <li>
            <select id="lang" onchange="chooseLanguage(this.value)">
                <option value="ko" data-content='<span class="icon_lang"></span>한국어'>한국어</option>
                <option value="vt" data-content='<span class="icon_lang"></span>베트남어'>베트남어</option>
                <option value="la" data-content='<span class="icon_lang"></span>라오어'>라오어</option>
            </select>
        </li>
        <li><a href="#" onclick="wait()">마이페이지</a></li>
        <li><a href="#" onclick="logout()">로그아웃</a></li>
    </ul>
</div>

<script>
function wait(){
    alert('준비중입니다.');
}
function logout(){
    if(!confirm('로그아웃 하시겠습니까?')){
        return false;
    }
    location.href = '/admin/logout';
}
function chooseLanguage(val) {
    wait();
    return false;
    localStorage.setItem('lan', val);
    window.location.reload();
}
function loadPageLanguage(){
    var lgnCode = greenpassadm.methods.getMyLanguage();
    $('#lang').val(lgnCode);
}

</script>
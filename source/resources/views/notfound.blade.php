@include('user.header')

<section id="login">
	<div class="inner">
        페이지를 찾을 수 없습니다. 5초 뒤 인트로 페이지로 이동합니다.
    </div>
</section>

<script>
setTimeout(function () {
    window.location.href = '/';
}, 5000);
</script>

@include('user.footer')
@include('admin.login.header')

<script>
localStorage.clear();

setTimeout(function () {
    location.href = '/admin/';
}, 100);
</script>
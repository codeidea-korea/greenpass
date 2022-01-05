
<footer id="footer">
	<div class="footer_container">
		<span class="copyrights">&copy;2021 codeidea. All Rights Reserved.</span>
	</div>
</footer>

</div>
<!-- //#wrapper -->

<style>
select {
	line-height: 33px;
	height:32px;line-height:32px;padding-left:12px;font-size:13px;
}
</style>

<script>
$('#main, #view, #wrtie, #background').parent().addClass('bg');

//location text넣기
$(document).ready(function(){
	var opener_name = $('#header #nav_ul li.open > a').text(),
		page_name = $('#header #nav_ul li.active').text() ? $('#header #nav_ul li.active').text() : 'Table';
	if(typeof opener_name !== typeof undefined && opener_name !== '') {
		$('#topContainer .loaction').append('<span>'+opener_name+'</span>');
	}
	$('#topContainer .loaction').append('<span>'+page_name+'</span>');
});
</script>

</body>
</html>
		<footer id="footer">
			<div class="inner">
				©GREENPASS 2021 All Rights Reserved
			</div>
		</footer>
	
	</div>
	<!-- //#wrapper -->
	
</div>
<!-- //#page-wrapper-->

<script>
$('.layer-popup').hide();
$('.pop-closer').off().on('click', function(){
	$('body, html').css('overflow', 'visible');
	$('.layer-popup').hide();
});
$(document).mouseup(function (e){
	var LayerPopup = $(".layer-popup");
	if(LayerPopup.has(e.target).length === 0){
//		console.log(LayerPopup.has(e.target).length);
		$('body, html').css('overflow', 'visible');
		$('.layer-popup').hide();
	}
});
</script>

</body>
</html>
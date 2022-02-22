@include('admin.header')

<div id="wrapper" style="min-height: 911px;">
	@include('admin.topContainer')

	<section id="wrtie" class="container">
		<div class="page-title _detailTitle">&nbsp;</div>

		<div class="wrtieContents">
			<div class="wr-wrap line label200">
				
				<div class="wr-list-con">
					<div class="wr-list">
						<h3>기본정보</h3>
					</div>
					<div class="wr-list">
                		<div class="wr-list-label">ID</div>
						<div class="wr-list-con">
							
								<span class="label _buyerId">&nbsp;</span>
							
						</div>
					</div>
					<div class="wr-list">
                		<div class="wr-list-label">이름</div>
						<div class="wr-list-con">
							
								<span class="label _buyerName">&nbsp;</span>
							
						</div>
					</div>
					<div class="wr-list">
                		<div class="wr-list-label">유형</div>
						<div class="wr-list-con">
							
								<span class="label _buyerType">&nbsp;</span>
							
						</div>
					</div>
					<div class="wr-list">
                		<div class="wr-list-label">국가</div>
						<div class="wr-list-con">
							
								<span class="label _buyerGov">&nbsp;</span>
							
						</div>
					</div>
					<div class="wr-list">
                		<div class="wr-list-label">지역</div>
						<div class="wr-list-con">
							
								<span class="label _buyerLoc">&nbsp;</span>
							
						</div>
					</div>
					<div class="wr-list">
                		<div class="wr-list-label">등록일시</div>
						<div class="wr-list-con">
							
								<span class="label _regDt">&nbsp;</span>
							
						</div>
					</div>
					<div class="wr-list">
                		<div class="wr-list-label">최근접속일시</div>
						<div class="wr-list-con">
							
								<span class="label _recentLoginDt">&nbsp;</span>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script>
		var view_type = localStorage.getItem('list_type');
		if(view_type !== 'buyer') {
			alert('잘못된 접근입니다.');
			location.href = '/admin/';
		}

		var isVisible = false;
		var useDay = false;
		var useTime = false;
		var pageNo = 1;

		function toggleDay(){
			$('._dateTime').toggle();
			useDay = !useDay;
		}
		function toggleTime(){
			$('._toggleTimeSection').toggle();
			useTime = !useTime;
		}
		function toggleSearch(){
			$('._toggleSection').toggle();
			isVisible = !isVisible;
			$('.toggleBtn').text(isVisible ? '접기' : '열기');
		}
		function chkValidation(){
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
		var bno = '{{ request()->bno }}';

		$(document).ready(function(){
			getBuyerInfo();
		});

		function getBuyerInfo(){
			greenpassadm.methods.buyer.one({ buyerNo: bno }, function(request, response){
				console.log('output : ' + response);
				if(!response.result){
					alert(response.ment);
					return false;
				}
				$('._detailTitle').text(response.data.companyInfo.partner_id + ' 님의 상세 정보');
				$('._buyerId').text(response.data.companyInfo.partner_id);
				$('._buyerName').text(response.data.department.director_name);
				$('._buyerType').text(getPartnerType(response.data.companyInfo.partner_type));
				$('._buyerGov').text(response.data.department.depth1);
				$('._buyerLoc').text(response.data.department.depth2 + response.data.department.depth3);
				$('._regDt').text(response.data.department.create_dt);
				$('._recentLoginDt').text(response.data.department.create_dt);
			});
		}
		</script>
@include('admin.footer')
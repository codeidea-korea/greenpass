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
						<div class="wr-list-label">상호명</div>
						<div class="wr-list-con">
							
								<span class="label _branchName">&nbsp;</span>
							
						</div>
					</div>
					<div class="wr-list">
						<div class="wr-list-label">대표자명</div>
						<div class="wr-list-con">
							
								<span class="label _branchDirectorName">&nbsp;</span>
							
						</div>
					</div>
					<div class="wr-list">
						<div class="wr-list-label">사업자 등록 번호</div>
						<div class="wr-list-con">
							
								<span class="label _branchCopNo">&nbsp;</span>
							
						</div>
					</div>
					<div class="wr-list">
						<div class="wr-list-label">사업장소재지</div>
						<div class="wr-list-con">
							
								<span class="label _branchAdress">&nbsp;</span>
							
						</div>
					</div>
					<div class="wr-list">
						<div class="wr-list-label">사업장연락처</div>
						<div class="wr-list-con">
							
								<span class="label _branchPhone">&nbsp;</span>
							
						</div>
					</div>
					<div class="wr-list">
						<div class="wr-list-label">긴급연락처</div>
						<div class="wr-list-con">
							
								<span class="label _branchDirectorPhone">&nbsp;</span>
							
						</div>
					</div>

					<div class="wr-list">
						<h3>계정 정보</h3>
					</div>
					<div class="wr-list">
						<div class="wr-list-label">ID</div>
						<div class="wr-list-con">
							
								<span class="label _userId">&nbsp;</span>
							
						</div>
					</div>
					<div class="wr-list">
						<div class="wr-list-label">가입신청일</div>
						<div class="wr-list-con">
							
								<span class="label _regDt">&nbsp;</span>
							
						</div>
					</div>
					<div class="wr-list">
						<div class="wr-list-label">등록일</div>
						<div class="wr-list-con">
							
								<span class="label _approveDt">&nbsp;</span>
							
						</div>
					</div>
				</div>

				<div class="wr-list-con">
					<div class="wr-list">
						<h3>서류 정보</h3>
					</div>
					<div class="wr-list">
						<img id="copImg" src="" onerror="">
					</div>
				</div>
			</div>
		</div>
	</section>

	<script>
		var view_type = localStorage.getItem('list_type');
		if(view_type !== 'branch_') {
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
		function getAuthType(type){
			switch(type){
				case 'N':
					return 'NFC';
				case 'G':
					return 'GPS';
				case 'B':
					return 'BEACON';
				default: break;
			}
			return "-";
		}
		var bno = '{{ request()->bno }}';

		$(document).ready(function(){
			getBranchInfo();
		});

		function getBranchInfo(){
			greenpassadm.methods.branch.one({ branchNo: bno }, function(request, response){
				console.log('output : ' + response);
				if(!response.result){
					alert(response.ment);
					return false;
				}
				$('._detailTitle').text(response.data.branchInfo.company_name);
				$('._branchName').text(response.data.branchInfo.company_name);
				$('._branchDirectorName').text(response.data.branchInfo.partner_name);
				$('._branchCopNo').text(response.data.branchInfo.business_registration_no);
				$('._branchAdress').text(response.data.partnerInfo.company_address1 + response.data.partnerInfo.company_address2);
				$('._branchPhone').text(response.data.branchInfo.company_phone);
				$('._branchDirectorPhone').text(response.data.branchInfo.partner_phone);
				$('._userId').text(response.data.partnerInfo.partner_id);
				$('._regDt').text(response.data.partnerInfo.create_dt);
				$('._approveDt').text(response.data.partnerInfo.update_dt);
				$('#copImg').attr('src', '/'+response.data.branchInfo.business_registration_file + '?v=' + (new Date().getTime()));
				$('#copImg').show();
			});
		}
		</script>
@include('admin.footer')
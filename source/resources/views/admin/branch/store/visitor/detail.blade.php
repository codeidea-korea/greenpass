@include('admin.header')

<div id="wrapper" style="min-height: 911px;">
	@include('admin.topContainer')

	<section id="wrtie" class="container">
		<div class="page-title _detailTitle">&nbsp;</div>
		<div class="wrtieContents">
			<div class="wr-wrap line label200">
			
				<div class="wr-list">
					<div class="wr-list-con">
						<div class="wr-list">
							<div class="wr-list-label">
								<span class="label">이름</span>
							</div>
							<div class="wr-list-con">
								<span class="label _detailName">&nbsp;</span>
							</div>
						</div>
					</div>
					<div class="wr-list-con">
						<div class="wr-list">
							<div class="wr-list-label">
								<span class="label">생년월일</span>
							</div>
							<div class="wr-list-con">
								<span class="label _userBirthday">00-0000-123456</span>
							</div>
						</div>
					</div>
				</div>
				<div class="wr-list">
					<div class="wr-list-con">
						<div class="wr-list">
							<div class="wr-list-label">
								<span class="label">휴대폰번호</span>
							</div>
							<div class="wr-list-con">
								<span class="label _userPhone">010-0000-0000</span>
							</div>
						</div>
					</div>
					<div class="wr-list-con">
						<div class="wr-list">
							<div class="wr-list-label">
								<span class="label">누적인증횟수</span>
							</div>
							<div class="wr-list-con">
								<span class="label _userAuthCnt">&nbsp;</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="tbl-basic cell td-h4 mt10">
			<div class="tbl-header">
				<div class="caption"><b id="duration">0</b>기간 내 검색 결과입니다.</div>
				<div class="rightSet"></div>
			</div>
			<table>
				<colgroup>
					<col>
					<col>
					<col>
				</colgroup>
				<thead>
					<tr>
						<th>방문지(상호)</th>
						<th>주소</th>
						<th>인증방식</th>
						<th>인증일시</th>
					</tr>
				</thead>

				<tbody class="_tableBody">
					<tr>
						<td>1</td>
						<td>홍길동</td>
						<td>홍길동</td>
						<td class="date">2020. 10. 23</td>
					</tr>
				</tbody>			
			</table>	

			<nav class="pg_wrap">
				<a href="#" class="pg_btn first"></a>
				<a href="#" class="pg_btn prev"></a>
				<a href="#" class="pg_btn active">1</a>
				<a href="#" class="pg_btn">2</a>
				<a href="#" class="pg_btn">3</a>
				<a href="#" class="pg_btn">4</a>
				<a href="#" class="pg_btn">5</a>
				<a href="#" class="pg_btn">6</a>
				<a href="#" class="pg_btn">7</a>
				<a href="#" class="pg_btn">8</a>
				<a href="#" class="pg_btn">9</a>
				<a href="#" class="pg_btn">10</a>
				<a href="#" class="pg_btn next"></a>
				<a href="#" class="pg_btn last"></a>
			</nav>
		</div>
	</section>

	<script>
		var view_type = localStorage.getItem('list_type');
		if(view_type !== 'auth_visito') {
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
		var startTime1 = localStorage.getItem('startTime1');
		var startTime2 = localStorage.getItem('startTime2');
		var endTime1 = localStorage.getItem('endTime1');
		var endTime2 = localStorage.getItem('endTime2');
		var startDay = localStorage.getItem('startDay');
		var endDay = localStorage.getItem('endDay');
		var visitorNo = localStorage.getItem('visitorNo');

		$(document).ready(function(){
			getDetailInfo();
		});

		function getDetailInfo(){
			greenpassadm.methods.user.info({ id: bno }, function(request, response){
				console.log('output : ' + response);
				if(!response.result){
					alert(response.ment);
					return false;
				}

				$('._detailTitle').text(response.user_phone + '님의 인증정보');
				$('._detailName').text(response.user_name);
				$('._userBirthday').text(response.user_birthday);
				$('._userPhone').text(response.user_phone);

				$('#duration').text( startDay + ' ' + startTime1 + ':' + startTime2 + ' ~ ' + endDay + ' ' + endTime1 + ':' + endTime2);
				visitorNo = response.user_phone;
				getList();
			});
		}
		function getList(){
			if(!chkValidation()){
				return false;
			}
			
			var data = { pageNo: pageNo, pageSize: 10 };
			if(useDay) {
				if(useTime) {
					startDay = startDay + ' ' + ((startTime1 < 10 ? '0' : '') + startTime1) + ((startTime2 < 10 ? '0' : '') + startTime2);
					endDay = endDay + ' ' + ((endTime1 < 10 ? '0' : '') + endTime1) + ((endTime2 < 10 ? '0' : '') + endTime2);
				}
				data.startDt = startDay;
				data.endDt = endDay;
			}
			if(visitorNo && visitorNo != ''){
				data.visitorNo = visitorNo;
			}

			greenpassadm.methods.branch.approve(data, function(request, response){
				console.log('output : ' + response);
				if(!response.result){
					alert(response.ment);
					return false;
				}
				$('#totalCnt').html( greenpassadm.methods.toNumber(response.data.totCnt) );
				$('._userAuthCnt').text(greenpassadm.methods.toNumber(response.data.totCnt));

				// _tableBody
				if(response.data.totCnt == 0){
					$('._tableBody').html('<tr>'
										+'    <td colspan="4" class="td_empty"><div class="empty_list" data-text="내용이 없습니다."></div></td>'
										+'</tr>');
					$('.pg_wrap').html('<nav class="pg_wrap">'
										+'    <a href="#" class="pg_btn first"></a>'
										+'    <a href="#" class="pg_btn prev"></a>'
										+'    <a href="#" class="pg_btn active">1</a>'
										+'    <a href="#" class="pg_btn next"></a>'
										+'    <a href="#" class="pg_btn last"></a>'
										+'</nav>');
					return;
				}

				var bodyData = '';
				for(var inx=0; inx<response.data.auth.length; inx++){
					var phoneNo = response.data.authDetail[inx].user_phone;
					var mail = response.data.authDetail[inx].sns_mail;

					bodyData = bodyData 
								+'<tr>'
								+'	<td>'+phoneNo + '(' + mail+')</td>'
								+'	<td>'+getAuthType(response.data.authDetail[inx].auth_type)+'</td>'
								+'	<td>'+response.data.authDetail[inx].create_dt+'</td>'
								+'</tr>';
					
				}
				if(response.data.totCnt > 0)
				{
					var totSize = response.data.totCnt;
					var totPagePt = Math.ceil(totSize / pageSize);
					var pageStt = (Math.ceil(request.pageNo/5)-1)*5 +1;
					var pageEnd = Math.ceil(request.pageNo/5)*5;
					pageEnd = pageEnd > totPagePt ? totPagePt : pageEnd;
					var eventName = 'onclick'; var pageTmp = '';
					
					pageTmp+= '<nav class="pg_wrap">'
							+'    <a href="#" class="pg_btn first" '+(pageStt > 5 ? eventName+'="loadList(1)"' : '')+'></a>'
							+'    <a href="#" class="pg_btn prev" '+(pageStt > 5 ? eventName+'="loadList('+(pageStt-1)+')"' : '')+'></a>';
					for(var inx=pageStt; inx <= pageEnd; inx++)
					{
						pageTmp+='<a href="#" class="pg_btn '+(inx == request.pageNo ? 'active' : '')+'" '+eventName+'="loadList('+(inx)+')">'+(inx)+'</a>';
					}
					pageTmp+='    <a href="#" class="pg_btn next" '+(totPagePt > pageEnd ? eventName+'="loadList('+(pageEnd+1)+')"' : '')+'></a>'
							+'    <a href="#" class="pg_btn last" '+(totPagePt > pageEnd ? eventName+'="loadList('+(totPagePt)+')"' : '')+'></a>'
							+'</nav>';

					$('.pg_wrap').html(pageTmp);
				}
				$('._tableBody').html(bodyData);
			}, function(e){
				console.log(e);
				alert('서버 통신 에러');
			});
		}
		function loadList(no){
			pageNo = no;
			getList();
		}
		</script>
@include('admin.footer')
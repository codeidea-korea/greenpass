@include('admin.header')

<div id="wrapper" style="min-height: 911px;">
	@include('admin.topContainer')

	<section id="wrtie" class="container">
		<div class="page-title">방문자 검색</div>
		<div class="wrtieContents">
			<div class="wr-wrap line label200 _toggleSection">
				<div class="wr-list">
					<div class="wr-list-con">
						<label class="checkbox-wrap"><input type="checkbox" name="useDate" value="" onclick="toggleDay()"><span></span>기간설정</label>
						<label class="checkbox-wrap"><input type="checkbox" name="useTime" value="" onclick="toggleTime()"><span></span>시간단위입력</label>
					</div>
				</div>
				<div class="wr-list _dateTime">
					<div class="wr-list-con">					
						<label class="inp-wrap left-label"><span class="label">날짜</span><label class="labelDate"><input type="text" name="startDay" value="" class="span130 datepicker"><span></span></label></label>
					</div>
					<div class="wr-list-con _toggleTimeSection">
						<input type="number" name="startTime1" value="" min="0" max="23" class="span200" placeholder=""> 시
						<input type="number" name="startTime2" value="" min="0" max="59" class="span200" placeholder=""> 분
					</div>
					- 
					<div class="wr-list-con">					
						<label class="inp-wrap left-label"><span class="label">날짜</span><label class="labelDate"><input type="text" name="endDay" value="" class="span130 datepicker"><span></span></label></label>
					</div>
					<div class="wr-list-con _toggleTimeSection">
						<input type="number" name="endTime1" value="" min="0" max="23" class="span200" placeholder=""> 시
						<input type="number" name="endTime2" value="" min="0" max="59" class="span200" placeholder=""> 분
					</div>
				</div>
				
				<div class="wr-list">
					<div class="wr-list-label">휴대폰번호</div>
					<div class="wr-list-con">
						<input type="text" name="visitorNo" value="" class="span200" onkeyup="pressSearch();" placeholder="휴대폰번호를 입력하세요."><a href="#" onclick="clickSearch()" class="btn black ml5">검색</a>
					</div>
				</div>
			</div>
			<div class="btnSet">
				<a href="#" class="btn submit toggleBtn" onclick="toggleSearch()">접기</a>
			</div>
		</div>

		<div class="tbl-basic cell td-h4 mt10">
			<div class="tbl-header">
				<div class="caption">검색 결과 <b id="totalCnt">0</b>건이 검색되었습니다.</div>
				<div class="rightSet"></div>
			</div>
			<table>
				<colgroup>
					<col>
					<col>
					<col>
					<col>
					<col>
				</colgroup>
				<thead>
					<tr>
						<th>휴대폰번호</th>
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
		var isVisible = true;
		var useDay = true;
		var useTime = true;
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
			var startTime1 = $('input[name=startTime1]').val();
			var startTime2 = $('input[name=startTime2]').val();
			var endTime1 = $('input[name=endTime1]').val();
			var endTime2 = $('input[name=endTime2]').val();
			var startDay = $('input[name=startDay]').val();
			var endDay = $('input[name=endDay]').val();
			var visitorNo = $('input[name=visitorNo]').val();
			
			if(useDay){
				if(!startDay || startDay == ''
					|| !endDay || endDay == ''){
					// 날짜 입력한다고 했으면서 안한 경우
					alert('검색 정보를 입력해주세요.');
					return false;
				}
				if(useTime){
					if(!startTime1 || startTime1 == ''
						|| !startTime2 || startTime2 == ''
						|| !endTime1 || endTime1 == ''
						|| !endTime2 || endTime2 == ''){
						// 시간 입력한다고 했으면서 안한 경우
						alert('검색 정보를 입력해주세요.');
						return false;
					}
				}
			} else {
				if(!visitorNo || visitorNo == ''){
					alert('검색 정보를 입력해주세요.');
					return false;
				}
				if(visitorNo.length < 10){
					alert('검색 정보를 입력해주세요.');
					return false;
				}
			}
			
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
		function getList(){
			if(!chkValidation()){
				return false;
			}
			var startTime1 = $('input[name=startTime1]').val();
			var startTime2 = $('input[name=startTime2]').val();
			var endTime1 = $('input[name=endTime1]').val();
			var endTime2 = $('input[name=endTime2]').val();
			var startDay = $('input[name=startDay]').val();
			var endDay = $('input[name=endDay]').val();
			var visitorNo = $('input[name=visitorNo]').val();
			
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

			greenpassadm.methods.branch.approves(data, function(request, response){
				console.log('output : ' + response);
				if(!response.result){
					alert(response.ment);
					return false;
				}
				$('#totalCnt').text( greenpassadm.methods.toCurrency(response.data.totCnt) );

				// _tableBody
				if(response.totCnt == 0){
					$('._tableBody').html('<tr>'
										+'    <td colspan="5" class="td_empty"><div class="empty_list" data-text="내용이 없습니다."></div></td>'
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
					bodyData = bodyData 
								+'<tr>'
								+'	<td>'+response.data.auth[inx].user_phone+'</td>'
								+'	<td>'+response.data.auth[inx].location_name+'</td>'
								+'	<td>'+response.data.auth[inx].company_address1+'</td>'
								+'	<td>'+getAuthType(response.data.auth[inx].auth_type)+'</td>'
								+'	<td>'+response.data.auth[inx].create_dt+'</td>'
								+'</tr>';
					
				}
				if(response.totCnt > 0)
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
		function getAuthType(code){
			switch(code){
				case "G":
					return "GPS";
				case "B":
					return "비콘";
				case "NFC":
					return "NFC";
				default:
					return "-";
			}
		}
		function loadList(no){
			pageNo = no;
			getList();
		}
		</script>
@include('admin.footer')
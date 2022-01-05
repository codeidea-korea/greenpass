@include('admin.header')

<div id="wrapper" style="min-height: 911px;">
	@include('admin.topContainer')

	<section id="wrtie" class="container">
		<div class="page-title">가맹점 신청 리스트</div>
		<div class="wrtieContents">
			<div class="wr-wrap line label200">
				<div class="wr-list">
					<div class="wr-list-con">
						<label class="checkbox-wrap"><input type="checkbox" name="useInsert" value="" onclick="clickSearch()"><span></span>신청접수 상태 게시물만 보기</label>
					</div>
				</div>
				<div class="wr-list">
					<div class="wr-list-label">상호명 검색</div>
					<div class="wr-list-con">
						<input type="text" name="branchName" value="" class="span200" onkeyup="pressSearch();" placeholder="상호명 검색"><a href="#" onclick="clickSearch()" class="btn black ml5">검색</a>
					</div>
				</div>
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
				</colgroup>
				<thead>
					<tr>
						<th>상태</th>
						<th>상호명</th>
						<th>신청일자</th>
					</tr>
				</thead>

				<tbody class="_tableBody">
					<tr>
						<td>1</td>
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
		function chkValidation(){
			var branchName = $('input[name=branchName]').val();
			
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
			var branchName = $('input[name=branchName]').val();
			var branchInsertWait = $('input[name=useInsert]').is(":checked");

			greenpassadm.methods.branch.list({
				branchName: branchName
				, pageNo: pageNo
				, pageSize: 10
				, status: (branchInsertWait ? 'I': undefined)
			}, function(request, response){
				console.log('output : ' + response);
				if(!response.result){
					alert(response.ment);
					return false;
				}
				$('#totalCnt').text( greenpassadm.methods.toCurrency(response.data.totCnt) );

				// _tableBody useInsert
				if(response.totCnt == 0){
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
				for(var inx=0; inx<response.data.branches.length; inx++){
					bodyData = bodyData 
								+'<tr>'
								+'	<td>'+getStatus(response.data.branches[inx].status)+'</td>'
								+'	<td>'+response.data.branches[inx].company_name+'</td>'
								+'	<td>'+response.data.branches[inx].create_dt+'</td>'
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
		function loadList(no){
			pageNo = no;
			getList();
		}
		</script>
@include('admin.footer')
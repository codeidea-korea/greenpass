@include('admin.header')

<div id="wrapper" style="min-height: 911px;">
	@include('admin.topContainer')

	<section id="wrtie" class="container">
		<div class="page-title">발주처 관리자 리스트</div>

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
						<th>유형</th>
						<th>국가</th>
						<th>지역</th>
						<th>이름</th>
						<th>ID</th>
						<th>등록일시</th>
					</tr>
				</thead>

				<tbody class="_tableBody">
					<tr>
						<td>1</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
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
		var firstInPage = true;
		var pageNo = 1;
		var pageSize = 10;

		$(document).ready(function(){
			getList();
			firstInPage = false;
		});

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
		function getList(){
			if(!chkValidation()){
				return false;
			}
			greenpassadm.methods.buyer.list({
				pageNo: pageNo
				, pageSize: 10
			}, function(request, response){
				console.log('output : ' + response);
				if(!response.result){
					alert(response.ment);
					return false;
				}
				$('#totalCnt').text( greenpassadm.methods.toNumber(response.data.totCnt) );

				// _tableBody useInsert
				if(response.data.totCnt == 0){
					$('._tableBody').html('<tr>'
										+'    <td colspan="6" class="td_empty"><div class="empty_list" data-text="내용이 없습니다."></div></td>'
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
								+'	<td>'+getPartnerType(response.data.auth[inx].partner_type)+'</td>'
								+'	<td onclick="gotoDetail('+response.data.auth[inx].partner_seqno+')">'+response.data.auth[inx].depth1+'</td>'
								+'	<td>'+response.data.auth[inx].depth2 + response.data.auth[inx].depth3+'</td>'
								+'	<td>'+response.data.auth[inx].director_name+'</td>'
								+'	<td>'+response.data.auth[inx].partner_id+'</td>'
								+'	<td>'+response.data.auth[inx].create_dt+'</td>'
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
		function gotoDetail(seq){
			localStorage.setItem('list_type', 'buyer');
			
			location.href = '/admin/buyer?bno=' + seq;
		}
		</script>
@include('admin.footer')
@include('admin.header')

<div id="wrapper" style="min-height: 911px;">
	@include('admin.topContainer')

    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-style@latest/dist/chartjs-plugin-style.min.js"></script>
    <div id="main">
	
	<div class="page-title"><span class="icon_map">전역 기준</span></div>
	
	<div class="flex">

		<div class="flex-column" style="max-width:570px;">
			<div class="boxContainer">
				<ul class="view-list">
					<li>
						<label>실시간 일일 인증 횟수</label>
						<div class="val color-red">513,457</div>
					</li>
					<li>
						<label>누적 이용자수</label>
						<div class="val color-blue">1,235,678</div>
					</li>
				</ul>
				<div class="chartContainer">
					<div class="chart-label">일일 인증 현황</div>
					<div style="height:280px;margin-bottom:-10px;margin-left:-10px;"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div><canvas id="chart-line1" width="123" height="280" style="display: block; width: 123px; height: 280px;" class="chartjs-render-monitor"></canvas></div>
				</div>
			</div>
			<div class="boxContainer">
				<div class="chartContainer">
					<div class="chart-label">월별 인증 현황</div>
					<div style="height:280px;margin-bottom:-10px;margin-left:-10px;"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div><canvas id="chart-line2" width="123" height="280" style="display: block; width: 123px; height: 280px;" class="chartjs-render-monitor"></canvas></div>
				</div>
			</div>

			<div class="boxContainer">
				<div class="flex-row">
					<div class="chartContainer">
						<div class="chart-label">월별 인증 현황</div>
						<div style="height:220px;"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div><canvas id="chart-doughnut1" width="49" height="220" style="display: block; width: 49px; height: 220px;" class="chartjs-render-monitor"></canvas></div>
					</div>
					<div class="chartContainer">
						<div class="chart-label">인증 방식 현황</div>
						<div style="height:220px;"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div><canvas id="chart-doughnut2" width="49" height="220" style="display: block; width: 49px; height: 220px;" class="chartjs-render-monitor"></canvas></div>
					</div>
				</div>
			</div>
		</div>

		<div class="flex-column">

			<div class="boxContainer">
				<div class="bc-head">
					<span>인증 지도</span>
					<div class="right">
						<div class="btn-group bootstrap-select"><button type="button" class="btn dropdown-toggle btn-default" data-toggle="dropdown" role="button" title="서울시"><span class="filter-option pull-left">서울시</span><span class="bs-caret"><span class="caret"></span></span></button><div class="dropdown-menu open" role="combobox"><ul class="dropdown-menu inner" role="listbox" aria-expanded="false"><li data-original-index="0" class="selected"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="true"><span class="text">서울시</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="1"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">...</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="2"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">...</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="3"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">...</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="4"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">...</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li></ul></div><select class="" tabindex="-98">
							<option>서울시</option>
							<option>...</option>
							<option>...</option>
							<option>...</option>
							<option>...</option>
						</select></div>
						<div class="btn-group bootstrap-select"><button type="button" class="btn dropdown-toggle btn-default" data-toggle="dropdown" role="button" title="중구"><span class="filter-option pull-left">중구</span><span class="bs-caret"><span class="caret"></span></span></button><div class="dropdown-menu open" role="combobox"><ul class="dropdown-menu inner" role="listbox" aria-expanded="false"><li data-original-index="0" class="selected"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="true"><span class="text">중구</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="1"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">...</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="2"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">...</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="3"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">...</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="4"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">...</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li></ul></div><select class="" tabindex="-98">
							<option>중구</option>
							<option>...</option>
							<option>...</option>
							<option>...</option>
							<option>...</option>
						</select></div>
					</div>
				</div>

				<div class="map" style="height:460px;background:rgba(0,0,0,0.02);">					
					<div class="map-marker" style="position:absolute;top:50px;left:50px;">
						<span></span>
						<div class="mapConOveray">							
							<div class="inner">
								<span class="close" onclick="closeOverlay()" title="닫기"></span>
								<p class="suj">맥도날드 신대방점</p>
								<p>일 인증 횟수: <b class="color-blue">1,293</b></p>
							</div>
						</div>
					</div>
					<div class="map-marker" style="position:absolute;top:150px;left:250px;">
						<span></span>
						<div class="mapConOveray">							
							<div class="inner">
								<span class="close" onclick="closeOverlay()" title="닫기"></span>
								<p class="suj">맥도날드 신대방점</p>
								<p>일 인증 횟수: <b class="color-blue">1,293</b></p>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="flex-row">
				<div class="boxContainer">
					<div class="chartContainer">
						<div class="chart-label">이용자 연령</div>
						<div style="height:210px;"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div><canvas id="chart-bar1" width="13" height="210" style="display: block; width: 13px; height: 210px;" class="chartjs-render-monitor"></canvas></div>
					</div>
					<div class="chartContainer mt30">
						<div class="chart-label">이용자별 인증 횟수 분포</div>
						<div style="height:210px;"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div><canvas id="chart-bar2" width="13" height="210" style="display: block; width: 13px; height: 210px;" class="chartjs-render-monitor"></canvas></div>
					</div>
				</div>
				<div class="boxContainer">
					<div class="bc-head">실시간 인증 현황</div>
					<div class="tbl-latest">
						<table class="tcenter">
							<colgroup>
								<col width="130">
								<col width="130">
								<col>
							</colgroup>
							<tbody><tr>
								<th>휴대폰번호</th>
								<th>인증방식</th>
								<th>인증일시</th>
							
							</tr><tr>
								<td>010****0000</td>
								<td>GPS</td>
								<td><span class="date">2021-10-10 00:00</span></td>
							
							</tr><tr>
								<td>010****0000</td>
								<td>비콘</td>
								<td><span class="date">2021-10-10 00:00</span></td>
							
							</tr><tr>
								<td>010****0000</td>
								<td>NFC</td>
								<td><span class="date">2021-10-10 00:00</span></td>
							
							</tr><tr>
								<td>010****0000</td>
								<td>GPS</td>
								<td><span class="date">2021-10-10 00:00</span></td>
							
							</tr><tr>
								<td>010****0000</td>
								<td>NFC</td>
								<td><span class="date">2021-10-10 00:00</span></td>
							
							</tr><tr>
								<td>010****0000</td>
								<td>GPS</td>
								<td><span class="date">2021-10-10 00:00</span></td>
							
							</tr><tr>
								<td>010****0000</td>
								<td>비콘</td>
								<td><span class="date">2021-10-10 00:00</span></td>
							
							</tr><tr>
								<td>010****0000</td>
								<td>NFC</td>
								<td><span class="date">2021-10-10 00:00</span></td>
							
							</tr><tr>
								<td>010****0000</td>
								<td>GPS</td>
								<td><span class="date">2021-10-10 00:00</span></td>
							
							</tr><tr>
								<td>010****0000</td>
								<td>NFC</td>
								<td><span class="date">2021-10-10 00:00</span></td>
							
						</tr></tbody></table>
					</div>
				</div>
			</div>

		</div>

	</div>

</div>

<script>
$(function() {
    loadData();
});	
function toFormattedDate(date){ return date; }
function getStatusType(code){
    switch(code){
        case 'C': return '미인증';
        case 'D': return '검사 대기';
        case 'E': return '검사 진행중';
        case 'F': return '검사 완료';
        case 'G': return '검사취소';
        case 'H': return '배송처리';
        default : return '';
    }
}
function getSendType(code){
    switch(code){
        case 0: return '미확정';
        case 1: return '발송확정';
        case 2: return '발송취소';
        default : return '';
    }
}

function loadData(){
    var adminType = localStorage.getItem('admin_type');
    if(!adminType) {
        alert('다시 로그인 해주세요.');
        localStorage.clear();
        return false;
    }
    var partnerName;
    var titleName = '';
    if(adminType != 'A') {
        partnerName = localStorage.getItem('partner_name');
        titleName = partnerName + ' ';
    }
    
    $('._titTotalCnt').html(titleName + ' 총 누적 건 수<span><h3 id="totalUserCnt" class="color-blue">OOO 건</h3></span>');
    $('._titNewUserCnt').html(titleName + ' 신규 등록 건 수(최근 1개월)<span><h3 id="newUserCnt" class="color-red">OOO 건</h3></span>');

    todakadm.methods.admin.main({
        partner_name: partnerName
    }, function(request, response){
        console.log('output : ' + response);
        if(!response){
            alert('서버 통신 에러');
            return false;
        }

        $('#totalUserCnt').html(response.result.totalUserCnt + ' 건');
        $('#usersRecentCnt').text('총 목록 : ' + response.result.totalUserCnt + ' 개');

        $('#newUserCnt').html(response.result.userCnt9 + ' 건');
        $('#newUserCnt2').html(response.result.userCnt9);
        
        $('#noneAuthUserCnt').html(response.result.userCnt1 + ' 건');
        $('#testUserCnt').html(response.result.userCnt3 + ' 건');
        $('#noneInputAddressUserCnt').html(response.result.userCnt8 + ' 건');
        $('#inputAddressUserCnt').html(response.result.userCnt7 + ' 건');
        // 검사 취소자는 어디에도 소속되지 않음.
        $('#sendCompleteCnt').html(response.result.userCnt6 + ' 건');
        
        if(!response.result.usersRecent || response.result.usersRecent.length == 0){
            $('#listBody').html('<tr>'
                                +'    <td colspan="8" class="td_empty"><div class="empty_list" data-text="등록된 환자가 없습니다."></div></td>'
                                +'</tr>');
        }else {
            var bodyData = '';
            for(var inx=0; inx<response.result.usersRecent.length; inx++){
                var percentage = 0;
                if(response.result.usersRecent[inx].exam_detail && response.result.usersRecent[inx].exam_detail.length){
                    percentage = Math.round(response.result.usersRecent[inx].exam_detail[0].answer_count * 100 / response.result.usersRecent[inx].exam_detail[0].exam_detail_count);
                }
                bodyData = bodyData                     
                            +'<tr>'
                            +'    <td>'+response.result.usersRecent[inx].user_name+'</td>'
                            +'    <td>'+response.result.usersRecent[inx].partner_name+'</td>'
                            +'    <td class="date">'+(toFormattedDate(response.result.usersRecent[inx].create_dt))+'</td>'
                            +'    <td>'+response.result.usersRecent[inx].user_round+'</td>'
                            +'    <td class="date">'+(getStatusType(response.result.usersRecent[inx].exam_status))+'</td>'
                            +'    <td>'+percentage+'</td>'
                            +'    <td>'+getSendType(response.result.usersRecent[inx].send_yn)+'</td>'
//                            +'    <td><a href="#" onclick="gotoDetail('+response.result.usersRecent[inx].user_seqno+')" class="btnEdit">상세보기</a></td>'
                            +'</tr>';
            }
            $('#listBody').html(bodyData);
        }
    }, function(e){
        console.log(e);
        alert('서버 통신 에러');
    });
}

</script>

@include('admin.footer')
@include('admin.header')

<div id="wrapper" style="min-height: 911px;">
	@include('admin.topContainer')

    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-style@latest/dist/chartjs-plugin-style.min.js"></script>

    <div id="main">
	
	<div class="page-title"><span class="icon_map _locTit">전역 기준</span></div>
	
	<div class="flex _branch">
		<div class="flex-column" style="max-width:570px;">
			<div class="boxContainer">
				<ul class="view-list">
					<li>
						<label>실시간 일일 인증 횟수</label>
						<div class="val color-red _dailyAuthCnt">513,457</div>
					</li>
					<li>
						<label>일일 실 방문자수</label>
						<div class="val color-blue _dailyAccUserCnt">1,235,678</div>
					</li>
				</ul>
				<div class="chartContainer">
					<div class="chart-label">일일 인증 현황</div>
					<div style="height:280px;margin-bottom:-10px;margin-left:-10px;"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div><canvas id="chart-line4" width="123" height="280" style="display: block; width: 123px; height: 280px;" class="chartjs-render-monitor"></canvas></div>
				</div>
			</div>
			<div class="boxContainer">
				<div class="chartContainer">
					<div class="chart-label">월별 인증 현황</div>
					<div style="height:280px;margin-bottom:-10px;margin-left:-10px;"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div><canvas id="chart-line5" width="123" height="280" style="display: block; width: 123px; height: 280px;" class="chartjs-render-monitor"></canvas></div>
				</div>
			</div>
		</div>
		<div class="flex-column">
			<div class="flex-row">
				<div class="boxContainer">
					<div class="bc-head">실시간 인증 현황</div>
					<div class="tbl-latest">
						<table class="tcenter">
							<colgroup>
								<col width="130">
								<col width="130">
								<col>
							</colgroup>

							<tbody class="_tableBody">
							<tr>
								<th>휴대폰번호</th>
								<th>인증방식</th>
								<th>인증일시</th>
							
							</tr><tr>
								<td>010****0000</td>
								<td>GPS</td>
								<td><span class="date">2021-10-10 00:00</span></td>
							
						</tr></tbody></table>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="flex _partner">

		<div class="flex-column" style="max-width:570px;">
			<div class="boxContainer">
				<ul class="view-list">
					<li>
						<label>실시간 일일 인증 횟수</label>
						<div class="val color-red _dailyAuthCnt">513,457</div>
					</li>
					<li>
						<label>누적 이용자수</label>
						<div class="val color-blue _accUserCnt">1,235,678</div>
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
						<select class="default" name="depth2" id="depth2">
							<option data-subtext="광역시/도를 선택하세요." value="">광역시/도를 선택하세요.</option>
						</select>
						<select class="default" name="depth3" id="depth3">
							<option data-subtext="시/군/구를 선택하세요." value="">시/군/구를 선택하세요.</option>
						</select>
					</div>
				</div>

				<div id="map" class="map" style="height:460px;background:rgba(0,0,0,0.02);">					
				<!--
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
					-->
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

							<tbody class="_tableBody">
							<tr>
								<th>휴대폰번호</th>
								<th>인증방식</th>
								<th>인증일시</th>
							
							</tr><tr>
								<td>010****0000</td>
								<td>GPS</td>
								<td><span class="date">2021-10-10 00:00</span></td>
							
						</tr></tbody></table>
					</div>
				</div>
			</div>

		</div>

	</div>

</div>

<!-- 한국 시/도 > 시/군/구 데이터 json -->
<script type="application/javascript" src="/adm/js/hangjungdong.js"></script>
<script>
jQuery(document).ready(function(){
	//sido option 추가
	jQuery.each(hangjungdong.sido, function(idx, code){
		jQuery('#depth2').append(fn_option(code.sido, code.codeNm));
	});
	
	//sido 변경시 시군구 option 추가
	jQuery('#depth2').change(function(){
		jQuery('#depth3').show();
		jQuery('#depth3').empty();
		jQuery('#depth3').append(fn_option('','선택')); //
		jQuery.each(hangjungdong.sigugun, function(idx, code){
		if(jQuery('#depth2 > option:selected').val() == code.sido)
			jQuery('#depth3').append(fn_option(code.sigugun, code.codeNm));
		});
	
		//세종특별자치시 예외처리
		//옵션값을 읽어 비교
		if(jQuery('#depth2 option:selected').val() == '36'){
			jQuery('#depth3').hide();
			//index를 이용해서 selected 속성(attr)추가
			//기본 선택 옵션이 최상위로 index 0을 가짐
			jQuery('#depth3 option:eq(1)').attr('selected', 'selected');
			//trigger를 이용해 change 실행
			jQuery('#depth3').trigger('change');
		}
		jQuery('#depth3').change(function(){
			defaultLocationChange();
		});
	});
});
function fn_option(code, name){
	return '<option value="' + code +'">' + name +'</option>';
}
</script>

<script>
$(function() {
    loadData();
});	
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

function drawChart(res){
	$('._locTit').text(res.data.auth_tit);
	$('._dailyAuthCnt').text( greenpassadm.methods.toNumber(res.data.auth_daily));
	res.data.acc_user = !res.data.acc_user ? 0 : res.data.acc_user;
	$('._accUserCnt').text(greenpassadm.methods.toNumber(res.data.acc_user));
	
	var bodyData = '<tr>'
		+'<th>휴대폰번호</th>'
		+'	<th>인증방식</th>'
		+'	<th>인증일시</th>'
		+'	</tr>';
	if(res.data.auth_list.length == 0){
		$('._tableBody').html('<tr>'
							+'    <td colspan="3" class="td_empty"><div class="empty_list" data-text="내용이 없습니다."></div></td>'
							+'</tr>');
		return;
	}
	for(var inx=0; inx<res.data.auth_list.length; inx++){
		bodyData = bodyData 
					+'<tr>'
					+'	<td>'+res.data.auth_list[inx].user_phone +'('+res.data.auth_list[inx].sns_mail+')</td>'
					+'	<td>'+getAuthType(res.data.auth_list[inx].auth_type)+'</td>'
					+'	<td>'+res.data.auth_list[inx].create_dt+'</td>'
					+'</tr>';
	}
	$('._tableBody').html(bodyData);
	
	Chart.defaults.global.defaultFontFamily = "'NanumSquareRound', sans-serif";
	
	// 일일 인증 현황
	var dailyMap = getDailyArray(res.data.auth_hourly_list);
	var ctx = document.querySelector('#chart-line1').getContext('2d');
	var myChart = new Chart(ctx, {
		type: 'line',	
		data: {
			labels: dailyMap.targetTerms,
			datasets: [{
				label: "",
				data: dailyMap.cnt,
				pointBackgroundColor:'#fff',
				pointBorderWidth:2,			
				borderColor: '#1bc8a6',
				borderWidth: 2,
				fill:'start',
				backgroundColor: 'rgba(27,200,166,0.2)',
				lineTension:0.2
			}]
		},
		options: {
			responsive: true,
			maintainAspectRatio:false,
			legend: {
				display: false,
			},
			scales: {
				fontStyle: "bold",
				xAxes: [{
					gridLines: {
						//color: "#d4d4d4",
						borderDash: [2, 5],
						
					},
					ticks: {fontStyle: "bold"}
				}],
				yAxes: [{
					gridLines : {borderDash: [2, 5]},
					ticks: {
						min: 0,
						max: 700,
						stepSize : 100,
						fontSize : 10,
						fontStyle: 'bold'
					}				
				}]
			},
			tooltips: {
				displayColors : false,
				backgroundColor : 'rgba(0,0,0,0.9)',
				titleFontColor: '#fff',
				titleAlign: 'center',
				bodySpacing: 2,
				bodyFontColor: '#fff',
			},
			layout: {
				padding:{top:20,bottom:10,right:20,left:20}
			},
			plugins: {
				datalabels: {
					color: '#000',
					textAlign: 'left',
					align: 'top',
					font: {
						size:11,
						//weight: 'bold'			
					},
					formatter: function(value, ctx) {
						return value + '';
					}
				}
			}
		}
	});
	var ctx = document.querySelector('#chart-line4').getContext('2d');
	var myChart = new Chart(ctx, {
		type: 'line',	
		data: {
			labels: dailyMap.targetTerms,
			datasets: [{
				label: "",
				data: dailyMap.cnt,
				pointBackgroundColor:'#fff',
				pointBorderWidth:2,			
				borderColor: '#1bc8a6',
				borderWidth: 2,
				fill:'start',
				backgroundColor: 'rgba(27,200,166,0.2)',
				lineTension:0.2
			}]
		},
		options: {
			responsive: true,
			maintainAspectRatio:false,
			legend: {
				display: false,
			},
			scales: {
				fontStyle: "bold",
				xAxes: [{
					gridLines: {
						//color: "#d4d4d4",
						borderDash: [2, 5],
						
					},
					ticks: {fontStyle: "bold"}
				}],
				yAxes: [{
					gridLines : {borderDash: [2, 5]},
					ticks: {
						min: 0,
						max: 700,
						stepSize : 100,
						fontSize : 10,
						fontStyle: 'bold'
					}				
				}]
			},
			tooltips: {
				displayColors : false,
				backgroundColor : 'rgba(0,0,0,0.9)',
				titleFontColor: '#fff',
				titleAlign: 'center',
				bodySpacing: 2,
				bodyFontColor: '#fff',
			},
			layout: {
				padding:{top:20,bottom:10,right:20,left:20}
			},
			plugins: {
				datalabels: {
					color: '#000',
					textAlign: 'left',
					align: 'top',
					font: {
						size:11,
						//weight: 'bold'			
					},
					formatter: function(value, ctx) {
						return value + '';
					}
				}
			}
		}
	});
	// 월별 인증 현황
	var monthlyMap = getMonthArray(res.data.auth_monthly_list);
	var ctx2 = document.querySelector('#chart-line2').getContext('2d');
	var myChart = new Chart(ctx2, {
		type: 'line',	
		data: {
			labels: monthlyMap.targetTerms,
			datasets: [{
				label: "",
				data: monthlyMap.cnt,
				pointBackgroundColor:'#fff',
				pointBorderWidth:2,			
				borderColor: '#1bc8a6',
				borderWidth: 2,
				fill:'start',
				backgroundColor: 'rgba(27,200,166,0.2)',
				lineTension:0.2
			}]
		},
		options: {
			responsive: true,
			maintainAspectRatio:false,
			legend: {
				display: false,
			},
			scales: {
				fontStyle: "bold",
				xAxes: [{
					gridLines: {
						//color: "#d4d4d4",
						borderDash: [2, 5],
						
					},
					ticks: {fontStyle: "bold"}
				}],
				yAxes: [{
					gridLines : {borderDash: [2, 5]},
					ticks: {
						min: 0,
						max: 700,
						stepSize : 100,
						fontSize : 10,
						fontStyle: 'bold'
					}				
				}]
			},
			tooltips: {
				displayColors : false,
				backgroundColor : 'rgba(0,0,0,0.9)',
				titleFontColor: '#fff',
				titleAlign: 'center',
				bodySpacing: 2,
				bodyFontColor: '#fff',
			},
			layout: {
				padding:{top:20,bottom:10,right:20,left:20}
			},
			plugins: {
				datalabels: {
					color: '#000',
					textAlign: 'left',
					align: 'top',
					font: {
						size:11,
						//weight: 'bold'			
					},
					formatter: function(value, ctx) {
						return value + '명';
					}
				}
			}
		}
	});
	var ctx2 = document.querySelector('#chart-line5').getContext('2d');
	var myChart = new Chart(ctx2, {
		type: 'line',	
		data: {
			labels: monthlyMap.targetTerms,
			datasets: [{
				label: "",
				data: monthlyMap.cnt,
				pointBackgroundColor:'#fff',
				pointBorderWidth:2,			
				borderColor: '#1bc8a6',
				borderWidth: 2,
				fill:'start',
				backgroundColor: 'rgba(27,200,166,0.2)',
				lineTension:0.2
			}]
		},
		options: {
			responsive: true,
			maintainAspectRatio:false,
			legend: {
				display: false,
			},
			scales: {
				fontStyle: "bold",
				xAxes: [{
					gridLines: {
						//color: "#d4d4d4",
						borderDash: [2, 5],
						
					},
					ticks: {fontStyle: "bold"}
				}],
				yAxes: [{
					gridLines : {borderDash: [2, 5]},
					ticks: {
						min: 0,
						max: 700,
						stepSize : 100,
						fontSize : 10,
						fontStyle: 'bold'
					}				
				}]
			},
			tooltips: {
				displayColors : false,
				backgroundColor : 'rgba(0,0,0,0.9)',
				titleFontColor: '#fff',
				titleAlign: 'center',
				bodySpacing: 2,
				bodyFontColor: '#fff',
			},
			layout: {
				padding:{top:20,bottom:10,right:20,left:20}
			},
			plugins: {
				datalabels: {
					color: '#000',
					textAlign: 'left',
					align: 'top',
					font: {
						size:11,
						//weight: 'bold'			
					},
					formatter: function(value, ctx) {
						return value + '명';
					}
				}
			}
		}
	});


	if(adminType == 'BR') {
		$('._dailyAccUserCnt').text(greenpassadm.methods.toNumber(res.data.auth_visit));
	} else {
		// 지역별 인증 현황
		var ctx3 = document.querySelector('#chart-doughnut1').getContext('2d');
		var myChart = new Chart(ctx3, {
			type: 'pie',
			data: {
				labels: ['A지역', 'B지역', 'C지역', 'D지역', 'E지역'],
				datasets: [{
					data: [10, 30, 15, 25, 20],
					backgroundColor: ['#0bb496', '#14c8a9', '#16d6b5', '#19dee0', '#13c0d0'],
					borderWidth: 0
				}]
			},
			options: { 
				maintainAspectRatio:false,
				legend: {
					display: false,
					position: 'bottom',
					labels: {
						boxWidth: 10,
						boxHeight: 2,
						fontColor: '#797C8F',
						fontSize : 14,
						fontStyle : 'bold',
						padding: 20
					}
				},
				tooltips: {
					displayColors : false,
					backgroundColor : 'rgba(0,0,0,0.9)',
					titleFontColor: '#fff',
					titleAlign: 'center',
					bodySpacing: 2,
					bodyFontColor: '#fff',
				},
				plugins: {
					datalabels: {
						color: '#fff',
						textAlign: 'center',
						font: {
							lineHeight: 1.1,
							size:12,
							weight: 'bold',
							
						},
						formatter: function(value, ctx) {
							return ctx.chart.data.labels[ctx.dataIndex] + '\n' + value + '%';
							//return value + '%';
						}
					}
				}
			}
		});

		// 인증 방식별 차트 
		var ctx4Label = res.data.auth_type.map(a => getAuthType(a.auth_type));
		var ctx4Data = res.data.auth_type.map(a => a.cnt);
		var ctx4Color = ['#2744db', '#376ce4', '#3b89ea', '#4995f4', '#49a5f4'];
		ctx4Color.length = ctx4Label.length;
		var ctx4Sum = 0;
		ctx4Data.forEach(a => ctx4Sum += a);

		var ctx4 = document.querySelector('#chart-doughnut2').getContext('2d');
		var myChart = new Chart(ctx4, {
			type: 'pie',
			data: {
				labels: ctx4Label,
				datasets: [{
					data: ctx4Data,
					backgroundColor: ctx4Color,
					borderWidth: 0
				}]
			},
			options: { 
				maintainAspectRatio:false,
				legend: {
					display: false,
					position: 'bottom',
					labels: {
						boxWidth: 10,
						boxHeight: 2,
						fontColor: '#797C8F',
						fontSize : 14,
						fontStyle : 'bold',
						padding: 20
					}
				},
			tooltips: {
					displayColors : false,
					backgroundColor : 'rgba(0,0,0,0.9)',
					titleFontColor: '#fff',
					titleAlign: 'center',
					bodySpacing: 2,
					bodyFontColor: '#fff',
				},
				plugins: {
					datalabels: {
						color: '#fff',
						textAlign: 'center',
						font: {
							lineHeight: 1.1,
							size:12,
							weight: 'bold',
							
						},
						formatter: function(value, ctx) {
							var percent = (value / ctx4Sum).toFixed(4);
							return ctx.chart.data.labels[ctx.dataIndex] + '\n' + ((percent * 100).toFixed(2)) + '%';
							//return value + '%';
						}
					}
				}
			}
		});
		// 이용자 연령 - 구할 수 없음. => SNS 로그인시 필수 수집이 아니므로
		var ctx5 = document.querySelector('#chart-bar1').getContext('2d');
		var myChart = new Chart(ctx5, {
			type: 'bar',
			data: {
				labels: ['10대', '20대', '30대', '40대', '50대~'],
				datasets: [{
					data: [200, 230, 215, 225, 220],
					backgroundColor: ['#0bb496', '#14c8a9', '#16d6b5', '#19dee0', '#13c0d0'],
					borderWidth: 0
				}]
			},
			options: {
				responsive: true,
				maintainAspectRatio:false,
				legend: {
					display: false,
				},
				scales: {
					xAxes: [{
						gridLines: {
							borderDash: [2, 5],
							
						},
						ticks: {fontStyle: "bold"}
					}],
					yAxes: [{
						gridLines : {borderDash: [2, 5]},
						ticks: {
							min: 0,
							max: 500,
							stepSize : 100,
							fontSize : 10,
							fontStyle: 'bold'
						}				
					}]
				},
				tooltips: {
					displayColors : false,
					backgroundColor : 'rgba(0,0,0,0.9)',
					titleFontColor: '#fff',
					titleAlign: 'center',
					bodySpacing: 2,
					bodyFontColor: '#fff',
				},
				layout: {
					padding:{top:20,bottom:10,right:20,left:20}
				},
				plugins: {
					datalabels: {
						color: '#fff',
						textAlign: 'left',
						align: 'top',
						font: {
							size:11,
							weight: 'bold'			
						},
						formatter: function(value, ctx) {
							return value + '명';
						}
					}
				}
			}
		});

		// 이용자별 인증 횟수 분포
		var ctx6Label = [
			'0~9'
			, '10~19'
			, '20~29'
			, '30~39'
			, '40~49'
			, '50~'
		];
		var ctx6Data = [
			res.data.auth_period_10
			, res.data.auth_period_20
			, res.data.auth_period_30
			, res.data.auth_period_40
			, res.data.auth_period_50
			, res.data.auth_period_n
		];
		res.data.auth_period_10;
		var ctx6 = document.querySelector('#chart-bar2').getContext('2d');
		var myChart = new Chart(ctx6, {
			type: 'bar',
			data: {
				labels: ctx6Label,
				datasets: [{
					data: ctx6Data,
					backgroundColor: ['#2744db', '#376ce4', '#3b89ea', '#4995f4', '#49a5f4', '#49b9f4'],
					borderWidth: 0
				}]
			},
			options: {
				responsive: true,
				maintainAspectRatio:false,
				legend: {
					display: false,
				},
				scales: {
					xAxes: [{
						gridLines: {
							borderDash: [2, 5],
							
						},
						ticks: {fontStyle: "bold"}
					}],
					yAxes: [{
						gridLines : {borderDash: [2, 5]},
						ticks: {
							min: 0,
							max: 500,
							stepSize : 100,
							fontSize : 10,
							fontStyle: 'bold'
						}				
					}]
				},
				tooltips: {
					displayColors : false,
					backgroundColor : 'rgba(0,0,0,0.9)',
					titleFontColor: '#fff',
					titleAlign: 'center',
					bodySpacing: 2,
					bodyFontColor: '#fff',
				},
				layout: {
					padding:{top:20,bottom:10,right:20,left:20}
				},
				plugins: {
					datalabels: {
						color: '#fff',
						textAlign: 'left',
						align: 'top',
						font: {
							size:11,
							weight: 'bold'			
						},
						formatter: function(value, ctx) {
							return value + '명';
						}
					}
				}
			}
		});
	}
}

function getDailyArray(arr){
	var dateV = new Date();
	var thisDate = dateV.getFullYear() + (dateV.getMonth() < 9 ? '0' : '') + (dateV.getMonth() + 1) + (dateV.getDate() < 10 ? '0' : '') + dateV.getDate() + (dateV.getHours() < 10 ? '0' : '') + dateV.getHours();
	dateV.setHours(dateV.getHours()-12);
	var startDate = dateV.getFullYear() + (dateV.getMonth() < 9 ? '0' : '') + (dateV.getMonth() + 1) + (dateV.getDate() < 10 ? '0' : '') + dateV.getDate() + (dateV.getHours() < 10 ? '0' : '') + dateV.getHours();
	var newArr = { targetTerms: [], cnt: [] };

	var target = arr.map(a => a.targetTerms);
	var cnts = arr.map(a => a.cnt);

	while(startDate<=thisDate) {
		var point = target.findIndex(a => a == startDate);
		if(point < 0) {
			newArr.targetTerms.push(startDate.substring(0,4) + '-' + startDate.substring(4,6) + '-' + startDate.substring(6,8) + ' ' + startDate.substring(8,10));
			newArr.cnt.push(0);
		} else {
			newArr.targetTerms.push(target[point].substring(0,4) + '-' + target[point].substring(4,6) + '-' + target[point].substring(6,8) + ' ' + target[point].substring(8,10));
			newArr.cnt.push(cnts[point]);
		}
		dateV.setHours(dateV.getHours() + 1);
		startDate = dateV.getFullYear() + (dateV.getMonth() < 9 ? '0' : '') + (dateV.getMonth() + 1) + (dateV.getDate() < 10 ? '0' : '') + dateV.getDate() + (dateV.getHours() < 10 ? '0' : '') + dateV.getHours();
	}
	return newArr;
}

function getMonthArray(arr){
	var dateV = new Date();
	var thisMonth = dateV.getFullYear() + (dateV.getMonth() < 9 ? '0' : '') + (dateV.getMonth() + 1);
	dateV.setMonth(dateV.getMonth()-11);
	var startMonth = dateV.getFullYear() + (dateV.getMonth() < 9 ? '0' : '') + (dateV.getMonth() + 1);
	var newArr = { targetTerms: [], cnt: [] };

	var target = arr.map(a => a.targetTerms);
	var cnts = arr.map(a => a.cnt);

	while(startMonth<=thisMonth) {
		var point = target.findIndex(a => a == startMonth);
		if(point < 0) {
			newArr.targetTerms.push(startMonth.substring(0,4) + '-' + startMonth.substring(4,6));
			newArr.cnt.push(0);
		} else {
			newArr.targetTerms.push(target[point].substring(0,4) + '-' + target[point].substring(4,6));
			newArr.cnt.push(cnts[point]);
		}
		dateV.setMonth(dateV.getMonth() + 1);
		startMonth = dateV.getFullYear() + (dateV.getMonth() < 9 ? '0' : '') + (dateV.getMonth() + 1);
	}
	return newArr;
}

function loadPartner(){
	greenpassadm.methods.search.mainBuyer({
		bno: localStorage.getItem('user_no')
	}, function(request, response){
		console.log('output : ' + response);
		if(!response.result){
			alert(response.ment);
			return false;
		}

		drawChart(response);
	}, function(e){
		console.log(e);
		alert('서버 통신 에러');
	});
}
function loadBranch(){
	greenpassadm.methods.search.mainBranch({
		bno: localStorage.getItem('user_no')
	}, function(request, response){
		console.log('output : ' + response);
		if(!response.result){
			alert(response.ment);
			return false;
		}

		drawChart(response);
	}, function(e){
		console.log(e);
		alert('서버 통신 에러');
	});
}

if(adminType == 'BR') {
	$('._partner').hide();
} else {
	$('._branch').hide();
}

function loadData(){
	if(adminType == 'BR') {
		loadBranch();
	} else {
		loadPartner();
	}
}

function defaultLocationChange(){
	var depth2 = $('#depth2>option:selected').text();
	var depth3 = $('#depth3>option:selected').text();
	var address = depth2 + ' ' + depth3;
	if(!depth2 || !depth3 || depth2 == '' || depth3 == '') {
		return false;
	}
	const req = {
		query: address,
		fields: ["name", "geometry"],
	};
	var service = new google.maps.places.PlacesService(map);
	service.findPlaceFromQuery(req, (results, status) => {
		if (status === google.maps.places.PlacesServiceStatus.OK && results) {
			map.setCenter(results[0].geometry.location);
		}
	});
}

var map;
var markers = [];
var infoWindows = [];
function closeOverlay(seq) {
	if(infoWindows.length <= seq) {
		alert('없는 마커입니다.');
		return false;
	}
	infoWindows[seq].close();
}
function initMap(locations) {
    map = new google.maps.Map(document.getElementById("map"), {
        center: { lat: 37.413294, lng: 127.269311 },
        zoom: 10,
	});
	markers = [];
	infoWindows = [];
	
	for(var inx = 0; inx < locations.length; inx = inx + 1){
		var markerData = {
			position: { 
				lat: Number(locations[inx].location_x),
				lng: Number(locations[inx].location_y)
			},
			title: locations[inx].location_name,
			map: map
		};
		if(locations[inx].location_img && locations[inx].location_img !== '') {
			markerData.icon = new google.maps.MarkerImage(locations[inx].location_img, null, null, null, new google.maps.Size(22,22));
		}
		var marker = new google.maps.Marker(markerData);

		var innerContent = '';
		if(locations[inx].recentUserAuths.length > 0) {
			for(var jnx = 0; jnx < locations[inx].recentUserAuths.length; jnx = jnx + 1){
				innerContent = innerContent +
					'<tr>'
					+'    <td>'+locations[inx].recentUserAuths[jnx].user_phone+'</td>'
					+'    <td>'+getAuthType(locations[inx].recentUserAuths[jnx].auth_type)+'</td>'
					+'    <td><span class="date">'+locations[inx].recentUserAuths[jnx].create_dt+'</span></td>'
					+'</tr>';
			}
		} else {
			innerContent = '<tr><td colspan="3" class="td_empty"><div class="empty_list" data-text="내용이 없습니다."></div></td></tr>';
		}
		var contentString = 
					'<div class="map-marker">'
					+'	<div>'
					+'		<div class="inner">'
					+'			<span class="close" onclick="closeOverlay('+inx+')" title="닫기"></span>'
					+'			<p class="suj">'+locations[inx].location_name+'</p>'
					+'			<p>일 인증 횟수: <b class="color-blue">'+ greenpassadm.methods.toNumber(locations[inx].toDayUserAuthCnt) +'</b></p>'
					+'			<p>최신 인증 현황</b>'
					+'				<div class="tbl-latest">'
					+'					<table class="tcenter">'
					+'						<colgroup>'
					+'							<col width="130">'
					+'							<col width="130">'
					+'							<col>'
					+'						</colgroup>'
					+'						<tbody>'
					+'						<tr>'
					+'							<th>휴대폰번호</th>'
					+'							<th>인증방식</th>'
					+'							<th>인증일시</th>'
					+'						</tr>'
					+ innerContent
					+'                  </tbody></table>'
					+'				</div></p>'
					+'		</div>'
					+'	</div>'
					+'</div>';
		var infowindow = new google.maps.InfoWindow({
			content: contentString,
		});
		markers.push(marker);
		infoWindows.push(infowindow);

		(function (inx){
			marker.addListener('click', function() {
				infoWindows[inx].open({
					anchor: markers[inx],
					map,
					shouldFocus: false,
				});
			});
		})(inx);
	}
	for(var inx = 0; inx < locations.length; inx = inx + 1){
		infoWindows[inx].close();
	}
}
function loadBranchLocation(){
	greenpassadm.methods.branch.location({
		skey: 'BS'
	}, function(request, response){
		console.log('output : ' + response);
		if(!response.result){
			alert(response.ment);
			return false;
		}
		initMap(response.data);		
	}, function(e){
		console.log(e);
		alert('서버 통신 에러');
	});
}
</script>

<script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCsW3tSJ0cKC3IgqWjPuW2f4mlI6b1M1S0&callback=loadBranchLocation&libraries=places&v=weekly"
      async
    ></script>
@include('admin.footer')
@include('admin.header')

<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-style@latest/dist/chartjs-plugin-style.min.js"></script>

<div id="wrapper" style="min-height: 911px;">
	@include('admin.topContainer')

	<section id="wrtie" class="container">
		<div class="page-title">그린패스 인증 통계</div>
		<div class="wrtieContents">
			<div class="wr-wrap line label200">
			
				<div class="wr-list">
					<div class="wr-list-con">
						<select class="default selectColor-gray" name="type" id="type" onchange="chgType(this.value)">
							<option data-subtext="가입자수" value="U">가입자수</option>
							<option data-subtext="가맹점수" value="B">가맹점수</option>
							<option data-subtext="인증횟수" value="R">인증횟수</option>
						</select>
					</div>
					<div class="wr-list-con">
						<div class="rightSet" style="text-align: right;">
							<a href="#" onclick="excelDown();" class="btn green small icon-excel">엑셀 다운로드</a>
						</div>
					</div>
				</div>
				<div class="wr-list _gov">
					<div class="wr-list-con">
						<select class="default" name="depth1" id="depth1">
							<option data-subtext="국가를 선택하세요." value="">국가를 선택하세요.</option>
							<option data-subtext="대한민국" value="대한민국">대한민국</option>
							<option data-subtext="라오스" value="라오스">라오스</option>
							<option data-subtext="베트남" value="베트남">베트남</option>
						</select>
					</div>
				</div>
				<div class="wr-list _loc">
					<div class="wr-list-con">
						<select class="default" name="depth2" id="depth2">
							<option data-subtext="광역시/도를 선택하세요." value="">광역시/도를 선택하세요.</option>
						</select>
						
						<select class="default" name="depth3" id="depth3">
							<option data-subtext="시/군/구를 선택하세요." value="">시/군/구를 선택하세요.</option>
						</select>
					</div>
				</div>
				<div class="wr-list">
					<div class="wr-list-con">
						<label class="radio-wrap _noneBranch"><input type="radio" name="each" value="D" onclick="toggleTime()">일</label>
						<label class="radio-wrap"><input type="radio" name="each" value="M" onclick="toggleTime()">월</label>
						<label class="radio-wrap"><input type="radio" name="each" value="Y" onclick="toggleTime()">년</label>
						<label class="radio-wrap"><input type="radio" name="each" value="A" checked="true" onclick="toggleTime()">누적</label>
					</div>
				</div>
				<div class="wr-list _noneAccu">
					<div class="wr-list-con">
						<label class="labelDate">
						@php
							$prevDate = date('Y-m-d', strtotime('-6 month'));
							echo '<input type="text" name="startDay" value="'.$prevDate.'" class="span130 datepicker">';
						@endphp
						</label>
						<label class="labelDate"><input type="text" name="endDay" value="" class="span130 datepicker"></label>
					</div>
				</div>
			</div>
		</div>

		<div class="tbl-basic cell td-h4 mt10">
			<div class="tbl-header">
				<!-- 그래프가 들어갑니다. -->
				<canvas id="chart-line2" style="display: block;" class="chartjs-render-monitor"></canvas>
			</div>
		</div>
		<form name="popForm">
			<input type="hidden" name="startDay_">
			<input type="hidden" name="endDay_">
			<input type="hidden" name="type_">
			<input type="hidden" name="depth1_">
			<input type="hidden" name="depth2_">
			<input type="hidden" name="depth3_">
			<input type="hidden" name="each_">
		</form>
	</section>

	<script>
		$('._gov').hide();
		$('._loc').hide();

		function excelDown(){
			$('input[name=startDay_]').val($('input[name=startDay]').val());
			$('input[name=endDay_]').val($('input[name=endDay]').val());
			$('input[name=type_]').val($('select[name=type]').val());
			$('input[name=depth1_]').val($('select[name=depth1]').val());
			$('input[name=depth2_]').val($('select[name=depth2]').val());
			$('input[name=depth3_]').val($('select[name=depth3]').val());
			$('input[name=each_]').val( $('input[name=each]:checked').val() );

			var myForm = document.popForm;
			var url = "/admin/auths/excel/graph";
			window.open("" ,"popForm", 
				"toolbar=no, width=540, height=467, directories=no, status=no,    scrollorbars=no, resizable=no"); 
			myForm.action = url; 
			myForm.method = "get";
			myForm.target = "_blank";
			myForm.submit();
		}

		var firstInPage = true;
		$(document).ready(function(){
			if(adminType == 'BR') {
				alert('권한이 부족합니다.');
				location.href = '/admin/';
			}

			getBuyerInfo();
		});
		
		function getBuyerInfo(){
			greenpassadm.methods.buyer.one({ buyerNo: localStorage.getItem('user_no') }, function(request, response){
				console.log('output : ' + response);
				if(!response.result){
					alert(response.ment);
					return false;
				}

				if(adminType == 'AM') {
					$('._gov').show();
				} else {
					// 자신의 권한에 맞는 국가 자동 세팅
					$('#depth1').val(response.data.department.depth1);
				}
				if(adminType == 'BG') {
					$('._loc').show();
				} else {
					// 자신의 권한에 맞는 지역 자동 세팅
					$('#depth1').val(response.data.department.depth1);
					$('#depth2').val(response.data.department.depth2);
					$('#depth3').val(response.data.department.depth3);
				}

				getList();
			});
		}
		function toggleTime(){
			var eachV = $('input[name=each]').val();
			if(eachV == 'A') {
				$('input[name=startDay]').val('');
				$('input[name=endDay]').val('');

				$('._noneAccu').hide();
			} else {
				$('._noneAccu').show();
			}
			getList();
		}
		function chkValidation(){
			return true;
		}
		function chgType(val) {
			if(val == 'B') {
				$('._noneBranch').hide();
			} else {
				$('._noneBranch').show();
			}
			getList();
		}
		function getList(){
			if(!chkValidation()){
				return false;
			}
			var type = $('select[name=type]').val();
			var depth1 = $('select[name=depth1]').val();
			var depth2 = $('select[name=depth2]').val();
			var depth3 = $('select[name=depth3]').val();
			var startDay = $('input[name=startDay]').val();
			var endDay = $('input[name=endDay]').val();
			var each = $('input[name=each]:checked').val();

			greenpassadm.methods.search.auth({
				type: type
				, depth1: depth1
				, depth2: depth2
				, depth3: depth3
				, startDay: startDay
				, endDay: endDay
				, each: each
				, id: localStorage.getItem('user_no')
			}, function(request, response){
				console.log('output : ' + response);
				if(!response.result){
					alert(response.ment);
					return false;
				}
				if(JSON.parse(request).each == 'A') {
					// 누적 계산
					var prevCnt = 0;
					for(var idx = 0; idx < response.data.length; idx++){
						response.data[idx].cnt += prevCnt;
						prevCnt = response.data[idx].cnt;
					}
				}
				createChart(
					response.data.map(dt => dt.targetTerms)
					, response.data.map(dt => dt.cnt)
				);

			}, function(e){
				console.log(e);
				alert('서버 통신 에러');
			});
		}
		function getStatus(code){
			switch(code){
				case "A":
					return "승인";
				case "I":
					return "등록대기";
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
			var branchName = $('input[name=branchName]').val();

			localStorage.setItem('list_type', 'branch_');
			localStorage.setItem('branchName', branchName);
			
			location.href = '/admin/branch?bno=' + seq;
		}

		function createChart(label, data){
			Chart.defaults.global.defaultFontFamily = "'NanumSquareRound', sans-serif";

			var max = data.length > 0 ? Math.max.apply(0, data) : 700;
			max = (Math.round(max / 100) + 1) * 100;
			var stepSize = (data.length > 0 ? max / data.length : 5);

			var ctx2 = document.querySelector('#chart-line2').getContext('2d');
			var myChart = new Chart(ctx2, {
				type: 'line',	
				data: {
					labels: label,
					datasets: [{
						label: "",
						data: data,
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
								max: max,
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
		}
		</script>
@include('admin.footer')
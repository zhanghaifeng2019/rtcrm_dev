<!DOCTYPE html>
<html xml:lang="ja" lang="ja">

<body id="pagetop">
	<header>
		<div class="header-main">
			<h1><a href="<?php echo base_url(); ?>Main"><div><em><img src="<?php  echo base_url(); ?>common/img/header_logo.svg" width="100" height="11"></em><span>customer database</span></div></a></h1>
			<ul>
				<li><a href="<?php echo base_url(); ?>Main">メイン</a></li>
				<li class="current"><a href="<?php echo base_url(); ?>TM">テレマ</a></li>
				<li><a href="<?php echo base_url(); ?>TMRegi">テレマ登録</a></li>
				<li><a href="<?php echo base_url(); ?>Agency">代理店</a></li>
			</ul>
			<div class="header-user">
				<div class="header-user-name"><p><?=$this->session->name?></p></div>
				<div class="header-user-menu">
				<a href="<?php echo base_url(); ?>Auth/logout">Log out</a>
					<!-- <a href="./">その他のユーザーメニュー</a> -->
					<div class="header-user-menu-close">CLOSE</div>
				</div>
			</div>
			<div class="header-sp-menu-trigger"><div class="header-sp-trigger"><span></span></div></div>
		</div>
		<div class="title-bar">
			<h2>テレマランキング</h2>

			<div class="title-sp-menu-trigger"><div class="title-sp-trigger"><span></span></div></div>
		</div>
	</header>


	<div id="wrapper" class="tm tm-detail">
		<main>
　		 <form action="<?=base_url()?>TMReport" method="post">

			<div class="search-condition-wrap formset">
				<h2>検索条件</h2>
				<div class="search-condition">
					<dl class="search-condition-list search-condition-list--3column">
						<dt>優先順位</dt>
						<dd>
							<select id="priority" name="priority">
								<option value="non">すべて</option>
								<option value="1">リストアップ↑</option>
								<option value="2">リストアップ↓</option>
								<option value="3">コール↑</option>
								<option value="4">コール↓</option>
								<option value="5">アポ↑</option>
								<option value="6">アポ↓</option>
								<option value="7">受注↑</option>
								<option value="8">受注↓</option>
								<option value="9">テレマポイント↑</option>
								<option value="10">テレマポイント↓</option>

								</select>
						</dd>
					</dl>

					<dl class="search-condition-list search-condition-list--3column">
					<dt>チーム</dt>
					<dd>
						<select id="teamCount" name="teamCount">
							<option value="non"> すべて </option>
						<?php
						foreach($group as $item ){
							if( isset($_POST['teamCount'])) {
								 if($_POST['teamCount']==$item->id) {
										echo "<option value=".$item->id."  selected> ".$item->name."</option>";
								 }
								 else{
										echo "<option value=".$item->id." > ".$item->name."</option>";
								 }
							 }
							else{
									echo "<option value=".$item->id." > ".$item->name."</option>";
							}

						}
						 ?>
						</select>
					</dd>
				</dl>

				<dl class="search-condition-list search-condition-list--3column">
					<dt>新卒のみ</dt>
					<dd>
						<select id="rookie" name="rookie">

							<option value="0"> OFF </option>
							<option value="1"> ON </option>
						</select>
					</dd>
				</dl>





	<!--
					<dl class="search-condition-list search-condition-list--3column">
						<dt>ステータスコメント</dt>
						<dd>
							<select id="status_comment" name="status_comment">

								<option value="non"> すべて </option>

							</select>
						</dd>
					</dl>

					<dl class="search-condition-list search-condition-list--3column">
					<dt>チームリスト</dt>
					<dd>
						<select id="teamCount" name="teamCount">
							<option value="non"> すべて </option>

						</select>
					</dd>
				</dl> -->
				<dl class="search-condition-list search-condition-list--3column">
							<dt>期間単位</dt>
							<dd>
								<select id="selecter" name="selecter">
									　<option value="0">すべて</option>
										<option value="1">1週</option>
										<option value="2">1カ月</option>
										<option value="3">3カ月</option>
										<option value="4">6カ月</option>
										<option value="5">1年</option>
										<option value="6">今日</option>
										<option value="7">今週</option>
										<option value="8">今月</option>
										<option value="9">昨日</option>
										<option value="10">先週</option>
										<option value="11">先月</option>
								</select>
							</dd>
						</dl>

				<dl class="search-condition-list search-condition-list--3column">
							<dt>開始日</dt>
							<dd>
								<input type="date" id="start" value="<?php if ( isset( $_POST['start'] )) {echo $_POST['start']; }?>" name="start">
							</dd>
						</dl>
					<dl class="search-condition-list search-condition-list--3column">
							<dt>終了日</dt>
							<dd>
									<input type="date" id="end" value="<?php if ( isset($_POST['start']) ) { echo $_POST['end']; }?>" name="end">
							</dd>
						</dl>

				</div>
					</div>
					<div class="submit-set submit-set--center">
						<button type="submit" class="button-color--red">絞り込み</button>
					</form>

					</div>


			<form method="post" action="<?=base_url()?>TMReport/export">
			<div class="submit-set submit-set--left">
				<button type="submit" class="button-color--blue">ダウンロード</button>
			</div>
				<div class="register-block-wrap formset" id="main">
					<div class="register-block">
						<table class="table table-bordered">
							<tr>
								<th >お名前</th>
								<th >リスト<br>アップ</th>
								<th >コール</th>
								<th >アポ</th>
								<th >受注</th>
								<th >電クロ</th>
								<th >テレマ<br>ポイント</th>
								<th >受注率</th>
							</tr>
<!-- <a href="#modal-01" data-modal class="button-color--black" onclick=personal(<?=$key["id"]?>)></a> -->
							<?php foreach ($All as $key ): ?>
							<tr>
								<td	><?=$key["name"]?></td>
								<td	><a href="<?=base_url()?>TMReport/detail/<?php echo $key["id"];?>/11"style="color:black;text-decoration: none"><?=$key["listup"]?></a></td>
								<td	><a href="<?=base_url()?>TMReport/detail/<?php echo $key["id"];?>/0"style="color:black;text-decoration: none"><?=$key["call"]?></a></td>
								<td ><a href="<?=base_url()?>TMReport/detail/<?php echo $key["id"];?>/2"style="color:black;text-decoration: none"><?=$key["apo"]?></a></td>
								<td ><a href="<?=base_url()?>TMReport/detail/<?php echo $key["id"];?>/3"style="color:black;text-decoration: none"><?=$key["comp"]?></a></td>
								<td ><a href="<?=base_url()?>TMReport/detail/<?php echo $key["id"];?>/12"style="color:black;text-decoration: none"><?=$key["call_comp"]?></a></td>
								<td ><?=$key["telem_point"]?></td>
								<td >
									<?php
										if($key["apo"]==0){
											echo "0%";
										}else{
											echo strval(round($key["comp"]/$key["apo"],3)*100)."%";
										}
									?>
								</td>
							</tr>
							<?php endforeach ?>
						</table>
					</div>

					<div class="register-block">
						<div class="col-md-6"><canvas id="all">

						</canvas>
						</div>
					</div>

				</div><!--[/register-block-wrap]-->

			</form>



		</main>
		<footer>
	<address><a href="http://rentracks.co.jp/">&copy; Rentracks Co., Ltd. All rights reserved.</a></address>
		</footer>
	</div>





</div>

<div id="modal-01" class="modal register-message-wrap">
	<h2>個人詳細</h2>
		<div class="register-message formset">

			<div class="register-block-wrap formset">

             <table class="table table-bordered" id="personalTable">
             </table>
           </div>


				 	<div class="register-block-wrap formset" id="modalCanvas">

        <canvas id="personal"></canvas>
      </div>



			</div>
				 </div>






<!--[jQuery]-->
<script src="<?php    echo base_url(); ?>common/lib/jquery-3.3.1.min.js"></script>
<script src="<?php    echo base_url(); ?>common/lib/select2.min.js"></script>
<link href="<?php    echo base_url(); ?>common/lib/select2.min.css" rel="stylesheet" media="all">
<script src="<?php    echo base_url(); ?>common/lib/jquery.modal.min.js"></script>
<link href="<?php    echo base_url(); ?>common/lib/jquery.modal.css" rel="stylesheet" media="all">
<script src="<?php    echo base_url(); ?>common/lib/site.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/randomcolor/0.5.4/randomColor.js"></script>





<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script>
function pad(n, width) {
  n = n + '';
  return n.length >= width ? n : new Array(width - n.length + 1).join('0') + n;
}

function dateAddDel(sDate, nNum, type) {
    var yy = parseInt(sDate.substr(0, 4), 10);
    var mm = parseInt(sDate.substr(5, 2), 10);
    var dd = parseInt(sDate.substr(8), 10);

    if (type == "d") {
        d = new Date(yy, mm - 1, dd + nNum);
    }
    else if (type == "m") {
        d = new Date(yy, mm - 1, dd + (nNum * 31));
    }
    else if (type == "y") {
        d = new Date(yy + nNum, mm - 1, dd);
    }

    yy = d.getFullYear();
    mm = d.getMonth() + 1; mm = (mm < 10) ? '0' + mm : mm;
    dd = d.getDate(); dd = (dd < 10) ? '0' + dd : dd;

    return '' + yy + '-' +  mm  + '-' + dd;
}



$('#selecter').change(function(){
	var selectNum=$(this).val();
					var d = new Date();
					var today=d.getFullYear()+"-"+pad((d.getMonth()+1),2)+"-"+d.getDate();

	if(selectNum==0){


						$("#start").val("");
							$("#end").val("");

					}
   if(selectNum==1){


		 $("#start").val(dateAddDel(today, -7, 'd'));
 $("#end").val(today);
	 }
	 else if(selectNum==2){
	 $("#start").val(dateAddDel(today, -1, 'm'));
	  $("#end").val(today);
	 }
	 else if(selectNum==3){
	$("#start").val(dateAddDel(today, -3, 'm'));
	 $("#end").val(today);
	 }
	 else if(selectNum==4){
$("#start").val(dateAddDel(today, -6, 'm'));
 $("#end").val(today);
	 }
	 else if(selectNum==5){
$("#start").val(dateAddDel(today, -1, 'y'));
 $("#end").val(today);
	 }

		else if(selectNum==6){
	$("#start").val(dateAddDel(today, 0, 'd'));
	$("#end").val(dateAddDel(today, 0, 'd'));
		}
		else if(selectNum==7){
			var d = new Date();
			var startWeek= d.getDay();
			var count=1;
			var start;
			var end;
		switch (startWeek) {
			case 1:
				start=0;
				end=6;
				break;
			case 2:
				start=-1;
				end=5;
				break;
			case 3:
				start=-2;
				end=4;
				break;
			case 4:
				start=-3;
				end=3;
				break;
			case 5:
				start=-4;
				end=2;
				break;
			case 6:
					start=-5;
					end=1;
					break;

		}





	 $("#start").val(dateAddDel(today, start, 'd'));
	 $("#end").val(dateAddDel(today, end, 'd'));
		}

		else if(selectNum==8){
			var lastDay = ( new Date( d.getFullYear(), d.getMonth()+1, 0) ).getDate();


			var d = new Date();
			var start=d.getFullYear()+"-"+pad((d.getMonth()+1),2)+"-01";
			var end=d.getFullYear()+"-"+pad((d.getMonth()+1),2)+"-"+lastDay;

			//
			$("#start").val(start);
		  $("#end").val(end);
		}

		else if(selectNum==9){


 $("#start").val(dateAddDel(today, -1, 'd'));
  $("#end").val(dateAddDel(today, -1, 'd'));
		}
		else if(selectNum==10){
			var d = new Date();
			var startWeek= d.getDay();
			var count=1;
			var start;
			var end;
			switch (startWeek) {
			case 1:
				start=0;
				end=6;
				break;
			case 2:
				start=-1;
				end=5;
				break;
			case 3:
				start=-2;
				end=4;
				break;
			case 4:
				start=-3;
				end=3;
				break;
			case 5:
				start=-4;
				end=2;
				break;
			case 6:
					start=-5;
					end=1;
					break;

			}

			$("#start").val(dateAddDel(today, start-7, 'd'));
			$("#end").val(dateAddDel(today, end-7, 'd'));
		}
		else if(selectNum==11){

			var data=dateAddDel(today, -1, 'm');
			//

			var lastDay = ( new Date( data[0]+data[1]+data[2]+data[3], pad((d.getMonth()),2), 0) ).getDate();


			var d = new Date();

			var end=d.getFullYear()+"-"+pad((d.getMonth()),2)+"-"+lastDay;

			$("#start").val(data[0]+data[1]+data[2]+data[3]+"-"+pad((d.getMonth()),2)+"-01");
			$("#end").val(end);
		}

});

$( document ).ready(function() {
  returnAll();
	<?php
	  if(isset($_POST['priority'])){
			?>
				$("#priority").val("<?=$_POST['priority']?>").attr("selected", "selected");
	<?php

		}
		?>


		<?php
			if(isset($_POST['rookie'])){
				?>
					$("#rookie").val("<?=$_POST['rookie']?>").attr("selected", "selected");
		<?php

			}
			?>

			<?php
				if(isset($_POST['selecter'])){
					?>
						$("#selecter").val("<?=$_POST['selecter']?>").attr("selected", "selected");
			<?php

				}
				?>



});

var CSS_COLOR_NAMES = ["Aqua","Aquamarine","Bisque","Black","BlanchedAlmond","Blue","BlueViolet","Brown","BurlyWood","CadetBlue","Chartreuse","Chocolate","Coral","CornflowerBlue",
"Cornsilk","Crimson","Cyan","DarkBlue","DarkCyan","DarkGoldenRod","DarkGray","DarkGrey","DarkGreen","DarkKhaki","DarkMagenta","DarkOliveGreen","Darkorange","DarkOrchid","DarkRed","DarkSalmon","DarkSeaGreen","DarkSlateBlue","DarkSlateGray","DarkSlateGrey","DarkTurquoise","DarkViolet","DeepPink","DeepSkyBlue"
,"DimGray","DimGrey","DodgerBlue","FireBrick","FloralWhite","ForestGreen","Fuchsia","Gainsboro","GhostWhite","Gold","GoldenRod","Gray","Grey","Green","GreenYellow","HoneyDew","HotPink","IndianRed","Indigo","Ivory","Khaki","Lavender","LavenderBlush","LawnGreen","LemonChiffon"
,"LightBlue","LightCoral","LightCyan","LightGoldenRodYellow","LightGray","LightGrey","LightGreen","LightPink","LightSalmon","LightSeaGreen","LightSkyBlue","LightSlateGray","LightSlateGrey","LightSteelBlue","LightYellow","Lime","LimeGreen","Linen","Magenta","Maroon","MediumAquaMarine","MediumBlue",
"MediumOrchid","MediumPurple","MediumSeaGreen","MediumSlateBlue","MediumSpringGreen","MediumTurquoise","MediumVioletRed","MidnightBlue","MintCream","MistyRose","Moccasin",
"NavajoWhite","Navy","OldLace","Olive","OliveDrab","Orange","OrangeRed","Orchid","PaleGoldenRod","PaleGreen","PaleTurquoise","PaleVioletRed","PapayaWhip","PeachPuff","Peru","Pink","Plum","PowderBlue","Purple","Red","RosyBrown","RoyalBlue","SaddleBrown","Salmon"
,"SandyBrown","SeaGreen","SeaShell","Sienna","Silver","SkyBlue","SlateBlue","SlateGray","SlateGrey","Snow","SpringGreen","SteelBlue","Tan","Teal","Thistle","Tomato","Turquoise","Violet","Wheat","White","WhiteSmoke","Yellow","YellowGreen"];

var CSS_COLOR_1=[];
var CSS_COLOR_2=[];
var CSS_COLOR_3=[];
var CSS_COLOR_4=[];

for (var i = 0; i <1000; i++) {
	CSS_COLOR_1.push("DeepSkyBlue");
	CSS_COLOR_2.push("SlateBlue");
	CSS_COLOR_3.push("Orchid");
	CSS_COLOR_4.push("MediumAquaMarine");

}

function returnAll(){

	var ctx = document.getElementById("all");
	 ctx.getContext('2d').canvas.height = <?=count($All)*20?>

	var myChart = new Chart(ctx, {
			type: 'horizontalBar',
			data: {
					labels: [
						<?php foreach ($All as $key ): ?>

							<?php echo "'".trim($key["name"])."',"?>
						<?php endforeach ?>

					]
						,
					datasets: [{
							label: "リストアップ",
							data: [
								<?php foreach ($All as $key ): ?>

									<?php
									$var=$key["listup"];
									echo "'".trim($var)."',"
									?>
								<?php endforeach ?>
							],
							backgroundColor: CSS_COLOR_1,
							borderColor:CSS_COLOR_1,
							hoverBackgroundColor:CSS_COLOR_1 ,
							borderWidth: 2,

							 pointHoverRadius: 5,
					},
					{
							label: "コール",
							data: [
								<?php foreach ($All as $key ): ?>

									<?php
									$var=$key["call"];
									echo "'".trim($var)."',"
									?>
								<?php endforeach ?>
							],
							backgroundColor: CSS_COLOR_2,
							borderColor:CSS_COLOR_2,
							hoverBackgroundColor:CSS_COLOR_2 ,
							borderWidth: 2,

							 pointHoverRadius: 5,
					},
					{
							label: "アポ",
							data: [
								<?php foreach ($All as $key ): ?>

									<?php
									$var=$key["apo"];
									echo "'".trim($var)."',"
									?>
								<?php endforeach ?>
							],
							backgroundColor:CSS_COLOR_3,
							borderColor:CSS_COLOR_3,
							hoverBackgroundColor:CSS_COLOR_3 ,
							borderWidth: 2,

							 pointHoverRadius: 5,
					}
					,
					{
							label: "成約",
							data: [
								<?php foreach ($All as $key ): ?>

									<?php
									$var=$key["comp"];
									echo "'".trim($var)."',"
									?>
								<?php endforeach ?>
							],
							backgroundColor:CSS_COLOR_4,
							borderColor:CSS_COLOR_4,
							hoverBackgroundColor:CSS_COLOR_4 ,
							borderWidth: 2,

							 pointHoverRadius: 5,
					}
				]

			},
			options: {
				responsive : true,
					scales: {
						xAxes: [{
				                stacked: true
				            }],
				            yAxes: [{
				                stacked: true
				            }]
					}
			}
	});
// 	$.ajax({
//     url: 'https://rtcrm.net/dev/TMReport/returnAll',// 요청 할 주소
//
//     type: 'POST' ,// GET, PUT
//     data: {
//         Name: 'ajax',
//         Age: '10'
//     }, // 전송할 데이터
//     dataType: 'json', // xml, json, script, html
//
//     success: function(jqXHR) {
//
// 			var arrCov = $.extend(true, [], jqXHR);
// 			console.log(arrCov);
// 			var label=[];
// 			var data=[];
// 			var color=[];
// 			var border=[];
//
//
// 			for (var i=0;i<arrCov.length;i++){
//
// 					label.push(arrCov[i]["name"]);
// 					data.push(arrCov[i]["count"]);
// 			color.push(CSS_COLOR_NAMES[Math.floor(Math.random() * CSS_COLOR_NAMES.length)]);
// 			border.push("black");
//
// 			}
//
//
//
//
//
//
//
//
//
// 		}, // 요청 완료 시
// 		error:function(request,status,error){
// 		        console.log("code = "+ request.status + " message = " + request.responseText + " error = " + error); // 실패 시 처리
// 		       },
//
//
//
//
// });
//



}

function personal(id){
$("#modalCanvas").empty();
$("#modalCanvas").append('<canvas id="personal"></canvas>');

	$.ajax({
    url: 'https://rtcrm.net/dev/TMReport/returnPersonal',// 요청 할 주소

    type: 'POST' ,// GET, PUT
    data: {
        id: id,

    }, // 전송할 데이터
    dataType: 'json', // xml, json, script, html

    success: function(jqXHR) {

			var arrCov = $.extend(true, [], jqXHR);

			var label=[];
			var labelset=[];
			var color=[];
			var color2=[];
			var border=[];
			var data1=[];
			var data2=[];
			var dataset=[];


			for (var i=0;i<arrCov.length;i++){


				if(label.length ==0){
						label.push(arrCov[i]["week"]);
						labelset.push(arrCov[i]["name"]);
				}
				else{
					var count=0;
					for( var j=0;j<label.length;j++){
						if(arrCov[i]["week"]==label[j]){
								count++;

						}


					}

					if(count<1){
							label.push(arrCov[i]["week"]);
							labelset.push(arrCov[i]["name"]);
					}

				}



			color.push(CSS_COLOR_NAMES[Math.floor(Math.random() * CSS_COLOR_NAMES.length)]);
			color2.push(CSS_COLOR_NAMES[Math.floor(Math.random() * CSS_COLOR_NAMES.length)]);
			border.push("black");
			data1.push(arrCov[i]["week"]);
			data2.push(arrCov[i]["name"]);


			}


			console.log(labelset)

			 for(var i=0;i<labelset.length;i++){
				 	var dataArr=[0,0,0,0,0];
					for(var j=0;j<data2.length;j++){

						if(labelset[i]==data2[j]){
							dataArr[i]++;

						}


					}
					console.log(dataArr);

				 var a= {
							label:labelset[i],
							data: dataArr,
							backgroundColor: color[i],
							borderColor: border[i],
							borderWidth: 2
					};
						 dataset.push(a);
			 }






			var ctx = document.getElementById("personal");

			 ctx.getContext('2d').canvas.height = 100;
			var myChart = new Chart(ctx, {
			    type: 'bar',
			    data: {
			        labels: label
			          ,
			        datasets: dataset

			    },
			    options: {
			      responsive : true,
			        scales: {
								xAxes: [{
															 stacked: true
													 }],
													 yAxes: [{
															 stacked: true
													 }]
			        }
			    }
			});




		}, // 요청 완료 시
		error:function(request,status,error){
		        console.log("code = "+ request.status + " message = " + request.responseText + " error = " + error); // 실패 시 처리
		       },




});




}




$('a[data-modal]').click(function(event) {
	$(this).modal();

	return false;
});









</script>

</body>
</html>

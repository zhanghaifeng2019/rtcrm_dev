
<!DOCTYPE html>
<html xml:lang="ja" lang="ja">
<body id="pagetop">
	<header>
		<div class="header-main">
			<h1><a href="<?php echo base_url(); ?>Main"><div><em><img src="<?php  echo base_url(); ?>common/img/header_logo.svg" width="100" height="11"></em><span>customer database</span></div></a></h1>
			<ul>
				<li><a href="<?php echo base_url(); ?>Main">メイン</a></li>
				<li><a href="<?php echo base_url(); ?>TM">テレマ</a></li>
				<li class="current"><a href="<?php echo base_url(); ?>TMRegi">テレマ登録</a></li>
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
			<h2>テレマ登録</h2>
			<ul>
				<!--
				<li class="current"><a href="TM_search.html"><span>顧客ID</span>0000</a></li>
				<li><a class="button-color--blue" href="TM_search.html"><span>媒体ID</span>0000</a></li>
				<li><a class="button-color--blue" href="TM_search.html"><span>代理店ID</span>0000</a></li>
				-->
				<!-- <li><a class="button-color--green" href="TM_search.html">検索</a></li> -->
			</ul>
			<div class="title-sp-menu-trigger"><div class="title-sp-trigger"><span></span></div></div>
		</div>
	</header>


<div id="wrapper" class="tm tm-register">
	<main>

		<div class="action-attention-wrap">
			<!-- <div class="action-attention action-attention--error">エラー</div>
			<div class="action-attention action-attention--note">注意</div>
			<div class="action-attention action-attention--success">正常に登録完了しました</div> -->
		</div>

    <?php $this->load->helper('form');

  		 echo form_open('TMRegi/insert');

  	?>

			<div class="register-block-wrap formset">

				<div class="register-block">
					<table>
						<!-- <tr>
							<th>顧客ID</th>
							<td>00000</td>
						</tr> -->
						<tr>
							<th>顧客 親区分</th>
							<td>

									<select name="customer_type" id="customer_type">
									<?php foreach($customertype as $item ) :

										?>


					<option value="<?=$item->id?>"><?=$item->name?></option>


									<?php endforeach ?>
								</select>
							</td>
						</tr>
						<tr>
							<th id="idInput">CID(任意)</th>
							<td><input type="text" value="" name="rid_sponsor"></td>
						</tr>
						<tr>
							<th id="pidInput">PID(任意)</th>
							<td><input type="text" value="" name="rid_product" ></td>
						</tr>
						<tr>
							<th id="pidInput">代理店</th>
							<td>
								<select name="agency_id" class="js_select2">
									<option value="0">0.直取引(代理店なし)</option>
									<?php foreach($agency as $item ) :?>
										<option value="<?=$item->id?>"><?=$item->id?>. <?=$item->agency_name?></option>
									<?php endforeach ?>
								</select>
							</td>
						</tr>
						<tr>
							<th>ジャンル</th>
							<td>
								<select name="genre_id" class="js_select2">
									<?php foreach($genre as $item ) :?>
										<option value="<?=$item->id?>"><?=$item->name?></option>
									<?php endforeach ?>
								</select>
							</td>
						</tr>

						<tr>
							<th>所属チーム</th>
							<td>
								<select id="selectGroup" name="group" class="js_select2"　id="teamSelect">
									<?php foreach($group as $item ) :?>
									<option value="<?=$item->id?>" > <?=$item->name?> </option>

									<?php endforeach ?>
								</select>
							</td>
						</tr>
						<tr>
              <th>テレマ担当</th>
              <td>
                <select name="staff_id" class="js_select2" id="staffSelect">

                </select>
              </td>
            </tr>


              <tr>
              <th>RTG担当</th>
              <td>
                <select name="all_staff_id" class="js_select3" id="allstaffSelect">

                </select>
              </td>
            </tr>
						<tr>
							<th>会社名</th>
							<td><input type="text" name="companyName" value="<?php if(isset($_SESSION['companyName'])) {echo $_SESSION['companyName']; } ?>" required style="background-color:#F7D358"></td>
						</tr>
						<tr>
							<th>案件名(任意)</th>
							<td><input type="text" name="service_name" value="<?php if(isset($_SESSION['PDSVName'])) {echo $_SESSION['PDSVName']; } ?>"></td>
						</tr>
						<tr>
							<th>案件URL(任意)</th>
							<td><input type="text" name="url" value="<?php if(isset($_SESSION['domain'])) {echo $_SESSION['domain']; } ?>"></td>
						</tr>
						<tr>
							<th>担当者役職（任意）</th>
							<td><input type="text" name="director_status" value=""></td>
						</tr>
						<tr>
							<th>担当者名（任意）</th>
							<td><input type="text" name="director" value=""></td>
						</tr>
						<tr>
							<th>担当者メール</th>
							<td><input type="email" name="email" value=""></td>
						</tr>
						<tr>
							<th>代表者名（任意）</th>
							<td><input type="text" name="president" value="" ></td>
						</tr>
						<tr>
							<th>電話番号</th>

							<td><input type="text" name="tel" value="<?php if(isset($_SESSION['Phone'])) {echo $_SESSION['Phone']; } ?>" required maxlength="14" style="background-color:#F7D358" ></td>
						</tr>
						<!-- headに郵便番号で住所自動入力リンク利用 -->
						<tr>
							<th>〒(任意)</th>
							<td><input type="text" name="zip" placeholder="(例)1001234"value="" onKeyUp="AjaxZip3.zip2addr(this,'','address','address');"></td>
						</tr>
						<tr>
							<th>住所</th>
							<td><input type="text" name="address" value="" ></td>
						</tr>
						<tr>
							<th>建物名(任意)</th>
							<td><input type="text" name="building" value="" ></td>
						</tr>
						<tr>
							<th>案件情報元</th>
							<td>
								<select  id="info_source" name="info_source">
									<option value=0>他社ASP案件</option>
									<option value=1>紹介</option>
									<option value=2>インバウンド</option>
									<option value=3>WEB画</option>
									<option value=4>雑誌</option>
									<option value=5>SNS</option>
								</select>
							</td>
						</tr>
						<tr>
							<th>情報元補足(任意)</th>
							<td><input type="text" value="" name="info_source_comment"></td>
						</tr>
					</table>
				</div><!--[/register-block]-->

				<div class="register-block">
					<table>
						<tr>
							<th>ステータス</th>
							<td>
								<select id="status" name="status">

									<option value="11"> リストアップ </option>
								<?php
								foreach($status as $item ){
									if($item->id !="11"){


									 echo "<option value=".$item->id." > ".$item->name."</option>";
										}

								}
								 ?>
								</select>
							</td>
						</tr>
						<tr>
							<th>ステータスコメント</th>
							<td>
								<select id="status_comment" name="status_comment">
									<option value="15"> 未架電 </option>
								<?php
								foreach($StatusComment as $item ){
									if($item->id!="15"){
										echo "<option value=".$item->id." > ".$item->name."</option>";
									}
								}
								 ?>
								</select>
								<input type="text" name="status_etc" id="status_etc" style="display:none">
							</td>
						</tr>
						<tr>
							<th>次回連絡タイマー(任意)</th>
							<td>
								<input type="number" id="timer" name="timer" list="time" min=0 max=365 >
								<datalist id="time">
								<option value=1>1日後</option>
								<option value=3>3日後</option>
								<option value=7>7日後</option>
								<option value=14>14日後</option>
								<option value=30>30日後</option>
								<option value=90>90日後</option>
								<option value=120>120日後</option>
								<option value=365>365日後</option>
								</datalist>
								<p id="target"></p>
							</td>
						</tr>
						<tr>
							<th>優先度</th>
							<td>
								<select id="priority" name="priority">
									<option value=0>超高</option>
									<option value=1>高</option>
									<option value=2>中</option>
									<option value=3>低</option>
								</select>
							</td>
						</tr>
						<tr>
							<th>アポ日</th>
							<td><input class="appo_date" type="date"  value="" name="appo_date"></td>
						</tr>
						<tr>
							<th>アポ担当</th>
							<td>
								<select name='appo_staff_id' id="appo_staff_id" class="js_select2">
										<?php foreach($staff as $item ) :
												if($item->id==$this->session->id){
										?>
											<option value="<?=$item->id?>"><?=$item->name?></option>
										<?php
											}
											else{
												?>
													<option value="<?=$item->id?>"><?=$item->name?></option>
												<?php
											}
										?>
									<?php endforeach ?>
								</select>
							</td>
						</tr>
					</table>


					<div class="register-message-wrap">
						<h2>新規コンタクト登録(任意)</h2>
						<div class="register-message">
							<textarea rows="4" name="contactContent"></textarea>
							<div class="register-message-tagset">
								<dl>
									<dt>コンタクト日</dt>
									<dd><input type="date" value="<?=date('Y-m-d')?>" name="contactDate"></dd>
								</dl>
								<dl>
									<dt>担当者</dt>
									<dd>
										<select name='contactStaff' id="contactStaff">
											<?php foreach($staff as $item ) :
												 if($item->id==$this->session->id){
											?>
												<option value="<?=$item->id?>"  selected="selected"><?=$item->name?></option>
											<?php
												}
												else{
													?>
														<option value="<?=$item->id?>"><?=$item->name?></option>
													<?php
												}
										?>
										<?php endforeach ?>
										</select>
									</dd>
								</dl>
							</div>
						</div>
					</div><!--[/register-message-wrap]-->

				</div><!--[/register-block]-->

			</div><!--[/register-block-wrap]-->

			<div class="submit-set submit-set--center">
				<input type="submit" value="登録" class="button-color--blue">
			</div>

		</form>

	</main>
	<footer>
		<address><a href="http://rentracks.co.jp/">&copy; Rentracks Co., Ltd. All rights reserved.</a></address>
	</footer>
</div><!--[/wrapper]-->

<!--[jQuery]-->
<script src="<?php    echo base_url(); ?>common/lib/jquery-3.3.1.min.js"></script>
<script src="<?php    echo base_url(); ?>common/lib/select2.min.js"></script>
<link href="<?php    echo base_url(); ?>common/lib/select2.min.css" rel="stylesheet" media="all">
<script src="<?php    echo base_url(); ?>common/lib/site.js"></script>
<script>


$(function() {



	if($("#status_comment").val()==14){
			$('#status_etc').show();
	}


	    $('#customer_type').change(function(){
	      if($('#customer_type').val()==1){
	        $('#idInput').text('関連SID(任意)');
	      }
	      else if($('#customer_type').val()==3)
	      {
	          $('#idInput').text('関連SID(任意)');
	      }
	      else if($('#customer_type').val()==2||$('#customer_type').val()==4){
	        $('#idInput').text('関連OID(任意)');
	      }

	      else if($('#customer_type').val()==4){
	        $('#idInput').text('関連OID(任意)');
	      }
	      else{
	        $('#idInput').text('関連ID(任意)');
	      }

	  	});


		$("#status_comment").change(function(){
			var num=$("#status_comment").val();

			if(num!=14){
				$('#status_etc').hide();
			}
			else{
				$('#status_etc').show();
			}
		});
var arr =<?=json_encode($staff)?>;
	$("#selectGroup").val("<?=$this->session->group?>").prop("selected", true);

function init(){


	var num=$('#selectGroup').val();
		$('#staffSelect').empty();
		$('#staffSelect').append("<option value=1>担当者未設定</option>");
		count=0;
	arr.forEach(function( value ) {
		if(num==value['group_id'] && value['id']!=1){
				$('#staffSelect').append("<option value="+value['id']+">"+value['name']+"</option>");
		}
});

$('#allstaffSelect').empty();
$('#allstaffSelect').append("<option value=1>担当者未設定</option>");
arr.forEach(function( value ) {
		 if( value['id']!=1){
				 $('#allstaffSelect').append("<option value="+value['id']+">"+value['name']+"</option>");

		 }
 });

}


	init();
	$('#staffSelect').val("<?=$this->session->id?>").prop("selected", true);
	$('#selectGroup').change(function(){
init();
		});

	$('#timer').change(function(){
	var today = new Date();

	today.setDate(today.getDate() + ($('#timer').val()*1) );
	var YYYY= today.getFullYear();
	var MM =today.getMonth()+1;
	var DD= today.getDate();
	var w_day = new Array(7);
	w_day[0] = "日";
	w_day[1] = "月";
	w_day[2] = "火";
	w_day[3] = "水";
	w_day[4] = "木";
	w_day[5] = "金";
	w_day[6] = "土";
	var day = w_day[today.getDay()];
$('#target').text(YYYY+"年"+MM+"月"+DD+"日　"+day+"曜日");
});
	$('.js_select2').select2();
	$('.js_select3').select2();
});
</script>

</body>
</html>

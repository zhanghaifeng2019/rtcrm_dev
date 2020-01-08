<?php
// $idarr=$_SESSION["idArr"];

// $next;
// $previous;
// for ($i=0; $i<count($idarr) ; $i++) {
//   if($i==0 && $idarr[0]==$_SESSION['POST'] ){
//     $previous=$idarr[0];
//     $next=$idarr[$i+1];
//   }


//   if(($i>0 && $i!=count($idarr)-1) && $idarr[$i]==$_SESSION['POST']){
//     $previous=$idarr[$i-1];
//     $next=$idarr[$i+1];
//   }

// if($i==count($idarr)-1 && $idarr[$i]==$_SESSION['POST']){
//     $previous=$idarr[$i-1];
//     $next=$idarr[$i];
//   }
// }
$today = date("Ymd");
if(empty($ContactLastest[0]->created)){
  $resultDate="コンタクト無";
}
else{
  $date= date("Ymd", strtotime( $ContactLastest[0]->created));
  $resultDate=(strtotime($today)-strtotime($date) ) / 86400;
  $resultDate.="日";
}
  if(isset($this->session->pagiNum)){
      $path=$this->session->pagiNum;
  }
  else{
    $path=$_POST['pagiNum'];
  }

  if(isset($this->session->cancelPage)){
      $cancelPage=$this->session->cancelPage;
  }




 ?>
<!DOCTYPE html>
<html xml:lang="ja" lang="ja">
<body id="pagetop">

<header>
	<div class="header-main">
		<h1><a href="./"><div><em><img src="<?php    echo base_url(); ?>common/img/header_logo.svg" width="100" height="11"></em><span>customer database</span></div></a></h1>
		<ul>
			<li><a href="<?php    echo base_url(); ?>Main">メイン</a></li>
			<li class="current"><a href="<?php    echo base_url(); ?>TM">テレマ</a></li>
			<li ><a href="<?php echo base_url(); ?>TMRegi">テレマ登録</a></li>
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
		<h2>広告主様ダッシュボード</h2>
		<ul>
			<!-- <li class="current"><a href="TM_search.html"><span>顧客ID</span>0000</a></li>
			<li><a class="button-color--blue" href="TM_search.html"><span>媒体ID</span>0000</a></li>
			<li><a class="button-color--blue" href="TM_search.html"><span>代理店ID</span>0000</a></li>
			<li><a class="button-color--green" href="TM_search.html">検索</a></li> -->
			<!--<li class="current"><a href="TM_search.html">検索</a></li>-->
		</ul>
		<div class="title-sp-menu-trigger"><div class="title-sp-trigger"><span></span></div></div>
	</div>
</header>

<div id="wrapper" class="tm tm-detail">
	<main>

		<div class="action-attention-wrap">
    <?php
      if(isset($_POST['ok'])){

        echo '<div class="action-attention action-attention--success">正常に登録完了しました</div>';

      };
     ?>
			<!-- <div class="action-attention action-attention--error">エラー</div>
			<div class="action-attention action-attention--note">注意</div>

		</div>

<!-- <div class="formset-chkrdo">
	<input type="radio" id="test1"><label for="test1">あああああ</label>
</div>

<div class="formset-chkrdo">
	<input type="checkbox" id="test2"><label for="test2">あああああ</label>
</div> -->


<!-- <?php $this->load->helper('form');

   echo form_open('TMDetail','id='.$previous);

?>

<a class="button-color--red"  href="javascript:submit(<?=$previous?>);">previous</a>
<input type="hidden" name="id" value="<?=$previous?>">
<?=$previous?>
</form>




<?php $this->load->helper('form');

   echo form_open('TMDetail','id='.$next);

?>

<a class="button-color--blue"  href="javascript:submit(<?=$next?>);">next</a>
<input type="hidden" name="id" value="<?=$next?>">
<?=$next?>
</form> -->

<?php $this->load->helper('form');

   echo form_open('TMDetail/update', 'id="update"');



?>
<input type="hidden" name="id" value="<?=$initDash[0]->id?>">
<input type="hidden" name="pagiNum" value="<?=$path?>">
<input type="hidden" name="ok" value="ok">
			<div class="register-block-wrap formset">

				<div class="register-block">
					<table>
						<tr>
							<th>顧客ID</th>
							<td><?=$initDash[0]->id?></td>
						</tr>
						<tr>
							<th>顧客 親区分</th>
							<td>
								<select name="customer_type" id="customer_type">
                  <?php foreach($customertype as $item ) :
                      if($item->id==$initDash[0]->customer_type){
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
							</td>
						</tr>

			<tr>
				<th id="idInput">SID(任意)</th>
				<td><input type="text" value="<?=$initDash[0]->rid_sponsor?>" name="rid_sponsor" ></td>
			</tr>

            <tr>
              <th id="pidInput">PID(任意)</th>
              <td><input type="text" value="<?=$initDash[0]->rid_product?>" name="rid_product" ></td>
            </tr>

			<tr>
			<th id="agency_idInput">代理店</th>
				<td>
					<select name="agency_id" class="js_select2">
						<option value="0">0.直取引(代理店なし)</option>
						<?php foreach($agency as $item ) :
								if($item->id==$initDash[0]->agency_id){
							?>
								<option value="<?=$item->id?>"  selected="selected"><?=$item->id?>. <?=$item->agency_name?></option>
							<?php
								}else{
									?>
									<option value="<?=$item->id?>"><?=$item->id?>. <?=$item->agency_name?></option>
								<?php
								}
							?>
						<?php endforeach ?>
					</select>
				</td>
			</tr>

			<tr>
				<th>ジャンル</th>
				<td>
					<select name="genre_id" class="js_select2">
						<?php foreach($genre as $item ) :
							if($item->id==$initDash[0]->genre_id){
						?>
							<option value="<?=$item->id?>"  selected="selected"><?=$item->name?></option>
						<?php
							}else{
								?>
								<option value="<?=$item->id?>"><?=$item->name?></option>
							<?php
							}
						?>
						<?php endforeach ?>
					</select>
				</td>
			</tr>

						<tr>
							<th>所属チーム</th>
							<td>
								<select id="selectGroup" name="group" class="js_select2" >
									<?php foreach($group as $item ) :?>
										<option value="<?=$item->id?>"> <?=$item->name?> </option>
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
							<td><input type="text" name="companyName" value="<?=$initDash[0]->name?>" required style="background-color:#F7D358"></td>
						</tr>
						<tr>
							<th>案件名(任意)</th>
							<td><input type="text" name="service_name" value="<?=$initDash[0]->service_name?>" ></td>
						</tr>
						<tr>
							<th>案件URL</th>
							<td><input type="text" name="url" value="<?=$initDash[0]->url?>"></td>
						</tr>
						<tr>
							<th>担当者役職（任意）</th>
							<td><input type="text" name="director_status" value="<?=$initDash[0]->director_status?>"></td>
						</tr>
						<tr>
							<th>担当者名（任意）</th>
							<td><input type="text" name="director" value="<?=$initDash[0]->director?>"></td>
						</tr>
						<tr>
							<th>担当者メール</th>
							<td><input type="email" name="email" value="<?=$initDash[0]->email?>"></td>
						</tr>
						<tr>
							<th>代表者名（任意）</th>
							<td><input type="text" name="president" value="<?=$initDash[0]->president?>"></td>
						</tr>
						<tr>
							<th>電話番号<input type="button" value="掛ける" onClick="call()"></th>
							<td><input type="tel" name="tel" id="tel" value="<?=$initDash[0]->tel?>" maxlength=14 required style="background-color:#F7D358">

              </td>
						</tr>
						<tr>
							<th>〒（任意）</th>
							<td><input type="text" name="zip" value="<?=$initDash[0]->zip?>" onKeyUp="AjaxZip3.zip2addr(this,'','address','address');"></td>
						</tr>
						<tr>
							<th>住所</th>
							<td><input type="text" name="address" value="<?=$initDash[0]->addr?>"></td>
						</tr>
						<tr>
							<th>建物名(任意)</th>
							<td><input type="text" name="building" value="<?=$initDash[0]->building?>"></td>
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
									<option value=6>既存顧客案件</option>
								</select>
							</td>
						</tr>
						<tr>
							<th>情報元補足 （任意）</th>
							<td><input type="text" value="<?=$initDash[0]->info_source_comment?>" name="info_source_comment"></td>
						</tr>
					</table>
				</div><!--[/register-block]-->

				<div class="register-block">
					<table>
						<tr>
							<th>ステータス</th>
							<td>
                <select id="status" name="status">

                  <option value="non"> すべて </option>
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

									<option value="non"> すべて </option>
									<option value="15"> 未架電 </option>
								<?php
								foreach($StatusComment as $item ){
									if($item->id!="15"){
										echo "<option value=".$item->id." > ".$item->name."</option>";
									}
								}
								 ?>
								</select>
                	<input type="text" name="status_etc" id="status_etc" value="<?=$initDash[0]->status_etc?>" style="display:none">
							</td>
						</tr>
						<tr colspan="2">
							<th>次回連絡タイマー(任意)</th>
							<td>

								<input type="text" id="timer" name="timer" value="<?php if($initDash[0]->timer==-1){echo "連絡予定なし"; }else{ echo $initDash[0]->timer; } ?>" list="time" min=-1 max=365 >
								<datalist id="time">
								<option value="連絡予定なし">連絡予定なし</option>
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
							<td>
								<input class="appo_date" type="date" value="<?php echo explode(" ",$initDash[0]->appo_date)[0]; ?>" name="appo_date" >
							</td>
						</tr>
						<tr>
							<th>アポ担当</th>
							<td>

								<select name='appo_staff_id' id="appo_staff_id" class="js_select2">

									<?php foreach($staff as $item ) :
										if($item->id==$initDash[0]->appo_staff_id){
									?>
										<option value="<?=$item->id?>"  selected="selected"><?=$item->name?></option>
									<?php
										}else{
											?>
											<option value="<?=$item->id?>"><?=$item->id?>. <?=$item->name?></option>
										<?php
										}
									?>
								<?php endforeach ?>


								</select>
							</td>
						</tr>

						<tr>
							<th>最後連絡経過日</th>
							<td><input type="text" value="<?=$resultDate?>" readonly></td>
						</tr>
					</table>
					<?php foreach($Contacts as $item ) :?>
					<div class="register-message-output">

						<h2><?=$item->name?> [連絡日:<?=date("Y-m-d", strtotime( $item->contact_date)) ?>] (作成日：<?=date("Y-m-d H:i:s", strtotime( $item->contactDate)) ?>)</h2>
						<p>	<?=$item->contact?></p>
					</div>
					<?php endforeach ?>


					<div class="register-message-linkset">
						<div><a href="#modal-01" data-modal class="button-color--green">新規コンタクト入力</a></div>
						<div>
							<a class="button-color--green" onclick="b()">コンタクト全件</a><span class="btn-number-tip"><?=$ContactLastest[0]->count?></span></div>
					</div>

				</div><!--[/register-block]-->

			</div><!--[/register-block-wrap]-->



			<div class="submit-set submit-set--center">
				<input type="submit" value="更新" class="button-color--blue">
        <input type="button" id="success" value="戻る" class="button-color--gray">
			</div>

		</form>

	</main>
	<footer>
<address><a href="http://rentracks.co.jp/">&copy; Rentracks Co., Ltd. All rights reserved.</a></address>
	</footer>
</div><!--[/wrapper]-->

<!--<div id="modal-01" class="modal modal-panel">-->
<div id="modal-01" class="modal register-message-wrap">
	<h2>新規コンタクト登録　</h2>
	<?php $this->load->helper('form');

		 echo form_open('TMDetail/contact');

	?>


	<input type="hidden" name="id" value="<?=$initDash[0]->id?>">
		<input type="hidden" name="cid" value="<?=$initDash[0]->cid?>">
		<div class="register-message formset">
			<textarea rows="4" name="contactContent" required></textarea>
			<div class="register-message-tagset">
				<dl>
					<dt>コンタクト日</dt>
					<dd><input type="date" value="<?=date('Y-m-d')?>" name="contactDate"></dd>
				</dl>
				<dl>
					<dt>担当者</dt>
					<dd>
						<select name="staff_id">
							<?php foreach($staff as $item ) :
								 if($item->id==$initDash[0]->staff_id){
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

        <dl>
        <dt>次回連絡タイマー</dt>
        <dd>
          <input type="text" id="timer2" name="timer2" list="time"　value=0 required min=0 max=365>
          <datalist id="time">
            <option value="連絡予定なし">連絡予定なし</option>
            <option value=1>1日後</option>
            <option value=3>3日後</option>
            <option value=7>7日後</option>
            <option value=14>14日後</option>
            <option value=30>30日後</option>
            <option value=90>90日後</option>
            <option value=120>120日後</option>
            <option value=365>365日後</option>
          </datalist>
          <p id="target2"></p>
        </dd>
      </dl>

			</div>
			<div class="submit-set submit-set--center">
				<input type="submit" value="コンタクト追加登録" class="button-color--blue">
			</div>
		</div>
	</form>

</div>
<?php $this->load->helper('form');

   echo form_open('TMDetail/contactDetail', 'id="contact"');



?>
<input type="hidden" name="id" value="<?=$initDash[0]->id?>">

</form>



<!--[jQuery]-->
<script src="<?php    echo base_url(); ?>common/lib/jquery-3.3.1.min.js"></script>
<script src="<?php    echo base_url(); ?>common/lib/select2.min.js"></script>
<link href="<?php    echo base_url(); ?>common/lib/select2.min.css" rel="stylesheet" media="all">
<script src="<?php    echo base_url(); ?>common/lib/jquery.modal.min.js"></script>
<link href="<?php    echo base_url(); ?>common/lib/jquery.modal.css" rel="stylesheet" media="all">
<script src="<?php    echo base_url(); ?>common/lib/site.js"></script>
<script><?php
if(isset($_SESSION['status'])) {
?>

$('#status').prop('selected','selected');
$("#status").val("<?=$_SESSION['status']?>").prop("selected", true);
<?php
}

?>


<?php
if(isset($_SESSION['status_comment'])) {
?>

$('#status_comment').prop('selected','selected');
$("#status_comment").val("<?=$_SESSION['status_comment']?>").prop("selected", true);
<?php
}

?>
function call(){
  var tel=document.getElementById("tel").value;
  var con=confirm(tel+"に電話を掛けますか？");
	if(con==true){
		miitelWidget.call(tel);
	}

}

function b(){
if(<?=$ContactLastest[0]->count?> != 0){
  $( "#contact" ).submit();
}


}
function submit($id){
 $('#'+$id).submit();

}

$(document).ready(function() {

  var timer = setInterval(function() {


    if($("#status_comment").val()==14){
        $('#status_etc').show();
    }
    $("#status_comment").change(function(){
      var num=$("#status_comment").val();

      if(num!=14){
        $('#status_etc').hide();
        $('#status_etc').val('');
      }
      else{
        $('#status_etc').show();

      }
      });

});

  var arr =<?=json_encode($staff)?>;

  	$("#selectGroup").val("<?=$initDash[0]->staffGroup?>").prop("selected", true);
  	console.log($("#selectGroup").val("<?=$initDash[0]->staffGroup?>").val());

	function init(){


		var num=$('#selectGroup').val();

      $('#staffSelect').empty();
			$('#staffSelect').append("<option value=1>担当者未設定</option>");


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
$('#staffSelect').val("<?=$initDash[0]->staffId?>").prop("selected", true);
$('#allstaffSelect').val("<?=$initDash[0]->rtg_staff_id?>").prop("selected", true);
console.log(<?=$initDash[0]->rtg_staff_id?>);
	$('#selectGroup').change(function(){

init();
		});


  $('#success').click(function() {
    window.location.replace('<?=$cancelPage?>/index/<?=$path?>');




  });

	$('#status').val(<?=$initDash[0]->status?>);
	$('#status_comment').val(<?=$initDash[0]->status_comment?>);

	$('#priority').val(<?=$initDash[0]->priority?>);
	$('#info_source').val(<?=$initDash[0]->info_source?>);

  $('#timer').change(function(){
    if($('#timer').val()!='連絡予定なし'){


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
      }
      else{
        $('#target').empty();
      }
  });


  $('#timer2').change(function(){
      if($('#timer2').val()!='連絡予定なし'){
    var today = new Date();

    today.setDate(today.getDate() + ($('#timer2').val()*1) );
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
  $('#target2').text(YYYY+"年"+MM+"月"+DD+"日　"+day+"曜日");
  }
  else{
    $('#target2').empty();
  }
  });

});
$(function() {
	$('.js_select2').select2();
	$('.js_select3').select2();

	$('a[data-modal]').click(function(event) {
		$(this).modal();
		return false;
	});
});
</script>

</body>
</html>

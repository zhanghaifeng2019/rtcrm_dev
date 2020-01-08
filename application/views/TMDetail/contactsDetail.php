<?php

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
			<li><a href="<?php echo base_url(); ?>TMRegi">テレマ登録</a></li>
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
		<h2>コンタクト詳細</h2>
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

<div id="wrapper" class="tm tm-messageAll">
	<main>

		<div class="action-attention-wrap">
			<!-- <div class="action-attention action-attention--error">エラー</div>
			<div class="action-attention action-attention--note">注意</div>
			<div class="action-attention action-attention--success">正常に登録完了しました</div> -->
		</div>

		<dl class="search-number">
			<dt>該当件数</dt>
			<dd><p><?=$totalRows?></p><span>件</span></dd>
		</dl>

		<div class="submit-set submit-set--center">
			<a href="#modal-01" data-modal class="button-color--green">新規コンタクト入力</a>
			  <input type="button" onclick="cancle()" value="戻る" class="button-color--gray">
		</div>

		<ul class="pagination">
<?php echo $pagination?>
		</ul>

		<div class="message-all-wrap">


      <?php foreach($AllContacts as $item ) :?>


      <div class="register-message-output">

        <h2><?=$item->name?>[<?=	date("Y-m-d", strtotime( $item->contact_date))?>]</h2>
        <p>	<?=$item->contact?></p>
      </div>

      <?php endforeach ?>




		</div>

		<ul class="pagination">
<?php echo $pagination?>
		</ul>

		<div class="submit-set submit-set--center">
			<a href="#modal-01" data-modal class="button-color--green">新規コンタクト入力</a>
				 <input type="button" onclick="cancle()" value="戻る" class="button-color--gray">
		</div>

	</main>
	<footer>
		<address><a href="http://rentracks.co.jp/">&copy; Rentracks Co., Ltd. All rights reserved.</a></address>
	</footer>
</div><!--[/wrapper]-->

<!--<div id="modal-01" class="modal modal-panel">-->
<div id="modal-01" class="modal register-message-wrap">
	<h2>新規コンタクト登録</h2>
	<?php $this->load->helper('form');

		 echo form_open('TMDetail/DetailContact');

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
					<input type="text" id="timer2" name="timer2" list="time"　required>
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

<!--[jQuery]-->
<script src="<?php    echo base_url(); ?>common/lib/jquery-3.3.1.min.js"></script>
<script src="<?php    echo base_url(); ?>common/lib/select2.min.js"></script>
<link href="<?php    echo base_url(); ?>common/lib/select2.min.css" rel="stylesheet" media="all">
<script src="<?php    echo base_url(); ?>common/lib/jquery.modal.min.js"></script>
<link href="<?php    echo base_url(); ?>common/lib/jquery.modal.css" rel="stylesheet" media="all">
<script src="<?php    echo base_url(); ?>common/lib/site.js"></script>
<script>
function cancle(){
		window.location.replace('<?= base_url()?>TMDetail');
}
$(function() {

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
  }else{
      $('#target2').empty();
  }
	  });
	$('.js_select2').select2();
	$('a[data-modal]').click(function(event) {
		$(this).modal();
		return false;
	});
});
</script>

</body>
</html>

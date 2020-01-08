
<!DOCTYPE html>
<?php

$priority=['最高','高','中','低'];
$genreArray=[];
foreach($genre as $item ){
	$genreArray[$item->id]=$item->name;
}
$groupA=[];
foreach($group as $item ){
		array_unshift($groupA,$item->name);
}


$statusArray=[''];

foreach($status as $item ){
	array_push($statusArray,$item->name);
}
$status_commentArray=[''];

foreach($StatusComment as $item ){
	array_push($status_commentArray,$item->name);
}
$param = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

 ?>


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
		<h2>テレマ検索結果</h2>
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

<div id="wrapper" class="tm tm-result">
	<main>

<!-- 検索結果＠該当なし -->
<?php
$this->load->helper('url');
if(count($table)==0){

?>
<?php $this->load->helper('form');

	 echo form_open('MyList/post');

?>
<div class="search-condition-wrap formset">
	<h2>検索条件</h2>
	<div class="search-condition">
		<dl class="search-condition-list search-condition-list--3column">
			<dt>優先順位</dt>
			<dd>
				<select id="priority" name="priority">
					<option value="non"
					<?php
					if( isset($_SESSION['priority'])) {
						 if($_SESSION['priority']==='non') {
								 echo "selected";
						 }
					 }
					 ?>
					>すべて</option>
						<option value="0" <?php
						if( isset($_SESSION['priority'])) {
							 if($_SESSION['priority']==='0') {
									 echo "selected";
							 }
						 }
						 ?>
						>超高</option>
						<option value="1" <?php
						if( isset($_SESSION['priority'])) {
							 if($_SESSION['priority']==='1') {
									 echo "selected";
							 }
						 }
						 ?>
						>高</option>
						<option value="2" <?php
						if( isset($_SESSION['priority'])) {
							 if($_SESSION['priority']==='2') {
									 echo "selected";
							 }
						 }
						 ?>
						>中</option>
						<option value="3" <?php
						if( isset($_SESSION['priority'])) {
							 if($_SESSION['priority']==='3') {
									 echo "selected";
							 }
						 }
						 ?>
						>低</option>
					</select>
			</dd>
		</dl>

		<dl class="search-condition-list search-condition-list--3column">
				<dt>RTG担当者</dt>
				<dd>
					<select name="staff_id" class="js_select2" id="staffSelect2"></select>
				</dd>
			</dl>
			<dl class="search-condition-list search-condition-list--3column">
					<dt>テレマ担当者</dt>
					<dd>
						<select name="staff_id2" class="js_select3" id="staffSelect3"></select>
					</dd>
				</dl>
			<dl class="search-condition-list search-condition-list--3column">
			<dt>ジャンル</dt>
			<dd>
				<select name="genre">
					<option value="non" <?php
					if( isset($_SESSION['genre'])) {
						 if($_SESSION['genre']=='non') {
								 echo "selected";
						 }
					 }
					 ?>>すべて</option>
				<?php
				foreach($genre as $item ){
					if( isset($_SESSION['genre'])) {
						 if($_SESSION['genre']==$item->id) {
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
			<dt>ステータス</dt>
			<dd>
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
			</dd>
		</dl>

		<dl class="search-condition-list search-condition-list--3column">
			<dt>ステータスコメント</dt>
			<dd>
				<select id="status_comment" name="status_comment">

					<option value="non"> すべて </option>
					<option value="15"> 未架電　</option>
				<?php
				foreach($StatusComment as $item ){
					if($item->id!="15"){
						echo "<option value=".$item->id." > ".$item->name."</option>";
					}



				}
				 ?>
				</select>
			</dd>
		</dl>

		<dl class="search-condition-list search-condition-list--3column">
		<dt>チームリスト</dt>
		<dd>
			<select id="teamCount" name="teamCount">
				<option value="non"> すべて </option>
			<?php
			foreach($group as $item ){
				if( isset($_SESSION['teamCount'])) {
					 if($_SESSION['teamCount']==$item->id) {
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


	<dl class="search-condition-list">
			<dt>キーワード</dt>
			<dd><input type="text" class="input" name="keywords" value="<?php if(isset($_SESSION['keywords'])){echo $_SESSION['keywords'];} ?>"></dd>
		</dl>


	</div>
		</div>
		<div class="submit-set submit-set--center">
			<button type="submit" class="button-color--red">絞り込み</a>
		</div>
</form>

<div class="search-condition-wrap">
	<h2>検索条件</h2>
	<div class="search-condition">
		<?php


				echo '<dl class="search-condition-list">
						<dt>すべてのテレマ履歴</dt>
						<dd></dd>
					</dl>';
		 ?>
	</div>
		</div>

		<dl class="search-number search-number--0">
			<dt>該当件数</dt>
			<dd><p>0</p><span>件</span></dd>
		</dl>

		<div class="submit-set submit-set--center submit-set--bottom">
			<a href="<?php    echo base_url(); ?>TMRegi" class="button-color--blue">新規登録</a>

		</div>

<!-- 検索結果＠該当あり -->
<?php
}
else{
$this->load->helper('url');

?>
<?php $this->load->helper('form');

	 echo form_open('MyList/post');

?>
<div class="search-condition-wrap formset">
	<h2>検索条件</h2>
	<div class="search-condition">
		<dl class="search-condition-list search-condition-list--3column">
			<dt>優先順位</dt>
			<dd>
				<select id="priority" name="priority">
					<option value="non"
					<?php
					if( isset($_SESSION['priority'])) {
						 if($_SESSION['priority']==='non') {
								 echo "selected";
						 }
					 }
					 ?>
					>すべて</option>
						<option value="0" <?php
						if( isset($_SESSION['priority'])) {
							 if($_SESSION['priority']==='0') {
									 echo "selected";
							 }
						 }
						 ?>
						>超高</option>
						<option value="1" <?php
						if( isset($_SESSION['priority'])) {
							 if($_SESSION['priority']==='1') {
									 echo "selected";
							 }
						 }
						 ?>
						>高</option>
						<option value="2" <?php
						if( isset($_SESSION['priority'])) {
							 if($_SESSION['priority']==='2') {
									 echo "selected";
							 }
						 }
						 ?>
						>中</option>
						<option value="3" <?php
						if( isset($_SESSION['priority'])) {
							 if($_SESSION['priority']==='3') {
									 echo "selected";
							 }
						 }
						 ?>
						>低</option>
					</select>
			</dd>
		</dl>

		<dl class="search-condition-list search-condition-list--3column">
				<dt>RTG担当者</dt>
				<dd>
					<select name="staff_id" class="js_select2" id="staffSelect2"></select>
				</dd>
			</dl>
			<dl class="search-condition-list search-condition-list--3column">
					<dt>テレマ担当者</dt>
					<dd>
						<select name="staff_id2" class="js_select3" id="staffSelect3"></select>
					</dd>
				</dl>
			<dl class="search-condition-list search-condition-list--3column">
			<dt>ジャンル</dt>
			<dd>
				<select name="genre">
					<option value="non" <?php
					if( isset($_SESSION['genre'])) {
						 if($_SESSION['genre']=='non') {
								 echo "selected";
						 }
					 }
					 ?>>すべて</option>
				<?php
				foreach($genre as $item ){
					if( isset($_SESSION['genre'])) {
						 if($_SESSION['genre']==$item->id) {
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
			<dt>ステータス</dt>
			<dd>
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
			</dd>
		</dl>

		<dl class="search-condition-list search-condition-list--3column">
			<dt>ステータスコメント</dt>
			<dd>
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
			</dd>
		</dl>

		<dl class="search-condition-list search-condition-list--3column">
		<dt>チームリスト</dt>
		<dd>
			<select id="teamCount" name="teamCount">
				<option value="non"> すべて </option>
			<?php
			foreach($group as $item ){
				if( isset($_SESSION['teamCount'])) {
					 if($_SESSION['teamCount']==$item->id) {
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


	<dl class="search-condition-list">
			<dt>キーワード</dt>
			<dd><input type="text" class="input" name="keywords" value="<?php if(isset($_SESSION['keywords'])){echo $_SESSION['keywords'];} ?>"></dd>
		</dl>


	</div>
		</div>
		<div class="submit-set submit-set--center">
			<button type="submit" class="button-color--red">絞り込み</a>
		</div>
</form>

		<dl class="search-number">
			<dt>該当件数</dt>
			<dd><p><?=$totalRows?></p><span>件</span></dd>
		</dl>

		<ul class="pagination">
	<?php echo $pagination?>
		</ul>

		<div class="search-record-wrap">
			<table>

			<td>
				<select id="sortBox">

						<option>
							--並び替え--
						</option>
						<option value="1" <?php
						 if( isset($_SESSION['sorting'])) {
							  if($_SESSION['sorting']=='timerAsc') {
										echo "selected";
								}
							}
								 ?> >
							次回連絡予定日(昇順)
						</option>
						<option value="2" <?php
						 if( isset($_SESSION['sorting'])) {
							  if($_SESSION['sorting']=='timerDesc') {
										echo "selected";
								}
							}
								 ?>>
							次回連絡予定日(降順)
						</option>

						<option value="3" <?php
						 if( isset($_SESSION['sorting'])) {
								if($_SESSION['sorting']=='contact_dateAsc') {
										echo "selected";
								}
							}
								 ?>>
							最新連絡日(昇順)
						</option>

						<option value="4" <?php
						 if( isset($_SESSION['sorting'])) {
								if($_SESSION['sorting']=='contact_dateDesc') {
										echo "selected";
								}
							}
								 ?>>
							最新連絡日(降順)
						</option>

				</select>
		</td>
		</tr>
	</table>


			<!-- block -->


			<!-- block -->

			<!-- block -->
			  <?php foreach($table as $item ) :?>

			<div class="search-record search-record--tmsearch">
				<dl class="search-record-id">
					<dt>ID</dt>
					<dd>    <a href="javascript:submit(<?=$item->id?>);">
					     <?php $this->load->helper('form');

					        echo form_open('TMDetail','id='.$item->id);

					     ?>
							  <input type="hidden" name="pagiNum" value="<?=$param?>">
							  <input type="hidden" name="id" value="<?=$item->id?>">
						<?=$item->id?>
					</form></a></dd>
				</dl>
				<div class="search-record-table">

					<dl class="search-record-table-sub">
						<dt>優先順位</dt>
						<dd><?=$priority[$item->priority]?></dd>
					</dl>
					<dl class="search-record-table-sub">
						<dt>RTG担当</dt>
						<dd><?= $item->staffName ?></dd>
					</dl>
					<dl>
						<dt>会社名</dt>
						<dd><?=$item->name?></dd>
					</dl>
					<dl>
						<dt>案件名</dt>
						<dd><?=$item->service_name?></dd>
					</dl>
					<dl class="search-record-table-sub">
						<dt>ジャンル</dt>
						<dd><?=$genreArray[$item->genre_id]?></dd>
					</dl>
					<dl class="search-record-table-sub">
						<dt>ステータス</dt>
						<dd><?=$statusArray[$item->status+1]?></dd>
					</dl>
					<dl>
						<dt>最新連絡日</dt>
						<dd><?php
								if(empty($item->contact_date)){
									echo 'コンタクト無';
								}
								else{
									echo date("Y-m-d", strtotime($item->contact_date));
								}
						 ?></dd>
					</dl>
					<dl class="search-record-table-sub">
						<dt>連絡経過日数</dt>
						<dd>
							<?php
							if(empty($item->contact)){
					echo "コンタクト無";
							}
							else{

								if(((strtotime(date("Ymd"))-strtotime( date("Ymd", strtotime( $item->contact_date))))  / 86400)==0 ){
									echo '本日連絡済' ;
								}
								else{
									echo ((strtotime(date("Ymd"))-strtotime( date("Ymd", strtotime( $item->contact_date))))  / 86400)."日";
								}


							}



							 ?>
							</dd>
					</dl>
					<dl class="search-record-table-sub">
						<dt>次回連絡タイマー</dt>

						<dd>
							<?php
							if($item->timer==0){
								echo "
								---
								";
							}
							else if($item->timer==-1) {
								echo "連絡予定なし";
							}
							else{
								echo $item->timer."日後";
							}
							 ?>

						</dd>
					</dl>
					<dl>
						<dt>次回連絡予定日</dt>
						<dd><span class="font-color-red">
						<?php
						if(empty($item->contact)){
				echo date("Y-m-d", strtotime( $item->CLcreated."+".$item->timer."day"));
						}
						else{
								echo date("Y-m-d", strtotime( $item->contact_date."+".$item->timer."day"));
						}
						 ?>
						</span></dd>
					</dl>
					<dl class="search-record-table-sub">
						<dt>案件URL</dt>
						<dd><a href="<?=$item->url?>" target="_blank"><?=$item->url?></a></dd>
					</dl>
					<dl class="search-record-table-sub">
						<dt>電話番号</dt>
							<dd onClick="call('<?=$item->tel?>')"><?=$item->tel?></dd>
					</dl>
					<dl class="search-record-table-sub">
						<dt>ステータスコメント</dt>
						<dd><?=$status_commentArray[$item->status_comment+1]?></dd>
					</dl>
					<dl class="search-record-table-sub">
						<dt>最新連絡内容</dt>
						<dd><?php

								if(empty($item->contact)){
									echo 'コンタクト無';
								}
								else{
									if(strlen($item->contact)>16)
									{
									   echo mb_substr($item->contact,0,16)."...";
									}
									else{
									    echo mb_substr($item->contact,0,16);
									}
								}



?> </dd>
					</dl>

					<div class="record-sp-trigger">概要全表示</div>



				</div><!--[/tmsearch-record-table]-->
				  <?php endforeach ?>

			</div>
			<!-- block -->

		</div><!--[/tmsearch-record-wrap]-->

		<ul class="pagination">
<?php echo $pagination?>
		</ul>

		<div class="submit-set submit-set--center">
			<a href="<?php    echo base_url(); ?>TMRegi" class="button-color--blue">新規登録</a>

			<?php
				 if($this->session->status==1){
			 ?>
			<a href="<?php    echo base_url(); ?>TMAll/outputCsv" class="button-color--orange" target="_blank"> リストダウンロード</a>
			<?php
					 }
				?>
		<?php

}
?>
	</main>
	<footer>
	<address><a href="http://rentracks.co.jp/">&copy; Rentracks Co., Ltd. All rights reserved.</a></address>
	</footer>
</div><!--[/wrapper]-->

<!--[jQuery]-->
<script src="<?php    echo base_url(); ?>common/lib/jquery-3.3.1.min.js"></script>
<script src="<?php    echo base_url(); ?>common/lib/site.js"></script>
<script src="<?php    echo base_url(); ?>common/lib/select2.min.js"></script>
<link href="<?php    echo base_url(); ?>common/lib/select2.min.css" rel="stylesheet" media="all">
<script>
<?php
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
function call(number){
  var con=confirm(number+"に電話を掛けますか？");
	if(con==true){
		miitelWidget.call(number);
	}

}

function submit($id){
 $('#'+$id).submit();

}

$( "#sortBox" ).change(function() {
	if($( "#sortBox" ).val()==1){
		window.location.replace("<?=base_url()?>MyList/sorting/timerAsc");
	}
	else if($( "#sortBox" ).val()==2){
		window.location.replace("<?=base_url()?>MyList/sorting/timerDesc");
	}
	else if($( "#sortBox" ).val()==3){
		window.location.replace("<?=base_url()?>MyList/sorting/contact_dateAsc");
	}
	else if($( "#sortBox" ).val()==4){
		window.location.replace("<?=base_url()?>MyList/sorting/contact_dateDesc");
	}
});

$(window).on('load', function (){
	$('.js_select1').select2();
	$('.js_select2').select2();
		$('.js_select3').select2();
	var arr =<?=json_encode($staff)?>;
	$('#staffSelect1').append("<option value='non'>すべて</option>");
	$('#staffSelect2').append("<option value='non'>すべて</option>");
		$('#staffSelect3').append("<option value='non'>すべて</option>");
	arr.forEach(function( value ) {
		<?php
		if(isset($_SESSION['staff_id'])) {
    ?>
      if( "<?=$_SESSION['staff_id']?>" == value['id'] ){

        $('#staffSelect2').append("<option value="+value['id']+" selected>"+value['name']+"</option>");
      }
      else{

        $('#staffSelect2').append("<option value="+value['id']+">"+value['name']+"</option>");
      }


	<?php
    }
    else{
   ?>
   $('#staffSelect1').append("<option value="+value['id']+">"+value['name']+"</option>");
   $('#staffSelect2').append("<option value="+value['id']+">"+value['name']+"</option>");
   <?php
}
    ?>
		<?php
		if(isset($_SESSION['staff_id2'])) {
		?>
			if( "<?=$_SESSION['staff_id2']?>" == value['id'] ){

				$('#staffSelect3').append("<option value="+value['id']+" selected>"+value['name']+"</option>");
			}
			else{

				$('#staffSelect3').append("<option value="+value['id']+">"+value['name']+"</option>");
			}


	<?php
		}
		else{
	 ?>

	 $('#staffSelect3').append("<option value="+value['id']+">"+value['name']+"</option>");
	 <?php
	}
		?>
});

	$('.record-sp-trigger').on('click', function (){
		if ( !$(this).hasClass('record-sp-trigger-active') ) {
			$(this).prevAll('.search-record-table-sub').css('display', 'block');
			$(this).text('抜粋表示');
			$(this).addClass('record-sp-trigger-active');
		} else {
			$(this).prevAll('.search-record-table-sub').css('display', 'none');
			$(this).text('概要全表示');
			$(this).removeClass('record-sp-trigger-active');
		}
	});

});
</script>

</body>
</html>

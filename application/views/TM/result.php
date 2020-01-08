
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

<div class="search-condition-wrap">
	<h2>検索条件</h2>
	<div class="search-condition">
		<?php

			if(isset($this->session->companyName)){
				echo '<dl class="search-condition-list">
						<dt>会社名</dt>
						<dd>'.$this->session->companyName.'</dd>
					</dl>';
			}
			if(isset($this->session->PDSVName)){
				echo '<dl class="search-condition-list">
						<dt>商品サービス名</dt>
						<dd>'.$this->session->PDSVName.'</dd>
					</dl>';
			}

			if(isset($this->session->Phone)){
				echo '<dl class="search-condition-list">
						<dt>電話番号</dt>
						<dd>'.$this->session->Phone.'</dd>
					</dl>';
			}

			if(isset($this->session->domain)){
				echo '<dl class="search-condition-list">
						<dt>LP（ドメイン一致）</dt>
						<dd>'.$this->session->domain.'</dd>
					</dl>';
			}

			if(!isset($this->session->companyName) && !isset($this->session->PDSVName) && !isset($this->session->Phone) && !isset($this->session->domain) && !isset($this->session->teamCount))
				{
					echo '<dl class="search-condition-list">
							<dt>マイリスト</dt>
							<dd>'.$this->session->name.'</dd>
						</dl>';
				}



				if(isset($this->session->teamCount)){
					echo '<dl class="search-condition-list">
							<dt>チームリスト</dt>
							<dd>'.$groupA[$this->session->teamCount-1].'</dd>
						</dl>';
				}

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

<div class="search-condition-wrap">
	<h2>検索条件</h2>
	<div class="search-condition">
		<?php
			if(isset($this->session->companyName)){
				echo '<dl class="search-condition-list">
						<dt>会社名</dt>
						<dd>'.$this->session->companyName.'</dd>
					</dl>';
			}
			if(isset($this->session->PDSVName)){
				echo '<dl class="search-condition-list">
						<dt>商品サービス名</dt>
						<dd>'.$this->session->PDSVName.'</dd>
					</dl>';
			}

			if(isset($this->session->Phone)){
				echo '<dl class="search-condition-list">
						<dt>電話番号</dt>
						<dd>'.$this->session->Phone.'</dd>
					</dl>';
			}

			if(isset($this->session->domain)){
				echo '<dl class="search-condition-list">
						<dt>LP（ドメイン一致）</dt>
						<dd>'.$this->session->domain.'</dd>
					</dl>';
			}
			if(!isset($this->session->companyName) && !isset($this->session->PDSVName) && !isset($this->session->Phone) && !isset($this->session->domain) && !isset($this->session->teamCount))
				{
					echo '<dl class="search-condition-list">
							<dt>マイリスト</dt>
							<dd>'.$this->session->name.'</dd>
						</dl>';
				}



				if(isset($this->session->teamCount)){
					echo '<dl class="search-condition-list">
							<dt>チームリスト</dt>
							<dd>'.$groupA[$this->session->teamCount-1].'</dd>
						</dl>';
				}

		 ?>
	</div>
		</div>

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
					<dt>RTG担当/テレマ担当</dt>
						<?php
							$get;
							for($val=0;$val<count($staff);$val++){
							if($staff[$val]->id == $item->rtg_staff_id){
								$get=$staff[$val]->name;
								// $get=$item->rtg_staff_id; $getはRTG担当の値
								}
							}
							if($item->is_retired=="1"){
								echo "<dd style='color:red'>".$get."/".$item->staffName."</dd>";
							}else{
								echo "<dd>".$get."/".$item->staffName."</dd>";
							}
						?>
						
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
							<dd onClick="miitelWidget.call('<?=$item->tel?>')"><?=$item->tel?></dd>
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
		</div>
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
function submit($id){
 $('#'+$id).submit();

}

$( "#sortBox" ).change(function() {
	if($( "#sortBox" ).val()==1){
		window.location.replace("<?=base_url()?>TMResult/sorting/timerAsc");
	}
	else if($( "#sortBox" ).val()==2){
		window.location.replace("<?=base_url()?>TMResult/sorting/timerDesc");
	}
	else if($( "#sortBox" ).val()==3){
		window.location.replace("<?=base_url()?>TMResult/sorting/contact_dateAsc");
	}
	else if($( "#sortBox" ).val()==4){
		window.location.replace("<?=base_url()?>TMResult/sorting/contact_dateDesc");
	}
});

$(window).on('load', function (){
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

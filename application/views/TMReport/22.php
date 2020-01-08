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

	<div id="wrapper" class="menu">
		<main>


	  		<div class="menu-board-wrap">
	  			<h2>レポート</h2>
	  			<div class="menu-board">
	          <a class="button-color--blue" id="rookie" >新卒レポート</a>
	  				<!-- <a class="button-color--blue" href="">あああああ</a> -->
	  			</div>
	  		</div>






		</main>
		<footer>
			<address><a href="http://rentracks.co.jp/">&copy; Rentracks Co., Ltd. All rights reserved.</a></address>
		</footer>
	</div>


</div>



</form>



<!--[jQuery]-->
<script src="<?php    echo base_url(); ?>common/lib/jquery-3.3.1.min.js"></script>
<script src="<?php    echo base_url(); ?>common/lib/select2.min.js"></script>
<link href="<?php    echo base_url(); ?>common/lib/select2.min.css" rel="stylesheet" media="all">
<script src="<?php    echo base_url(); ?>common/lib/jquery.modal.min.js"></script>
<link href="<?php    echo base_url(); ?>common/lib/jquery.modal.css" rel="stylesheet" media="all">
<script src="<?php    echo base_url(); ?>common/lib/site.js"></script>


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>


<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script>
$("#rookie").click(function() {
		window.location.replace("<?=base_url()?>TMReport/rookie");
});






</script>

</body>
</html>

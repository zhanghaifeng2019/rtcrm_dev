<!DOCTYPE html>

<body id="pagetop">

<header>
	<div class="header-main">
		<h1><a href="./"><div><em><img src="<?php    echo base_url(); ?>common/img/header_logo.svg" width="100" height="11"></em><span>customer database</span></div></a></h1>
		<ul>
			<li><a href="<?php echo base_url(); ?>Main">メイン</a></li>
			<li><a href="<?php echo base_url(); ?>TM">テレマ</a></li>
		  	<li><a href="<?php echo base_url(); ?>TMRegi">テレマ登録</a></li>
			<li class="current"><a href="<?php echo base_url(); ?>Agency">代理店</a></li>
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
		<h2>代理店関連</h2>
	</div>
</header>

<div id="wrapper" class="menu">
	<main>
  		<div class="menu-board-wrap">
  			<h2>代理店</h2>
  			<div class="menu-board">
  				<a class="button-color--blue" href="<?php echo base_url();?>Agency/registration">代理店新規登録</a>
                <a class="button-color--red" href="<?php echo base_url();?>Agency/list">代理店一覧</a>
            </div>
  		</div>
	</main>
	<footer>
		<address><a href="http://rentracks.co.jp/">&copy; Rentracks Co., Ltd. All rights reserved.</a></address>
	</footer>
</div>


<!--[jQuery]-->
<script src="<?php    echo base_url(); ?>common/lib/jquery-3.3.1.min.js"></script>
<script src="<?php    echo base_url(); ?>common/lib/site.js"></script>
<script>
$(window).on('load resize', function (){
	//reset
	$('main').removeAttr('style');
	if ( $(window).width() <= 768 ) {
		if ( $(window).innerHeight() > ( $('main').height() + 90 ) ) {
			$('main').height( $(window).innerHeight() - $('header').height() - $('footer').height() );
		}
	}
});
</script>
</body>
</html>

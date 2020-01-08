<?php


 ?>
<!DOCTYPE html>

<body id="pagetop">

<header>
	<div class="header-main">
		<h1><a href="./"><div><em><img src="<?php    echo base_url(); ?>common/img/header_logo.svg" width="100" height="11"></em><span>customer database</span></div></a></h1>
		<ul>
			<li ><a href="<?php    echo base_url(); ?>Main">メイン</a></li>
			<li class="current"><a href="<?php    echo base_url(); ?>TM">テレマ</a></li>
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
		<h2>新規リスト作成</h2>
		<!--
		<ul>
			<li class="current"><span>あああ</span></li>
			<li><a class="button-color--blue" href="">ああああああああ</a></li>
			<li><span>媒体様（準備中）</span></li>
		</ul>
		<div class="title-sp-menu-trigger"><div class="title-sp-trigger"><span></span></div></div>
		-->
	</div>
</header>
<div id="wrapper" class="tm tm-search search">
	<main>

		<div class="search-board formset">
			<h2>新規リスト作成</h2>

          <?php
          $this->load->helper('form');
          echo validation_errors();
          echo form_open('TM/post','id="myform"');
          ?>

				<div class="search-board-field">
					<label>会社名</label>
					<div class="search-board-field-input">
						<input class="input" type="text" name="companyName" placeholder="会社名" required>
					</div>
				</div>

				<div class="search-board-field">
					<label>商品サービス名</label>
					<div class="search-board-field-input">
						<input class="input" type="text" name="PDSVName" placeholder="商品サービス名">
					</div>
				</div>

				<div class="search-board-field">
					<label>電話番号</label>
					<div class="search-board-field-input">
						<input class="input" type="tel" name="Phone" placeholder="電話番号">
					</div>
				</div>

				<div class="search-board-field">
					<label>LP（ドメイン一致）</label>
					<div class="search-board-field-input">
						<input class="input" type="text" name="domain" placeholder="LP（ドメイン一致）">
					</div>
				</div>

				<div class="submit-set submit-set--center">
					<div><input type="submit" value="検索" class="button-color--green"></div>
				</div>


			</form>
		</div>

	</main>
	<footer>
		<address><a href="./">&copy; Rentracks Co., Ltd. All rights reserved.</a></address>
	</footer>
</div><!--[/wrapper]-->





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

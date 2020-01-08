<!DOCTYPE html>
<html xml:lang="ja" lang="ja">

<header>
	<div class="header-main">
		<h1><a href="<?php  echo base_url();?>"><div><em><img src="<?php    echo base_url(); ?>common/img/header_logo.svg" width="100" height="11"></em><span>customer database</span></div></a></h1>
		<!--
		<ul>
			<li class="current"><a href="./TM_search.html">テレマ検索</a></li>
			<li><a href="./TM_search.html">テレマ検索</a></li>
		</ul>
		<div class="header-user">
			<div class="header-user-name"><p>金子英司金子英司金子英司金子英司金子英司金子英司</p></div>
			<div class="header-user-menu">
				<a href="./login.html">Log out</a>
				<a href="./">その他のユーザーメニュー</a>
				<div class="header-user-menu-close">CLOSE</div>
			</div>
		</div>
		<div class="header-sp-menu-trigger"><div class="header-sp-trigger"><span></span></div></div>
	</div>
	<div class="title-bar">
		<h2>広告主様ダッシュボード</h2>
		<ul>
			<li><a class="button-color--blue" href="TM_search.html">検索</a></li>
			<li class="current"><a href="TM_search.html">検索</a></li>
		</ul>
		<div class="title-sp-menu-trigger"><div class="title-sp-trigger"><span></span></div></div>
	</div>
	-->
</header>

<div id="wrapper" class="login">
	<main>

		<div class="flip-board">
			<div class="flip-board-front">
				<h2>Log in</h2><br>
				<center><h4><?php
							if(isset($text)){
								echo $text;
							}
				 			?>			</h4></center>
				<?php
				$this->load->helper('form');
				echo validation_errors();
				echo form_open('Auth','id="myform"');
				?>
					<div class="flip-board-input">
						<input type="text"  name="mail" required>
						<span>Mail address</span>
					</div>
					<div class="flip-board-input">
						<input type="password" name="pass" required>
						<span>Password</span>
					</div>
					<div class="flip-submit-set">
						<input type="submit" value="Log in" class="button-color--green">
					</div>
					<div class="flip-board-link"><a onclick="flipboard_ON();">パスワードをお忘れの方、もしくはパスワード変更はこちら</a></div>
				</form>
			</div>
			<div class="flip-board-back">
				<h2>パスワード再設定</h2>
				<form action="https://rtcrm.net/Auth/emailCheck" method="post">
					<div class="flip-board-input">
						<input type="email" name="emailCheck" required>
						<span>Mail address</span>
					</div>
					<div class="flip-submit-set">
						<div class="flip-submit-cancel button-color--white" onclick="flipboard_OFF();">Cancel</div>
						<input type="submit" value="Send" class="button-color--green">
					</div>
					<div class="flip-board-link">レントラックスのメールアドレスを入力してください。</div>
				</form>
			</div>
		</div>

	</main>
	<footer>
	<address><a href="http://rentracks.co.jp/">&copy; Rentracks Co., Ltd. All rights reserved.</a></address>
	</footer>
</div><!--[/wrapper]-->


<!--[jQuery]-->
<script src="<?php    echo base_url(); ?>common/lib/jquery-3.3.1.min.js"></script>
<script src="<?php    echo base_url(); ?>common/lib/site.js"></script>
<script>
function flipboard_ON () {
	$('.flip-board-front').fadeOut();
	$('.flip-board').addClass('flip-board--active');
}
function flipboard_OFF () {
	$('.flip-board').removeClass('flip-board--active');
	$('.flip-board-front').fadeIn();
}
$(window).on('load', function (){
	//reset
	$('.flip-board').removeAttr('style');
	$('.flip-board').height( $('.flip-board-front').height() );
	$('main').removeAttr('style');
	$('main').height( $(window).innerHeight() - $('header').height() - $('footer').height() );

	$('.flip-board-input input').each(function() {
		if ( $(this).val() != '' ) {
			$(this).closest('.flip-board-input').addClass('flip-board-input--focus');
		}
	});

	$('.flip-board-input input').on('click change focus', function (){
		$(this).closest('.flip-board-input').addClass('flip-board-input--focus');
	});
	$('.flip-board-input input').on('blur', function (){
		if ( $(this).val() == '' ) {
			$(this).closest('.flip-board-input').removeClass('flip-board-input--focus');
		}
	});
	$('.flip-board-input span').on('click', function (){
		$(this).prev('input').focus();
		$(this).closest('.flip-board-input').addClass('flip-board-input--focus');
	});
});
$(window).on('resize', function (){
	$('.flip-board').removeAttr('style');
	$('.flip-board').height( $('.flip-board-front').height() );
	$('main').removeAttr('style');
	$('main').height( $(window).innerHeight() - $('header').height() - $('footer').height() );
});
</script>
</body>
</html>

<!DOCTYPE html>
<html xml:lang="ja" lang="ja">


<body id="pagetop">

<header>
	<div class="header-main">
		<h1><a href="<?php    echo base_url();?>"><div><em><img src="<?php    echo base_url();?>common/img/header_logo.svg" width="100" height="11"></em><span>customer database</span></div></a></h1>
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
				<h2>Create new password</h2>
				<?php $this->load->helper('form');

				   echo form_open('Auth/updatePass' ,'id="update"');

				?>
					<div class="flip-board-input">
						<input type="hidden" name="staffId" value="<?=$info->staff_id?>" >

						<input type="password" name="password" id="p1" required>
						<span>New password</span>
					</div>
					<div class="flip-board-input">
						<input type="password" name="password2" id="p2" required>
						<span>*check new password</span>
					</div>
					<div class="flip-submit-set">
						<input type="button" value="Create" onclick="sub()" class="button-color--green">
					</div>
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
function sub(){
	if($('#p1').val()==''){
		alert('パスワードを入力してください');
	}
	else if($('#p2').val()==''){
		alert('パスワードを入力してください');
	}
	else{
		if($('#p1').val()!=$('#p2').val() ){
					alert('パスワード一が致しません。');
			}
			else{
					$('#update').submit();
			}
	}




}
$(window).on('load', function (){
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
	$('main').removeAttr('style');
	$('main').height( $(window).innerHeight() - $('header').height() - $('footer').height() );
});
</script>
</body>
</html>

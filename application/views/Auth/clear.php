<!DOCTYPE html>
<html xml:lang="ja" lang="ja">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>顧客データベース | Rentracks Customer Database</title>
<meta name="robots" content="noindex, nofollow">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover">

<link href="./css/normalize.min.css" rel="stylesheet" media="all">
<link href="./css/common.css" rel="stylesheet" media="all">

<!--[favicon]-->

<link rel="apple-touch-icon" sizes="512x512" href="./favicon/512.png">
<link rel="apple-touch-icon" sizes="152x152" href="./favicon/152.png">
<link rel="apple-touch-icon" sizes="120x120" href="./favicon/120.png">
<link rel="apple-touch-icon" sizes="72x72" href="./favicon/72.png">
<link rel="apple-touch-icon" sizes="32x32" href="./favicon/32.png">
<link rel="icon" href="./favicon.ico">

</head>
<body id="pagetop">

<header>
	<div class="header-main">
		<h1><a href="<?php echo base_url();?>"><div><em><img src="<?php    echo base_url();?>common/img/header_logo.svg" width="100" height="11"></em><span>customer database</span></div></a></h1>
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
      	<h2>パスワードの変更が完了されました。</h2>

        <form action="login.html">
          <div class="flip-board-input">

          </div>
          <div class="flip-board-input">

          </div>
          <div class="flip-submit-set">
            <a href="<?php    echo base_url();?>"><input type="button" value="戻る" class="button-color--green"></a>
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

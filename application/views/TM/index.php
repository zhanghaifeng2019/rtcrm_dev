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
		<h2>テレマ検索</h2>
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

<div id="wrapper" class="menu">
	<main>


  		<div class="menu-board-wrap">
  			<h2>テレマ</h2>
  			<div class="menu-board">
  				<a class="button-color--blue" href="<?php echo base_url('TMSearch');?>" >新規リスト作成</a>
          <a class="button-color--red" href="<?php echo base_url('TMAll');?>" >案件一覧</a>
          <a class="button-color--orange" id="mylist" >マイリスト</a>
          <a class="button-color--yellow" id="myteam" >チームリスト</a>
          <a class="button-color--green" id="report" >レポート</a>
  				<!-- <a class="button-color--blue" href="">あああああ</a> -->
  			</div>
  		</div>


		<!-- <div class="search-board formset">
			<h2>テレマ検索</h2>


				<div class="search-board-field">
					<label>会社名</label>
					<div class="search-board-field-input">
						<input class="input" type="text" name="companyName" placeholder="会社名">
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
      <div><input type="button" id="sbm" value="検索" class="button-color--green"></div>
        </div>

				<div class="submit-set submit-set--center">
          <div><input type="button" id="mylist" value="MYLIST" class="button-color--orange"></div>
          <div><input type="button" id="myteam" value="MYTEAM" class="button-color--red"></div>
				</div>

			</form>
		</div> -->

	</main>
	<footer>
		<address><a href="http://rentracks.co.jp/">&copy; Rentracks Co., Ltd. All rights reserved.</a></address>
	</footer>
</div><!--[/wrapper]-->

<!--[jQuery]-->
<script src="<?php    echo base_url(); ?>common/lib/jquery-3.3.1.min.js"></script>
<script src="<?php    echo base_url(); ?>common/lib/site.js"></script>
<script>
$(document).ready(function(){


  $("#report").click(function() {
      window.location.replace("<?=base_url()?>TM/Report");
  });
  $("#myteam").click(function() {
      window.location.replace("<?=base_url()?>TM/TeamList");
  });
  $("#mylist").click(function() {
      window.location.replace("<?=base_url()?>TM/MyList");  //TMAll
      
  });

	$("#sbm").click(function() {
		var count=0;
		if($("input[name=companyName]").val().length!=0){
			count++;
		}

		if($("input[name=Phone]").val().length!=0){
			count++;
		}
		if($("input[name=domain]").val().length!=0){
			count++;
		}

	 if($("input[name=PDSVName]").val().length!=0){
			count++;
		}


	 if(count>=1){
		$( "#myform" ).submit();
	 }
	 else{
		 alert('どれかひとつ入力してください')
	 }


});


});
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

<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' integrity='sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T' crossorigin='anonymous'> 

<body id="pagetop">

<header>
	<div class="header-main"  style="height:60px">
		<h1><a href="./"><div><em><img src="<?php    echo base_url(); ?>common/img/header_logo.svg" width="100" height="11"></em><span>customer database</span></div></a></h1>
		<ul>
			<li><a href="<?php echo base_url(); ?>Main">メイン</a></li>
			<li><a href="<?php echo base_url(); ?>TM">テレマ</a></li>
		  	<li><a href="<?php echo base_url(); ?>TMRegi">テレマ登録</a></li>
			<li class="current"><a href="<?php echo base_url(); ?>Agency">代理店</a></li>
		</ul>
		<div class="header-user">
			<div class="header-user-name"><p style="margin-top: 15px"><?=$this->session->name?></p></div>
			<div class="header-user-menu">
				<a href="<?php echo base_url(); ?>Auth/logout">Log out</a>
				<!-- <a href="./">その他のユーザーメニュー</a> -->
				<div class="header-user-menu-close">CLOSE</div>
			</div>
		</div>
		<div class="header-sp-menu-trigger"><div class="header-sp-trigger"><span></span></div></div>
	</div>
	<div class="title-bar">
		<h2>代理店一覧</h2>
	</div>
</header>

<!--bootstrapで余白を作るのはまだわかりません-->
<br><br><br><br><br>

<div class="table-responsive-sm">
    <table class="table table-bordered table-hover">
        <thead class="thead-light">
            <tr>
                <th scope="col">No</th>
                <th scope="col">代理店様名</th>
                <th scope="col">担当者様名</th>
                <th scope="col">電話番号</th>
                <th scope="col">メール</th>
                <th scope="col">郵便番号</th>
                <th scope="col">住所</th>
                <th scope="col">編集</th>
            </tr>
        </thead>

        <?php
            if(count($records)>0){
                foreach($records as $row){
        ?>
            <tbody>
                <tr>
                    <th scope="row"><?php echo $row->id;?></th>
                    <td ><?php echo $row->agency_name;?></td>
                    <td ><?php echo $row->person_in_charge;?></td>
                    <td ><?php echo $row->tel;?></td>
                    <td ><?php echo $row->email;?></td>
                    <td ><?php echo $row->zip;?></td>
                    <td ><?php echo $row->address;?></td>
                    <td >
                        <a href="<?php echo base_url();?>Agency/show_data/<?php echo $row->id;?>">
                            <button type="button" class="btn btn-info">編集</button>
                        </a>
                    </td>
                </tr>
            </tbody>
        <?php
                }
            }else{
        ?>
                <tr>
                    <td colsapn='3'>no data found </td>
                </tr>
        <?php
            }
        ?>
    </table>
</div>

<div>
    <ul class="pagination">
	    <?php echo $pagination?>
    </ul>
</div>

<div class="submit-set submit-set--center">

    <div><a href="<?php echo base_url()?>Agency/registration" class="button-color--blue">新規登録</a></div>
    <div><a href="<?php echo base_url()?>Agency" class="button-color--gray">戻る</a></div>
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




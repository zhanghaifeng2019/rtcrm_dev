<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' integrity='sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T' crossorigin='anonymous'> 

<body id="pagetop">

<header>
	<div class="header-main"  style="height:60px">
		<h1><a href="./"><div><em><img src="<?php    echo base_url(); ?>common/img/header_logo.svg" width="100" height="11"></em><span>customer database</span></div></a></h1>
		<ul>
			<li><a href="<?php echo base_url(); ?>Main">メイン</a></li>
			<li class="current"><a href="<?php echo base_url(); ?>TM">テレマ</a></li>
		  	<li><a href="<?php echo base_url(); ?>TMRegi">テレマ登録</a></li>
			<li><a href="<?php echo base_url(); ?>Agency">代理店</a></li>
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
		<h2>データ詳細</h2>
	</div>
</header>
    <br><br><br><br><br>
    <div class="table-responsive-sm">
    <table class="table table-bordered table-hover">
        <thead class="thead-light">
            <tr>
                <th scope="col">No</th>
                <th scope="col">会社名</th>
                <th scope="col">サービス名</th>
                <?php
                    if($this->uri->segment(4)==11){
                        echo '<th scope="col">リストアップ時間</th>';
                    }else if($this->uri->segment(4)==0){
                        echo '<th scope="col">コール時間</th>';
                    }else if($this->uri->segment(4)==2){
                        echo '<th scope="col">アポ取得時間</th>';
                    }else if($this->uri->segment(4)==3){
                        echo '<th scope="col">受注時間</th>';
                    }else if($this->uri->segment(4)==12){
                        echo '<th scope="col">電クロ時間</th>';
                    }
                ?>
            </tr>
        </thead>
        <?php
            if(count($records)>0){
                foreach($records as $key=>$row){
        ?>
            <tbody>
                <tr>
                    <th scope="row"><?php echo $key+1;?></th>
                    <td ><?php echo $row->company_name;?></td>
                    <td ><?php echo $row->service_name;?></td>
                    <td ><?php echo $row->created;?></td>
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
    <div><a href="<?php echo base_url()?>TMReport" class="button-color--gray">戻る</a></div>
</div>
    
    <!--[jQuery]-->
    <script src="<?php    echo base_url(); ?>common/lib/jquery-3.3.1.min.js"></script>
    <script src="<?php    echo base_url(); ?>common/lib/site.js"></script>
    <script>
        $(window).on('load resize', function (){
            $('main').removeAttr('style');
            if ( $(window).width() <= 768 ) {
                if ( $(window).innerHeight() > ( $('main').height() + 90 ) ) {
                    $('main').height( $(window).innerHeight() - $('header').height() - $('footer').height() );
                }
            }
        });
    </script>
</body>
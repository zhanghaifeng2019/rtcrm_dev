

<body id="pagetop">
    <header>
        <div class="header-main">
            <h1><a href="./"><div><em><img src="<?php    echo base_url(); ?>common/img/header_logo.svg" width="100" height="11"></em><span>customer database</span></div></a></h1>
            <ul>
                <li><a href="<?php echo base_url(); ?>Main">メイン</a></li>
                <li><a href="<?php echo base_url(); ?>TM">テレマ</a></li>
                <li><a href="<?php echo base_url(); ?>TMRegi">テレマ登録</a></li>
                <li  class="current"><a href="<?php echo base_url(); ?>Agency">代理店</a></li>
            </ul>
            <div class="header-user">
                <div class="header-user-name"><p><?=$this->session->name?></p></div>
                <div class="header-user-menu">
                    <a href="<?php echo base_url(); ?>Auth/logout">Log out</a>
                    <div class="header-user-menu-close">CLOSE</div>
                </div>
            </div>
            <div class="header-sp-menu-trigger"><div class="header-sp-trigger"><span></span></div></div>
        </div>

        <div class="title-bar">
                <h2>代理店の編集</h2>
        </div>
    </header>
        <?php
            if(isset($agency_data)){
                foreach($agency_data->result() as $row){
        ?>

        <div id="wrapper" class="tm tm-search search">
            <main>
                <div class="search-board formset">
                    <h2>代理店の編集</h2>
                        <form method="post" action="<?php echo base_url();?>Agency/update">
                            <div class="search-board-field">
                                <label>代理店様名</label>
                                <div class="search-board-field-input">
                                    <input class="input" type="text" name="agency_name" value="<?php echo $row->agency_name;?>" style="background-color:#F7D358" required>
                                </div>
                            </div>

                            <div class="search-board-field">
                                <label>担当者様名</label>
                                <div class="search-board-field-input">
                                    <input class="input" type="text" name="person_in_charge" value="<?php echo $row->person_in_charge;?>">
                                </div>
                            </div>

                            <div class="search-board-field">
                                <label>電話番号</label>
                                <div class="search-board-field-input">
                                    <input class="input" type="tel" name="tel" value="<?php echo $row->tel;?>" style="background-color:#F7D358" required>
                                </div>
                            </div>

                            <div class="search-board-field">
                                <label>メール</label>
                                <div class="search-board-field-input">
                                    <input class="input" type="text" name="email" value="<?php echo $row->email;?>">
                                </div>
                            </div>

                            <div class="search-board-field">
                                <label>郵便番号</label>
                                <div class="search-board-field-input">
                                    <input class="input" type="text" name="zip" value="<?php echo $row->zip;?>">
                                </div>
                            </div>

                            <div class="search-board-field">
                                <label>住所</label>
                                <div class="search-board-field-input">
                                    <input class="input" type="text" name="address" value="<?php echo $row->address;?>">
                                </div>
                            </div>

                            <div class="submit-set submit-set--center">
                                <div><input type="submit" value="更新" name="update" class="button-color--blue"></div>
                                <div><a href="<?php echo base_url()?>Agency/list" class="button-color--gray">戻る</a></div>
                                <!-- 行のIDをcontrollerのupdateメソッドに渡す -->
                                <!-- 作る時間をcontrollerのupdateメソッドに渡す -->
                                <input type="hidden" name="hidden_id" value="<?php echo $row->id;?>">
                                <input type="hidden" name="created_time" value="<?php echo $row->created;?>">
                            </div>
                        </form>
                </div>

            <?php
                    }
                }else{
                    echo "no data";
                }
            ?>
        </main>
        <footer>
            <address><a href="./">&copy; Rentracks Co., Ltd. All rights reserved.</a></address>
        </footer>
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
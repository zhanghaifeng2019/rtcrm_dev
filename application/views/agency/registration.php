

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
                <h2>代理店の登録</h2>
        </div>
    </header>
    
    <div id="wrapper" class="tm tm-search search">
        <main>
            <div class="search-board formset">
                <h2>代理店登録</h2>
                <form method="post" action="<?php echo base_url();?>Agency/insert">
                    <div class="search-board-field">
                        <label>代理店様名</label>
                        <div class="search-board-field-input">
                            <input class="input" type="text" name="agency_name" placeholder="例）株式会社トチウール" style="background-color:#F7D358" required>
                        </div>
                    </div>

                    <div class="search-board-field">
                        <label>担当者様名</label>
                        <div class="search-board-field-input">
                            <input class="input" type="text" name="person_in_charge" placeholder="例）田中太郎">
                        </div>
                    </div>

                    <div class="search-board-field">
                        <label>電話番号</label>
                        <div class="search-board-field-input">
                            <input class="input" type="tel" name="tel" placeholder="例）090-1234-5678" style="background-color:#F7D358" required>
                        </div>
                    </div>

                    <div class="search-board-field">
                        <label>メール</label>
                        <div class="search-board-field-input">
                            <input class="input" type="text" name="email" placeholder="例)info@rentracks.jp">
                        </div>
                    </div>
                    <div class="search-board-field">
                        <label>郵便番号</label>
                        <div class="search-board-field-input">
                            <input class="input" type="text" name="zip" placeholder="例)123-4567">
                        </div>
                    </div>
                    <div class="search-board-field">
                        <label>住所</label>
                        <div class="search-board-field-input">
                            <input class="input" type="text" name="address" placeholder="例)東京都江戸川区⻄葛⻄1-2-3">
                        </div>
                    </div>

                    <div class="submit-set submit-set--center">
                        <div><input type="submit" value="登録" name="insert" class="button-color--blue"></div>
                        <div><a href="<?php echo base_url()?>Agency" class="button-color--gray">戻る</a></div>
                    </div>
                </form>
            </div>
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
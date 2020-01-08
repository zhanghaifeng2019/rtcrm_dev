<script src="<?php    echo base_url(); ?>common/lib/jquery-3.3.1.min.js"></script>
<script async src="https://api.miitel.jp/static/widget/v1.js"></script>
<script>
window.miitelWidget = window.miitelWidget || function(k, v){ miitelWidget.conf = miitelWidget.conf || {}; miitelWidget.conf[k] = v; }
miitelWidget("company_id", "rentracks");
miitelWidget("access_key", "3748ee21-4f99-4aab-aebd-59aaa5046cc4");
miitelWidget("color", "black");
function displayPhoneNumber(e){
      alert(e.phoneNumber + "様から着信です")
}
miitelWidget("onReceiveCall", displayPhoneNumber)
</script>
<script>
$( document ).ready(function() {

  		 $("#miitelPhoneIFrameOuter").css('margin-top', "10px");
  		 $("#miitelPhoneIFrameButton").css('margin-top', "10px");
       $("#miitelPhoneIframe").css('margin-top', "10px");

       $("#miitelPhoneIFrameOuter").css('position', "fixed");
       $("#miitelPhoneIFrameButton").css('position', "fixed");
       $("#miitelPhoneIframe").css('position', "fixed");

});




</script>

<!DOCTYPE html>
        <html>
        <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>顧客データベース | Rentracks Customer Database</title>
        <meta name="robots" content="noindex, nofollow">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover">
        <link href="<?php    echo base_url(); ?>common/css/normalize.min.css" rel="stylesheet" media="all">
        <link href="<?php    echo base_url(); ?>common/css/common.css" rel="stylesheet" media="all">
        <!-- 郵便番号で住所自動入力リンク -->
        <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
        <!--[favicon]-->

        <link rel="apple-touch-icon" sizes="512x512" href="<?php    echo base_url(); ?>common/favicon/512.png">
        <link rel="apple-touch-icon" sizes="152x152" href="<?php    echo base_url(); ?>common/favicon/152.png">
        <link rel="apple-touch-icon" sizes="120x120" href="<?php    echo base_url(); ?>common/favicon/120.png">
        <link rel="apple-touch-icon" sizes="72x72" href="<?php    echo base_url(); ?>common/favicon/72.png">
        <link rel="apple-touch-icon" sizes="32x32" href="<?php    echo base_url(); ?>common/favicon/32.png">
        <link rel="icon" href="<?php    echo base_url(); ?>common/favicon.ico">
        </head>

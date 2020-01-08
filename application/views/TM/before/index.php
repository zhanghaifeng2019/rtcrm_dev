
        <html>
            <head>
                <meta charset="utf-8"/>
                <meta name="viewport" content="width=device-width, initial-scale=1.0">




            </head>
            <body>


 <section class="section">
    <div class="container">

<div class="columns is-mobile is-centered">
  <div class="column is-half">
    <p class="bd-notification is-primary">
    <center>
         <h1 class="title">テレマ検索</h1>
    </center><br>


<?php
$this->load->helper('form');
echo validation_errors();
echo form_open('TMSerch/index','id="myform"');
?>



<div class="field">

  <label class="label">会社名</label>
  <div class="control">
    <input class="input" type="text" name="companyName">
  </div>
</div>

<div class="field">
  <label class="label">商品サービス名</label>
  <div class="control">
    <input class="input" type="text" name="PDSVName">
  </div>

</div>

<div class="field">
  <label class="label">電話番号</label>
  <div class="control">
    <input class="input" type="tel" name="Phone">
  </div>

</div>

<div class="field">
  <label class="label">LP(ドメイン一致)</label>
  <div class="control">
    <input class="input" type="text" name="domain">
  </div>
  <div class="control">
    <center><br>
    <input type="button" class="button is-black is-fullwidth" id='sbm' value="検索">
</center>
</div>

</div>




    </div>
    </p>
  </div>
</div>



  </section>












       </body>
          </html>

<script>
    $(document).ready(function(){

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

</script>

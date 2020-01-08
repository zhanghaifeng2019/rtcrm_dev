
        <html>
            <head>

                <meta charset="utf-8"/>
                <meta name="viewport" content="width=device-width, initial-scale=1.0">




            </head>
            <style>

                </style>
            <body>



      <div class="columns">


  <div class="column is-1">
  </div>

  <div class="column is-10">

  <section class="hero is-link">
  <div class="hero-body">
      <h1 class="title">
      検索結果
      </h1>

  </div>
  </div>
</section>

  </div>

  <div class="column is-1"></div>
</div>





   <?php
   $this->load->helper('url');
   if(count($table)==0){

   ?>

 <section class="section">
    <div class="container">

<div class="columns is-mobile is-centered">
  <div class="column is-half">
    <p class="bd-notification is-primary">


    <h1 class="title">登録なし</h1>

 <a href="<?php echo base_url('TMRegi');?>" class="button is-medium is-fullwidth" >新規登録</a><br>

    </div>
    </p>
  </div>
</div>

  </section>


</center>

    <?php
   }
   else{
    $this->load->helper('url');

    ?>

<div class="columns">
  <div class="column is-1">
  </div>

    <div class="column  is-10">
    <nav class="navbar">
      <div class="container">

      <div class="navbar-start">
      <div class="navbar-item">
        <div class="field is-grouped ">
          <p class="control  is-size-6">
           担当者
           <i class="fas fa-long-arrow-alt-down"></i>
           <i class="fas fa-long-arrow-alt-up"></i></i>


          </p>

          <p class="control  is-size-6">
            最新連絡日

            <i class="fas fa-long-arrow-alt-down"></i>&nbsp
            <i class="fas fa-long-arrow-alt-up"></i></i>


          </p>

           <p class="control  is-size-6">
           連絡経過日

           <i class="fas fa-long-arrow-alt-down"></i></i>&nbsp
           <i class="fas fa-long-arrow-alt-up"></i></i>

          </p>
        </div>
      </div>
    </div>
      <br>
      </div>
    </nav>
    <br>
    <div class="columns is-mobile">

      <div class="column">
      <?php foreach($table as $item ) :?>

     <?php $this->load->helper('form');

        echo form_open('TMDetail','id='.$item->id);



     ?>
      <div class="mobile">

      <div class="box" >

<table class="fold-table is-bordered is-size-5 ">

  <input type="hidden" name="id" value="<?=$item->id?>">
<tr>
<th>会社名 </th>


</tr>
<tr>
<td><?=$item->name?></td>

</tr>

<tr>

<th>案件名</th>

</tr>



<tr>
<td><?=$item->service_name?></td>
</tr>


<tr>

<th>最新連絡日</th>

</tr>



<tr>
<td><?=date("Ymd")?></td>
</tr>

<tr>

<th>次回連絡予定日</th>

</tr>



<tr >
<td><?=date("Ymd")?></td>
</tr>

<tr class="view">
<th>詳細</th>
</tr>




<tr class="fold">
  <td colspan="7">
    <div class="fold-content" >


    <table class="table is-narrow is-fullwidth is-bordered is-size-6" >
        <tr>
            <td >優先順位</td>
            <td><?=$item->priority?></td>
        </tr>
        <tr>
            <td>RTG担当</td>
            <td><?= $item->staffName ?></td>
        </tr>
        <tr>
            <td>ジャンル</td>
            <td><?=$item->genre_id?></td>
        </tr>
        <tr>
            <td>ステータス</td>
            <td><?=$item->status?></td>
        </tr>
        <tr><td>連絡経過日数</td>
        <td>90日</td>
        </tr>
        <tr>
        <td>次回連絡<br>タイマー</td>
        <td><?=date("Ymd")?></td>
    </tr>
    <tr><td>案件URL</td>
    <td><?=$item->url?></td>
</tr>
    <tr><td>電話番号</td>
    <td><?=$item->tel?></td>
</tr>
    <tr><td>status</td>
    <td><?=$item->status_comment?></td>
</tr>
    <tr><td>最新連絡内容</td>
    <td><?=$item->comment?></td>
    </tr>
<tr>
    <td colspan="2"><input class="button is-fullwidth is-light" type="submit" value="詳細へ"></td>
</tr>
    </tbody>
    </table>



    </div>
  </td>
</tr>

</tbody>

</table>

   </div>
   </form>
   </div>




        <div class="web">

    <a href="javascript:submit(<?=$item->id?>);">
     <?php $this->load->helper('form');

        echo form_open('TMDetail','id='.$item->id);

     ?>

      <div class="box" >

<table class="fold-table is-bordered is-size-7 is-fullwidth">

<tr >
<th width="10%">優先順位</th>
<th width="10%">RTG担当</th>
<th width="15%">会社名</th>
<th width="15%">案件名</th>
<th width="10%">ジャンル</th>
<th width="10%">ステータス</th>
<th width="10%">最新連絡日</th>


</tr>

<tr>
<td ><?=$item->priority?></td>
<td><?= $item->staffName ?></td>
<td><?=$item->name?></td>
<td><?=$item->service_name?></td>
<td><?=$item->genre_id?></td>
<td><?=$item->status?></td>
<td><?=date("Ymd")?></td>

   </tr>

<tr>
<th>連絡経過日数</th>
<th>次回連絡タイマー</th>
<th>次回連絡予定日</th>
<th>案件URL</th>
<th>電話番号</th>
<th>ステータス コメント</th>
<th>最新連絡内容</th>


</tr>

<tr>
<td>90日</td>

<td>90日後</td>
<td><?=date("Ymd")?></td>
<td><?=$item->url?></td>
<td><?=$item->tel?></td>
<td><p class="tooltip is-tooltip-bottom " data-tooltip="<?=$item->status_comment?>">
<?php
if(strlen($item->status_comment)>10)
{
   echo mb_substr($item->status_comment,0,10)."...";
}
else{
    echo mb_substr($item->status_comment,0,10);
}
?>
</td>
<td><p class="tooltip is-tooltip-bottom " data-tooltip="<?=$item->comment?>"><?php
if(strlen($item->comment)>10)
{
   echo mb_substr($item->comment,0,10)."...";
}
else{
    echo mb_substr($item->comment,0,10);
}
?>  </td>

   </tr>


</tbody>
</table>

   </div>
</form>
   </a>




      </div>
    </div>
  </div>



   <?php endforeach ?>



<center> <a href="<?php echo base_url('TMRegi');?>" class="button is-medium " >新規登録</a><br></center>
</div>
<?php

}
?>

 <script>
   function submit($id){
    $('#'+$id).submit();

   }
     $(function(){


  $(".fold-table tr.view").on("click", function(){
    $(this).toggleClass("open").next(".fold").toggleClass("open");
  });
  var windowWidth = $( window ).width();
if(windowWidth < 500) {
    $('.mobile').show();
     $('.web').hide();
} else {
    $('.mobile').hide();
     $('.web').show();
}
$( window ).resize(function() {
    var windowWidth = $( window ).width();
    if(windowWidth < 500) {

        $('.mobile').show();
     $('.web').hide();
} else {
    $('.mobile').hide();
     $('.web').show();
}
});




});
</script>

                </body>
                </html>

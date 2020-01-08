

        <html>
            <head>
                <meta charset="utf-8"/>
                <meta name="viewport" content="width=device-width, initial-scale=1.0">

            </head>
            <body>


 <div class="modal">
    <div class="modal-background"></div>
    <div class="modal-content">
      <?php $this->load->helper('form');

         echo form_open('TMDetail/contact');


      ?>
    <div class="message-header">
    <p>連絡内容</p>

  </div>
      <div class="notification is-white">
      <article class="media">

  <div class="media-content">
    <div class="field">
      <p class="control">
        <textarea class="textarea" name="contactContent"></textarea>
      </p>
    </div>
    <input type="hidden" name="id" value="<?=$initDash[0]->id?>">
      <input type="hidden" name="cid" value="<?=$initDash[0]->cid?>">
    <div class="columns">
  <div class="column">
  <div class="field">
  <label class="label">コンタクト日</label>
   <input class="input" type="date" name="contactDate" value="<?=date("Y-m-d")?>" >
  </div>
</div>
  <div class="column">

  <div class="field">
  <label class="label">担当者</label>
  <div class="select is-fullwidth">
    <select name="staff_id">
      <?php foreach($staff as $item ) :
         if($item->id==$initDash[0]->staff_id){
      ?>
        <option value="<?=$item->id?>"  selected="selected"><?=$item->name?></option>
      <?php
        }
        else{
          ?>
<option value="<?=$item->id?>"><?=$item->name?></option>
        <?php
        }
    ?>
    <?php endforeach ?>

</select>
</div>
  </div>
</div>

</div>



    <nav class="level">
      <div class="level-left">
        <div class="level-item">

        </div>
      </div>
      <div class="level-right">

      <div class="level-item">

        <input type="submit" class="button is-info" value="登録">
        </div>
      </div>
      </form>
    </nav>



  </div>
</article>
      </div>
    </div>
  <button class="modal-close is-large" aria-label="close" onclick="modaloff()"></button>
  </div>





<div class="columns">
  <div class="column is-one-fifth">

  </div>
  <div class="column">
  <nav class="navbar">
      <div class="container">

      <div class="navbar-end">
      <div class="navbar-item">
        <div class="field is-grouped">
          <p class="control">
            <a class="button is-white">

              <span>
              媒体様
              </span>
            </a>
          </p>

          <p class="control">
            <a class="button is-white">

              <span>代理店様</span>
            </a>
          </p>

           <p class="control">
            <a class="button is-primary">

              <span>検索</span>
            </a>
          </p>
        </div>
      </div>
    </div>

      </div>
    </nav>
    <section class="hero is-link">
  <div class="hero-body">
      <h1 class="title">
      広告主様ダッシュボード
      </h1>
      <h2 class="subtitle">
      ●●ID： 0987
      </h2>



  </div>
  </div>
</section>

  <div class="column is-one-fifth">

  </div>

</div>


<?php $this->load->helper('form');

   echo form_open('TMDetail/update');



?>
<input type="hidden" name="id" value="<?=$initDash[0]->id?>">
<div class="columns">
<div class="column is-one-fifth"></div>
  <div class="column">
  <table class="table is-bordered is-fullwidth" >
        <tr>
            <td>顧客 親区分</td>　

            <td>
            <div class="select is-fullwidth">
            <select >
            <option>広告主</option>
            <option>2</option>

            </select>
                </div>
        </td>
        </tr>

        <tr>
            <td>関連OOID </td>　<td><input type="text" class="input" value="1234：5678"></td>
        </tr>

          <tr>
            <td>ジャンル</td>　<td>

            <div class="select is-fullwidth">

                <select  name="genre_id">
            <?php foreach($genre as $item ) :
                if($item->id==$initDash[0]->genre_id){
              ?>
                <option value="<?=$item->id?>"  selected="selected"><?=$item->name?></option>
              <?php
                }
                else{
                  ?>
    <option value="<?=$item->id?>"><?=$item->name?></option>
                <?php
                }
            ?>



          <?php endforeach ?>

            </select>
                </div>
        </td>
        </tr>

         <tr>
            <td>RTG担当 </td>　<td>
            <div class="select is-fullwidth">
                <select name="staff_id">
                  <?php foreach($staff as $item ) :
                     if($item->id==$initDash[0]->staff_id){
                  ?>
                    <option value="<?=$item->id?>"  selected="selected"><?=$item->name?></option>
                  <?php
                    }
                    else{
                      ?>
        <option value="<?=$item->id?>"><?=$item->name?></option>
                    <?php
                    }
                ?>
                <?php endforeach ?>

            </select>
                </div>
        </td>
        </tr>
        <tr>
            <td>所属チーム </td>　<td>
            <div class="select is-fullwidth">
                <select name="group">
                  <?php foreach($group as $item ) :?>
                  <option value="<?=$item->id?>"> <?=$item->name?> </option>

                <?php endforeach ?>

            </select>
                </div>
        </td>
        </tr>

       <tr>
            <td>会社名 </td>　<td><input type="text" class="input" name="companyName" value="<?=$initDash[0]->name?>"></td>
        </tr>
        <tr>
            <td>案件名 </td>　<td><input type="text" class="input" name="service_name" value="<?=$initDash[0]->service_name?>"></td>
        </tr>
        <tr>
            <td>案件URL </td>　<td><input type="text" class="input" name="url" value="<?=$initDash[0]->url?>"></td>
        </tr>
        <tr>
            <td>担当者役職(任意) </td>　<td><input type="text" class="input" name="director_status" value="<?=$initDash[0]->director_status?>"></td>
        </tr>

        <tr>
            <td>担当者名 </td>　<td><input type="text" class="input" name="director" value="<?=$initDash[0]->director?>"></td>
        </tr>

        <tr>
            <td>担当者メール </td>　<td><input type="text" class="input" name="email" value="<?=$initDash[0]->email?>"></td>
        </tr>
        <tr>
            <td>代表者名 </td>　<td><input type="text" class="input" name="president" value="<?=$initDash[0]->president?>"></td>
        </tr>
        <tr>
            <td>電話番号 </td>　<td><input type="text" class="input" name="tel" value="<?=$initDash[0]->tel?>"></td>
        </tr>
        <tr>
            <td>〒 </td>　<td><input type="text" class="input" name="zip" value="<?=$initDash[0]->zip?>"></td>
        </tr>

        <tr>
            <td>住所 </td>　<td><input type="text" class="input" name="address" value="<?=$initDash[0]->addr?>"></td>
        </tr>

        <tr>
            <td>建物名 </td>　<td><input type="text" class="input" name="building" value="<?=$initDash[0]->building?>"></td>
        </tr>

        <tr>
            <td>案件情報元</td>　

            <td>
            <div class="select is-fullwidth" >
            <select  id="info_source" name="info_source">
            <option value=0>他社ASP案件</option>
            <option value=1>紹介</option>
            <option value=2>インバウンド</option>
            <option value=3>WEB画</option>
            <option value=4>雑誌</option>
            <option value=5>SNS</option>
            </select>
                </div>
        </td>
        </tr>

        <tr>
            <td>情報元補充 </td>　<td><input type="text" class="input" value="<?=$initDash[0]->info_source_comment?>" name="info_source_comment"></td>
        </tr>

    </table>
  </div>
  <div class="column">

 <table class="table is-bordered is-fullwidth">
        <tr>
            <td>ステータス</td>　

            <td>
            <div class="select is-fullwidth">
            <select id="status" name="status">
            <option value=0>テレマしてOK</option>
            <option value=1>テレマ中</option>
            <option value=2>アポ</option>
            <option value=3>成約</option>
            <option value=4>資料送付</option>
            <option value=5>失注</option>
            <option value=6>訳アリ</option>
            </select>
                </div>

        </td>



        </tr>
        <tr>
        <td>ステータス<br>コメント</td>　

            <td>
            <div class="select is-fullwidth">
            <select id="status_comment" name="status_comment">
            <option value=0>新規お断り（受付）</option>
            <option value=1>新規お断り（担当者）</option>
            <option value=2>現状いらない（担当者）</option>
            <option value=3>お問い合わせフォームに案内</option>
            <option value=4>番号が使われていない</option>
            <option value=5>カスタマーセンター番号</option>
            <option value=6>営業時間外</option>
            <option value=7>担当者不在</option>
            <option value=8>資料送付（受付）</option>
            <option value=9>資料送付（担当者）</option>
            <option value=10>代理店経由ならOK</option>
            <option value=11>代理店経由のためNG</option>
            <option value=12>既存クライアント</option>
            <option value=13>アポゲット</option>
            </select>
                </div>
        </td>
        </tr>

           <tr>
            <td>次回連絡<br>タイマー</td>　

            <td>
            <div class="select is-fullwidth">
            <select id="timer" name="timer">
            <option value=0>1日後</option>
            <option value=1>3日後</option>
            <option value=2>7日後</option>
            <option value=3>14日後</option>
            <option value=4>30日後</option>
            <option value=5>90日後</option>
            <option value=6>120日後</option>
            <option value=7>365日後</option>

            </select>
                </div>
        </td>



        </tr>
            <tr>
            <td>優先度</td>　

            <td>
            <div class="select is-fullwidth">
            <select id="priority" name="priority">
            <option value=0>超高</option>
            <option value=1>高</option>
            <option value=2>中</option>
            <option value=3>低</option>
            </select>
                </div>
        </td>
            </tr>

           <tr>
            <td>最近コンタクト日</td>　

            <td>
            <input type="input" class="input" value="<?=date("Y-m-d")?>" readonly>　</td>



        </tr>

        <tr>
        <td>経過日</td>　

            <td>
            <input type="text" class="input" value="35日">
        </td>
        </tr>




    </table>




<?php foreach($Contacts as $item ) :?>
  <article class="message">
<div class="message-header">
<p><?=$item->name?>[<?=$item->contactDate?>]</p>

</div>
<div class="message-body">
<?=$item->contact?>
</div>
</article>

<?php endforeach ?>






    <table>
    <tr>
        <td>   <a class="button is-dark is-fullwidth" id="show_action">

                <span>新規コンタクト入力</span>
              </a></td>
        <td>
        <a class="button is-dark is-fullwidth" id="show_action">

                <span>コンタクトの詳細(3件)</span>
              </a></td>
        </td>
    </tr>
    </table>
  </div>
  <div class="column is-one-fifth"></div>

</div>








 </div>







                </div>
                <div class="columns">
  <div class="column is-one-third">

  </div>
  <div class="column">
  <input type="submit" class="button is-medium is-dark is-fullwidth" value="修正">
  </div>

  <div class="column">

  </div>
</div>
</form>
                </body>

<script>
      $(document).ready(function() {
        $('#status').val(<?=$initDash[0]->status?>);
        $('#status_comment').val(<?=$initDash[0]->status_comment?>);
        $('#timer').val(<?=$initDash[0]->timer?>);
        $('#priority').val(<?=$initDash[0]->priority?>);
        $('#info_source').val(<?=$initDash[0]->info_source?>);
      });
function modaloff(){
    $("div.modal").removeClass("is-active");

}
$("#show_action").on("click", function() {
  $("div.modal").addClass("is-active");
})

$("div.modal-background").on("click", function() {
  $("div.modal").removeClass("is-active");
})


    </script>
</html>

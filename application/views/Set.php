<html lang="en">
  <head>
  </head>
  <body>
    <div class="columns">
      <div class="column is-3">

      </div>
      <div class="column">

        <div class="field">

          <section class="hero is-info">
            <div class="hero-body">

                <h1 class="title">
                  login
                </h1>


            </div>
          </section>


          <br>
          <?php
          $this->load->helper('form');
          echo validation_errors();
          echo form_open('Set','id="myform"');
          ?>

          <p class="control has-icons-left has-icons-right">
            <input class="input" type="email" name="mail">
            <span class="icon is-small is-left">
              <i class="fas fa-envelope"></i>
            </span>

          </p>
        </div>
        <div class="field">
          <p class="control has-icons-left">
            <input class="input" type="password" name="pass">
            <span class="icon is-small is-left">
              <i class="fas fa-lock"></i>
            </span>
          </p>
        </div>
        <div class="field">
          <p class="control">

            <button class="button is-success"  id='sbm' value="検索">
              Login
            </button>
          </p>
        </div>
      </form>
      </div>

      <div class="column is-3">

      </div>
    </div>
</body>
</html>


<script>
    $(document).ready(function(){

      $("#sbm").click(function() {
        var count=0;
        if($("input[name=mail]").val().length!=0){
          count++;
        }

        if($("input[name=pass]").val().length!=0){
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

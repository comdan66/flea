<?php echo render_cell ('frame_cell', 'header', array ()); ?>
<div id='container'>
  <form class='login' action='<?php echo base_url (array ('signin'));?>' method='post'>
    <h2>Hi, 你準備好了嗎？</h2>

    <div class='row split-left'>
      <label class='l' for='email'>信箱</label>
      <input type='text' class='r' name='email' id='email' value='' placeholder='輸入信箱..' pattern=".{1,250}" required title="輸入信箱.." autofocus />
    </div>

    <div class='row split-left'>
      <label class='l' for='password'>密碼</label>
      <input type='password' class='r' name='password' id='password' value='' placeholder='輸入密碼..' pattern=".{1,250}" required title="輸入密碼.."/>
    </div>
    
<?php 
    if (isset ($message) && $message) { ?>
      <div class='row error'><?php echo $message;?></div>
<?php 
    } ?>

    <div class='row split-right'>
      <div class='l'>
        <a href='<?php echo base_url ('register');?>'>立馬註冊加入！</a>
      </div>
      <div class='r'>
        <button type='submit'>準備好了，登入！</button>
      </div>
    </div>
  </form>
</div>
<?php echo render_cell ('frame_cell', 'footer', array ()); ?>

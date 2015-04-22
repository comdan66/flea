<?php echo render_cell ('frame_cell', 'header', array ()); ?>
<div id='container'>
  <form class='login' action='<?php echo base_url (array ('signin'));?>' method='post'>
    <h2>Hi, 你準備好了嗎？</h2>

    <div class='row split-left'>
      <label class='l' for='email'>電子郵件</label>
      <input type='text' class='r' name='email' id='email' value='<?php echo $email ? $email : '';?>' placeholder='輸入電子郵件..' pattern="<?php echo trim (Cfg::setting ('format', 'user', 'email'), '/');?>" required title="輸入電子郵件.." autofocus />
    </div>

    <div class='row split-left'>
      <label class='l' for='password'>密  碼</label>
      <input type='password' class='r' name='password' id='password' value='' placeholder='輸入密碼(6個英、數字元以上)..' pattern="<?php echo trim (Cfg::setting ('format', 'user', 'password'), '/');?>" required title="輸入密碼(6個英、數字元以上).."/>
    </div>
    
<?php 
    if (isset ($message) && $message) { ?>
      <div class='row error'><?php echo $message;?></div>
<?php 
    } ?>

    <div class='row split-right'>
      <div class='l'>
        <a href='<?php echo base_url ('register');?>'>註冊，立馬加入！</a>
        <a href='<?php echo base_url ('forget');?>'>糟糕，我忘記密碼了..</a>
      </div>
      <div class='r'>
        <button type='submit'>準備好了，登入！</button>
      </div>
    </div>
  </form>
</div>
<?php echo render_cell ('frame_cell', 'footer', array ()); ?>

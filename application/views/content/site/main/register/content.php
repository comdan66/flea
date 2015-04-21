<?php echo render_cell ('frame_cell', 'header', array ()); ?>
<div id='container'>
  <form class='register' action='<?php echo base_url (array ('confirm'));?>' method='post'>
    <h2>嘿！快點加入我們吧！</h2>

    <div class='row split-left'>
      <label class='l' for='name'>暱  稱</label>
      <input type='text' class='r' name='name' id='name' value='<?php echo $name ? $name : '';?>' placeholder='輸入暱稱..' pattern="<?php echo trim (Cfg::setting ('format', 'user', 'name'), '/');?>" required title="輸入暱稱.." autofocus />
    </div>

    <div class='row split-left'>
      <label class='l' for='email'>電子郵件</label>
      <input type='text' class='r' name='email' id='email' value='<?php echo $email ? $email : '';?>' placeholder='輸入電子郵件..' pattern="<?php echo trim (Cfg::setting ('format', 'user', 'email'), '/');?>" required title="輸入電子郵件.."/>
    </div>

    <div class='row split-left'>
      <label class='l' for='password'>密  碼</label>
      <input type='password' class='r' name='password' id='password' value='' placeholder='輸入密碼(6個英、數字元以上)..' pattern="<?php echo trim (Cfg::setting ('format', 'user', 'password'), '/');?>" required title="輸入密碼(6個英、數字元以上).."/>
    </div>

    <div class='row split-left'>
      <label class='l' for='re_password'>確認密碼</label>
      <input type='password' class='r' name='re_password' id='re_password' value='' placeholder='確認密碼(6個英、數字元以上)..' pattern="<?php echo trim (Cfg::setting ('format', 'user', 'password'), '/');?>" required title="確認密碼(6個英、數字元以上).."/>
    </div>
    
<?php 
    if (isset ($message) && $message) { ?>
      <div class='row error'><?php echo $message;?></div>
<?php 
    } ?>

    <div class='row split-right'>
      <div class='l'>
        <a href='<?php echo base_url ('login');?>'>我已經有帳號了！</a>
      </div>
      <div class='r'>
        <button type='submit'>立馬註冊</button>
      </div>
    </div>
  </form>
</div>
<?php echo render_cell ('frame_cell', 'footer', array ()); ?>

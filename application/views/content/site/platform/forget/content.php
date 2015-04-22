<?php echo render_cell ('frame_cell', 'header', array ()); ?>
<div id='container'>
  <form class='forget' action='<?php echo base_url (array ('platform', 'create'));?>' method='post'>
    <h2>別緊張，我們會處理！</h2>

    <div>輸入您的信箱吧，我們會為您產生一組臨時密碼！</div>
    <div>使用信件中的新密碼登入後，別忘了要去更改新密碼喔！</div>

    <div class='split-left'>
      <label class='l' for='email'>電子郵件</label>
      <input type='text' class='r' name='email' id='email' value='<?php echo $email ? $email : '';?>' placeholder='輸入電子郵件..' pattern="<?php echo trim (Cfg::setting ('format', 'user', 'email'), '/');?>" required title="輸入電子郵件.."/>
    </div>

<?php 
    if (isset ($message) && $message) { ?>
      <div class='error'><?php echo $message;?></div>
<?php 
    } ?>

    <div class='split-right'>
      <div class='l'>
        <a href='<?php echo base_url ('platform', 'login');?>'>立馬登入</a>
      </div>
      <div class='r'>
        <button type='submit'>寄送臨時密碼</button>
      </div>
    </div>
  </form>
</div>
<?php echo render_cell ('frame_cell', 'footer', array ()); ?>

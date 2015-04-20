<?php echo render_cell ('frame_cell', 'header', array ()); ?>
<div id='container'>
  <form class='login' action='<?php echo base_url (array ('signin'));?>' method='post'>
    <h2>Hi, 你準備好了嗎？</h2>

    <div class='row split-left'>
      <label class='l' for='account'>帳號</label>
      <input type='text' class='r' name='account' id='account' value='' placeholder='輸入帳號..' pattern=".{1,250}" required title="輸入帳號.."/>
    </div>

    <div class='row split-left'>
      <label class='l' for='password'>密碼</label>
      <input type='password' class='r' name='password' id='password' value='' placeholder='輸入密碼..' pattern=".{1,250}" required title="輸入密碼.."/>
    </div>

    <div class='row split-right'>
      <div class='l<?php echo isset ($message) && $message ? ' error' : '';?>'>
        <?php echo isset ($message) && $message ? $message : '第一次自動註冊';?>
      </div>
      <div class='r'>
        <button type='submit'>登入 or 註冊</button>
      </div>
    </div>
  </form>
</div>
<?php echo render_cell ('frame_cell', 'footer', array ()); ?>

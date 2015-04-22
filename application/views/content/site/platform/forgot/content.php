<?php echo render_cell ('frame_cell', 'header', array ()); ?>
<div id='container'>
  <div class='forgot'>
    <h2>別緊張，我們會處理！</h2>

    <div>趕快收信吧，新密碼信件已經送出囉！</div>
    <div>記得登入後別忘記要到個人頁面修改個人密碼喔！</div>

  <?php 
    if (isset ($message) && $message) { ?>
      <div class='row error'><?php echo $message;?></div>
  <?php 
    } ?>
    <div><a href='<?php echo base_url ();?>'>回首頁</a> | <a href='<?php echo base_url ('platform', 'login');?>'>登入</a></div>
  </div>  
</div>
<?php echo render_cell ('frame_cell', 'footer', array ()); ?>

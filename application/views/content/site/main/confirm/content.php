<?php echo render_cell ('frame_cell', 'header', array ()); ?>
<div id='container'>
  <form class='register' action='<?php echo base_url (array ('verify'));?>' method='post'>
    <h2>很好，就只差一步了！</h2>
    <div>已經註冊成功，現在趕緊收信吧！</div>
    <div>點擊信件中的驗證網址，就可加入我們囉！</div>
    <div><a href='<?php echo base_url ();?>'>回首頁</a> | <a href='<?php echo base_url ('login');?>'>登入</a></div>
  </form>
</div>
<?php echo render_cell ('frame_cell', 'footer', array ()); ?>

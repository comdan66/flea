<?php echo render_cell ('frame_cell', 'header', array ()); ?>
<div id='container'>
  <form class='register' action='<?php echo base_url (array ('verify'));?>' method='post'>
<?php
    if ($user) { ?>
      <h2>太棒了，完成註冊了！</h2>
      <div>Hi, <?php echo $user->name;?> 立即 <a href='<?php echo base_url ('login');?>'>登入</a> 開始吧！</div>
      <div>現在開始，你已經是我們的會員囉！</div>
<?php
    } else { ?>
      <h2>糟糕，好像驗證失敗..</h2>
      <div>驗證信箱好像出了點問題..</div>
      <div>沒關係，你可以再次<a href='<?php echo base_url ('register');?>'>重新註冊</a>或者<a href='mailto:<?php echo Cfg::setting ('system', 'email');?>?subject=關於跳蚤..&body=Hi 您好,%0d%0a%0d%0a    關於跳蚤網站的驗證電子郵件時，我有些相關問題..'>聯絡我們</a>！</div>
<?php
    }?>

    <div><a href='<?php echo base_url ();?>'>回首頁</a> | <a href='<?php echo base_url ('login');?>'>登入</a></div>
  </form>
</div>
<?php echo render_cell ('frame_cell', 'footer', array ()); ?>

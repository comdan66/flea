<div id="header">
  <div>
    <div class='l'>
<?php if ($as['l']) {
        foreach ($as['l'] as $k => $a) { ?>
          <a <?php echo $a == current_url () ? "class='active' " : '';?>href="<?php echo $a;?>"><?php echo $k;?></a>
  <?php }
      } ?>
    </div> 
    <div class='r'>
<?php if ($as['r']) {
        foreach ($as['r'] as $k => $a) { ?>
          <a <?php echo $a == current_url () ? "class='active' " : '';?>href="<?php echo $a;?>"><?php echo $k;?></a>
  <?php }
      } ?>
    </div> 
  </div>
</div>

<div id="header">
  <div>
    <div class='l'>
<?php if ($as['l']) {
        foreach ($as['l'] as $a) {
          if ($a['show']) { ?>
            <a <?php echo $a['href'] == current_url () ? "class='active' " : '';?>href="<?php echo $a['href'];?>"><?php echo $a['name'];?></a>
    <?php }
        }
      } ?>
    </div> 
    <div class='r'>
<?php if ($as['r']) {
        foreach ($as['r'] as $a) {
          if ($a['show']) { ?>
            <a <?php echo $a['href'] == current_url () ? "class='active' " : '';?>href="<?php echo $a['href'];?>"><?php echo $a['name'];?></a>
    <?php }
        }
      } ?>
    </div> 
  </div>
</div>

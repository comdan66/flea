<?php echo render_cell ('frame_cell', 'header', array ()); ?>


  <div id='container'>

<?php echo render_cell ('apple_cell', 'conditions', $qs); ?>
<?php echo render_cell ('apple_cell', 'fleas', $apple_fleas); ?>

<?php echo render_cell ('frame_cell', 'pagination', $pagination); ?>

  </div>  
  
<?php echo render_cell ('frame_cell', 'footer', array ()); ?>

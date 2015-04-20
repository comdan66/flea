<?php echo render_cell ('frame_cell', 'header', array ()); ?>


  <div id='container'>

<?php echo render_cell ('mac_cell', 'conditions', $qs); ?>
<?php echo render_cell ('mac_cell', 'fleas', $mac_fleas); ?>

<?php echo render_cell ('frame_cell', 'pagination', $pagination); ?>

  </div>  
  
<?php echo render_cell ('frame_cell', 'footer', array ()); ?>

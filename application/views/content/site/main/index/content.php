<?php echo render_cell ('frame_cell', 'header', array ()); ?>

  <div id='container'>
    <table class='table-list'>
      <thead>
        <tr>
          <th width='120'>新增日期</th>
          <th width='120'>刊登者</th>
          <th width='60'>買賣</th>
          <th >標題</th>
          <th width='100'>價格</th>
          <th width='150'>類別</th>
          <th width='100'>地區</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class='timeago' data-time='2013/10/10 10:10:10'>2013/10/10 10:10:10</td>
          <td>OA</td>
          <td>賣</td>
          <td>asd</td>
          <td>1200</td>
          <td>iPhone 4s</td>
          <td>臺北</td>
        </tr>
      <tbody>
    </table>
  </div>  
  
<?php echo render_cell ('frame_cell', 'footer', array ()); ?>

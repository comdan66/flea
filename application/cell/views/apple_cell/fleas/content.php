<table class='table-list'>
  <thead>
    <tr>
      <th width='150'>新增日期</th>
      <th width='120'>刊登者</th>
      <th width='60'>買賣</th>
      <th >標題</th>
      <th width='100'>價格</th>
      <th width='150'>類別</th>
      <th width='100'>地區</th>
    </tr>
  </thead>
  <tbody>
<?php
    if ($apple_fleas) {
      foreach ($apple_fleas as $apple_flea) { ?>
        <tr>
          <td class='timeago' data-time='<?php echo $apple_flea->created_at;?>'><?php echo $apple_flea->created_at;?></td>
          <td><?php echo $apple_flea->user->name;?></td>
          <td><?php echo $apple_flea->id;?></td>
          <td><?php echo $apple_flea->title;?></td>
          <td>$<?php echo number_format ($apple_flea->price, 0);?></td>
          <td><?php echo $apple_flea->tag;?></td>
          <td><?php echo $apple_flea->area;?></td>
        </tr>
<?php }
    } else { ?>
      <tr><td colspan='7'>目前沒有任何資料。</td></tr>
<?php 
    } ?>
  <tbody>
</table>
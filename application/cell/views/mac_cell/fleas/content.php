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
    if ($mac_fleas) {
      foreach ($mac_fleas as $mac_flea) { ?>
        <tr>
          <td class='timeago' data-time='<?php echo $mac_flea->created_at;?>'><?php echo $mac_flea->created_at;?></td>
          <td><?php echo $mac_flea->user->name;?></td>
          <td><?php echo $mac_flea->id;?></td>
          <td><?php echo $mac_flea->title;?></td>
          <td>$<?php echo number_format ($mac_flea->price, 0);?></td>
          <td><?php echo $mac_flea->tag;?></td>
          <td><?php echo $mac_flea->area;?></td>
        </tr>
<?php }
    } else { ?>
      <tr><td colspan='7'>目前沒有任何資料。</td></tr>
<?php 
    } ?>
  <tbody>
</table>
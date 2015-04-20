<form action='<?php echo base_url ('mac');?>' method='get'>
  <div class='conditions'>
    <div class='l'>
<?php if ($actions = Cfg::setting ('flea', 'mac', 'actions')) { ?>
        <label for='action'>想要:
          <select id='action' name='action'>
            <option value=''>全部</option>
      <?php foreach ($actions as $action) { ?>
              <option value='<?php echo $action;?>'<?php echo isset ($qs['action']) && $qs['action'] == $action ? ' selected' : '';?>><?php echo $action;?></option>
      <?php } ?>
          </select>
        </label>
<?php }
      if ($tagss = Cfg::setting ('flea', 'mac', 'tags')) { ?>
        <label for='tag'>想找:
          <select id='tag' name='tag'>
            <option value=''>其他</option>
      <?php foreach ($tagss as $group => $tags) {
              if ($tags) { ?>
                <optgroup label='<?php echo $group;?>'>
            <?php foreach ($tags as $tag) { ?>
                    <option value='<?php echo $tag;?>'<?php echo isset ($qs['tag']) && $qs['tag'] == $tag ? ' selected' : '';?>><?php echo $tag;?></option>
            <?php } ?>
                </optgroup>
        <?php } else { ?>
                <option value='<?php echo $group;?>'<?php echo isset ($qs['tag']) && $qs['tag'] == $group ? ' selected' : '';?>><?php echo $group;?></option>
        <?php }
            } ?>
          </select>
        </label>
<?php }
      if ($areas = Cfg::setting ('flea', 'mac', 'areas')) { ?>
        <label for='area'>想在:
          <select id='area' name='area'>
            <option value=''>不限</option>
      <?php foreach ($areas as $area) { ?>
              <option value='<?php echo $area;?>'<?php echo isset ($qs['area']) && $qs['area'] == $area ? ' selected' : '';?>><?php echo $area;?></option>
      <?php } ?>
          </select>
        </label>
<?php } ?>
      <input type='text' name='title' value='<?php echo isset ($qs['title']) ? $qs['title'] : '';?>' placeholder='標題關鍵字..' />
    </div>
    <div class='r'>
      <button type='button'>新增</button>
      <button type='submit'>尋找</button>
    </div>
  </div>
</form>

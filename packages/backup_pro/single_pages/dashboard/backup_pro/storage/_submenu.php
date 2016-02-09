<div class="row" style="float: right;">
<div class="dropdown">
  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
    New Storage Location
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
    <?php foreach($available_storage_engines AS $section): ?>
    <li><a href="<?php echo $context->action('new_storage', $section['short_name']); ?>">
    	<img src="<?php echo $bp_static_path.'/images/storage/'.$section['icon']; ?>.png" />
    	<?php echo $view_helper->m62Lang($section['name']); ?>
    </a></li>
    <?php endforeach; ?>
  </ul>
</div>
</div>
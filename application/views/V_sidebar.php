<div id="content">
	<div class="panel panel-default sidebar-menu">
		<div class="panel-heading">
			<h3 class="panel-title">Categories</h3>
		</div>
		<div class="panel-body">
			<ul class="nav nav-pills nav-stacked category-menuu">
				<?php
				for ($i = 0; $i < $cat['data']['count']; $i++) {
					echo ' <li>
        			<a href="' . base_url() . 'viewproduct/cat/' . $cat['data']['data_array'][$i]->category_id . '/1">
        				' . $cat['data']['data_array'][$i]->category_name . '
        			</a>
        		</li> ';
				} ?>
			</ul>
		</div>
	</div>
	<div class="panel panel-default sidebar-menu">
		<div class="panel-heading">
			<h3 class="panel-title">Categories</h3>
		</div>
		<div class="panel-body">
			<ul class="nav nav-pills nav-stacked category-menuu">
				<?php
				for ($i = 0; $i < $cat['data']['count']; $i++) {
					echo ' <li>
        			<a href="' . base_url() . 'viewproduct/' . $cat['data']['data_array'][$i]->category_id . '/">
        				' . $cat['data']['data_array'][$i]->category_name . '
        			</a>
        		</li> ';
				} ?>
			</ul>
		</div>
	</div>
</div>

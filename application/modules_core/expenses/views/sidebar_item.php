<div class="section_wrapper">

	<h3 class="title_white"><?php echo $this->lang->line('expenses'); ?></h3>

	<ul class="quicklinks content toggle">
		<li><?php echo anchor('expenses/form', $this->lang->line('add_expense')); ?></li>
        <li class="last"><?php echo anchor('expenses/index', $this->lang->line('view_expense')); ?></li>
	</ul>

</div>
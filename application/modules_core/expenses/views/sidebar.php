<div class="section_wrapper">

	<h3 class="title_white"><?php echo $this->lang->line('category'); ?></h3>

	<ul class="quicklinks content toggle">
		<li><?php echo anchor('expenses/category/form', $this->lang->line('create_category')); ?></li>
        <li class="last"><?php echo anchor('expenses/category', $this->lang->line('list_category')); ?></li>
	</ul>
	
	<h3 class="title_white"><?php echo $this->lang->line('provider'); ?></h3>
	
	<ul class="quicklinks content toggle">
		<li><?php echo anchor('expenses/provider/form', $this->lang->line('create_provider')); ?></li>
        <li class="last"><?php echo anchor('expenses/provider', $this->lang->line('list_provider')); ?></li>
	</ul>
	
	<h3 class="title_white"><?php echo $this->lang->line('bank'); ?></h3>
	
	<ul class="quicklinks content toggle">
		<li><?php echo anchor('expenses/bank/form', $this->lang->line('create_bank')); ?></li>
        <li class="last"><?php echo anchor('expenses/bank', $this->lang->line('list_bank')); ?></li>
	</ul>
	
	<h3 class="title_white"><?php echo $this->lang->line('expense_payment_type'); ?></h3>
	
	<ul class="quicklinks content toggle">
		<li><?php echo anchor('expenses/expense_payment_type/form', $this->lang->line('create_expense_payment_type')); ?></li>
        <li class="last"><?php echo anchor('expenses/expense_payment_type', $this->lang->line('list_expense_payment_type')); ?></li>
	</ul>

</div>

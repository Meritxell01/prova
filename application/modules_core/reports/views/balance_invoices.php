<?php $this->load->view('dashboard/header'); ?>

<script type="text/javascript">
	$(function() {
		$("#datepicker").datepicker({ changeYear: true, changeMonth: true, dateFormat: 'dd/mm/yy' });
		$(".datepicker").datepicker({ changeYear: true, changeMonth: true, dateFormat: 'dd/mm/yy' });
		$("#datepicker").mask("99/99/9999");
		$(".datepicker").mask("99/99/9999");
	});

</script>

<h3 class="title_black">Factures Venta</h3>

		<div class="search">
           <form id="" name="search" method="POST" action="<?php echo site_url($this->uri->uri_string()); ?>">
                            <?php echo $this->lang->line('from_date'); ?>
                            <input type="text" id="fini" name="fini" class="datepicker" value="">
                            <?php echo $this->lang->line('to_date'); ?>
                            <input type="text" name="ffin" id="ffin" class="datepicker" value="">                           
           </form>
        </div>

<div class="content toggle no_padding">


	<?php

		$data['table_id']="all_invoices";
		$this->load->view('invoice_table',$data); 

	?>

</div>

<?php $this->load->view('dashboard/footer'); ?>
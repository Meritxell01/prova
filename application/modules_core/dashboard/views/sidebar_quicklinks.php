<div class="section_wrapper">

	<h3 class="title_black" id="quicklinks" title="<?php echo $this->lang->line('tooltip_dashboard_quicklinks'); ?>"><?php echo $this->lang->line('quicklinks'); ?></h3>

	<ul class="quicklinks content toggle">
            <li><?php echo icon('clients') . ' ' . anchor('clients/form', $this->lang->line('new_client')); ?></li>
		<li><?php echo icon('invoices') . ' ' . anchor('invoices/create', $this->lang->line('create_invoice')); ?></li>
		<li><?php echo icon('payment') . ' ' . anchor('payments/form', $this->lang->line('enter_payment')); ?></li>
		<li><?php echo icon('search') . ' ' . anchor('invoice_search', $this->lang->line('invoice_search')); ?></li>
                <li><?php echo icon('help') . ' ' . '<a href="mailto:support@l-invoice.com">' . $this->lang->line('get_support') . '</a>'; ?></li>
		<?php if ($this->session->userdata('global_admin')) { ?>
		<li class="last"><?php echo icon('settings') . ' ' . anchor('settings', $this->lang->line('system_settings')); ?></li>
		<?php } ?>
	</ul>

</div>

<script language="javascript">
    $('#quicklinks').tooltip({
            tipClass: 'tooltip-with-bottom-arrow',
            effect: "fade"
        });
    
    $(document).ready(function() {
        var client_total = <?php echo $client_total; ?>;
        if (client_total <= 1) { // indicating that this user is new
            api = $('#quicklinks').data('tooltip');
            api.show(); // show tooltip 
            setTimeout(function(){api.hide()}, 5000); 
        }
    });
    
</script>
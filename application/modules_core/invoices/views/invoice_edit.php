<?php $this->load->view('dashboard/header', array('header_insert'=>'invoices/invoice_edit_header')); ?>

<?php echo modules::run('invoices/widgets/generate_dialog'); ?>

<?php echo modules::run('payments/payment_widgets/generate_dialog'); ?>

<?php $this->load->view('dashboard/jquery_date_picker'); ?>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/jquery/jquery.relcopy.js"></script>

<script type="text/javascript">
	$(function(){
		var append_to_clone = ' <a class="remove" href="#" onclick="$(this).parent().remove(); return false"><?php echo $this->lang->line('delete'); ?></a>';
		$('a.copy').relCopy({append: append_to_clone});
		$('#tabs').tabs({ selected: <?php echo $tab_index; ?> });
	});

</script>
<div class="grid_10" id="content_wrapper">

	<form method="post" action="<?php echo site_url($this->uri->uri_string()); ?>">

	<div class="section_wrapper" id="section_wrapper">

		<h3 class="title_black" id="title_black"><?php
		
		if($invoice->invoice_is_quote == 0){
		echo $this->lang->line('invoice_number')." ".$invoice->invoice_number;
		?><input type="submit" name="btn_add_payment" style="float: right; margin-top: 10px; margin-right: 10px;" value="<?php echo $this->lang->line('enter_payment'); ?>" />
		
		<input type="submit" id="btn_add_new_item" name="btn_add_new_item" title="<?php echo $this->lang->line('tooltip_Add item to your invoice.');?>" style="float: right; margin-top: 10px; margin-right: 10px;" value="<?php echo $this->lang->line('add_invoice_item'); ?>" />
		
		
		<?php
		}else if($invoice->invoice_is_quote == 1){
		echo  $this->lang->line('quote_number')." ".$invoice->invoice_number;
		
		?><input type="submit" title="<?php echo $this->lang->line('tooltip_Convert this quote to an invoice, if it has become a confirmed order.'); ?>" name="btn_quote_to_invoice" id="btn_quote_to_invoice" style="float: right; margin-top: 10px; margin-right: 10px;" value="<?php echo $this->lang->line('quote_to_invoice'); ?>" />
		<input type="submit" id="btn_add_new_item" name="btn_add_new_item" title="<?php echo $this->lang->line('tooltip_Add item to your quote.');?>" style="float: right; margin-top: 10px; margin-right: 10px;" value="<?php echo $this->lang->line('add_quote_item'); ?>" />
		
		<?php
		
		
		}else if($invoice->invoice_is_quote == 2){
		echo $this->lang->line('quote_delivery_note_number')." ".$invoice->invoice_number;
		
		?><input type="submit" title="<?php echo $this->lang->line('tooltip_Convert this quote_delivery_note_number to an invoice, if it has become a confirmed order.'); ?>" name="btn_quote_to_invoice" id="btn_quote_to_invoice" style="float: right; margin-top: 10px; margin-right: 10px;" value="<?php echo $this->lang->line('quote_delivery_note_number_to_invoice'); ?>" />
		
		<input type="submit" id="btn_add_new_item" name="btn_add_new_item" title="<?php echo $this->lang->line('tooltip_Add item to your delivery_note_number.');?>" style="float: right; margin-top: 10px; margin-right: 10px;" value="<?php echo $this->lang->line('add_delivery_note_number_item'); ?>" />
		
		
		<?php

		}
		?>

			
	
			
			
		</h3>

		<?php $this->load->view('dashboard/system_messages'); ?>

		<div class="content toggle">

				<div id="tabs">
					<ul>
						<li><a href="#tab_general"><?php echo $this->lang->line('summary'); ?></a></li>
						<li><a href="#tab_items"><?php echo $this->lang->line('items'); ?></a></li>
						<?php if (!$invoice->invoice_is_quote) { ?>
						<li><a href="#tab_payments"><?php echo $this->lang->line('payments'); ?></a></li>
						<?php } ?>
						<li><a href="#tab_taxes"><?php echo $this->lang->line('tax_and_other'); ?></a></li>
						<li><a href="#tab_notes"><?php echo $this->lang->line('notes'); ?></a></li>
						<?php if (!$this->mdl_mcb_data->setting('disable_invoice_audit_history')) { ?>
						<li><a href="#tab_history"><?php echo $this->lang->line('history'); ?></a></li>
						<?php } ?>
					</ul>
					<div id="tab_general">
						<?php $this->load->view('tab_general'); ?>
					</div>
					<div id="tab_items">
						<?php $this->load->view('item_table'); ?>
					</div>

					<?php if (!$invoice->invoice_is_quote) { ?>
					<div id="tab_payments">
						<?php $this->load->view('payments/table'); ?>
					</div>
					<?php } ?>

					<div id="tab_taxes">
						<?php $this->load->view('tab_taxes'); ?>
					</div>

					<div id="tab_notes">
						<?php $this->load->view('tab_notes'); ?>
					</div>

					<?php if (!$this->mdl_mcb_data->setting('disable_invoice_audit_history')) { ?>
					<div id="tab_history">
						<?php $this->load->view('tab_history'); ?>
					</div>
					<?php } ?>

				</div>

			<div style="clear: both;">&nbsp;</div>

		</div>

	</div>

	</form>

</div>
<script language="javascript">
    var item_count = <?php echo sizeof($invoice_items);?>;
        $('#btn_quote_to_invoice').tooltip({
            tipClass: 'tooltip-with-bottom-arrow',
            effect: "fade"
        });
        
        $('#btn_add_new_item').tooltip({
            tipClass: 'tooltip-with-bottom-arrow',
            effect: "fade"
        });
        
        $(document).ready(function(){
            var add_item_tooltip = $('#btn_add_new_item').data('tooltip');
            if (item_count == 0) {
                add_item_tooltip.show(); // show tooltip if no items added yet
                setTimeout(function(){add_item_tooltip.hide()}, 5000);  // hide after 3 seconds
            }
        });
</script>
<?php $this->load->view('dashboard/footer'); ?>

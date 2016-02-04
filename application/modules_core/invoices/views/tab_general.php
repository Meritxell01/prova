<script>
/*
    jq1102 = jQuery.noConflict( true );
    $(function(){jq1102("#client_id").select2();});
*/
    $(function(){$("#client_id").select2();});

/* Oscar: Si al cargar la pàgina l'estat està a cobrat, mostro la data, sinó l'amago */
var estat;
$(function(){
	estat = $("#invoice_status_id").val();
	if(estat==3){
		$('#invoice_payment_date').show();
		$('#invoice_payment_date').find('label').text('Data pagament');
	} else {
		$('#invoice_payment_date').hide();
	}	
	
});

/* Oscar: Si al canviar el valor del dropdown l'estat està a cobrat, mostro la data, sinó l'amago */
$(function(){$("#invoice_status_id").change(function() {
		estat = $(this).val();

		if((estat==0)){
			$('#invoice_payment_date').hide();
		} else {
			$('#invoice_payment_date').show();
			$('#invoice_payment_date').find('label').text('Data pagament');
		}

	});
});
	
</script>

<div class="left_box">
 
    <dl>
    <?php if ($invoice->invoice_is_quote==1) { ?>
    	 <dt><label><?php echo $this->lang->line('quote'); ?>: </label></dt>
    <?php }else if($invoice->invoice_is_quote==2){?>
        <dt><label><?php echo $this->lang->line('quote_delivery_note_number'); ?>: </label></dt>
     <?php }else{?>
    	 <dt><label><?php echo $this->lang->line('invoice_number'); ?>: </label></dt>
	 <?php } ?>   
      
        <dd><input type="text" name="invoice_number" value="<?php echo $invoice->invoice_number; ?>" /></dd>
    </dl>

	<dl>
		<dt><label><?php echo $this->lang->line('client'); ?>: </label></dt>
		<dd>
			<?php if ($invoice->client_active) { ?>
			<select name="client_id" id="client_id" style="width:400px;">
				<?php foreach ($clients as $client) { ?>
				<option value="<?php echo $client->client_id; ?>" <?php if($invoice->client_id == $client->client_id) { ?>selected="selected"<?php } ?>><?php echo character_limiter($client->client_name, 25); ?></option>
					<?php } ?>
			</select>
			<?php } else { ?>
			<?php echo $invoice->client_name; ?>
			<?php } ?>
		</dd>
	</dl>

	<dl>
		<dt><label><?php echo $this->lang->line('user'); ?>: </label></dt>
		<dd>
			<select name="user_id">
                <?php if (!$invoice->from_first_name) { ?>
                <option value=""><?php echo $this->lang->line('unassigned'); ?></option>
                <?php } ?>
				<?php foreach ($users as $user) { ?>
				<option value="<?php echo $user->user_id; ?>" <?php if($invoice->user_id == $user->user_id) { ?>selected="selected"<?php } ?>><?php echo $user->first_name . ' ' . $user->last_name; ?></option>
					<?php } ?>
			</select>
        </dd>
	</dl>
    
        <dl>
		<dt><label><?php echo $this->lang->line('contact'); ?>: </label></dt>
		<dd>
			<select name="contact_id" id="invoice_contact" title="<?php echo $this->lang->line('tooltip_invoice_contact_field'); ?>">
                <?php if (!$invoice->contact_id) { ?>
                <option value=""><?php echo $this->lang->line('unassigned'); ?></option>
                <?php } ?>
				<?php foreach ($contacts as $contact) { ?>
				<option value="<?php echo $contact->contact_id; ?>" <?php if($invoice->contact_id == $contact->contact_id) { ?>selected="selected"<?php } ?>><?php echo $contact->first_name . ' ' . $contact->last_name; ?></option>
					<?php } ?>
			</select>
        </dd>
	</dl>

	<!--< ?php if (!$invoice->invoice_is_quote) { ?>
	<dl>
		<dt><label>< ?php echo $this->lang->line('invoice_status'); ?>: </label></dt>
		<dd>
			<select name="invoice_status_id">
				< ?php foreach ($invoice_statuses as $invoice_status) { 
				if($invoice_status->invoice_status=="Pendent"){?>
				 <option value="< ?php echo $invoice_status->invoice_status_id; ?>" selected="selected">< ?php echo $invoice_status->invoice_status; ?></option>
				< ?php }else{?>
				<option value="< ?php echo $invoice_status->invoice_status_id; ?>">< ?php echo $invoice_status->invoice_status; ?></option>
				< ?php  } } ?>
			</select>
		</dd>
	</dl>
	< ?php } ?>-->
    
   
    
    <?php
	 if (!$invoice->invoice_is_quote) { ?>
	<dl>
		<dt><label><?php echo $this->lang->line('invoice_status'); ?>: </label></dt>
		<dd>
			<select name="invoice_status_id" id="invoice_status_id">
				<?php foreach ($invoice_statuses as $invoice_status) { ?>
				<option value="<?php echo $invoice_status->invoice_status_id; ?>" <?php if($invoice_status->invoice_status_id == $invoice->invoice_status_id) { ?>selected="selected"<?php } ?>><?php echo $invoice_status->invoice_status; ?></option>
				<?php } ?>
			</select>
		</dd>
	</dl>
	<dl id="invoice_payment_date">
		<dt><label></label></dt>
		<dd>
			<input  class="datepicker" name="invoice_payment_date" type="text" value="<?php echo format_date($invoice->invoice_payment_date); ?>">
		</dd>
	</dl>

	<?php  } ?>
    
    <?php
	 if (!$invoice->invoice_is_quote) { ?>
	<dl>
		<dt><label><?php echo $this->lang->line('expense_category'); ?>: </label></dt>
		<dd>
			<select name="invoice_category_id">
				<option value="" disabled selected>Sense especificar...</option>
				<?php foreach ($invoice_categories as $invoice_category) { ?>
				<option value="<?php echo $invoice_category->expense_category_id; ?>" 
					<?php if($invoice_category->expense_category_id == $invoice->invoice_category_id) { ?>selected="selected"<?php } ?>>
					<?php echo $invoice_category->expense_category_name; ?>
				</option>
				<?php } ?>
			</select>
		</dd>
	</dl>
	<?php  } ?>
    
	<dl>
		<dt><label><?php echo (!$invoice->invoice_is_quote ? $this->lang->line('invoice_date') : $this->lang->line('date')); ?>: </label></dt>
		<dd><input class="datepicker" type="text" name="invoice_date_entered" value="<?php echo format_date($invoice->invoice_date_entered); ?>" /></dd>
	</dl>

	<?php //if (!$invoice->invoice_is_quote) { ?>
	<dl>
		<dt><label><?php echo $this->lang->line('due_date_venciment'); ?>: </label></dt>
		<dd><input class="datepicker" type="text" name="invoice_due_date" value="<?php echo format_date($invoice->invoice_due_date); ?>" /></dd>
	</dl>
	<?php // } ?>

	<?php if ($invoice->invoice_is_overdue and $invoice->invoice_days_overdue > 0) { ?>
	<dl>
		<dt><label style="color: red; font-weight: bold;"><?php echo $this->lang->line('days_overdue'); ?>: </label></dt>
		<dd><span style="color: red; font-weight: bold;"><?php echo $invoice->invoice_days_overdue; ?></span></dd>
	</dl>
	<?php } elseif ($invoice->invoice_days_overdue <= 0) { ?>
	<dl>
		<dt><label><?php echo $this->lang->line('days_until_due'); ?>: </label></dt>
		<dd><?php echo ($invoice->invoice_days_overdue * -1); ?></dd>
	</dl>
	<?php } ?>

	<dl>
		<dt><label><?php echo $this->lang->line('generate'); ?>: </label></dt>
		<dd id="invoice_generate" title="<?php echo $this->lang->line('tooltip_invoice_generate'); ?>">
			<a href="javascript:void(0)" class="output_link" id="<?php echo $invoice->invoice_id . ':' . $invoice->client_id . ':' . $invoice->invoice_is_quote; ?>"><?php echo $this->lang->line('generate'); ?></a>
		</dd>
	</dl>

    <div style="clear: both;">&nbsp;</div>

	<input type="submit" id="btn_submit" name="btn_submit_options_general" value="<?php echo $this->lang->line('save_options'); ?>" />

</div>

<div class="right_box">

	<dl>
		<dt><label><?php echo $this->lang->line('subtotal'); ?>: </label></dt>
		<dd><?php echo invoice_item_subtotal($invoice); ?></dd>
	</dl>

	<dl>
		<dt><label><?php echo $this->lang->line('tax'); ?>: </label></dt>
		<dd><?php echo invoice_tax_total($invoice); ?></dd>
	</dl>

	<?php if ($invoice->invoice_shipping > 0) { ?>
	<dl>
		<dt><label><?php echo $this->lang->line('shipping'); ?>: </label></dt>
		<dd><?php echo invoice_shipping($invoice); ?></dd>
	</dl>
	<?php } ?>

	<?php if ($invoice->invoice_discount > 0) { ?>
	<dl>
		<dt><label><?php echo $this->lang->line('discount'); ?>: </label></dt>
		<dd><?php echo invoice_discount($invoice); ?></dd>
	</dl>
	<?php } ?>

	<dl>
		<dt><label><?php echo $this->lang->line('grand_total'); ?>: </label></dt>
		<dd><?php echo invoice_total($invoice); ?></dd>
	</dl>

	<?php if (!$invoice->invoice_is_quote) { ?>
	<dl>
		<dt><label><?php echo $this->lang->line('paid'); ?>: </label></dt>
		<dd><?php echo invoice_paid($invoice); ?></dd>
	</dl>

	<dl>
		<dt><label><?php echo $this->lang->line('invoice_balance'); ?>: </label></dt>
		<dd><?php echo invoice_balance($invoice); ?></dd>
	</dl>
	<?php } ?>

</div>

<div style="clear: both;">&nbsp;</div>

<script language="javascript">
        $('#invoice_contact').tooltip({
            position: "center right",
            tipClass: 'boxed-tooltip',
            effect: "fade",
            opacity: 0.7,
            offset: [-2, 10]
        });
        $('#invoice_generate').tooltip({
            position: "center right",
            tipClass: 'boxed-tooltip',
            effect: "fade",
            opacity: 0.7,
            offset: [-2, 10]
        });
</script>
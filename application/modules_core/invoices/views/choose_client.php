<?php $this->load->view('dashboard/header'); ?>

<script>
/*
    jq1102 = jQuery.noConflict( true );
    $(function(){jq1102("#client_id").select2();});
*/
    $(function(){$("#client_id").select2();});
</script>


<?php // $this->load->view('dashboard/jquery_date_picker'); ?>

<?php $this->load->view('invoices/jquery_choose_client'); ?>

<div class="grid_8" id="content_wrapper">

    <div class="section_wrapper">


        <h3 class="title_black"><?php 

        /* Oscar Modified: If Quote -> dropdown only shows quotes. If delivery note -> Dropdown only shows Delivery notes, Else show invoices */		
		if(uri_assoc('quote')==1){
		echo $this->lang->line('quotes');
            $igq =array();
                foreach($invoice_groups as $pressupost){
                    if($pressupost->invoice_group_prefix == 'PV'){
                        $igq[] = $pressupost;
                    }
                }
            $invoice_groups = $igq;    

		}else if(uri_assoc('delivery_note_number')==2){
		echo $this->lang->line('delivery_note_number');
            $iga =array();
                foreach($invoice_groups as $albara){
                    if($albara->invoice_group_prefix == 'AV'){
                        $iga[] = $albara;
                    }
                }
            $invoice_groups = $iga;    
		}else{
		echo $this->lang->line('invoices');
            $igf =array();
                foreach($invoice_groups as $factura){
                    if($factura->invoice_group_prefix != 'AV' && $factura->invoice_group_prefix != 'PV'){
                        $igf[] = $factura;
                    }
                }
            $invoice_groups = $igf;          
		}
		/* End Oscar Modified */


		//echo ($this->uri->segment(3) <> 'quote') ? $this->lang->line('create_invoice') : $this->lang->line('create_quote'); ?></h3>

        <div class="content toggle">

            <form method="post" action="<?php echo site_url($this->uri->uri_string()); ?>">

                <dl>
                    <dt><label><?php echo $this->lang->line('date'); ?>: </label></dt>
                    <dd><input id="datepicker" type="text" name="invoice_date_entered" value="<?php echo date($this->mdl_mcb_data->setting('default_date_format')); ?>" /></dd>
                </dl>
                <dl>
                    <dt><label><?php echo $this->lang->line('client'); ?>: </label></dt>
                    <dd>
                        <select name="client_id" id="client_id" style="width:400px;">
                            <option value=""></option>
                            <?php foreach ($clients as $client) { ?>
                            <option value="<?php echo $client->client_id; ?>" <?php if ($this->mdl_invoices->form_value('client_id') == $client->client_id) { ?>selected="selected"<?php } ?>><?php echo $client->client_name; ?></option>
                            <?php } ?>
                        </select>
                    </dd>
                </dl>
                <dl>
                    <dt><label><?php echo $this->lang->line('group'); ?>: </label></dt>
                    <dd>
                        <select name="invoice_group_id" id="invoice_group_id" title="<?php echo $this->lang->line('tooltip_Leave this option as it is, if you are not sure.');?>">
                            <?php foreach ($invoice_groups as $invoice_group) { ?>
                            <?php if ($this->uri->segment(3) <> 'quote') { ?>
                            <option value="<?php echo $invoice_group->invoice_group_id; ?>" <?php if ($this->mdl_mcb_data->setting('invoice_group_name') == "Factures Venta") { ?>selected="selected"<?php } ?>><?php echo $invoice_group->invoice_group_name; ?></option>
                            <?php } else { ?>
                            <option value="<?php echo $invoice_group->invoice_group_id; ?>" <?php if ($this->mdl_mcb_data->setting('default_quote_group_id') == $invoice_group->invoice_group_id) { ?>selected="selected"<?php } ?>><?php echo $invoice_group->invoice_group_name; ?></option>
                            <?php } ?>
                            <?php } ?>
                        </select>
                    </dd>
                </dl>

                <?php if ($this->uri->segment(3) == 'quote') { ?>
                <input id="invoice_is_quote" type="hidden" name="invoice_is_quote" value="1" />
                <?php } ?>
                
                 <?php if ($this->uri->segment(3) == 'delivery_note_number') { ?>
                <input id="invoice_is_quote" type="hidden" name="invoice_is_quote" value="2" />
                <?php } ?>

                <div style="clear: both;">&nbsp;</div>


				 <?php if ($this->uri->segment(3) == 'delivery_note_number') { ?>
                <input type="submit" id="btn_submit" name="btn_submit" value="<?php echo $this->lang->line('create_delivery_note_number');?>"/>
                
                <?php }else if ($this->uri->segment(3) == 'quote') { ?>
               <input type="submit" id="btn_submit" name="btn_submit" value="<?php echo $this->lang->line('create_quote'); ?>"? />
                
                <?php }else{ ?>
                <input type="submit" id="btn_submit" name="btn_submit" value="<?php echo $this->lang->line('create_invoice');?>"/>

                <?php } ?>

                <input type="submit" id="btn_cancel" name="btn_cancel" value="<?php echo $this->lang->line('cancel'); ?>" />

            </form>

        </div>

    </div>

</div>

<?php $this->load->view('dashboard/sidebar', array('side_block'=>'invoices/sidebar')); ?>

<?php $this->load->view('dashboard/footer'); ?>

<script language="javascript">
        $('#invoice_group_id').tooltip({
            position: "center right",
            tipClass: 'boxed-tooltip',
            effect: "fade",
            opacity: 0.7,
            offset: [-2, 100]
        });
</script>

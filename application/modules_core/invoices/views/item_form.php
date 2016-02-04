<!--<script language="javascript" type="text/javascript">
function selec_serial(srt) {
	
		  if (url==""){
		  document.getElementById("mostrar_serial").innerHTML="";
		  return;
		  }
		if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
		  xmlhttp=new XMLHttpRequest();
		  }
		else{// code for IE6, IE5
		  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		xmlhttp.onreadystatechange=function(){
		  if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
					document.getElementById("mostrar_serial").innerHTML=xmlhttp.responseText;
			}
		  }
		xmlhttp.open("GET","get_serial.php",true);
		xmlhttp.send();
		  
}
</script>
-->
<?php $this->load->view('dashboard/header'); ?>

<?php $this->load->view('inventory/inventory_select'); ?>

<?php $this->load->view('dashboard/jquery_date_picker'); ?>

<div class="grid_10" id="content_wrapper">
	
	<div class="section_wrapper">

		<h3 class="title_black"><?php echo $this->lang->line('invoice_number') . ' ' . invoice_id($invoice); ?></h3>

		<?php //$this->load->view('dashboard/system_messages'); ?>
		
		<div class="content toggle">

			<form method="post" action="<?php echo site_url($this->uri->uri_string()); ?>" name="invoice_item_form">
		
				<dl>
					<dt><label></label></dt>
					<dd>
						<!--onchange="selec_serial(this.value)"-->
                        <select name="inventory_id" id="inventory_id" style="width: 250px;" onchange="selec_serial(this.value)">
							<option value="please_select"><?php echo $this->lang->line('choose_inventory'); ?></option>
							<?php foreach ($inventory_items as $inventory_type=>$items) { ?>
                            <optgroup label="<?php echo ($inventory_type) ? $inventory_type : '---'; ?>">
                            <?php foreach ($items as $item) { ?>
                            <option value="<?php echo $item->inventory_id; ?>" <?php if ($this->mdl_items->form_value('inventory_id') == $item->inventory_id) { ?>selected="selected"<?php } ?>><?php echo $item->inventory_name . ': ' . ( strlen($item->inventory_description) > 90 ? substr($item->inventory_description, 0, 89) . '...' : $item->inventory_description ) ; ?></option>
                            <?php } ?>
                            </optgroup>
							<?php } ?>
						</select>
					</dd>
				</dl>
                
             <?php if(isset($prova)){
			echo "<dl><dt><label>Número de Sèrie:</label></dt><dd>";	 
			$pr= $prova->row_array();
			echo $pr['item_serial']."</dd></dl>";
			} ?>
               
			<div id="mostrar_serial" class="mostrar_serial"></div>
				<dl>
					<dt><label><?php echo $this->lang->line('item_date'); ?>: </label></dt>
					<dd><input class="datepicker" type="text" name="item_date" id="item_date" value="<?php echo $this->mdl_items->form_value('item_date'); ?>" /></dd>
				</dl>

				<dl>
					<dt><label><?php echo $this->lang->line('quantity'); ?>: </label></dt>
					<dd><input type="text" name="item_qty" id="item_qty" value="<?php echo format_qty($this->mdl_items->form_value('item_qty')); ?>" /></dd>
				</dl>

				<dl>
					<dt><label><?php echo $this->lang->line('item_name'); ?>: </label></dt>
					<dd><input type="text" name="item_name" id="item_name" value="<?php echo $this->mdl_items->form_value('item_name'); ?>" /></dd>
				</dl>
				
				<dl>
					<dt><label><?php echo $this->lang->line('item_description'); ?>: </label></dt>
					<dd><textarea name="item_description" id="item_description" rows="5" cols="40"><?php echo $this->mdl_items->form_value('item_description'); ?></textarea></dd>
				</dl>
				
				<dl>
					<dt><label><?php echo $this->lang->line('unit_price'); ?>: </label></dt>
					<dd><input type="text" name="item_price" id="item_price" value="<?php if($this->mdl_items->form_value('item_price')) { echo format_number($this->mdl_items->form_value('item_price')); } ?>" /></dd>
				</dl>
                
              

               <!--s'han comentat xa que no surtigue aquesta opció, són dos checkbox anomenats: 
				Guardar article inventari:
                Aplicar impost factura:
 				-->
               <!-- <dl>
                    <dt><label><?php echo $this->lang->line('save_as_inventory'); ?>: </label></dt>
                    <dd><input type="checkbox" name="save_as_inventory" id="save_as_inventory" title="<?php echo $this->lang->line('tooltip_save_as_inventory'); ?>" value="1" <?php if ($this->input->post('save_as_inventory')) { ?>checked="checked"<?php } ?>/></dd>
                </dl>

				<dl>
					<dt><label><?php echo $this->lang->line('apply_invoice_tax'); ?>: </label></dt>
					<dd><input type="checkbox" name="is_taxable" id="is_taxable" value="1" <?php if ($this->mdl_items->form_value('is_taxable')) { ?>checked="checked"<?php } ?> /></dd>
				</dl>
-->
				<dl>
					<dt><label><?php echo $this->lang->line('item_tax_rate'); ?>: </label></dt>
					<dd>
						<select name="tax_rate_id" id="tax_rate_id">
							<?php foreach ($tax_rates as $tax_rate) { ?>
							<option value="<?php echo $tax_rate->tax_rate_id; ?>" <?php if(($this->mdl_items->form_value('item_tax_rate_id') and $this->mdl_items->form_value('item_tax_rate_id') == $tax_rate->tax_rate_id) or (!$this->mdl_items->form_value('item_tax_rate_id') and $this->mdl_mcb_data->setting('default_item_tax_rate_id') == $tax_rate->tax_rate_id)) { ?>selected="selected"<?php } ?>><?php echo $tax_rate->tax_rate_percent . '% - ' . $tax_rate->tax_rate_name; ?></option>
							<?php } ?>
						</select>
					</dd>
				</dl>

                <dl>
                    <dt><label><?php echo $this->lang->line('item_tax_option'); ?></label></dt>
                    <dd>
                        <select name="item_tax_option" id="item_tax_option">
                            <option value="0" <?php if (!$this->mdl_items->form_value('item_tax_option')) { ?>selected="selected"<?php } ?>><?php echo $this->lang->line('item_tax_option_0'); ?></option>
                            <option value="1" <?php if ($this->mdl_items->form_value('item_tax_option') == 1) { ?>selected="selected"<?php } ?>><?php echo $this->lang->line('item_tax_option_1'); ?></option>
                        </select>
                    </dd>
                </dl>

				<?php foreach ($custom_fields as $field) { ?>
				<dl>
					<dt><label><?php echo $field->field_name ?>: </label></dt>
					<dd><input type="text" id="<?php echo $field->column_name; ?>" name="<?php echo $field->column_name; ?>" value="<?php echo $this->mdl_items->form_value($field->column_name); ?>" /></dd>
				</dl>
				<?php } ?>

				<input type="submit" name="btn_submit_item" id="btn_submit" value="<?php echo $this->lang->line('save_item'); ?>" />
				<input type="submit" name="btn_cancel" id="btn_cancel" value="<?php echo $this->lang->line('cancel'); ?>" />

			</form>

		</div>

	</div>

</div>
<script language="javascript">
        $('#save_as_inventory').tooltip({
            position: "center right",
            tipClass: 'boxed-tooltip',
            effect: "fade",
            opacity: 0.7,
            offset: [-2, 50]
        });
		
		
		function selec_serial(srt) {

		  if (srt==""){
		  document.getElementById("mostrar_serial").innerHTML="";
		  return;
		  }
		if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
		  xmlhttp=new XMLHttpRequest();
		  }
		else{// code for IE6, IE5
		  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		xmlhttp.onreadystatechange=function(){
		  if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
					document.getElementById("mostrar_serial").innerHTML=xmlhttp.responseText;
			}
		  }
		
		xmlhttp.open("GET","<?php echo base_url();?>/index.php/invoices/items/getText?id="+srt,true);
		xmlhttp.send();
		  
}
</script>
<?php $this->load->view('dashboard/footer'); ?>

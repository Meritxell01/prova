<dl>
    <dt><?php echo $this->lang->line('default_invoice_template'); ?>: </dt>
    <dd>
        <select name="client_settings[default_invoice_template]" id="default_invoice_template">
            <?php foreach ($invoice_templates as $template){
			if($template=="default"){?>
			<option value="<?php echo $template; ?>" selected="selected"> <?php echo $template; ?></option>
			<?php }else{
			?>
            <option value="<?php echo $template; ?>"> <?php echo $template; ?></option>
            <?php } } ?>
        </select>
    </dd>
</dl>

<dl>
    <dt><?php echo $this->lang->line('default_quote_template'); ?>: </dt>
    <dd>
        <select name="client_settings[default_quote_template]" id="default_invoice_template">
            <?php foreach ($invoice_templates as $template){
			if($template=="default"){?>
			<option value="<?php echo $template; ?>" selected="selected"> <?php echo $template; ?></option>
			<?php }else{
			?>
            <option value="<?php echo $template; ?>"> <?php echo $template; ?></option>
            <?php } } ?>
        </select>
    </dd>
</dl>

<dl>
    <dt><?php echo $this->lang->line('default_invoice_group'); ?>: </dt>
    <dd>
        <select name="client_settings[default_invoice_group_id]" id="default_invoice_group_id">
           <?php foreach ($invoice_groups as $group) { 
			if($group->invoice_group_name=="Factures Compra"){?>
			<option value="<?php echo $group->invoice_group_id;?>" selected="selected"><?php echo $group->invoice_group_name; ?></option>
			<?php }else{?>
            <option value="<?php echo $group->invoice_group_id;?>"><?php echo $group->invoice_group_name; ?></option>
            <?php } } ?>
        </select>
    </dd>
</dl>

<dl>
    <dt><?php echo $this->lang->line('default_quote_group'); ?>: </dt>
    <dd>
        <select name="client_settings[default_quote_group_id]" id="default_quote_group_id">
            <?php foreach ($invoice_groups as $group) { 
			if($group->invoice_group_name=="Pressupost Venta"){?>
			<option value="<?php echo $group->invoice_group_id;?>" selected="selected"><?php echo $group->invoice_group_name; ?></option>
			<?php }else{?>
            <option value="<?php echo $group->invoice_group_id;?>"><?php echo $group->invoice_group_name; ?></option>
            <?php } } ?>
        </select>
    </dd>
</dl>

<div style="clear: both;">&nbsp;</div>

<input type="submit" id="btn_submit" name="btn_submit" value="<?php echo $this->lang->line('submit'); ?>" />
<input type="submit" id="btn_cancel" name="btn_cancel" value="<?php echo $this->lang->line('cancel'); ?>" />

<div style="clear: both;">&nbsp;</div>


<!--<dl>
    <dt>< ?php echo $this->lang->line('default_invoice_template'); ?>: </dt>
    <dd>
        <select name="client_settings[default_invoice_template]" id="default_invoice_template">
            <option value=""></option>
            < ?php foreach ($invoice_templates as $template){?>
            <option value="< ?php echo $template; ?>" < ?php if ($this->mdl_mcb_client_data->setting('default_invoice_template') == $template || $this->mdl_mcb_client_data->setting('default_invoice_template') == "default") { ?>selected="selected"< ?php } ?>>< ?php echo $template; ?></option>
            < ?php } ?>
        </select>
    </dd>
</dl>

<dl>
    <dt>< ?php echo $this->lang->line('default_quote_template'); ?>: </dt>
    <dd>
        <select name="client_settings[default_quote_template]" id="default_invoice_template">
            <option value=""></option>
            < ?php foreach ($invoice_templates as $template) { ?>
            <option value="< ?php echo $template; ?>" < ?php if ($this->mdl_mcb_client_data->setting('default_quote_template') == $template) { ?>selected="selected"< ?php } ?>>< ?php echo $template; ?></option>
            < ?php } ?>
        </select>
    </dd>
</dl>

<dl>
    <dt>< ?php echo $this->lang->line('default_invoice_group'); ?>: </dt>
    <dd>
        <select name="client_settings[default_invoice_group_id]" id="default_invoice_group_id">
            <option value=""></option>
            < ?php foreach ($invoice_groups as $group) { ?>
            <option value="< ?php echo $group->invoice_group_id; ?>" < ?php if ($this->mdl_mcb_client_data->setting('default_invoice_group_id') == $group->invoice_group_id) { ?>selected="selected"< ?php } ?>>< ?php echo $group->invoice_group_name; ?></option>
            < ?php } ?>
        </select>
    </dd>
</dl>

<dl>
    <dt>< ?php echo $this->lang->line('default_quote_group'); ?>: </dt>
    <dd>
        <select name="client_settings[default_quote_group_id]" id="default_quote_group_id">
            <option value=""></option>
            < ?php foreach ($invoice_groups as $group) { ?>
            <option value="< ?php echo $group->invoice_group_id; ?>" < ?php if ($this->mdl_mcb_client_data->setting('default_quote_group_id') == $group->invoice_group_id) { ?>selected="selected"< ?php } ?>>< ?php echo $group->invoice_group_name; ?></option>
            < ?php } ?>
        </select>
    </dd>
</dl>

<div style="clear: both;">&nbsp;</div>

<input type="submit" id="btn_submit" name="btn_submit" value="< ?php echo $this->lang->line('submit'); ?>" />
<input type="submit" id="btn_cancel" name="btn_cancel" value="< ?php echo $this->lang->line('cancel'); ?>" />

<div style="clear: both;">&nbsp;</div>-->

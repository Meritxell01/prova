<?php
$this->load->view('dashboard/header');
?>

    
    <div class="grid_10" id="content_wrapper" width="100%">
        
    <div class="section_wrapper">
        
    <h3 class="title_black"><?php echo $this->lang->line('form_expense_payment_type'); ?></h3>
    
    <?php $this->load->view('dashboard/system_messages'); ?>
    
    <div class="content toggle">
        <form method="post" action="<?php echo site_url($this->uri->uri_string()); ?>">
            <dl>
                <dt>
                    <label><?php echo $this->lang->line('expense_payment_type_name'); ?></label>
                </dt>
                <dd>
                    <input type="text" name="expense_payment_type_name" id="expense_payment_type_name" value="<?php echo $this->mdl_expense_payment_type->form_value('expense_payment_type_name'); ?>" />
                </dd>
            </dl>
            <div style="clear: both;">&nbsp;</div>

            <input type="submit" id="btn_submit" name="btn_submit" value="<?php echo $this->lang->line('submit'); ?>" />
            <input type="submit" id="btn_cancel" name="btn_cancel" value="<?php echo $this->lang->line('cancel'); ?>" />

            <div style="clear: both;">&nbsp;</div>
        </form>
    </div>
    
    </div>
    </div>

<?php $this->load->view('dashboard/footer'); ?>

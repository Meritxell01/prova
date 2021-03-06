<?php
$this->load->view('dashboard/header');
?>

    
    <div class="grid_10" id="content_wrapper" width="100%">
        
    <div class="section_wrapper">
        
    <h3 class="title_black"><?php echo $this->lang->line('form_bank'); ?></h3>
    
    <?php $this->load->view('dashboard/system_messages'); ?>
    
    <div class="content toggle">
        <form method="post" action="<?php echo site_url($this->uri->uri_string()); ?>">
            <dl>
                <dt>
                    <label><?php echo $this->lang->line('bank_name'); ?></label>
                </dt>
                <dd>
                    <input type="text" name="bank_name" id="bank_name" value="<?php echo $this->mdl_bank->form_value('bank_name'); ?>" />
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

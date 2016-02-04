<?php
$this->load->view('dashboard/header');
?>

    
    <div class="grid_10" id="content_wrapper" width="100%">
        
    <div class="section_wrapper">
        
    <h3 class="title_black"><?php echo $this->lang->line('form_provider'); ?></h3>
    
    <?php $this->load->view('dashboard/system_messages'); ?>
    
    <div class="content toggle">
        <form method="post" action="<?php echo site_url($this->uri->uri_string()); ?>">
        
            <dl>
                <dt>
                    <label><?php echo $this->lang->line('provider_name'); ?></label>
                </dt>
                <dd>
                    <input type="text" name="provider_name" id="provider_name" value="<?php echo $this->mdl_provider->form_value('provider_name'); ?>" />
                </dd>
            </dl>
            <div style="clear: both;">&nbsp;</div>
           
            <dl>
                <dt>
                    <label><?php echo $this->lang->line('provider_shortname'); ?></label>
                </dt>
                <dd>
                    <input type="text" name="provider_shortname" id="provider_shortname" value="<?php echo $this->mdl_provider->form_value('provider_shortname'); ?>" />
                </dd>
            </dl>
            <div style="clear: both;">&nbsp;</div>

            <dl>
                <dt>
                    <label><?php echo $this->lang->line('provider_tax_id'); ?></label>
                </dt>
                <dd>
                    <input type="text" name="provider_tax_id" id="provider_tax_id" value="<?php echo $this->mdl_provider->form_value('provider_tax_id'); ?>" />
                </dd>
            </dl>
            <div style="clear: both;">&nbsp;</div>
            
            <dl>
                <dt>
                    <label><?php echo $this->lang->line('provider_address'); ?></label>
                </dt>
                <dd>
                    <input type="text" name="provider_address" id="provider_address" 
						value="<?php echo $this->mdl_provider->form_value('provider_address'); ?>" />
                </dd>
            </dl>
            <div style="clear: both;">&nbsp;</div>
            
            <dl>
                <dt>
                    <label><?php echo $this->lang->line('provider_address_2'); ?></label>
                </dt>
                <dd>
                    <input type="text" name="provider_address_2" id="provider_address_2" 
						value="<?php echo $this->mdl_provider->form_value('provider_address_2'); ?>" />
                </dd>
            </dl>
            <div style="clear: both;">&nbsp;</div>
            
            <dl>
                <dt>
                    <label><?php echo $this->lang->line('provider_city'); ?></label>
                </dt>
                <dd>
                    <input type="text" name="provider_city" id="provider_city" 
						value="<?php echo $this->mdl_provider->form_value('provider_city'); ?>" />
                </dd>
            </dl>
            <div style="clear: both;">&nbsp;</div>
            
            <dl>
                <dt>
                    <label><?php echo $this->lang->line('provider_state'); ?></label>
                </dt>
                <dd>
                    <input type="text" name="provider_state" id="provider_state" 
						value="<?php echo $this->mdl_provider->form_value('provider_state'); ?>" />
                </dd>
            </dl>
            <div style="clear: both;">&nbsp;</div>
            
            <dl>
                <dt>
                    <label><?php echo $this->lang->line('provider_zip'); ?></label>
                </dt>
                <dd>
                    <input type="text" name="provider_zip" id="provider_zip" 
						value="<?php echo $this->mdl_provider->form_value('provider_zip'); ?>" />
                </dd>
            </dl>
            <div style="clear: both;">&nbsp;</div>
            
            <dl>
                <dt>
                    <label><?php echo $this->lang->line('provider_country'); ?></label>
                </dt>
                <dd>
                    <input type="text" name="provider_country" id="provider_country" 
						value="<?php echo $this->mdl_provider->form_value('provider_country'); ?>" />
                </dd>
            </dl>
            <div style="clear: both;">&nbsp;</div>
            
            <dl>
                <dt>
                    <label><?php echo $this->lang->line('provider_phone_number'); ?></label>
                </dt>
                <dd>
                    <input type="text" name="provider_phone_number" id="provider_phone_number" 
						value="<?php echo $this->mdl_provider->form_value('provider_phone_number'); ?>" />
                </dd>
            </dl>
            <div style="clear: both;">&nbsp;</div>
            
            <dl>
                <dt>
                    <label><?php echo $this->lang->line('provider_fax_number'); ?></label>
                </dt>
                <dd>
                    <input type="text" name="provider_fax_number" id="provider_fax_number" 
						value="<?php echo $this->mdl_provider->form_value('provider_phone_number'); ?>" />
                </dd>
            </dl>
            <div style="clear: both;">&nbsp;</div>
            
            <dl>
                <dt>
                    <label><?php echo $this->lang->line('provider_mobile_number'); ?></label>
                </dt>
                <dd>
                    <input type="text" name="provider_mobile_number" id="provider_mobile_number" 
						value="<?php echo $this->mdl_provider->form_value('provider_mobile_number'); ?>" />
                </dd>
            </dl>
            <div style="clear: both;">&nbsp;</div>
            
            <dl>
                <dt>
                    <label><?php echo $this->lang->line('provider_mobile_number'); ?></label>
                </dt>
                <dd>
                    <input type="text" name="provider_mobile_number" id="provider_mobile_number" 
						value="<?php echo $this->mdl_provider->form_value('provider_mobile_number'); ?>" />
                </dd>
            </dl>
            <div style="clear: both;">&nbsp;</div>
            
            <dl>
                <dt>
                    <label><?php echo $this->lang->line('provider_email_address'); ?></label>
                </dt>
                <dd>
                    <input type="text" name="provider_email_address" id="provider_email_address" 
						value="<?php echo $this->mdl_provider->form_value('provider_email_address'); ?>" />
                </dd>
            </dl>
            <div style="clear: both;">&nbsp;</div>
            
			<dl>
                <dt>
                    <label><?php echo $this->lang->line('provider_web_address'); ?></label>
                </dt>
                <dd>
                    <input type="text" name="provider_web_address" id="provider_web_address" 
						value="<?php echo $this->mdl_provider->form_value('provider_web_address'); ?>" />
                </dd>
            </dl>
            <div style="clear: both;">&nbsp;</div>
            
            <dl>
                <dt>
                    <label><?php echo $this->lang->line('provider_notes'); ?></label>
                </dt>
                <dd>
                    <textarea id="provider_notes" cols="40" rows="5" name="provider_notes"><?php echo $this->mdl_provider->form_value('provider_notes'); ?></textarea>    
                </dd>
            </dl>
            <div style="clear: both;">&nbsp;</div>

            <dl>
                <dt>
                    <label><?php echo $this->lang->line('provider_active'); ?>: </label>
                </dt>
                <dd>
                    <input type="checkbox" name="provider_active" id="provider_active" value="1" <?php if ($this->mdl_provider->form_value('provider_active') or (!$_POST and !uri_assoc('provider_id',4))) { ?>checked="checked"<?php } ?> />
                </dd>
            </dl>
            <div style="clear: both;">&nbsp;</div>

            <!--
            <dl>
                <dt>
                    <label><?php echo $this->lang->line('provider_active'); ?></label>
                </dt>
                <dd>
                    <input type="text" name="provider_active" id="provider_active" 
						value="<?php echo $this->mdl_provider->form_value('provider_active'); ?>" />
                </dd>
            </dl>
            <div style="clear: both;">&nbsp;</div>
            -->
            <input type="submit" id="btn_submit" name="btn_submit" value="<?php echo $this->lang->line('submit'); ?>" />
            <input type="submit" id="btn_cancel" name="btn_cancel" value="<?php echo $this->lang->line('cancel'); ?>" />

            <div style="clear: both;">&nbsp;</div>
        </form>
    </div>
    
    </div>
    </div>

<?php $this->load->view('dashboard/footer'); ?>

<?php $this->load->view('dashboard/header'); ?>

<?php $this->load->view('dashboard/jquery_date_picker'); ?>

<div class="container_10" id="center_wrapper">
    
    <div class="grid_8" id="content_wrapper" width="100%">
        
    <div class="section_wrapper">
        
    <h3 class="title_black"><?php echo $this->lang->line('form_expense'); ?></h3>
    
    <?php $this->load->view('dashboard/system_messages'); ?>
    
    <div class="content toggle">
        <form method="post" action="<?php echo site_url($this->uri->uri_string()); ?>" enctype="multipart/form-data" >
            <div id="tab_form">
                <?php $this->load->view('tab_form'); ?>
            </div>
        </form>
    </div>
    
    </div>
    </div>
</div>

<?php $this->load->view('dashboard/sidebar', array('side_block'=>'expenses/sidebar')); ?>

<?php $this->load->view('dashboard/footer'); ?>

<?php $this->load->view('dashboard/header'); ?>

<?php echo modules::run('invoices/widgets/generate_dialog'); ?>

<div class="grid_10" id="content_wrapper">

	<div class="section_wrapper">
		
		<h3 class="title_black"><?php
		
		if($this->uri->segment(3) == 'is_quote'){
		echo $this->lang->line('quotes');
		$this->load->view('dashboard/btn_add', array('btn_name'=>'btn_add_quote' , 'btn_value'=>$this->lang->line('create_quote')));
		}else if(uri_assoc('delivery_note_number')==2){
		echo $this->lang->line('delivery_note_number');
		$this->load->view('dashboard/btn_add', array('btn_name'=>'btn_add_delivery_note_number' , 'btn_value'=>$this->lang->line('create_delivery_note_number')));
		}else{
		echo $this->lang->line('invoices');
		$this->load->view('dashboard/btn_add', array('btn_name'=>'btn_add_invoice' , 'btn_value'=>$this->lang->line('create_invoice')));
		}
		
		?>
        </h3>

		

		<div class="content toggle no_padding">

			<?php $this->load->view('dashboard/system_messages'); ?>

			<?php 
			$data['table_id']="all_invoices";
			
			$this->load->view('invoice_table',$data); ?>

		</div>

	</div>

</div>

<?php $this->load->view('dashboard/footer'); ?>

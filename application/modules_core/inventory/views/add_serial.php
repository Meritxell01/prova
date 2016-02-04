<?php $this->load->view('dashboard/header'); ?>

<div class="grid_10" id="content_wrapper">

	<div class="section_wrapper">

		<h3 class="title_black"><?php echo $this->lang->line('add_serie'); ?></h3>

		<?php $this->load->view('dashboard/system_messages'); ?>

		<div class="content toggle">
            
			<form method="post" action="<?php echo site_url($this->uri->uri_string()); ?>">
				<div  align="left" style="width:70%">
                <?php echo "<b>ID:&nbsp;</b>".$id."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>TIPUS:</b>&nbsp;".$tipus."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>ARTICLE:&nbsp;</b>".$article?>
                </div>
                <div align="right" style="width:30%">
                <?php
				 if(isset($sn))
				 {
				   echo"<label style='color:#red'>El número de sèrie introduit és: ".$sn."<label>";
				 }elseif(isset($alert))
				 {
				   ?>
				    <script>
					 alert("Aquest número de sèrie ja existeix!!");
				    </script>
				   <?php
				 }
				?>
                </div>
                <br><br><br>
				<dl>
					<dt><label><?php echo $this->lang->line('item_serial'); ?>: </label></dt>
					<dd><input type="text" name="add_num_serie" id="add_num_serie" value=""/>
                    <input type="hidden" name="id_add" id="id_add" value="<?php echo $id;?>"/>
                    <input type="hidden" name="tipus" id="tipus" value="<?php echo $tipus;?>"/>
                    <input type="hidden" name="article" id="article" value="<?php echo $article;?>"/></dd>
				</dl>

                <div style="clear: both;">&nbsp;</div>
	            <dl>
                <dt></dt>
                <dd> 			
                <input type="submit" id="btn_submit_mes" name="btn_submit_mes" value="<?php echo $this->lang->line('submit_mes'); ?>">
				<input type="submit" id="btn_submit2" name="btn_submit2" value="<?php echo $this->lang->line('submit'); ?>">
				<input type="submit" id="btn_cancel2" name="btn_cancel2" value="<?php echo $this->lang->line('cancel'); ?>">
				</dd>
                </dl>
			</form>

		</div>

	</div>

</div>

<?php $this->load->view('dashboard/footer'); ?>

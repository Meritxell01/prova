<?php $this->load->view('dashboard/header'); ?>

<div class="grid_10" id="content_wrapper">

	<div class="section_wrapper">

		<h3 class="title_black"><?php echo $this->lang->line('add_serie'); ?></h3>

		<?php $this->load->view('dashboard/system_messages'); ?>

		<div class="content toggle">
        <div  align="left" style="width:70%">
        <?php echo "<b>ID:&nbsp;</b>".$id."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>TIPUS:</b>&nbsp;".$tipus."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>ARTICLE:&nbsp;</b>".$article?>
        <br><br><br>
        </div>
                    
			<table width="150px" style="width:170px">
                <tr><th scope="col"  style="width: 20px;">ID</th><th scope="col"  style="width: 70px;">SERIAL</th><th scope="col"  style="width: 20px;">ELIMINAR</th></tr>
            	 <?php
				foreach($query as $row){
				echo "<tr><td>".$row['inventory_type_id']."</td><td>".$row['serial']."</td><td><a href='eliminar_serial?id=".$id."&serial=".$row['serial']."'>eliminar</a></td></tr>";
				}
				?>
                 
            </table>        

				
			

		</div>

	</div>

</div>

<?php $this->load->view('dashboard/footer'); ?>
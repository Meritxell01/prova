<?php $this->load->view('dashboard/header'); ?>

<div class="grid_8" id="content_wrapper">

	<div class="section_wrapper">

		<h3 class="title_black"><?php echo $this->lang->line('inventory_numero_serie'); ?></h3>

		<?php $this->load->view('dashboard/system_messages'); ?>

		<div class="content toggle no_padding">
			<table>
				<tr>
					<th scope="col" class="first" style="width: 12%;"><?php echo $this->lang->line('id'); ?></th>
                    <th scope="col" style="width: 18%;"><?php echo $this->lang->line('type'); ?></th>
					<th scope="col" style="width: 34%;"><?php echo $this->lang->line('item'); ?></th>
                    <th scope="col" style="width: 12%;"><?php echo $this->lang->line('add'); ?></th>
					<th scope="col" style="width: 12%;"><?php echo $this->lang->line('list'); ?></th>
					<th scope="col" style="width: 12%;"><?php echo $this->lang->line('delete'); ?></th>
				</tr>
				<?php foreach ($items as $item) { ?>
				<tr>
					<td class="first"><?php echo $item->inventory_id; ?></td>
                    <td><?php echo $item->inventory_type; ?></td>
					<td><?php echo $item->inventory_name; ?></td>
                    <td>
                    <a href="<?php echo site_url('inventory/inventory_serials/addForm?id='.$item->inventory_id.'&tipus='.$item->inventory_type.'&article='.$item->inventory_name); ?>" title="<?php echo $this->lang->line('add'); ?>">
							<?php echo icon('add')." add"; ?>
						</a>
                    
                    </td>
                    <td>
                     <a href="<?php echo site_url('inventory/inventory_serials/llistarForm?id='.$item->inventory_id.'&tipus='.$item->inventory_type.'&article='.$item->inventory_name); ?>" title="<?php echo $this->lang->line('modificar'); ?>">
							<?php echo icon('modificar')."modificar"; ?>
						</a>
                    </td>
                    <td><a href="<?php echo site_url('inventory/inventory_serials/eliminarForm?id='.$item->inventory_id.'&tipus='.$item->inventory_type.'&article='.$item->inventory_name); ?>" title="<?php echo $this->lang->line('delete'); ?>">
							<?php echo icon('delete'); ?>
						</a></td>
				</tr>
				<?php } ?>
			</table>

			<?php if ($this->mdl_inventory->page_links) { ?>
			<div id="pagination">
				<?php echo $this->mdl_inventory->page_links; ?>
			</div>
			<?php } ?>
        </div>
	</div>
</div>

<?php $this->load->view('dashboard/sidebar', array('side_block'=>array('inventory/sidebar'))); ?>

<?php $this->load->view('dashboard/footer'); ?>

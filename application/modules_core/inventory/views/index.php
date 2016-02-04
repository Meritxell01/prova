<!--Script per tal de comfirmar la eliminació de factures/articles-->
<script language="JavaScript">
 function aviso(url)
 {
   if (!confirm("<?php echo $this->lang->line('are_you_sure'); ?>")) 
   {
    return false;
   }
   else 
   {
     document.location = url;
     return true;
   }
 }
</script>

<?php
if (!isset($number_of_times_per_page)) {
	$number_of_times_per_page=25;
}
?>

<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="https://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">

<link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/grocery_crud/themes/datatables/extras/TableTools/media/css/TableTools.css'?>">
 
<!-- jQuery -->
<script type="text/javascript" charset="utf8" src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>

<!-- DataTables -->
<script type="text/javascript" charset="utf8" src="https://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>

<script type="text/javascript" charset="utf8" src="<?php echo base_url() . 'assets/grocery_crud/themes/datatables/extras/TableTools/media/js/TableTools.js';?>"></script>

<script type="text/javascript" charset="utf8" src="<?php echo base_url() . 'assets/grocery_crud/themes/datatables/extras/TableTools/media/js/ZeroClipboard.js';?>"></script>	

<script>
var jq182 = jQuery.noConflict();

// add sorting methods for currency columns
jQuery.extend(jQuery.fn.dataTableExt.oSort, {
    "currency-pre": function (a) {
        a = (a === "-") ? 0 : a.replace(/[^\d\-\,]/g, "");
        return parseFloat(a);
    },
    "currency-asc": function (a, b) {
        return a - b;
    },
    "currency-desc": function (a, b) {
        return b - a;
    }
});

jq182(document).ready(function() {
   jq182('#inventory').dataTable( {
   		"sDom": 'T<"clear">lfrtip',
   		"aoColumns": [
			null,null,null,null,
			{"sType": "currency"},
			null
		],
		"oTableTools": {
            "sSwfPath": "<?php echo base_url() . 'assets/grocery_crud/themes/datatables/extras/TableTools/media/swf/copy_csv_xls_pdf.swf';?>",
			"aButtons": [
				{
					"sExtends": "copy",
					"sButtonText": "Copiar"
				},
				{
					"sExtends": "csv",
					"sButtonText": "CSV"
				},
				{
					"sExtends": "xls",
					"sButtonText": "XLS"
				},
				{
					"sExtends": "pdf",
					"sPdfOrientation": "landscape",
					"sPdfMessage": "inventari",
					"sTitle": "INVENTARI",
					"sButtonText": "PDF"
				},
				{
					"sExtends": "print",
					"sButtonText": "Imprimir"
				},
			]

        },
        "iDisplayLength": <?php echo $number_of_times_per_page;?>,
       // "aLengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "Tots"]],
        "aaSorting": [[ 1, "desc" ]],
		"oLanguage": {
			"sProcessing":   "Processant...",
			"sLengthMenu":   "Mostra _MENU_ registres",
			"sZeroRecords":  "No s'han trobat registres.",
			"sInfo":         "Mostrant de _START_ a _END_ de _TOTAL_ registres",
			"sInfoEmpty":    "Mostrant de 0 a 0 de 0 registres",
			"sInfoFiltered": "(filtrat de _MAX_ total registres)",
			"sInfoPostFix":  "",
			"sSearch":       "Filtrar:",
			"sUrl":          "",
			"oPaginate": {
				"sFirst":    "Primer",
				"sPrevious": "Anterior",
				"sNext":     "Següent",
				"sLast":     "Últim"
			}
	    }
		
	});   
} );

</script>


<?php $this->load->view('dashboard/header'); ?>

<?php $this->load->view('jquery_stock_adjustment'); ?>

<div class="grid_8" id="content_wrapper">

	<div class="section_wrapper">

		<h3 class="title_black"><?php echo $this->lang->line('inventory_items'); ?><?php $this->load->view('dashboard/btn_add', array('btn_value'=>$this->lang->line('add'))); ?></h3>

		<div class="content toggle no_padding">

			<table id="inventory">

				<thead>
				<tr>
					<th scope="col" class="first"><?php echo $this->lang->line('id'); ?></th>
                    <th scope="col" ><?php echo $this->lang->line('type'); ?></th>
                    <!--Augmentem l'espai entre els items a 30% (anteriorment estava a 25% per tal de no passar a un altra línea-->
					<th scope="col" ><?php echo $this->lang->line('item'); ?></th>
                    <th scope="col" ><?php echo $this->lang->line('stock'); ?></th>
					<th scope="col" ><?php echo $this->lang->line('price'); ?></th>
					<!--Disminuim l'espai entre els actions a 10% (anteriorment estava a 15% per tal d'alliberar espai-->
					<th scope="col" class="last" ><?php echo $this->lang->line('actions'); ?></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($items as $item) { ?>
				<tr>
					<td class="first"><?php echo $item->inventory_id; ?></td>
                    <td><?php echo $item->inventory_type; ?></td>
					<td><?php echo $item->inventory_name; ?></td>
                    <td id="stock_td_<?php echo $item->inventory_id; ?>">
                        <?php if ($item->inventory_track_stock) { ?>
                        <a href="javascript:void(0)" class="stock_adjust_link" id="<?php echo $item->inventory_id; ?>" title="<?php echo $this->lang->line('adjust_stock'); ?>"><?php echo $item->inventory_stock; ?></a>
                        <?php } else { ?>
                        --
                        <?php } ?>
                    </td>
					<td><?php echo display_currency($item->inventory_unit_price); ?></td>
					<td class="last">
						<a href="<?php echo site_url('inventory/form/inventory_id/' . $item->inventory_id); ?>" title="<?php echo $this->lang->line('edit'); ?>">
							<?php echo icon('edit'); ?>
						</a>
						<a href="<?php echo site_url('inventory/delete/inventory_id/' . $item->inventory_id); ?>" title="<?php echo $this->lang->line('delete'); ?>" onclick="javascript:if(!confirm('<?php echo $this->lang->line('confirm_delete'); ?>')) return false">
							<?php echo icon('delete'); ?>
						</a>
					</td>
				</tr>
				<?php } ?>
			</tbody>
			</table>

			<?php if ($this->mdl_inventory->page_links) { ?>
			<div id="pagination">
				<?php echo $this->mdl_inventory->page_links; ?>
			</div>
			<?php } ?>

		</div>

	</div>

</div>

<?php $this->load->view('dashboard/sidebar', array('side_block'=>'inventory/sidebar')); ?>

<?php $this->load->view('dashboard/footer'); ?>

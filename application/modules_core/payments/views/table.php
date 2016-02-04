<?php
if(!isset($show_id)) {
	$show_id=true;
}
if(!isset($table_id)) {
	$table_id="table_id_pending";
}
if(!isset($number_of_times_per_page)) {
	$number_of_times_per_page=50;
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
   jq182('#payments').dataTable( {
   		"sDom": 'T<"clear">lfrtip',
        "aLengthMenu": [[10, 25, 50,100,200,500,-1], [10, 25, 50,100,200,500,"Tots"]],
   		"aoColumns": [
			<?php if($show_id) {
				echo "null,";
			}?>
			null,null,null,
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
					"sPdfMessage": "<?php echo $table_id ?>",
					"sTitle": "<?php echo $table_id ?>",
					"sButtonText": "PDF"
				},
				{
					"sExtends": "print",
					"sButtonText": "Imprimir"
				},
			]

        },
        "iDisplayLength": <?php echo $number_of_times_per_page;?>,
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


<table style="width: 100%;" id="payments">
	<thead>
    <tr>
		<?php if (isset($sort_links) AND $sort_links == TRUE) { ?>
			<th scope="col" class="first"><?php echo anchor('payments/index/order_by/payment_id', $this->lang->line('id')); ?></th>
			<th scope="col"><?php echo anchor('payments/index/order_by/date', $this->lang->line('date')); ?></th>
			<th scope="col"><?php echo anchor('payments/index/order_by/invoice_id', $this->lang->line('invoice_number')); ?></th>
			<th scope="col"><?php echo anchor('payments/index/order_by/client', $this->lang->line('client')); ?></th>
			<th scope="col"><?php echo anchor('payments/index/order_by/amount', $this->lang->line('amount')); ?></th>
			<th scope="col" class="last"><?php echo $this->lang->line('actions'); ?></th>
		<?php } else { ?>
			<th scope="col" class="first"><?php echo $this->lang->line('id'); ?></th>
			<th scope="col"><?php echo $this->lang->line('date'); ?></th>
			<th scope="col"><?php echo $this->lang->line('invoice_number'); ?></th>
			<th scope="col"><?php echo $this->lang->line('client'); ?></th>
			<th scope="col"><?php echo $this->lang->line('amount'); ?></th>
			<th scope="col" class="last"><?php echo $this->lang->line('actions'); ?></th>
		<?php } ?>
	</tr>
</thead>
<tbody>
	<?php foreach ($payments as $payment) {
		if(!uri_assoc('payment_id') OR uri_assoc('payment_id') <> $payment->payment_id) { ?>
			<tr class="hoverall">
				<td class="first"><?php echo $payment->payment_id; ?></td>
				<td><?php echo format_date($payment->payment_date); ?></td>
				<td><?php echo $payment->invoice_number; ?></td>
				<td><?php echo anchor('clients/details/client_id/' . $payment->client_id, $payment->client_name); ?></td>
				<td><?php echo display_currency($payment->payment_amount); ?></td>
				<td class="last">
					<a href="<?php echo site_url('payments/form/invoice_id/' . $payment->invoice_id . '/payment_id/' . $payment->payment_id); ?>" title="<?php echo $this->lang->line('edit'); ?>">
						<?php echo icon('edit'); ?>
					</a>
					<a href="javascript:void(0)" class="output_link_receipt" id="<?php echo $payment->invoice_id . '-' . $payment->payment_id; ?>" title="<?php echo $this->lang->line('payment_receipt'); ?>">
						<?php echo icon('generate_receipt'); ?>
					</a>
					<a href="<?php echo site_url('payments/delete/invoice_id/' . $payment->invoice_id . '/payment_id/' . $payment->payment_id); ?>" title="<?php echo $this->lang->line('delete'); ?>" onclick="javascript:if(!confirm('<?php echo $this->lang->line('confirm_delete'); ?>')) return false">
						<?php echo icon('delete'); ?>
					</a>
				</td>
			</tr>
		<?php } ?>
	<?php } ?>
</tbody>
</table>

<?php if ($this->mdl_payments->page_links) { ?>
<div id="pagination">
	<?php echo $this->mdl_payments->page_links; ?>
</div>
<?php } ?>
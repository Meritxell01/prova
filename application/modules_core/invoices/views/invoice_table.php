<!--Script per tal de comfirmar la eliminació d'una factura/article-->
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
if(!isset($show_id)) {
	$show_id=true;
}
if(!isset($show_user)) {
	$show_user=true;
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
   jq182('#<?php echo $table_id ?>').dataTable( {
   		"sDom": 'T<"clear">lfrtip',
        "aLengthMenu": [[10, 25, 50,100,200,500,-1], [10, 25, 50,100,200,500,"Tots"]],
   		"aoColumns": [
			<?php if($show_id) {
				echo "null,";
			}?>
			null,null,null,null,null,null,
			<?php if($show_user) {
				echo "null,";
			}?>
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

<?php
$sort_links=false;
?>
<table style="width: 100%;" id="<?php echo $table_id ?>">
    <thead>
    <tr>
		<?php if($show_id): ?>
		  <th scope="col" class="first"><?php echo $this->lang->line('Id'); ?></th>
		<?php endif;?>
        <th scope="col"><?php echo $this->lang->line('status'); ?></th>
        <?php if (isset($sort_links) and $sort_links <> FALSE) { ?>
        <th scope="col">
        <?php if ($this->uri->segment(3) == 'is_quote') {
            if ($this->uri->segment(6) == 'invoice_id_asc') {
                echo anchor('invoices/index/is_quote/1/order_by/invoice_id_desc', $this->lang->line('invoice_number'));
            } else {
                echo anchor('invoices/index/is_quote/1/order_by/invoice_id_asc', $this->lang->line('invoice_number'));
            }
        } else {
            if ($this->uri->segment(4) == 'invoice_id_asc') {
                echo anchor('invoices/index/order_by/invoice_id_desc', $this->lang->line('invoice_number'));
            } else {
                echo anchor('invoices/index/order_by/invoice_id_asc', $this->lang->line('invoice_number'));
            }
        } ?>
        </th>
        <th scope="col">
        <?php if ($this->uri->segment(3) == 'is_quote') {
            if ($this->uri->segment(6) == 'date_asc') {
                echo anchor('invoices/index/is_quote/1/order_by/date_desc', $this->lang->line('date'));
            } else {
                echo anchor('invoices/index/is_quote/1/order_by/date_asc', $this->lang->line('date'));
            }
        } else {
            if ($this->uri->segment(4) == 'date_asc') {
                echo anchor('invoices/index/order_by/date_desc', $this->lang->line('date'));
            } else {
                echo anchor('invoices/index/order_by/date_asc', $this->lang->line('date'));
            }
        } ?>
        </th>
        <th scope="col">
        <?php if ($this->uri->segment(3) == 'is_quote') {
            if ($this->uri->segment(6) == 'duedate_asc') {
                echo anchor('invoices/index/is_quote/1/order_by/duedate_desc', $this->lang->line('due_date'));
            } else {
                echo anchor('invoices/index/is_quote/1/order_by/duedate_asc', $this->lang->line('due_date'));
            }
        } else {
            if ($this->uri->segment(4) == 'duedate_asc') {
                echo anchor('invoices/index/order_by/duedate_desc', $this->lang->line('due_date'));
            } else {
                echo anchor('invoices/index/order_by/duedate_asc', $this->lang->line('due_date'));
            }
        } ?>
        </th>
        <th scope="col" class="client">
        <?php if ($this->uri->segment(3) == 'is_quote') {
            if ($this->uri->segment(6) == 'client_asc') {
                echo anchor('invoices/index/is_quote/1/order_by/client_desc', $this->lang->line('client'));
            } else {
                echo anchor('invoices/index/is_quote/1/order_by/client_asc', $this->lang->line('client'));
            }
        } else {
            if ($this->uri->segment(4) == 'client_asc') {
                echo anchor('invoices/index/order_by/client_desc', $this->lang->line('client'));
            } else {
                echo anchor('invoices/index/order_by/client_asc', $this->lang->line('client'));
            }
        } ?>
        </th>

        <th scope="col"><?php echo $this->lang->line('expense_category'); ?></th>


        <?php if($show_user): ?>
		 <th scope="col"><?php echo $this->lang->line('user'); ?></th> 
		<?php endif;?>
        
        <th scope="col" class="col_amount">
        <?php if ($this->uri->segment(3) == 'is_quote') {
            if ($this->uri->segment(6) == 'amount_asc') {
                echo anchor('invoices/index/is_quote/1/order_by/amount_desc', $this->lang->line('amount'));
            } else {
                echo anchor('invoices/index/is_quote/1/order_by/amount_asc', $this->lang->line('amount'));
            }
        } else {
            if ($this->uri->segment(4) == 'amount_asc') {
                echo anchor('invoices/index/order_by/amount_desc', $this->lang->line('amount'));
            } else {
                echo anchor('invoices/index/order_by/amount_asc', $this->lang->line('amount'));
            }
        } ?>
        </th>
        <th scope="col" class="last"><?php echo $this->lang->line('actions'); ?></th>
        <?php } else { ?>
        <th scope="col"><?php echo (!uri_assoc('is_quote') ? $this->lang->line('invoice_number') : $this->lang->line('quote_number')); ?></th>
        <th scope="col"><?php echo $this->lang->line('date'); ?></th>
        <th scope="col"><?php echo $this->lang->line('due_date'); ?></th>
        <th scope="col" class="client"><?php echo $this->lang->line('client'); ?></th>
        <th scope="col"><?php echo $this->lang->line('expense_category'); ?></th>

        <?php if($show_user): ?>
         <th scope="col" >
		   <?php echo $this->lang->line('user'); ?>
		 </th>
		<?php endif;?>
        
        <th scope="col" class="col_amount"><?php echo $this->lang->line('amount'); ?></th>
        <th scope="col" class="last"><?php echo $this->lang->line('actions'); ?></th>
        <?php } ?>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($invoices as $invoice) { ?>

    <tr class="hoverall">
        <?php if($show_id): ?>
		 <td><?php echo $invoice->invoice_id; ?></td>
		<?php endif;?>
        <td class="first invoice_<?php if ($invoice->invoice_is_overdue) { ?>4<?php } else { echo $invoice->invoice_status_type; } ?>"><?php echo ($invoice->invoice_is_overdue) ? $this->lang->line('overdue') : $invoice->invoice_status; ?></td>
        <td><?php echo invoice_id($invoice); ?></td>
        <td><?php echo format_date($invoice->invoice_date_entered); ?></td>
        <td><?php echo format_date($invoice->invoice_due_date); ?></td>
        <td class="client"><?php echo anchor('clients/details/client_id/' . $invoice->client_id, character_limiter($invoice->client_name, 20)); ?></td>

        <td class="client">
            <?php if ($invoice->invoice_category_id!=0) {
                echo $invoice->expense_category_name; 
            } else {
                echo "Sense especificar";
            }
            ?>
        </td>
        
        <?php if($show_user): ?>
		
			<td>
			<?php 
			if (isset($invoice->username)) {
				echo anchor('users/details/user_id/' . $invoice->user_id, character_limiter($invoice->username, 20)); 
			} else {
				echo "";
			}
			?>
			</td> 
	 
		<?php endif;?>
        
        
        <td class="col_amount"><span style="white-space: nowrap;"><?php echo display_currency($invoice->invoice_total); ?></span></td>
        <td class="last">
            <a href="<?php echo site_url('invoices/edit/invoice_id/' . $invoice->invoice_id); ?>" title="<?php echo $this->lang->line('edit'); ?>">
            <?php echo icon('edit'); ?>
            </a>
            <a href="javascript:void(0)" class="output_link" id="<?php echo $invoice->invoice_id . ':' . $invoice->client_id . ':' . $invoice->invoice_is_quote; ?>" title="<?php echo $this->lang->line('generate'); ?>">
            <?php echo icon('generate_invoice'); ?>
            </a>
            <!--Aquí modifiquem la ruta d'on actuarà l'script per tal de confirmar la eliminació d'un article/factura-->
            <!--<a href="< ?php echo site_url('invoices/delete/invoice_id/' . $invoice->invoice_id); ?>" title="< ?php echo $this->lang->line('delete'); ?>" onclick="javascript:if(!confirm('< ?php echo $this->lang->line('confirm_delete'); ?>')) return false">
            < ?php echo icon('delete'); ?>
            </a>-->
            <a href="javascript:;" onclick="aviso('<?php echo site_url('invoices/delete/invoice_id/' . $invoice->invoice_id); ?>');  return false;"><?php echo icon('delete'); ?></a>
        </td>
    </tr>

        <?php } ?>
        </tbody>
</table>

<?php if ($this->mdl_invoices->page_links) { ?>
<div id="pagination">
<?php echo $this->mdl_invoices->page_links; ?>
</div>
<?php } ?>

<!--Script per tal de comfirmar la eliminació d'una factura/article-->
<script language="JavaScript">

function addCommas(nStr)
{
    nStr += '';
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
}

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


jq182.fn.dataTableExt.afnFiltering.push(
    function( oSettings, aData, iDataIndex ) {
        var iFini = document.getElementById('fini').value;
        var iFfin = document.getElementById('ffin').value;
        var iStartDateCol = 6;
        var iEndDateCol = 7;
         
        iFini=iFini.substring(6,10) + iFini.substring(3,5)+ iFini.substring(0,2)
        iFfin=iFfin.substring(6,10) + iFfin.substring(3,5)+ iFfin.substring(0,2)       
         
        var datofini=aData[iStartDateCol].substring(6,10) + aData[iStartDateCol].substring(3,5)+ aData[iStartDateCol].substring(0,2);
        var datoffin=aData[iEndDateCol].substring(6,10) + aData[iEndDateCol].substring(3,5)+ aData[iEndDateCol].substring(0,2);
         
        if ( iFini == "" && iFfin == "" )
        {
            return true;
        }
        else if ( iFini <= datofini && iFfin == "")
        {
            return true;
        }
        else if ( iFfin >= datoffin && iFini == "")
        {
            return true;
        }
        else if (iFini <= datofini && iFfin >= datoffin)
        {
            return true;
        }
        return false;
    }
);

jQuery.extend( jQuery.fn.dataTableExt.oSort, {
    "date-uk-pre": function ( a ) {
        var ukDatea = a.split('/');
        var value= (ukDatea[2] + ukDatea[1] + ukDatea[0]) * 1;
        if (isNaN(value)) {
         return 0;
        }
        return (ukDatea[2] + ukDatea[1] + ukDatea[0]) * 1;
    },
 
    "date-uk-asc": function ( a, b ) {
        return ((a < b) ? -1 : ((a > b) ? 1 : 0));
    },
 
    "date-uk-desc": function ( a, b ) {
        return ((a < b) ? 1 : ((a > b) ? -1 : 0));
    }
});


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

    var oTable = jq182('#invoices').dataTable();
         
    /* Add event listeners to the two range filtering inputs */
    jq182('#fini').keyup( function() { oTable.fnDraw(); } );
    jq182('#ffin').keyup( function() { oTable.fnDraw(); } );
    
    jq182('#invoices').dataTable( {
   		"sDom": 'T<"clear">lfrtip',
        "aLengthMenu": [[10, 25, 50,100,200,500,-1], [10, 25, 50,100,200,500,"Tots"]],
        "aoColumns": [
			null,null,null,{"sType": "date-uk"},{"sType": "date-uk"},
			{"sType": "currency"}
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
					"sPdfMessage": "Factures",
					"sTitle": "Factures",
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
	    },
		"fnFooterCallback": function ( nRow, aaData, iStart, iEnd, aiDisplay ) {
            /*
             * Calculate the total market share for all browsers in this table (ie inc. outside
             * the pagination)
             */
            var totalAmount = "0.00";
            for ( var i=0 ; i<aaData.length ; i++ )
            {
                amount=aaData[i][5];
                //First remove points used for aestithic reasons:
                replaced_amount=amount.replace(".", "");
                //Now replace decimal point form , to .
                replaced_amount=replaced_amount.replace(",", ".");
                totalAmount = parseFloat(totalAmount) + parseFloat(replaced_amount);
            }

            var pageTotalAmount = "0.00";
            for ( var i=iStart ; i<iEnd ; i++ )
            {
                console.log("i: "+i);
                console.log("aiDisplay: " + aiDisplay[i]);
                console.log("pageAmount: " + aaData[aiDisplay[i]][5]);
                pageAmount = aaData[aiDisplay[i]][5];
                replaced_amount=pageAmount.replace(".", "");
                replaced_page_amount=replaced_amount.replace(",", ".");
                console.log("replaced_page_amount: " + replaced_page_amount);

                pageTotalAmount = parseFloat(pageTotalAmount) + parseFloat(replaced_page_amount);
                console.log("pageTotalAmount: " + pageTotalAmount);                
            }
            
            /* Modify the footer row to match what we want */
            var nCells = nRow.getElementsByTagName('th');
            nCells[1].innerHTML = addCommas(pageTotalAmount.toFixed(2)) + " € ( d'un total de " +  addCommas(totalAmount.toFixed(2)) + " €)";
        }
	});   
} );

</script>

<?php
$sort_links=false;
?>

<table style="width: 100%;" id="invoices">
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
        <th scope="col" class="col_amount"><?php echo $this->lang->line('amount'); ?></th>
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
        <td class="col_amount last"><?php echo display_currency($invoice->invoice_total); ?></td>
    </tr>

        <?php } ?>
        </tbody>
    <tfoot>
        <tr>
            <th colspan="5" style="text-align:right" rowspan="1">Subtotal:</th>
            <th rowspan="1" colspan="1">TODO</th>
        </tr>
    </tfoot>    
</table>

<?php if ($this->mdl_invoices->page_links) { ?>
<div id="pagination">
<?php echo $this->mdl_invoices->page_links; ?>
</div>
<?php } ?>

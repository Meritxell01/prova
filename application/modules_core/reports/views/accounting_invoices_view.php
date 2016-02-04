<script>

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

var asInitVals = new Array();

$(document).ready(function() {
   
   var oTable = $('#accounting_invoices').dataTable( {
        "sDom": 'T<"clear">lfrtip',
        "aLengthMenu": [[10, 25, 50,100,200,500,1000,2000,-1], [10, 25, 50,100,200,500,1000,2000,"Tots"]],
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
                    "sPdfMessage": "TODO",
                    "sTitle": "TODO",
                    "sButtonText": "PDF"
                },
                {
                    "sExtends": "print",
                    "sButtonText": "Imprimir"
                },
            ]
        },
        "iDisplayLength": 100,
        "aaSorting": [[ 1, "desc" ]],
        "oLanguage": {
            "sProcessing":   "Processant...",
            "sLengthMenu":   "Mostra _MENU_ registres",
            "sZeroRecords":  "No s'han trobat registres.",
            "sInfo":         "Mostrant de _START_ a _END_ de _TOTAL_ registres",
            "sInfoEmpty":    "Mostrant de 0 a 0 de 0 registres",
            "sInfoFiltered": "(filtrat de _MAX_ total registres)",
            "sInfoPostFix":  "",
            "sSearch":       "Filtrar tots els camps:",
            "sUrl":          "",
            "oPaginate": {
                "sFirst":    "Primer",
                "sPrevious": "Anterior",
                "sNext":     "Següent",
                "sLast":     "Últim"
            }
        }
        
    });  

    $("thead input").keyup( function () {
        /* Filter on the column (the index) of this element */
        oTable.fnFilter( this.value, $("thead input").index(this) );
    } );
    
    
    
    /*
     * Support functions to provide a little bit of 'user friendlyness' to the textboxes in 
     * the footer
     */
    $("thead input").each( function (i) {
        asInitVals[i] = this.value;
    } );
    
    $("thead input").focus( function () {
        if ( this.className == "search_init" )
        {
            this.className = "";
            this.value = "";
        }
    } );
    
    $("thead input").blur( function (i) {
        if ( this.value == "" )
        {
            this.className = "search_init";
            this.value = asInitVals[$("thead input").index(this)];
        }
    } );



} );

</script>

<?php //print_r($invoices);?>

<table style="width: 100%;" id="accounting_invoices">
    <thead>
        <tr>
            <th><input type="text" name="<?php echo $this->lang->line('accounting_invoices_id'); ?>" value="<?php echo $this->lang->line('accounting_invoices_id'); ?>" class="search_init" style="width:2em;font-size:11px;"  /></th>
            <th><input type="text" name="<?php echo $this->lang->line('accounting_invoices_status'); ?>" value="<?php echo $this->lang->line('accounting_invoices_status'); ?>" class="search_init" style="width:4em;font-size:11px;" /></th>
            <th><input type="text" name="<?php echo $this->lang->line('accounting_invoices_category'); ?>" value="<?php echo $this->lang->line('accounting_invoices_category'); ?>" class="search_init" style="width:6em;font-size:11px;"/></th>
            <th><input type="text" name="<?php echo $this->lang->line('accounting_invoices_category_name'); ?>" value="<?php echo $this->lang->line('accounting_invoices_category_name'); ?>" class="search_init" style="width:6em;font-size:11px;"/></th>
            <th><input type="text" name="<?php echo $this->lang->line('accounting_invoices_date'); ?>" value="<?php echo $this->lang->line('accounting_invoices_date'); ?>" class="search_init" style="width:5em;font-size:11px;"/></th>

            <th><input type="text" name="<?php echo $this->lang->line('accounting_invoices_invoice_number'); ?>" value="<?php echo $this->lang->line('accounting_invoices_invoice_number'); ?>" class="search_init" style="width:6em;font-size:11px;"/></th>
            <th><input type="text" name="<?php echo $this->lang->line('accounting_invoices_client'); ?>" value="<?php echo $this->lang->line('accounting_invoices_client'); ?>" class="search_init" style="width:6em;font-size:11px;"/></th>
            <th><input type="text" name="<?php echo $this->lang->line('accounting_invoices_client_name'); ?>" value="<?php echo $this->lang->line('accounting_invoices_client_name'); ?>" class="search_init" style="width:8em;font-size:11px;"/></th>
            <th><input type="text" name="<?php echo $this->lang->line('accounting_invoices_client_taxid'); ?>" value="<?php echo $this->lang->line('accounting_invoices_client_taxid'); ?>" class="search_init" style="width:6em;font-size:11px;"/></th>
            <th><input type="text" name="<?php echo $this->lang->line('accounting_invoices_base'); ?>" value="<?php echo $this->lang->line('accounting_invoices_base'); ?>" class="search_init" style="width:4em;font-size:11px;"/></th>
            <th><input type="text" name="<?php echo $this->lang->line('accounting_invoices_tax1_rate');?>" value="<?php echo $this->lang->line('accounting_invoices_tax1_rate');?>" class="search_init" style="width:3em;font-size:11px;"/></th>
            <th><input type="text" name="<?php echo $this->lang->line('accounting_invoices_tax1_amount'); ?>" value="<?php echo $this->lang->line('accounting_invoices_tax1_amount'); ?>" class="search_init" style="width:2em;font-size:11px;"/></th>
            <th><input type="text" name="<?php echo $this->lang->line('accounting_invoices_tax2_rate'); ?>" value="<?php echo $this->lang->line('accounting_invoices_tax2_rate'); ?>" class="search_init" style="width:4em;font-size:11px;"/></th>
            <th><input type="text" name="<?php echo $this->lang->line('accounting_invoices_tax2_amount'); ?>" value="<?php echo $this->lang->line('accounting_invoices_tax2_amount'); ?>" class="search_init" style="width:2em;font-size:11px;"/></th>
            <th><input type="text" name="<?php echo $this->lang->line('accounting_invoices_total_amount'); ?>" value="<?php echo $this->lang->line('accounting_invoices_total_amount'); ?>" class="search_init" style="width:3em;font-size:11px;"/></th>
            <th><input type="text" name="<?php echo $this->lang->line('accounting_invoices_payment_type'); ?>" value="<?php echo $this->lang->line('accounting_invoices_payment_type'); ?>" class="search_init" style="width:4em;font-size:11px;"/></th>
            <th><input type="text" name="s<?php echo $this->lang->line('accounting_invoices_bank'); ?>" value="<?php echo $this->lang->line('accounting_invoices_bank'); ?>" class="search_init" style="width:4em;font-size:11px;"/></th>
            <th><input type="text" name="<?php echo $this->lang->line('accounting_invoices_paymentdate'); ?>" value="<?php echo $this->lang->line('accounting_invoices_paymentdate'); ?>" class="search_init" style="width:4em;font-size:11px;"/></th>

        </tr>

    <tr>
        <th scope="col" class="first"><?php echo $this->lang->line('accounting_invoices_id'); ?></th>
        <th scope="col"><?php echo $this->lang->line('accounting_invoices_status'); ?></th>
        <th scope="col"><?php echo $this->lang->line('accounting_invoices_category'); ?></th>
        <th scope="col"><?php echo $this->lang->line('accounting_invoices_category_name'); ?></th>
        <th scope="col"><?php echo $this->lang->line('accounting_invoices_date'); ?></th>
        <th scope="col"><?php echo $this->lang->line('accounting_invoices_invoice_number'); ?></th>
        <th scope="col"><?php echo $this->lang->line('accounting_invoices_client'); ?></th>
        <th scope="col"><?php echo $this->lang->line('accounting_invoices_client_name'); ?></th>
        <th scope="col"><?php echo $this->lang->line('accounting_invoices_client_taxid'); ?></th>
        <th scope="col"><?php echo $this->lang->line('accounting_invoices_base'); ?></th>  
        <th scope="col"><?php echo $this->lang->line('accounting_invoices_tax1_rate');?></th>
        <th scope="col"><?php echo $this->lang->line('accounting_invoices_tax1_amount'); ?></th>
        <th scope="col"><?php echo $this->lang->line('accounting_invoices_tax2_rate'); ?></th>
        <th scope="col"><?php echo $this->lang->line('accounting_invoices_tax2_amount'); ?></th>
        <th scope="col"><?php echo $this->lang->line('accounting_invoices_total_amount'); ?></th>
        <th scope="col"><?php echo $this->lang->line('accounting_invoices_payment_type'); ?></th>
        <th scope="col"><?php echo $this->lang->line('accounting_invoices_bank'); ?></th>
        <th scope="col" class="last"><?php echo $this->lang->line('accounting_invoices_paymentdate'); ?></th>
    </tr>
    </thead>

    <tbody>
    <?php foreach ($invoices as $invoice) { ?>

    <tr>
        <td class="first"><?php echo $invoice->invoice_id; ?></td>
        <td><?php echo $invoice->invoice_status; ?></td>
        <td><?php echo $invoice->invoice_category_id; ?></td>
        <td><?php echo $invoice->expense_category_name; ?></td>
        <td><?php echo format_date($invoice->invoice_date_entered); ?></td>
        <td><?php echo $invoice->invoice_number; ?></td>
        <td><?php echo $invoice->client_id; ?></td>
        <td><?php echo $invoice->client_name; ?></td>
        <td><?php echo $invoice->client_tax_id; ?></td>
        <td><?php echo display_currency($invoice->invoice_item_subtotal); ?></td>
        <td>
        <?php 
        
        $subtotal = $invoice->invoice_item_subtotal;

        if ( $subtotal != 0 ) {
            $count1 = $invoice->invoice_item_tax / $subtotal;
            $count2 = $count1 * 100;
            $count = number_format($count2, 0);
            echo $count . " %";
        }
        else {
            echo "0 %";
        };?></td>
        <td><?php echo display_currency($invoice->invoice_item_tax); ?></td>
        <td>0 %</td>
        <td>0,00 €</td>
        <td><?php echo display_currency($invoice->invoice_total); ?></td>
        <td><?php echo $invoice->payment_method; ?></td>
        <td>TODO subcompte Banc Segons ZAPATER</td>
        <td class="last"><?php echo format_date($invoice->invoice_payment_date); ?></td>
    </tr>

    <?php } ?>
</tbody>
</table>

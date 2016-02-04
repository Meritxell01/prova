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
   jq182('#clients').dataTable( {
   		"sDom": 'T<"clear">lfrtip',
   		"aoColumns": [
			null,null,
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
					"sPdfMessage": "clients",
					"sTitle": "CLIENTS",
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

<?php $this->load->view('dashboard/header'); ?>

<div class="grid_8" id="content_wrapper">

    <div class="section_wrapper">

        <h3 class="title_black"><?php echo $this->lang->line('clients'); ?><?php $this->load->view('dashboard/btn_add', array('btn_name'=>'btn_add_client', 'btn_value'=>$this->lang->line('add_client'))); ?></h3>

        <?php $this->load->view('dashboard/system_messages'); ?>

        <div class="content toggle no_padding">

            <table id="clients">
                <thead>
                <tr>
  		           <?php if (isset($sort_links) and $sort_links <> FALSE) : ?>

                    <th scope="col" class="first">
                        <?php if ($this->uri->segment(4) == 'client_id_desc') {
                            echo anchor('clients/index/order_by/client_id_asc', $this->lang->line('id'));
                        } else {
                            echo anchor('clients/index/order_by/client_id_desc', $this->lang->line('id'));
                        } ?>
                    </th>
                    <th scope="col" >
                        <?php if ($this->uri->segment(4) == 'client_name_desc') {
                            echo anchor('clients/index/order_by/client_name_asc', $this->lang->line('name'));
                        } else {
                            echo anchor('clients/index/order_by/client_name_desc', $this->lang->line('name'));
                        } ?>
                    </th>
                    <th scope="col" >
                        <?php if ($this->uri->segment(4) == 'balance_desc') {
                            echo anchor('clients/index/order_by/balance_asc', $this->lang->line('balance'));
                        } else {
                            echo anchor('clients/index/order_by/balance_desc', $this->lang->line('balance'));
                        } ?>
                    </th>
                    
                    <?php else : ?>
                    
                    <th scope="col" class="first">
						<?php echo $this->lang->line('id');?>
                    </th>
                    <th scope="col" >
                        <?php echo $this->lang->line('name');?>
                    </th>
                    <th scope="col" >
                        <?php echo $this->lang->line('balance');?>
                    </th>
                    
                    <?php endif;?>

                    
                    <th scope="col" class="last"><?php echo $this->lang->line('actions'); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($clients as $client) { ?>
                <tr class="hoverall">
                    <td class="first"><?php echo $client->client_id; ?></td>
                    <td nowrap="nowrap"><?php echo $client->client_name; ?></td>
                    <td><?php echo display_currency($client->client_total_balance); ?></td>
                    <td class="last">
                        <a href="<?php echo site_url('clients/details/client_id/' . $client->client_id); ?>" title="<?php echo $this->lang->line('view'); ?>">
                        <?php echo icon('zoom'); ?>
                        </a>
                        <a href="<?php echo site_url('clients/form/client_id/' . $client->client_id); ?>" title="<?php echo $this->lang->line('edit'); ?>">
                        <?php echo icon('edit'); ?>
                        </a>
                        <!--<a href="< ?php echo site_url('clients/delete/client_id/' . $client->client_id); ?>" title="< ?php echo $this->lang->line('delete'); ?>" onclick="javascript:if(!confirm('< ?php echo $this->lang->line('client_delete_warning'); ?>')) return false">
                        < ?php echo icon('delete'); ?>
                        </a>-->
                        <!--Aquí cridem a l'script per tal d'eliminar factures/articles/clients-->
						<a href="javascript:;" onclick="aviso('<?php echo site_url('clients/delete/client_id/' . $client->client_id); ?>');  return false;"><?php echo icon('delete'); ?>
						</a>
                        <?php if  ($client->client_active) { ?>
                        <a href="<?php echo site_url('invoices/create/client_id/' . $client->client_id); ?>" title="<?php echo $this->lang->line('create_invoice'); ?>">
                        <?php echo icon('invoice'); ?>
                        </a>
                        <a href="<?php echo site_url('invoices/create/quote/client_id/' . $client->client_id); ?>" title="<?php echo $this->lang->line('create_quote'); ?>">
                        <?php echo icon('quote'); ?>
                        </a>
                        <?php } ?>
                    </td>
                </tr>
                    <?php } ?>
                    </tbody>
            </table>

            <?php if ($this->mdl_clients->page_links) { ?>
            <div id="pagination">
            <?php echo $this->mdl_clients->page_links; ?>
            </div>
            <?php } ?>

        </div>

    </div>

</div>

<?php $this->load->view('dashboard/sidebar', array('side_block'=>'clients/sidebar')); ?>

<?php $this->load->view('dashboard/footer'); ?>

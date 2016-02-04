<?php
$this->load->view('dashboard/header'); 
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
	
jq182(document).ready(function() {
   jq182('#providers').dataTable( {
   		"sDom": 'T<"clear">lfrtip',
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
					"sPdfMessage": "Alumnes del grup",
					"sTitle": "TODO",
					"sButtonText": "PDF"
				},
				{
					"sExtends": "print",
					"sButtonText": "Imprimir"
				},
			]

        },
        "iDisplayLength": 50,
        "aaSorting": [[ 2, "asc" ],[ 3, "asc" ],[ 4, "asc" ]],
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


<div class="grid_8" id="content_wrapper">
    
    <div class="section_wrapper">
        <h3 class="title_black"><?php echo $this->lang->line('list_provider'); ?>
            <?php $this->load->view('dashboard/btn_add', array('btn_value'=>$this->lang->line('add_provider_btn'))); ?>
        </h3>
        
        <?php $this->load->view('dashboard/system_messages'); ?>
        
        <div class="content toggle no_padding">
            
            <table id="providers">
				<thead>
                <tr>
                    <th scope="col" class="first" style="width: 5%;"><?php echo $this->lang->line('id'); ?></th>
                    <th scope="col" style="width: 10%;"><?php echo $this->lang->line('provider_tax_id'); ?></th>
                    <th scope="col" style="width: 30%;"><?php echo $this->lang->line('name'); ?></th>
                    <th scope="col" style="width: 30%;"><?php echo $this->lang->line('shortname'); ?></th>
                    <th scope="col" class="last" style="width: 15%;"><?php echo $this->lang->line('actions'); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($providers as $provider) { ?>
                <tr>
                    <td><?php echo $provider->provider_id; ?></td>
                    <td><?php echo $provider->provider_tax_id; ?></td>
                    <td><?php echo $provider->provider_name; ?></td>
                    <td><?php echo $provider->provider_shortname?></td>

                    <td>
                        <a href="<?php echo site_url('expenses/provider/form/provider_id/'.$provider->provider_id); ?>" title="<?php echo $this->lang->line('edit'); ?>">
                            <?php echo icon('edit'); ?>
			</a>
			<a href="<?php echo site_url('expenses/provider/delete/provider_id/' . $provider->provider_id); ?>" title="<?php echo $this->lang->line('delete'); ?>" onclick="javascript:if(!confirm('<?php echo $this->lang->line('confirm_delete'); ?>')) return false">
                            <?php echo icon('delete'); ?>
                        </a>
                    </td>
                </tr>
                <?php } ?>
                </tbody>
            </table>
            
        </div>
    </div>
    
</div>

<?php $this->load->view('dashboard/sidebar', array('side_block'=>'expenses/sidebar_item')); ?>
<?php $this->load->view('dashboard/footer'); ?>

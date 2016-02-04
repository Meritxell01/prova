<?php $this->load->view('dashboard/header'); ?>


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
   jq182('#expenses').dataTable( {
   		"sDom": 'T<"clear">lfrtip',
                "aLengthMenu": [[10, 25, 50,100,200,500,-1], [10, 25, 50,100,200,500,"Tots"]],
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
        "aoColumns": [null,{ "sType": "date-uk" },null,null,null,null,{ "sType": "date-uk" },{ "sType": "currency" },null,null,{ "sType": "date-uk" },null,null],        
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

<?php // $this->load->model('mdl_expense_file'); ?>

<?php $this->load->view('dashboard/jquery_date_picker'); ?>

<div class="grid_10" id="content_wrapper">
    <div class="section_wrapper">
        <h3 class="title_black"><?php echo $this->lang->line('list_expense'); ?>
            <?php $this->load->view('dashboard/btn_add', array('btn_value'=>$this->lang->line('add_expense_btn'))); ?>
        </h3>
    
        <?php $this->load->view('dashboard/system_messages'); ?>
        
       <div class="search">
           <form id="" name="search" method="POST" action="<?php echo site_url($this->uri->uri_string()); ?>">
                            <?php echo $this->lang->line('from_date'); ?>
                            <input type="text" id="from_date" name="from_date" class="datepicker" value="">
                            <?php echo $this->lang->line('to_date'); ?>
                            <input type="text" name="to_date" id="to_date" class="datepicker" value="">
                            <a href="#" id="btn_search" name="btn_search" title="<?php echo $this->lang->line('search'); ?>">
                                <?php echo icon('search'); ?>
                            </a>
                            
           </form>
        </div>
        <div id="message"></div>
        <div class="content toggle no_padding" id="results">
        
        <table style="width: 100%;" id="expenses">
		 <thead>
            <tr>
				<th scope="col" class="first" style="width: 1%;"><?php echo $this->lang->line('mcb_expense_id'); ?></th>
				<th scope="col" class="first" style="width: 1%;"><?php echo $this->lang->line('expense_invoice_date'); ?></th>
                <th scope="col" style="width: 1%;"><?php echo $this->lang->line('expense_invoice_id'); ?></th>
                <th scope="col" style="width: 1%;"><?php echo $this->lang->line('expense_book_keeping_entry_id'); ?></th>
                <th scope="col" style="width: 10%;"><?php echo $this->lang->line('expense_provider_id'); ?></th>
                <th scope="col" style="width: 10%;"><?php echo $this->lang->line('category'); ?></th>
                <th scope="col" style="width: 1%;"><?php echo $this->lang->line('expense_overdue_date'); ?></th>
                <th scope="col" style="width: 1%;"><?php echo $this->lang->line('amount'); ?></th>
                <th scope="col" style="width: 10%;"><?php echo $this->lang->line('note'); ?></th>
                <th scope="col" style="width: 1%;"><?php echo $this->lang->line('expense_payed'); ?></th>
                <th scope="col" style="width: 1%;"><?php echo $this->lang->line('expense_payment_date'); ?></th>
                <th scope="col" style="width: 5%;"><?php echo $this->lang->line('attactment'); ?></th>
                <th scope="col" class="last" style="width: 10%;"><?php echo $this->lang->line('actions'); ?></th>
            </tr>
         </thead>
         <tbody>   
				
                <?php foreach ($expenses as $expen) { ?>
                <tr>
					<td class="first">
					  <?php echo $expen->mcb_expense_id; ?>
					</td>
					<span class="expense_invoice_date" id="expense_invoice_date" title="click to edit"><td><?php echo format_date($expen->expense_invoice_date); ?></td></span>
					<td><?php echo $expen->expense_invoice_number; ?></td>
					<td><?php echo $expen->expense_book_keeping_entry_id; ?></td>
                    <td><?php echo $this->mdl_expenses->get_provider_name($expen->expense_provider_id); ?></td>
					<td><?php echo $expen->expense_category_name; ?></td>
                    <td><?php echo format_date($expen->expense_invoice_overdue_date); ?></td>
                    <td><span style="white-space: nowrap;"><?php echo display_currency($expen->mcb_expense_amount); ?></span></td>
                
                    <td><font size="-3"><?php echo $expen->mcb_expense_note; ?></font></td>
                    <td>
						<?php if ($expen->expense_payed) {
							echo "S";
						}	else {
							echo "N";
						}
						
						; ?>
                    </td>
                    <td><?php echo $expen->expense_payment_date; ?></td>
                    <td><a href="javascript:void(0)" class="popup_file" id="<?php echo $expen->mcb_expense_id; ?>" onclick="return false;">
                        <?php 
                               $files = $this->mdl_expense_file->get_files($expen->mcb_expense_id);
                               ?>
                            <table style="width: 100%;">
                                <?php
                                    foreach ($files as $row) {

                                        ?>
                                            <tr>
                                                <td>
													
                                                    <?php echo base64_decode(basename($row->mcb_expense_file_title)); ?>
                                                </td>
                                            </tr>
                                    <?php    
                                    }
                            ?>
                            </table> 
                            <?php
                         ?>
                        </a>
                    </td>
                    <td>
                        <a href="<?php echo site_url('expenses/form/mcb_expense_id/' . $expen->mcb_expense_id); ?>" title="<?php echo $this->lang->line('edit'); ?>">
                            <?php echo icon('edit'); ?>
			</a>
			<a onclick="if(!confirm('<?php echo $this->lang->line('are_you_sure_to_delete')?>')) { return false };" href="<?php echo site_url('expenses/delete/mcb_expense_id/'. $expen->mcb_expense_id); ?>" title="<?php echo $this->lang->line('delete'); ?>" onclick="javascript:if(!confirm('<?php echo $this->lang->line('confirm_delete'); ?>')) return false">
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

<div id="popup_files" style="display: inline;"></div>

<script type="text/javascript">
    
    $(function() {
       $('#btn_search').click(function() {
           if ($('#from_date').val() != '' || $('#to_date').val() != '') {
           $('#results').html('<font color="#00FF33"><?php echo icon('indicator'); ?><i>Loading...</i></font>');
            $.ajax({
                    type:"POST",
                    url:"<?php echo site_url('expenses/expenses/ajax_search'); ?>", // trang cần xử lý (tức là controller là category có function là search)
                    data:"date_form="+$('#from_date').val()+"&to_date="+$('#to_date').val(), // Lấy dữ liệu của txt gửi đi
                    success:function(x){
                        $('#results').html(x);
                    }
                });  
            } else {
                return false;
            }

       });
    });
    
    $(function() {
        $('.popup_file').click(function() {
            
            expense_id = $(this).attr('id');
            
            $.ajax({
                type: "POST",
                url:"<?php echo site_url('expenses/expenses/files_options'); ?>",
                data: "expense_id="+expense_id,
                success: function(x) {
                    $('#popup_files').html(x).dialog({
                     autoOpen: true,
                     bgiframe: true,
                     resizable: false,
                     width: 800,
                     modal: true,
                     title: 'Files upload',
                     overlay: {
                         backgroundColor: '#000000',
                         opacity: 1
                     },
                     buttons: {
                         
                         'Cancel': function() {
                             $(this).dialog('close');
                         }
                }
            });
            $('.popup_files').dialog('open');
          }
                
        });
      });
    });
    
    
$(function() {
   
   $('#add_more').click(function() {
       count_assign = parseInt($('#count_assign').val());
       count_more = count_assign + 1;
       
       $('#add-more').append('<dl id="assign_more_'+count_more+'"><dt></dt><dd><input type="file" name="userfile" id="userfile'+count_more+'" multiple="multiple" /><a href="#" onclick="return false;" id="remove"><?php echo icon('delete'); ?></a></dd></dl>');
       $('#count_assign').val(count_more);
       
        $('#remove').click(function() {
            $('#assign_more_'+count_more).remove();
        });
   });
   
   
});
</script>

<?php // $this->load->view('dashboard/sidebar', array('side_block'=>'expenses/sidebar')); ?>

<?php $this->load->view('dashboard/footer'); ?>

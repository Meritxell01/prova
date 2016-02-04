
<dl>
    <dt>
    <label><?php echo $this->lang->line('expense_name'); ?> (<?php echo $this->lang->line('optional'); ?>)</label>
    </dt>
    <dd>
        <input type="text" name="mcb_expense_name" id="mcb_expense_name" value="<?php echo $this->mdl_expenses->form_value('mcb_expense_name'); ?>">
    </dd>
</dl>
<dl>
    <dt>
    <label><?php echo $this->lang->line('expense_invoice_yesno'); ?></label>
    </dt>
    <dd>
        <input type="checkbox" name="expense_invoice_yesno" id="expense_invoice_yesno" 
        
        <?php 
        if ($this->mdl_expenses->form_value('expense_invoice_yesno')) {
			echo 'checked="checked"';
		}
        ?> 
        
        value="expense_invoice_yesno">
    </dd>
</dl>
<dl>
    <dt>
    <label><?php echo $this->lang->line('expense_invoice_id'); ?></label>
    </dt>
    <dd>
        <input type="text" name="expense_invoice_number" id="expense_invoice_number" value="<?php echo $this->mdl_expenses->form_value('expense_invoice_number'); ?>">
    </dd>
</dl>
<dl>
    <dt>
    <label><?php echo $this->lang->line('expense_book_keeping_entry_id_full'); ?></label>
    </dt>
    <dd>
        <input type="text" name="expense_book_keeping_entry_id" id="expense_book_keeping_entry_id" value="<?php echo $this->mdl_expenses->form_value('expense_book_keeping_entry_id'); ?>">
    </dd>
</dl>
<dl>
    <dt>
        <label><?php echo $this->lang->line('expense_provider_id');?></label>
    </dt>
    <dd>
        <select name="expense_provider_id">
            <option value=""></option>
            <?php foreach ($providers as $provider): ?>
            
				<option value="<?php echo $provider->provider_id; ?>" 
             
					<?php 
					if ($this->mdl_expenses->form_value('expense_provider_id') == $provider->provider_id) { 
						echo ' selected="selected" ';
					}
					echo ">" . $provider->provider_name;
					?>
			 
				</option>
		    <?php endforeach; ?> 
			 
        </select>
    </dd>
</dl>
<dl>
    <dt>
        <label><?php echo $this->lang->line('expense_category'); ?></label>
    </dt>
    <dd>
        <select name="expense_category_id">
            <option value=""></option>
            <?php foreach ($expenses_category as $expense) { ?>
            <option value="<?php echo $expense->expense_category_id; ?>" <?php if ($this->mdl_expenses->form_value('expense_category_id') == $expense->expense_category_id) { ?> selected="selected" <?php } ?>><?php echo $expense->expense_category_name ; ?></option>
            <?php } ?>
        </select>
    </dd>
</dl>
<dl>
    <dt>
        <label><?php echo $this->lang->line('expense_date'); ?></label>
    </dt>
    <dd>
        <input type="text" name="mcb_expense_date" class="datepicker" value="
        
        <?php 
        if ($this->mdl_expenses->form_value('mcb_expense_date') != "") {
			echo $this->mdl_expenses->form_value('mcb_expense_date'); 	
		} else {
			echo date("d/m/Y"); 
		}?>">
    </dd>
</dl>
<dl>
    <dt>
        <label><?php echo $this->lang->line('expense_invoice_date'); ?></label>
    </dt>
    <dd>
        <input type="text" name="expense_invoice_date" class="datepicker" value="<?php echo $this->mdl_expenses->form_value('expense_invoice_date'); ?>">
    </dd>
</dl>
<dl>
    <dt>
        <label><?php echo $this->lang->line('expense_overdue_date'); ?></label>
    </dt>
    <dd>
        <input type="text" name="expense_invoice_overdue_date" class="datepicker" value="
        <?php echo $this->mdl_expenses->form_value('expense_invoice_overdue_date'); ?>">
    </dd>
</dl>

<!-- DESCARTAT
<dl>
    <dt><label><?php echo $this->lang->line('expense_invoice_with_tax'); ?></label></dt>
    <dd>
	<select name="expense_invoice_with_tax" id="expense_invoice_with_tax" 
	onchange="
		//console.log($('#expense_invoice_with_tax').val());
		
		number = parseFloat($('#mcb_expense_amount').val()) / ( 1 + ($('#expense_invoice_with_tax option:selected').attr('id')));
		$('#mcb_base_expense_amount').val( );
		">
	    <?php foreach ($tax_rates as $tax_rate) { ?>
			<option id="<?php echo $tax_rate->tax_rate_percent; ?>" value="<?php echo $tax_rate->tax_rate_id; ?>" 
			<?php if ($this->mdl_expenses->form_value('expense_invoice_with_tax') == $tax_rate->tax_rate_id) { ?> selected="selected" <?php } ?>><?php echo $tax_rate->tax_rate_percent; ?>% - <?php echo $tax_rate->tax_rate_name; ?></option>
	    <?php } ?>
	</select>
    </dd>
</dl>
-->

<script>

$(function(){
 $("#mcb_expense_amount").numpadDecSeparator();
 $("#mcb_expense_tax_amount").numpadDecSeparator();
 $("#mcb_base_expense_amount").numpadDecSeparator();
 $("#expense_invoice_with_tax2").numpadDecSeparator();
 $("#mcb_expense_tax2_amount").numpadDecSeparator();
});
 
</script>

<dl>
    <dt>
        <label>
          <?php echo $this->lang->line('mcb_base_expense_amount'); ?>
        </label>
    </dt>
    <dd>
        <input type="text" name="mcb_base_expense_amount" id="mcb_base_expense_amount" value="<?php
        $amount=$this->mdl_expenses->form_value('mcb_base_expense_amount')+0;  
        if ($amount != 0)   {
            echo format_number($amount+0) . " €";
        }
        ?>"> <a id="mcb_base_expense_amount_others" href="#"><?php echo $this->lang->line('calculate_others'); ?></a> | <a id="reset_money_values1" href="#"><?php echo $this->lang->line('reset'); ?></a>
    </dd>
</dl>

<dl>
    <dt><label><?php echo $this->lang->line('expense_invoice_with_tax'); ?></label></dt>
    <dd>
    <select name="expense_invoice_with_tax" id="expense_invoice_with_tax">
        <?php foreach ($tax_rates as $tax_rate) { ?>
            <option id="<?php echo $tax_rate->tax_rate_percent; ?>" value="<?php echo $tax_rate->tax_rate_id; ?>" 
            <?php if ($this->mdl_expenses->form_value('expense_invoice_with_tax') == $tax_rate->tax_rate_id) { ?> selected="selected" <?php } ?>><?php echo $tax_rate->tax_rate_percent; ?>% - <?php echo $tax_rate->tax_rate_name; ?></option>
        <?php } ?>
    </select>
    </dd>
</dl>

<dl>
    <dt>
        <label>
          <?php echo $this->lang->line('mcb_expense_tax_amount'); ?>
        </label>
    </dt>
    <dd>
        <input type="text" name="mcb_expense_tax_amount" id="mcb_expense_tax_amount" value="<?php
        $amount=$this->mdl_expenses->form_value('mcb_expense_tax_amount')+0;  
        echo format_number($amount+0) . " €";
        ?>"> <a id="mcb_expense_tax_amount_calculate" href="#"><?php echo $this->lang->line('calculate'); ?></a>
    </dd>
</dl>



<dl>
    <dt>
        <label>
          <?php echo $this->lang->line('expense_invoice_with_tax2'); ?>
        </label>
    </dt>
    <dd>
        <input type="text" name="expense_invoice_with_tax2" id="expense_invoice_with_tax2" value="<?php
        $amount=$this->mdl_expenses->form_value('expense_invoice_with_tax2')+0;  
        if ($amount != 0)   {
            echo format_number($amount+0) . " %";
        } else {
            echo "0,00 %";
        }
        ?>"> (en tant per cent)
    </dd>
</dl>

<dl>
    <dt>
        <label>
          <?php echo $this->lang->line('mcb_expense_tax2_amount'); ?>
        </label>
    </dt>
    <dd>
        <input type="text" name="mcb_expense_tax2_amount" id="mcb_expense_tax2_amount"  value="<?php
        $amount=$this->mdl_expenses->form_value('mcb_expense_tax2_amount')+0;  
        echo format_number($amount+0) . " €";

        ?>"> <a id="mcb_expense_tax2_amount_calculate" href="#"><?php echo $this->lang->line('calculate'); ?></a>
    </dd>
</dl>

<dl>
    <dt>
        <label>
          <?php echo $this->lang->line('expense_amount'); ?>
        </label>
    </dt>
    <dd>
        <input type="text" name="mcb_expense_amount" id="mcb_expense_amount" value="<?php
        $amount=$this->mdl_expenses->form_value('mcb_expense_amount')+0;  
        if ($amount != 0)   {
            echo format_number($amount+0) . " €";
        }
        ?>"> <a id="mcb_expense_amount_others" href="#"><?php echo $this->lang->line('calculate_others'); ?></a> | <a id="reset_money_values" href="#"><?php echo $this->lang->line('reset'); ?></a>
    </dd>
</dl>




<!--
<dl>
    <dt>
        <label><?php echo $this->lang->line('expense_client'); ?></label>
    </dt>
    <dd>
        <?php if (!uri_assoc('client_id')) { ?>
        <select name="client_id" id="client_id">
            <option value=""></option>
            <?php foreach ($clients as $client) { ?>
            <option value="<?php echo $client->client_id; ?>" <?php if ($this->mdl_expenses->form_value('client_id') == $client->client_id) { ?> selected="selected" <?php } ?>><?php echo $client->client_name; ?></option>
            <?php } ?>
        </select>
        <?php } ?>
    </dd>
</dl>
-->
<dl>
    <dt>
    <label><?php echo $this->lang->line('expense_payed'); ?></label>
    </dt>
    <dd>
        <input type="checkbox" name="expense_payed" id="expense_payed" 
        
        <?php 
        if ($this->mdl_expenses->form_value('expense_payed')) {
			echo 'checked="checked"';
		}
        ?>
        
        value="expense_payed">
    </dd>
</dl>

<dl>
    <dt>
        <label><?php echo $this->lang->line('expense_payment_date'); ?></label>
    </dt>
    <dd>
        <input type="text" name="expense_payment_date" class="datepicker" value="
        
        <?php 
          echo $this->mdl_expenses->form_value('expense_payment_date'); 	
		?>">
    </dd>
</dl>

<dl>
    <dt>
        <label><?php echo $this->lang->line('expense_paymentTypeId'); ?></label>
    </dt>
    <dd>
        <select name="expense_paymentTypeId">
            <option value=""></option>
            <?php foreach ($expense_payment_types as $expense_payment_type) { ?>
            <option value="<?php echo $expense_payment_type->expense_payment_type_id; ?>" <?php if ($this->mdl_expenses->form_value('expense_paymentTypeId') == $expense_payment_type->expense_payment_type_id) { ?> selected="selected" <?php } ?>><?php echo $expense_payment_type->expense_payment_type_name ; ?></option>
            <?php } ?>
        </select>
    </dd>
</dl>

<dl>
    <dt>
        <label><?php echo $this->lang->line('expense_paymentBankId'); ?></label>
    </dt>
    <dd>
        <select name="expense_paymentBankId">
            <option value=""></option>
            <?php foreach ($expense_banks as $expense_bank) { ?>
            <option value="<?php echo $expense_bank->bank_id; ?>" <?php if ($this->mdl_expenses->form_value('expense_paymentBankId') == $expense_bank->bank_id) { ?> selected="selected" <?php } ?>><?php echo $expense_bank->bank_name ; ?></option>
            <?php } ?>
        </select>
    </dd>
</dl>

<dl>
        <dt>
            <label><?php echo $this->lang->line('expense_pay'); ?></label>
        </dt>
        <dd>
            <input type="text" name="mcb_expense_payto" id="mcb_expense_payto" value="<?php echo $this->mdl_expenses->form_value('mcb_expense_payto'); ?>">
        </dd>
</dl>
<?php 
    $this->load->model('mdl_expense_file');
    $files = $this->mdl_expense_file->get_files($this->mdl_expenses->form_value('mcb_expense_id'));
?>
<?php if (count($files)>0): ?>
    <dl>
        <dt>
            <label><?php echo "Fitxers" ?></label>
        </dt>
        <dd>
            <a href="javascript:void(0)" class="popup_file" id="<?php echo $this->mdl_expenses->form_value('mcb_expense_id'); ?>" onclick="return false;">
                        
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
        </dd>
    </dl>    
<?php endif; ?>


<div id="upload_file">
<dl>
    <dt><label><?php echo $this->lang->line('upload_file'); ?></label></dt>
    <dd>
        <input type="hidden" name="count_assign" id="count_assign" value="1" />
        <input type="file" name="userfile" id="mcb_expense_file_title" multiple="multiple" value="<?php echo $this->mdl_expenses->form_value('mcb_expense_file_title') ?>" /> 
        <!--<a href="#" id="add_more" name="add_more" onclick="return false;"><?php echo $this->lang->line('add_more'); ?></a> -->
    </dd>
</dl>
</div>
<dl>
    <dt>
        <label><?php echo $this->lang->line('expense_note'); ?></label>
    </dt>
    <dd>
        <input type="text" name="mcb_expense_note" id="mcb_expense_note" value="<?php echo $this->mdl_expenses->form_value('mcb_expense_note'); ?>">
    </dd>
</dl>
<div style="clear: both;">&nbsp;</div>

<input type="submit" id="btn_submit" name="btn_submit" value="<?php echo $this->lang->line('submit'); ?>" />
<input type="submit" id="btn_cancel" name="btn_cancel" value="<?php echo $this->lang->line('cancel'); ?>" />

<div style="clear: both;">&nbsp;</div>

<div id="popup_files" style="display: inline;"></div>

<script type="text/javascript">
$(function() {
        $('.popup_file').click(function() {
            
            expense_id = $(this).attr('id');
            
            $.ajax({
                type: "POST",
                url:"<?php echo site_url('expenses/expenses/files_options'); ?>",
                data: "expense_id="+expense_id,
                success: function(x) {
                    //console.log("success");
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



$(function() {

    $('#mcb_base_expense_amount_others').click(function(e) {
        e.preventDefault();
        //console.log("clic on mcb_base_expense_amount_others calculate others");

        var mcb_base_expense_amount  = $('#mcb_base_expense_amount').val();
        var unformat_mcb_base_expense_amount = accounting.unformat(mcb_base_expense_amount, ",");

        //console.log("mcb_base_expense_amount: " + mcb_base_expense_amount);
        //console.log("unformat_mcb_base_expense_amount: " + unformat_mcb_base_expense_amount);

        var expense_invoice_with_tax = $('#expense_invoice_with_tax').val();
        var expense_invoice_with_tax_id = $("#expense_invoice_with_tax option:selected").attr("id")
        var expense_invoice_with_tax_id1 = expense_invoice_with_tax_id/100;
        var expense_invoice_with_tax_id2 = 1 + expense_invoice_with_tax_id1;
        var expense_invoice_with_tax2 = $('#expense_invoice_with_tax2').val();

        var mcb_expense_amount = $('#mcb_expense_amount').val();

        //console.log("mcb_expense_amount: " + mcb_expense_amount);
        //console.log("expense_invoice_with_tax: " + expense_invoice_with_tax);
        //console.log("expense_invoice_with_tax_id: " + expense_invoice_with_tax_id );
        //console.log("expense_invoice_with_tax_id1: " + expense_invoice_with_tax_id1 );
        //console.log("expense_invoice_with_tax_id2: " + expense_invoice_with_tax_id2 );
        //console.log("expense_invoice_with_tax_id2: " + expense_invoice_with_tax_id2 );
        //console.log("expense_invoice_with_tax2: " + expense_invoice_with_tax2 );

        var unformat_mcb_expense_amount = accounting.unformat(mcb_expense_amount, ",");

        //Reformat mcb_base_expense_amount
        //console.log("* mcb_base_expense_amount: " + mcb_base_expense_amount);
        var new_mcb_base_expense_amount = accounting.formatNumber(unformat_mcb_base_expense_amount, 2, ".", ",") + "€";
        //console.log("* new_mcb_base_expense_amount: " + new_mcb_base_expense_amount);
        $('#mcb_base_expense_amount').val(new_mcb_base_expense_amount);

        //Recalculate Quota IVA | mcb_expense_tax_amount        
        //console.log("RR new_mcb_base_expense_amount: " + unformat_mcb_base_expense_amount);
        //console.log("RR expense_invoice_with_tax_id1: " + expense_invoice_with_tax_id1);
        var new_mcb_expense_tax_amount = unformat_mcb_base_expense_amount*expense_invoice_with_tax_id1;
        //console.log("RR new_mcb_expense_tax_amount: " + new_mcb_expense_tax_amount);
        var new_mcb_expense_tax_amount_formated = accounting.formatNumber(new_mcb_expense_tax_amount, 2, ".", ",") + "€";
        //console.log("RR new_mcb_expense_tax_amount_formated: " + new_mcb_expense_tax_amount_formated);
        $('#mcb_expense_tax_amount').val(new_mcb_expense_tax_amount_formated);

        //Recalculate Quota IRPF | mcb_expense_tax2_amount   
        var unformat_expense_invoice_with_tax2 = accounting.unformat(expense_invoice_with_tax2, ",")/100;  
        //console.log("unformat_expense_invoice_with_tax2: " + unformat_expense_invoice_with_tax2 );   
        var new_mcb_expense_tax2_amount = unformat_mcb_base_expense_amount*unformat_expense_invoice_with_tax2;
        var new_mcb_expense_tax2_amount_formated = accounting.formatNumber(new_mcb_expense_tax2_amount, 2, ".", ",") + "€";
        $('#mcb_expense_tax2_amount').val(new_mcb_expense_tax2_amount_formated);
        

        //Recalculate Import Total | mcb_expense_amount        
        //console.log("* 11 unformat_mcb_base_expense_amount: " + unformat_mcb_base_expense_amount);
        //console.log("* 11 new_mcb_expense_tax_amount: " + new_mcb_expense_tax_amount);
        //console.log("* 11 new_mcb_expense_tax2_amount: " + new_mcb_expense_tax2_amount);


        var new_mcb_expense_amount = unformat_mcb_base_expense_amount + new_mcb_expense_tax_amount - new_mcb_expense_tax2_amount;
        var new_mcb_expense_amount_formated = accounting.formatNumber(new_mcb_expense_amount, 2, ".", ",") + "€";
        $('#mcb_expense_amount').val(new_mcb_expense_amount_formated);
    });
});

$(function() {

    $('#mcb_expense_amount_others').click(function(e) {
        e.preventDefault();
        //console.log("clic on mcb_expense_amount_others calculate others");

        var expense_invoice_with_tax = $('#expense_invoice_with_tax').val();
        var expense_invoice_with_tax_id = $("#expense_invoice_with_tax option:selected").attr("id")
        var expense_invoice_with_tax_id1 = expense_invoice_with_tax_id/100;
        var expense_invoice_with_tax_id2 = 1 + expense_invoice_with_tax_id1;
        var expense_invoice_with_tax2 = $('#expense_invoice_with_tax2').val();
        var unformat_expense_invoice_with_tax2 = accounting.unformat(expense_invoice_with_tax2, ",")/100; 
        var expense_invoice_with_tax1i2 = 1 + expense_invoice_with_tax_id1 - unformat_expense_invoice_with_tax2;

        var mcb_expense_amount = $('#mcb_expense_amount').val();

        //console.log("mcb_expense_amount: " + mcb_expense_amount);
        //console.log("expense_invoice_with_tax: " + expense_invoice_with_tax);
        //console.log("expense_invoice_with_tax_id: " + expense_invoice_with_tax_id );
        //console.log("expense_invoice_with_tax_id1: " + expense_invoice_with_tax_id1 );
        //console.log("expense_invoice_with_tax_id2: " + expense_invoice_with_tax_id2 );
        //console.log("expense_invoice_with_tax_id2: " + expense_invoice_with_tax_id2 );
        //console.log("expense_invoice_with_tax2: " + expense_invoice_with_tax2 );

        var unformat_mcb_expense_amount = accounting.unformat(mcb_expense_amount, ",");

        //Reformat mcb_expense_amount
        //console.log("* mcb_expense_amount: " + mcb_expense_amount);
        var new_mcb_expense_amount = accounting.formatNumber(unformat_mcb_expense_amount, 2, ".", ",") + "€";
        //console.log("* new_mcb_expense_amount: " + new_mcb_expense_amount);
        $('#mcb_expense_amount').val(new_mcb_expense_amount);

        //Recalculate Import Base | mcb_base_expense_amount        
        //console.log("*22 expense_invoice_with_tax1i2: " + expense_invoice_with_tax1i2);
        var new_mcb_base_expense_amount = unformat_mcb_expense_amount/expense_invoice_with_tax1i2;
        var new_mcb_base_expense_amount_formated = accounting.formatNumber(new_mcb_base_expense_amount, 2, ".", ",") + "€";
        $('#mcb_base_expense_amount').val(new_mcb_base_expense_amount_formated);

        //Recalculate Quota IVA | mcb_expense_tax_amount        
        var new_mcb_expense_tax_amount = new_mcb_base_expense_amount*expense_invoice_with_tax_id1;
        var new_mcb_expense_tax_amount_formated = accounting.formatNumber(new_mcb_expense_tax_amount, 2, ".", ",") + "€";
        $('#mcb_expense_tax_amount').val(new_mcb_expense_tax_amount_formated);

        //Recalculate Quota IRPF | mcb_expense_tax2_amount   
        //console.log("unformat_expense_invoice_with_tax2: " + unformat_expense_invoice_with_tax2 );   
        var new_mcb_expense_tax2_amount = new_mcb_base_expense_amount*unformat_expense_invoice_with_tax2;
        var new_mcb_expense_tax2_amount_formated = accounting.formatNumber(new_mcb_expense_tax2_amount, 2, ".", ",") + "€";
        $('#mcb_expense_tax2_amount').val(new_mcb_expense_tax2_amount_formated);
    });
});

$(function() {

    $('#mcb_expense_amount').click(function(e) {
        e.preventDefault();



    });
});

$(function() {
   
   $('#mcb_expense_tax_amount2').click(function(e) {
        e.preventDefault();
        //console.log("Clic on mcb_expense_tax_amount2");  

        //get expense_invoice_with_tax2
        var expense_invoice_with_tax2 = $('#expense_invoice_with_tax2').val();

        //get expense_invoice_with_tax2
        var mcb_base_expense_amount = $('#mcb_base_expense_amount').val();

        //console.log(expense_invoice_with_tax2);
        //console.log(mcb_base_expense_amount);

        if( expense_invoice_with_tax2 != "") {
            //console.log("prrr");
            //console.log("expense_invoice_with_tax2:" . expense_invoice_with_tax2);    
        } else {
            //console.log("is cadena vacia!");

        }
        
        //console.log("mcb_base_expense_amount:" . mcb_base_expense_amount);
   });

});

$(function() {
   
   $('#reset_money_values,#reset_money_values1').click(function(e) {
        e.preventDefault();
        //console.log("Clic on reset_money_values");  

        $('#mcb_expense_amount').val("0,00€");
        $('#mcb_expense_tax_amount').val("0,00€");
        $('#mcb_base_expense_amount').val("0,00€");
        $('#mcb_expense_tax2_amount').val("0,00€");
        $('#expense_invoice_with_tax2').val("0,00%");

   });

});

$(function() {

    $('#mcb_expense_tax_amount_calculate').click(function(e) {
        e.preventDefault();
        //console.log("clic on calculate mcb_expense_tax_amount");

        //If mcb_base_expense_amount isset

        var mcb_base_expense_amount  = $('#mcb_base_expense_amount').val();
        var unformat_mcb_base_expense_amount = accounting.unformat(mcb_base_expense_amount, ",");
        var expense_invoice_with_tax_id = $("#expense_invoice_with_tax option:selected").attr("id")
        var expense_invoice_with_tax_id1 = expense_invoice_with_tax_id/100;

        //Recalculate Quota IVA | mcb_expense_tax_amount        
        //console.log("RR new_mcb_base_expense_amount: " + unformat_mcb_base_expense_amount);
        //console.log("RR expense_invoice_with_tax_id1: " + expense_invoice_with_tax_id1);
        var new_mcb_expense_tax_amount = unformat_mcb_base_expense_amount*expense_invoice_with_tax_id1;
        //console.log("RR new_mcb_expense_tax_amount: " + new_mcb_expense_tax_amount);
        var new_mcb_expense_tax_amount_formated = accounting.formatNumber(new_mcb_expense_tax_amount, 2, ".", ",") + "€";
        //console.log("RR new_mcb_expense_tax_amount_formated: " + new_mcb_expense_tax_amount_formated);
        $('#mcb_expense_tax_amount').val(new_mcb_expense_tax_amount_formated);

    });
});

$(function() {

    $('#mcb_expense_tax2_amount_calculate').click(function(e) {
        e.preventDefault();
        //console.log("clic on calculate mcb_expense_tax2_amount_calculate");

        //If mcb_base_expense_amount isset

        var mcb_base_expense_amount  = $('#mcb_base_expense_amount').val();
        var unformat_mcb_base_expense_amount = accounting.unformat(mcb_base_expense_amount, ",");
        var expense_invoice_with_tax2 = $('#expense_invoice_with_tax2').val();

        //Recalculate Quota IRPF | mcb_expense_tax2_amount   
        var unformat_expense_invoice_with_tax2 = accounting.unformat(expense_invoice_with_tax2, ",")/100;  
        //console.log("unformat_expense_invoice_with_tax2: " + unformat_expense_invoice_with_tax2 );   
        var new_mcb_expense_tax2_amount = unformat_mcb_base_expense_amount*unformat_expense_invoice_with_tax2;
        var new_mcb_expense_tax2_amount_formated = accounting.formatNumber(new_mcb_expense_tax2_amount, 2, ".", ",") + "€";
        $('#mcb_expense_tax2_amount').val(new_mcb_expense_tax2_amount_formated);

    });
});



    
</script>
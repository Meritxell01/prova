<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>
			<?php echo $this->lang->line('invoice_number'); ?>
			<?php echo invoice_id($invoice); ?>
		</title>
		<style type="text/css">

			body {
				font-family: Verdana, Geneva, sans-serif;
				font-size: 12px;
				margin-left: 35px;
				margin-right: 45px;
				background-image:url('<?php echo base_url(); ?>assets/style/img/icons/pagat.png');
			}

			th {
				border: 1px solid #666666;
				background-color: #D3D3D3;
			}
			td.espai
			{
				padding: 10px 10px 0 0;
			}
			td.tamanyLletra
			{
			    font-family: Verdana, Geneva, sans-serif;
				font-size: 14px;
			}


			h2 {
				margin-bottom: 0px;
			}

			p.notop {
				margin-top: 0px;
			}

		</style>
	</head>
	<body>
		<table width="100%">
			<tr>
			    <td width="40%" valign="top">
					<?php echo invoice_logo($output_type); ?>
					<!--<h2><?php echo $this->lang->line('invoice'); ?></h2>-->
					

				</td>
				<!--Aquí modificarem la part dreta on surten les dades de la empresa per baixar-la a nivell de logo--->
				<td style="padding-top:35px; padding-bottom: 25px;" width="60%" align="right" valign="top">
					<!--<h2><?php echo invoice_from_company_name($invoice); ?></h2>-->
					<p class="notop">
						<!--<?php echo invoice_from_name($invoice); ?><br/>-->
						<?php echo "EbreTIC Enginyeria, S.L."?><br />
						<?php echo "CIF:".invoice_tax_id($invoice); ?><br />
						<?php echo invoice_from_address($invoice); ?><br />
						<?php echo "43500 Tortosa (Tarragona)"?><br />
						<!--<?php echo invoice_from_city_state_zip($invoice); ?><br />-->
						<?php if (invoice_from_address_2($invoice)) { echo invoice_from_address_2($invoice) . '<br />'; } ?>
						<!--<?php echo invoice_from_country($invoice); ?><br />-->
						<?php echo "www.ebretic.com"?>
					</p>
				</td>
			</tr>
		</table>
		<div style="border:1px solid #333; padding:10px 10px;  border-radius:25px;">
		<table width="100%">
		  <tr>
		   <td width="40%"  valign="top" class= "tamanyLletra">
		     <p>
			
			<b>
			 <?php echo $this->lang->line('invoice_number'); ?>
			 <?php echo invoice_id($invoice); ?>
			</b><br/>
			<?php echo $this->lang->line('invoice_date'); ?>:
			<?php echo invoice_date_entered($invoice); ?><br />
			<?php echo $this->lang->line('due_date'); ?>:
			<?php echo invoice_due_date($invoice); ?><br/><br />
            <b>Forma de pagament</b>
             <table>
            <tr><td>CAIXABANK: </td><td>2100-0019-40-0200702332</td></tr>
            <tr><td>BANC SABADELL: </td><td>0081-0130-06-0001308235</td></tr>
            </table>
		    </p>
		  </td>
          <td width="40%">
          </td>
          <!--Afegim el css per incrementar a 14px el tamany de lletra-->
		  <td width="40%" align="left" valign="top" class= "tamanyLletra">
		    <p class="notop">
			<!--Dades client-->
			<b><?php echo invoice_to_client_name($invoice); ?><br />
			   <?php echo invoice_to_address($invoice); ?><br />
			   <?php if (invoice_to_address_2($invoice)) { echo invoice_to_address_2($invoice) . '<br />'; } ?>
			   <?php echo invoice_to_zip($invoice) . ' ' .invoice_to_city($invoice) . ' (' . invoice_to_state($invoice) . ')'?><br />
			   <!--< ?php echo invoice_to_phone_number($invoice);-->
			    <?php
			      $num_telefon= invoice_to_phone_number($invoice);
			      if($num_telefon!="")
			      {
					echo invoice_to_phone_number($invoice)."<br/>";  
				  }
				?>
			   <?php echo "NIF:".invoice_client_tax_id($invoice); ?><br/>
               <?php if ($invoice->contact_id != 0) echo 'Attention: ' . invoice_attention_name($invoice); ?>
            </b>
		   </p>
		</td>
	      </tr>
	    </table>
        </div>

		<br />
		<div id= "contenidor_dades_legals" style="height:660px; min-height:660px; ">
	
		<table style="width: 100%;">
			<tr>
				<th width="10%">
					<?php echo $this->lang->line('quantity'); ?>
				</th>
				<th width="20%">
					<?php echo $this->lang->line('item_name'); ?>
				</th>
				<th width="30%">
					<?php echo $this->lang->line('item_description'); ?>
				</th>
				<th width="10%" align="right">
					<?php echo $this->lang->line('unit'); ?>
				</th>
                <th width="10%" align="right">
                    <?php echo $this->lang->line('tax_rate'); ?>
                </th>
				<th width="10%" align="right">
					<?php echo $this->lang->line('tax'); ?>
				</th>
				<th width="10%" align="right">
					<?php echo $this->lang->line('cost'); ?>
				</th>
			</tr>
			<?php foreach ($invoice->invoice_items as $item) { 
			$date= format_date($item->item_date);
			if(invoice_item_name($item)=="ESPAI EN BLANC AMB DATA")
			{
				echo "<tr style='height:140px;' height='140px'><td>".$date."</td><td></td> 
				<td><hr/></td> </tr>";	
			}
			else if(invoice_item_name($item)=="ESPAI EN BLANC SENSE DATA")
			{
				echo "<tr style='height:140px;' height='140px'><td></td><td></td> 
				<td>------------------------------------------------------------------------------------</td> </tr>";	
			}
			else
			{
			?>
			
            <tr style="height:140px;" height="140px">
				<td align="center" class= "espai">
					<?php echo invoice_item_qty($item); ?>
				</td>
				<td class= "espai">
					<?php echo invoice_item_name($item); ?>
				</td>
				<td class= "espai">
					<?php 
					if(isset($item->item_serial) && $item->item_serial != ""){
					
					echo invoice_item_description($item)."<br>-s/n:".$item->item_serial; 
					}else{
					echo invoice_item_description($item);	
					}
					?>
				</td>
				<td align="right" class= "espai">
					<?php echo invoice_item_unit_price($item); ?>
				</td>
                <td align="right" class= "espai">
                    <?php echo invoice_item_tax_rate($item); ?>
                </td>
				<td align="right" class= "espai">
					<?php echo invoice_item_tax($item); ?>
				</td>
				
				<td align="right" class= "espai">
					<?php echo invoice_item_total($item); ?>
				</td>
			</tr>
			<?php } } ?>
			<tr>
				<td colspan="3"></td>
				<td colspan="4">
					<hr />
				</td>
			</tr>

			<tr>
				<td colspan="6" align="right">
					<?php echo $this->lang->line('subtotal'); ?>
				</td>
				<td align="right">
					<!--<?php echo invoice_subtotal($invoice); ?>-->

					<?php echo invoice_item_subtotal($invoice); ?>

				</td>
			</tr>
			<tr>
				<td colspan="6" align="right">
					<?php echo $this->lang->line('tax_2'); ?>
				</td>
				<td align="right">

					<?php echo invoice_tax_total($invoice); ?>

				</td>
			</tr>
<tr>
				<td colspan="5"></td>
				<td colspan="6">
					<hr />
				</td>
			</tr>

			<?php foreach ($invoice->invoice_tax_rates as $invoice_tax_rate) { ?>
			<?php if (invoice_has_tax($invoice_tax_rate)) { ?>
			<tr>
				<td colspan="6" align="right">
					<?php echo invoice_tax_rate_name($invoice_tax_rate); ?>
				</td>
				<td align="right">
					<?php echo invoice_tax_rate_amount($invoice_tax_rate); ?>
				</td>
			</tr>
			<?php } ?>
			<?php } ?>

			<?php if ($invoice->invoice_shipping > 0) { ?>
			<tr>
				<td colspan="6" align="right">
					<?php echo $this->lang->line('shipping'); ?>
				</td>
				<td align="right">
					<?php echo invoice_shipping($invoice); ?>
				</td>
			</tr>
			<?php } ?>

			<?php if ($invoice->invoice_discount > 0) { ?>
			<tr>
				<td colspan="6" align="right">
					<?php echo $this->lang->line('discount'); ?>
				</td>
				<td align="right">
					<?php echo invoice_discount($invoice); ?>
				</td>
			</tr>
			<?php } ?>

			<tr>
				<td colspan="6" align="right">
					<?php echo $this->lang->line('grand_total'); ?>
				</td>
				<td align="right">
					<?php echo invoice_total($invoice); ?>
				</td>
			</tr>
			<!--

			<tr>
				<td colspan="6" align="right">
					<?php echo $this->lang->line('amount_paid'); ?>
				</td>
				<td align="right">
					<?php echo invoice_paid($invoice); ?>
				</td>
			</tr>

			<tr>
				<td colspan="6" align="right">
					<?php echo $this->lang->line('total_due'); ?>
				</td>
				<td align="right">
					<?php echo invoice_balance($invoice); ?>
				</td>
			</tr>-->
		</table>
 
        
        
        
                </div>
                <hr />
               <!-- <h6><font color="#666666">< ?php echo nl2br($invoice->invoice_custom_1); ?></font></h6> -->
              <h6><font color="#666666">EbreTIC Enginyeria, S.L. Plaça Alfons XII nº5 2n-3B 43500 Tortosa (Tarragona) Tom 2669, foli 125, inscripció 1 amb fulla T-43767, CIF.B55566632</font></h6>
               
	</body>
</html>

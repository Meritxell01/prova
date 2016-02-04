<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>
			<?php echo $this->lang->line('quote_delivery_note_number'); ?>
			<?php echo invoice_id($invoice); ?>
		</title>
		<style type="text/css">

			body {
				font-family: Verdana, Geneva, sans-serif;
				font-size: 12px;
				margin-left: 35px;
				margin-right: 45px;
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
				<!--DADES EMPRESA-->
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
				 <!--FIQUEM delivery_note_number QUE ÉS ALBARÀ AL FITXER LANG (CARPETA LANGUAGE--CATALÀ-->
				 <?php echo $this->lang->line('delivery_note'); ?>
				 <?php echo invoice_id($invoice); ?>
				 </b><br/>
				 <!--COMENTEM PER A QUE NO ENS MOSTRI LA DATA NI EL VENCIMENT-->
				 <?php echo $this->lang->line('date'); ?>:
				 <?php echo invoice_date_entered($invoice); ?><br />
				 <!--<?php echo $this->lang->line('due_date'); ?>:
				 <?php echo invoice_due_date($invoice); ?><br/><br />-->
			
			<!--COMENTEM PER A QUE NO SURTI LA FORMA DE PAGAMENT A L'ALBARÀ-->
            <!--<b>Forma de pagament</b>
             <table>
				<tr>
					<td>CAIXABANK: </td><td>2100-0019-40-0200702332</td>
				</tr>
				<tr>
					<td>BANC SABADELL: </td><td>0081-0130-06-0001308235</td>
				</tr>
            </table>-->
            
		    </p>
		  </td>
          <td width="40%">
          </td>
          <!--Afegim el css per incrementar a 14px el tamany de lletra-->
		  <td width="40%" align="left" valign="top" class= "tamanyLletra">
		    <p class="notop">
				
			<!--DADES CLIENT-->
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
				<!--Comentem per a que no surti el NIF del client a l'albarà-->
			   <!--< ?php echo "NIF:".invoice_client_tax_id($invoice); ?><br/>-->
               <?php 
					if ($invoice->contact_id != 0) echo 'Attention: ' . invoice_attention_name($invoice); 
				?>
            </b>
		   </p>
		</td>
	      </tr>
	    </table>
        </div>

		<br />
		<div id= "contenidor_dades_legals" style="height:660px; min-height:660px;">
	
		<table style="width: 100%;">
			<tr>
				<th width="10%">
					<?php echo $this->lang->line('quantity'); ?>
				</th>
				<th width="20%">
					<?php echo $this->lang->line('item_name'); ?>
				</th>
				<th width="50%">
					<?php echo $this->lang->line('item_description'); ?>
				</th>
				<th width="10%" align="right">
					<?php echo $this->lang->line('unit'); ?>
				</th>
				<!--AQUÍ COMENTEM PER A QUE NO SURTI ELS CAMPS TIPUS IVA i IVA ALS CAMPS DE L'ALBARÀ-->
                <!--<th width="10%" align="right">
                    < ?php echo $this->lang->line('tax_rate'); ?>
                </th>
				<th width="10%" align="right">
					< ?php echo $this->lang->line('tax'); ?>
				</th>-->
				<th width="10%" align="right">
					<?php echo $this->lang->line('cost'); ?>
				</th>
			</tr>
			<?php foreach ($invoice->invoice_items as $item) { 
			$date= format_date($item->item_date);
			if(invoice_item_name($item)=="ESPAI EN BLANC"){
			echo "<tr style='height:140px;' height='140px'><td></td><td>".$date."</td> 
			<td>------------------------------------------------------------------------------------</td> </tr>";	
			}else{
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
				<!--AQUÍ COMENTEM PER A QUE NO SURTIGUE L'IVA I EL TIPUS D'IVA-->
                <!--<td align="right" class= "espai">
                    < ?php echo invoice_item_tax_rate($item); ?>
                </td>
				<td align="right" class= "espai">
					< ?php echo invoice_item_tax($item); ?>
				</td>-->
				<td align="right" class= "espai">
					<?php echo invoice_item_total($item); ?>
				</td>
			</tr>
			<?php } } ?>
			<!--AQUÍ MOSTREM LA LÍNIA ABANS DEL TOTAL-->
			<tr>
				<td colspan="2"></td>
				<td colspan="3">
					<hr />
				</td>
			</tr>
			<!--AQUÍ HEM COMENTAT PER TAL DE QUE NO SURTI LA BASE IMPOSABLE NI EL IVA-->
			<!--<tr>
				<td colspan="6" align="right">
					< ?php echo $this->lang->line('subtotal'); ?>
				</td>
				<td align="right">
					<!--< ?php echo invoice_subtotal($invoice); ?>

					< ?php echo invoice_item_subtotal($invoice); ?>

				</td>
			</tr>
			<tr>
				<td colspan="6" align="right">
					< ?php echo $this->lang->line('tax_2'); ?>
				</td>
				<td align="right">

					< ?php echo invoice_tax_total($invoice); ?>

				</td>
			</tr>-->
			<!--ESBORREM LA LÍNIA-->
			<!--<tr>
				<td colspan="4"></td>
				<td colspan="5">
					<hr />
				</td>
			</tr>-->

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
				<td colspan="4" align="right">
					<?php echo $this->lang->line('shipping'); ?>
				</td>
				<td align="right">
					<?php echo invoice_shipping($invoice); ?>
				</td>
			</tr>
			<?php } ?>

			<?php if ($invoice->invoice_discount > 0) { ?>
			<tr>
				<td colspan="4" align="right">
					<?php echo $this->lang->line('discount'); ?>
				</td>
				<td align="right">
					<?php echo invoice_discount($invoice); ?>
				</td>
			</tr>
			<?php } ?>

			<tr>
				<td colspan="4" align="right">
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

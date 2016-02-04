<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

function pdf_create($html, $filename, $stream=TRUE) {

	require_once(APPPATH.'helpers/mpdf/mpdf.php');

	$CI =& get_instance();

    $mpdf = new mPDF();

    //$mpdf->SetAutoFont();
    $mpdf->SetFont('Arial');
    
    $mpdf->WriteHTML($html);

	if ($stream) {

		$mpdf->Output($filename, 'I');

	}

	else {

		$mpdf->Output('./uploads/temp/' . $filename . '.pdf', 'F');

	}

}

?>
<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class Accounting_invoices extends Admin_Controller {

    public function __construct() {

        parent::__construct();

    }

    public function index() {

        
        $data = array(
            'output_types'  =>  array('pdf','csv','view')
        );

        $this->load->view('accounting_invoices', $data);

    }

    public function jquery_display_results($output_type = 'view') {
        
        $this->load->model('invoices/mdl_invoices');

        $invoices_params = array(
            'select'    =>  'mcb_invoices.*'
        );
        // Group type 1: Factures Venta
        $group=1;
        $data = array(            
            'invoices' => $this->mdl_invoices->get(array('where'=>array('mcb_invoices.invoice_group_id'=>$group)))
        );

        if ($output_type == 'view') {
          
            $this->load->view('accounting_invoices_view', $data);

        }

        elseif ($output_type == 'pdf') {

            $this->load->helper($this->mdl_mcb_data->setting('pdf_plugin'));

            $html = $this->load->view('accounting_invoices_list_pdf', $data, TRUE);

            pdf_create($html, url_title($this->lang->line('accounting_invoices'), '_'), TRUE);

        }

        elseif ($output_type == 'csv') {

            $this->load->dbutil();

            $this->load->helper('download');

            $query = $this->db->get('mcb_invoices');

            $data = $this->dbutil->csv_from_result($query);

            force_download(url_title($this->lang->line('accounting_invoices'), '_') . '.csv', $data);

        }

    }

}

?>
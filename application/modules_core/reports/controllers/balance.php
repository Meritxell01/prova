<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class Balance extends Admin_Controller {

    public function __construct() {

        parent::__construct();

        $this->load->model('invoices/mdl_invoices');
    }

    public function index() {

        /*$data = array(
            'output_types'  =>  array('pdf','csv','view')
        );
        */
        $data = array();
        $this->load->view('balance', $data);
        
    } 

    public function balance_invoices() {    
        
        $invoices = $this->mdl_invoices->get();
    
        $data = array(
            'invoices'      =>  $invoices,
            'sort_links'    =>  FALSE
        );

        $this->load->view('balance_invoices', $data);
    }

    public function balance_expenses() {    
        $data = array();
        $this->load->view('balance_expenses', $data);
    }

}

?>
<?php
(defined('BASEPATH')) OR exit('No direct script access allowed');

class Bank extends Admin_Controller {
    
    public function __construct() {
        parent::__construct();
        
        $this->_post_hander();
        
        $this->load->model('mdl_bank');
    }
 
    
    public function index() {
        
        $this->redir->set_last_index();
        
        $this->load->model('mdl_bank');
        $this->load->model('mdl_expenses');
        
        $data = array(
                'banks' => $this->mdl_bank->get()
        );
        
        $this->load->view('bank', $data);
        
    }
    
    public function form() {
        
        if (!$this->mdl_bank->validate()) {
            
            $this->load->helper('form');
            
            //echo "<br/>*** uri_assoc: " . uri_assoc('bank_id', 4);
            
            if (!$_POST AND uri_assoc('bank_id', 4)) {
				//echo "HEY!!!!!!!!!!!";
                $this->mdl_bank->prep_validation(uri_assoc('bank_id',4));
            }
            
            //echo "uri_assoc: " . uri_assoc('bank_id');
            
            $this->load->view('add_bank');
        
        } else {
            $this->mdl_bank->save();
            $this->redir->redirect('expenses/bank');
        }
        
        
    }


    public function get($params = NULL) {

        $bank = parent::get($params);

        if ($bank and isset($params['group_by_type'])) {

            $tmp = $bank;

            unset($bank);

            foreach ($tmp as $item) {

                $bank[$item->bank_id][] = $item;

            }

        }

        return $bank;

    }
    
    public function delete() {
        
        if (uri_assoc('bank_id')) {
            
            $this->mdl_bank->delete(array('bank_id' => uri_assoc('bank_id')));
            
        }
        
        $this->redir->redirect('expenses/bank');
        
    }


    public function _post_hander() {
        
        if($this->input->post('btn_add')) {
            redirect('expenses/bank/form');
        }
        
        if($this->input->post('btn_cancel')) {
            redirect('expenses/bank');
        }
        
    }

}
?>

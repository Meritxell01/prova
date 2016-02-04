<?php
(defined('BASEPATH')) OR exit('No direct script access allowed');

class Expense_payment_type extends Admin_Controller {
    
    public function __construct() {
        parent::__construct();
        
        $this->_post_hander();
        
        $this->load->model('mdl_expense_payment_type');
    }
 
    
    public function index() {
        
        $this->redir->set_last_index();
        
        $this->load->model('mdl_expense_payment_type');
        $this->load->model('mdl_expenses');
        
        $data = array(
                'expense_payment_types' => $this->mdl_expense_payment_type->get()
        );
        
        $this->load->view('expense_payment_type', $data);
        
    }
    
    public function form() {
        
        if (!$this->mdl_expense_payment_type->validate()) {
            
            $this->load->helper('form');
                       
            if (!$_POST AND uri_assoc('expense_payment_type_id', 4)) {
                $this->mdl_expense_payment_type->prep_validation(uri_assoc('expense_payment_type_id',4));
            }
                      
            $this->load->view('add_expense_payment_type');
        
        } else {
            $this->mdl_expense_payment_type->save();
            $this->redir->redirect('expenses/expense_payment_type');
        }
        
        
    }


    public function get($params = NULL) {

        $expense_payment_type = parent::get($params);

        if ($expense_payment_type and isset($params['group_by_type'])) {

            $tmp = $expense_payment_type;

            unset($expense_payment_type);

            foreach ($tmp as $item) {

                $expense_payment_type[$item->expense_payment_type_id][] = $item;

            }

        }

        return $expense_payment_type;

    }
    
    public function delete() {
        
        if (uri_assoc('expense_payment_type_id')) {
            
            $this->mdl_expense_payment_type->delete(array('expense_payment_type_id' => uri_assoc('expense_payment_type_id')));
            
        }
        
        $this->redir->redirect('expenses/expense_payment_type');
        
    }


    public function _post_hander() {
        
        if($this->input->post('btn_add')) {
            redirect('expenses/expense_payment_type/form');
        }
        
        if($this->input->post('btn_cancel')) {
            redirect('expenses/expense_payment_type');
        }
        
    }

}
?>

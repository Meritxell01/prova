<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class Mdl_Expense_payment_type extends MY_Model {
    
    public function __construct() {
        
        parent::__construct();
        
        $this->table_name = 'mcb_expense_payment_types';
        
        $this->primary_key = 'mcb_expense_payment_types.expense_payment_type_id';
        
        $this->select_fields = " SQL_CALC_FOUND_ROWS * ";
        
        $this->order_by = 'expense_payment_type_name';
        
        $this->custom_fields = $this->mdl_fields->get_object_fields(1);
        
        
    }
    
    public function validate() {
        
        $this->form_validation->set_rules('expense_payment_type_name', $this->lang->line('expense_payment_type_name'), 'required');
        
        return parent::validate($this);
        
    }
    
    public function db_array() {
        $db_array = parent::db_array();
        
        if(uri_assoc('expense_payment_type_id')) {
            
            $db_array['expense_payment_type_id'] = uri_assoc('expense_payment_type_id');
            
        } else if ($this->input->post('expense_payment_type_id')) {
            $db_array['expense_payment_type_id'] = $this->input->post('expense_payment_type_id');
        }
        return $db_array;
    }
    
    public function save() {
        
        $db_array = $this->db_array();
        
        parent::save($db_array, uri_assoc('expense_payment_type_id',4));
        
    }
    
}

?>

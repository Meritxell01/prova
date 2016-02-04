<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class Mdl_Expense_Category extends MY_Model {
    
    public function __construct() {
        
        parent::__construct();
        
        $this->table_name = 'mcb_expense_method';
        
        $this->primary_key = 'mcb_expense_method.expense_category_id';
        
        $this->select_fields = " SQL_CALC_FOUND_ROWS * ";
        
        $this->order_by = 'expense_category_name';
        
        $this->custom_fields = $this->mdl_fields->get_object_fields(1);
        
        
    }
    
    public function validate() {
        
        $this->form_validation->set_rules('expense_category_name', $this->lang->line('category_name'), 'required');
        
        return parent::validate($this);
        
    }
    
    public function db_array() {
        $db_array = parent::db_array();
        if(uri_assoc('expense_category_id',4)) {
            
            $db_array['expense_category_id'] = uri_assoc('expense_category_id',4);
            
        } else if ($this->input->post('expense_category_id')) {
            $db_array['expense_category_id'] = $this->input->post('expense_category_id');
        }
        return $db_array;
    }
    
    public function save() {
        
        $db_array = $this->db_array();
        
        parent::save($db_array, uri_assoc('expense_category_id',4));
        
    }
    
}

?>

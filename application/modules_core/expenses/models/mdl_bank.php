<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class Mdl_Bank extends MY_Model {
    
    public function __construct() {
        
        parent::__construct();
        
        $this->table_name = 'mcb_banks';
        
        $this->primary_key = 'mcb_banks.bank_id';
        
        $this->select_fields = " SQL_CALC_FOUND_ROWS * ";
        
        $this->order_by = 'bank_name';
        
        $this->custom_fields = $this->mdl_fields->get_object_fields(1);
        
        
    }
    
    public function validate() {
        
        $this->form_validation->set_rules('bank_name', $this->lang->line('bank_name'), 'required');
        
        return parent::validate($this);
        
    }
    
    public function db_array() {
        $db_array = parent::db_array();
        
        if(uri_assoc('bank_id')) {
            
            $db_array['bank_id'] = uri_assoc('bank_id');
            
        } else if ($this->input->post('bank_id')) {
            $db_array['bank_id'] = $this->input->post('bank_id');
        }
        return $db_array;
    }
    
    public function save() {
        
        $db_array = $this->db_array();
        
        parent::save($db_array, uri_assoc('bank_id',4));
        
    }
    
}

?>

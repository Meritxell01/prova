<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class Mdl_Provider extends MY_Model {
    
    public function __construct() {
        
        parent::__construct();
        
        $this->table_name = 'mcb_providers';
        
        $this->primary_key = 'mcb_providers.provider_id';
        
        $this->select_fields = " SQL_CALC_FOUND_ROWS * ";
        
        $this->order_by = 'provider_name';
        
        $this->custom_fields = $this->mdl_fields->get_object_fields(1);
        
        
    }
    
    public function validate() {
        
        $this->form_validation->set_rules('provider_name', $this->lang->line('provider_name'), 'required');
        $this->form_validation->set_rules('provider_shortname', $this->lang->line('provider_shortname'), 'required');
        $this->form_validation->set_rules('provider_tax_id', $this->lang->line('provider_tax_id'));
        $this->form_validation->set_rules('provider_address', $this->lang->line('provider_address'));
        $this->form_validation->set_rules('provider_address_2', $this->lang->line('provider_address_2'));
        $this->form_validation->set_rules('provider_city', $this->lang->line('provider_city'));
        $this->form_validation->set_rules('provider_state', $this->lang->line('provider_state'));
        $this->form_validation->set_rules('provider_zip', $this->lang->line('provider_zip'));
        $this->form_validation->set_rules('provider_country', $this->lang->line('provider_country'));
        $this->form_validation->set_rules('provider_phone_number', $this->lang->line('provider_phone_number'));
        $this->form_validation->set_rules('provider_fax_number', $this->lang->line('provider_fax_number'));
        $this->form_validation->set_rules('provider_mobile_number', $this->lang->line('provider_mobile_number'));
        $this->form_validation->set_rules('provider_web_address', $this->lang->line('provider_web_address'));
        $this->form_validation->set_rules('provider_email_address', $this->lang->line('provider_email_address'),'valid_email');
        $this->form_validation->set_rules('provider_notes', $this->lang->line('provider_notes'));
        $this->form_validation->set_rules('provider_active', $this->lang->line('provider_active'));
        
        return parent::validate($this);
        
    }
    
    public function db_array() {
        $db_array = parent::db_array();
        
        if(uri_assoc('provider_id')) {
            
            $db_array['provider_id'] = uri_assoc('provider_id');
            
        } else if ($this->input->post('provider_id')) {
            $db_array['provider_id'] = $this->input->post('provider_id');
        }
        return $db_array;
    }
    
    public function save() {

        $db_array = $this->db_array();

        if (!$this->input->post('provider_active')) {

            $db_array['provider_active'] = 0;

        }
        
        parent::save($db_array, uri_assoc('provider_id',4));
        
    }
    
}

?>

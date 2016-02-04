<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class Mdl_expense_file extends MY_Model {
    
    
    public function __construct() {
        
        parent::__construct();
        
        $this->table_name = 'mcb_expense_file';
        
        $this->primary_key = 'mcb_expense_file.mcb_expense_file_id';
        
        $this->select_fields = "SQL_CALC_FOUND_ROWS *";
        
        $this->order_by = 'mcb_expense_file.mcb_expense_file_id DESC';
        
        $this->joins = array(
            
            'mcb_expense' => 'mcb_expense.mcb_expense_id = mcb_expense_file.mcb_expense_id'
            
        );
        
        
        
        $this->limit = $this->mdl_mcb_data->setting('results_per_page');
    }
    
    
    public function get_files($expense_id) {
        
        $this->db->from("mcb_expense_file");
        $this->db->where("mcb_expense_id", $expense_id);
        $query = $this->db->get();
        $files = $query->result();
        return $files;
        
    }
    
    public function get_client_name($client_id) {
        $this->db->from("mcb_clients");
        $this->db->where("client_id", $client_id);
        $query = $this->db->get();
        
        foreach ( $query->result() as $row) {
            echo $row->client_name;
        }
    }
}

?>




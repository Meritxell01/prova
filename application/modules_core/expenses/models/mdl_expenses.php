<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class Mdl_expenses extends MY_Model {
    
   var $expenses_path;
     
    public function __construct() {
        
        parent::__construct();
        
        $this->table_name = 'mcb_expense';
        
        $this->primary_key = 'mcb_expense.mcb_expense_id';
        
        $this->select_fields = "
            SQL_CALC_FOUND_ROWS *";
        
        $this->order_by = 'mcb_expense.mcb_expense_date DESC';
        
        $this->joins = array(
            'mcb_expense_method' => 'mcb_expense_method.expense_category_id = mcb_expense.expense_category_id'
        );
        if ($this->mdl_mcb_data->setting('version') > '0.8.5') {

			$this->joins['mcb_expense_method'] = array('mcb_expense_method.expense_category_id = mcb_expense.expense_category_id', 'left');

	}
        
        $this->limit = $this->mdl_mcb_data->setting('results_per_page');
        
	$this->custom_fields = $this->mdl_fields->get_object_fields(7);
        //echo "CONSTRUCTOR | APPPATH " . APPPATH . '../uploads/expenses' . " | expenses_path: " . realpath(APPPATH . '../uploads/expenses');
        $this->expenses_path = realpath(APPPATH . '../uploads/expenses');
    }
    
    public function validate() {
        
        
        $this->form_validation->set_rules('mcb_expense_name', $this->lang->line('expense_name'));
        
        $this->form_validation->set_rules('expense_invoice_yesno', $this->lang->line('expense_invoice_yesno'));
        $this->form_validation->set_rules('expense_invoice_number', $this->lang->line('expense_invoice_number'));
        $this->form_validation->set_rules('expense_provider_id', $this->lang->line('expense_provider'), 'required');
        
        $this->form_validation->set_rules('expense_category_id', $this->lang->line('expense_category'), 'required');
        $this->form_validation->set_rules('mcb_expense_date', $this->lang->line('expense_date'), 'required');
        
        $this->form_validation->set_rules('expense_invoice_date', $this->lang->line('expense_invoice_date'));
        $this->form_validation->set_rules('expense_invoice_overdue_date', $this->lang->line('expense_invoice_overdue_date'));
        $this->form_validation->set_rules('expense_invoice_with_tax', $this->lang->line('expense_invoice_with_tax'));
        
        $this->form_validation->set_rules('mcb_expense_amount', $this->lang->line('expense_amount'), 'required|callback_amount_validate');
        
        
        $this->form_validation->set_rules('mcb_expense_file_url', $this->lang->line('upload_file'));
        $this->form_validation->set_rules('mcb_expense_note', $this->lang->line('expense_note'));
        
        //$this->form_validation->set_rules('client_id', $this->lang->line('expense_client'));
        
        
        $this->form_validation->set_rules('expense_payed', $this->lang->line('expense_payed'));
        if($this->input->post('expense_payed')){
	        $this->form_validation->set_rules('expense_paymentTypeId', $this->lang->line('expense_paymentTypeId'), 'required');
		}
        $this->form_validation->set_rules('expense_paymentBankId', $this->lang->line('expense_paymentBankId'));
        
        $this->form_validation->set_rules('mcb_expense_payto', $this->lang->line('expense_pay'));
        
        if($this->input->post('expense_invoice_yesno')){
	        $this->form_validation->set_rules('expense_invoice_number', $this->lang->line('expense_invoice_number'), 'required');
		}
		
		$this->form_validation->set_rules('expense_book_keeping_entry_id', $this->lang->line('expense_book_keeping_entry_id'));
		
		$this->form_validation->set_rules('expense_payment_date', $this->lang->line('expense_payment_date'));
		
		$this->form_validation->set_rules('mcb_base_expense_amount', $this->lang->line('mcb_base_expense_amount'), 'required');

        $this->form_validation->set_rules('expense_invoice_with_tax2', $this->lang->line('expense_invoice_with_tax2'), 'required');

        $this->form_validation->set_rules('mcb_expense_tax2_amount', $this->lang->line('mcb_expense_tax_amount2'), 'required');

        $this->form_validation->set_rules('mcb_expense_tax_amount', $this->lang->line('mcb_expense_tax_amount'), 'required');

        return parent::validate($this);
    }
    
    public function get_tax_rate_percent($tax_rate_id){
		
		$this->db->from(" mcb_tax_rates");
        $this->db->where("tax_rate_id", $tax_rate_id);
        $query = $this->db->get();
        		
		if ($query->num_rows() > 0) {
			$ret = $query->row();
			return $ret->tax_rate_percent;
		}
		else {
			return 0;
		}
	}
    
    public function db_array() {
        
        $db_array = parent::db_array();
        
        if(uri_assoc('mcb_expense_id')) {
            
            $db_array['mcb_expense_id'] = uri_assoc('mcb_expense_id');
            
        }
        else if($this->input->post('mcb_expense_id')) {
            
            $db_array['mcb_expense_id'] = $this->input->post('mcb_expense_id');
            
        }
        
        $db_array['mcb_expense_date'] = strtotime(standardize_date($db_array['mcb_expense_date']));
        $db_array['mcb_expense_amount'] = standardize_number($db_array['mcb_expense_amount']);
        $db_array['mcb_base_expense_amount'] = standardize_number($db_array['mcb_base_expense_amount']);
        $db_array['mcb_expense_tax_amount'] = standardize_number($db_array['mcb_expense_tax_amount']);
        $db_array['mcb_expense_tax2_amount'] = standardize_number($db_array['mcb_expense_tax2_amount']);
        $db_array['expense_invoice_with_tax2'] = standardize_number($db_array['expense_invoice_with_tax2']);
        
        
        if (isset($db_array['expense_invoice_yesno'])) {
			$db_array['expense_invoice_yesno'] = $this->_standardize_checkbox($db_array['expense_invoice_yesno']);
		} else {
            $db_array['expense_invoice_yesno'] = 0;
        }

		if (isset($db_array['expense_payed'])) {
			$db_array['expense_payed'] = $this->_standardize_checkbox($db_array['expense_payed']);
		} else {
            $db_array['expense_payed'] = 0;
        }

        if (!isset($db_array['expense_paymentTypeId'])) {
            $db_array['expense_paymentTypeId'] = 0;
        }      
        
        $db_array['expense_invoice_date'] = strtotime(standardize_date($db_array['expense_invoice_date']));
        $db_array['expense_invoice_overdue_date'] = strtotime(standardize_date($db_array['expense_invoice_overdue_date']));


        
        return $db_array;
    }
    
    protected function _standardize_checkbox($value) {
		if ($value!="") {
			return 1;
		}
		return 0;
	}
    
    public function save() {
        $db_array = $this->db_array();
        //print_r($db_array);
        parent::save($db_array, uri_assoc('mcb_expense_id'));
        return $this->db->insert_id();
    }
    
    
    public function set_date() {
        $this->set_form_value('mcb_expense_date', format_date(time()));
        
    }
    
    public function arrange_dates() {
		
        $this->set_form_value('mcb_expense_date', format_date($this->form_values['mcb_expense_date']));     
        $this->set_form_value('expense_invoice_date', format_date($this->form_values['expense_invoice_date']));     
        $this->set_form_value('expense_invoice_overdue_date', format_date($this->form_values['expense_invoice_overdue_date']));     
    }
    
    public function save_expense ($id) {
        
        $data = array(
            'mcb_expense_name' => $this->input->post('mcb_expense_name'),
            'expense_category_id' => $this->input->post('expense_category_id'),
            'mcb_expense_date' => strtotime(standardize_date($this->input->post('mcb_expense_date'))),
            'mcb_expense_amount' => $this->input->post('mcb_expense_amount'),
            'mcb_expense_note' => $this->input->post('mcb_expense_note'),
            'client_id' => $this->input->post('client_id'),
            'mcb_expense_payto' => $this->input->post('mcb_expense_payto')
        );
        $this->db->insert('mcb_expense', $data);
        
        
        
        return $this->db->insert_id();
    }
    
    public function get_provider_name($provider_id) {
        $this->db->from("mcb_providers");
        $this->db->where("provider_id", $provider_id);
        $query = $this->db->get();
        
        foreach ( $query->result() as $row) {
            echo $row->provider_name;
        }
    }
    
    public function getExpense($expense_id) {
		$this->db->from("mcb_expense");
        $this->db->where("mcb_expense.mcb_expense_id", $expense_id);
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
			$row = $query->row();
			return $row;
		}
		else
			return false;
	}
    
    
    public function getProviderShortNameByExpenseId($expense_id) {
		$this->db->from("mcb_providers");
		$this->db->join("mcb_expense", 'mcb_expense.expense_provider_id = mcb_providers.provider_id');
        $this->db->where("mcb_expense.mcb_expense_id", $expense_id);
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
			$row = $query->row();
			return $row->provider_shortname;
		}
		else
			return false;
	}

    protected function rename_file($expense_id,$originalname) {
        $expense=$this->getExpense($expense_id);
        $expense_date=$expense->expense_invoice_date;
        $mcb_expense_id=$expense->mcb_expense_id;
        $expense_provider_id=$expense->expense_provider_id;
        $provider_shortname=$this->getProviderShortNameByExpenseId($expense_id);
        $expense_date_reformated=str_replace('/', '_',format_date($expense_date));
        $expense_date_reformated_array = explode("_", $expense_date_reformated);
        $expense_date_reformated_array = array_reverse($expense_date_reformated_array);
        $expense_date_reformated = implode("_",$expense_date_reformated_array);

        $ext = pathinfo($originalname, PATHINFO_EXTENSION);
        return $expense_date_reformated . "_" . $expense_provider_id . "_" . $provider_shortname ."_" . $mcb_expense_id . ".".$ext;

    }
    
    public function insert_file($expense_id) {
        if (basename($_FILES['userfile']['name']) != '') {
					$originalname=basename($_FILES['userfile']['name']);
                    $new_name=$this->rename_file($expense_id,$originalname);
					
                    $data = array(
                            'mcb_expense_id' => $expense_id,
                            'mcb_expense_file_title' => base64_encode($this->unaccent(str_replace(' ', '_', $new_name))),
                            'mcb_expense_file_title_notbase64encoded' => $this->unaccent(str_replace(' ', '_', $new_name)),
                            'mcb_expense_file_original_title'  => basename($_FILES['userfile']['name']),
                            'mcb_expense_file_url' => $this->expenses_path
                    );

                    $this->db->insert('mcb_expense_file', $data);
                    return $this->db->insert_id();
        } else {
            return error_reporting();
        }
    }
    
    protected function unaccent($string) {
		if (extension_loaded('intl') === true)
		{
			$string = Normalizer::normalize($string, Normalizer::FORM_KD);
		}
		
		if (strpos($string = htmlentities($string, ENT_QUOTES, 'UTF-8'), '&') !== false)
		{
			$string = html_entity_decode(preg_replace('~&([a-z]{1,2})(?:acute|caron|cedil|circ|grave|lig|orn|ring|slash|tilde|uml);~i', '$1', $string), ENT_QUOTES, 'UTF-8');
		}
		
		return $string;
	}

    public function do_upload($expense_id=null)
        {
                $file_name = $_FILES['userfile']['name'];
                $new_name=$file_name;
                if ($expense_id!=null)
                    $new_name=$this->rename_file($expense_id,$file_name);
                $unnacent_filename=$this->unaccent($new_name);

                $config = array(
                        'upload_path' => $this->expenses_path,
                        'allowed_types' => 'gif|jpg|png|doc|txt|xls|xlsx|pdf|zip|rar|ods|odt|docx',
                        'max_size'  => 20000000,
                        'overwrite' => TRUE,
                        'file_name' => $unnacent_filename,
                );
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                $this->upload->do_upload();
                //Debug
                //echo $this->upload->display_errors();
        }
        
}
?>

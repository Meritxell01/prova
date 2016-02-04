<?php
(defined('BASEPATH')) OR exit('No direct script access allowed');

class Provider extends Admin_Controller {
    
    public function __construct() {
        parent::__construct();
        
        $this->_post_hander();
        
        $this->load->model('mdl_provider');
    }
 
    
    public function index() {
        
        $this->redir->set_last_index();
        
        $this->load->model('mdl_provider');
        $this->load->model('mdl_expenses');
        
        $data = array(
                'providers' => $this->mdl_provider->get()
        );
        
        $this->load->view('provider', $data);
        
    }
    
    public function form() {
        
        if (!$this->mdl_provider->validate()) {
            
            if (!$_POST AND uri_assoc('expense_provider_id')) {
                $this->mdl_provider->prep_validation(uri_assoc('expense_provider_id'));
            }
            
            $this->load->view('add_provider');
        
        } else {
            $this->mdl_provider->save($this->mdl_provider->db_array(), uri_assoc('expense_provider_id'));
            $this->redir->redirect('expenses/provider');
        }
        
        
    }


    public function get($params = NULL) {

        $provider = parent::get($params);

        if ($provider and isset($params['group_by_type'])) {

            $tmp = $provider;

            unset($provider);

            foreach ($tmp as $item) {

                $provider[$item->expense_provider_id][] = $item;

            }

        }

        return $provider;

    }
    
    public function delete() {
        
        if (uri_assoc('expense_provider_id')) {
            
            $this->mdl_provider->delete(array('expense_provider_id' => uri_assoc('expense_provider_id')));
            
        }
        
        $this->redir->redirect('expenses/provider');
        
    }


    public function _post_hander() {
        
        if($this->input->post('btn_add')) {
            redirect('expenses/provider/form');
        }
        
        if($this->input->post('btn_cancel')) {
            redirect('expenses/provider');
        }
        
    }

}
?>

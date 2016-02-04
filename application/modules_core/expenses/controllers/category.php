<?php
(defined('BASEPATH')) OR exit('No direct script access allowed');

class Category extends Admin_Controller {
    
    public function __construct() {
        parent::__construct();
        
        $this->_post_hander();
        
        $this->load->model('mdl_expense_category');
    }
 
    
    public function index() {
        
        $this->redir->set_last_index();
        
        $this->load->model('mdl_expense_category');
        $this->load->model('mdl_expenses');
        
        $data = array(
                'categorys' => $this->mdl_expense_category->get()
        );
        
        $this->load->view('category', $data);
        
    }
    
    public function form() {
        
        if (!$this->mdl_expense_category->validate()) {
            
            if (!$_POST AND uri_assoc('expense_category_id',4)) {
                $this->mdl_expense_category->prep_validation(uri_assoc('expense_category_id',4));
            }
            
            $this->load->view('add_category');
        
        } else {
            $this->mdl_expense_category->save();
            $this->redir->redirect('expenses/category');
        }
        
        
    }


    public function get($params = NULL) {

        $category = parent::get($params);

        if ($category and isset($params['group_by_type'])) {

            $tmp = $category;

            unset($category);

            foreach ($tmp as $item) {

                $category[$item->expense_category_id][] = $item;

            }

        }

        return $category;

    }
    
    public function delete() {
        
        if (uri_assoc('expense_category_id')) {
            
            $this->mdl_expense_category->delete(array('expense_category_id' => uri_assoc('expense_category_id')));
            
        }
        
        $this->redir->redirect('expenses/category');
        
    }


    public function _post_hander() {
        
        if($this->input->post('btn_add')) {
            redirect('expenses/category/form');
        }
        
        if($this->input->post('btn_cancel')) {
            redirect('expenses/category');
        }
        
    }

}
?>

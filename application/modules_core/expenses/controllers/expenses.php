<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class Expenses extends Admin_Controller {
    public function __construct() {
        
        parent::__construct();
        
        $this->_post_hander();
        
        $this->load->model('mdl_expenses');
         
    }
    
    public function index() {       
        
        $this->redir->set_last_index();
        
        $params = array(
            'paginate'	=>	FALSE
            // 'page'		=>	uri_assoc('page'),
            //'order_by'	=>	'expense_invoice_date DESC'
        );
        
        $this->load->model('mdl_expenses');
        
        $this->load->model('mdl_expense_file');
        
        $data = array(
            'expenses' =>   $this->mdl_expenses->get($params)
        );
        
//        $data['files'] = $this->mdl_expense_file->get($params_file);
        
        $this->load->view('index', $data);
    }

    public function form() {
        if (!$this->mdl_expenses->validate()) {
            $this->load->model('clients/mdl_clients');
			$this->load->model('tax_rates/mdl_tax_rates');
			
            $this->load->helper('form');
            
            $this->load->model('mdl_expense_category');
            $this->load->model('mdl_provider');
            $this->load->model('mdl_bank');
            $this->load->model('mdl_expense_payment_type');
            
            
            $data = array(
                'expenses_category' => $this->mdl_expense_category->get(),
                'providers' => $this->mdl_provider->get(),
                'expense_banks' => $this->mdl_bank->get(),
                'expense_payment_types' => $this->mdl_expense_payment_type->get(),
                'tax_rates' => $this->mdl_tax_rates->get(),
                'custom_fields'     => $this->mdl_expenses->custom_fields
            );
            
            if (!$_POST AND uri_assoc('mcb_expense_id')) {
                    $this->mdl_expenses->prep_validation(uri_assoc('mcb_expense_id'));
                
//                } else if(!$_POST AND uri_assoc('mcb_expense_date')) {

					$this->mdl_expenses->arrange_dates();
                }
                           
                $client_params = array(
                    'select'	=>	'mcb_clients.*'
                );
                
                $data['clients'] = $this->mdl_clients->get($client_params);
               
                $this->load->view('form', $data);
        } else {
//            $id = $this->mdl_expenses->save_expense(uri_assoc('mcb_expense_id'));
					                    
                    $id = $this->mdl_expenses->save($this->mdl_expenses->db_array(), uri_assoc('mcb_expense_id'));
                    
                    if (uri_assoc('mcb_expense_id')) {
                        $this->mdl_expenses->do_upload(uri_assoc('mcb_expense_id'));
                        $this->mdl_expenses->insert_file(uri_assoc('mcb_expense_id'));
                    } else {
                        $this->mdl_expenses->do_upload($id);
                        $this->mdl_expenses->insert_file($id);
                    }
            
            $this->redir->redirect('expenses');
        }
    }
   

    public function get($params = NULL) {

        $expenses = parent::get($params);

        if ($expenses and isset($params['group_by_type'])) {

            $tmp = $expenses;

            unset($expenses);

            foreach ($tmp as $item) {

                $expenses[$item->mcb_expense_id][] = $item;

            }

        }

        return $expenses;

    }
    
    public function delete() {
        
        if (uri_assoc('mcb_expense_id')) {
            
            $this->mdl_expenses->delete(array('mcb_expense_id' => uri_assoc('mcb_expense_id')));
            
        }
        if (uri_assoc('mcb_expense_file_id')) {
            $this->db->delete('mcb_expense_file', array('mcb_expense_file_id' => uri_assoc('mcb_expense_file_id')));
            
        }
        $this->redir->redirect('expenses'); 
        
    }
    
    public function _post_hander() {
        if ($this->input->post('btn_add')) {
            
            redirect('expenses/form');
            
        }
        
        if($this->input->post('btn_cancel')) {
            redirect('expenses/index');
        }
    }
    


    public function ajax_search() {
        $date_form = $this->input->post('date_form');
        $date_to = $this->input->post('to_date');
        $params = array();
        
        if ($date_form) {
            $params['where']['mcb_expense_date >='] =  strtotime(standardize_date($date_form));
        }
        if ($date_to) {
                $params['where']['mcb_expense_date <='] =  strtotime(standardize_date($date_to));
        }
        else if ($date_form && $date_to) {
            $params['where']['mcb_expense_date BETWEEN '] =  strtotime(standardize_date($date_form)). '" AND "'. strtotime(standardize_date($date_to)).'"';
        }
        
        $data = array(
            'expenses' => $this->mdl_expenses->get($params)
        );
        $data["e"] = "sucessful";
        $this->load->view('expense_search_view', $data);
    }
    
    public function files_options() {
    
    $expense_id = $_POST['expense_id'];
    
    $this->load->model('mdl_expense_file');
    
    $files = $this->mdl_expense_file->get_files($expense_id);
    ?>

        <table style="width: 100%;">
            <?php
                foreach ($files as $row) {
                      
                    ?>
                        <tr>
                            <td><a>
                                <?php 
                                    echo base64_decode(basename($row->mcb_expense_file_title)) . " ( " . $row->mcb_expense_file_original_title . " )"; ?>
                                </a>   
                                <a href="<?php echo site_url('expenses/delete/mcb_expense_file_id/'. $row->mcb_expense_file_id); ?>" onclick="javascript:if(!confirm('<?php echo $this->lang->line('confirm_delete'); ?>')) return false"><?php echo icon('delete')
                                ; ?></a>
                            </td>
                            <td>
                                <a href="<?php echo site_url('expenses/download/' . urlencode($row->mcb_expense_file_title)); ?>"><?php echo $this->lang->line('download'); ?></a>
                            </td>
                        </tr>
                <?php    
                }
        ?>
        </table> 
<td><a href="#" id="add_more" name="add_more" onclick="return false;"><?php echo $this->lang->line('add_more'); ?></a></td>
<div id="add-more" style="display: inline;"></div>                           
            <script type="text/javascript">
            
            $(function() {
             
                $('#add_more').click(function() {
                count_assign = parseInt($('#count_assign').val());
                count_more = count_assign + 1;
            
                $('#add-more').append('<form method="post" action="<?php echo site_url('expenses/expenses/upload'); ?>" enctype="multipart/form-data"><dl id="assign_more_'+count_more+'"><input type="file" name="userfile" id="userfile" multiple="multiple" /><input type="hidden" name="expense_id" id="expense_id" value="<?php echo $expense_id; ?>"<a href="#" onclick="return false;" id="remove"><?php echo icon('delete'); ?></a><input type="submit" id="upload" name="upload" value="<?php echo $this->lang->line('submit'); ?>" /></form>');
//                $('#count_assign').val(count_more);
                $('#remove').click(function() {
                    $('#assign_more_'+count_more).remove();
                });
                });
            
                });


            </script>
        <?php
}    

public function download ($file_path = "")
	{
			$file_path=utf8_decode(base64_decode(urldecode($file_path)));
			$this->load->helper('download'); //load helper
			
			//$file_path = $this->input->post("file_path",TRUE);
			
			$layout="no_theme"; //if you have layout
			
			$data['mcb_expense_file_title'] = $file_path;		
						
//			$this->load->view("view file",$data);
//			redirect("expenses/index", "refresh");
//                      
						$expenses_uploads_path="/usr/share/ebreinvoice-ebretic/uploads/expenses/";
						
                        $data = file_get_contents($expenses_uploads_path.$file_path); // Read the file's contents
                        $name = $file_path;
                        if( ! empty($data))
                            {

                                    force_download($name, $data);

                            }
                            else {
                                //redirect("expenses/index", "refresh");
                            }
					
	}
        
        public function upload() {
            
            $expense_id = $_POST['expense_id'];
            
            $this->mdl_expenses->do_upload($expense_id);
            $this->mdl_expenses->insert_file($expense_id);
            
            $this->redir->redirect('expenses'); 
        }
    }
?>

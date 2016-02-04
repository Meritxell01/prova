<?php  (defined('BASEPATH')) OR exit('No direct script access allowed'); 

class Mupload extends MY_Model{
    protected $_table = "mcb_expense_file";
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    public function insert_file($data){
        $this->db->insert($this->_table,$data);
        return $this->db->insert_id();
    }
    public function get_all_files($file_id =""){
        if($file_id != ""){
            $this->db->where("id",$file_id);
        }
        return $this->db->get($this->_table)->result_array();
    }
    public function delete_file($file_id){
        $file = $this->get_all_files($file_id);
        if($file == ""){
            return FALSE;
        }else{
            $this->db->where("id",$file_id);
            $this->db->delete($this->_table);
            unlink("./upload/" . $file[0]['file_name']); //xóa file upload trong thư mục chứa
            return TRUE;
        }        
    }
}  
?>
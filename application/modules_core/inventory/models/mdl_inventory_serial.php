<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class Mdl_Inventory_Serial extends MY_Model {

    public function __construct() {

        parent::__construct();

        $this->table_name = 'mdl_inventory_serial';

        $this->primary_key = 'mdl_inventory_serial.id';

        $this->select_fields = 'SQL_CALC_FOUND_ROWS *';

   		$this->order_by = 'inventory_serials';
		
        $this->limit = $this->mdl_mcb_data->setting('results_per_page');

    }

   
    public function add_sn($inventory_id, $serial) {

        $query= $this->db->query("insert into  mdl_inventory_serial  (inventory_type_id, serial)
VALUES (".$inventory_id.",'".$serial."')");

    }
	
	
	public function llistar_sn($id){
	
	$sql= $this->db->query("select * from mdl_inventory_serial where inventory_type_id=".$id);
	return $sql->result_array();
	}
	
	public function delete_sn($id, $serial){
	
	$this->db->query("DELETE FROM mdl_inventory_serial where inventory_type_id=".$id." AND serial='".$serial."'");
	return true;
	}
	
	public function snExistent($id,$serial)
	{
	  $sql= $this->db->query("select serial from mdl_inventory_serial where inventory_type_id=".$id." AND serial='".$serial."'");
	  return $sql->result_array();
	}
		
	
}

?>

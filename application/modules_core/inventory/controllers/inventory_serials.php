<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class Inventory_Serials extends Admin_Controller {

	public function __construct() {

		parent::__construct();

		$this->_post_handler();

		$this->load->model('mdl_inventory_types');
		$this->load->model('mdl_inventory_serial');

	}

	public function index() {

		$this->redir->set_last_index();

		$params = array(
			'paginate'	=>	TRUE,
			'page'		=>	uri_assoc('page', 4)
		);
		 $this->load->model('mdl_inventory');
		 $items = $this->mdl_inventory->get($params);
		 
		 $data = array(
            'items'	=>	$items
        );
		
		$this->load->view('inventory_add_serial', $data);

	}
	

	public function addForm() {
		
			$id=$this->input->get('id');
			$tipus=$this->input->get('tipus');
			$article=$this->input->get('article');
            
			if($id!=""){
			$id=$this->input->get('id');
			}else{
			$id=$this->input->post('id_add');
			}
			if($tipus != ""){
			$tipus=$this->input->get('tipus');
			}else{
			$tipus=$this->input->post('tipus');
			}
			if($article!=""){
			$article=$this->input->get('article');
			}else{
			$article=$this->input->post('article');
			}
			
			$sn_add=$this->input->post('add_num_serie');
			
			$submitMes=$this->input->post('btn_submit_mes');
			$submit=$this->input->post('btn_submit2');
			$cancel=$this->input->post('btn_cancel2');
			
			$data=array('id' => $id,'tipus' => $tipus,'article' => $article);
			
			//Botó afegir més
			if($submitMes!="")
			{
				  $serialExisteix[0]['serial']="";
				// carreguem la bd
				  $this->load->model('mdl_inventory_serial');
				  $serialExisteix=$this->mdl_inventory_serial->snExistent($id,$sn_add);
				
				
				if(isset($serialExisteix[0]['serial']))
				{
					$data=array('id' => $id,'tipus' => $tipus,'article' => $article, 'alert' =>"a1");
				}else
				{
				  $data=array('id' => $id,'tipus' => $tipus,'article' => $article, 'sn' =>$sn_add);
	
				  // carreguem la bd
				  $this->load->model('mdl_inventory_serial');
				  $this->mdl_inventory_serial->add_sn($id,$sn_add);
				}
				 //carreguem la vista
				 $this->load->view('add_serial',$data);
				 
				 //Botó enviar
			}else if($submit!="")
			{
				 $serialExisteix[0]['serial']="";
				// carreguem la bd
				  $this->load->model('mdl_inventory_serial');
				  $serialExisteix=$this->mdl_inventory_serial->snExistent($id,$sn_add);
				
				
				if(isset($serialExisteix[0]['serial']))
				{
					$data=array('id' => $id,'tipus' => $tipus,'article' => $article, 'alert' =>"a1");
					$this->load->view('add_serial',$data);
				}else
				{
					// carreguem la bd
					$this->load->model('mdl_inventory_serial');
					$this->mdl_inventory_serial->add_sn($id,$sn_add);
				
					$this->load->model('mdl_inventory');
				
					$params = array('paginate'	=>	TRUE, 'page' =>	uri_assoc('page', 4));
					$items = $this->mdl_inventory->get($params);
					$data = array('items'	=>	$items);
					redirect('inventory/inventory_serials');
					//$this->load->view('inventory_add_serial',$data);
				}
			
			}else if($cancel!=""){
				
			$this->load->model('mdl_inventory');
			$bool=1;
			$this->index();
			
			}else{
			$this->load->view('add_serial',$data);
			}
	}
	
	public function llistarForm() {
		
		$id=$this->input->get('id');
		$tipus=$this->input->get('tipus');
		$article=$this->input->get('article');
		
		// carreguem la bd
		$this->load->model('mdl_inventory_serial');
		$query = $this->mdl_inventory_serial->llistar_sn($id);
		
		 $data=array('id' => $id, 'tipus' => $tipus, 'article' => $article, 'query' => $query);
		//modificar serial
		$this->load->view('llistar_serial',$data);
		
	}

	public function eliminar_serial() {
		$id=$this->input->get('id');
		$serial=$this->input->get('serial');
		
		// carreguem la bd
		$this->load->model('mdl_inventory_serial');
		$query = $this->mdl_inventory_serial->delete_sn($id, $serial);
		$this->index();

	}

	public function _post_handler() {

		/*if ($this->input->post('btn_submit2')) {

			redirect('inventory/inventory_serials');

		}

		else */if ($this->input->post('btn_cancel2')) {

			redirect('inventory/inventory_serials');

		}

	}

}

?>

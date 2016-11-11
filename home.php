<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller{


	function __construct() 
			{
				parent::__construct();
				$this->load->model('HomeModel');
		        // Load url helper
				$this->load->helper('url');
			}


	public function index() 
			{ 

				$this->load->model('HomeModel');
				$User["records"] = $this->HomeModel->getData();
				$this->load->view('HomeView',$User); 
			} 
	public function get_user_data() 
			{

				$itm=$this->input->post('items');
				$data['res'] = $this->HomeModel->did_get_user_data($itm);
				echo json_encode($data['res']);


			}
} 
?>

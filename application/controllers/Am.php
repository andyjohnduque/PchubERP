<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Am extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	
	//public function __construct()
      //  {
        //    parent::__construct();
            //$this->load->library('MyLib');
            //$this->load->library('form_validation');
          //  $this->load->model('Home_model');
        //}
         //load the constructor
 function __construct()
 {
      //inherit the parent constructor
      parent::__construct();
 }
		
	public function create()
	{
            $this->load->helper('url');
            $this->load->model('branch_db');
            $data['branch']=$this->branch_db->view_all_branch();
            $data['brand']=$this->branch_db->view_all_brand();
            $data['cat']=$this->branch_db->view_all_cat();
            $data['serial']=$this->branch_db->view_all_ser();
            $data['status']=$this->branch_db->view_all_status();
            $this->load->view('am_create',$data);
            
	}
        public function check_sku()
	{
            $this->load->helper('url');
            $this->load->model('branch_db');
            $this->load->model('am_db');
            $data['branch']=$this->branch_db->view_all_branch();
            $data['brand']=$this->branch_db->view_all_brand();
            $data['cat']=$this->branch_db->view_all_cat();
            $data['serial']=$this->branch_db->view_all_ser();
            $data['status']=$this->branch_db->view_all_status();
            
            $data['check_sku']=$this->am_db->check_sku($_GET['sku']);
            $this->load->view('am_create',$data);
            
	}
        
        public function save_request()
	{
            $this->load->helper('url');
            $this->load->model('am_db');
            $code=$_POST['code'];
            $branch=$_POST['branch'];
            $description=$_POST['description'];
            $group=$_POST['group'];
            $brand=$_POST['brand'];
            $maprice=$_POST['maprice'];
            $sprice=$_POST['sprice'];
            $verman=$_POST['verman'];
            $serial=$_POST['serial'];
            $status=$_POST['status'];
            $userid=$this->session->userdata('userid');
            $am_no=$this->am_db->save_am($code,$brand,$description,$sprice,$maprice,$branch,$group,$verman,$serial,$status,$userid);
            
            $data['am']=$this->am_db->view_all_am();
            //$data['am']=$this->am_db->view_am($am_no);
            //$data['branch']=$this->branch_db->view_all_branch();
            //$data['brand']=$this->branch_db->view_all_brand();
            //$data['cat']=$this->branch_db->view_all_cat();
            //$data['serial']=$this->branch_db->view_all_ser();
            //$data['status']=$this->branch_db->view_all_status();
            $this->load->view('am_view_all',$data);
            
	}
        public function view_all_am()
	{
            $this->load->helper('url');
            $this->load->model('am_db');
            $data['am']=$this->am_db->view_all_am();
            //$data['am']=$this->am_db->view_am($am_no);
            //$data['branch']=$this->branch_db->view_all_branch();
            //$data['brand']=$this->branch_db->view_all_brand();
            //$data['cat']=$this->branch_db->view_all_cat();
            //$data['serial']=$this->branch_db->view_all_ser();
            //$data['status']=$this->branch_db->view_all_status();
            $this->load->view('am_view_all',$data);
            
	}
        public function delete()
        {
            $this->load->helper('url');
            $this->load->model('am_db');
            $this->am_db->del($_GET['am_no']);
            $data['am']=$this->am_db->view_all_am();
            $this->load->view('am_view_all',$data);
            
	}
        public function view_am()
	{
            $this->load->helper('url');
            $this->load->model('am_db');
            //$data['am']=$this->am_db->view_all_am();
            $data['am']=$this->am_db->view_am($_GET['am_no']);
            //$data['branch']=$this->branch_db->view_all_branch();
            //$data['brand']=$this->branch_db->view_all_brand();
            //$data['cat']=$this->branch_db->view_all_cat();
            //$data['serial']=$this->branch_db->view_all_ser();
            //$data['status']=$this->branch_db->view_all_status();
            $this->load->view('am_view',$data);
            
	}
}
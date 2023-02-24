<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Branch extends CI_Controller {

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
		
	public function index()
	{
            $role=$this->session->userdata('role');
    $username=$this->session->userdata('username');
    $fname=$this->session->userdata('fname');
    $userid=$this->session->userdata('userid');
            $data = array('role' => $role,
            'username' => $username,
            'fname' => $fname);
            $this->load->helper('url');
            $this->load->model('branch_db');
            
            $data['branch']=$this->branch_db->view_all_branch();
            $data['storage_codes']=$this->branch_db->storage_codes();
            $this->load->view('branch_all',$data);
            
	}
        public function view()
	{
            $role=$this->session->userdata('role');
    $username=$this->session->userdata('username');
    $fname=$this->session->userdata('fname');
    $userid=$this->session->userdata('userid');
            $data = array('role' => $role,
            'username' => $username,
            'fname' => $fname);
            $branch_id=$_GET['branch_id'];
            $this->load->helper('url');
            $this->load->model('branch_db');
            
            $data['branch']=$this->branch_db->view_branch($branch_id);
            $data['storage_code']=$this->branch_db->storage_code($branch_id);
            
            $this->load->view('branch',$data);
            
	}
        public function add()
	{
            $role=$this->session->userdata('role');
    $username=$this->session->userdata('username');
    $fname=$this->session->userdata('fname');
    $userid=$this->session->userdata('userid');
            $data = array('role' => $role,
            'username' => $username,
            'fname' => $fname);

            $this->load->helper('url');
            $this->load->view('branch_add',$data);
            
	}
        public function save_storage()
	{
            $role=$this->session->userdata('role');
    $username=$this->session->userdata('username');
    $fname=$this->session->userdata('fname');
    $userid=$this->session->userdata('userid');
            $data = array('role' => $role,
            'username' => $username,
            'fname' => $fname);
            $branch_id=$_POST['branch_id'];
            $storage_code=$_POST['storage_code'];
            $description=$_POST['description'];
            $this->load->helper('url');
            $this->load->model('branch_db');
            
            $this->branch_db->save_storage($branch_id,$storage_code,$description);
            $data['branch']=$this->branch_db->view_branch($branch_id);
            $data['storage_code']=$this->branch_db->storage_code($branch_id);
            
            $this->load->view('branch',$data);
            
	}
        public function save_branch()
	{
            $role=$this->session->userdata('role');
    $username=$this->session->userdata('username');
    $fname=$this->session->userdata('fname');
    $userid=$this->session->userdata('userid');
            $data = array('role' => $role,
            'username' => $username,
            'fname' => $fname);
            $branch_code=$_POST['branch_code'];
            $storage_code=$_POST['storage_code'];
            $description=$_POST['description'];
            $address=$_POST['address'];
            $branch_desc=$_POST['branch_desc'];
            $contact=$_POST['contact'];
            $this->load->helper('url');
            $this->load->model('branch_db');
            
            $check_branch=$this->branch_db->check_branch_code($branch_code);
            if(count($check_branch)==0){
            $this->branch_db->save_branch($branch_code,$address,$branch_desc,$contact);
            $this->branch_db->save_storage($branch_code,$storage_code,$description);
            $data['branch']=$this->branch_db->view_branch($branch_code);
            $data['storage_code']=$this->branch_db->storage_code($branch_code);
            $this->load->view('branch',$data);
            }else{
                $data['error_msg']='Branch Code already exists!';
                $this->load->view('branch_add',$data);
            }
            
            
            
	}
         public function delete_storage()
	{
            
            $role=$this->session->userdata('role');
    $username=$this->session->userdata('username');
    $fname=$this->session->userdata('fname');
    $userid=$this->session->userdata('userid');
            $data = array('role' => $role,
            'username' => $username,
            'fname' => $fname);
            $strg_cd = $_GET['strg_cd'];
            $branch_id = $_GET['branch_id'];
            

            $this->load->helper('url');
            $this->load->model('branch_db');

            $this->branch_db->delete_storage($branch_id,$strg_cd);
            $data['branch']=$this->branch_db->view_branch($branch_id);
            $data['storage_code']=$this->branch_db->storage_code($branch_id);
            
            $this->load->view('branch',$data);
             
	}
        public function branch_delete()
	{
            
            $role=$this->session->userdata('role');
    $username=$this->session->userdata('username');
    $fname=$this->session->userdata('fname');
    $userid=$this->session->userdata('userid');
            $data = array('role' => $role,
            'username' => $username,
            'fname' => $fname);
            $branch_id = $_GET['branch_id'];
            

            $this->load->helper('url');
            $this->load->model('branch_db');

            $this->branch_db->delete_branch($branch_id);
            $data['branch']=$this->branch_db->view_all_branch();
            $data['storage_codes']=$this->branch_db->storage_codes();
            $this->load->view('branch_all',$data);
             
	}
        
         
}
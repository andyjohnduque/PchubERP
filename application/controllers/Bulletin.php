<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bulletin extends CI_Controller {

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
     
            
	}
        public function crt_msg()
	{
            $this->load->helper('url');
            $this->load->model('bulletin_db');
            
            $data['bulletin']=$this->bulletin_db->view_bulletin();
            //$data['storage_code']=$this->branch_db->view_latest_msg();
            $this->load->view('bulletin',$data);
	}
        public  function save_msg(){
            $this->load->model('bulletin_db');
            $userid=$this->session->userdata('userid');
            $this->bulletin_db->save_msg($_POST['title'],$_POST['msg'],$userid);
            $data['bulletin']=$this->bulletin_db->view_bulletin();
            $this->load->view('bulletin',$data);
        }
       
        
         
}
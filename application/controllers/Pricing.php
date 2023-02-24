<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pricing extends CI_Controller {

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
            $this->load->helper('url');
            $this->load->model('pricing_db');
            $this->load->model('branch_db');
            $this->load->model('users');
            $data['vendor']=$this->users->vendor();
            $data['vendor_discount']=$this->pricing_db->vendor_discount();
            $data['brand']=$this->branch_db->view_all_brand();
            $this->load->view('pricing_view',$data);
            
	}
        public function save_disc(){
            $this->load->model('pricing_db');
            $vendor=$_POST['vendor'];
            $brand=$_POST['brand'];
            $disc=$_POST['disc'];
            $this->load->model('pricing_db');
            $this->load->model('branch_db');
            $this->pricing_db->save_disc($vendor,$brand,$disc);
            $data['vendor_discount']=$this->pricing_db->vendor_discount();
            $data['brand']=$this->branch_db->view_all_brand();
            $data['msg']="Record successfuly saved!";
            $this->load->view('pricing_view',$data);
        }
        public function delete(){
            $rid=$_GET['r'];
            $this->load->model('pricing_db');
            $this->load->model('branch_db');
            $this->pricing_db->del_disc($rid);
            $data['vendor_discount']=$this->pricing_db->vendor_discount();
            $data['brand']=$this->branch_db->view_all_brand();
            $this->load->view('pricing_view',$data);
        }
}
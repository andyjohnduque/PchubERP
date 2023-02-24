<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Builds extends CI_Controller {

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
 function __construct()
 {
      //inherit the parent constructor
      parent::__construct();
 }

////
 public function view()
	{
            $this->load->helper('url');
            $this->load->model('products');
		$role=$this->session->userdata('role');
		$username=$this->session->userdata('username');
		$fname=$this->session->userdata('fname');
                $userid=$this->session->userdata('userid');
		$data = array('role' => $role,
		'username' => $username,
		'fname' => $fname);
             $data['builds']=$this->products->view_completed('builds');
             $data['comments']=$this->products->view_completed_comments('builds');
             $data['featured_prods']=$this->products->featured_prod_settings();
             if ($userid != ""){
                $data['view_liked_disliked']=$this->products->view_liked_disliked($userid);
             }else{
                 $data['view_liked_disliked']=$this->products->view_liked_disliked(00);
             }
             $data['userid']= $userid;
             
             $this->load->view('completed_builds',$data);
	}
}


/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
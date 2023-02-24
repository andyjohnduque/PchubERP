<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
	public function index()
	{
	    //echo'This site is under development.';exit;
            $this->load->helper('url');
            $this->load->model('products');
            $this->load->model('bulletin_db');
		$role=$this->session->userdata('role');
		$username=$this->session->userdata('username');
		$fname=$this->session->userdata('fname');
		$data = array('role' => $role,
		'username' => $username,
		'fname' => $fname);
                //$data['featured_prods']=$this->products->featured_prod_settings();
             //$data['builds']=$this->products->view_builds('builds');
                $data['bulletin']=$this->bulletin_db->view_latest_msg();
		$this->load->view('home',$data);
	}
        public function contact(){
    $this->load->helper('url');
    $this->load->model('products');
    $data = array('username'=>null);
    
    $this->load->view('contact',$data);
}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */

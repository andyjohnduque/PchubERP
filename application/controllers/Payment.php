<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Payment extends CI_Controller {

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
 
 
public function update_payment(){
    $ri=$_POST['ri'];
    $rno=$_POST['rno'];
    $pay_amt=$_POST['pay_amt'];
    $grid=$_POST['grid'];
    $userid=$this->session->userdata('userid');
    $username=$this->session->userdata('username');
    $role=$this->session->userdata('role');
    $this->load->model('payments');
    $this->load->model('warehouse');
     $this->payments->update_payments($ri,$rno,$grid,$userid,$username,$pay_amt);
    $data['quotation_hist']=$this->warehouse->quotation_hist($ri);
    if($role=="Vendor"){
    $data['quotation_request']=$this->warehouse->user_quotation_request($userid,$ri);
    $data['quotation_items']=$this->warehouse->user_quotation_items($userid,$ri);
    }else{
        $data['quotation_request']=$this->warehouse->access_quotation_request($ri);
        $data['quotation_items']=$this->warehouse->access_quotation_items($ri);
    }
    $data['payments']=$this->payments->view_payments($ri);
    $this->load->view('quotation_view',$data);
}
 
public function invoice(){
    $role=$this->session->userdata('role');
    $username=$this->session->userdata('username');
    $fname=$this->session->userdata('fname');
    $data = array('role' => $role,
            'username' => $username,
            'fname' => $fname);
            $this->load->helper('url');
    $this->load->model('warehouse');
    $this->load->model('payments');

        $s="Invoice";
    
    $data['s']=$s;
    $data['quotation_request']=$this->payments->invoice();
    //$data['quotation_items']=$this->warehouse->quotation_items();

    $this->load->view('quotation_view_all_invoice',$data);
}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
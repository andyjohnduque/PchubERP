<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Stock_return extends CI_Controller {

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
 
 
 public function create_sr(){
    $userid=$this->session->userdata('userid');
    $this->load->model('users');
    $data['profile']=$this->users->profile($userid);
    $this->load->view('stock_return',$data);
}
public function view_sr(){
    $this->load->model('warehouse');
    $userid=$this->session->userdata('userid');
    $data['am']=$this->warehouse->stock_returned();
    $this->load->view('stock_returned',$data);
}
public function single_sr_view()
	{
    $this->load->model('warehouse');
    $userid=$this->session->userdata('userid');
    $data['ws_request']=$this->warehouse->sr_request($_GET['sr']);
    $data['ws_items']=$this->warehouse->sr_items($_GET['sr']);
     $this->load->view('stock_returned_single_view',$data);
        }
public function pending()
	{
            $this->load->helper('url');
            $this->load->model('warehouse');
            $data['am']=$this->warehouse->stock_returned_pending();
            //$data['am']=$this->am_db->view_am($am_no);
            //$data['branch']=$this->branch_db->view_all_branch();
            //$data['brand']=$this->branch_db->view_all_brand();
            //$data['cat']=$this->branch_db->view_all_cat();
            //$data['serial']=$this->branch_db->view_all_ser();
            //$data['status']=$this->branch_db->view_all_status();
            $this->load->view('stock_returned',$data);
            
	}
public function new_entry(){
    $role=$this->session->userdata('role');
    $username=$this->session->userdata('username');
    $fname=$this->session->userdata('fname');
    $data = array('role' => $role,
            'username' => $username,
            'fname' => $fname);
            $this->load->helper('url');
            
    $this->load->model('warehouse');
    $notes=$_POST['notes'];
    $so=$_POST['so'];
    $mydate=$_POST['mydate'];
    $data['so']=$so;
    $data['notes']=$notes;
    $data['mydate']=$mydate;
    $userid=$this->session->userdata('userid');
    $data['inventory']=$this->warehouse->so_view_all_material();
    
    
    $this->load->view('sales_order_entry',$data);
}

public function add_entry(){
    $role=$this->session->userdata('role');
    $username=$this->session->userdata('username');
    $fname=$this->session->userdata('fname');
    $userid=$this->session->userdata('userid');
    $data = array('role' => $role,
            'username' => $username,
            'fname' => $fname);
            $this->load->helper('url');
            
    $this->load->model('warehouse');
    $so=$_POST['so'];
    $notes=$_POST['notes'];
    $data['so']=$so;
    $data['notes']=$notes;
    $mydate=$_POST['mydate'];
    $data['mydate']=$mydate;
    
    $inventory=$this->warehouse->so_view_all_material();

    foreach($inventory as $row){
        if(isset($_POST['chk_'.$row['sku']])){
            $this->warehouse->so_add_remove_warehouse($row['sku'],$_POST[$row['sku']],$userid,$so);
        }
    }
    
    $data['quotation_request']=$this->warehouse->so_quotation($userid);
    $data['quotation_items']=$this->warehouse->user_so_items($userid,$so);
    $this->load->view('sales_order',$data);
}
public function submit_request(){
    $role=$this->session->userdata('role');
    $username=$this->session->userdata('username');
    $fname=$this->session->userdata('fname');
    $userid=$this->session->userdata('userid');
    $data = array('role' => $role,
            'username' => $username,
            'fname' => $fname);
            $this->load->helper('url');

    $this->load->model('warehouse');
    $inventory=$this->warehouse->so_warehouse();
    $sr=$_POST['sr'];
    $data['sr']=$sr;
    $mydate=$_POST['mydate'];
    $data['mydate']=$mydate;
    $notes=$_POST['notes'];
   
    $data['notes']=$notes;
    
    $this->warehouse->save_sr($sr,$userid,$username,$mydate,$notes);
    //$this->warehouse->so_submit_user_item($userid,$_POST['so']);
    //$data['quotation_hist']=$this->warehouse->so_hist($so);
    $data['sr_request']=$this->warehouse->user_sr_request($userid,$_POST['sr']);
    $data['sr_items']=$this->warehouse->user_sr_items($userid,$_POST['sr']);
    
    $this->load->view('stock_return_view',$data);
}
public function request_material(){
                $this->load->helper('url');
            $this->load->model('branch_db');
            $data['branch']=$this->branch_db->view_all_branch();
            $data['brand']=$this->branch_db->view_all_brand();
            $data['cat']=$this->branch_db->view_all_cat();
            $data['serial']=$this->branch_db->view_all_ser();
            $data['status']=$this->branch_db->view_all_status();
            $this->load->view('material_request',$data);
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
            $this->load->view('material_create',$data);
            
	}

public function save_request()
	{
            $this->load->helper('url');
            $this->load->model('warehouse');
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
            $materialslip = $_POST['materialslip'];
            $userid=$this->session->userdata('userid');
            $am_no=$this->warehouse->save_material($materialslip,$code,$brand,$description,$sprice,$maprice,$branch,$group,$verman,$serial,$status,$userid);
            
            $data['am']=$this->warehouse->view_all_material();
            //$data['am']=$this->am_db->view_am($am_no);
            //$data['branch']=$this->branch_db->view_all_branch();
            //$data['brand']=$this->branch_db->view_all_brand();
            //$data['cat']=$this->branch_db->view_all_cat();
            //$data['serial']=$this->branch_db->view_all_ser();
            //$data['status']=$this->branch_db->view_all_status();
            $this->load->view('material_view_all',$data);
            
	}
public function view_all_material()
	{
            $this->load->helper('url');
            $this->load->model('warehouse');
            $data['am']=$this->warehouse->so_view_all_material();
            //$data['am']=$this->am_db->view_am($am_no);
            //$data['branch']=$this->branch_db->view_all_branch();
            //$data['brand']=$this->branch_db->view_all_brand();
            //$data['cat']=$this->branch_db->view_all_cat();
            //$data['serial']=$this->branch_db->view_all_ser();
            //$data['status']=$this->branch_db->view_all_status();
            $this->load->view('material_view_all',$data);
            
	}
public function view_all_so(){
    $this->load->model('warehouse');
    $data['am']=$this->warehouse->so_view_all();
    $this->load->view('sales_order_view_all',$data);
}
public function add_sr_entry(){
    $role=$this->session->userdata('role');
    $username=$this->session->userdata('username');
    $fname=$this->session->userdata('fname');
    $userid=$this->session->userdata('userid');
            
    $this->load->model('users');
     
    $data = array('role' => $role,
            'username' => $username,
            'fname' => $fname);
            $this->load->helper('url');
            
    $this->load->model('warehouse');
    $sr=$_POST['sr'];
    $data['sr']=$sr;
    
    $inventory=$this->warehouse->ms_warehouse();

    foreach($inventory as $row){
        if(isset($_POST['chk_'.$row['sku']])){
            $this->warehouse->sr_add_remove_warehouse($row['sku'],$_POST[$row['sku']],$userid,$sr);
        }
    }
    
    $data['quotation_request']=$this->warehouse->sr_material($userid);
    $data['quotation_items']=$this->warehouse->user_sr_items($userid,$sr);
    $data['profile']=$this->users->profile($userid);
    $this->load->view('stock_return',$data);
}
public function approving()
	{
    $this->load->model('warehouse');
    //get the requested list
    $ws_items=$this->warehouse->sr_items($_POST['ms']);
    $approval = true;
    foreach ($ws_items as $x){
        //check stock count before approving
        $check_stock_ct=$this->warehouse->check_sr_stock_count($x['sr_id'],$x['sku']);
        foreach($check_stock_ct as $x){
            $check_stock_count=$x['ct'];
        }
        if($check_stock_count > 0){
            $approval = true;
        }else{
            $approval = false;
        }       
    }
    if($approval==true){
        foreach ($ws_items as $z){
        $check_sku_exists_ct=$this->warehouse->check_sr_sku_exists($z['sku']);
        foreach($check_sku_exists_ct as $x){
            if($x['ct']>0){
                //update warehouse_so
                $this->warehouse->update_item_to_warehouse_so($_POST['ms'],$z['sku'],$z['req_qty']);
            }else{
                $sku_exist=false;
                //insert warehouse_so
                 $this->warehouse->add_item_to_warehouse_so($_POST['ms'],$z['sku']);
            }
        }
        }
        $this->warehouse->ms_approved($_POST['ms']);
    }else{
        $data['msg'] =  "insufficient stock! or one of the stock requested are not available in the warehouse!";
    }
    $data['ws_request']=$this->warehouse->ws_request($_POST['ms']);
    $data['ws_items']=$this->warehouse->ws_items($_POST['ms']);
    $this->load->view('material_view',$data);
        } 
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
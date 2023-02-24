<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Material extends CI_Controller {

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
 
 
 public function create_material(){

    $this->load->view('material_request');
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
    $ms=$_POST['ms'];
    $data['ms']=$ms;
    $userid=$this->session->userdata('userid');
    $data['inventory']=$this->warehouse->ms_warehouse();
    
    
    $this->load->view('material_entry',$data);
}
public function fso_new_entry(){
    $role=$this->session->userdata('role');
    $username=$this->session->userdata('username');
    $fname=$this->session->userdata('fname');
    $userid=$this->session->userdata('userid');
    $data = array('role' => $role,
            'username' => $username,
            'fname' => $fname);
            $this->load->helper('url');
            
    $this->load->model('warehouse');
    $sr=$_POST['sr'];
    $data['sr']=$sr;

    $data['inventory']=$this->warehouse->warehouse_so($userid);
    
    
    $this->load->view('stock_return_entry',$data);
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
    $ms=$_POST['ms'];
    $data['ms']=$ms;
    
    $inventory=$this->warehouse->ms_warehouse();

    foreach($inventory as $row){
        if(isset($_POST['chk_'.$row['sku']])){
            $this->warehouse->ws_add_remove_warehouse($row['sku'],$_POST[$row['sku']],$userid,$ms);
        }
    }
    
    $data['quotation_request']=$this->warehouse->ms_quotation($userid);
    $data['quotation_items']=$this->warehouse->user_ms_items($userid,$ms);
    $this->load->view('material_request',$data);
}
public function search_prod(){
    $title=$_GET['title'];
    $role=$this->session->userdata('role');
    $username=$this->session->userdata('username');
    $fname=$this->session->userdata('fname');
    $data = array('role' => $role,
            'username' => $username,
            'fname' => $fname);
            $this->load->helper('url');
            
    $this->load->model('warehouse');
    $ms=$_GET['ms'];
    $data['ms']=$ms;
    $userid=$this->session->userdata('userid');
    $data['inventory']=$this->warehouse->ms_warehouse_search($title);
    
    
    $this->load->view('material_entry',$data);
}
function get_autocomplete(){
    $title=$_GET['term'];
        $this->load->helper('url');
    $this->load->model('warehouse');
	if(isset($title)){
		$result = $this->warehouse->search_material($title);
	if(count($result)>0){
		foreach($result as $row)
		$arr_result[] = $row->description;
		echo json_encode($arr_result);
           
	//}
	}
        //if (isset($_GET['term'])) {
        //$result = $this->products->search_prod($_GET['term']);
        //if (count($result) > 0) {
        //    foreach ($result as $row)
        //        $arr_result[] = array(
        //            'label'         => $row->search_box,
        //            'description'   => $row->category,
         //    );
         //       echo json_encode($arr_result);
        //}
    }
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
    $ms=$_POST['ms'];
    $data['ms']=$ms;
    
    $assembly=$_POST['assembly'];
    
    $this->warehouse->save_ms($ms,$userid,$username,$assembly);
    //$this->warehouse->so_submit_user_item($userid,$_POST['so']);
    //$data['quotation_hist']=$this->warehouse->so_hist($so);
    $data['ws_request']=$this->warehouse->user_ws_request($userid,$_POST['ms']);
    $data['ws_items']=$this->warehouse->user_ws_items($userid,$_POST['ms']);
    
    $this->load->view('material_view',$data);
}
public function pending()
	{
            $this->load->helper('url');
            $this->load->model('warehouse');
            $data['am']=$this->warehouse->ws_pending();
            //$data['am']=$this->am_db->view_am($am_no);
            //$data['branch']=$this->branch_db->view_all_branch();
            //$data['brand']=$this->branch_db->view_all_brand();
            //$data['cat']=$this->branch_db->view_all_cat();
            //$data['serial']=$this->branch_db->view_all_ser();
            //$data['status']=$this->branch_db->view_all_status();
            $this->load->view('material_view_all',$data);
	}

public function view_material()
	{
    $this->load->model('warehouse');
    
    $data['ws_request']=$this->warehouse->ws_request($_GET['ms']);
    $data['ws_items']=$this->warehouse->ws_items($_GET['ms']);
     $this->load->view('material_view',$data);
        }

public function approving()
	{
    $this->load->model('warehouse');
    //get the requested list
    $ws_items=$this->warehouse->ws_items($_POST['ms']);
    $approval = true;
    foreach ($ws_items as $x){
        //check stock count before approving
        $check_stock_ct=$this->warehouse->check_stock_count($x['material_slip'],$x['sku']);
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
        $check_sku_exists_ct=$this->warehouse->check_sku_exists($z['sku']);
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
public function stock_requested(){
    $this->load->model('warehouse');
    $userid=$this->session->userdata('userid');
    $data['am']=$this->warehouse->stock_requested();
    $this->load->view('stock_requested',$data);
}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
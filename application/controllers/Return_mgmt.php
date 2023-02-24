<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Return_mgmt extends CI_Controller {

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
            $this->load->model('return_management');
            
            $data['view_all_rma']=$this->return_management->view_all_rma();
            //$data['view_rma_itm_details']=$this->return_management->view_rma_itm_details();
            $data['view_ct']=$this->return_management->view_ct();
            $this->load->view('return_mgmt',$data);
            
	}
        public function view_completed()
	{
            $role=$this->session->userdata('role');
    $username=$this->session->userdata('username');
    $fname=$this->session->userdata('fname');
    $userid=$this->session->userdata('userid');
            $data = array('role' => $role,
            'username' => $username,
            'fname' => $fname);
            $this->load->helper('url');
            $this->load->model('return_management');
            
            $data['view_all_rma']=$this->return_management->view_all_comp_rma();
            //$data['view_rma_itm_details']=$this->return_management->view_rma_itm_details();
            $data['view_ct']=$this->return_management->view_ct();
            $this->load->view('return_mgmt',$data);
            
	}
        public function mass_update()
	{
            $role=$this->session->userdata('role');
    $username=$this->session->userdata('username');
    $fname=$this->session->userdata('fname');
    $userid=$this->session->userdata('userid');
            $data = array('role' => $role,
            'username' => $username,
            'fname' => $fname);
            $this->load->helper('url');
            $this->load->model('return_management');
            
            $rma=$_POST['rma'];
            $rmm=$_POST['rmm'];
            $r_date=$_POST['r_date'];
            $po_date=$_POST['po_date'];
            $comm=$_POST['comm'];
            $masstxt=$_POST['masstxt'];
            $update_ct = substr_count($masstxt, ",");
            $masstxt = $masstxt . ",";
            $i=0;
            while( $i < $update_ct){
                $i++;
                $masstxt = substr($masstxt,1);
                    $a = substr($masstxt,0,strpos($masstxt,","));  
                $masstxt = substr($masstxt,strpos($masstxt,",")); 
               $rid=substr($a,0,strpos($a,"-"));
               $seq=substr($a,strpos($a,"-")+1);
               $hist_desc="";
               if($rma!="" || $rma!=null){
                    $this->return_management->mass_update($rid,$seq,'vendor_rma',$rma);
                    $hist_desc = $hist_desc . ",Vendor RMA";
                }
                if($rmm!="" || $rmm!=null){
                    $this->return_management->mass_update($rid,$seq,'vendor_rmm',$rmm);
                    $hist_desc = $hist_desc . ",Vendor RMM";
                }
                if($r_date!="" || $r_date!=null){
                    $this->return_management->mass_update($rid,$seq,'rr_date',$r_date);
                    $hist_desc = $hist_desc . ",Replace Date";
                }
                if($po_date!="" || $po_date!=null){
                    $this->return_management->mass_update($rid,$seq,'pull_out_date',$po_date);
                    $hist_desc = $hist_desc . ",Pullout Date";
                    
                }
                $this->return_management->mass_update($rid,$seq,'item_comm',$comm);
                $hist_desc = substr($hist_desc,1);
                $hist_desc = "Mass Update(" . $hist_desc . ")";
                $this->return_management->save_hist($rid,'Update','N/A',$userid,$username,'N/A',$hist_desc,$seq);
            }
            
            $data['view_all_rma']=$this->return_management->view_all_rma();
            //$data['view_rma_itm_details']=$this->return_management->view_rma_itm_details();
            $data['view_ct']=$this->return_management->view_ct();
            $this->load->view('return_mgmt',$data);
            
	}
        public function instructions()
	{
            $role=$this->session->userdata('role');
    $username=$this->session->userdata('username');
    $fname=$this->session->userdata('fname');
    $userid=$this->session->userdata('userid');
            $data = array('role' => $role,
            'username' => $username,
            'fname' => $fname);
            $this->load->helper('url');
            $this->load->model('return_management');
            
            $data['return_inst']=$this->return_management->return_inst($_GET['rid'],$_GET['rno']);
            $this->load->view('return_instruction_create',$data);
            
	}
        
        public function save_memo()
	{
            $role=$this->session->userdata('role');
    $username=$this->session->userdata('username');
    $fname=$this->session->userdata('fname');
    $userid=$this->session->userdata('userid');
            $data = array('role' => $role,
            'username' => $username,
            'fname' => $fname);
            $this->load->helper('url');
            $this->load->model('return_management');
            $this->return_management->save_memo($_POST['rid'],$_POST['rno'],$_POST['supp_side'],$_POST['cust_side']);
            $this->return_management->save_hist($_POST['rid'],'Update','N/A',$userid,$username,'N/A','Instruction Updated',$_POST['rno']);
            $data['return_inst']=$this->return_management->return_inst($_POST['rid'],$_POST['rno']);
            $this->load->view('return_instruction_create',$data);
            
	}
        public function save_inst()
	{
            $role=$this->session->userdata('role');
    $username=$this->session->userdata('username');
    $fname=$this->session->userdata('fname');
    $userid=$this->session->userdata('userid');
            $data = array('role' => $role,
            'username' => $username,
            'fname' => $fname);
            $this->load->helper('url');
            $this->load->model('return_management');
            $cm_p=$_POST['cm_price'];
            $this->return_management->save_inst($_POST['rid'],$_POST['rno'],$_POST['supp_suggestion'],$_POST['cur_price'],$cm_p);
            $comments="Instruction - " . $_POST['supp_suggestion'];
            //$this->return_management->save_inst_hist($_POST['rid'],$comments,$userid,$username);
            $this->return_management->save_hist($_POST['rid'],'Update','N/A',$userid,$username,'N/A','Instrunction Created',$_POST['rno']);
            $data['return_inst']=$this->return_management->return_inst($_POST['rid'],$_POST['rno']);
            $this->load->view('return_instruction_create',$data);
            
	}
        
        public function search_1()
	{
            $this->load->view('return_mgmt_search');
            
	}
        public function search()
	{
            
          $role=$this->session->userdata('role');
    $username=$this->session->userdata('username');
    $fname=$this->session->userdata('fname');
    $userid=$this->session->userdata('userid');
            $data = array('role' => $role,
            'username' => $username,
            'fname' => $fname);
            //echo $this->session->userdata('role');
            //echo $this->session->userdata('rm') . "--";
            $this->load->helper('url');
            $this->load->library('session');
             $this->load->model('return_management');
             $search="";
             if($_POST['rma']!=""){
                 $search=$_POST['rma'];
                 $data['view_all_rma']=$this->return_management->view_rma_search($search);
                 $data['search_crt'] = "rma";
             }
             if($_POST['customer']!=""){
                 $search=$_POST['customer'];
                 $data['view_all_rma']=$this->return_management->view_rma_cust($search);
                 $data['search_crt'] = "customer";
             }  
             if($_POST['datefrm']!=""){
                 $search=$_POST['datefrm'];
                 $data['view_all_rma']=$this->return_management->view_rma_date($search);
                 $data['search_crt'] = "datefrm";
             }
             if($search==""){
                 $data['view_all_rma']=$this->return_management->view_all_rma();
                 $data['search_crt'] = "";
             }
            $data['search'] = $search;

            $data['view_ct']=$this->return_management->view_ct();
            $data['view_rma_itm_details']=$this->return_management->view_rma_itm_details();
            
            $this->load->view('return_mgmt',$data);
            
	}
        public function view_hist()
	{
            $role=$this->session->userdata('role');
    $username=$this->session->userdata('username');
    $fname=$this->session->userdata('fname');
    $userid=$this->session->userdata('userid');
            $data = array('role' => $role,
            'username' => $username,
            'fname' => $fname);
            //echo $this->session->userdata('role');
            //echo $this->session->userdata('rm') . "--";
            $this->load->helper('url');
            $this->load->library('session');
            $this->load->model('return_management');
            $this->load->model('warehouse');
            $data['rid']= $_GET['rid'];
            $data['seq']= $_GET['seq'];
            $data['view_rma_hist']=$this->return_management->return_mgmt_hist($_GET['rid'],$_GET['seq']);
            
            $this->load->view('return_hist',$data);
            
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
            //echo $this->session->userdata('role');
            //echo $this->session->userdata('rm') . "--";
            $this->load->helper('url');
            $this->load->library('session');
            $this->load->model('return_management');
            $this->load->model('warehouse');
            $data['view_rma']=$this->return_management->view_rma($_GET['rid'],$_GET['seq']);
       
                $data['view_rma_attach_a']=$this->return_management->view_rma_attach($_GET['rid'],'Approver',$_GET['seq']);

                $data['view_rma_attach_r']=$this->return_management->view_rma_attach($_GET['rid'],'Requestor',$_GET['seq']);


            $data['view_rma_item']=$this->return_management->view_rma_item($_GET['rid'],$_GET['seq']);

            $data['view_rma_hist']=$this->return_management->return_mgmt_hist($_GET['rid'],$_GET['seq']);
            $data['view_comments']=$this->return_management->view_comments($_GET['rid'],$_GET['seq']);
            $this->load->view('return_view',$data);
            
	}
        public function add_comments()
	{
            $role=$this->session->userdata('role');
    $username=$this->session->userdata('username');
    $fname=$this->session->userdata('fname');
    $userid=$this->session->userdata('userid');
            $data = array('role' => $role,
            'username' => $username,
            'fname' => $fname);
            //echo $this->session->userdata('role');
            //echo $this->session->userdata('rm') . "--";
            $this->load->helper('url');
            $this->load->library('session');
            $this->load->model('return_management');
            $this->load->model('warehouse');
            
            $this->return_management->add_comment($_POST['rid'],$_POST['add_comment'],$userid,$username,$_POST['seq']);
            $data['view_rma']=$this->return_management->view_rma($_POST['rid'],$_POST['seq']);
       
                $data['view_rma_attach_a']=$this->return_management->view_rma_attach($_POST['rid'],'Approver',$_POST['seq']);

                $data['view_rma_attach_r']=$this->return_management->view_rma_attach($_POST['rid'],'Requestor',$_POST['seq']);


            $data['view_rma_item']=$this->return_management->view_rma_item($_POST['rid'],$_POST['seq']);

            $data['view_rma_hist']=$this->return_management->return_mgmt_hist($_POST['rid'],$_POST['seq']);
            $data['view_comments']=$this->return_management->view_comments($_POST['rid'],$_POST['seq']);
            $this->load->view('return_view',$data);
            
	}
        public function return_request(){
            $role=$this->session->userdata('role');
    $username=$this->session->userdata('username');
    $fname=$this->session->userdata('fname');
    $userid=$this->session->userdata('userid');
            $data = array('role' => $role,
            'username' => $username,
            'fname' => $fname);
            $this->load->helper('url');
            $this->load->model('warehouse');
            $this->load->model('users');
            $data['view_brand']=$this->warehouse->view_brand();
            $data['view_category']=$this->warehouse->view_category();
            $data['view_branch']=$this->warehouse->view_branch();
            $data['user']=$this->users->profile($userid);
            $this->load->view('return_creation',$data);
        }
        
        public function save_request(){
            //$rid=$_POST['rid'];
            $fname=$_POST['fname'];
            $lname=$_POST['lname'];
            $addr=$_POST['addr'];
            $userid=$this->session->userdata('userid');
            $username=$this->session->userdata('username');
            $payment_type=$_POST['payment_type'];
            $contact=$_POST['contact'];
            $receipt=$_POST['receipt'];
            
            $purchased_dt=$_POST['purchased_dt'];
            $branch=$_POST['branch'];
            
            $counter_val=$_POST['counter_val'];
            $this->load->helper('url');
            $this->load->model('return_management');
            $this->load->model('warehouse');
            $rid=$this->return_management->save_rma($fname,$lname,$payment_type,$addr,$contact,$receipt,$purchased_dt,$branch,$userid);
            
            $countfiles = count($_FILES['file']['name']);
   $target_dir = "uploads/rma";
 // Looping all files
 for($i=0;$i<$countfiles;$i++){
   $filename = $_FILES['file']['name'][$i];
   $target_file = $target_dir . basename($_FILES["file"]["name"][$i]);
   // Upload file
$x=0;
   while (file_exists('uploads/rma/'.basename($filename))) {
       $filename = substr($filename,0,-4)  . $x . substr($filename,strlen($filename)-4) ;
} 
   
   move_uploaded_file($_FILES['file']['tmp_name'][$i],'uploads/rma/'.$filename);
   if($filename!=0){
       $x=0;
            for($i=2;$i<=$counter_val+1;$i++){
                $x++;
    $this->return_management->save_attached($rid,$filename,'Requestor',$x);
            }
   }
 }
            
            $x=0;
            for($i=2;$i<=$counter_val+1;$i++){
                $x++;
            $item_name=$_POST['item_name'][$i] ;
            $serial_no=$_POST['serial_no'][$i];
            $problem=$_POST['problem'][$i];
            if($x !== 1){
            $this->return_management->save_rma_w_ir($fname,$lname,$payment_type,$addr,$contact,$receipt,$purchased_dt,$branch,$userid,$rid,$x);
            }
            $this->return_management->save_hist($rid,'Update','N/A',$userid,$username,'N/A','RMA Created',$x);
            $this->return_management->save_item($rid,$x,$item_name,$serial_no,$problem);
            
            
            }
            
   

            $data['view_rma']=$this->return_management->view_rma($rid,1);
            $data['view_rma_attach_r']=$this->return_management->view_rma_attach($rid,'Requestor',1);
            $data['view_rma_attach_a']=$this->return_management->view_rma_attach($rid,'Approver',1);
            $data['view_rma_item']=$this->return_management->view_rma_item($rid,1);
            $data['view_rma_hist']=$this->return_management->return_mgmt_hist($rid,1);
            $data['view_comments']=$this->return_management->view_comments($rid,1);
            $this->load->view('return_view',$data);           
            

            
            
 
            


            //


            
        }
        
        public function approved(){
            $role=$this->session->userdata('role');
    $username=$this->session->userdata('username');
    $fname=$this->session->userdata('fname');
    $userid=$this->session->userdata('userid');
    $data = array('role' => $role,
            'username' => $username,
            'fname' => $fname);
            $this->load->helper('url');
    $this->load->model('return_management');
    $view_request=$this->return_management->view_request('Created');
    foreach($view_request as $row){
        if(isset($_POST['chk_'.$row['rid']])){
            $this->return_management->approved($row['rid'],$userid,$username);

        }
    }
    


    $data['view_all_rma']=$this->return_management->view_all_rma();
     $this->load->view('return_mgmt',$data);
        }
	 public function approving(){
            $role=$this->session->userdata('role');
    $username=$this->session->userdata('username');
    $fname=$this->session->userdata('fname');
    $userid=$this->session->userdata('userid');
    $data = array('role' => $role,
            'username' => $username,
            'fname' => $fname);
            $this->load->helper('url');
$this->load->model('return_management');
            $this->load->model('warehouse');
            $this->return_management->approved($_GET['rid'],$userid,$username);

            $data['return_mgmt_hist']=$this->return_management->return_mgmt_hist($_GET['rid']);
            $data['view_rma']=$this->return_management->view_rma($_GET['rid']);
            $data['view_rma_attach']=$this->return_management->view_rma_attach($_GET['rid']);
            $data['view_rma_item']=$this->return_management->view_rma_item($_GET['rid']);
            $data['view_rma_hist']=$this->return_management->return_mgmt_hist($_GET['rid']);
            $data['view_comments']=$this->return_management->view_comments($_GET['rid']);
            $this->load->view('return_view',$data);
        
    }
 public function disapproving(){
            $role=$this->session->userdata('role');
    $username=$this->session->userdata('username');
    $fname=$this->session->userdata('fname');
    $userid=$this->session->userdata('userid');
    $data = array('role' => $role,
            'username' => $username,
            'fname' => $fname);
            $this->load->helper('url');
    $this->load->model('return_management');
            $this->load->model('warehouse');
            $this->return_management->disapproved($_GET['rid'],$userid,$username);


            $data['return_mgmt_hist']=$this->return_management->return_mgmt_hist($_GET['rid'],$_GET['seq']);
            $data['view_rma']=$this->return_management->view_rma($_GET['rid']);
            $data['view_rma_attach']=$this->return_management->view_rma_attach($_GET['rid'],$_GET['seq']);
            $data['view_rma_item']=$this->return_management->view_rma_item($_GET['rid'],$_GET['seq']);
            $data['view_rma_hist']=$this->return_management->return_mgmt_hist($_GET['rid'],$_GET['seq']);
            $data['view_comments']=$this->return_management->view_comments($_GET['rid'],$_GET['seq']);
            $this->load->view('return_view',$data);
        
    }
    public function update_status(){
        $role=$this->session->userdata('role');
    $username=$this->session->userdata('username');
    $fname=$this->session->userdata('fname');
    $userid=$this->session->userdata('userid');
            $data = array('role' => $role,
            'username' => $username,
            'fname' => $fname);
            
            $this->load->helper('url');
            $this->load->model('return_management');
            $this->load->model('warehouse');
            $status="";

            if($_POST['status']=="Reject" || $_POST['status']=="Rejected"){
                $status="Rejected";
            }elseif($_POST['status']=="Approve" || $_POST['status']=="Approved"){
                $status="Approved";
            }else{
                $status="Created";
            }
            $x=0;
            for($i=0;$i<=$_POST['view_rma_ct']-1;$i++){
            $x++;
            $action=$_POST['actions'][$i] ;
            $sku=$_POST['sku'][$i] ;
            $price=$_POST['price'][$i];
            $supplier=$_POST['supplier'][$i];
            $service_fee=$_POST['service_fee'][$i];
            $received_date=$_POST['received_date'][$i];
            $po_date=$_POST['po_date'][$i];
            $rr_date=$_POST['rr_date'][$i];
            $warranty_type=$_POST['warranty_type'][$i] ;
            $vendor_ini=$_POST['vendor_ini'][$i] ;
            $vendor=$_POST['vendor'][$i] ;
            $vendor_rma=$_POST['vendor_rma'][$i] ;
            $vendor_rmm=$_POST['vendor_rmm'][$i] ;
            $item_comm=$_POST['item_comm'][$i] ;
            
            $this->return_management->update_item($_POST['rid'],$_POST['seq'],$action,$sku,$price,$supplier,$service_fee,$received_date,$po_date,$rr_date,$warranty_type,$vendor_ini,$vendor,$vendor_rma,$vendor_rmm,$item_comm);
            }
            
            $watch=$_POST['watch'];
            $countfiles = count($_FILES['file']['name']);
   $target_dir = "uploads/rma";
 // Looping all files
 for($i=0;$i<$countfiles;$i++){
   $filename = $_FILES['file']['name'][$i];
   $target_file = $target_dir . basename($_FILES["file"]["name"][$i]);
   // Upload file
$x=0;
   while (file_exists('uploads/rma/'.basename($filename))) {
       $filename = substr($filename,0,-4)  . $x . substr($filename,strlen($filename)-4) ;
} 
   if($filename<>0){
   move_uploaded_file($_FILES['file']['tmp_name'][$i],'uploads/rma/'.$filename);
    $this->return_management->save_attached($_POST['rid'],$filename,'Approver');
    $watch = $watch . ",New uploaded file";
   }
 }
            
            $cur_status=$_POST['cur_status'];
            $data['view_all_rma']=$this->return_management->update_status($_POST['rid'],$status,$_POST['comments'],$userid,$username,$_POST['seq']);
            if($cur_status !== $status){ 
                $this->return_management->save_hist($_POST['rid'],$status,$_POST['comments'],$userid,$username,$cur_status,$status,$_POST['seq']);
            }else{
           
                
            if($watch=="" || $watch==null){
                    $watch = "";
                }else{
                    $watch = substr($watch, 1);
                    $watch = "RMA Updated (" . $watch . ")";
                    $this->return_management->save_hist($_POST['rid'],'Update','N/A',$userid,$username,$cur_status,$watch,$_POST['seq']);
                }
                
            }
            $data['view_rma']=$this->return_management->view_rma($_POST['rid'],$_POST['seq']);
            $data['view_rma_attach_a']=$this->return_management->view_rma_attach($_POST['rid'],'Approver',$_POST['seq']);
            $data['view_rma_attach_r']=$this->return_management->view_rma_attach($_POST['rid'],'Requestor',$_POST['seq']);
            $data['view_rma_item']=$this->return_management->view_rma_item($_POST['rid'],$_POST['seq']);
            $data['view_rma_hist']=$this->return_management->return_mgmt_hist($_POST['rid'],$_POST['seq']);
            $data['view_comments']=$this->return_management->view_comments($_POST['rid'],$_POST['seq']);
            $this->load->view('return_view',$data);
       
}    
public function view_stock_requested()
	{
    $this->load->model('warehouse');
    
    $data['ws_request']=$this->warehouse->ws_request($_GET['ms']);
    $data['ws_items']=$this->warehouse->ws_items($_GET['ms']);
     $this->load->view('material_view',$data);
        }
}
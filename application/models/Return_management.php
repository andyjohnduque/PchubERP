<?php

class Return_management extends CI_Model
  {
//load the constructor
 function __construct()
 {
      //inherit the parent constructor
      parent::__construct();
	  
	  
	  
 }
    function save_rma($fname,$lname,$payment_type,$addr,$contact,$receipt,$purchased_dt,$branch,$userid){
    	$sql="insert into return_mgmt (fname,lname,payment_type,address,contact,receipt,purchased_dt,branch,req_date,req_userid) values ('" . $fname . "','" . $lname . "','" . $payment_type . "','" . $addr . "','" . $contact . "','" . $receipt . "','" . $purchased_dt . "','" . $branch . "',curdate(),$userid);";
        $query = $this->db->query($sql);
        $iid=$this->db->insert_id(); 
        $rid_ct=strlen($iid);
        $x=6;
        $myzero="";
        while( $x >$rid_ct ){
            $myzero= $myzero . "0";
            $rid_ct++;
        }
        $rid="R" . substr(date('Y'),2) . $myzero . $iid;
        $sql="update return_mgmt set rid='R" . substr(date('Y'),2) . $myzero . $iid . "',seq=1 where ai=" . $iid . ";";
        $query = $this->db->query($sql);
	return $rid;
    }
    function save_rma_w_ir($fname,$lname,$payment_type,$addr,$contact,$receipt,$purchased_dt,$branch,$userid,$rid,$seq){
    	$sql="insert into return_mgmt (fname,lname,payment_type,address,contact,receipt,purchased_dt,branch,req_date,req_userid) values ('" . $fname . "','" . $lname . "','" . $payment_type . "','" . $addr . "','" . $contact . "','" . $receipt . "','" . $purchased_dt . "','" . $branch . "',curdate(),$userid);";
        $query = $this->db->query($sql);
        $iid=$this->db->insert_id();
        $sql="update return_mgmt set rid='" . $rid . "',seq=" . $seq . " where ai=" . $iid . ";";
        $query = $this->db->query($sql);
	//return $rid;
    }
     function save_attached($rid,$attachement,$role,$seq){
    	$sql="insert into return_mgmt_attach (rid,attachment,role,rno)values ('" . $rid . "','" . $attachement . "','" . $role . "'," . $seq . ")";
        $query = $this->db->query($sql);
     }
      function save_item($rid,$rno,$item_desc,$serial,$problem){
    	$sql="insert into return_mgmt_item (rid,rno,status,item_desc,serial,problem)values ('" . $rid . "'," . $rno . ",'Created','" . $item_desc . "','" . $serial . "','" . $problem . "')";
        $query = $this->db->query($sql);
     }
     function update_item($rid,$rno,$action,$sku,$price,$supplier,$service_fee,$received_date,$po_date,$rr_date,$warranty_type,$vendor_ini,$vendor,$vendor_rma,$vendor_rmm,$item_comm){
         if($action==null){
             $action="null";
         }else{
             $action= "'" . $action . "'";
         }
         if($sku==null){
             $sku="null";
         }else{
             $sku= "'" . $sku . "'";
         }
         if($price==null){
             $price="null";
         }else{
             $price= "" . $price . "";
         }
         if($supplier==null){
             $supplier="null";
         }else{
             $supplier= "'" . $supplier . "'";
         }
         if($service_fee==null){
             $service_fee="null";
         }else{
             $service_fee= "" . $service_fee . "";
         }
         if($received_date==null){
             $received_date="null";
         }else{
             $received_date= "'" . $received_date . "'";
         }
         if($po_date==null){
             $po_date="null";
         }else{
             $po_date= "'" . $po_date . "'";
         }
         if($rr_date==null){
             $rr_date="null";
         }else{
             $rr_date= "'" . $rr_date . "'";
         }
         if($warranty_type==null){
             $warranty_type="null";
         }else{
             $warranty_type= "'" . $warranty_type . "'";
         }
         if($vendor==null){
             $vendor="null";
         }else{
             $vendor= "'" . $vendor . "'";
         }
         if($vendor_ini==null){
             $vendor_ini="null";
         }else{
             $vendor_ini= "'" . $vendor_ini . "'";
         }
         if($vendor_rma==null){
             $vendor_rma="null";
         }else{
             $vendor_rma= "'" . $vendor_rma . "'";
         }
         if($vendor_rmm==null){
             $vendor_rmm="null";
         }else{
             $vendor_rmm= "'" . $vendor_rmm . "'";
         }
         if($item_comm==null){
             $item_comm="null";
         }else{
             $item_comm= "'" . $item_comm . "'";
         }
    	$sql="update return_mgmt_item set action=" . $action . ",sku=" . $sku . ",price=" . $price . ",supplier=" . $supplier . ",service_fee=" . $service_fee . ",received_date=" . $received_date . ",pull_out_date=" . $po_date . ",rr_date=" . $rr_date . ",warranty_type=" . $warranty_type . ",vendor_ini=" . $vendor_ini . ",vendor=" . $vendor . ",vendor_rma=" . $vendor_rma . ",vendor_rmm=" . $vendor_rmm . ",item_comm=" . $item_comm . " where rid='" .  $rid . "' and rno=" . $rno . ";" ;
    
        $query = $this->db->query($sql);
     }
    function view_rma($rid,$seq){
    	$sql="select * from return_mgmt where rid='" . $rid . "' and seq=" . $seq . ";";
        $query = $this->db->query($sql);
	return $query->result_array();
    }
   
    function view_rma_attach($rid,$role,$seq){
    	$sql="select * from return_mgmt_attach where rid='" . $rid . "' and role='" . $role . "' and rno=" . $seq . ";";
        $query = $this->db->query($sql);
	return $query->result_array();
    }
    function view_rma_item($rid,$seq){
    	$sql="select * from return_mgmt_item where rid='" . $rid . "' and rno=" . $seq . " ;";

        $query = $this->db->query($sql);
	return $query->result_array();
    }
     function view_rma_search($search){
         if($search=="" || $search==null){
             $sql="select distinct a.fname,a.lname,a.branch,a.seq,a.req_date,a.address,a.receipt,a.payment_type,a.purchased_dt,b.* from return_mgmt a,return_mgmt_item b where a.rid=b.rid and a.seq=b.rno order by a.rid desc;";
         }else{
             if(strpos($search, '/')>1){
                 $search=substr($search, 0,9);
             }
    	$sql="select distinct * from (select distinct a.fname,a.lname,a.branch,a.seq,a.req_date,a.address,a.receipt,a.payment_type,a.purchased_dt,b.* from return_mgmt a,return_mgmt_item b where a.rid=b.rid and a.seq=b.rno and a.rid='" . $search . "'"
                . " union all select distinct a.fname,a.lname,a.branch,a.seq,a.req_date,a.address,a.receipt,a.payment_type,a.purchased_dt,b.* from return_mgmt a,return_mgmt_item b where a.rid=b.rid and a.seq=b.rno and b.vendor_rma='" . $search . "'"
                . " union all select distinct a.fname,a.lname,a.branch,a.seq,a.req_date,a.address,a.receipt,a.payment_type,a.purchased_dt,b.* from return_mgmt a,return_mgmt_item b where a.rid=b.rid and a.seq=b.rno and b.vendor_rmm='" . $search . "'"
                . " union all select distinct a.fname,a.lname,a.branch,a.seq,a.req_date,a.address,a.receipt,a.payment_type,a.purchased_dt,b.* from return_mgmt a,return_mgmt_item b where a.rid=b.rid and a.seq=b.rno and a.branch='" . $search . "'"
                . " union all select distinct a.fname,a.lname,a.branch,a.seq,a.req_date,a.address,a.receipt,a.payment_type,a.purchased_dt,b.* from return_mgmt a,return_mgmt_item b where a.rid=b.rid and a.seq=b.rno and b.sku='" . $search . "'"
                . " ) as t order by rid";
         }
         $query = $this->db->query($sql);
	return $query->result_array();
    }
    function view_rma_cust($search){
         if($search=="" || $search==null){
             $sql="select select distinct a.fname,a.lname,a.branch,a.seq,a.req_date,a.address,a.receipt,a.payment_type,a.purchased_dt,b.* from return_mgmt a,return_mgmt_item b where a.rid=b.rid and a.seq=b.rno order by a.rid desc;";
         }else{
    	$sql="select distinct * from (select distinct a.fname,a.lname,a.branch,a.seq,a.req_date,a.address,a.receipt,a.payment_type,a.purchased_dt,b.* from return_mgmt a,return_mgmt_item b where a.rid=b.rid and a.seq=b.rno and a.fname like '%" . $search . "%'"
                . " union all select distinct a.fname,a.lname,a.branch,a.seq,a.req_date,a.address,a.receipt,a.payment_type,a.purchased_dt,b.* from return_mgmt a,return_mgmt_item b where a.rid=b.rid and a.seq=b.rno and a.lname like '%" . $search . "%'"
                . " union all select distinct a.fname,a.lname,a.branch,a.seq,a.req_date,a.address,a.receipt,a.payment_type,a.purchased_dt,b.* from return_mgmt a,return_mgmt_item b where a.rid=b.rid and a.seq=b.rno and a.address like '%" . $search . "%'"
                . " ) as t order by rid";
         }
        $query = $this->db->query($sql);
	return $query->result_array();
    }
    function view_rma_date($search){
         if($search=="" || $search==null){
             $sql="select distinct a.fname,a.lname,a.branch,a.seq,a.req_date,a.address,a.receipt,a.payment_type,a.purchased_dt,b.* from return_mgmt a,return_mgmt_item b where a.rid=b.rid and a.seq=b.rno order by a.rid desc;";
         }else{
    	$sql="select distinct * from (select distinct a.fname,a.lname,a.branch,a.seq,a.req_date,a.address,a.receipt,a.payment_type,a.purchased_dt,b.* from return_mgmt a,return_mgmt_item b where a.rid=b.rid and a.seq=b.rno and a.req_date >= '" . $search . "'"
                . " ) as t order by rid";
         }
        
        $query = $this->db->query($sql);
	return $query->result_array();
    }
    function view_all_rma(){
    	$sql="select distinct a.*,b.* from return_mgmt a,return_mgmt_item b where a.rid=b.rid and a.seq=b.rno and b.pickup_date is null order by a.rid desc;";
        $query = $this->db->query($sql);
	return $query->result_array();
    }
    function view_all_comp_rma(){
    	$sql="select distinct a.*,b.* from return_mgmt a,return_mgmt_item b where a.rid=b.rid and a.seq=b.rno and b.pickup_date is not null order by a.rid desc;";
        $query = $this->db->query($sql);
	return $query->result_array();
    }
    function view_rma_itm_details(){
    	$sql="select *,1 as 'ct' from return_mgmt_item where rid in (SELECT rid FROM return_mgmt_item GROUP by rid HAVING count(*)=1 ) union ALL select *,2 as 'ct' from return_mgmt_item where rid in (SELECT rid FROM return_mgmt_item GROUP by rid HAVING count(*)>1 );";
        $query = $this->db->query($sql);
	return $query->result_array();
    }
    function view_ct(){
            $sql="select count(*) as ct,rid from return_mgmt_item GROUP by rid;";
            $query = $this->db->query($sql);
	return $query->result_array();
    }
    function view_request($status){
        if ($status==""){
            $sql="select * from return_mgmt order by req_date desc;";
        }else{
    	$sql="select * from return_mgmt where status='" . $status . "' order by req_date desc;";
        }
        $query = $this->db->query($sql);
        return $query->result_array();
}
function approved($rid,$userid,$username){
    $sql="update return_mgmt set status='Approved' where rid='" . $rid . "';";
        $query = $this->db->query($sql);
    $sql="insert into return_mgmt_hist (rid,userid,username,new_status,comments,hist_date) values ('" . $rid . "','" . $userid . "','" . $username . "','Approved','Approved',curdate()) ;"; 
    $query = $this->db->query($sql);
}
function disapproved($rid,$userid,$username){
    $sql="update return_mgmt set status='Rejected' where rid='" . $rid . "';";
        $query = $this->db->query($sql);
        $sql="insert into return_mgmt_hist (rid,userid,username,new_status,comments,hist_date) values ('" . $rid . "','" . $userid . "','" . $username . "','Rejected','Rejected',curdate()) ;"; 
    $query = $this->db->query($sql);
}
function update_status($rid,$status,$comments,$userid,$username,$seq){
  
    $sql="update return_mgmt_item set status='" . $status . "' where rid='" . $rid . "' and rno=" . $seq . ";";
        $query = $this->db->query($sql);
    $sql="update return_mgmt_item set status='" . $status . "' where rid='" . $rid . "' and rno=" . $seq . ";";
        $query = $this->db->query($sql);
}
function save_hist($rid,$status,$comments,$userid,$username,$cur_status,$appr_comment,$seq){
  if($cur_status=='Created' && $status!='Update' ){
      if($status=="Approved"){
          $comments= $status;
      }
      $sql="insert into return_mgmt_hist (rid,userid,username,new_status,comments,hist_date,rno) values ('" . $rid . "','" . $userid . "','" . $username . "','" . $status . "','" . $comments . "',now()," . $seq . ") ;"; 
      $query = $this->db->query($sql);
  }else{
      if($appr_comment!=null){
      $sql="insert into return_mgmt_hist (rid,userid,username,new_status,comments,hist_date,rno) values ('" . $rid . "','" . $userid . "','" . $username . "','" . $status . "','" . $appr_comment . "',now()," . $seq . ") ;"; 
      $query = $this->db->query($sql);
      }
  }

}
function save_inst_hist($rid,$comments,$userid,$username){
     $sql="insert into return_mgmt_hist (rid,userid,username,comments,hist_date) values ('" . $rid . "','" . $userid . "','" . $username . "','" . $comments . "',curdate()) ;"; 
    $query = $this->db->query($sql);
}
function return_mgmt_hist($rid,$seq){
    $sql="select * from return_mgmt_hist  where rid='" . $rid . "' and rno=" . $seq . " order by hist_date desc;";
        $query = $this->db->query($sql);
        return $query->result_array();
}

function return_inst($rid,$rno){
    $sql="select a.fname,a.lname,a.payment_type,a.receipt,a.branch,a.purchased_dt,b.* from return_mgmt a,return_mgmt_item b  where b.rid=a.rid  and b.rid='" . $rid . "' and b.rno=" . $rno . " and a.seq=" . $rno . ";";
        $query = $this->db->query($sql);
        return $query->result_array();
}
function save_inst($rid,$rno,$supp_suggestion,$current_price,$cm_p){
    $sql="update return_mgmt_item set supp_suggestion='" . $supp_suggestion . "',current_price=" . $current_price . ",cm_price=" . $cm_p . ",inst_status='Created'  where rid='" . $rid . "' and rno=" . $rno . ";";
      
$query = $this->db->query($sql);
        //return $query->result_array();
}

function save_memo($rid,$rno,$supp_side,$cust_side){
    if($cust_side==null){
            $sql="update return_mgmt_item set supp_side='" . $supp_side . "'  where rid='" . $rid . "' and rno=" . $rno . ";";        
$query = $this->db->query($sql);
    }elseif($supp_side==null){
        $sql="update return_mgmt_item set cust_side='" . $cust_side . "'  where rid='" . $rid . "' and rno=" . $rno . ";";        
$query = $this->db->query($sql);
    }else{
        $sql="update return_mgmt_item set supp_side='" . $supp_side . "',cust_side='" . $cust_side . "'  where rid='" . $rid . "' and rno=" . $rno . ";";        
$query = $this->db->query($sql);
    }
}
function view_comments($rid,$seq){
    $sql="select * from return_comments  where rid='" . $rid . "' and rno=" . $seq . " order by comm_date desc;";
        $query = $this->db->query($sql);
        return $query->result_array();
}
function add_comment($rid,$comments,$userid,$username,$seq){
    $sql="insert into return_comments (rid,comments,userid,username,comm_date,rno) values ('" . $rid . "','" . $comments . "','" . $userid . "','" . $username . "',now()," . $seq . ");";
        $query = $this->db->query($sql);
}
function mass_update($rid,$seq,$col,$val){
    $sql="update return_mgmt_item set " . $col . "='" . $val . "'  where rid='" . $rid . "' and rno=" . $seq . ";";
      
$query = $this->db->query($sql);
        //return $query->result_array();
}

  }
  
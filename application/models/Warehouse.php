<?php

class Warehouse extends CI_Model
  {
//load the constructor
 function __construct()
 {
      //inherit the parent constructor
      parent::__construct();
	  
	  
	  
 }
 function view_am(){
    	$sql="select * from am;";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
 function view_warehouse($userid){
    	$sql="select a.* from warehouse a,am b where a.sku=b.sku and b.branch in (select branch_id from user_branch where userid=$userid );";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
 function so_warehouse(){
    	$sql="select a.*,b.*,c.* from so_material a,material_request b,warehouse c where a.material_slip=b.material_slip and b.sku=c.sku   and a.status='Approved' ;";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
 function ms_warehouse(){
    	$sql="select * from warehouse where qty>0 and status ='Forsale';";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    function warehouse_so($userid){
    	$sql="select c.* from users a, user_branch b, warehouse_so c   where a.userid=b.userid and a.userid=$userid and c.branch_id=b.branch_id ;";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
  function ms_warehouse_search($title){
    	$sql="select * from warehouse where description like '%$title%';";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
 function view_cred_limit($userid){
    	$sql="select * from users where userid=$userid;";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
  function view_inv($all){
        if($all=="N"){
            $sql="select * from warehouse where qty=0;";
        }else{
            $sql="select * from warehouse where qty>0;";
        }
    	
        $query = $this->db->query($sql);
        return $query->result_array();
    }
 function view_brand(){
    	$sql="select distinct brand from warehouse order by brand;";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
 function view_category(){
    	$sql="select distinct category from warehouse order by category;";
        $query = $this->db->query($sql);
        return $query->result_array();
    } 
  function view_branch(){
    	$sql="select distinct branch from user_branch order by branch;";
        $query = $this->db->query($sql);
        return $query->result_array();
    } 
function user_quotation($userid){
    	$sql="select * from purchasing where userid='" . $userid . "' and status in (null,'');";
        $query = $this->db->query($sql);
        return $query->result_array();
}
function so_quotation($userid){
    	$sql="select * from sales_order where userid='" . $userid . "' and status in (null,'');";
        $query = $this->db->query($sql);
        return $query->result_array();
}
function user_quotations($userid){
    	$sql="select * from purchasing where userid='" . $userid . "' ;";
        $query = $this->db->query($sql);
        return $query->result_array();
}
function user_quotation_request($userid,$ir){
    	$sql="select * from purchasing where userid=" . $userid . " and quotation_id='" . $ir . "';";
        $query = $this->db->query($sql);
        return $query->result_array();
}
function user_so_request($userid,$so){
    	$sql="select * from sales_order where userid=" . $userid . " and so_id='" . $so . "';";
        $query = $this->db->query($sql);
        return $query->result_array();
}
function so_request($so){
    	$sql="select * from sales_order where so_id='" . $so . "';";
        $query = $this->db->query($sql);
        return $query->result_array();
}
function user_sr_request($userid,$so){
    	$sql="select * from sr_material where userid=" . $userid . " and sr_id='" . $so . "';";
        echo $sql;
        $query = $this->db->query($sql);
        return $query->result_array();
}
function sr_request($so){
    	$sql="select * from sr_material where sr_id='" . $so . "';";
        $query = $this->db->query($sql);
        return $query->result_array();
}
function access_quotation_request($ir){
    	$sql="select * from purchasing where  quotation_id='" . $ir . "';";
        $query = $this->db->query($sql);
        return $query->result_array();
}
function quotation_request($status){
        if ($status==""){
            $sql="select * from purchasing;";
        }else{
    	$sql="select * from purchasing where queue='" . $status . "';";
        }
        $query = $this->db->query($sql);
        return $query->result_array();
}
function quotation_items(){
    	$sql="SELECT quotation_id,po,count(*) as ct FROM `purchasing_items` GROUP by quotation_id;";
        $query = $this->db->query($sql);
        return $query->result_array();
}

function approved($quotation_id,$userid,$username,$po){
    $sql="update purchasing set queue='Approved',po='$po',approved_by=" . $userid . ",appr_name='" . $username . "' where quotation_id='" . $quotation_id . "';";
        $query = $this->db->query($sql);
    $sql="insert into purchasing_hist (quotation_id,userid,username,new_status,comments,hist_date) values ('" . $quotation_id . "'," . $userid . ",'" . $username . "','Approved','Approved',curdate());";
        $query = $this->db->query($sql);
    //$sql="update purchasing_items set po='$po' where  quotation_id='" . $quotation_id . "';";
    //    $query = $this->db->query($sql);
}
function disapproved($quotation_id,$userid,$username,$comments){
    $sql="update purchasing set queue='Rejected',status='Closed',approved_by=" . $userid . ",appr_name='" . $username . "' where quotation_id='" . $quotation_id . "';";
        $query = $this->db->query($sql);
        $sql="insert into purchasing_hist (quotation_id,userid,username,new_status,comments,hist_date) values ('" . $quotation_id . "'," . $userid . ",'" . $username . "','Rejected','" . $comments . "',curdate());";
        $query = $this->db->query($sql);
}
function quotation_hist($ri){
    	$sql="select * from purchasing_hist where quotation_id='" . $ri . "' order by hist_date desc;";
        $query = $this->db->query($sql);
        return $query->result_array();
}
function so_hist($so){
    	$sql="select * from sales_order_hist where so_id='" . $so . "' order by hist_date desc;";
        $query = $this->db->query($sql);
        return $query->result_array();
}
function update_status($ri,$userid,$username,$status,$comments,$nfd){ 
    $a="";
    if($nfd=="Y"){
        $a=" ,queue='NFD' ";
    }
    
$sql="update purchasing set status='" . $status . "' " . $a . " where quotation_id='" . $ri . "';";
        $query = $this->db->query($sql);
$sql="insert into purchasing_hist (quotation_id,userid,username,new_status,comments,hist_date) values ('" . $ri . "'," . $userid . ",'" . $username . "','" . $status . "','" . $comments . "',curdate());";
        $query = $this->db->query($sql);
}
function user_quotation_items($userid,$ri){
    	$sql="select * from purchasing_items where userid='" . $userid . "' and quotation_id='" . $ri . "';";
        $query = $this->db->query($sql);
        return $query->result_array();
}
function user_so_items($userid,$so){
    	$sql="select * from sales_order_items where userid='" . $userid . "' and so_id='" . $so . "';";
        $query = $this->db->query($sql);
        return $query->result_array();
}
function so_items($so){
    	$sql="select * from sales_order_items where  so_id='" . $so . "';";
        $query = $this->db->query($sql);
        return $query->result_array();
}
function access_quotation_items($ri){
    	$sql="select * from purchasing_items where  quotation_id='" . $ri . "';";
        $query = $this->db->query($sql);
        return $query->result_array();
}
function del_user_itm($userid){
    $sql="delete from user_item where userid='" . $userid . "' and status in (null,'');";
        $query = $this->db->query($sql);
}

function submit_user_item($userid,$ri){
    $sql="update user_item set status='Pending' where userid=" . $userid . " and request_id='" . $ri . "'  ";
        $query = $this->db->query($sql);
}
function so_submit_user_item($userid,$ri){
    $sql="update user_item set status='Pending' where userid=" . $userid . " and request_id='" . $ri . "'  ";
        $query = $this->db->query($sql);
}
function save_user_item($userid,$ri){
    $sql="update user_item set status='Saved' where userid=" . $userid . " and request_id='" . $ri . "'  ";
        $query = $this->db->query($sql);
}

function save_quotaion($ri,$userid,$username,$delivery_date,$notes){
    $sql="select count(*) as ct from purchasing where userid='" . $userid . "' and quotation_id='" . $ri . "';";
        $query = $this->db->query($sql);
        foreach($query->result_array() as $row){
            $ct=$row['ct'];
        }
        if($ct == 0){
            $sql="insert into purchasing (quotation_id,userid,username,queue,status,payment_status,req_date,delivery_date,notes) values ('" . $ri . "','" . $userid . "','" . $username . "','Pending','Open','Open',now(),'" . $delivery_date . "','" . $notes . "')  ";
        }    
    $query = $this->db->query($sql);
   $sql="update purchasing set total_payable=(select sum(price * req_qty) from purchasing_items where quotation_id='" . $ri . "' ) where quotation_id='" . $ri . "';";
        $query = $this->db->query($sql);
}
function save_so($so,$userid,$username,$delivery_date,$notes,$reserve){
    $sql="select count(*) as ct from sales_order where userid='" . $userid . "' and so_id='" . $so . "';";
        $query = $this->db->query($sql);
        foreach($query->result_array() as $row){
            $ct=$row['ct'];
        }
        if($ct == 0){
            $sql="insert into sales_order (so_id,userid,username,queue,status,payment_status,req_date,delivery_date,notes,reservation) values ('" . $so . "','" . $userid . "','" . $username . "','Pending','Open','Open',now(),'" . $delivery_date . "','" . $notes . "','$reserve')  ";
        }    
    $query = $this->db->query($sql);
   $sql="update sales_order set total_payable=(select sum(price * req_qty) from sales_order_items where so_id='" . $so . "' ) where so_id='" . $so . "';";
        $query = $this->db->query($sql);
}
function add_remove_warehouse($sku,$qty,$userid,$ri){
    	//$sql="update  warehouse set qty=qty-" . $qty . " where sku='" . $sku . "';";
        //$query = $this->db->query($sql);
        $sql="select count(*) as ct from purchasing_items where userid='" . $userid . "' and sku='" . $sku . "' and quotation_id='" . $ri . "';";
        $query = $this->db->query($sql);
        foreach($query->result_array() as $row){
            $ct=$row['ct'];
        }
        if($ct == 0){
            if($qty==null || $qty==""){
                $qty=0;
            }
                $sql="insert into purchasing_items (quotation_id,sku,brand,description,req_qty,price,userid) select '" . $ri . "',sku,brand,description," . $qty . ",selling_price," . $userid . " from warehouse where sku='" . $sku . "';";
                
                $query = $this->db->query($sql);
            
            
        } else{
            $sql="update purchasing_items set req_qty=" . $qty . " where sku='" . $sku . "' and userid=" . $userid . " and quotation_id='" . $ri . "';";
            $query = $this->db->query($sql);
        }

}
function so_add_remove_warehouse($sku,$qty,$userid,$so){
    	//$sql="update  warehouse set qty=qty-" . $qty . " where sku='" . $sku . "';";
        //$query = $this->db->query($sql);
        $sql="select count(*) as ct from sales_order_items where userid='" . $userid . "' and sku='" . $sku . "' and so_id='" . $so . "';";
        $query = $this->db->query($sql);
        foreach($query->result_array() as $row){
            $ct=$row['ct'];
        }
        if($ct == 0){
            if($qty==null || $qty==""){
                $qty=0;
            }
                $sql="insert into sales_order_items (so_id,sku,brand,description,req_qty,price,userid) select '" . $so . "',sku,brand,description," . $qty . ",selling_price," . $userid . " from warehouse where sku='" . $sku . "';";
                
                $query = $this->db->query($sql);
            
            
        } else{
            $sql="update sales_order_items set req_qty=" . $qty . " where sku='" . $sku . "' and userid=" . $userid . " and so_id='" . $so . "';";
            $query = $this->db->query($sql);
        }

} 
function sr_add_remove_warehouse($sku,$qty,$userid,$so){
    	//$sql="update  warehouse set qty=qty-" . $qty . " where sku='" . $sku . "';";
        //$query = $this->db->query($sql);
        $sql="select count(*) as ct from sr_items where userid='" . $userid . "' and sku='" . $sku . "' and sr_id='" . $so . "';";
        $query = $this->db->query($sql);
        foreach($query->result_array() as $row){
            $ct=$row['ct'];
        }
        if($ct == 0){
            if($qty==null || $qty==""){
                $qty=0;
            }
                $sql="insert into sr_items (sr_id,sku,brand,description,req_qty,price,userid) select '" . $so . "',sku,brand,description," . $qty . ",selling_price," . $userid . " from warehouse where sku='" . $sku . "';";
                
                $query = $this->db->query($sql);
            
            
        } else{
            $sql="update sr_items set req_qty=" . $qty . " where sku='" . $sku . "' and userid=" . $userid . " and sr_id='" . $so . "';";
            $query = $this->db->query($sql);
        }

} 
 function branch_view(){
        $sql="select * from branch";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
 function save_builds($username,$role,$prod,$title,$cores,$cpu_coolers,$motherboards,$memory,$storage,$videocard,$casing,$powersupply,$opticaldrive,$os,$software,$monitor,$external){ 
     $sql="insert into builds (cpu,cpu_cooler,motherboard,memory,storage,video_card,casing,power_supply,opticaldrive,os,software,monitor,external_storage,others,user,role,title,description,crt_date) values ('" . $cores . "','" . $cpu_coolers ."','" . $motherboards ."','" . $memory ."','" . $storage ."','" . $videocard ."','" . $casing ."','" . $powersupply . "','" . $opticaldrive . "','". $os . "','" . $software . "','" . $monitor . "','" . $external . "','','" . $username . "','" . $role . "','" . $title . "','',curdate())";
//echo $sql;     
    $query = $this->db->query($sql);
	//return $query->result_array();
}
    function save_core($name,$c_count,$c_clock,$b_clock,$tdp,$igraphics,$smt,$rating,$price,$filename){
    	$sql="insert into cores (name,core_count,core_clock,boost_clock,tdp,integ_graphics,smt,ratings,price,core_date,img) values ('" . $name . "'," . $c_count .",'" . $c_clock ."','" . $b_clock ."','" . $tdp ."','" . $igraphics ."','" . $smt ."'," . $rating ."," . $price .",curdate(),'" . $filename . "')";
        $query = $this->db->query($sql);
	//return $query->result_array();
    }
    function save_casing($name,$c_count,$c_clock,$b_clock,$tdp,$igraphics,$smt,$rating,$price){
    	$sql="insert into cores (name,core_count,core_clock,boost_clock,tdp,integ_graphics,smt,ratings,price,core_date) values ('" . $name . "'," . $c_count .",'" . $c_clock ."','" . $b_clock ."','" . $tdp ."','" . $igraphics ."','" . $smt ."'," . $rating ."," . $price .",curdate())";
        echo $sql;
        $query = $this->db->query($sql);
	//return $query->result_array();
    }
    function view_products($prod){
        if($prod == "All"){
            $sql="select name,ratings,price,img from cores union all " .
                 "select name,ratings,price,img from casing union all " .
                 "select name,ratings,price,img from cpu_coolers union all " .
                 "select name,ratings,price,img from external union all " . 
                 "select name,ratings,price,img from memory union all " .
                 "select name,ratings,price,img from monitor union all " .
                 "select name,ratings,price,img from motherboards union all " .
                 "select name,ratings,price,img from opticaldrive union all " .
                 "select name,ratings,price,img from os union all " . 
                 "select name,ratings,price,img from powersupply union all " .
                 "select name,ratings,price,img from software union all " . 
                 "select name,ratings,price,img from storage union all " .
                 "select name,ratings,price,img from videocard order by name,price ";
        } else {
            $sql="select * from " . $prod .";";
        }
        $query = $this->db->query($sql);
        return $query->result_array();
        
    }
       function view_builds($prod){
    	$sql="select * from " . $prod .";";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    function my_builds($user){
    	$sql="select * from builds where user='" . $user . "';";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    function update_products($id,$name,$c_count,$c_clock,$b_clock,$price){
    	$sql="update cores set name='" . $name . "',core_count=" . $c_count . ",core_clock='" .$c_clock. "',boost_clock='" . $b_clock . "',price=" . $price . ",core_date=curdate() where item_no=" . $id . ";";
        echo $sql;
        $query = $this->db->query($sql);
			//return $query->result_array();
    }
    function save_material($materialslip,$code,$brand,$description,$sprice,$maprice,$branch,$group,$verman,$serial,$status,$userid){
    	$sql="insert into so_material (material_slip,sku,brand,description,stock_price,branch,itm_group,version,serialized,status,owner,userid,crt_date) values ('$materialslip','$code','$brand','$description',$sprice,'$branch','$group','$verman','$serial','Pending','Front Line','$userid',now())";
        $query = $this->db->query($sql);
        $am_no=$this->db->insert_id();
        return $am_no;
    }
     function view_all_material(){
    	$sql="select a.*,b.qty from so_material a,warehouse b where a.sku=b.sku order by a.am_no desc";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    function so_view_all_material(){
    	$sql="select a.*,b.*,c.* from so_material a,material_request b,warehouse c where a.material_slip=b.material_slip and b.sku=c.sku   and a.status='Approved' ";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    function search_material($title){
         $this->db->like('description', $title , 'both');
        $this->db->order_by('description', 'ASC');
        $this->db->limit(20);
        return $this->db->get('warehouse')->result();
    }
    function ws_add_remove_warehouse($sku,$qty,$userid,$ms){
    	//$sql="update  warehouse set qty=qty-" . $qty . " where sku='" . $sku . "';";
        //$query = $this->db->query($sql);
        $sql="select count(*) as ct from material_request where userid='" . $userid . "' and sku='" . $sku . "' and material_slip='" . $ms . "';";
        $query = $this->db->query($sql);
        foreach($query->result_array() as $row){
            $ct=$row['ct'];
        }
        if($ct == 0){
            if($qty==null || $qty==""){
                $qty=0;
            }
                $sql="insert into material_request (material_slip,sku,brand,description,req_qty,price,userid) select '" . $ms . "',sku,brand,description," . $qty . ",selling_price," . $userid . " from warehouse where sku='" . $sku . "';";
                
                $query = $this->db->query($sql);
            
            
        } else{
            $sql="update material_request set req_qty=" . $qty . " where sku='" . $sku . "' and userid=" . $userid . " and material_slip='" . $ms . "';";
            $query = $this->db->query($sql);
        }

}
function ms_quotation($userid){
    	$sql="select * from so_material where userid='" . $userid . "' and status in (null,'');";
        $query = $this->db->query($sql);
        return $query->result_array();
}
function sr_material($userid){
    	$sql="select * from sr_material where userid='" . $userid . "' and status in (null,'');";
        $query = $this->db->query($sql);
        return $query->result_array();
}
function user_sr_items($userid,$ms){
    	$sql="select * from sr_items where userid='" . $userid . "' and sr_id='" . $ms . "';";
        $query = $this->db->query($sql);
        return $query->result_array();
}
function sr_items($ms){
    	$sql="select * from sr_items where  sr_id='" . $ms . "';";
        $query = $this->db->query($sql);
        return $query->result_array();
}
function user_ms_items($userid,$ms){
    	$sql="select * from material_request where userid='" . $userid . "' and material_slip='" . $ms . "';";
        $query = $this->db->query($sql);
        return $query->result_array();
}
function save_ms($ms,$userid,$username,$assembly){
    $sql="select count(*) as ct from so_material where userid='" . $userid . "' and material_slip='" . $ms . "';";
        $query = $this->db->query($sql);
        foreach($query->result_array() as $row){
            $ct=$row['ct'];
        }
        if($ct == 0){
            $sql="insert into so_material (material_slip,userid,username,status,crt_date,assembly) values ('" . $ms . "','" . $userid . "','" . $username . "','Pending',now(),'" . $assembly . "')  ";
        }    
    $query = $this->db->query($sql);
   $sql="update so_material set total_payable=(select sum(price * req_qty) from material_request where material_slip='" . $ms . "' ) where material_slip='" . $ms . "';";
        $query = $this->db->query($sql);
}
function user_ws_request($userid,$ws){
    	$sql="select * from so_material where userid=" . $userid . " and material_slip='" . $ws . "';";
        $query = $this->db->query($sql);
        return $query->result_array();
}
function user_ws_items($userid,$ws){
    	$sql="select * from material_request where userid='" . $userid . "' and material_slip='" . $ws . "';";
        $query = $this->db->query($sql);
        return $query->result_array();
}
 function ws_pending(){
    	$sql="select a.*,b.role from so_material a,users b where a.status='Pending' and a.username=b.username";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
 function ws_request($ws){
    	$sql="select * from so_material where material_slip='" . $ws . "';";
        echo $sql;
        $query = $this->db->query($sql);
        return $query->result_array();
}
function ws_items($ws){
    	$sql="select * from material_request where material_slip='" . $ws . "';";
        $query = $this->db->query($sql);
        return $query->result_array();
}
function ms_approved($ms){
    	$sql="update so_material set status='Approved' where material_slip='" . $ms . "';";
        $query = $this->db->query($sql);
        
}
function check_stock_count($ms,$sku){
    	$sql="select count(*) as ct from warehouse a,material_request b where a.sku=b.sku and a.sku='$sku' and a.qty>=b.req_qty and b.material_slip='$ms';";
        $query = $this->db->query($sql);
        return $query->result_array();
}
function check_sr_stock_count($ms,$sku){
    	$sql="select count(*) as ct from warehouse_so a,sr_material b where a.sku=b.sku and a.sku='$sku' and a.qty>=b.req_qty and b.sr_id='$ms';";
        $query = $this->db->query($sql);
        return $query->result_array();
}
function check_sku_exists($sku){
    	$sql="select count(*) as ct from warehouse_so where sku='$sku';";
        $query = $this->db->query($sql);
        return $query->result_array();
}
function check_sr_sku_exists($sku){
    	$sql="select count(*) as ct from warehouse where sku='$sku';";
        $query = $this->db->query($sql);
        return $query->result_array();
}
function add_item_to_warehouse_so($ms,$sku){
        //process of moving warehouse warehouse_so , check qty count and sku and item counts 
    	$sql="insert into warehouse_so select a.*,d.branch_id from warehouse a,so_material b,material_request c,user_branch d where b.material_slip='$ms' and b.material_slip=c.material_slip and a.sku=c.sku and a.sku='$sku' and b.userid=d.userid;";
        $query = $this->db->query($sql);
        $sql="update warehouse_so set qty=(select a.req_qty from material_request a,so_material b where a.material_slip = b.material_slip and a.sku='$sku' and b.material_slip='$ms' and b.status='Pending') where sku='$sku';";
        $query = $this->db->query($sql);
        $sql="update warehouse set qty=qty - (select a.req_qty from material_request a,so_material b where a.material_slip = b.material_slip and a.sku='$sku' and b.material_slip='$ms' and b.status='Pending') where sku='$sku';";
        $query = $this->db->query($sql);
}
function update_item_to_warehouse_so($ms,$sku){
        $sql="update warehouse_so set qty= qty + (select a.req_qty from material_request a,so_material b where a.material_slip = b.material_slip and a.sku='$sku' and b.material_slip='$ms'  and b.status='Pending'),branch_id=(select distinct a.branch_id from user_branch a,so_material b,so_material c where a.userid=b.userid and c.userid=a.userid and c.material_slip='$ms') where sku='$sku';";
        $query = $this->db->query($sql);
        $sql="update warehouse set qty=qty - (select a.req_qty from material_request a,so_material b where a.material_slip = b.material_slip and a.sku='$sku' and b.material_slip='$ms' and b.status='Pending') where sku='$sku';";
        $query = $this->db->query($sql);
}
function update_item_to_warehouse($ms,$sku){
        $sql="update warehouse set qty= qty + (select a.req_qty from material_request a,so_material b where a.material_slip = b.material_slip and a.sku='$sku' and b.material_slip='$ms'  and b.status='Pending'),branch_id=(select distinct a.branch_id from user_branch a,so_material b,so_material c where a.userid=b.userid and c.userid=a.userid and c.material_slip='$ms') where sku='$sku';";
        $query = $this->db->query($sql);
        $sql="update warehouse set qty=qty - (select a.req_qty from material_request a,so_material b where a.material_slip = b.material_slip and a.sku='$sku' and b.material_slip='$ms' and b.status='Pending') where sku='$sku';";
        $query = $this->db->query($sql);
}
 function stock_requested(){
    	$sql="select * from so_material  order by crt_date desc";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
 function stock_returned(){
    	$sql="select * from sr_material  order by crt_date desc";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    function stock_returned_pending(){
    	$sql="select * from sr_material  where status='Pending' order by crt_date desc";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
 function so_view_all(){
    	$sql="select * from sales_order  ";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
function save_sr($sr,$userid,$username,$delivery_date,$notes){
    $sql="select count(*) as ct from sr_material where userid='" . $userid . "' and sr_id='" . $sr . "';";
        $query = $this->db->query($sql);
        foreach($query->result_array() as $row){
            $ct=$row['ct'];
        }
        if($ct == 0){
            $sql="insert into sr_material (sr_id,userid,username,status,crt_date,notes) values ('" . $sr . "','" . $userid . "','" . $username . "','Pending',now(),'" . $notes . "')  ";
        }    
    $query = $this->db->query($sql);
   $sql="update sr_material set total_payable=(select sum(price * req_qty) from sales_order_items where sr_id='" . $sr . "' ) where sr_id='" . $sr . "';";
        $query = $this->db->query($sql);
}
  function view_stocks($userid){

            $sql="select a.* from warehouse_so a,user_branch b where b.userid=$userid and b.branch_id=a.branch_id;";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
  }
  
<?php

class Am_db extends CI_Model
  {
//load the constructor
 function __construct()
 {
      //inherit the parent constructor
      parent::__construct();
	  
	  
	  
 }
    function save_am($code,$brand,$description,$sprice,$maprice,$branch,$group,$verman,$serial,$status,$userid){
    	$sql="insert into am (sku,brand,description,stock_price,am_price,branch,itm_group,version,serialized,status,userid,crt_date) values ('$code','$brand','$description',$sprice,$maprice,'$branch','$group','$verman','$serial','$status','$userid',now())";
        $query = $this->db->query($sql);
        $am_no=$this->db->insert_id();
        return $am_no;
    }
    function view_am($am_no){
    	$sql="select a.*,a.status as stat,b.*,c.* from am a,serial b,status c where a.am_no=$am_no and a.serialized=b.serial_id and a.status=c.status_id";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    function view_all_am(){
    	$sql="select a.*,b.qty from am a,warehouse b where a.sku=b.sku order by a.am_no desc";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    function check_sku($sku){
        $sql="select * from warehouse where sku='$sku'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    function del($amno){
        $sql="delete  from am where am_no='$amno'";
        $query = $this->db->query($sql);
    }
  }
  
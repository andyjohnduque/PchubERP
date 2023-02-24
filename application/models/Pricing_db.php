<?php

class Pricing_db extends CI_Model
  {
//load the constructor
 function __construct()
 {
      //inherit the parent constructor
      parent::__construct();
	  
	  
	  
 }
    function vendor_discount(){
    	$sql="select a.*,b.* from pricing a,users b where a.vendor=b.userid";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    function save_disc($vendor,$brand,$disc){
        $sql="insert into pricing (vendor,brand,discount) values ('$vendor','$brand',$disc) ";
        $query = $this->db->query($sql);
    }
    function del_disc($rid){
        $sql="delete from pricing where pricing_id= $rid";
        $query = $this->db->query($sql);
    }
  }
  
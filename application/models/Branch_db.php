<?php

class Branch_db extends CI_Model
  {
//load the constructor
 function __construct()
 {
      //inherit the parent constructor
      parent::__construct();
	  
	  
	  
 }
    function view_all_branch(){
    	$sql="select * from branch order by branch_id,branch";
        $query = $this->db->query($sql);
	return $query->result_array();
    }
    function view_all_brand(){
    	$sql="select distinct brand from warehouse order by brand";
        $query = $this->db->query($sql);
	return $query->result_array();
    }
    function view_all_cat(){
    	$sql="select distinct category from warehouse order by category";
        $query = $this->db->query($sql);
	return $query->result_array();
    }
    function view_all_status(){
    	$sql="select *  from status order by status";
        $query = $this->db->query($sql);
	return $query->result_array();
    }
    function view_all_ser(){
    	$sql="select *  from serial order by serial";
        $query = $this->db->query($sql);
	return $query->result_array();
    }
    function view_branch($branch_id){
    	$sql="select * from branch where branch_id='$branch_id'";
        $query = $this->db->query($sql);
	return $query->result_array();
    }
    function storage_codes(){
    	$sql="select * from storage_codes order by storage_code";
        $query = $this->db->query($sql);
	return $query->result_array();
    }
    function storage_code($branch_id){
    	$sql="select * from storage_codes where branch_id='$branch_id' order by storage_code";
        $query = $this->db->query($sql);
	return $query->result_array();
    }
    function save_storage($branch_id,$storage_code,$description){
    	$sql="insert into storage_codes  (branch_id,storage_code,description) values ('$branch_id','$storage_code','$description') ";
        $query = $this->db->query($sql);

    }
    function save_branch($branch_code,$address,$branch_desc,$contact){
    	$sql="insert into branch  (branch_id,branch,address,contact_no) values ('$branch_code','$branch_desc','$address','$contact') ";
        $query = $this->db->query($sql);
        
    }
    function  check_branch_code($branch_code){
        $sql="select * from branch where branch_id='$branch_code' ";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
            
    function delete_storage($branch_id,$strg_cd){
    	$sql="delete from storage_codes  where branch_id='$branch_id' and storage_code='$strg_cd'; ";
        $query = $this->db->query($sql);

    }
    function delete_branch($branch_id){
        $sql="delete from storage_codes  where branch_id='$branch_id'";
        $query = $this->db->query($sql);
        $sql="delete from branch  where branch_id='$branch_id'";
        $query = $this->db->query($sql);
    }
   

  }
  
<?php

class Users extends CI_Model
  {
//load the constructor
 function __construct()
 {
      //inherit the parent constructor
      parent::__construct();
 }
    function login($uname,$pass){
        $sql="select * from users where username='$uname' and pass='$pass' and (status ='Active' or status is null)";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    function profile($userid){
        $sql="select * from users where userid='" . $userid ."'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    function user_branch($userid){
        $sql="select * from user_branch where userid='" . $userid ."'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    function branch(){
        $sql="select * from branch";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    
    function roles($userid){
        $sql="select * from roles";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    function view_users(){
        $sql="select * from users order by userid desc";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    function vendor(){
        $sql="select * from users where role<>'Admin' order by fname";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    
    function save_user($fname,$lname,$uname,$contact,$pass,$vdate,$role,$po,$gr,$mm,$vm,$rm,$fl,$so,$eadd){
        $sql="insert into users (fname,lname,username,contact,pass,valid_until,role,purchase_order,good_receipt,material_master,vendor_management,return_mgmt,front_line,sales,eadd) values ('" . $fname . "','" . $lname ."','" . $uname ."','" . $contact ."','" . $pass ."','" . $vdate ."','" . $role ."','" . $po ."','" . $gr ."','" . $mm ."','" . $vm ."','" . $rm ."','" . $fl . "','" . $so . "','" . $eadd ."')";
        $query = $this->db->query($sql);
        return $this->db->insert_id();
    }
    function save_user2($fname,$lname,$uname,$pass,$eadd){
        $sql="insert into users (fname,lname,username,pass,eadd,role) values ('" . $fname . "','" . $lname ."','" . $uname ."','" . $pass ."','" . $eadd ."','User')";
        $query = $this->db->query($sql);
        return $this->db->insert_id();
    }
    function save_branch($userid,$branch_id,$branch){
        $sql="insert into user_branch (userid,branch_id,branch) values (" . $userid . ",'" . $branch_id ."','" . $branch ."')";
        $query = $this->db->query($sql);
    }
     
	function check_user($uname){
		$sql="select count(*) as ct from users where lcase(username) like '%" . strtolower($uname) ."%' ";
            $query = $this->db->query($sql);
            return $query->result_array();
            
	}
function check_eadd($eadd){
		$sql="select count(*) as ct from users where lcase(eadd) like '%" . strtolower($eadd) ."%' ";
            $query = $this->db->query($sql);
            return $query->result_array();
            
	}
    function delete_user($userid){
        $sql="delete from users where userid=" . $userid . ";";
        $query = $this->db->query($sql);
 
    }
    function check_user_status($userid){
        $sql="select * from users where userid=$userid;";
            $query = $this->db->query($sql);
            return $query->result_array();
    }
    function disable($userid){
        $sql="update users set status='Disabled' where userid=$userid;";
        $query = $this->db->query($sql);
    }
    function activate($userid){
        $sql="update users set status='Active' where userid=$userid;";
        $query = $this->db->query($sql);
    }
    
  }
  
  
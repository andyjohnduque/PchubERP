<?php

class Bulletin_db extends CI_Model
  {
//load the constructor
 function __construct()
 {
      //inherit the parent constructor
      parent::__construct();
	  
	  
	  
 }
 function view_bulletin(){
    	$sql="select * from bulletin order by crt_date desc;";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    function view_latest_msg(){
    	$sql="select * from bulletin order by crt_date desc limit 3;";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    function save_msg($title,$msg,$userid){
        $sql="insert into bulletin (title,msg,userid,crt_date) value ('$title','$msg',$userid,now())";
        $query = $this->db->query($sql);
    }
  
  }
  
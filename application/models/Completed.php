<?php

class Completed extends CI_Model
  {
//load the constructor
 function __construct()
 {
      //inherit the parent constructor
      parent::__construct();	  
 }
 function view_builds($prod){
    $sql="select * from " . $prod .";";
    $query = $this->db->query($sql);
    return $query->result_array();
}
    
  }
  
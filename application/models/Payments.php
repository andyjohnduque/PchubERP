<?php

class Payments extends CI_Model
  {
//load the constructor
 function __construct()
 {
      //inherit the parent constructor
      parent::__construct();
	  
	  
	  
 }
 function update_payments($ri,$rno,$grid,$userid,$username,$pay_amt){
     $sql="update purchasing set payment_status='Partial' where quotation_id='$ri';" ;
        $query = $this->db->query($sql);
    	$sql="insert into purchasing_pay_hist (quotation_id,grid,userid,username,receipt,pay_amt,pay_date) values ('$ri','$grid',$userid,'$username','$rno',$pay_amt,now()) ";
        $query = $this->db->query($sql);
        $sql="update purchasing set payment_amt=payment_amt + $pay_amt  where quotation_id='$ri';" ;
        $query = $this->db->query($sql);
        
        $sql="update purchasing set payment_status='Paid' where quotation_id='$ri' and payment_amt>=total_payable;" ;
        $query = $this->db->query($sql);
        //return $query->result_array();
    }
   function view_payments($ri){
    	$sql="select * from purchasing_pay_hist where quotation_id='$ri' order by pay_date desc; ";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    function invoice(){
    	$sql="select a.*,c.grid,c.pay_amt,c.receipt,c.pay_date,b.* from purchasing as a join user_branch as b on a.userid = b.userid left join purchasing_pay_hist as c on a.quotation_id = c.quotation_id where a.status <>'Closed' and a.queue<>'NFD' and a.po is not null order by a.po;";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
 }
  
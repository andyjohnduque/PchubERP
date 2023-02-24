<?php

class Products extends CI_Model
  {
//load the constructor
 function __construct()
 {
      //inherit the parent constructor
      parent::__construct();
	  
	  
	  
 }
 function save_builds($username,$userid,$role,$prod,$title,$cores,$core_price,$core_img,$motherboards,$motherboards_price,$motherboards_img,$memory,$memory_price,$memory_img,$storage,$storage_price,$storage_img,$videocard,$videocard_price,$videocard_img,$monitor,$monitor_price,$monitor_img){ 
            if($core_price=="" || $core_price ==null){
                $core_price=0;
            }
            if($motherboards_price=="" || $motherboards_price ==null){
                $motherboards_price=0;
            }
            if($memory_price=="" || $memory_price ==null){
                $memory_price=0;
            }
            if($storage_price=="" || $storage_price ==null){
                $storage_price=0;
            }
            if($videocard_price=="" || $videocard_price ==null){
                $videocard_price=0;
            }
            if($monitor_price=="" || $monitor_price ==null){
                $monitor_price=0;
            }
     $price = $core_price+ $motherboards_price+ $memory_price+$storage_price+$videocard_price+$monitor_price;
     $sql="insert into builds (cpu,cpu_img,motherboard,motherboard_img,memory,ram_img,storage,hdd_img,video_card,gpu_img,monitor,monitor_img,user,userid,role,title,crt_date,price) values ('" . $cores . "','" . $core_img . "','" . $motherboards ."','" . $motherboards_img . "','" . $memory ."','" . $memory_img . "','" . $storage ."','" . $storage_img . "','" . $videocard ."','" . $videocard_img ."','" . $monitor . "','" . $monitor_img . "','" . $username . "'," . $userid . ",'" . $role . "','" . $title . "',now()," . $price . ")";
//echo $sql;     
    $query = $this->db->query($sql);
	//return $query->result_array();
}
    function save_core($name,$c_count,$c_clock,$b_clock,$tdp,$igraphics,$smt,$rating,$price,$filename){
    	$sql="insert into cores (name,core_count,core_clock,boost_clock,tdp,integ_graphics,smt,ratings,price,core_date,img) values ('" . $name . "'," . $c_count .",'" . $c_clock ."','" . $b_clock ."','" . $tdp ."','" . $igraphics ."','" . $smt ."'," . $rating ."," . $price .",now(),'" . $filename . "')";
        $query = $this->db->query($sql);
	//return $query->result_array();
    }
    function save_casing($name,$c_count,$c_clock,$b_clock,$tdp,$igraphics,$smt,$rating,$price){
    	$sql="insert into cores (name,core_count,core_clock,boost_clock,tdp,integ_graphics,smt,ratings,price,core_date) values ('" . $name . "'," . $c_count .",'" . $c_clock ."','" . $b_clock ."','" . $tdp ."','" . $igraphics ."','" . $smt ."'," . $rating ."," . $price .",now())";
        $query = $this->db->query($sql);
	//return $query->result_array();
    }
    function view_products($prod){
        if($prod == "All"){
            $sql="select * from opl order by category";
        } else {
            $sql="select * from opl where category='" . $prod ."';";
        }
        $query = $this->db->query($sql);
        return $query->result_array();
        
    }
       function view_builds($prod){
    	$sql="select * from " . $prod ." where user='Admin' order by crt_date desc;";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    function my_builds($userid){
    	$sql="select * from builds where userid='" . $userid . "' order by crt_date desc;";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    function my_builds_view($build_no){
    	$sql="select * from builds  where build_no=" . $build_no . " order by crt_date desc;";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    function my_builds_liked($build_no){
    	$sql="select a as build_no,sum(a) as liked,sum(b) as disliked,sum(c) as comments from 
(select build_no,sum(likes) as a,sum(dislikes) as b,0 as c from comments  where build_no=" . $build_no . " and comments in ('like','dislike') union all select build_no,0 as a,0 as b,count(*) as c from comments  where build_no=" . $build_no . " and comments not in ('like','dislike') )  Derived GROUP BY build_no;";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    function delete_builds($build_no,$userid){
    	$sql="delete from builds where build_no=" . $build_no . " and userid=" . $userid . ";";
        $query = $this->db->query($sql);
        //return $query->result_array();
    }
    function update_products($id,$name,$c_count,$c_clock,$b_clock,$price){
    	$sql="update cores set name='" . $name . "',core_count=" . $c_count . ",core_clock='" .$c_clock. "',boost_clock='" . $b_clock . "',price=" . $price . ",core_date=now() where item_no=" . $id . ";";

        $query = $this->db->query($sql);
			//return $query->result_array();
    }
    function check_user_data($userid,$build_no){
        $sql="select count(*) as ct from builds where userid=" . $userid ." and build_no=" . $build_no . ";";
        $query = $this->db->query($sql);
        return $query->result_array();
        
    }
    function share_data_completed($build_no){
        $sql="update builds set shared_as_completed='Y' where build_no=" . $build_no . ";";
        $query = $this->db->query($sql);
        //return $query->result_array();
        
    }
    function view_completed(){
    	$sql="select * from builds where shared_as_completed='Y' order by crt_date desc;";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    function view_solo($build_no){
    	$sql="select * from builds where build_no=" . $build_no . " order by crt_date desc;";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    function view_completed_com_solo($build_no){
    	$sql="select aa as build_no,sum(a) as ct,sum(b) as likes,sum(c) as dislikes from (SELECT build_no as aa,0 as a,sum(likes) as b,sum(dislikes) as c FROM comments where build_no=" . $build_no . " and comments  in ('like','dislike') GROUP by build_no union all SELECT build_no as aa,count(*) as a,0 as b,0 as c FROM  comments where build_no=" . $build_no . " and comments not in ('like','dislike') GROUP by build_no)  Derived GROUP BY build_no;";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    function view_completed_comments(){
    	$sql="select aa as build_no,sum(a) as ct,sum(b) as likes,sum(c) as dislikes from (SELECT build_no as aa,0 as a,sum(likes) as b,sum(dislikes) as c FROM comments where comments  in ('like','dislike') GROUP by build_no union all SELECT build_no as aa,count(*) as a,0 as b,0 as c FROM comments where comments not in ('like','dislike') GROUP by build_no)  Derived GROUP BY build_no;";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    function save_comment($userid,$build_no,$comments){
        $sql="insert into comments  values (" . $build_no . "," . $userid . ",'" . $comments . "',0,0,now());";
        $query = $this->db->query($sql);
        //return $query->result_array();  
    }
    function show_comment($build_no){
        $sql="select a.*,b.* from comments a,users b  where a.build_no=" . $build_no . " and a.userid=b.userid and a.comments not in ('like','dislike') order by a.crt_date desc;";
        $query = $this->db->query($sql);
        return $query->result_array();  
    }
    function del_liked_disliked($build_no,$userid){
        $sql="delete from liked_disliked where build_no=" . $build_no . " and userid=" . $userid . ";";
        $query = $this->db->query($sql);
        $sql="delete from comments where build_no=" . $build_no . " and userid=" . $userid . " and comments in ('like','dislike');";
        $query = $this->db->query($sql);
        //return $query->result_array();  
    }
    function liked_disliked($build_no,$userid,$liked_disliked){
        if ($liked_disliked=="disliked"){
            $disliked=1;
            $liked=0;
            $desc="dislike";
        }else{
            $disliked=0;
            $liked=1;
            $desc="like";
        }
        
        $sql="insert into liked_disliked (build_no,userid,liked,disliked) values (" . $build_no . "," . $userid . "," . $liked . "," . $disliked . ");";
        $query = $this->db->query($sql);
        
        $sql="insert into comments (build_no,userid,comments,likes,dislikes,crt_date) values (" . $build_no . "," . $userid . ",'" . $desc . "'," . $liked . "," . $disliked . ",now());";
        $query = $this->db->query($sql);
        //return $query->result_array();  
    }
    function view_liked_disliked($userid){

            $sql="select * from liked_disliked where userid=" . $userid . ";";
        $query = $this->db->query($sql);
        return $query->result_array();  
    }
    function delete_mybuild($userid,$build_no){
        $sql="delete from builds where userid=" . $userid . " and build_no=" . $build_no . ";";
        $query = $this->db->query($sql);
    }
    function featured_prod_settings(){
        $sql="select * from featured";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    function featured_prod_save($type,$url){
        $sql="insert into featured (type,url) values ('" . $type . "','" . $url . "');";
        $query = $this->db->query($sql);

    }
    function featured_prod_del($featured_no){
        $sql="delete from featured where featured_no=" . $featured_no . ";";
        $query = $this->db->query($sql);

    }
    
    
  }
  
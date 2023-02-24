<!doctype html>
<html>
<head>
    <title>PCHub</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="PCHub Computer store, Computer Parts and accessories">
    <meta name="keywords" content="PCHub,Computer store, Computer Parts,PChub pricelist,Computer pricelist,Computer accessories">
    <meta name="robots" content="index,follow">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/simplegrid.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
</head>
<script>
   setInterval(show_comments, 10000);
function validate(){
    if(document.comments.comment.value==''){
        return false;
    }else{
        var d = new Date();
        var date = d.getFullYear() + '-' + d.getMonth() + '-' + d.getDate();
        //document.comments.submit();
        //document.getElementById("comm").style ="visibility: visible;";
        document.getElementById("comm").innerHTML="<table class='td_color1' border='0' width='80%'><tr class='' height='50'><td width='10%'><font size='2'>User:<?php echo $username;?></font></td><td><font size='2'>" + document.comments.comment.value + "</font></td><td width='10%'><font size='1'>Date:" + date + "</font></td></tr></table>";
      $comm_val=parseInt(document.getElementById('comm_val').innerText);
      $comm_val = $comm_val +1;
      document.getElementById('comm_val').innerText= $comm_val;
    loadDoc();
        //show_comments();
        
    }
}
function loadDoc() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      //document.getElementById("new_comments").innerHTML =this.responseText;//document.comments.comment.value();
      document.getElementById("comm").innerHTML="";
    }
  };

  xhttp.open("GET", "<?php echo base_url();?>profile/save_comment?build_no=" + document.comments.build_no.value + "&comment="+ document.comments.comment.value , true);
   xhttp.send();
   document.comments.comment.value='';
}
function show_comments() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("new_comments").innerHTML =this.responseText;//document.comments.comment.value();
      
    }
  };
  xhttp.open("GET", "<?php echo base_url();?>profile/show_comment?build_no=" + document.comments.build_no.value , true);
   xhttp.send();

}


function save_likes(build_no,liked_disliked) {

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    }
  };

  xhttp.open("GET", "<?php echo base_url();?>profile/liked_desliked?build_no=" + build_no + "&liked_desliked=" + liked_disliked , true);
   xhttp.send();
}

function mouseover(x){
    if(document.getElementById(x).src!="<?php echo base_url();?>img/liked_fixed.png"){
    document.getElementById(x).src="<?php echo base_url();?>img/liked.png"
    document.getElementById(x).width="30";
    }
}
function mouseout(x){
    if(document.getElementById(x).src!="<?php echo base_url();?>img/liked_fixed.png"){
    document.getElementById(x).width="20";
   document.getElementById(x).src="<?php echo base_url();?>img/like.png"
    }
}
function dislike_mouseover(x){
    if(document.getElementById(x).src!="<?php echo base_url();?>img/disliked_fixed.png"){
    document.getElementById(x).src="<?php echo base_url();?>img/disliked.png"
    document.getElementById(x).width="30";
    }
}
function dislike_mouseout(x){
    if(document.getElementById(x).src!="<?php echo base_url();?>img/disliked_fixed.png"){
    document.getElementById(x).width="20";
    document.getElementById(x).src="<?php echo base_url();?>img/dislike.png"
    }
}
function liked(build_no,x,y,val,val2){
    $i=parseInt(document.getElementById(val).innerText);
     $i=$i+1;
     $o=parseInt(document.getElementById(val2).innerText);
     document.getElementById(val).innerText = $i;
     document.getElementById(x).src="<?php echo base_url();?>img/liked_fixed.png"
     if (document.getElementById(y).src=="<?php echo base_url();?>img/disliked_fixed.png"){
         document.getElementById(y).src="<?php echo base_url();?>img/dislike.png";
         document.getElementById(y).width="20";
         $o=$o-1;
         document.getElementById(val2).innerText = $o;
     }

     save_likes(build_no,'liked');
   
}
function disliked(build_no,x,y,val,val2){
     document.getElementById(x).src="<?php echo base_url();?>img/disliked_fixed.png"
     $i=parseInt(document.getElementById(val).innerText);
     $i=$i+1;
     $o=parseInt(document.getElementById(val2).innerText);
     document.getElementById(val).innerText = $i;
     if (document.getElementById(y).src=="<?php echo base_url();?>img/liked_fixed.png"){
         document.getElementById(y).src="<?php echo base_url();?>img/like.png";
         document.getElementById(y).width="20";
         $o=$o-1;
         document.getElementById(val2).innerText = $o;
     }
     
   save_likes(build_no,'disliked');
}
</script>
</head>
<body onload="show_comments()">
<div class="grid grid-pad">
    <div class="col-1-1 mobile-col-1-1">
        <div >
            <img src="<?php echo base_url();?>img/pchub_logo.png" width="100%">
        </div>
    </div>
    
</div>
<div class="topnav" id="myTopnav">
    <a href="<?php echo base_url();?>">Home</a>
    <a href="<?php echo base_url();?>product/builds">Builder</a>
    <a href="<?php echo base_url();?>builds/view">Completed Builds</a>
    <a href="<?php echo base_url();?>product/prod_menu">Products</a>
    <a href="<?php echo base_url();?>product/sale">Sale</a>
    <a href="<?php echo base_url();?>welcome/contact">Contact</a>
    <?php if($this->session->userdata('role')!=null){
                if($this->session->userdata('role')=='Admin'){
                    echo '<div class="dropdown">
                         <button class="dropbtn">Settings 
                            <i class="fa fa-caret-down"></i>
                        </button>
                        <div class="dropdown-content">
                            <a href="' . base_url() . 'product/view">Products</a>
                            <a href="' . base_url() . 'profile/view_users">Users</a>
                            <a href="' . base_url() . 'product/sync">Sync To OPL</a>
                        </div>
                    </div>';
        }}
            echo '<div class="nav_floatright">';
            if ($this->session->userdata('username')!=null){
                echo "<a href='" .  base_url() . "profile'><strong>" . $this->session->userdata('username') . "</strong></a>";
                echo "<a href='" . base_url() ."register/logout'><strong>Logout</strong></a>";
            }else{
                echo "<a href='" . base_url() ."register/login_view'><strong>Log in</strong></a>";
                echo "<a href='" .  base_url() . "register'><strong>Sign up</strong></a>";
            }
            echo '</div>';
    ?>
    <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
</div>
<script>
    function myFunction() {
        var x = document.getElementById("myTopnav");
        if (x.className === "topnav") {
            x.className += " responsive";
        } else {
            x.className = "topnav";
        }
    }
</script>
<!-- Grid 1/3 -->
<div class="grid grid-pad">
    <div class="col-1-1 mobile-col-1-1 push-1-1">
        <div class="content">
            <center>
                <video autoplay loop muted width="70%">
                <source src="https://scontent.fmnl9-1.fna.fbcdn.net/v/t39.24130-6/64415306_334943033867767_4160694781318094410_n.mp4?_nc_cat=102&efg=eyJ2ZW5jb2RlX3RhZyI6Im9lcF9oZCJ9&_nc_eui2=AeGhsn-i3rCvfyHDgdU2WVany3S0jclPadMMkFr7bznnXFnxGQFcj74cZ2MvYdBLS1kI3vybcpYvBrA-nw6w-6MvN3IOds0ZIG5RKanmr9Vv7j8dMBVfWM_lJZuzMyGKnhY&_nc_oc=AQlmQZWQNK_8uMCNUk5PxLyyrM1Aul7sTq23e0ODDHQsKIx7IcKl4np3clPlOreL-AM&_nc_zt=28&_nc_ht=scontent.fmnl9-1.fna&oh=cf90d9c7760a30346e064d01892c467e&oe=5DD5DE12" type="video/mp4">
                
                Your browser does not support the video tag.
            </video> 
            </center>
        </div>
    </div>
</div>
<div class="grid grid-pad">
    <?php if(isset($builds)){
        $i=0;
        $checkliked="like.png";
        $checkdisliked="dislike.png";
        foreach ($builds as $row){
            echo '<div class="col-1-1 mobile-col-1-1">';
            echo '  <div class="content">';
            echo '      <center>';
            echo '      <table border="0" width="80%" class="td_color1">';
            echo '          <th bgcolor="#215478"><font color="white">' . $row['title'] . '</font></th>';
            echo '          <tr>';
            echo '              <td colspan="3"><p><b>CPU:</b><font size="2">' . $row['cpu'] . '</font></p>';
            echo '                  <p><b>GPU:</b><font size="2">' . $row['video_card'] . '</font></p>';
            echo '                  <p><b>RAM:</b><font size="2"> ' . $row['memory'] . '</font>';
            echo '                  <p><b>Price:</b><font size="2"> ' . $row['price'] . '</font></td>';
            echo '          </tr>';
            echo '          <tr><td><center>';
            echo '                  <table width="70%" border="0">';
            echo '                      <tr><td>';
                                            if(isset($row['cpu_img'])){
                                                echo '<div class="zoom crop"><img  src="' . $row['cpu_img'] . '" width="100px" height="100px"></div>';
                                            }
            echo '                          </td>';
            echo '                          <td>';
                                            if(isset($row['motherboard_img'])){
                                                echo '<div class="zoom crop"><img  src="' . $row['motherboard_img'] . '" width="80px" height="80px"></div>';
                                            }
            echo '                          </td>';
            echo '                          <td>';
                                            if(isset($row['ram_img'])){
                                                echo '<div class="zoom crop"><img  src="' . $row['ram_img'] . '" width="80px" height="80px"></div>';
                                            }
            echo '                      </td></tr>';
            echo '                      <tr><td>';
                                            if(isset($row['gpu_img'])){
                                                echo '<div class="zoom crop"><img  src="' . $row['gpu_img'] . '" width="80px" height="80px"></div>';
                                            }
            echo '                          </td>';
            echo '                          <td>';
                                            if(isset($row['hdd_img'])){
                                                echo '<div class="zoom crop"><img  src="' . $row['hdd_img'] . '" width="80px" height="80px"></div>';
                                            }
            echo '                          </td>';
            echo '                          <td>';
                                            if(isset($row['monitor_img'])){
                                                echo '<div class="zoom crop"><img  src="' . $row['monitor_img'] . '" width="80px" height="80px"></div>';
                                            }
            echo '                      </td></tr>';
            echo '                      <tr ><td colspan="3" align="right">';
                   foreach ($view_liked_disliked as $view_liked){
            if ($view_liked['build_no'] == $row['build_no']){
                
               if($view_liked['liked']==1){
                   $checkliked="liked_fixed.png";
               }else{
                   $checkliked="like.png";
               }
               if($view_liked['disliked']==1){
                   $checkdisliked="disliked_fixed.png";
               }else{
                   $checkdisliked="dislike.png";
               }
               
               
            }
            }
            
            $not_exist_in_comments=TRUE;
            foreach ($comments as $com){
                if($com['build_no']==$row['build_no']){
                    if($userid!=""){
                        echo '</p><img src="' . base_url() . 'img/' . $checkliked . '" id=\'like' . $i . '\' onmouseout="mouseout(\'like' . $i . '\')" onmouseover="mouseover(\'like' . $i . '\')" onclick="liked(\'' . $row['build_no'] . '\',\'like' . $i . '\',\'dislike' . $i . '\',\'liked_val' . $i . '\',\'disliked_val' . $i . '\')" width="20px"><div id="liked_val' . $i . '" style="display: inline-block;">'. $com['likes'] .'</div><img src="' . base_url() . 'img/' . $checkdisliked . '" id=\'dislike' . $i . '\' onmouseout="dislike_mouseout(\'dislike' . $i . '\')" onmouseover="dislike_mouseover(\'dislike' . $i . '\')" onclick="disliked(\'' . $row['build_no'] . '\',\'dislike' . $i . '\',\'like' . $i . '\',\'disliked_val' . $i . '\',\'liked_val' . $i . '\')" width="20px"><div id="disliked_val' . $i . '" style="display: inline-block;">' . $com['dislikes'] .'</div><a href="' .base_url() . 'product/view_builds?build_no='. $row['build_no'] . '"><img src="' . base_url() . 'img/comments.png" width="20px"><div id="comm_val" style="display: inline-block;">' . $com['ct'] .'</a></p>';
                    } else {
                        echo '</p><img src="' . base_url() . 'img/' . $checkliked . '" id=\'like' . $i . '\' width="20px">'. $com['likes'] .'<img src="' . base_url() . 'img/' . $checkdisliked . '" id=\'dislike' . $i . '\'  width="20px">' . $com['dislikes'] .'<a href="' .base_url() . 'product/view_builds?build_no='. $row['build_no'] . '"><img src="' . base_url() . 'img/comments.png" width="20px">' . $com['ct'] .'</a></p>';
                    }
                                            $not_exist_in_comments=FALSE;
                }
            }
            if ($not_exist_in_comments==TRUE){
                echo '</p><img src="' . base_url() . 'img/' . $checkliked . '" id=\'like' . $i . '\' onmouseout="mouseout(\'like' . $i . '\')" onmouseover="mouseover(\'like' . $i . '\')" onclick="liked(\'' . $row['build_no'] . '\',\'like' . $i . '\',\'dislike' . $i . '\',\'liked_val' . $i . '\',\'disliked_val' . $i . '\')" width="20px"><div id="liked_val' . $i . '" style="display: inline-block;">0</div><img src="' . base_url() . 'img/' . $checkdisliked . '" id=\'dislike' . $i . '\' onmouseout="dislike_mouseout(\'dislike' . $i . '\')" onmouseover="dislike_mouseover(\'dislike' . $i . '\')" onclick="disliked(\'' . $row['build_no'] . '\',\'dislike' . $i . '\',\'like' . $i . '\',\'disliked_val' . $i . '\',\'liked_val' . $i . '\')" width="20px"><div id="disliked_val' . $i . '" style="display: inline-block;">0</div><a href="' .base_url() . 'product/view_builds?build_no='. $row['build_no'] . '"><img src="' . base_url() . 'img/comments.png" width="20px">0</a></p>';
                
            }
            echo '                      </td></tr>';
            echo '                  </table></center>';
            echo '          </td></tr>';
            echo '      </table>';
            echo '  </div>';
            echo '</div>';$i=$i+1;}}?>
</div>
</div>
<hr size="2">
<div class="grid grid-pad">
    <div class="col-1-1 mobile-col-1-1 push-1-1">
        <div class="content">
            <center>
            <table class="td_color1" width="80%" border="3">
                <th>Comments
                </th>
                <tr>
                <form name="comments" method="post" action="#">
                    <td>
                        <textarea name="comment" width="100%"></textarea><br><input type="hidden" name="build_no" value="<?php echo $row['build_no']; ?>"><input type="button" class="butn" style="float:right;" value="submit" onclick="validate()">
                    </td>
                </tr>

                    
                    
                    
                </form>
                
            </table>
                <div id="comm" >
                   
                </div>
                <div id="new_comments">
                        
                    </div>
            </center>
        </div>
    </div>
</div>
<div class="col-1-1 mobile-col-1-1 push-1-1">
    <div class="content">
        <div class="footer">
            <p align="right"><font size="1">Powered By PCHub &nbsp;&nbsp;<a href="https://web.facebook.com/pchub/?_rdc=1&_rdr"><img src="<?php echo base_url();?>img/fb_footer_icon.png" width="40">&nbsp;&nbsp;</a> </font></p>
        </div>
    </div>
</div>     
</body>
</html>

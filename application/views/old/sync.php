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
var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";  
  setTimeout(carousel, 9000);    
}
</script>
</head>
<body>
<div class="grid grid-pad">
    <div class="col-1-1 mobile-col-1-1">
        <div >
            <img src="<?php echo base_url();?>img/pchub_logo.png" width="100%">
        </div>
    </div>
    
</div>
<div class="topnav" id="myTopnav">
    <a href="<?php echo base_url();?>" class="active">Home</a>
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
            <div class="w3-content w3-section" >
                <img class="mySlides w3-animate-fading imgrcorners" src="http://pchubimages.online/2071075.jpg" >
                <img class="mySlides w3-animate-fading imgrcorners" src="http://pchubimages.online/3061354.jpg">
                <img class="mySlides w3-animate-fading imgrcorners" src="http://pchubimages.online/5110527.jpg" >
                <img class="mySlides w3-animate-fading imgrcorners" src="http://pchubimages.online/4020940.jpg" >
            </div>
            </center>
            <script>
            var myIndex = 0;
            carousel();
            function carousel() {
                var i;
                var x = document.getElementsByClassName("mySlides");
                for (i = 0; i < x.length; i++) {
                    x[i].style.display = "none";  
                }
            myIndex++;
            if (myIndex > x.length) {myIndex = 1}    
                x[myIndex-1].style.display = "block";  
                setTimeout(carousel, 7000);    
            }
            </script>
        </div>
    </div>
</div>
<div class="grid grid-pad">
    <center><font color="white"><h4 class="title is-2">Sync</h4></font>
    <?php
    if(isset($result)){
        echo $result;
    }
    ?>
    <form name="sync" action="<?php echo base_url(); ?>product/sync_to_opl">
        <input  type="submit" style="float:none;"  class="butn" value="Sync to google sheet OPL" >
    </form>
    </center>
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




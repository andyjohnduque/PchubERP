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
    <a href="<?php echo base_url();?>">Home</a>
    <a href="<?php echo base_url();?>product/builds">Builder</a>
    <a href="<?php echo base_url();?>builds/view">Completed Builds</a>
    <a href="<?php echo base_url();?>product/prod_menu">Products</a>
    <a href="<?php echo base_url();?>product/sale" class="active">Sale</a>
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
<!-- Grid 1/3 -->
<div class="grid grid-pad">
    <div class="col-1-1 mobile-col-1-1 push-1-1">
        <div class="content">
            <center>
                <img width="80%" height="80%" src="https://scontent.fmnl9-1.fna.fbcdn.net/v/t1.0-9/67739377_2715139558515952_3750453893423693824_o.jpg?_nc_cat=111&_nc_eui2=AeHRr02kF8QkT-7o5WwJdlY-7xh1rv7WZi6HqCJFG2t64Xf5BAGirnvwAI7PDzyXtFoPSEogGumh2mHxZURqI9lhXrkj8_8H2IW-XLgouZEfYylP7RMtE06PAgkzOZ08CeQ&_nc_oc=AQkapzVMvKbBfNUVkLELscS6ejdVQJFcsqnSPg55cvuLxYYGod7Ez5FN_K5kOYg80cQ&_nc_ht=scontent.fmnl9-1.fna&oh=3787b06b279ef1fd9edf5d1a716cc59b&oe=5DD814DE" >
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

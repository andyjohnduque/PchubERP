<!DOCTYPE html>
<html lang="en">
<head>
  <title>PCHub</title>
  <link rel="stylesheet" href="<?php echo base_url();?>css/bulma.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--link href="<?php echo base_url();?>css/bootstrap-3.min.css" rel="stylesheet"-->
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script>
 function Save(){
     document.products.submit();
 }
function myFunction(id) {
  var x = document.getElementById(id);
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}
function sel_prod(){
   
    document.Selection.submit();
}

function Bulkupdate(){
    alert('123');
    document.bulk.submit();
}
</script>    
    <style>
    .wrapper{
      display:grid;
      grid-template-columns:1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr;
      grid-auto-rows:minmax(50px, auto);
      /*grid-gap:1em;
      justify-items:stretch;
      align-items:stretch;*/
    }

    .wrapper > div{
     /* background:#eee;*/
     /* padding:1em;*/
    }
    .wrapper > div:nth-child(odd){
      /*background:#ddd;*/
    }

    .box1{
      /*align-self:start;*/
      grid-column:1/4;
      grid-row:1/3;
	  background-color:white;
    }

    .box2{
      /*align-self:end;*/
      grid-column:4/10;
      grid-row:1/3;
	background-image: linear-gradient(to right, white , gray); 
    }

    .box3{
      /*justify-self:end;*/
      grid-column:1/10;
      grid-row:3;
    }

    .box4{
      grid-column:3/8;
      grid-row:4;

    }
    .box4_2{
      grid-column:8/10;
      grid-row:4;

    }
    .box5{
      grid-column:2/10;
      grid-row:6;
      /*border:1px solid #333;*/
    }
    .box5_5{
      grid-column:6/13;
      grid-row:6;
      /*border:1px solid #333;*/
    }
    .box6{
      grid-column:2/9;
      grid-row:7;
      /*border:1px solid #333;*/
    }
	
	.nested{
      display:grid;
      grid-template-columns:repeat(3, 1fr);
      grid-auto-rows: 70px;
      grid-gap:1em;
	  grid-auto-rows:minmax(50px, auto);
    }
	.nested > div{
      border:#333 1px solid;
      padding:1em;
	background-color:#dfedf7;
    }
    .td_color1{
        background-color: whitesmoke;
    }
    .td_color2{
        background-color: #DBE2E3;
    }
    .headingcolor{
        background-color: #077D94;
    }
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li {
  float: left;
}
li.float_right{
    float: right;
}
li a, .dropbtn_w3 {
  display: inline-block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;

}

li a:hover, .dropdown_w3:hover .dropbtn_w3 {
  background-color: lightgray;
}

li.dropdown_w3 {
  display: inline-block;
}

.dropdown-content_w3 {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content_w3 a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content_w3 a:hover {background-color: #f1f1f1;}

.dropdown_w3:hover .dropdown-content_w3 {
  display: block;
}
  </style>
</head>
<body>
  <div class="wrapper">
    <div class="box1"><img src="<?php echo base_url(); ?>img/pchub_logo.png" width="100px"></div>
    <div class="box2"></div>
<div class="box3">
    <ul>
        <li><a href="<?php echo base_url();?>">Home</a></li>
        <li><a href="<?php echo base_url();?>product/builds">Builder</a></li>
        <li><a href="<?php echo base_url();?>builds/view">Completed Builds</a></li>
        <li><a href="<?php echo base_url();?>product/prod_menu">Products</a></li>
        <li><a href="<?php echo base_url();?>product/sale">Sale</a></li>
        <li><a href="<?php echo base_url();?>welcome/contact">Contact</a></li>
        <?php if($this->session->userdata('role')!=null){
                if($this->session->userdata('role')=='Admin'){
                    echo '<li class="dropdown_w3">
                        <a href="javascript:void(0)" class="dropbtn_w3">Settings</a>
                        <div class="dropdown-content">
                            <a href="' . base_url() . 'product/view">Products</a>
                            <a href="' . base_url() . 'profile/view_users">Users</a>
                            <a href="' . base_url() . 'product/sync">Sync To OPL</a>
                        </div>
                    </li>';
        }}
            if ($this->session->userdata('username')!=null){
                echo "<li class='float_right'><a href='" . base_url() ."register/logout'><strong>Logout</strong></a></li>";
                echo "<li class='float_right'><a href='" .  base_url() . "profile'><strong>" . $this->session->userdata('username') . "</strong></a></li>";
            }else{
                echo "<li class='float_right'><a href='" . base_url() ."register/login_view'><strong>Log in</strong></a></li>";
                echo "<li class='float_right'><a href='" .  base_url() . "register'><strong>Sign up</strong></a></li>";
            }
        ?>
    </ul>
</div>
    <div class="box4"><h3 class="title is-3">Update Products</h3>
        <input type="text" class="input" placeholder="Search" name="uname">
        <form name="Selection" method="GET" action="<?php echo base_url();?>product/prod" >
        Products: <select class="select"  name="Selection" >
            <option value="casing" onclick="sel_prod()" selected>All</option>
            <option value="casing" onclick="sel_prod()">Casing</option>
            <option value="cores" onclick="sel_prod()">Core</option>
            <option value="cpu_coolers" onclick="sel_prod()">CPU Cooler</option>
            <option value="external" onclick="sel_prod()">External Drive</option>
            <option value="memory" onclick="sel_prod()">Memory</option>
            <option value="monitor" onclick="sel_prod()">Monitor</option>
            <option value="motherboards" onclick="sel_prod()">Motherboard</option>
            <option value="opticaldrive" onclick="sel_prod()">Optical Drive</option>
            <option value="os" onclick="sel_prod()">Operating System</option>
            <option value="others" onclick="sel_prod()">Others</option>
            <option value="powersupply" onclick="sel_prod()">Power Supply</option>
            <option value="software" onclick="sel_prod()">Software</option>
            <option value="storage" onclick="sel_prod()">Storage</option>
            <option value="videocard" onclick="sel_prod()">Video Card</option>
        </select>
        </form>
    </div>
	
    

    
    <div class="box6">
        <table border="0" width="100%">
            <tr class="headingcolor">
                <th>Image</th>
                <th>Name</th>
                <th>Ratings</th>
                <th>Price</th>
            </tr>
           
         <?php 
         if(isset($products)){
             $color='td_color1';
            foreach ($products as $row){
      echo ' <tr><td class="' . $color . '"><img src="' . base_url() . 'uploads/prod/' . $row['img'] . '" width="40px"></td>';
   echo '<td class="' . $color . '">' . $row['name'] . '</td>';
   echo '<td class="' . $color . '">' . $row['ratings'] . '</td>';
   echo '<td class="' . $color . '">' . $row['price'] . '</td>';
   if($color=='td_color1'){
       $color='td_color2';
   }else{
       $color='td_color1';
   }
   }}?>    
        </table>

    </div></div>    

	<div class="box6"></div>	

</body>
</html>

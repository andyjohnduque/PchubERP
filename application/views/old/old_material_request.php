<!DOCTYPE html>
<html style="" class=" js flexbox flexboxlegacy canvas canvastext webgl no-touch geolocation postmessage websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms no-csstransforms3d csstransitions fontface no-generatedcontent video audio localstorage sessionstorage webworkers applicationcache svg inlinesvg smil svgclippaths"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PCHub</title>
    <link href="<?php echo base_url();?>css/bootstrap-3.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>css/site.css" rel="stylesheet">
    <link href="<?php echo base_url();?>css/font-awesome.css" rel="stylesheet">
    <script src="<?php echo base_url();?>css/modernizr-2.8.3.js.download"></script>
    <script src="<?php echo base_url();?>css/jquery-3.3.1.js.download"></script>
    <script src="<?php echo base_url();?>css/bootstrap.js.download"></script>
    <script type="text/javascript">
          var counter = 0;
          var btn=3;
          var t=1;
          function moreFields() {
	counter++;
            
	var newFields = document.getElementById('readroot').cloneNode(true);
        if(counter>1){
	newFields.id = '';
        newFields.style.display = 'block';
    }
	
	var newField = newFields.childNodes;
        var c = document.getElementsByTagName("input");
      

      
         var d = document.getElementsByTagName("textarea");
         
        
	//for (var i=0;i<newField.length;i++) {
        //   
	//	var theName = newField[i].name
         //        alert(theName);
	//	if (theName)
                        
	//		newField[i].name = theName + counter;
	//}
	var insertHere = document.getElementById('writeroot');
	insertHere.parentNode.insertBefore(newFields,insertHere);
}

    function Clear(){
        document.am.code.value="";
        document.am.description.value="";
        document.getElementById('brand').selectedIndex = "0";
        document.getElementById('branch').selectedIndex = "0";
        document.getElementById('group').selectedIndex = "0";
        document.am.versionman.checked =false;
        document.am.sprice.value="";
        document.am.maprice.value="";
        document.getElementById('serial').selectedIndex = "0";
        document.getElementById('status').selectedIndex = "0";
        
    }
    function Save(){
        if(document.mr.code.value=="" || document.mr.description.value=="" || document.mr.brand.value=="" || document.mr.branch.value=="" || document.mr.group.value=="" || document.mr.sprice.value=="" || document.mr.maprice.value=="" || document.mr.serial.value=="" || document.mr.status.value==""){
            alert('Please enter all required fields');
            return false;
        }
        if(document.mr.versionman.checked==true){
            document.mr.verman.value="Y";
        }else{
            document.mr.verman.value="N";
        }
        if(document.mr.assbly.checked==true){
            document.mr.assembly.value="Y";
        }else{
            document.mr.assembly.value="N";
        }
        document.mr.submit();
    }
    function Check_Sku(){
        sku = document.mr.code.value;
        document.mr.action="<?php echo base_url();?>sales_order/check_sku?sku=" + sku;
        document.mr.submit();
    }

    </script>
    <style>
#snackbar {
  visibility: hidden;
  min-width: 250px;
  margin-left: -125px;
  background-color: #333;
  color: #fff;
  text-align: center;
  border-radius: 2px;
  padding: 16px;
  position: fixed;
  z-index: 1;
  left: 20%;
  bottom: 30px;
  font-size: 17px;
}

#snackbar.show {
  visibility: visible;
  -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
  animation: fadein 0.5s, fadeout 0.5s 2.5s;
}

@-webkit-keyframes fadein {
  from {bottom: 0; opacity: 0;} 
  to {bottom: 30px; opacity: 1;}
}

@keyframes fadein {
  from {bottom: 0; opacity: 0;}
  to {bottom: 30px; opacity: 1;}
}

@-webkit-keyframes fadeout {
  from {bottom: 30px; opacity: 1;} 
  to {bottom: 0; opacity: 0;}
}

@keyframes fadeout {
  from {bottom: 30px; opacity: 1;}
  to {bottom: 0; opacity: 0;}
}
</style>
<script>
function myFunction() {
  var x = document.getElementById("snackbar");
  x.className = "show";
  setTimeout(function(){ x.className = x.className.replace("show", "");   }, 10000);
  moreFields();
    moreFields();
}
</script>

</head>
<body onload="myFunction()">
  
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url();?>">PCHub</a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a href="<?php echo base_url();?>">Home</a></li>
                    <?php if($this->session->userdata('role')=="Admin" || $this->session->userdata('role')=="Vendor"){?>
                    
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            Quotation
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                             <?php if ($this->session->userdata('role')=="Vendor"){?>
                            <li><a href="<?php echo base_url();?>purchasing/quotation">Create Quotation</a></li>
                            <li><a href="<?php echo base_url();?>purchasing/user_quotations?S=Pending">View Quotation</a></li>
                            <?php }else{ ?>
                            <li><a href="<?php echo base_url();?>purchasing/view_pending?S=Pending">View Quotation</a></li>
                            <?php } ?>
                        </ul>
                    </li>
                    <?php }?>
                    <?php if($this->session->userdata('role')=="Admin"){?>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            Article Master
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                           
                            <li><a href="<?php echo base_url();?>am/create">Create Article Master</a></li>
                            <li><a href="<?php echo base_url();?>am/view_all_am">View Article Master</a></li>
 
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            Administration
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo base_url();?>user/all_users">Users</a></li>
                            <li><a href="<?php echo base_url();?>branch">Branch and Storage Types</a></li>
                            <li><a href="<?php echo base_url();?>pricing">Vendor Pricing Record</a></li>
                            <li><a href="<?php echo base_url();?>inventory/view_inventory">Inventory</a></li>
                        </ul>
                    </li>
                    <?php } ?>
                    <?php  if($this->session->userdata('username')!=''){?>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            Return Management
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo base_url();?>return_mgmt/return_request">Create a request</a></li>
                            <li><a href="<?php echo base_url();?>return_mgmt">View RMA Ticket</a></li>
                            <?php if(substr($this->session->userdata('access'),strpos($this->session->userdata('access'), 'rm-')+3,1)=="Y"){ ?>
                            <li><a href="<?php echo base_url();?>return_mgmt/view_completed">Completed RMA Ticket</a></li>
                            <?php } ?>
                        </ul>
                    </li>
                    <?php } ?>
                    <?php if($this->session->userdata('username')==null){?>
                    <li><a href="<?php echo base_url();?>user">Login</a></li>
                    <li><a href="<?php echo base_url();?>user/signup">Sign Up</a></li>
                    <?php }else{ ?>
                    <li><a  href="<?php echo base_url();?>user/profile"><?php echo $this->session->userdata('username');?></a></li>
                    <li><a href="<?php echo base_url();?>user/logout">Logout</a></li>
                    <?php }?>
                </ul>
            </div>
        </div>
    </div>
    <div class="container body-content">
         <div class="col-md-3">
  
         </div>
        

<form action="<?php echo base_url();?>am/save_request" method="post" name="mr">   
    <div class="form-horizontal">
        <h4>Material Request</h4>
        <hr>
       
   
            <span class="border border-primary">
            <div class="form-group">
         <label class="control-label col-md-2" for="Quotation ID">SKU Code</label>
        <div class="col-md-2">
            <div class="input-group">
                <input class="form-control text-box single-line" style="border-radius:4px;"  data-val="true" data-val-required="The Firstname field is required." id="code" name="code" placeholder="Code" type="text"  value="<?php if(isset($check_sku)){ if(count($check_sku)>0) { echo $check_sku[0]['sku']; }}?>" onchange="Check_Sku()">
            </div>
        </div>
         <label class="control-label  col-md-2" for="Quotation ID">Group</label>
        <div class="col-md-2">
            

                <select class="form-control" style="border-radius:4px;"  data-val="true" data-val-number="The field User Role must be a number." data-val-required="The User Role field is required." id="group" name="group">
                    <option value="<?php if(isset($check_sku)){if(count($check_sku)>0) { echo $check_sku[0]['Category']; }}?>"><?php if(isset($check_sku)){ if(count($check_sku)>0) {echo $check_sku[0]['Category']; }}?></option>
                    <?php foreach($cat as $row){?>
                    <option value="<?php echo $row['category']; ?>"><?php echo $row['category']; ?></option>
                    <?php } ?>
            </select>

        </div>
        
         </div>
        <div class="form-group">
            <label class="control-label col-md-2" for="Quotation ID">Description</label>
        <div class="col-md-2">
            <div class="input-group">
                <input class="form-control text-box single-line" style="border-radius:4px;"  data-val="true" data-val-required="The Last name field is required." id="description" name="description" placeholder="Description" type="text" value="<?php if(isset($check_sku)){ if(count($check_sku)>0) {echo $check_sku[0]['description']; }}?>">
            </div>
        </div>
          
         <label class="control-label col-md-2" for="Quotation ID">Stock Price</label>
        <div class="col-md-2">
            <div class="input-group">
                <input class="form-control text-box single-line" style="border-radius:4px;"  data-val="true" data-val-required="The Last name field is required." id="sprice" name="sprice" placeholder="Stock Price" type="text" value="<?php if(isset($check_sku)){ if(count($check_sku)>0) {echo $check_sku[0]['selling_price']; }}?>">
            </div>
        </div>
       
        
    </div>
        <div class="form-group">
        <label class="control-label  col-md-2" for="Quotation ID">Brand</label>
        <div class="col-md-2">
        
                <select class="form-control" style="border-radius:4px;"  data-val="true" data-val-number="The field User Role must be a number." data-val-required="The User Role field is required." id="brand" name="brand">
                    <option value="<?php if(isset($check_sku)){ if(count($check_sku)>0) {echo $check_sku[0]['brand']; }}?>"><?php if(isset($check_sku)){ if(count($check_sku)>0) {echo $check_sku[0]['brand']; }}?></option>
                    <?php foreach($brand as $row){?>
                    <option value="<?php echo $row['brand']; ?>"><?php echo $row['brand']; ?></option>
                    <?php } ?>
            </select>
          
        </div>
        <label class="control-label col-md-2" for="Quotation ID">Quantity</label>
        <div class="col-md-2">
            <div class="input-group">
                <input class="form-control text-box single-line" style="border-radius:4px;"  data-val="true" data-val-required="The Last name field is required." id="sprice" name="sprice" placeholder="Stock Price" type="text" value="<?php if(isset($check_sku)){ if(count($check_sku)>0) {echo $check_sku[0]['selling_price']; }}?>">
            </div>
        </div>
        <label style="display:none;" class="control-label  col-md-2" for="Quotation ID">Branch</label>
        <div class="col-md-2" style="display:none;" >
            
    
                <select class="form-control" style="border-radius:4px;"  data-val="true" data-val-number="The field User Role must be a number." data-val-required="The User Role field is required." id="branch" name="branch">
                    <option value=""></option>
                    <?php foreach($branch as $row){?>
                    <option value="<?php echo $row['branch_id']; ?>"><?php echo $row['branch']; ?></option>
                    <?php } ?>
            </select>
      
        </div>
            
        
        </div>   
         <div class="form-group" style="display:none;" >
     <label class="control-label col-md-2 col-md-offset-4" for="Quotation ID">MA Price</label>
        <div class="col-md-2">
            <div class="input-group">
                <input class="form-control text-box single-line" style="border-radius:4px;"  data-val="true" data-val-required="The Contact field is required." id="maprice" name="maprice" placeholder="MA Price" type="text" value="">

            </div>
        </div>
    </div>
     <div class="form-group" style="display: none; ">
         <label class="control-label col-md-8"><input type="checkbox" name="versionman" value="" style="transform: scale(1.5);">&nbsp;&nbsp;&nbsp;&nbsp;Version Management</label>
         <input type="hidden" name="verman">
        
    </div>
                <div class="form-group" style="display: none; ">
     <label class="control-label col-md-2" for="Quotation ID">Serialization</label>
        <div class="col-md-2">
            <div class="input-group">
               <select class="form-control" style="border-radius:4px;"  data-val="true" data-val-number="The field User Role must be a number." data-val-required="The User Role field is required." id="serial" name="serial">
                    <option value=""></option>
                    <?php foreach($serial as $row){?>
                    <option value="<?php echo $row['serial_id']; ?>"><?php echo $row['serial_id'] . "-" . $row['serial']; ?></option>
                    <?php } ?>
            </select>
            </div>
        </div>

     <label class="control-label col-md-2" for="Quotation ID">Status</label>
        <div class="col-md-3">
            <div class="input-group">
                <select class="form-control" style="border-radius:4px;"  data-val="true" data-val-number="The field User Role must be a number." data-val-required="The User Role field is required." id="status" name="status">
                    <option value="00"></option>
                    <?php foreach($status as $row){?>
                    <option value="<?php echo $row['status_id']; ?>"><?php echo $row['status_id'] . "-" . $row['status']; ?></option>
                    <?php } ?>
            </select>
            </div>
        </div>
    </div>
                <div class="form-group">
                            <label class="control-label col-md-4"><input type="checkbox" name="assbly" value="" style="transform: scale(1.5);">&nbsp;&nbsp;&nbsp;&nbsp;Assembly</label>
         <input type="hidden" name="assembly">
                </div>
      <div class="form-group">
            <div class="col-md-offset-6 col-md-10">
                
                <input type="button" value="Clear"  onclick="Clear()" class="btn btn-default"> 
                <input type="button" value="Save" onclick="Save()" class="btn btn-primary">
            </div>
        </div>
        </span>
     
   

        <hr>
    
</form>



        <hr>
        <footer>
            <p>?? 2019 - PChub</p>
        </footer>
    </div>


</body>
</html>



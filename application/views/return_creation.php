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
    <script src="https://kit.fontawesome.com/7dc3015a44.js" crossorigin="anonymous"></script>
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
        document.rma.fname.value="";
        document.rma.lname.value="";
        document.rma.addr.value="";
        document.rma.contact.value="";
        document.rma.receipt.value="";
        document.rma.problem.value="";
        document.rma.item_name.value="";
        
    }
    function Submit(){
    	document.getElementById('fname').style="background-color:white";
    	document.getElementById('lname').style="background-color:white";
    	document.getElementById('payment_type').style="background-color:white";
    	document.getElementById('receipt').style="background-color:white";
    	document.getElementById('purchased_dt').style="background-color:white";
    	document.getElementById('branch').style="background-color:white";
    	document.getElementById('addr').style="background-color:white";
    	document.getElementById('contact').style="background-color:white";
        valid_input=true;
        valid_items="";
        if(document.rma.fname.value==""){
            valid_input=false;
        	valid_items=valid_items + "fname";
        	document.getElementById('payment_type').style="background-color:pink";
        }
        if(document.rma.lname.value==""){
            valid_input=false;
        	valid_items=valid_items + "lname";
        	document.getElementById('payment_type').style="background-color:pink";
        }
        <?php if($this->session->userdata('role')=="Admin"){ ?>
        
        <?php }else{ ?>
            if(document.rma.payment_type.value=="" ){
            valid_input=false;
        	valid_items=valid_items + ",PaymentType";
        	document.getElementById('payment_type').style="background-color:pink";
            }
            if( document.rma.receipt.value==""){
            valid_input=false;
        	valid_items=valid_items + ",ReceiptNumber";
        	document.getElementById('receipt').style="background-color:pink";
            }
            if(document.rma.purchased_dt.value=="" ){
            valid_input=false;
        	valid_items=valid_items + ",DatePurchased";
        	document.getElementById('purchased_dt').style="background-color:pink";
            }
            if(document.rma.branch.value=="" ){
            valid_input=false;
        	valid_items=valid_items + ",Branch";
        	document.getElementById('branch').style="background-color:pink";
            }
        <?php } ?>
        
        if( document.rma.addr.value==""){
            valid_input=false;
        	valid_items=valid_items + ",Email";
        	document.getElementById('addr').style="background-color:pink";
        }
        if( document.rma.contact.value==""){
            valid_input=false;
        	valid_items=valid_items + ",ContactNumber";
        	document.getElementById('contact').style="background-color:pink";
        }
        if(valid_input==false){
        	alert('Please enter ' + valid_items);
        	return false;
        }
        
        
       if(document.getElementsByName('problem[]').length<=2){
           alert('Please add Items');
            return false;
       }
        
             var item_name = document.getElementsByName('item_name[]');
		for (i=2; i<item_name.length; i++)
			{
			 if (item_name[i].value == "")
				{
                                 alert('Please enter item description Item#' + (i -1))
			 	 item_name[i].style="background-color:pink;";		
			 	 return false;
				}
			}
        
        //var inputs = document.getElementsByTagName("input");
        var serial_no = document.getElementsByName('serial_no[]');
		for (i=2; i<serial_no.length; i++)
			{
			 if (serial_no[i].value == "")
				{
                                 alert('Please enter serial no Item#' + (i -1))
			 	 serial_no[i].style="background-color:pink;";		
			 	 return false;
				}
			}
                        
        var problem = document.getElementsByName('problem[]');
		for (i=2; i<problem.length; i++)
			{
			 if (problem[i].value == "")
				{
                                 alert('Please enter problem description Item#' + (i -1))
			 	 problem[i].style="background-color:pink;";		
			 	 return false;
				}
			}
        document.rma.counter_val.value=counter-1;
                var r = confirm("Are you sure you want to proceed? Note: all entries are final and editing the RMA ticket is not possible!");
    if (r == true) {
    
    document.rma.submit();
  } else {
    return false;
  }   
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
  
<!-- START NAV -->
<?php
$this->load->view('menu');
?>
<!-- END NAV -->
    <div class="container body-content">
         <div class="col-md-3">
  <div id="snackbar">Item warranties can only be claimed by person whose name appears on the official receipt.</div>
         </div>
        
<?php foreach ($user as $u) {?>
<form action="<?php echo base_url();?>return_mgmt/save_request" method="post" name="rma" enctype="multipart/form-data">   <div class="form-horizontal">
        <h4>Create return request</h4>
        <hr>
       
        <div style="display: <?php if($this->session->userdata('role')=="Admin"){ echo "none"; }else{ echo "block"; } ?> ">
            <span class="border border-primary">
            <div class="form-group">
         <label class="control-label col-md-2" for="Quotation ID"><font color="red">*</font>First name</label>
        <div class="col-md-2">
            <div class="input-group">
                <input class="form-control text-box single-line" style="border-radius:4px;"  data-val="true" data-val-required="The Firstname field is required." id="fname" name="fname" placeholder="First name" type="text"  value="<?php echo $u['fname'];?>">
         
            </div>
        </div>
         <label class="control-label col-md-2" for="Quotation ID"><font color="red">*</font>Last name</label>
        <div class="col-md-2">
            <div class="input-group">
                <input class="form-control text-box single-line" style="border-radius:4px;"  data-val="true" data-val-required="The Last name field is required." id="lname" name="lname" placeholder="Last name" type="text" value="<?php echo $u['lname'];?>">
            </div>
        </div>
        
        <div class="col-md-3">
            <label class="control-label col-md-5" for="Quotation ID"><font color="red">*</font>Payment Type</label>
            <div class="input-group">
                <select class="form-control" style="border-radius:4px;"  data-val="true" data-val-number="The field User Role must be a number." data-val-required="The User Role field is required." id="payment_type" name="payment_type">
                    <option value=""></option>
                    <option value="Refund">Cash</option>
                    <option value="Repair">Card</option>
                    <option value="Replace">Combined</option>
        
            </select>
            </div>
        </div>
         </div>
        <div class="form-group">
          <label class="control-label col-md-2" for="Quotation ID"><font color="red">*</font>Email Address</label>
        <div class="col-md-2">
            <div class="input-group">
                <input class="form-control text-box single-line" style="border-radius:4px;" data-val="true" data-val-required="The Address field is required." id="addr" name="addr" placeholder="Email Address" type="text"  value="<?php echo $u['eadd'];?>" readonly>
            </div>
        </div>
          <label class="control-label col-md-2" for="Quotation ID"><font color="red">*</font>Contact Number</label>
        <div class="col-md-2">
            <div class="input-group">
                <input class="form-control text-box single-line" style="border-radius:4px;"  data-val="true" data-val-required="The Contact field is required." id="contact" name="contact" placeholder="Contact Number" type="text" value="<?php echo $u['contact'];?>">

            </div>
        </div>
       
        
    </div>
        
        <div class="form-group">
            <label class="control-label col-md-2" for="Quotation ID"><font color="red">*</font>Receipt Number</label>
        <div class="col-md-2">
            <div class="input-group">
                <input class="form-control text-box single-line" style="border-radius:4px;"  data-val="true" data-val-required="The Contact field is required." id="receipt" name="receipt" placeholder="Receipt Number" type="text" value="">

            </div>
        </div>
         <label class="control-label col-md-2" for="Quotation ID"><font color="red">*</font>Date Purchased</label>
        <div class="col-md-2">
            <div class="input-group">
                <input class="form-control text-box single-line" style="border-radius:4px;"  data-val="true" data-val-required="The Contact field is required." id="purchased_dt" name="purchased_dt" placeholder="Date Purchased" type="date" value="">

            </div>
        </div>   
         
       <div class="col-md-3">
            <label class="control-label col-md-4" for="Quotation ID"><font color="red">*</font>Branch</label>
            <div class="input-group">
                <select class="form-control" data-val="true" style="border-radius:4px;"  data-val-number="The field User Role must be a number." data-val-required="The User Role field is required." id="branch" name="branch">
                   <?php if($this->session->userdata('role')=="Admin"){ ?>
                    <option value="Admin Home Office">Admin Home Office</option>
                    <?php }else{ ?>
                    <option value=""></option>
                    <?php }?>
                    <?php foreach ($view_branch as $row) {?>
                    <option value="<?php echo $row['branch']; ?>"><?php echo $row['branch']; ?></option>
                   <?php } ?>
            </select>
            </div>
        </div>
        
    </div>
        </span>
        </div>
   
<?php } ?>
        <hr>
    <h4>Attachments</h4>
        
        
         <div class="form-group">
         <label class="control-label col-md-3" for="Quotation ID">Select images/videos to upload:</label>
        <div class="col-md-3">
            <div class="input-group">
                <input type="file"  multiple id="file" name="file[]">
                
            </div>
        </div>
        

         </div>
    <hr>
    <h4>Item Details</h4>
    
     <div id="readroot" style="display: none">
         &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
         &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
         &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
         &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
         &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
         &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
         &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<input type="button" value="Remove item"
                onclick="this.parentNode.parentNode.removeChild(this.parentNode);counter=counter-1;" class="btn btn-danger" class="col-md-3 col-md-offset-8" />

    <div class="form-group">
        <label class="control-label col-md-2" for="Quotation ID">Item Description</label>
        <div class="col-md-2">
            <div class="input-group">
                <input class="form-control text-box single-line" style="border-radius:4px;" data-val="true" data-val-required="The Contact field is required." id="item_name" name="item_name[]" placeholder="Item Description" type="text" value="">
            </div>
        </div>
        <label class="control-label col-md-2" for="Quotation ID">Serial Number</label>
        <div class="col-md-2">
            <div class="input-group">
                <input class="form-control text-box single-line" style="border-radius:4px;" data-val="true" data-val-required="The Contact field is required." id="serial_no" name="serial_no[]" placeholder="Serial Number" type="text" value="" >
             
            </div>
        </div>   
        
            
                
      
        
        
    </div>
    <div class="form-group">
        <label class="control-label col-md-2" for="Quotation ID">Problem Description</label>
        <div class="col-md-5" >
           
                    <textarea name="problem[]"  id="problem" rows="4" cols="500"  class="form-control text-box multiplebgs" style="width:1000"></textarea>
        
            </div>
    </div>
   
   
         
    </div>
    <span id="writeroot"></span>
    <div class="form-group">
            <div class="col-md-offset-8 col-md-10">
               
                <input type="button" value="Add another item"  onclick="moreFields()" class="btn btn-success"> 
                 

            </div>
        </div>
  <hr>
        <div class="form-group">
            <div class="col-md-offset-8 col-md-10">
                
                <input type="button" value="Clear"  onclick="Clear()" class="btn btn-default"> 
                <input type="button" value="Submit" onclick="Submit()" class="btn btn-primary">
            </div>
        </div>
        
    </div>
    <input type="hidden" name="counter_val">
</form>




    </div>
<!-- START NAV -->
<?php
$this->load->view('footer');
?>
<!-- END NAV -->

</body>
</html>



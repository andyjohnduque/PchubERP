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
        document.rma.fname.value="";
        document.rma.lname.value="";
        document.rma.addr.value="";
        document.rma.contact.value="";
        document.rma.receipt.value="";
        document.rma.problem.value="";
        document.rma.item_name.value="";
        
    }
    function Submit(){
        
        if(document.rma.fname.value=="" || document.rma.lname.value==""){
            alert('Please enter name');
            return false;
        }
        if(document.rma.payment_type.value=="" ){
            alert('Please select payment type');
            return false;
        }
        if( document.rma.addr.value==""){
            alert('Please enter address');
            return false;
        }
        if( document.rma.contact.value==""){
            alert('Please enter contact number');
            return false;
        }
        if( document.rma.receipt.value==""){
            alert('Please enter receipt number');
            return false;
        }
        if(document.rma.purchased_dt.value=="" ){
            alert('Please enter date purchased');
            return false;
        }
        if(document.rma.branch.value=="" ){
            alert('Please select branch');
            return false;
        }
        
             var item_name = document.getElementsByName('item_name[]');
		for (i=2; i<item_name.length; i++)
			{
			 if (item_name[i].value == "")
				{
                                 alert('Please enter item description Item#' + (i -1))
			 	 item_name[i].style="border-color:red;";		
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
			 	 serial_no[i].style="border-color:red;";		
			 	 return false;
				}
			}
                        
        var problem = document.getElementsByName('problem[]');
		for (i=2; i<problem.length; i++)
			{
			 if (problem[i].value == "")
				{
                                 alert('Please enter problem description Item#' + (i -1))
			 	 problem[i].style="border-color:red;";		
			 	 return false;
				}
			}
        document.rma.counter_val.value=counter-1;

        var r = confirm("Are you sure you want to proceed? Note: all entries are final and that editing the RMA ticket is not possible!");
    if (r == true) {
    document.rma.submit();
  } else {
    return false;
  }    
    
    }
    function UpdateStatus(){
        if(document.rma.comments.value=="" && document.rma.comments.status=="Reject"){
            alert('Please enter rejection comments');
            return false;
        }
        if(document.rma.cur_status.value!="Created" && document.rma.appr_comment.value==""){
            alert('Please enter Update Comments');
            return false;
        }
        document.rma.action="<?php echo base_url();?>return_mgmt/update_status";
        document.rma.submit();
    }
    function Approve(a){
                                document.rma.action="<?php echo base_url();?>return_mgmt/approving?rid="+a;
                                 document.rma.submit();
                            }
                            function Reject(a){

                                document.rma.action="<?php echo base_url();?>return_mgmt/disapproving?rid="+a;
                                 document.rma.submit();
                            }
  
    function Toggle_Hide(){
        if(document.rma.status.value=="Reject"){
        
        document.getElementById("comm").style.display = "block";      
        }
        if(document.rma.status.value=="Approve1"){
            for (i = 1; i <= <?php echo count($view_rma_item);?>; i++) {
              document.getElementById("toggle_hide"+i).style.display = "block";      
            } 
        }
    }
function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
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
                            <li><a href="<?php echo base_url();?>purchasing/user_quotations">View Quotation</a></li>
                            <?php }else{ ?>
                            <li><a href="<?php echo base_url();?>purchasing/view_pending">View Quotation</a></li>
                            <?php } ?>
                        </ul>
                    </li>
                    <?php }?>
                    <?php if($this->session->userdata('role')=="Admin"){?>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            Administration
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo base_url();?>user/all_users">Users</a></li>
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
    <!--<div class="container body-content">-->
    <div class="">
         <div class="col-md-3">
  <div id="snackbar">Item warranties can only be claimed by person whose name appears on the official receipt.</div>
         </div>
        
<?php foreach ($view_rma as $row){?>
        <form action="<?php echo base_url();?>return_mgmt/save_request" method="post" name="rma" enctype="multipart/form-data">   <div class="form-horizontal">
        <h4>View return request</h4>
        <hr>
<ul class="nav nav-tabs">
    <li class="active"><a href="#">RMA Details</a></li>
    <li><a href="<?php echo base_url(); ?>return_mgmt/view_hist?rid=<?php echo $row['rid']; ?>" >History</a></li>
  </ul>

        <div class="form-group">
            <input type="hidden" name="rid" value="<?php echo $row['rid']; ?>">
            <input type="hidden" name="cur_status" value="<?php $status = $row['status']; echo $row['status']; ?>">
            
            <label class="control-label col-md-2" for="Quotation ID"><?php echo $row['rid']; ?></label> <?php if( substr($this->session->userdata('access'),strpos($this->session->userdata('access'), 'rm-')+3,1)=="Y" && $row["status"]=="Created"){?>  <label class="control-label col-sm-5" for="Quotation ID"  >Status</label><select  onchange="Toggle_Hide()" class="form-control" data-val="true"  id="payment_type" name="status">
                   <option value="<?php echo $row['status'];?>"><?php echo $row['status'];?></option>
                    <option value="Approve">Approve</option>
                    <option value="Reject">Reject</option>
            </select> <?php }else {?><label class="control-label col-md-8" for="Quotation ID"  >Status:<?php echo $row['status']; ?></label><input type="hidden" name="status" value="<?php echo $row['status']; ?>"></label><?php } ?>
      
         </div>
        <div id="comm" style="display:none">
        <div class="form-group">
            <label class="control-label col-md-4" for="Quotation ID">Comments</label>
             <div class="col-md-8" >
           
                    <textarea name="comments"  id="problem" rows="4" cols="500"  class="form-control text-box multiplebgs" style="width:1000"></textarea>
        
            </div>
        </div>
        </div>
         <div class="form-group">
         <label class="control-label col-md-2" for="Quotation ID">First name</label>
        <div class="col-md-2">
            <div class="input-group">
                <input class="form-control text-box single-line" style="border-radius:4px;" data-val="true" data-val-required="The Firstname field is required." id="fname" name="fname" placeholder="First name" type="text"  value="<?php echo $row['fname']; ?>" readonly>

            </div>
        </div>
         <label class="control-label col-md-2" for="Quotation ID">Last name</label>
        <div class="col-md-2">
            <div class="input-group">
                <input class="form-control text-box single-line" style="border-radius:4px;" data-val="true" data-val-required="The Last name field is required." id="lname" name="lname" placeholder="Last name" type="text" value="<?php echo $row['lname']; ?>" readonly>
            </div>
        </div>
        
         <div class="col-md-3">
            <label class="control-label col-md-4" for="Quotation ID">Payment Type</label>
            <div class="input-group">
                <select class="form-control" data-val="true" style="border-radius:4px;" data-val-number="The field User Role must be a number." data-val-required="The User Role field is required." id="branch" name="payment_type" readonly>
                    <option value="<?php echo $row['payment_type']; ?>"><?php echo $row['payment_type']; ?></option>
                    <option value="Refund">Cash</option>
                    <option value="Repair">Card</option>
                    <option value="Replace">Combined</option>
            </select>
            </div>
        </div> 

         </div>
        <div class="form-group">
          <label class="control-label col-md-2" for="Quotation ID">Email Address</label>
        <div class="col-md-2">
            <div class="input-group">
                <input class="form-control text-box single-line" style="border-radius:4px;" data-val="true" data-val-required="The Address field is required." id="addr" name="addr" placeholder="Email Address" type="text"  value="<?php echo $row['address']; ?>" readonly>
            </div>
        </div>
          <label class="control-label col-md-2" for="Quotation ID">Contact Number</label>
        <div class="col-md-2">
            <div class="input-group">
                <input class="form-control text-box single-line"  style="border-radius:4px;" data-val="true" data-val-required="The Contact field is required." id="contact" name="contact" placeholder="Contact Number" type="text" value="<?php echo $row['contact']; ?>" readonly>
            </div>
        </div>
       
        
    </div>
        
        <div class="form-group">
            <label class="control-label col-md-2" for="Quotation ID">Receipt Number</label>
        <div class="col-md-2">
            <div class="input-group">
                <input class="form-control text-box single-line" style="border-radius:4px;" data-val="true" data-val-required="The Contact field is required." id="receipt" name="receipt" placeholder="Receipt Number" type="text" value="<?php echo $row['receipt']; ?>" readonly>
            </div>
        </div>
         <label class="control-label col-md-2" for="Quotation ID">Date Purchased</label>
        <div class="col-md-2">
            <div class="input-group">
                <input class="form-control text-box single-line" style="border-radius:4px;" data-val="true" data-val-required="The Contact field is required." id="purchased_dt" name="purchased_dt" placeholder="Date Purchased" type="date" value="<?php echo $row['purchased_dt'];?>" readonly>
            </div>
        </div>   
         
       <div class="col-md-3">
            <label class="control-label col-md-4" for="Quotation ID">Branch</label>
            <div class="input-group">
                <select class="form-control" data-val="true" style="border-radius:4px;" data-val-number="The field User Role must be a number." data-val-required="The User Role field is required." id="branch" name="branch" readonly>
                   <option value="<?php echo $row['branch']; ?>"><?php echo $row['branch']; ?></option>
                    <?php foreach ($view_branch as $b) {?>
                    <option value="<?php echo $b['branch']; ?>"><?php echo $b['branch']; ?></option>
                   <?php } ?>
            </select>
            </div>
        </div>
        
    </div>
        <hr>
    <h4>Requestor Attachments</h4>
        
        
         <div class="form-group">
         <?php 
            $i=1;
            foreach ($view_rma_attach_r as $attach){
                if(strpos($attach['attachment'], '.jpg')>0 || strpos($attach['attachment'], '.jpeg')>0 || strpos($attach['attachment'], '.png')>0 || strpos($attach['attachment'], '.bmp')>0 ){
             echo "<a href='" . base_url() . "uploads/rma/" . $attach['attachment'] . "'><img src='" . base_url() . "uploads/rma/" . $attach['attachment'] . "' width='100'></a>";
                }else{
                   echo "<a href='" . base_url() . "uploads/rma/" . $attach['attachment'] . "'>File" . $i . "</a>";
                }
             $i++;
         }
?>
             
             
        <div class="col-md-3">
            <div class="input-group">
              
            </div>
        </div>
        

         </div>
    <h4>Approver Attachments</h4>
                 <div class="form-group">
         <?php 
            $i=1;
            foreach ($view_rma_attach_a as $attach){
                if(strpos($attach['attachment'], '.jpg')>0 || strpos($attach['attachment'], '.jpeg')>0 || strpos($attach['attachment'], '.png')>0 || strpos($attach['attachment'], '.bmp')>0 ){
                    echo "<a href='" . base_url() . "uploads/rma/" . $attach['attachment'] . "'><img src='" . base_url() . "uploads/rma/" . $attach['attachment'] . "' width='100'></a>";
                }else{
             echo "<a href='" . base_url() . "uploads/rma/" . $attach['attachment'] . "'>File" . $i . "</a>";
                }
             $i++;
         }
?>
             
             
        <div class="col-md-3">
            <div class="input-group">
              
            </div>
        </div>
        

         </div>
        <?php if( substr($this->session->userdata('access'),strpos($this->session->userdata('access'), 'rm-')+3,1)=="Y"){?>
         <div class="form-group">
         <label class="control-label col-md-3" for="Quotation ID">Select images/videos to upload:</label>
        <div class="col-md-3">
            <div class="input-group">
                <input type="file"  multiple id="file" name="file[]">
                
            </div>
        </div>
        

         </div>
        <?php } ?>
    <hr>
    <h4>Item Details</h4>
    <div id="readroot" style="display: none;">
    </div>
    <input type="hidden" name="view_rma_ct" value="<?php echo count($view_rma_item);?>">
         <?php 
         $x=0;
         foreach ($view_rma_item as $item){
             $x++;?>
     <div class="form-group">
        <label class="control-label col-md-2" for="Notes">Item Description</label>
        <div class="col-sm-2">
            <input type="text" class="form-control" placeholder="" value="<?php echo $item['item_desc']; ?>" readonly>
        </div>
        <label class="control-label col-md-1" for="Notes">Serial Number</label>
        <div class="col-sm-2">
            <input type="text" class="form-control" placeholder="" value="<?php echo $item['serial']; ?>" readonly>
        </div>
        <?php if( substr($this->session->userdata('access'),strpos($this->session->userdata('access'), 'rm-')+3,1)=="Y"){?>
        <label class="control-label col-md-1" for="Notes">Action</label>
        
            <div class="col-md-2">
            <div class="input-group">
                <select  style="float:right;border-radius:4px;"  class="form-control" data-val="true"  id="payment_type" name="actions[]">
                   <option value=""></option>
                    <option value="Replace">Replace</option>
                    <option value="Refund">Refund</option>
            </select>
            </div>
        </div>
        <?php if($item['inst_status']=="Created"){ ?>
         <div class="col-md-2">
            <div class="input-group">
                <a href="<?php echo base_url() . 'return_mgmt/instructions?rid=' . $item['rid'] . '&rno=' . $item['rno']; ?>" class="btn btn-primary">View Instruction</a> 
            </div>
        </div> 
        <?php }else{?>
        <div class="col-md-2">
            <div class="input-group">
                <a href="<?php echo base_url() . 'return_mgmt/instructions?rid=' . $item['rid'] . '&rno=' . $item['rno']; ?>" class="btn btn-danger">Create Instruction</a> 
            </div>
        </div> 
        <?php }?>
        <?php } ?>
      
    </div>
    <?php if( substr($this->session->userdata('access'),strpos($this->session->userdata('access'), 'rm-')+3,1)=="Y"){?>
    <!--<div id="toggle_hide<?php// echo $x; ?>" style="display:none;background-color: lightpink;">-->
    <div id="" >
    <div class="form-group">
        <label class="control-label col-md-2" for="Notes">SKU Code</label>
        <div class="col-sm-1">
            <input type="text" name="sku[]" class="form-control" placeholder="" value="<?php echo $item['sku']; ?>">
        </div>
        <label class="control-label col-md-1" for="Notes" >Price</label>
        <div class="col-sm-1">
            <input type="text" name="price[]" onkeypress="return isNumberKey(event)" class="form-control" placeholder="" value="<?php echo $item['price']; ?>">
        </div>
        <label class="control-label col-md-1" for="Notes" >Supplier</label>
        <div class="col-sm-2">
            <input type="text" name="supplier[]" class="form-control" placeholder="" value="<?php echo $item['supplier']; ?>">
        </div>
        <label class="control-label col-md-1" onkeypress="return isNumberKey(event)" for="Notes">Service Fee</label>
        <div class="col-sm-1">
            <input type="text" name="service_fee[]" class="form-control" placeholder="" value="<?php echo $item['service_fee']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-2"  for="Notes">Received Date</label>
        <div class="col-sm-2">
            <input type="date" class="form-control" placeholder="" name="received_date[]" value="<?php echo $item['received_date']; ?>">
        </div>
        <label class="control-label col-md-1" for="Notes">Pull-out Date</label>
        <div class="col-sm-2">
            <input type="date" class="form-control" name="po_date[]"  placeholder="" value="<?php echo $item['pull_out_date']; ?>">
        </div>
        <label class="control-label col-md-2" for="Notes">Replacement/Repair Date</label>
        <div class="col-sm-2">
            <input type="date" class="form-control" name="rr_date[]"  placeholder="" value="<?php echo $item['rr_date']; ?>">
        </div>
        
    </div>
    </div>
    <?php } ?>
    <div class="form-group">
         <div class="col-md-1">
            
        </div>
    <label class="control-label col-md-2" for="Notes">Problem description</label>
    <div class="col-md-8" >
           
                    <textarea name="problem[]"  id="problem" rows="4" cols="500"  class="form-control text-box multiplebgs" style="width:1000" readonly><?php echo $item['problem']; ?></textarea>
        
            </div>
    </div>
   <hr>
    
      
    <?php } ?>
  <hr>
 
        
    </div>
    <input type="hidden" name="counter_val">
<?php } ?>

<?php if(substr($this->session->userdata('access'),strpos($this->session->userdata('access'), 'rm-')+3,1)=="Y"  ){?>
        
         <div class="form-group">
             <?php if($status!="Created"){?>
             <label class="control-label col-md-2" for="Notes">Update comments<font color="red">*</font></label>
    <div class="col-md-5" >
            
                    <textarea name="appr_comment"  id="problem" rows="4" cols="500"  class="form-control text-box multiplebgs" style="width:1000"></textarea>
        
            </div>
             <?php } else {?><input type="hidden" name="appr_comment" value=""> <?php } ?>
            <div class="col-md-offset-10 col-md-5">
                <input type="button" value="Update" onclick="UpdateStatus()" class="btn btn-primary">
            </div>
        </div>
        <?php } ?>
    </form>
<br>
<br>
<br>
<br>
<br>
        <hr>
        <footer>
            <p>?? 2019 - PChub</p>
        </footer>
    </div>


</body>
</html>



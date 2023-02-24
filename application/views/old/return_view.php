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
          var changed_obj="";
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
                                 alert('Please enter item description Item#' + (i -1) );
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
                                 alert('Please enter serial no Item#' + (i -1));
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
        if(document.rma.comments.value=="" && document.rma.status.value=="Reject"){
            alert('Please enter rejection comments');
            return false;
        }
        
        //if(document.rma.cur_status.value!="Created" ){
        //    alert('Please enter Update Comments');
        //    return false;
        //}
        
        var actions = document.getElementsByName('actions[]');

		for (i=0; i<actions.length; i++)
			{
                            
			 if (actions[i].value == "" && document.rma.status.value=="Approved")
				{
                                 alert('Please select Action');
			 	 actions[i].style="border-color:red;";
                                 actions[i].scrollIntoView();
			 	 return false;
				}
			}
                        
               
         var item_name = document.getElementsByName('sku[]');
         
		for (i=0; i<item_name.length; i++)
			{
                   
			 if (item_name[i].value == "" && document.rma.status.value=="Approved")
				{
                                 alert('Please enter SKU on item');
			 	 item_name[i].style="border-color:red;";
                                 item_name[i].scrollIntoView();
			 	 return false;
				}
			}
          
        var price = document.getElementsByName('price[]');
  
		for (i=0; i<price.length; i++)
			{
                     
			 if (price[i].value == "" && document.rma.status.value=="Approved")
				{
                                 alert('Please enter Price on item');
			 	 price[i].style="border-color:red;";		
			 	 return false;
				}
			}
                var warranty_type = document.getElementsByName('warranty_type[]');
         
		for (i=0; i<warranty_type.length; i++)
			{
                   
			 if (warranty_type[i].value == "" && document.rma.status.value=="Approved" )
				{
                                 alert('Please select Warranty Type');
			 	 warranty_type[i].style="border-color:red;";
                                 warranty_type[i].scrollIntoView();
			 	 return false;
				}
			}
                var vendor_ini = document.getElementsByName('vendor_ini[]');
         
		for (i=0; i<vendor_ini.length; i++)
			{
                   
			 if (vendor_ini[i].value == "" && document.rma.status.value=="Approved")
				{
                                 alert('Please select Vendor Action');
			 	 vendor_ini[i].style="border-color:red;";
                                 vendor_ini[i].scrollIntoView();
			 	 return false;
				}
			}
                var vendor = document.getElementsByName('vendor[]');
         
		for (i=0; i<vendor.length; i++)
			{
                   
			 if (vendor[i].value == "" && document.rma.status.value=="Approved")
				{
                                 alert('Please Enter Vendor');
			 	 vendor[i].style="border-color:red;";
                                 vendor[i].scrollIntoView();
			 	 return false;
				}
			}
        document.rma.action="<?php echo base_url();?>return_mgmt/update_status";
        document.rma.watch.value=changed_obj;

        
        document.rma.submit();
    }
    function Watchme(obj){
        var str = changed_obj;
        var n = str.indexOf(obj);
        if(n<0){
        changed_obj=changed_obj+ ',' +obj;
        }
    }
    function UpdateComm(seq){
        if(document.rma.add_comment.value==""){
            alert('Please enter comments');
            return false;
        }
        document.rma.action="<?php echo base_url();?>return_mgmt/add_comments";
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
        }else{
            document.getElementById("comm").style.display = "none";     
        }
        if(document.rma.status.value=="Approve"){
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
.custom_btn{
padding: 1px 40%  ;
background-color: white;
  color: black;
  border: 1px solid gray; /* Green */
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
                    <?php if($this->session->userdata('role')=="Admin" || strpos($this->session->userdata('access'), 'fl-Y') !== false || strpos($this->session->userdata('access'), 'so-Y') !== false ){?>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            Sales Order
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                     
                            <li><a href="<?php echo base_url();?>sales_order/create_so">Create Sales Order</a></li>
                            <li><a href="<?php echo base_url();?>sales_order/view_all_so">View Sales Order</a></li>
                            <li><a href="<?php echo base_url();?>material/create_material">Stock Request</a></li>
                            <li><a href="<?php echo base_url();?>material/stock_requested">Stock Requested</a></li>
                            <li><a href="<?php echo base_url();?>stock_return/create_sr">Stock Return</a></li>
                            <li><a href="<?php echo base_url();?>stock_return/view_sr">Stock Returned</a></li>
                            <li><a href="<?php echo base_url();?>sales_order/view_all_material">View Stocks</a></li>
                            <li><a href="<?php echo base_url();?>inventory/view_inventory">Inventory</a></li>
                        </ul>
                    </li>
                       <?php }?>
                    <?php if($this->session->userdata('role')=="Admin" || strpos($this->session->userdata('branch'), 'Warehouse') !== false ){?>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            Materials
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                     
                            <li><a href="<?php echo base_url();?>material/pending">Pending Request</a></li>
                            <li><a href="<?php echo base_url();?>material/pending">Stock Return Request</a></li>
                            <li><a href="<?php echo base_url();?>sales_order/view_all_material">Approved Materials</a></li>
                            <li><a href="<?php echo base_url();?>sales_order/view_all_material">Returned Materials</a></li>
                            <li><a href="<?php echo base_url();?>inventory/view_inventory">Inventory</a></li>
                        </ul>
                    </li>
                       <?php }?>
                     <?php if($this->session->userdata('role')=="Admin"){?>
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
                    <?php if($this->session->userdata('role')=="Admin" || $this->session->userdata('role')=="Vendor"){?>
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
    <div class="">
         <div class="col-md-3">
  <div id="snackbar">Item warranties can only be claimed by person whose name appears on the official receipt.</div>
         </div>
     <?php   foreach ($view_rma_item as $row){
         
         $status=$row['status'];
   
         if($row['received_date']!=="" && $row['received_date']!== null ){
             $read_only="readonly";
         }else{
             $read_only="";
         }
         
     }
?>
        
<?php foreach ($view_rma as $row){?>
        <form action="<?php echo base_url();?>return_mgmt/save_request" method="post" name="rma" enctype="multipart/form-data">   <div class="form-horizontal">
        <h4>View return request</h4>
 
<ul class="nav nav-tabs">
    <li class="active"><a href="#">RMA Details</a></li>
    <?php $myseq = $row['seq'];?>
    <li><a href="<?php echo base_url(); ?>return_mgmt/view_hist?rid=<?php echo $row['rid']; ?>&seq=<?php echo $row['seq']; ?>" >History</a></li>
  </ul>

        <div class="form-group">
            <input type="hidden" name="rid" value="<?php echo $row['rid']; ?>">
            <input type="hidden" name="seq" value="<?php echo $row['seq']; ?>">
            
            <input type="hidden" name="cur_status" value="<?php  echo $status; ?>">
            <input type="hidden" name="watch" value="">
            <h4><b>Customer Entry</b></h4>
            <label class="control-label col-md-2" for="Quotation ID"><?php echo $row['rid']; ?>/<?php echo $row['seq']; ?></label> 
      
         </div>
        <div class="form-group">
            <label class="control-label col-md-2" for="Quotation ID">First name</label>
        <div class="col-md-2">
            <div class="input-group">
                <input class="form-control text-box single-line" style="border-radius:4px;" data-val="true" data-val-required="The Firstname field is required." id="fname" name="fname" placeholder="First name" type="text"  value="<?php echo $row['fname']; ?>" <?php echo $read_only; ?>>

            </div>
        </div>
         <label class="control-label col-sm-2" for="Quotation ID">Last name</label>
        <div class="col-md-2">
            <div class="input-group">
                <input class="form-control text-box single-line" style="border-radius:4px;" data-val="true" data-val-required="The Last name field is required." id="lname" name="lname" placeholder="Last name" type="text" value="<?php echo $row['lname']; ?>" <?php echo $read_only; ?>>
            </div>
        </div>
        
            <?php if( substr($this->session->userdata('access'),strpos($this->session->userdata('access'), 'rm-')+3,1)=="Y" && $status=="Created"){?>  <label class="control-label col-sm-1" for="Quotation ID"  >Status</label>
         <label class="control-label col-sm-2" for="Quotation ID">Status</label>
            <div class="col-md-2">
            <div class="input-group">   
            <select  onchange="Toggle_Hide()" class="form-control" data-val="true"  id="payment_type" name="status">
                   <option value="<?php echo $status;?>"><?php echo $status;?></option>
                    <option value="Approve">Approve</option>
                    <option value="Reject">Reject</option>
            </select></div>  </div><?php }else {?><label class="control-label col-sm-2" for="Quotation ID">Status</label><label class="control-label col-md-2" style="text-align: left;" for="Quotation ID"  ><?php echo $status; ?></label><input type="hidden" name="status" value="<?php echo $status; ?>"></label><?php } ?>
        
       
        
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
          <label class="control-label col-md-2" for="Quotation ID">Email Address</label>
        <div class="col-md-2">
            <div class="input-group">
                <input class="form-control text-box single-line" style="border-radius:4px;" data-val="true" data-val-required="The Address field is required." id="addr" name="addr" placeholder="Email Address" type="text"  value="<?php echo $row['address']; ?>" <?php echo $read_only; ?>>
            </div>
        </div>
          <label class="control-label col-md-2" for="Quotation ID">Date Purchased</label>
        <div class="col-md-2">
            <div class="input-group">
                <input class="form-control text-box single-line" style="border-radius:4px;" data-val="true" data-val-required="The Contact field is required." id="purchased_dt" name="purchased_dt" placeholder="Date Purchased" type="date" value="<?php echo $row['purchased_dt'];?>" <?php echo $read_only; ?>>
            </div>
        </div> 
          
          <label class="control-label col-md-2" for="Quotation ID">Contact Number</label>
        <div class="col-md-2">
            <div class="input-group">
                <input class="form-control text-box single-line"  style="border-radius:4px;" data-val="true" data-val-required="The Contact field is required." id="contact" name="contact" placeholder="Contact Number" type="text" value="<?php echo $row['contact']; ?>" <?php echo $read_only; ?>>
            </div>
        </div>
         </div>
        
        
        <div class="form-group">
            
            
            <label class="control-label col-md-2" for="Quotation ID">Warranty Code(Receipt no.)</label>
        <div class="col-md-2">
            <div class="input-group">
                <input class="form-control text-box single-line" style="border-radius:4px;" data-val="true" data-val-required="The Contact field is required." id="receipt" name="receipt" placeholder="Receipt Number" type="text" value="<?php echo $row['receipt']; ?>" <?php echo $read_only; ?>>
            </div>
        </div>
            <label class="control-label col-md-2" for="Quotation ID">Payment Type</label>
           <div class="col-md-2">
            
            <div class="input-group">
                <select class="form-control" data-val="true" style="border-radius:4px;" data-val-number="The field User Role must be a number." data-val-required="The User Role field is required." id="branch" name="payment_type" <?php echo $read_only; ?>>
                    <option value="<?php echo $row['payment_type']; ?>"><?php echo $row['payment_type']; ?></option>
                    <option value="Refund">Cash</option>
                    <option value="Repair">Card</option>
                    <option value="Replace">Combined</option>
            </select>
            </div>
        </div> 
          <label class="control-label col-md-2" for="Quotation ID">Branch</label>
       <div class="col-md-2">
           
            <div class="input-group">
                <select class="form-control" data-val="true" style="border-radius:4px;" data-val-number="The field User Role must be a number." data-val-required="The User Role field is required." id="branch" name="branch" <?php echo $read_only; ?>>
                   <option value="<?php echo $row['branch']; ?>"><?php echo $row['branch']; ?></option>
                    <?php if(isset($view_branch)){foreach ($view_branch as $b) {?>
                    <option value="<?php echo $b['branch']; ?>"><?php echo $b['branch']; ?></option>
                    <?php } }?>
            </select>
            </div>
        </div>
        
    </div>
        <div class="form-group">
            <?php if($read_only!=="Readonly" && $this->session->userdata('role')!=='Admin'){ ?>
            <!--<input type='button' value='Update' onclick="inp()" class="btn btn-primary" style="float: right;">-->
            <?php } ?>
            <script type="text/javascript">
                function inp(){
                    alert('inprogress');
                }
                </script>
        </div>
    
    
        
        
        <hr>
    <h5><b>Requestor Attachments</b></h5>
        
        
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
    <h5><b>Approver Attachments</b></h5>
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
    <hr style="height:3px;background-color: black;">
    <h4><b>RMA Validation</b></h4>
    <?php 
        foreach ($view_rma_item as $item){
    ?>
        <div class="form-group">
          <label class="control-label col-md-2" for="Quotation ID">Serial Number</label>
        <div class="col-md-2 ">
            <div class="input-group">
                <input class="form-control text-box single-line" style="border-radius:4px;" data-val="true" data-val-required="The Address field is required." id="addr" name="addr" placeholder="Email Address" type="text"  value="<?php echo $item['serial']; ?>" readonly>
            </div>
        </div>
          <label class="control-label col-md-2" for="Quotation ID">Item Description</label>
        <div class="col-md-2 ">
            <div class="input-group">
                <input class="form-control text-box single-line" style="border-radius:4px;" data-val="true" data-val-required="The Contact field is required." id="purchased_dt" name="purchased_dt" placeholder="Date Purchased" value="<?php echo $item['item_desc'];?>" readonly>
            </div>
        </div> 
          
          <label class="control-label col-md-2" for="Quotation ID">Service Fee</label>
        <div class="col-md-2">
            <div class="input-group">
                <input class="form-control text-box single-line"  style="border-radius:4px;" data-val="true" data-val-required="The Contact field is required." id="contact" name="service_fee[]" placeholder="" type="text" value="" onchange="Watchme('Service Fee')">
            </div>
        </div>
       
        

         </div>
    <?php 
    }?>
  
          
 <!--<hr>
 <a href='#' class='custom_btn' >Detailed&nbsp;Information</a>
 <hr>-->
 <input type="hidden" name="view_rma_ct" value="<?php echo count($view_rma_item);?>">

 <div style='<?php if($status=="Approved" && substr($this->session->userdata('access'),strpos($this->session->userdata('access'), 'rm-')+3,1)=="Y"){ echo "display: block;"; }else{ echo "display: none;"; } ?>'>
<hr style="height:3px;background-color: black;"> 
<h4><b>Item Details</b></h4>


<div class="form-group">
          <label class="control-label col-md-2" for="Quotation ID">SKU Code<font color="red">*</font></label>
        <div class="col-md-2">
            <div class="input-group">
                <input type="text" name="sku[]" style="border-radius:4px;" class="form-control" placeholder="" value="<?php echo $item['sku']; ?>" onchange="Watchme('SKU')">
            </div>
        </div>
          <label class="control-label col-md-2" for="Quotation ID">Price<font color="red">*</font></label>
        <div class="col-md-2">
            <div class="input-group">
                <input type="text" name="price[]" style="border-radius:4px;" onkeypress="return isNumberKey(event)" class="form-control" placeholder="" value="<?php echo $item['price']; ?>" onchange="Watchme('Price')">
            </div>
        </div> 
          
          <?php if(substr($this->session->userdata('access'),strpos($this->session->userdata('access'), 'rm-')+3,1)=="Y"  ){?>
         <label class="control-label col-sm-2" for="Notes">Action<font color='red'>*</font></label>
         
        <div class="col-sm-2">
            <div class="input-group">
                <select  style="float:right;border-radius:4px;"   class="form-control" data-val="true"  id="payment_type" name="actions[]" onchange="Watchme('Action')">
                   <option value="<?php echo $item['action']; ?>"><?php echo $item['sku']; ?></option>
                    <option value="Replace">Replace</option>
                    <option value="Refund">Refund</option>
            </select>
            </div>
        </div>
         <?php }?>
</div>
 
 
 
 <div class="form-group">
     <label class="control-label col-md-2" for="Notes">Received Date</label>
        <div class="col-sm-2">
            <input type="date" class="form-control" placeholder="" name="received_date[]" value="<?php echo $item['received_date']; ?>" onchange="Watchme('Received Date')">
        </div>
     <label class="control-label col-md-2" for="Notes">Pull-out Date</label>
        <div class="col-sm-2">
            <input type="date" class="form-control" name="po_date[]"  placeholder="" value="<?php echo $item['pull_out_date']; ?>" onchange="Watchme('Pullout Date')">
        </div>
     <label class="control-label col-md-2" for="Notes">Replace / Repair Date</label>
        <div class="col-sm-2">
            <input type="date" class="form-control" name="rr_date[]"  placeholder="" value="<?php echo $item['rr_date']; ?>" onchange="Watchme('Replacement/Repair Date')">
        </div>
        
    </div>

 <div class='form-group'>
     <label class="control-label col-md-2" for="Notes">Supplier<font color="red"></font></label>
     <div class="col-sm-2">
            <input type="text" name="supplier[]" class="form-control" placeholder="" value="<?php echo $item['supplier']; ?>" onchange="Watchme('Supplier')">
        </div>
     <label class="control-label col-md-2" for="Notes">Supplier Update<font color="red"></font></label>
     <div class="col-sm-2">
            <input type="text" name="supplier_update[]" class="form-control" placeholder="" value="<?php echo $item['supplier']; ?>" onchange="Watchme('Supplier Update')">
        </div>
      <label class="control-label col-md-2" for="Notes">Warranty Type<font color="red">*</font></label>
     <div class="col-md-2">
            <div class="input-group">
                <select class="form-control" data-val="true" style="border-radius:4px;"  data-val-number="The field User Role must be a number." data-val-required="The User Role field is required." id="branch" name="warranty_type[]" onchange="Watchme('Warranty Type')">
                   <option value="<?php   $item['warranty_type']; ?>"><?php echo $item['warranty_type']; ?></option>
                   <option value="Warranty">Warranty</option>
                   <option value="Out of Warranty">Out of Warranty</option>
                   <option value="Extended">Extended</option>
            </select>
            </div>
        </div>  
     </div>
 <div class='form-group'>
     <label class="control-label col-md-2 col-md-offset-0" for="Quotation ID">Vendor Action<font color='red'>*</font></label>
     <div class="col-md-2">
                <select class="form-control" data-val="true" style="border-radius:4px;"  data-val-number="The field User Role must be a number." data-val-required="The User Role field is required." id="branch" name="vendor_ini[]" onchange="Watchme('Vendor Initiated')">
                   <option value="<?php echo $item['vendor_ini']; ?>"><?php echo $item['vendor_ini']; ?></option>
                   <option value="Repair">Repair</option>
                   <option value="Refund">Refund</option>
                   <option value="Replacement">Replacement</option>
                   <option value="Vendor Initiated">Vendor Initiated</option>
            </select>
             
           
        </div>
     <label class="control-label col-md-2 col-md-offset-0" for="Quotation ID">Vendor<font color='red'>*</font></label>
        <div class="col-md-2 col-md-offset-0">
            <div class="input-group">
                <input class="form-control text-box single-line" style="border-radius:4px;" data-val="true" data-val-required="The Contact field is required." id="vendor" name="vendor[]" placeholder="Vendor" type="text" value="<?php echo $item['vendor']; ?>" onchange="Watchme('Vendor')">
             
            </div>
        </div> 
     <label class="control-label col-md-2 col-md-offset-0" for="Quotation ID">Vendor RMA<font color='red'>*</font></label>
     <div class="col-md-2 col-md-offset-0">
            <div class="input-group">
                <input class="form-control text-box single-line" style="border-radius:4px;" data-val="true" data-val-required="The Contact field is required." id="item_name" name="vendor_rma[]" placeholder="Vendor RMA" type="text" value="<?php echo $item['vendor_rma']; ?>" onchange="Watchme('Vendor RMA')">
            </div>
        </div>  
 </div>


 <div class='form-group'>
     <label class="control-label col-md-2 col-md-offset-0" for="Quotation ID">Vendor RMM<font color='red'></font></label>
     <div class="col-md-2">
            <div class="input-group">
                <input class="form-control text-box single-line" style="border-radius:4px;" data-val="true" data-val-required="The Contact field is required." id="serial_no" name="vendor_rmm[]" placeholder="Vendor RMM" type="text" value="<?php echo $item['vendor_rmm']; ?>" onchange="Watchme('Vendor RMM')">
             
            </div>
        </div>
     <label class="control-label col-md-2 col-md-offset-0" for="Quotation ID">Item Comments<font color='red'></font></label>
            <div class="col-md-2 col-md-offset-0">
            <div class="input-group">
                <input class="form-control text-box single-line" style="border-radius:4px;" data-val="true" data-val-required="The Contact field is required." id="serial_no" name="item_comm[]" placeholder="Item Comments" type="text" value="<?php echo $item['item_comm']; ?>" onchange="Watchme('Item Comments')">
             
            </div>
        </div>
      <?php if($item['inst_status']=="Created"){ ?>
         <div class="col-md-2">
            <div class="input-group">
                <a href="<?php echo base_url() . 'return_mgmt/instructions?rid=' . $item['rid'] . '&rno=' . $item['rno']; ?>" class="btn btn-success">View Instruction</a> 
            </div>
        </div> 
        <?php }else{?>
        <?php if(substr($this->session->userdata('access'),strpos($this->session->userdata('access'), 'rm-')+3,1)=="Y"  ){?>
        <div class="col-md-2">
            <div class="input-group">
                <a href="<?php echo base_url() . 'return_mgmt/instructions?rid=' . $item['rid'] . '&rno=' . $item['rno']; ?>" class="btn btn-danger">Create Instruction</a> 
            </div>
        </div> 
        <?php }?>

     <?php }?>
      </div>
 </div>
    <div id="readroot" style="display: none;">
    </div>
    
    <?php if( substr($this->session->userdata('access'),strpos($this->session->userdata('access'), 'rm-')+3,1)=="Y"){?>
     <div class="form-group">   
        <div class="col-md-offset-8 col-md-5">
                <input type="button" value="&nbsp;&nbsp;&nbsp;&nbsp;Update RMA&nbsp;&nbsp;&nbsp;&nbsp;" onclick="UpdateStatus()" class="btn btn-primary">
            </div>
     </div>
<?php } ?>

  <hr>
 
        
    </div>
    <input type="hidden" name="counter_val">
<?php } ?>


        
         <div class="form-group">
             
           
             <label class="control-label col-md-2" for="Notes">Comments</label>
    <div class="col-md-4" >
            
                    <textarea name="add_comment"  id="problem" rows="4" cols="500"  class="form-control text-box multiplebgs" style="width:1000"></textarea>
        
            </div>
             <div class="col-sm-1 col-md-offset-0">
                 <input type="hidden" value="<?php echo $myseq; ?>" name="seq">
                <input type="button" value="Add Comments" onclick="UpdateComm()" class="btn btn-default">
            </div>
             
            
        </div>

    </form>
   <br>
<br>
<br>
<br>
<br>     
<br>
<br>     
        <div class="table-responsive">     
            
                <table border="0"  class="table" style="max-width: 800px;" >
                    <tr>
                        <th width="20%">Username</th>
                        <th width="60%">Comments</th>
                        <th width="20%">Date</th>
                    </tr>
                    <?php 
                        $tr_color="seashell";
                    foreach($view_comments as $row){
                        if($tr_color=="seashell"){
                            $tr_color="whitesmoke";
                        }else{
                            $tr_color="seashell";
                        }?>
                    <tr bgcolor="<?php echo $tr_color; ?>">
                        <td><?php echo $row['username']; ?></td>
                        <td><?php echo $row['comments']?></td>
                        <td><?php echo $row['comm_date']?></td>

                    </tr>
 
                    <?php } ?>
                </table>
        
        </div>

    </div>
        <hr>
        <footer>
            <p>© 2019 - PChub</p>
        </footer>
    </div>


</body>
</html>



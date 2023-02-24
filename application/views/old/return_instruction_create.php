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
            alert('Please enter email address');
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
                var r = confirm("Are you sure you want to proceed? Note: all entries are final and editing the RMA ticket is not possible!");
    if (r == true) {
    document.rma.submit();
  } else {
    return false;
  }   
    }
   function Create_inst(){
       if(document.rma.supp_suggestion.value==""){
           alert('Please enter supplier suggestion');
           return false;
       }
       if(document.rma.cur_price.value==""){
           alert('Please enter current price');
           return false;
       }
       if(document.rma.cm_price.value==""){
           alert('Please enter credit memo price');
           return false;
       }
       document.rma.submit();
   }
function Update(){
    if(document.rma.supp_side.value=="" && document.rma.cust_side.value==""){
           alert('Please enter supplier side or customer side Memo');
           return false;
       }
       document.rma.action="<?php echo base_url();?>return_mgmt/save_memo";
       document.rma.submit();
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
<script>

</script>

</head>
<body >
  
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
         <div class="col-md-3">
  <div id="snackbar">Item warranties can only be claimed by person whose name appears on the official receipt.</div>
         </div>
        
<?php foreach ($return_inst as $item){?>
<form action="<?php echo base_url();?>return_mgmt/save_inst" method="post" name="rma" >   <div class="form-horizontal">
        <h4>RMA Instruction - <a href="<?php echo base_url();?>return_mgmt/view?rid=<?php echo $item["rid"];?>&seq=<?php echo $item["rno"];?>"><?php echo $item["rid"] . "/" . $item["rno"]?></a></h4>
        <hr>
        <input type="hidden" name="rid" value="<?php echo $item["rid"];?>">
        <input type="hidden" name="rno" value="<?php echo $item["rno"];?>">
         <div class="form-group">
         <label class="control-label col-md-2" for="Quotation ID">Customer Name</label>
        <div class="col-md-2">
            <div class="input-group">
                <input class="form-control text-box single-line" readonly data-val="true" data-val-required="The Firstname field is required." id="fname" name="fname" placeholder="First name" type="text"  value="<?php echo $item['fname'] . ' ' . $item['lname'] ?>">
               
            </div>
        </div>
         <label class="control-label col-md-2" for="Quotation ID">Item Description</label>
        <div class="col-md-2">
            <div class="input-group">
                <input class="form-control text-box single-line" readonly data-val="true" data-val-required="The Last name field is required." id="lname" name="lname" placeholder="Last name" type="text" value="<?php echo $item['item_desc']; ?>">
            </div>
        </div>
        
        <div class="col-md-3">
            <label class="control-label col-md-5" for="Quotation ID">Purchase Type</label>
            <div class="input-group">
                <input class="form-control text-box single-line" readonly data-val="true" data-val-required="The Last name field is required." id="lname" name="lname" placeholder="Last name" type="text" value="<?php echo $item['payment_type']; ?>">
            </div>
        </div>
         </div>
        <div class="form-group">
          <label class="control-label col-md-2" for="Quotation ID">Problem Description</label>
        <div class="col-md-4">
            <div class="input-group">
                <input class="form-control text-box single-line" readonly data-val="true" data-val-required="The Address field is required." id="addr" name="addr" placeholder="Email Address" type="text"  value="<?php echo $item['problem']; ?>">

            </div>
        </div>
         
       
        
    </div>
        <div class="form-group">
            <label class="control-label col-md-2" for="Notes">SKU Code</label>
            <label class="control-label col-md-2" for="Notes">Serial</label>
            <label class="control-label col-md-2" for="Notes">Supplier</label>
            <label class="control-label col-md-2" for="Notes">Service Fee</label>
            <label class="control-label col-md-2" for="Notes">Price</label>
        </div>
        <div class="form-group">
  
        <div class="col-sm-1 col-md-offset-1">
            <input type="text" name="sku[]" readonly class="form-control" placeholder="" value="<?php echo $item['sku']; ?>">
        </div>
    
        <div class="col-sm-1 col-md-offset-1">
            <input type="text" name="price[]" readonly class="form-control" placeholder="" value="<?php echo $item['price']; ?>">
        </div>
        
  
        <div class="col-sm-2 col-md-offset-1">
            <input type="text" name="supplier[]" readonly class="form-control" placeholder="" value="<?php echo $item['supplier']; ?>">
        </div>
        
    
        <div class="col-sm-1 col-md-offset-0">
            <input type="text" name="service_fee[]" readonly onkeypress="return isNumberKey(event)" class="form-control" placeholder="" value="<?php echo $item['service_fee']; ?>">
        </div>
         
        <div class="col-sm-1 col-md-offset-1">
            <input type="text" name="price[]"  readonly onkeypress="return isNumberKey(event)" class="form-control" placeholder="" value="<?php echo $item['price']; ?>">
        </div>
       
        
    </div>
        <div class="form-group">
            <label class="control-label col-md-2" for="Notes">Receipt Number</label>
            <label class="control-label col-md-2" for="Notes">Branch</label>
            <label class="control-label col-md-2" for="Notes">Purchase Date</label>
            <label class="control-label col-md-2" for="Notes">Received Date</label>
            <label class="control-label col-md-2" for="Notes">Pull-out Date</label>
        </div>
        <div class="form-group">
        <div class="col-md-2 col-md-offset-0">
            <input type="text" name="sku[]" readonly class="form-control" placeholder="" value="<?php echo $item['receipt']; ?>">
        </div>
        <div class="col-md-2  col-md-offset-0">
            <input type="text" name="price[]" readonly class="form-control" placeholder="" value="<?php echo $item['branch']; ?>">
        </div>
        <div class="col-md-2 col-md-offset-0">
            <input type="text" name="supplier[]"  readonly class="form-control" placeholder="" value="<?php echo $item['purchased_dt']; ?>">
        </div>
        <div class="col-md-2 col-md-offset-0">
            <input type="text" name="service_fee[]" readonly class="form-control" placeholder="" value="<?php echo $item['received_date']; ?>">
        </div>
        <div class="col-md-2 col-md-offset-0">
            <input type="text" name="price[]" readonly class="form-control" placeholder="" value="<?php echo $item['pull_out_date']; ?>">
        </div>
       
        
    </div>
        
        
        
        <hr>
    <h4>Actions</h4>
        <div class="form-group">
         
         <label class="control-label col-md-3" for="Notes" >Supplier Suggestion</label>
        <div class="col-sm-5">
            <input type="text" name="supp_suggestion" class="form-control" placeholder="" value="<?php echo $item['supp_suggestion']; ?>">
        </div>
       
        
    </div>
        <div class="form-group">
          <label class="control-label col-md-3" for="Notes">Current Price</label>
        <div class="col-sm-2">
            <input type="text" name="cur_price" onkeypress="return isNumberKey(event)"  class="form-control" placeholder="" value="<?php echo $item['current_price']; ?>">
        </div>
          <label class="control-label col-md-3" for="Notes" >Credit Memo Price</label>
        <div class="col-sm-2">
            <input type="text" name="cm_price" onkeypress="return isNumberKey(event)"  class="form-control" placeholder="" value="<?php echo $item['cm_price']; ?>">
        </div>
       
    </div>
  <?php if($item['inst_status']=="Created"){?>
    <hr>
        <div class="form-group">
       <label class="control-label col-md-3" for="Notes" >Supplier Side</label>
        <div class="col-sm-5">
            <input type="text" name="supp_side" class="form-control" placeholder="" value="<?php echo $item['supp_side']; ?>">
        </div>
       </div>
    <div class="form-group">
       <label class="control-label col-md-3" for="Notes" >Client Side</label>
        <div class="col-sm-5">
            <input type="text" name="cust_side" class="form-control" placeholder="" value="<?php echo $item['cust_side']; ?>">
        </div>
       </div>
    <div class="form-group">
            <div class="col-md-offset-8 col-md-10">
               
                <input type="button" value="Update Instruction"  onclick="Update()" class="btn btn-primary"> 
                 

            </div>
        </div>
        <?php } ?>
        
    <hr>
    
    
    <span id="writeroot"></span>
    <?php if($item['inst_status']!="Created"){?>
    <div class="form-group">
            <div class="col-md-offset-8 col-md-10">
               
                <input type="button" value="Create Instruction"  onclick="Create_inst()" class="btn btn-primary"> 
                 

            </div>
        </div>
 
        
    </div>
<?php }} ?>
</form>



        <hr>
        <footer>
            <p>© 2019 - PChub</p>
        </footer>
    </div>


</body>
</html>



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
                            function ViewAll(){
                                document.quotation.action="<?php echo base_url();?>purchasing/user_quotations";
                                document.quotation.submit();
                            }
                            function access_ViewAll(){
                                document.quotation.action="<?php echo base_url();?>purchasing/view_pending?S=Approved";
                                document.quotation.submit();
                            }
                            function Submit(){
                                if(document.quotation.ri.value==""){
                                    alert('Please enter requestID.');
                                    return false;
                                }
                                document.quotation.action="<?php echo base_url();?>vendor/submit_request";
                                document.quotation.submit();
                            }
                            function NewEntry(){
                                if(document.quotation.ri.value==""){
                                    alert('Please enter requestID.');
                                    return false;
                                }
                                document.quotation.action="<?php echo base_url();?>vendor/new_entry";
                                document.quotation.submit();
                            }
                            function Approve(){
                                document.quotation.action="<?php echo base_url();?>purchasing/approving";
                                 document.quotation.submit();
                            }
                            function Reject(){
                                if(document.quotation.comments.value==""){
                                    alert('Please enter comments');
                                    return false;
                                }
                                document.quotation.action="<?php echo base_url();?>purchasing/disapproving";
                                 document.quotation.submit();
                            }
                            function UpdateStatus(){
                                if(document.quotation.comments.value==""){
                                    alert('Please enter comments');
                                    return false;
                                }
                                if(document.quotation.r_nfd.checked==true){
                                    document.quotation.nfd.value="Y";
                                }else{
                                    document.quotation.nfd.value="N";
                                }
                                document.quotation.action="<?php echo base_url();?>purchasing/update_status";
                                 document.quotation.submit();
                            }
                            function check_nfd(){
                                if(document.quotation.r_nfd.checked==true){
                                    document.quotation.comments.value="No further deliveries";
                                }else{
                                    document.quotation.comments.value="";
                                }
                            }
                            function save_payment(){
                                if(document.quotation.rno.value==""){
                                    alert('Please enter receipt no.');
                                    return false;
                                }
                                if(document.quotation.pay_amt.value==""){
                                    alert('Please enter amount');
                                    return false;
                                }
                                document.quotation.action="<?php echo base_url();?>payment/update_payment";
                                document.quotation.submit();
                            }
                        </script>
</head>
<body>
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
        


<form action="" method="post" name="quotation">   <div class="form-horizontal">
   <br>     

        <h4>View Quotation</h4>
        <hr>
        <?php foreach($quotation_request as $row){?>
        <?php if($this->session->userdata('role')!="Vendor"){?>
        <div class="form-group" >
             <div class="col-md-1">
            <div class="input-group">
                <a href="<?php echo base_url();?>purchasing/view_pending?S=Pending"  class="btn btn-default">View All</a>
            </div>
        </div>
            <?php if($row["queue"] == "Pending"){?>
            <div class="col-md-3" >
            <div class="input-group">
               <input type="button" value="Approve"  onclick="Approve()" class="btn btn-primary">
            </div>
        </div>
            <div class="col-md-6">
            <div class="input-group">
               <input type="button" value="Reject"  onclick="Reject()" class="btn btn-danger">
            </div>
        </div>
            
            <?php }  ?>
        </div>
           
        
        
        
       
        <?php }else{ ?>
        <div class="form-group" >
         <div class="col-md-1">
            <div class="input-group">
               <a href="<?php echo base_url();?>purchasing/user_quotations?S=Approved"  class="btn btn-default">View All</a>
            </div>
        </div>
        </div>
        <?php }?>
        

         <div class="form-group">
        <label class="control-label col-md-2" for="Quotation ID">Quotation ID</label>
        <div class="col-md-3">
            <div class="input-group">
                <input class="form-control text-box single-line" data-val="true" data-val-required="The Quotation field is required." id="ri" name="ri" placeholder="Quotation ID" type="text" value="<?php echo $row['quotation_id'];?>">
                <span class="field-validation-valid text-danger" data-valmsg-for="ri" data-valmsg-replace="true"></span>
                <span class="input-group-addon"></span>
            </div>
        </div>
        <?php if($row['queue']=='Approved'){?>
         <label class="control-label col-md-2" for="Quotation ID">Purchase Order</label>
        <div class="col-md-3">
            <div class="input-group">
                <input class="form-control text-box single-line" data-val="true" data-val-required="The Quotation field is required." id="po_view" name="po_view" placeholder="Quotation ID" type="text" value="<?php echo $row['po'];?>">
                <input type="hidden" name="po" value="<?php echo "PO" . date('YmdHis') . substr(gettimeofday()['usec'],1,4); ?>">
                <span class="field-validation-valid text-danger" data-valmsg-for="ri" data-valmsg-replace="true"></span>
                <span class="input-group-addon"></span>
            </div>
        </div>
        <?php } ?>
    </div>
        <div class="form-group">
        <label class="control-label col-md-2" for="Quotation ID">Vendor</label>
        <div class="col-md-3">
            <div class="input-group">
                <input class="form-control text-box single-line" data-val="true" data-val-required="The Quotation field is required." id="vendor" name="vendor" placeholder="Vendor ID" type="text"  value="<?php echo $row['username'];?>">
                <span class="field-validation-valid text-danger" data-valmsg-for="vendor" data-valmsg-replace="true"></span>
                <span class="input-group-addon"></span>
            </div>
        </div>
        <label class="control-label col-md-2" for="Quotation ID">Delivery Date</label>
        <div class="col-md-3">
            <div class="input-group">
                <input class="form-control text-box single-line" data-val="true" data-val-required="The Username field is required." id="mydate" name="mydate" placeholder="" type="date" value="<?php echo $row['delivery_date'];?>">
                <span class="field-validation-valid text-danger" data-valmsg-for="Username" data-valmsg-replace="true"></span>
                <span class="input-group-addon"></i></span>
            </div>
        </div>
    </div>
        
       
        
    

        <div class="form-group">
            <label class="control-label col-md-2" for="Notes">Notes</label>
            <div class="col-md-3">
                <div class="input-group">
                    <textarea name="notes" class="form-control text-box multiplebgs" ><?php echo $row['notes'];?></textarea>
                    <span class="field-validation-valid text-danger" data-valmsg-for="ConfirmPassword" data-valmsg-replace="true"></span>
                    <span class="input-group-addon"></i></span>
                </div>
            </div>
            <?php 
            $queue=$row["queue"];
            if($this->session->userdata('role')=="Vendor"){?>
            <label class="control-label col-md-3" for="Notes">Status : <?php  echo $row["queue"];?></label>
            <?php }else{ ?>
            <label class="control-label col-md-2" for="Notes">Status</label>
            <div class="col-md-3">
                <div class="input-group">
                    <select class="form-control" data-val="true" data-val-number="The field User Role must be a number." data-val-required="The User Role field is required." id="status" name="status">
                   <option value="<?php echo $row["status"];?>"><?php echo $row["status"];?></option>
                    <option value="Purchase Order">Purchase Order</option>
                    <option value="Goods Receipt">Goods Receipt</option>
                    <option value="Invoice">Invoice</option>
                    <option value="Closed">Closed</option>
        
            </select>
                </div>
            </div>
            <?php } ?>
        </div>
        <?php if($this->session->userdata('role')!=="Vendor" && $row["queue"]== "Approved" ){?>
         <div class="form-group">
            <label class="control-label col-md-2" for="Notes">Payment Status</label>
            <div class="col-md-3">
                <div class="input-group">
                    <input class="form-control text-box single-line" data-val="true" data-val-required="The Quotation field is required." id="" name="" placeholder="Payment Status" type="text" value="<?php echo $row["payment_status"];?>">
                </div>
                </div>
            
            <label class="control-label col-md-2" for="Notes">Amount Paid</label>
            <div class="col-md-3">
                <div class="input-group">
                    <input class="form-control text-box single-line" data-val="true" data-val-required="The Quotation field is required." id="" name="" placeholder="Payment Amount" type="text" value="<?php echo $row["payment_amt"];?>">
                </div>
            </div>
         </div>
        <?php } ?>
        <?php if($row['queue']=='Approved' || $row['queue']=='NFD'){?>
        <div class="form-group">
         <label class="control-label col-md-2 col-md-offset-5" for="Quotation ID">Document Date</label>
        <div class="col-md-3">
            <div class="input-group">
                <input class="form-control text-box single-line" data-val="true" data-val-required="The Quotation field is required." id="qdate" name="qdate" placeholder="Quotation ID" type="date" value="">
                <span class="field-validation-valid text-danger" data-valmsg-for="ri" data-valmsg-replace="true"></span>
                <span class="input-group-addon"></span>
            </div>
        </div>
         
         </div>
                <div class="form-group">
                    <input type="hidden" name="nfd" value="" >
                    <label class="control-label col-md-3 col-md-offset-6" for="Quotation ID"><input class="" data-val="true" data-val-required="The Quotation field is required." id="r_nfd" name="r_nfd" onclick="check_nfd()" placeholder="Quotation ID" type="checkbox" <?php if($row['queue']=='NFD'){ echo "checked"; } ?> >  No further deliveries</label>
        <div class="col-md-3 ">

        </div>
         
         </div>
        <?php } ?>
        <?php } ?>
        <?php if($this->session->userdata('role')!="Vendor"){?>
        <div class="form-group">
        <label class="control-label col-md-6 col-md-offset-1" for="Quotation ID">Comments<font color="red">*</font></label>
        <div class="col-md-4" >
            <div class="input-group">
                <textarea name="comments" class="form-control text-box multiplebgs" style="width:500px"></textarea>
  
            </div>
        </div>
        
    </div>
        <?php } ?>
        <div class="form-group">
            <div class="col-md-offset-1 col-md-10">
                <div class="table-responsive">     
                <table border="0"  class="table">
                                                                       
                                                                        <tr>
                                                                            <th>SKU</th>
                                                                            <th>Brand</th>
                                                                            <th>Description</th>
                                                                            <th>Quantity</th>
                                                                            <th>Selling Price</th>
                                                                            <th>Total</th>
                                                                        </tr>
                                                                        <?php 
                                                                        $total=0;
                                                                        $tr_color="seashell";
                                                                        foreach($quotation_items as $row){
                                                                            
                                                                            if($tr_color=="seashell"){
                                                                            $tr_color="whitesmoke";
                                                                            }else{
                                                                                $tr_color="seashell";
                                                                            }
                                                                        
                                                                            $total=$total+ ($row['price'] * $row['req_qty']);
                                                                            ?>
                                                                        <tr bgcolor="<?php echo $tr_color; ?>">
                                                                            <td><?php echo $row['sku']?></td>
                                                                            <td><?php echo $row['brand']?></td>
                                                                            <td><?php echo $row['description']?></td>
                                                                            <td><?php echo $row['req_qty']?></td>
                                                                            <td><?php echo $row['price']?></td>
                                                                            <td><?php echo $row['req_qty'] * $row['price'];?></td>
                                                                        </tr>
                                                                        <?php } ?>
                                                                        <tr>
                                                                            <td></td>
                                                                            <td></td>
                                                                            <td></td>
                                                                            <td></td>
                                                                            <td>Total:</td>
                                                                            <td><?php echo $total;?><input type="hidden" name="total" value="<?php echo $total;?>"></td>
                                                                        </tr>
                                                                    
                                                                    </table>
                </div>
            </div>
        </div>
        <?php if($this->session->userdata('role')=="Vendor"){?>
        <?php foreach($quotation_request as $row){?>
        <?php if($row['queue']!="Approved" && $row['queue']!="Rejected" && $row['queue']!="Pending"){?>
        <div class="form-group">
            <div class="col-md-offset-1 col-md-10">
                <input type="button" value="New Entry"  onclick="NewEntry()" class="btn btn-default">
                <input type="button" value="Save"  onclick="Save()" class="btn btn-default"> 
                <input type="button" value="Submit" onclick="Submit()" class="btn btn-primary">
            </div>
        </div>
        <?php }}}else{if($queue!="Pending" && $queue!="Rejected"){?>
            <div class="form-group">
            <div class="col-md-offset-9 col-md-10">
                <input type="button" value="Update Status" onclick="UpdateStatus()" class="btn btn-primary">
            </div>
        </div>
        <?php  }} ?>
        

        <hr>
        <h4>Payment History</h4>
        <input type="hidden" name="grid" value="<?php echo "GR" . date('YmdHis') . substr(gettimeofday()['usec'],1,4); ?>">
        <?php if($this->session->userdata('role')=="Admin"){?>
         <div class="form-group">
        <label class="control-label col-md-2" for="Quotation ID">Receipt No.</label>
        <div class="col-md-3">
            <div class="input-group">
                <input class="form-control text-box single-line" data-val="true" data-val-required="The Quotation field is required." id="rno" name="rno" placeholder="Receipt no" type="text" value="">
                <span class="field-validation-valid text-danger" data-valmsg-for="ri" data-valmsg-replace="true"></span>
                <span class="input-group-addon"></span>
            </div>
        </div>
         <label class="control-label col-md-2" for="Quotation ID">Amount</label>
        <div class="col-md-3">
            <div class="input-group">
                <input class="form-control text-box single-line" data-val="true" data-val-required="The Quotation field is required." id="pay_amt" name="pay_amt" placeholder="Amount" type="text" value="<?php echo $row['po'];?>">
                <input type="hidden" name="po" value="<?php echo "PO" . date('YmdHis') . substr(gettimeofday()['usec'],1,4); ?>">
                <span class="field-validation-valid text-danger" data-valmsg-for="ri" data-valmsg-replace="true"></span>
                <span class="input-group-addon"></span>
            </div>
        </div>
    </div>
      
        <div class="form-group">
            <div class="col-md-offset-9 col-md-10">
                <input type="button" value="Save Payment" onclick="save_payment()" class="btn btn-primary">
            </div>
        </div>
          <?php } ?>
         <?php if(isset($payments)){ ?>  
<div class="form-group">
            <div class="col-md-offset-1 col-md-10">
                <div class="table-responsive">     
                <table border="0"  class="table">
                                                                       
                                                                        <tr>
                                                                            <th>GR No.</th>
                                                                            <th>Receipt No.</th>
                                                                            <th>Amount</th>
                                                                            <th>Processed By</th>
                                                                            <th>Date</th>
                                                                        </tr>
                                                                        <?php 
                                                                    
                                                                        $tr_color="seashell";
                                                                        foreach($payments as $row){
                                                                            
                                                                            if($tr_color=="seashell"){
                                                                            $tr_color="whitesmoke";
                                                                            }else{
                                                                                $tr_color="seashell";
                                                                            }
                                                                        
                                                                           
                                                                            ?>
                                                                        <tr bgcolor="<?php echo $tr_color; ?>">
                                                                            <td><?php echo $row['grid'];?></td>
                                                                            <td><?php echo $row['receipt'];?></td>
                                                                            <td><?php echo $row['pay_amt']?></td>
                                                                            <td><?php echo $row['username']?></td>
                                                                            <td><?php echo $row['pay_date']?></td>
                                                                        </tr>
                                                                        <?php } ?>
                                                                        
                                                                    
                                                                    </table>
                </div>
            </div>
        </div>
 <?php } ?>
        
<?php if(isset($quotation_hist)){ ?>  
        <hr>
        <h4>Activity logs</h4>
<div class="form-group">
            <div class="col-md-offset-1 col-md-10">
                <div class="table-responsive">     
                <table border="0"  class="table">
                                                                       
                                                                        <tr>
                                                                            <th>Approver Name</th>
                                                                            <th>Activity</th>
                                                                            <th>Comments</th>
                                                                            <th>Date</th>
                                                                        </tr>
                                                                        <?php 
                                                                    
                                                                        $tr_color="seashell";
                                                                        foreach($quotation_hist as $row){
                                                                            
                                                                            if($tr_color=="seashell"){
                                                                            $tr_color="whitesmoke";
                                                                            }else{
                                                                                $tr_color="seashell";
                                                                            }
                                                                        
                                                                           
                                                                            ?>
                                                                        <tr bgcolor="<?php echo $tr_color; ?>">
                                                                            <td><?php echo $row['username'];?></td>
                                                                            <td><?php echo $row['new_status']?></td>
                                                                            <td><?php echo $row['comments']?></td>
                                                                            <td><?php echo $row['hist_date']?></td>
                                                                        </tr>
                                                                        <?php } ?>
                                                                        
                                                                    
                                                                    </table>
                </div>
            </div>
        </div>
 <?php } ?>
    </div>
    
</form>


        <hr>
        <footer>
            <p>© 2019 - PChub</p>
        </footer>
    </div>


</body>
</html>

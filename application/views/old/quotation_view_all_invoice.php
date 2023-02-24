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
                            function Approved(){
                                document.quotation.action="<?php echo base_url();?>purchasing/approved";
                                document.approvals.submit();
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
        
    <input type="hidden" name="S" value="Pending">
        <h4>View Quotation -  <?php if($this->session->userdata('role')=="Admin"){?><?php if(count($quotation_request)>0){  if($quotation_request[0]['status']==""){ echo "Pending"; }else{ echo $quotation_request[0]['status']; }} ?><?php }?></h4>
        <hr>
         <?php if($this->session->userdata('role')=="Admin"){?>
                <ul class="nav nav-tabs">
    <li <?php if($s=="Pending"){ ?>class="active" <?php } ?>><a href="<?php echo base_url();?>purchasing/view_pending?S=Pending">Approval</a></li>
   
    <!--<li><a href="<//?php echo base_url(); ?>return_mgmt/view_hist?rid=" >Procurement</a></li>-->
    <li <?php if($s=="Approved"){ ?>class="active" <?php } ?>><a href="<?php echo base_url();?>purchasing/view_pending?S=Approved" >Orders</a></li>
    <li class="active" ><?php if($this->session->userdata('role')=="Admin"){ ?><a href="<?php echo base_url(); ?>payment/invoice">Invoicing</a><?php } ?>
    <!--<li><a href="<?//php echo base_url(); ?>return_mgmt/view_hist?rid=" >Reports</a></li>-->
  </ul>
         <?php } ?>

        <div class="form-group">
            <div class="col-md-offset-0 col-md-12">
                <div class="table-responsive">     
                <table border="0"  class="table">
                                                                      <form method="POST" action="" name="quotation">
                                                                        <tr>
                                                           
                                                                            <th>Purchase Order</th>
                                                                            <th>Vendor</th>
                                                                            <!--<th>Quantity</th>-->
                                                                            <th>Delivery Date</th>
                                                                            <th>Queue</th>
                                                                            <th>Status</th>
                                                                            <th>Payment Date</th>

                                                                        </tr>
                                                                        </form>
                                                                        <?php 
                                                                        if($this->session->userdata('role')=="Vendor"){
                                                                        $tr_color="seashell";
                                                                        foreach($quotation_request as $row){
                                                                          if($tr_color=="seashell"){
                                                                            $tr_color="whitesmoke";
                                                                            }else{
                                                                                $tr_color="seashell";
                                                                            }
                                                                            $po="";
                                                                            $ct="";
                                                                            foreach ($quotation_items as $z){
                                                                                if($row['quotation_id']==$z['quotation_id']){
                                                                                    $po=   $z['po'];
                                                                                    $ct = $z['ct'];
                                                                                }
                                                                            }
                                                                     
                                                                            ?>
                                                                        <tr bgcolor="<?php echo $tr_color; ?>">
                                                                         
                                                                            <td><a href="<?php echo base_url();?>purchasing/quotation_view?quotation_id=<?php echo $row['quotation_id'];?>"><?php echo $row['po'];?></a></td>
                                                                            <td><?php echo $row['username']?></td>
                                                                            <!--<td><?php// if($row['quotation_id']==$row['quotation_id']) { echo $z['ct']; }?></td>-->
                                                                            <td><?php echo $row['delivery_date']?></td>
                                                                            <td><?php echo $row['queue']?></td>
                                                                            <td><?php echo $row['status']?></td>
                                                                            <td><?php echo $row['pay_date']?></td>
                                                              
                                                                        </tr>
                                                                        <?php }}else{
                                                                            ?><form method="post" name="approvals" action="<?php echo base_url();?>purchasing/approved">
                                                                                <input type="hidden" name="S" value="Pending">
                                                                                <?php
                                                                            $tr_color="seashell";
                                                                            foreach($quotation_request as $row){
                                                                                if($tr_color=="seashell"){
                                                                            $tr_color="whitesmoke";
                                                                            }else{
                                                                                $tr_color="seashell";
                                                                            }
                                                                            $po="";
                                                                            $ct="";
                                                                            //foreach ($quotation_items as $z){
                                                                            //    if($row['quotation_id']==$z['quotation_id']){
                                                                            //        $po=   $z['po'];
                                                                            //        $ct = $z['ct'];
                                                                            //    }
                                                                            //}
                                                                                ?>
                                                                        <tr bgcolor="<?php echo $tr_color; ?>">
                                                                            
                                                                            <td><a href="<?php echo base_url();?>purchasing/quotation_view?quotation_id=<?php echo $row['quotation_id'];?>"><?php echo $row['po'];  ?></a></td>
                                                                            <td><?php echo $row['branch_id']?></td>
                                                                            <!--<td><?php// echo $ct;?></td>-->
                                                                            <td><?php echo $row['grid']?></td>
                                                                            <td><?php echo $row['pay_amt']?></td>
                                                                            <td><?php echo $row['payment_status']?></td>
                                                                            <td><?php echo $row['pay_date']?></td>
                                                                            
                                                                        </tr>    
                                                                            
                                                                            <?php }} ?>
                                                                        
                                                                 
                                                                        

                                                                        
                                                          
                                                                    
                                                                    </table>
                </div>
            </div>
        </div>
            <?php if($this->session->userdata('role')!="Vendor"){?> 
        <div class="form-group">
            <div class="col-md-offset-9 col-md-10">
                <input type="hidden" name="po" value="<?php echo "PO" . date('YmdHis') . substr(gettimeofday()['usec'],1,4); ?>">
                <!--<input type="button" value="Approve" onclick="Approved()" class="btn btn-primary">-->
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








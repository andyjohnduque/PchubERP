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
        function Save(){
            if(document.pricing.vendor.value==""){
                alert('Please enter Vendor');
                return false;
            }
            if(document.pricing.brand.selectedIndex == 0){
                alert('Please select branch');
                return false;
            }
            if(document.pricing.disc.value==""){
                alert('Please enter discount');
            }
            document.pricing.submit();
        }
        function Clear(){
            document.pricing.vendor.value="";
            document.pricing.brand.selectedIndex=0;
            document.pricing.disc.value="";
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
        



        <h4>Vendor Pricing Record</h4>
        <hr>
        <form action="<?php echo base_url();?>pricing/save_disc" method="post" name="pricing" >   <div class="form-horizontal">
        <?php // ?>
        <div class="form-group">
         <label class="control-label col-md-2" for="Quotation ID">Vendor/Customer</label>
        <div class="col-md-3">
            <select class="form-control text-box single-line" name="vendor">
                    <option value=""></option>
                    <?php foreach($vendor as $x){ ?>
                    <option value="<?php echo $x['userid'];?>"><?php echo $x['fname'] . " - " . $x['role'];?></option>
                    <?php } ?>
                </select>
        </div>
         </div>
        <div class="form-group">
         <label class="control-label col-md-2" for="Quotation ID">Brand</label>
        <div class="col-md-3">
            <div class="input-group">
                <select class="form-control text-box single-line" name="brand">
                    <option value=""></option>
                    <?php foreach($brand as $x){ ?>
                    <option value="<?php echo $x['brand'];?>"><?php echo $x['brand'];?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
         </div>
         <div class="form-group">
         <label class="control-label col-md-2" for="Quotation ID">Discount</label>
        <div class="col-md-3">
            <div class="input-group">
                <input class="form-control text-box single-line" style="border-radius:4px;" data-val="true"  id="disc" name="disc" placeholder="Discount" type="text"  value="">
            </div>
        </div>
         </div>
         <div class="form-group">
         
        <div class="col-md-3 col-md-offset-3">
            <div class="input-group">
                <input type="button" class="btn btn-secondary" value="Clear" onclick="Clear()">
                <input type="button" class="btn btn-primary" value="Save" onclick="Save()">
            </div>
        </div>
             
         </div>
        </form>
        <font size="1">
<form action="" method="post" name="return_man" >   <div class="form-horizontal">
     
                <div class="table-responsive">     
                <table border="0"  class="table">
                                                                      
                                                                        <tr>
                                                                       
                                                                            <th>Vendor/Customer</th>
                                                                            <th>Brand</th>
                                                                            <th>Discount%</th>
                                                                             <th>Action</th>
                                                                     
                                                                          
                                                               
                                                                        <?php 
                                                                       
                                                                        $tr_color="seashell";
                                                                        foreach($vendor_discount as $row){
                                                                          if($tr_color=="seashell"){
                                                                            $tr_color="whitesmoke";
                                                                            }else{
                                                                                $tr_color="seashell";
                                                                            }
                                                                            ?>
                                                                        
                                                                        <tr bgcolor="<?php echo $tr_color; ?>">
                                                                     
                                                                           
                                                                           
                                                                            <td><?php echo $row['fname'] . " - " . $row['role']; ?></td>
                                                                            <td><?php echo $row['brand']?></td>
                                                                            <td><?php echo $row['discount']?></td>
                                                                            <td><a href="<?php echo base_url();?>pricing/delete?r=<?php echo $row['pricing_id']?>"><img src="<?php echo base_url(); ?>img/delete.png" width="20px"></a></td>
                                                                            
                                                                         
                                                                         
                                                                   
                                                                        </tr>
                                                                       
                                                                      
                                                                            <?php } ?>
                                                                   
                                                                   
                                                                   
                                                                        
                                                                 
                                                                        

                                                                        
                                                          
                                                                    
                                                                    </table>
        
        </div>
            <?php 
            
           
            //if($this->session->userdata('rm')=="Y"){
            if(substr($this->session->userdata('access'),strpos($this->session->userdata('access'), 'rm-')+3,1)=="Y"){    
                
                ?> 
        
        <div class="form-group">
            <div class="col-md-offset-9 col-md-10">
                <!--<input type="button" value="Mass Update" id="mass_btn" onclick="mass_update(this)" class="btn btn-primary">-->
            </div>
              
        </div>
        
        <?php } ?>
        
    </div>
 
</form>
                                                                        </font>


        <hr>
        <footer>
            <p>© 2019 - PChub</p>
        </footer>
    </div>


</body>
</html>








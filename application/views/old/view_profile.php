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
                            
                            function Clear(){
                     
                                document.adduser.uname.value="";
                                document.adduser.pass.value="";
                                document.adduser.vpass.value="";
                                document.adduser.val.value="";
                                document.adduser.fname.value="";
                                document.adduser.lname.value="";
                            }
                            function Add(){
                                
                                if(document.adduser.uname.value=="" || document.adduser.pass.value=="" || document.adduser.fname.value=="" || document.adduser.lname.value=="" ){
                                    alert('Please enter all required fields');
                                    return false;
                                }
                                if (document.adduser.pass.value !== document.adduser.vpass.value){
                                    alert('Password did not match');
                                    return false;
                                }
                               if (document.adduser.role.value==""){
                                    alert('Please select a role');
                                    return false;
                                }
                                if (document.adduser.GM01.checked==false && document.adduser.GM02.checked== false && document.adduser.QC01.checked==false && document.adduser.QC02.checked==false){
                                    alert('Please select a branch');
                                    return false;
                                }
                                if (document.adduser.po.checked==false && document.adduser.gr.checked== false && document.adduser.mm.checked==false && document.adduser.vm.checked==false){
                                    alert('Please select a functionality');
                                    return false;
                                }
                                alert('Processing...');
                                document.adduser.submit();
                                
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
        <h4>Users</h4>
        <hr>
 
<?php foreach ($profile as $row){?>
                                                                <form method="POST" action="<?php echo base_url();?>user/login" name="login">
                                                                    <table border="0" width="50%">
                                                                        <tr>
                                                                            <td><img src="https://www.logolynx.com/images/logolynx/s_cb/cbd29542455b9e0cc175289ff24cecaa.jpeg" width="150"></td>
                                                                            <td>Login ID:<b><?php echo $row['userid'];?></b><br>Name:<b><?php echo $row['fname'] . ' ' . $row['lname'];?></b></td>
                                                                            <td>Valid until:<b><?php echo $row['valid_until'];?></b><br>Email: <b><?php echo $row['eadd'];?></b></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td></td>
                                                                            <td>Email Address:<b><?php echo $row['eadd'];?></b></td>
                                                                            <td></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Role:<b><?php echo $row['role'];?></b></td>
                                                                            <td align="left">Branch Assignment
                                                                                <?php echo isset($user_branch) . ""; if(isset($user_branch)){ foreach ($user_branch as $branch_row){
                                                                                    echo "<br><b>" . $branch_row['branch_id'] . " - " . $branch_row['branch'] . "</b>";
                                                                                }} ?>
                                                                            </td>
                                                                            <td align="left">Functionalities
                                                                                <br><?php if($row['purchase_order']=="Y"){ echo "<input type='checkbox' checked > <b>Purchase Order</b>"; }else{ echo "<input type='checkbox' > Purchase Order"; }?>
                                                                                <br><?php if($row['good_receipt']=="Y"){ echo "<input type='checkbox' checked> <b>Good Receipt</b>"; }else{ echo "<input type='checkbox' > Good Receipt"; }?>
                                                                                <br><?php if($row['material_master']=="Y"){ echo "<input type='checkbox' checked> <b>Material Master</b>"; }else{ echo "<input type='checkbox' > Material Master"; }?>
                                                                                <br><?php if($row['vendor_management']=="Y"){ echo "<input type='checkbox' checked> <b>Vendor Management</b>"; }else{ echo "<input type='checkbox' > Vendor Management"; }?>
                                                                                <br><?php if($row['return_mgmt']=="Y"){ echo "<input type='checkbox' checked> <b>Return Management</b>"; }else{ echo "<input type='checkbox' > Return Management"; }?>
                                                                                <br><?php  if($row['front_line']=="Y"){ echo "<input type='checkbox' checked> <b>Front Line</b>"; }else{ echo "<input type='checkbox' > Front Line"; }?>
                                                                                <br><?php  if($row['sales']=="Y"){ echo "<input type='checkbox' checked> <b>Sales</b>"; }else{ echo "<input type='checkbox' > Sales"; }?>
                                                                            </td>
                                                                        </tr>

                                                                    </table>
                                                                </form>
<?php } ?>
        <hr>
        

        

    </div>



        <hr>
        <footer>
            <p>© 2019 - PChub</p>
        </footer>
    </div>


</body>
</html>



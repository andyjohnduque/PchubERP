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
                                document.adduser.eadd.value="";
                            }
                            function Add(){
                                
                                if(document.adduser.uname.value=="" || document.adduser.pass.value=="" || document.adduser.fname.value=="" || document.adduser.lname.value=="" || document.adduser.eadd.value=="" ){
                                    alert('Please enter all required fields');  
                                    return false;
                                }
                                var str = document.adduser.eadd.value;
                                if (str.indexOf("@")<0){
                                    alert('Not a valid email');
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
                                <?php
                                $a="";
                                $b=0;
                                
                                foreach($branch as $row){
                                    $b=$b+1;
                                    if($b==1){
                                    $a=$a . " document.adduser." . $row['branch_id'] . ".checked==false";
                                    
                                    }else{
                                        $a=$a . " && document.adduser." . $row['branch_id'] . ".checked==false";
                                    }
                                }
                                
                                ?>
                                if (<?php echo $a; ?>){
                                    alert('Please select a branch');
                                    return false;
                                }
                                
                    
                                //if (document.adduser.po.checked==false && document.adduser.gr.checked== false && document.adduser.mm.checked==false && document.adduser.vm.checked==false){
                                //    alert('Please select a functionality');
                                //    return false;
                                //}
                                //alert('Processing...');
                                document.adduser.submit();
                                
                            }
                            function role_select(){
                                if(document.adduser.role.value=="Frontline"){
                                    document.adduser.fl.checked=true;
                                }else if(document.adduser.role.value=="Vendor"){
                                    document.adduser.vm.checked=true;
                                }
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
        


<form action="<?php echo base_url();?>user/save" method="post" name="adduser">   <div class="form-horizontal">
        <h4>Users</h4>
        <hr>
        <?php if(isset($msg)){echo "<div style='background-color:red;'>" . $msg . "</div>"; } ?>
        <div class="form-group">
        <label class="control-label col-md-2" for="Quotation ID">First name</label>
        <div class="col-md-3">
            <div class="input-group">
                <input class="form-control text-box single-line" data-val="true" data-val-required="The First name field is required." id="fname" name="fname" placeholder="First name" type="text"  value="">
                <span class="field-validation-valid text-danger" data-valmsg-for="vendor" data-valmsg-replace="true"></span>
                <span class="input-group-addon"></span>
            </div>
        </div>
        <label class="control-label col-md-2" for="Quotation ID">Valid Until</label>
        <div class="col-md-3">
            <div class="input-group">
                <input class="form-control text-box single-line" data-val="true" data-val-required="The Valid Until field is required." id="val" name="val" placeholder="" type="date" value="">
                <span class="field-validation-valid text-danger" data-valmsg-for="val" data-valmsg-replace="true"></span>
                <span class="input-group-addon"></i></span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-2" for="Quotation ID">Last name</label>
        <div class="col-md-3">
            <div class="input-group">
                <input class="form-control text-box single-line" data-val="true" data-val-required="The Last name field is required." id="lname" name="lname" placeholder="Last name" type="text"  value="">
                <span class="field-validation-valid text-danger" data-valmsg-for="vendor" data-valmsg-replace="true"></span>
                <span class="input-group-addon"></span>
            </div>
        </div>
        <label class="control-label col-md-2" for="Quotation ID">Temp Password</label>
        <div class="col-md-3">
            <div class="input-group">
                <input class="form-control text-box single-line" data-val="true" data-val-required="The temp password field is required." id="pass" name="pass" placeholder="" type="password" value="">
                <span class="field-validation-valid text-danger" data-valmsg-for="Username" data-valmsg-replace="true"></span>
                <span class="input-group-addon"></i></span>
            </div>
        </div>
    </div>
 <div class="form-group">
        <label class="control-label col-md-2" for="Quotation ID">Username</label>
        <div class="col-md-3">
            <div class="input-group">
                <input class="form-control text-box single-line" data-val="true" data-val-required="The username field is required." id="uname" name="uname" placeholder="Username" type="text"  value="">
                <span class="field-validation-valid text-danger" data-valmsg-for="vendor" data-valmsg-replace="true"></span>
                <span class="input-group-addon"></span>
            </div>
        </div>
        <label class="control-label col-md-2" for="Quotation ID">Verify Password</label>
        <div class="col-md-3">
            <div class="input-group">
                <input class="form-control text-box single-line" data-val="true" data-val-required="The verify password is required." id="vpass" name="vpass" placeholder="" type="password" value="">
                <span class="field-validation-valid text-danger" data-valmsg-for="Username" data-valmsg-replace="true"></span>
                <span class="input-group-addon"></i></span>
            </div>
        </div>
    </div>
         <div class="form-group">
            <label class="control-label col-md-2" for="UserRole">User Role</label>
            <div class="col-md-3">
                <select class="form-control" data-val="true" data-val-number="The field User Role must be a number." data-val-required="The User Role field is required." id="role" name="role" onchange="role_select()">
                    <option selected value="">Select a Role</option>'
                                                                                    <?php foreach ($roles as $role){
                                                                                    echo '<option value="' . $role['role_name'] . '">'. $role['role_id'] . ' - ' . $role['role_name'] . '</option>';
                                                                                    }?>
</select>
                <span class="field-validation-valid text-danger" data-valmsg-for="UserRole" data-valmsg-replace="true"></span>
            </div>
            <label class="control-label col-md-2" for="Quotation ID">Email Address</label>
        <div class="col-md-3">
            <div class="input-group">
                <input class="form-control text-box single-line" data-val="true" data-val-required="The verify password is required." id="eadd" name="eadd" placeholder="" type="text" value="">
                <span class="field-validation-valid text-danger" data-valmsg-for="Username" data-valmsg-replace="true"></span>
                <span class="input-group-addon"></i></span>
            </div>
        </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-2" for="UserRole">Contact</label>
            <div class="col-md-3">
               <input class="form-control text-box single-line" data-val="true" data-val-required="The verify password is required." id="contact" name="contact" placeholder="" type="text" value="">
                <span class="field-validation-valid text-danger" data-valmsg-for="Username" data-valmsg-replace="true"></span>

                
            </div>
            
        </div>
<div class="form-group">
        <label class="control-label col-md-2" for="Quotation ID">Branch Assignment</label>
        <div class="col-md-3">
                <?php foreach($branch as $row){?>
                      <br><input type='checkbox' name="<?php echo $row['branch_id']; ?>"><?php echo $row['branch_id']; ?> - <?php echo $row['branch']; ?>
                <?php }?>
                
            </div>
        <label class="control-label col-md-2" for="Quotation ID">Functionalities</label>
        <div class="col-md-3">
            <div class="input-group">
                <br><input type='checkbox' name="po">Purchase Order
                                                                                <br><input type='checkbox' name="gr">Good Receipt
                                                                                <br><input type='checkbox' name="mm">Material Master
                                                                                <br><input type='checkbox' name="vm">Vendor Management
                                                                                <br><input type='checkbox' name="rm">Return Management
                                                                                <br><input type='checkbox' name="fl">Front Line
                                                                                <br><input type='checkbox' name="so">Sales
            </div>
        </div>
    </div>
        <div class="form-group">
            <div class="col-md-offset-8 col-md-10">
                <input type="button" value="Clear"  onclick="Clear()" class="btn btn-default">
                <input type="button" value="Add" onclick="Add()" class="btn btn-primary">
            </div>
        </div>
        </form>
        <hr>
        <div class="form-group">
            <div class="col-md-offset-1 col-md-10">
                <div class="table-responsive">     
                <table border="0"  class="table">
                                                                       
                                                                        <tr>
                                                                            <th></th>
                                                                            <th>Login ID</th>
                                                                            <th>User Name</th>
                                                                            <th>Name</th>
                                                                            <th>Role</th>
                                                                            <th>Status</th>
                                                                            <th>Action</th>
                                                                            
                                                                        </tr>
                                                                        <?php 
                                                                        $total=0;
                                                                        $tr_color="seashell";
                                                                        foreach($users as $row){
                                                                            
                                                                            if($tr_color=="seashell"){
                                                                            $tr_color="whitesmoke";
                                                                            }else{
                                                                                $tr_color="seashell";
                                                                            }
                                                                        
                                                                            
                                                                            ?>
                                                                        <tr bgcolor="<?php echo $tr_color; ?>">
                                                                            <td><img src="https://www.logolynx.com/images/logolynx/s_cb/cbd29542455b9e0cc175289ff24cecaa.jpeg" width="30"></td>
                                                                            <td><a href="<?php echo base_url();?>user/view_profile?userid=<?php echo $row['userid'];?>"><b><?php echo $row['userid'];?></b></a></td>
                                                                            <td><a href="<?php echo base_url();?>user/view_profile?userid=<?php echo $row['userid'];?>"><b><?php echo $row['username'];?></b></a></td>
                                                                            <td><?php echo $row['fname'] . " " . $row['lname'];?></td>
                                                                            <td><?php echo $row['role']?></td>
                                                                            <td><?php if($row['status']==null || $row['status']=='Disable' ){ echo "Active"; }else{ echo $row['status']; }?></td>
                                                                            <td><?php if($row['status']==null || $row['status']=='Active' ){ echo "<a href='" . base_url() . "user/disable?userid=" . $row['userid'] . "'>Disable</a>"; }else{ echo "<a href='" . base_url() . "user/activate?userid=" . $row['userid'] . "'>Activate</a>"; }?></td>
                                                                        </tr>
                                                                        <?php } ?>
                                                                        
                                                                    
                                                                    </table>
                </div>
            </div>
        </div>

        
    </div>




        <hr>
        <footer>
            <p>© 2019 - PChub</p>
        </footer>
    </div>


</body>
</html>


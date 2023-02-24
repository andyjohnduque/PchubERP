<!DOCTYPE html>
<html style="" class=" js flexbox flexboxlegacy canvas canvastext webgl no-touch geolocation postmessage websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms no-csstransforms3d csstransitions fontface no-generatedcontent video audio localstorage sessionstorage webworkers applicationcache svg inlinesvg smil svgclippaths"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PCHub</title>
    <link href="<?php $this->load->library('session'); echo base_url();?>css/bootstrap-3.min.css" rel="stylesheet">
    <!--link href="<?php echo base_url();?>css/bootstrap-3.min.css" rel="stylesheet"-->
    <link href="<?php echo base_url();?>css/site.css" rel="stylesheet">
    <link href="<?php echo base_url();?>css/font-awesome.css" rel="stylesheet">
    <script src="<?php echo base_url();?>css/modernizr-2.8.3.js.download"></script>
    <script src="<?php echo base_url();?>css/jquery-3.3.1.js.download"></script>
    <script src="<?php echo base_url();?>css/bootstrap.js.download"></script>
    <script type="text/javascript">
    function Clear(){
        document.rma.fname.value="";
        document.rma.lname.value="";
        document.rma.addr.value="";
        document.rma.contact.value="";
        document.rma.receipt.value="";
        document.rma.serial.value="";
        document.rma.problem.value="";
        document.rma.item_name.value="";
        
    }
    function Submit(){
        if(document.rma.fname.value=="" || document.rma.lname.value==""){
            alert('Please enter name');
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
        if( document.rma.serial.value==""){
            alert('Please enter serial number');
            return false;
        }
        if( document.rma.problem.value==""){
            alert('Please enter problem description');
            return false;
        }
        if(document.rma.item_name.value==""){
            alert('Please enter Item name');
            return false;
        }
        
        document.rma.submit();
    }
    function UpdateStatus(){
        if(document.rma.comments.value==""){
            alert('Please enter comments');
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
                                if(document.rma.comments.value==""){
                                    alert('Please enter comments');
                                    return false;
                                }
                                document.rma.action="<?php echo base_url();?>return_mgmt/disapproving?rid="+a;
                                 document.rma.submit();
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
                    <?php if($this->session->userdata('role')!=null){?>
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
                    
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            Return Management
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo base_url();?>return_mgmt/return_request">Create a request</a></li>
                            <li><a href="<?php echo base_url();?>return_mgmt">View Return Management</a></li>
                        </ul>
                    </li>
                 
                    <?php if($this->session->userdata('username')==null){?>
                    <li><a href="<?php echo base_url();?>user">Login</a></li>
                    <?php }else{ ?>
                    <li><a  href="<?php echo base_url();?>user/profile"><?php echo $this->session->userdata('username');?></a></li>
                    <li><a href="<?php echo base_url();?>user/logout">Logout</a></li>
                    <?php }?>
                </ul>
            </div>
        </div>
    </div>
    <div class="container body-content">
        

<?php foreach ($view_rma as $row){?>
<form action="<?php echo base_url();?>return_mgmt/save_request" method="post" name="rma">   <div class="form-horizontal">
        <h4>Return Management</h4>
        <hr>
        
                   <?php if($row["status"] == "Created" &&  substr($this->session->userdata('access'),strpos($this->session->userdata('access'), 'rm-')+3,1)=="Y"){?>
        <div class="form-group">
            <div class="col-md-3" >
                <div class="input-group" style="float:right;">
               <input type="button" value="Approve"  onclick="Approve('<?php echo $row['rid']; ?>')" class="btn btn-primary">
            </div>
        </div>
            <div class="col-md-9">
            <div class="input-group">
               <input type="button" value="Reject"  onclick="Reject('<?php echo $row['rid']; ?>')" class="btn btn-danger">
            </div>
        </div>
            </div>
            <?php }  ?>
        
         <div class="form-group">
        <label class="control-label col-md-2" for="Quotation ID">Return ID</label>
        <div class="col-md-3">
            <div class="input-group">
                <input class="form-control text-box single-line" data-val="true" data-val-required="The Quotation field is required." id="rid" name="rid" placeholder="Return ID" type="text" value="<?php echo $row['rid']; ?>">
                <span class="field-validation-valid text-danger" data-valmsg-for="ri" data-valmsg-replace="true"></span>
                <span class="input-group-addon"></span>
            </div>
        </div>
        <label class="control-label col-md-2" for="Quotation ID">Request Type</label>
        <div class="col-md-3">
            <div class="input-group">
                <select class="form-control" data-val="true" data-val-number="The field User Role must be a number." data-val-required="The User Role field is required." id="req_type" name="req_type">
                   
                    <option value="<?php echo $row['req_type']; ?>" selected><?php echo $row['req_type']; ?></option>
                    <option value="Refund">Refund</option>
                    <option value="Repair">Repair</option>
                    <option value="Replace">Replace</option>
        
            </select>
            </div>
        </div>
    </div>
        <div class="form-group">
        <label class="control-label col-md-2" for="Quotation ID">First name</label>
        <div class="col-md-3">
            <div class="input-group">
                <input class="form-control text-box single-line" data-val="true" data-val-required="The Firstname field is required." id="fname" name="fname" placeholder="First name" type="text"  value="<?php echo $row['fname']; ?>">
                <span class="field-validation-valid text-danger" data-valmsg-for="vendor" data-valmsg-replace="true"></span>
                <span class="input-group-addon"></span>
            </div>
        </div>
        <label class="control-label col-md-2" for="Quotation ID">Last name</label>
        <div class="col-md-3">
            <div class="input-group">
                <input class="form-control text-box single-line" data-val="true" data-val-required="The Last name field is required." id="lname" name="lname" placeholder="Last name" type="text" value="<?php echo $row['lname']; ?>">
                <span class="field-validation-valid text-danger" data-valmsg-for="Username" data-valmsg-replace="true"></span>
                <span class="input-group-addon"></i></span>
            </div>
        </div>
    </div>
        <div class="form-group">
        <label class="control-label col-md-2" for="Quotation ID">Address</label>
        <div class="col-md-3">
            <div class="input-group">
                <input class="form-control text-box single-line" data-val="true" data-val-required="The Address field is required." id="addr" name="addr" placeholder="Address" type="text"  value="<?php echo $row['address']; ?>">
                <span class="field-validation-valid text-danger" data-valmsg-for="vendor" data-valmsg-replace="true"></span>
                <span class="input-group-addon"></span>
            </div>
        </div>
        <label class="control-label col-md-2" for="Quotation ID">Contact Number</label>
        <div class="col-md-3">
            <div class="input-group">
                <input class="form-control text-box single-line" data-val="true" data-val-required="The Contact field is required." id="contact" name="contact" placeholder="Contact Number" type="text" value="<?php echo $row['contact']; ?>">
                <span class="field-validation-valid text-danger" data-valmsg-for="Username" data-valmsg-replace="true"></span>
                <span class="input-group-addon"></i></span>
            </div>
        </div>
    </div>
        <div class="form-group">
        <label class="control-label col-md-2" for="Quotation ID">Receipt Number</label>
        <div class="col-md-3">
            <div class="input-group">
                <input class="form-control text-box single-line" data-val="true" data-val-required="The Receipt field is required." id="receipt" name="receipt" placeholder="Receipt number" type="text"  value="<?php echo $row['receipt']; ?>">
                <span class="field-validation-valid text-danger" data-valmsg-for="vendor" data-valmsg-replace="true"></span>
                <span class="input-group-addon"></span>
            </div>
        </div>
        <label class="control-label col-md-2" for="Quotation ID">Serial Number</label>
        <div class="col-md-3">
            <div class="input-group">
                <input class="form-control text-box single-line" data-val="true" data-val-required="The Serial field is required." id="serial" name="serial" placeholder="Serial number" type="text"  value="<?php echo $row['serial']; ?>">
                <span class="field-validation-valid text-danger" data-valmsg-for="vendor" data-valmsg-replace="true"></span>
                <span class="input-group-addon"></span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-2" for="Quotation ID">Item Category</label>
            <div class="col-md-3">
                <select class="form-control" data-val="true" data-val-number="The field User Role must be a number." data-val-required="The User Role field is required." id="category" name="category">
                    
                    <option value="<?php echo $row['category']; ?>" selected><?php echo $row['category']; ?></option>
                    <?php foreach($view_category as $x){?>
                    <option value="<?php echo $x['category'];?>"><?php echo $x['category'];?></option>
                    <?php } ?>
</select>
        </div>
        <label class="control-label col-md-2" for="Quotation ID">Brand</label>
        <div class="col-md-3">
            <select class="form-control" data-val="true" data-val-number="The field User Role must be a number." data-val-required="The User Role field is required." id="category" name="brand">
                <option value="<?php echo $row['brand'];?>" selected><?php echo $row['brand'];?></option>
                    <?php foreach($view_brand as $y){?>
                    <option value="<?php echo $y['brand'];?>"><?php echo $y['brand'];?></option>
                    <?php } ?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-2" for="Quotation ID">Item Name</label>
        <div class="col-md-3">
            <div class="input-group">
                <input class="form-control text-box single-line" data-val="true" data-val-required="The Receipt field is required." id="item_name" name="item_name" placeholder="Item Name" type="text"  value="<?php echo $row['item_name'];?>">
                <span class="field-validation-valid text-danger" data-valmsg-for="vendor" data-valmsg-replace="true"></span>
                <span class="input-group-addon"></span>
            </div>
        </div>
     <label class="control-label col-md-2" for="Quotation ID">Status</label>
        <div class="col-md-3">
            <div class="input-group">
                <?php if(substr($this->session->userdata('access'),strpos($this->session->userdata('access'), 'rm-')+3,1)=="Y"){?>
                <select class="form-control" data-val="true" data-val-number="The field User Role must be a number." data-val-required="The User Role field is required." id="status" name="status">
                    <option value="<?php echo $row['status'];?>"><?php echo $row['status'];?></option>
                     <option value="Created">Created</option>
                     <option value="Approved">Approved</option>
                     <option value="Rejected">Rejected</option>
                     <option value="For Pickup">For Pickup</option>
                     <option value="Under Repair">Under Repair</option>
                     <option value="On Hold">On Hold</option>
                     <option value="Closed">Closed</option>
                </select>
                <?php }else{ ?>
                <p class="control-label col-md-2"><?php echo $row['status'];?></p>
                <?php } ?>
            </div>
        </div>
     
    </div>
        <div class="form-group">
        
        <label class="control-label col-md-2" for="Notes">Problem description</label>
            <div class="col-md-3">
                <div class="input-group" >
                    <textarea name="problem" class="form-control text-box multiplebgs" ><?php echo $row['problem'];?></textarea>
                    
                </div>
            </div>
        
        <?php if(substr($this->session->userdata('access'),strpos($this->session->userdata('access'), 'rm-')+3,1)=="Y"){?>
        <label class="control-label col-md-2" for="Notes">Comments<font color="red">*</font></label>
            <div class="col-md-3">
                <div class="input-group" >
                    <textarea name="comments" class="form-control text-box multiplebgs" ></textarea>
                    
                </div>
            </div>
        <?php } ?>
    </div>
        <?php if(substr($this->session->userdata('access'),strpos($this->session->userdata('access'), 'rm-')+3,1)=="Y"){?>
         <div class="form-group">
            <div class="col-md-offset-8 col-md-10">
                <input type="button" value="Update Status" onclick="UpdateStatus()" class="btn btn-primary">
            </div>
        </div>
        <?php } ?>
<div class="form-group">
            <div class="col-md-offset-1 col-md-10">
                <div class="table-responsive">     
                <table border="0"  class="table">
                   
        <?php if(isset($return_mgmt_hist)){ if(count($return_mgmt_hist) > 0){?>
                    <tr>
                                                                            <th>Approver Name</th>
                                                                            <th>New Status</th>
                                                                            <th>Comments</th>
                                                                            <th>Date</th>
                                                                            
                    </tr>
            <?php $tr_color="seashell";
                    foreach($return_mgmt_hist as $row){
                                                                          if($tr_color=="seashell"){
                                                                            $tr_color="whitesmoke";
                                                                            }else{
                                                                                $tr_color="seashell";
                                                                            }
                                                                            
                                                                            
                                                                            ?>
                    <tr bgcolor="<?php echo $tr_color; ?>">
                                                                      
                                                                            <td><?php echo $row['username']?></td>
                                                                            <td><?php echo $row['new_status']?></td>
                                                                            <td><?php echo $row['comments']?></td>
                                                                            <td><?php echo $row['hist_date']?></td>
                                          
                                                                            <td></td>
                                                                        </tr>
        
        <?php }}} ?>
                </table>
                    </di</div></div>
    </div>
    </div>
        
    </div>
</form>
<?php } ?>


        <hr>
        <footer>
            <p>© 2019 - PChub</p>
        </footer>
    </div>


</body>
</html>



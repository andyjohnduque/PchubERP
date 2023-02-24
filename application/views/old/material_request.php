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
        if(document.material.ms.value==""){
            alert('Please enter requestID.');
            return false;
        }
        
        if(document.material.total.value=="0"){
            alert('Please select an item.');
            return false;
        }
        if(document.material.assbly.checked==true){
            document.material.assembly.value="Y";
        }else{
            document.material.assembly.value="N";
        }
        
        document.material.action="<?php echo base_url();?>material/submit_request";
        document.material.submit();
    }
    function NewEntry(){
        if(document.material.ms.value==""){
                alert('Please enter requestID.');
                                    return false;
                                }
                                if(document.getElementById('assbly').checked){
                                    document.material.assembly.value='Y';
                                }else{
                                    document.material.assembly.value='N';
                                }
                                document.material.action="<?php echo base_url();?>material/new_entry";
                                document.material.submit();
                            }
                            function Save(){
                                alert('Ongoing development');
                                return false;
                                if(document.quotation.ri.value==""){
                                    alert('Please enter requestID.');
                                    return false;
                                }
                                if(document.quotation.mydate.value==""){
                                    alert('Please enter Delivery Date.');
                                    return false;
                                }
                                if(document.quotation.total.value=="0"){
                                    alert('Please select an item.');
                                    return false;
                                }
                                document.quotation.action="<?php echo base_url();?>vendor/save";
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
        


<form action="" method="post" name="material">   <div class="form-horizontal">
        <h4>Material request</h4>
        <hr>
         <div class="form-group">
        <label class="control-label col-md-2" for="Quotation ID">Material Slip</label>
        <div class="col-md-3">
            <div class="input-group">
                <input class="form-control text-box single-line" data-val="true" data-val-required="The Quotation field is required." id="ms" name="ms" placeholder="" type="text" value="<?php if(isset($ms)){ echo $ms; }else { echo "MS" . date('YmdHis') . substr(gettimeofday()['usec'],1,4); } ?>">
                <span class="field-validation-valid text-danger" data-valmsg-for="ri" data-valmsg-replace="true"></span>
                <span class="input-group-addon"></span>
            </div>
        </div>
    </div>
        <div class="form-group">
        <label class="control-label col-md-2" for="Quotation ID">Requestor</label>
        <div class="col-md-3">
            <div class="input-group">
                <input class="form-control text-box single-line" data-val="true" data-val-required="The Quotation field is required." id="client" name="client" placeholder="Client Name" type="text"  value="<?php echo $this->session->userdata('username');?>">
                <span class="field-validation-valid text-danger" data-valmsg-for="vendor" data-valmsg-replace="true"></span>
                <span class="input-group-addon"></span>
            </div>
        </div>
           <label class="control-label col-md-3"><input type="checkbox" name="assbly" id="assbly" value="" style="transform: scale(1.5);">&nbsp;&nbsp;&nbsp;&nbsp;Assembly</label>
         <input type="hidden" name="assembly">
    </div>
    
    

  

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
                                                                        if(isset($quotation_items)){
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
                                                                        <?php }} ?>
                                                       
                                                               
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
        <div class="form-group">
            <div class="col-md-offset-1 col-md-10">
                <input type="button" value="Add Material"  onclick="NewEntry()" class="btn btn-default">
                <!--<input type="button" value="Save"  onclick="Save()" class="btn btn-default"> -->
                <input type="button" value="Submit" onclick="Submit()" class="btn btn-primary">
            </div>
        </div>
        
    </div>
</form>



        <hr>
        <footer>
            <p>© 2019 - PChub</p>
        </footer>
    </div>


</body>
</html>



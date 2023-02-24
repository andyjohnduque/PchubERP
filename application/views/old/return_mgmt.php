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
                                document.return_man.action="<?php echo base_url();?>return_mgmt/approved";
                                 document.return_man.submit();
                            }
                            function check_all(){
                               
                                var multi = document.getElementsByName('multi[]');
         
		for (i=0; i<multi.length; i++)
			{
                   
			 if (document.return_man.multi_check.checked == true)
				{
                                 
			 	 multi[i].checked=true;
               
				}else{
                                    multi[i].checked=false;
                                }
			}
                            document.getElementById('mass_btn').value ="Mass Update";
                     document.getElementById('hide_me').style.display="none";
                       document.getElementById('masstxt').value = "";
                            }
                            function Search(){
                                
                                 document.search.submit();
                            }
                            function SearchSet(searchSet){
                                if(searchSet=="rma"){
                                    document.search.customer.value="";
                                    document.search.datefrm.value="";
                                }else if(searchSet=="customer"){
                                    document.search.rma.value="";
                                    document.search.datefrm.value="";
                                }else if(searchSet=="datefrm"){
                                    document.search.rma.value="";
                                    document.search.customer.value="";
                                }
                            }
                            function mass_update(button){
                                var m_txt="";
                                 
                               if(button.value =="Mass Update"){
                                var multi = document.getElementsByName('multi[]');
                                var proceed=false;
                                for (i=0; i<multi.length; i++)
                            {
                   
			 if (multi[i].checked == true)
				{
                                  
                                  
                                    m_txt = m_txt + "," + multi[i].value;
                               
                                    proceed=true;
                                }
			}
                        if(proceed==false){
                            alert('Please select Item to update');
                            return false;
                        }
                        document.getElementById('hide_me').style.display="block";
                       document.getElementById('masstxt').value = m_txt;
                       button.value ="Save Update";
                   }else{
                       
                       if(document.return_man.comm.value==""){
                           alert('Please enter Comments');
                           return false;
                       }
                        document.return_man.action="<?php echo base_url();?>return_mgmt/mass_update";
                        document.return_man.submit();
                   }
                        
                            }
                         function reset_chk(){
                             document.getElementById('mass_btn').value ="Mass Update";
                     document.getElementById('hide_me').style.display="none";
                       document.getElementById('masstxt').value = "";
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
        



        <h4>Return Management</h4>
        <hr>
        <form action="<?php echo base_url();?>return_mgmt/search" method="post" name="search" >   <div class="form-horizontal">
        <?php if(substr($this->session->userdata('access'),strpos($this->session->userdata('access'), 'rm-')+3,1)=="Y"){ ?>
        <div class="form-group">
         <label class="control-label col-md-2" for="Quotation ID">Search RMA ticket</label>
        <div class="col-md-3">
            <div class="input-group">
                <input class="form-control text-box single-line" onchange="SearchSet('rma')" style="border-radius:4px;" data-val="true" data-val-required="The Firstname field is required." id="eadd" name="rma" placeholder="RMA,RMM,SKU,Branch" type="text"  value="<?php if(isset($search_crt)){ if($search_crt=="rma"){ echo $search;}}?>">
                <!--<input class="form-control text-box single-line" data-val="true" data-val-required="The Firstname field is required." id="eadd" name="eadd" placeholder="RMA,Email,Branch" type="text"  value="<?php// if(isset($eadd)){ echo $eadd;}?>">-->
          
            </div>
           
        </div>
         <div class="col-lg-2">
            <div class="input-group">
                <input class="form-control text-box single-line" onchange="SearchSet('customer')" style="border-radius:4px;" data-val="true" data-val-required="The Firstname field is required." id="eadd" name="customer" placeholder="Customer,Email" type="text"  value="<?php if(isset($search_crt)){ if($search_crt=="customer"){ echo $search;}}?>">
                <!--<input class="form-control text-box single-line" data-val="true" data-val-required="The Firstname field is required." id="eadd" name="eadd" placeholder="RMA,Email,Branch" type="text"  value="<?php// if(isset($eadd)){ echo $eadd;}?>">-->
                
            </div>
           
        </div>
         <div class="col-lg-2">
            <div class="input-group">
                <input class="form-control text-box single-line" onchange="SearchSet('datefrm')" style="border-radius:4px;" tyle="border-radius:4px;" data-val="true" data-val-required="The Firstname field is required." id="eadd" name="datefrm" placeholder="Create Date From" type="date"  value="<?php if(isset($search_crt)){ if($search_crt=="datefrm"){ echo $search;}}?>">
                <!--<input class="form-control text-box single-line" data-val="true" data-val-required="The Firstname field is required." id="eadd" name="eadd" placeholder="RMA,Email,Branch" type="text"  value="<?php// if(isset($eadd)){ echo $eadd;}?>">-->
                
            </div>
           
        </div>
         <div class="col-md-3">
            <div class="input-group">
                <input class="form-control text-box single-line" style="border-radius:4px;"  type="submit" value="search" onclick="Search()" >
             
            </div>
        </div>   

        <?php } ?>
         </div>
        </form>
        <font size="1">
<form action="" method="post" name="return_man" >   <div class="form-horizontal">
     
                <div class="table-responsive">     
                <table border="0"  class="table">
                                                                      
                                                                        <tr>
                                                                            <?php 
                                                                        if(substr($this->session->userdata('access'),strpos($this->session->userdata('access'), 'rm-')+3,1)!="Y"){?>
                                                                            
                                                                            <th>RMA</th>
                                                                            <th>Customer</th>
                                                                            <th>Email</th>
                                                                            <th>Branch</th>
                                                                            <th>Item</th>
                                                                            <th>Status</th>
                                                                            <th>Action</th>
                        
                                                                            <th>Type</th>
                                                                            <th>Date Created</th>
                                                                            <th>Date Purchased</th>
                                                                            <th>Date Received</th>
                                                                            <th>Pull Out Date</th>
                                                                            <th>Date Replaced</th>
                                                                        <?php }else{?>
                                                                            <th><input type="checkbox" name="multi_check" onclick="check_all()"></th>
                                                                            <th>RMA</th>
                                                                            <th>Customer</th>
                                                                            <th>Email</th>
                                                                            <th>Branch</th>
                                                                            <th>Item</th>
                                                                            <th>Vendor</th>
                                                                            <th>Status</th>
                                                                            <th>Action</th>
                                                                            <th>OR Number</th>
                                                                            <th>Type</th>
                                                                            <th>Days Lapsed</th>
                                                                            <th>Date Created</th>
                                                                            <th>Date Purchased</th>
                                                                            <th>Date Received</th>
                                                                            <th>Pull Out Date</th>
                                                                            <th>Date Replaced</th>
                                                                        <?php } ?>
                                                                            <?php 
                                                                        if(substr($this->session->userdata('access'),strpos($this->session->userdata('access'), 'rm-')+3,1)!="Y"){?>
                                                                            <th></th>
                                                                            <th></th>
                                                                            <?php }?>
                                                                        </tr>
                                                               
                                                                        <?php 
                                                                        if(substr($this->session->userdata('access'),strpos($this->session->userdata('access'), 'rm-')+3,1)!="Y"){
                                                                        $tr_color="seashell";
                                                                        foreach($view_all_rma as $row){
                                                                          if($tr_color=="seashell"){
                                                                            $tr_color="whitesmoke";
                                                                            }else{
                                                                                $tr_color="seashell";
                                                                            }
                                                                            ?>
                                                                        <?php if($row['req_userid'] == $this->session->userdata('userid')){?>
                                                                        <tr bgcolor="<?php echo $tr_color; ?>">
                                                                     
                                                                            <td><a href="<?php echo base_url();?>return_mgmt/view?rid=<?php echo $row['rid'];?>&seq=<?php echo $row['seq'];?>"><?php echo $row['rid'];?>/<?php echo $row['seq']; ?></a></td>
                                                                           
                                                                            <td><?php echo $row['fname'] . " " . $row['lname']; ?></td>
                                                                                <td><?php echo $row['address']?></td>
                                                                            <td><?php echo $row['branch']?></td>
                                                                            <td><?php echo $row['item_desc']?></td>
                                                                            <td><?php echo $row['status']?></td>
                                                                            <td><?php echo $row['action']?></td>
                                                                             <td><?php echo $row['payment_type']?></td>
                                                                            <td><?php echo $row['req_date']?></td>
                                                                            <td><?php echo $row['purchased_dt']?></td>
                                                                            <td><?php echo $row['received_date']?></td>
                                                                            <td><?php echo $row['pull_out_date']?></td>
                                                                            <td><?php echo $row['rr_date']?></td>
                                                                            
                                                                         
                                                                         
                                                                   
                                                                        </tr>
                                                                        <?php } ?>
                                                                        <?php }}else{
                                                                          
                                                                            ?><form method="post" name="approvals" action="<?php echo base_url();?>purchasing/approved"><?php
                                                                            $tr_color="seashell";
                                                                            foreach($view_all_rma as $row){
                                                                                if($tr_color=="seashell"){
                                                                            $tr_color="whitesmoke";
                                                                            }else{
                                                                                $tr_color="seashell";
                                                                            }
                                                                              if(strpos($this->session->userdata('branch'),$row['branch'])>0){
                                                                                ?>
                                                                        <tr bgcolor="<?php echo $tr_color; ?>">
                                                                            <td><input type="checkbox" id="multi" onclick="reset_chk()" name="multi[]" value="<?php echo $row['rid'];?>-<?php echo $row['seq']; ?>"></td>
                                                                            <td><a href="<?php echo base_url();?>return_mgmt/view?rid=<?php echo $row['rid'];?>&seq=<?php echo $row['seq']; ?>"><?php echo $row['rid']; ?>/<?php echo $row['seq']; ?></a></td>
                                                                       
                                                                            <td><?php echo $row['fname'] . " " . $row['lname'];?></td>
                                                                            <td><?php echo $row['address']?></td>
                                                                            <td><?php echo $row['branch']?></td>
                                                                            <td><?php echo $row['item_desc']?></td>
                                                                            <td><?php echo $row['vendor']?></td>
                                                                            <td><?php echo $row['status']?></td>
                                                                            <td><?php echo $row['action']?></td>
                                                                            <td><?php echo $row['receipt']?></td>
                                                                            <td><?php echo $row['payment_type']?></td>
                                                                            <td><?php if($row['rr_date']!==null && $row['pull_out_date']!==null){
                                                                                $date1 = new DateTime($row['pull_out_date']); 
                                                                                $date2 = new DateTime(date('Y-m-d')); 
                                                                                $interval = $date2->diff($date1); 
                                                                                if($interval->days>13){
                                                                                    echo "<font color='red'><b>" . $interval->days . "</b></font>"; 
                                                                                }else{
                                                                                    echo $interval->days; 
                                                                                }
                                                                                
                                                                            }elseif($row['pull_out_date']!==null && $row['received_date']!==null){
                                                                                $date1 = new DateTime($row['received_date']); 
                                                                                $date2 = new DateTime(date('Y-m-d')); 
                                                                                $interval = $date2->diff($date1); 
                                                                                if($interval->days>13){
                                                                                    echo "<font color='red'><b>" . $interval->days . "</b></font>"; 
                                                                                }else{
                                                                                    echo $interval->days; 
                                                                                }
                                                                            }elseif($row['rr_date']!==null){
                                                                                $date1 = new DateTime($row['rr_date']); 
                                                                                $date2 = new DateTime(date('Y-m-d')); 
                                                                                $interval = $date2->diff($date1); 
                                                                                if($interval->days>13){
                                                                                    echo "<font color='red'><b>" . $interval->days . "</b></font>"; 
                                                                                }else{
                                                                                    echo "<font color='gray'><b>" . $interval->days . "</b></font>"; 
                                                                                }
                                                                            }
                                                                            
                                                                            ?></td>
                                                                            <td><?php echo $row['req_date']?></td>
                                                                            <td><?php echo $row['purchased_dt']?></td>
                                                                            <td><?php echo $row['received_date']?></td>
                                                                            <td><?php echo $row['pull_out_date']?></td>
                                                                            <td><?php echo $row['rr_date']?></td>
                                                                            <?php //if($row['req_date'] == $row['received_date'] && $row['req_date'] > $row['lead_time'] && $row['date_replaced']!=null){ echo '<td><input type="checkbox" name="fa_' . $row['rid'] . '"></td>'; }else{ echo "<td></td>"; }?>
                                                                            <?php } ?>
                                                                   
                                                                        </tr>    
                                                                            
                                                                        <?php }} ?>
                                                                        
                                                                 
                                                                        

                                                                        
                                                          
                                                                    
                                                                    </table>
        
        </div>
            <?php 
            
           
            //if($this->session->userdata('rm')=="Y"){
            if(substr($this->session->userdata('access'),strpos($this->session->userdata('access'), 'rm-')+3,1)=="Y"){    
                
                ?> 
        <div id="hide_me" style="display: none;">
            <div class="form-group">
          <label class="control-label col-md-2" for="Quotation ID">Vendor RMA</label>
        <div class="col-md-2">
            <div class="input-group">
                <input class="form-control text-box single-line" style="border-radius:4px;" data-val="true" data-val-required="The Address field is required." id="addr" name="rma" placeholder="Vendor RMA" type="text"  value="" >
            </div>
        </div>
          <label class="control-label col-md-2" for="Quotation ID">Vendor RMM</label>
        <div class="col-md-2">
            <div class="input-group">
                <input class="form-control text-box single-line"  style="border-radius:4px;" data-val="true" data-val-required="The Contact field is required." id="contact" name="rmm" placeholder="Vendor RMM" type="text" value="" >
            </div>
        </div>
          
          <label class="control-label col-md-2" for="Quotation ID">Comments<font color="red">*</font></label>
        <div class="col-md-2">
            <div class="input-group">
                <input type="hidden" id="masstxt" name="masstxt" value="">
                <input class="form-control text-box single-line"  style="border-radius:4px;" data-val="true" data-val-required="The Contact field is required." id="contact" name="comm" placeholder="Comments" type="text" value="" >
            </div>
        </div>
       <label class="control-label col-md-2" for="Quotation ID">Replace Date</label>
        <div class="col-md-2">
            <div class="input-group">
                <input class="form-control text-box single-line"  style="border-radius:4px;" data-val="true" data-val-required="The Contact field is required." id="contact" name="r_date" placeholder="Replace Date" type="date" value="" >
            </div>
        </div>
       <label class="control-label col-md-2" for="Quotation ID">Pullout Date</label>
        <div class="col-md-2">
            <div class="input-group">
                <input class="form-control text-box single-line"  style="border-radius:4px;" data-val="true" data-val-required="The Contact field is required." id="contact" name="po_date" placeholder="Pullout Date" type="date" value="" >
            </div>
        </div>
       
        
    </div>
        </div>
        <div class="form-group">
            <div class="col-md-offset-9 col-md-10">
                <input type="button" value="Mass Update" id="mass_btn" onclick="mass_update(this)" class="btn btn-primary">
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








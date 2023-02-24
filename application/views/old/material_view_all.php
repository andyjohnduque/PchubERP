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
        



        <h4>Materials</h4>
        <!--<input class="btn btn-primary" style="border-radius:4px; float: right;"  type="button" value="Upload" ><br>-->
        <hr>
        

        <form action="<?php echo base_url();?>return_mgmt/search" method="post" name="search" >   <div class="form-horizontal">
        <?php // ?>
        <!--<div class="form-group">
         <label class="control-label col-md-2" for="Quotation ID">Search RMA ticket</label>
        <div class="col-md-3">
            <div class="input-group">
                <input class="form-control text-box single-line" onchange="SearchSet('rma')" style="border-radius:4px;" data-val="true" data-val-required="The Firstname field is required." id="eadd" name="rma" placeholder="RMA,RMM,SKU,Branch" type="text"  value="<?php// if(isset($search_crt)){ if($search_crt=="rma"){ echo $search;}}?>">
                <!--<input class="form-control text-box single-line" data-val="true" data-val-required="The Firstname field is required." id="eadd" name="eadd" placeholder="RMA,Email,Branch" type="text"  value="<?php// if(isset($eadd)){ echo $eadd;}?>">
          
            </div>
           
        </div>
         <div class="col-lg-2">
            <div class="input-group">
                <input class="form-control text-box single-line" onchange="SearchSet('customer')" style="border-radius:4px;" data-val="true" data-val-required="The Firstname field is required." id="eadd" name="customer" placeholder="Customer,Email" type="text"  value="<?php// if(isset($search_crt)){ if($search_crt=="customer"){ echo $search;}}?>">
                <!--<input class="form-control text-box single-line" data-val="true" data-val-required="The Firstname field is required." id="eadd" name="eadd" placeholder="RMA,Email,Branch" type="text"  value="<?php// if(isset($eadd)){ echo $eadd;}?>">
                
            </div>
           
        </div>
         <div class="col-lg-2">
            <div class="input-group">
                <input class="form-control text-box single-line" onchange="SearchSet('datefrm')" style="border-radius:4px;" tyle="border-radius:4px;" data-val="true" data-val-required="The Firstname field is required." id="eadd" name="datefrm" placeholder="Create Date From" type="date"  value="<?php// if(isset($search_crt)){ if($search_crt=="datefrm"){ echo $search;}}?>">
                <!--<input class="form-control text-box single-line" data-val="true" data-val-required="The Firstname field is required." id="eadd" name="eadd" placeholder="RMA,Email,Branch" type="text"  value="<?php// if(isset($eadd)){ echo $eadd;}?>">
                
            </div>
           
        </div>
         <div class="col-md-3">
            <div class="input-group">
                <input class="form-control text-box single-line" style="border-radius:4px;"  type="submit" value="search" onclick="Search()" >
             
            </div>
        </div>   -->

        <?php //} ?>
         </div>
            
        </form>
     
        
        <font size="1">
<form action="" method="post" name="return_man" >   <div class="form-horizontal">
     
                <div class="table-responsive">     
                <table border="0"  class="table">
                                                                      
                                                                        <tr>
                                                                       
                                                                            <th>Material Slip</th>
                                                           
                                                     
                                                                     
                                                                            <th>Total Amount</th>
                                                                            <th>Owner</th>
                        
                                                                           
                                                                           
                                                                            <th>Assembly</th>
                                                                            <th>Status</th>
                                                                            <th>Create Date</th>
                                                                          
                                                                     
                                                                          
                                                               
                                                                        <?php 
                                                                       
                                                                        $tr_color="seashell";
                                                                        foreach($am as $row){
                                                                          if($tr_color=="seashell"){
                                                                            $tr_color="whitesmoke";
                                                                            }else{
                                                                                $tr_color="seashell";
                                                                            }
                                                                            ?>
                                                                        
                                                                        <tr bgcolor="<?php echo $tr_color; ?>">
                                                                     
                                                                            <td><a href="<?php echo base_url();?>material/view_material?ms=<?php echo $row['material_slip'];?>"><?php echo $row['material_slip'];?></a></td>
                                                                           
                                                        
                                                             
                                                           
                                                                  
                                                                            <td><?php echo $row['total_payable']?></td>
                                                                            <td><?php echo $row['username']?>  - <?php echo $row['role']?></td>
                                                                             
                                                                       
                                                                            <td><?php echo $row['assembly']?></td>
                                                                            <td><?php echo $row['status']?></td>
                                                                            <td><?php echo $row['crt_date']?></td>
                                                                           
                                                                            
                                                                         
                                                                         
                                                                   
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








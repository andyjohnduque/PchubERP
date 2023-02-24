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
         var item_name = document.getElementsByName('multi[]');
		for (i=2; i<item_name.length; i++)
			{
			 item_name[i].checked;			}
                            }
                            function Search(){
                                
                                 document.search.submit();
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
                    <?php if($this->session->userdata('role')=="Admin" || $this->session->userdata('role')=="Vendor"){?>
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
                    <?php  if($this->session->userdata('username')!=''){?>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            Return Management
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo base_url();?>return_mgmt/return_request">Create a request</a></li>
                            <li><a href="<?php echo base_url();?>return_mgmt">View RMA Ticket</a></li>
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
        <form action="<?php echo base_url();?>return_mgmt/eadd" method="post" name="search" >   <div class="form-horizontal">
        <?php if(substr($this->session->userdata('access'),strpos($this->session->userdata('access'), 'rm-')+3,1)=="Y"){ ?>
        <div class="form-group">
         <label class="control-label col-md-4" for="Quotation ID">Search RMA ticket</label>
        <div class="col-lg-4">
            <div class="input-group">
                <input class="form-control text-box single-line" data-val="true" data-val-required="The Firstname field is required." id="eadd" name="eadd" placeholder="RMA,Email,Vendor RMA/RMM,SKU" type="text"  value="<?php if(isset($eadd)){ echo $eadd;}?>">
                <!--<input class="form-control text-box single-line" data-val="true" data-val-required="The Firstname field is required." id="eadd" name="eadd" placeholder="RMA,Email,Branch" type="text"  value="<?php// if(isset($eadd)){ echo $eadd;}?>">-->
                <span class="field-validation-valid text-danger" data-valmsg-for="vendor" data-valmsg-replace="true"></span>
                <span class="input-group-addon"><input  type="button" style="border-style: none;" value="search" onclick="Search()"></span>
            </div>
        </div>
        <?php } ?>
         </div>
        </form>
<form action="" method="post" name="return_man" >   <div class="form-horizontal">
     
                <div class="table-responsive">     
                <table border="0"  class="table">
                                                                      
                                                                        <tr>
                                                                           <!-- <th><input type="checkbox" onclick="check_all()"></th>-->
                                                                            <th>RMA</th>
                                                                            <th>Customer</th>
                                                                            <th>Branch</th>
                                                                            <th>Email</th>
                                                                            <th>Date Purchased</th>
                                                                            <th>Date Created</th>
                                                                            <th>Date Received</th>
                                                                            <th>Pull Out Date</th>
                                                                            <th>Date Replaced</th>
                                                                            <?php if($this->session->userdata('role')=="Vendor"){?>
                                                                            <th></th>
                                                                            <th></th>
                                                                            <?php }else{ ?>
                                                                            <th>For Action</th>
                                                                            <th>Instruction</th>
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
                                                                           <!-- <td></td>-->
                                                                            <td><a href="<?php echo base_url();?>return_mgmt/view?rid=<?php echo $row['rid'];?>"><?php echo $row['rid'];?></a></td>
                                                                           
                                                                            <td><?php echo $row['fname'] . " " . $row['lname']; ?></td>
                                                                            <td><?php echo $row['branch']?></td>
                                                                            <td><?php echo $row['address']?></td>
                                                                           
                                                                            <td><?php echo $row['purchased_dt']?></td>
                                                                            
                                                                            <td><?php echo $row['req_date']?></td>
                                                                             <?php foreach($view_rma_itm_details as $d){ ?>
                                                                            <?php if($d['rid']==$row['rid'] && $d['ct']==1){?>
                                                                            <td><?php echo $d['received_date']?></td>
                                                                            <td><?php echo $d['pull_out_date']?></td>
                                                                            <td><?php echo $d['rr_date']?></td>
                                                                            
                                                                            <?php }elseif($d['rid']==$row['rid'] && $d['ct']==2 && $d['rno']==1){ echo "<td></td><td></td><td></td>";} ?>
                                                                             <?php } ?>
                                                                         
                                                                   
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
                                                                                ?>
                                                                        <tr bgcolor="<?php echo $tr_color; ?>">
                                                                            <!--<td><input type="checkbox" id="multi" name="multi[]"></td>-->
                                                                            <td><a href="<?php echo base_url();?>return_mgmt/view?rid=<?php echo $row['rid'];?>"><?php echo $row['rid']; foreach($view_ct as $y){ if($y['rid']==$row['rid'] && $y['ct'] > 1){ echo "/" . $y['ct'];}}?></a></td>
                                                                       
                                                                            <td><?php echo $row['fname'] . " " . $row['lname'];?></td>
                                                                            <td><?php echo $row['branch']?></td>
                                                                            <td><?php echo $row['address']?></td>
                                                                            <?php foreach($view_rma_itm_details as $dd){ ?>
                                                                            <?php if($dd['rid']==$row['rid'] && $dd['ct']==1){?>
                                                                            <td>111<?php echo $row['purchased_dt']?></td>
                                                                            <?php }elseif($dd['rid']==$row['rid'] && $dd['ct']==2 && $dd['rno']==1){
                                                                               
                                                                                    echo "";
                                                                                
                                                                            }
                                                                            
                                                                            }?>
                                                                            <td><?php echo $row['req_date']?></td>
                                                                            <?php foreach($view_rma_itm_details as $d){ ?>
                                                                            <?php if($d['rid']==$row['rid'] && $d['ct']==1){?>
                                                                            <td><?php echo $d['received_date']?></td>
                                                                            <td><?php echo $d['pull_out_date']?></td>
                                                                            <td><?php echo $d['rr_date']?></td>
                                                                            <?php }elseif($d['rid']==$row['rid'] && $d['ct']==2 && $d['rno']==1){ if($d['ct']==2){ echo "<td>Multiple Date</td><td>Multiple Date</td><td>Multiple Date</td>"; }else{ echo "<td></td><td></td><td></td>"; }} ?>
                                                                             <?php } ?>
                                                                            <?php foreach($view_rma_itm_details as $d){ ?>
                                                                            <?php if($row['rid']==$d['rid']){ ?>
                                                                            <?php if($row['req_date'] == $d['received_date'] && $row['req_date'] > $row['lead_time'] && $row['date_replaced']!=null){ echo '<td><input type="checkbox" name="fa_' . $row['rid'] . '"></td>'; }else{ echo "<td></td>"; }?>
                                                                            
                                                                            <?php }} ?>
                                                                            <td><?php if($row['status']=='Created' || $row['status']=='Rejected'){
                                                                                if($row['status']=='Created'){
                                                                                ?>
                                                                                <!--<input type="checkbox" name="chk_<?php //echo $row['rid'];?>">-->
                                                                                <?php }else{?>
                                                                                <!--<input type="checkbox" name="chk_<?php// echo $row['rid'];?>" disabled>-->
                                                                            <?php }?>
                                                                               
                                                                                    <!--<?php }else{?> <!--<input type="checkbox" checked disabled > <?php } ?></td>-->
                                                                        </tr>    
                                                                            
                                                                        <?php }} ?>
                                                                        
                                                                 
                                                                        

                                                                        
                                                          
                                                                    
                                                                    </table>
        
        </div>
            <?php 
            
           
            //if($this->session->userdata('rm')=="Y"){
            if(substr($this->session->userdata('access'),strpos($this->session->userdata('access'), 'rm-')+3,1)=="Y"){    
                
                ?> 
        <div class="form-group">
            <div class="col-md-offset-9 col-md-10">
            <!--    <input type="button" value="Approve" onclick="Approved()" class="btn btn-primary">-->
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








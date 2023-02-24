	<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="img/fav.png">
		<!-- Author Meta -->
		<meta name="author" content="CodePixar">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title>PCHUB ERP</title>

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
			<!--
			CSS
			============================================= -->
			<link rel="stylesheet" href="<?php echo base_url();?>css/linearicons.css">
			<link rel="stylesheet" href="<?php echo base_url();?>css/font-awesome.min.css">
			<link rel="stylesheet" href="<?php echo base_url();?>css/jquery.DonutWidget.min.css">
			<link href="<?php echo base_url();?>css/bootstrap-3.min.css" rel="stylesheet">
			<link rel="stylesheet" href="<?php echo base_url();?>css/owl.carousel.css">
			<link rel="stylesheet" href="<?php echo base_url();?>css/main.css">
		</head>
		<body>

			<!-- Start Header Area -->
			<header class="default-header">
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
			</header>
			<!-- End Header Area -->

			<!-- start banner Area -->
			<section class="banner-area relative" id="home" data-parallax="scroll" data-image-src="img/header-bg.jpg">
				<div class="overlay-bg overlay"></div>
				<div class="container">
					<div class="row fullscreen  d-flex align-items-center justify-content-end">
						<div class="banner-content col-lg-6 col-md-12">
							<h1>
								  <br>
								PC<span>HUB</span><br>
								 <span></span>							
							</h1>
                                                    <?php if($this->session->userdata('username')==null){?>
							<a href="<?php echo base_url();?>user" class="primary-btn2 header-btn text-uppercase">Login</a>
                                                    <?php } ?>
						</div>												
					</div>
				</div>
			</section>
			<!-- End banner Area -->	

			
			<!-- start service Area-->
			<section class="service-area pt-100 pb-150" id="service">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-70 col-lg-8">
							<div class="title text-center">
                                                            <h3>Article Master</h3>
                                                            <form method="POST" action="<?php echo base_url();?>user/save" name="adduser">
                                                                    <table border="0" width="50%">
                                                                        <?php if(isset($msg)){ 
                                                                           echo "<tr><td colspan='4' color='red'>" . $msg . "</td></tr>";
                                                                        } ?>
                                                                        
                                                                        <tr>
                                                                            <td align="left"><b>SKU:</b></td>
                                                                            <td><input type="text" name="sku"></td>
                                                                            <td align="left"><b>Branch:</b></td>
                                                                                    <td><select>
                                                                                            <?php foreach($branch as $brow){?>
                                                                                            <option><?php echo $brow['branch_id'] . " - " . $brow['branch'];?></option>
                                                                                            <?php } ?>
                                                                                </select></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td align="left"><b>Description:</b></td>
                                                                            <td><input type="text" name="sku"></td>
                                                                            <td align="left"><b>                                                                <td><input type="text" name="sku"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td align="left"><b>Brand:</b></td>
                                                                            <td><input type="text" name="sku"></td>
                                                                            <td align="left"><b>Stock Price:</b></td>
                                                                            <td><input type="text" name="sku"></td>
                                                                        </tr>
                                                                        
                                                                        <tr>
                                                                            <td></td>
                                                                            <td></td>
                                                                            <td align="left"><b>MA Price:</b></td>
                                                                            <td><input type="text" name="sku"></td>
                                                                        </tr>
                                                                         <tr>
                                                                            <td align="left"><b>Serialization</b><br>
                                                                                <select >
                                                                                    <option>01 - Not Serialized</option>
                                                                                    <option>02 - Vendor Serialized</option>
                                                                                    <option>03 - Serialize Upon</option> 
                                                                                </select>
                                                                            </td>
                                                                            <td align="left"><b>Status</b><br>
                                                                                <select >
                                                                                    <option>01 - Blocked for all transactions</option>
                                                                                    <option>02 - Blocked for sale</option>
                                                                                    <option>03 - Blocked for purchase</option> 
                                                                                    <option>03 - Blocked for transfer</option> 
                                                                                </select></td>
                                                                                <td colspan="2"><input type="checkbox"><b>Version Management</b></td>
                                                                         </tr>
                                                                         
                                                                        <tr>
                                                                            
                                                                            <td colspan="4" align="right"><input type="button" class="btn-dark" onclick="Clear()" value="Clear"> &nbsp; <input type="button" class="btn-dark" value="Add" onclick="Add()"></td>
                                                                        </tr>
                                                                    </table>
                                                                </form>
								<form method="POST" action="<?php echo base_url();?>user/save" name="adduser">
                                                                     <table border="0" width="88%">
                                                                     <tr>
                                                                            <td align="right"><input type="button" value="Upload" class="badge-primary"></td>
                                                                        </tr>
                                                                     </table>
                                                                    <table border="1" width="80%">
                                                                      
                                                                        <tr>
                                                                            <th>SKU</th>
                                                                            <th>Description</th>
                                                                            <th>Group</th>
                                                                            <th>Brand</th>
                                                                            <th>Branch</th>
                                                                            <th>Price</th>
                                                                            <th>Serialized</th>
                                                                            <th>Version</th>
                                                                            <th>Status</th>
                                                                            <th></th>
                                                                        </tr>
                                                                         <?php foreach($inventory as $row){?>
                                                                        <tr>
                                                                            <td><?php echo $row['sku'];?></td>
                                                                            <td><?php echo $row['description'];?></td>
                                                                            <td><?php echo $row['itm_group'];?></td>
                                                                            <td><?php echo $row['brand'];?></td>
                                                                            <td><?php echo $row['branch'];?></td>
                                                                            <td><?php echo $row['price'];?></td>
                                                                            <td><?php echo $row['serialized'];?></td>
                                                                            <td><?php echo $row['version'];?></td>
                                                                            <td><?php echo $row['status'];?></td>
                                                                            <td><img src="<?php echo base_url();?>img/delete.png" width="15"></td>
                                                                        </tr>
                                                                         <?php } ?>
                                                                    </table>
                                                                </form>
							</div>
						</div>
					</div>	
					
				</div>	
			</section>
			<!-- end service Area-->


	

			
			<!-- start footer Area -->		
			<footer class="footer-area section-gap">
				<div class="container">
					<div class="row">
						<div class="col-lg-3  col-md-12">
							<div class="single-footer-widget">
								<h6>Top Products</h6>
								<ul class="footer-nav">
									<li><a href="#">Managed Website</a></li>
									<li><a href="#">Manage Reputation</a></li>
									<li><a href="#">Power Tools</a></li>
									<li><a href="#">Marketing Service</a></li>
								</ul>
							</div>
						</div>
						<div class="col-lg-6  col-md-12">
							<div class="single-footer-widget newsletter">
								<h6>Newsletter</h6>
								<p>Test text</p>
								<div id="mc_embed_signup">
									<form target="_blank" novalidate="true" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="form-inline">

								
										<div class="info"></div>
									</form>
								</div>		
							</div>
						</div>
									
					</div>

					<div class="row footer-bottom d-flex justify-content-between">
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            <p class="col-lg-8 col-sm-12 footer-text m-0 text-white">Copyright &copy;<script>document.write(new Date().getFullYear());</script> <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">PCHub</a></p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						
					</div>
				</div>
			</footer>
			<!-- End footer Area -->		

			<script src="js/vendor/jquery-2.2.4.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
			<script src="js/vendor/bootstrap.min.js"></script>
			<script src="js/jquery.ajaxchimp.min.js"></script>
			<script src="js/parallax.min.js"></script>			
			<script src="js/owl.carousel.min.js"></script>			
			<script src="js/jquery.sticky.js"></script>
			<script src="js/jquery.DonutWidget.min.js"></script>
			<script src="js/jquery.magnific-popup.min.js"></script>			
			<script src="js/main.js"></script>	
		</body>
	</html>
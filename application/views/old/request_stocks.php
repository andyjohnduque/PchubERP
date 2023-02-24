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
                        <script type="text/javascript">
                            function Val(){
                                if(document.ws.ws.value==""){
                                    alert('Please enter withdrawal.');
                                    return false;
                                }
                                document.ws.action="<?php echo base_url();?>inventory/new_entry";
                                document.ws.submit();
                            }
                        </script>
		</head>
		<body>

			<!-- Start Header Area -->
			<header class="default-header">
				<nav class="navbar navbar-expand-lg  navbar-light">
					<div class="container">
						  <a class="navbar-brand" href="index.html">
						  	<!--<img src="img/logo.png" alt="">-->
						  </a>
						  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						    <span class="navbar-toggler-icon"></span>
						  </button>

						  <div class="collapse navbar-collapse justify-content-end align-items-center" id="navbarSupportedContent">
						    <ul class="navbar-nav">
								<li><a href="<?php echo base_url();?>">Home</a></li>
								<?php if ($this->session->userdata('role')=="PC Hub"){?>
                                                                        <!-- Dropdown -->
							    <li class="dropdown">
							      <a class="dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
							        Inventory
							      </a>
							      <div class="dropdown-menu">
							        <a class="dropdown-item" href="generic.html">Inventory Report</a>
							        <a class="dropdown-item" href="elements.html">Cycle Count</a>
                                                                <a class="dropdown-item" href="elements.html">Cycle Count Report</a>
                                                                <a class="dropdown-item" href="elements.html">Transfer Posting</a>
                                                                
							      </div>
							    </li>
                                                                <?php } ?>
                                                            <?php if ($this->session->userdata('role')=="PC Hub"){?>
                                                            <li class="dropdown">
							      <a class="dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
							        Stocks
							      </a>
							      <div class="dropdown-menu">
							        <a class="dropdown-item" href="<?php echo base_url();?>inventory">Pending Stocks</a>
                                                                
							      </div>
							    </li>
                                                            <?php }elseif ($this->session->userdata('role')=="Vendor"){?>
                                                            <li class="dropdown">
							      <a class="dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
							        Stocks
							      </a>
							      <div class="dropdown-menu">
							        <a class="dropdown-item" href="<?php echo base_url();?>inventory/request_stocks">Request Stocks</a>
                                                                
							      </div>
							    </li>
                                                            <?php } ?>
								<li><a href="<?php echo base_url();?>user/all_users">Users</a></li>
                                                                <?php if($this->session->userdata('username')!=null){?>
                                                                    <li><a href="<?php echo base_url();?>user/profile"><?php echo $this->session->userdata('username');?></a></li>
                                                                    <li><a href="<?php echo base_url();?>user/logout">Logout</a></li>
                                                                <?php }else{?>
                                                                    <li><a href="<?php echo base_url();?>user">Login</a></li>
                                                                <?php }?>
							   									
						    </ul>
						  </div>						
					</div>
				</nav>
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
                                                            <form method="POST" action="" name="ws">
                                                            <table width="80%">
                                                                <tr>
                                                                    <td>Withdrawal:</td><td><input type="text" name="ws"></td>
                                                                    <td>Branch:</td>
                                                                    <td>
                                                                        <select><?php foreach($branch as $row){?><option value="<?php echo $row['branch_id']?>"><?php echo $row['branch_id']?></option><?php } ?></select>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td></td>
                                                                    </td><td>
                                                                    <td>Date:</td><td><input type="date" name="mydate"></td>
                                                                </tr>
                                                            </table>
                                                             <br>
								
                                                                    <table border="0" width="80%">
                                                                       
                                                                        <tr>
                                                                            <th>SKU</th>
                                                                            <th>Brand</th>
                                                                            <th>Description</th>
                                                                            <th>Quantity</th>
                                                                            <th>Selling Price</th>
                                                                            <th>Total</th>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><input type="button" value="New Entry" onclick="Val()" class="btn-dark"></td>
                                                                            <td></td>
                                                                            <td></td>
                                                                            <td></td>
                                                                            <td></td>
                                                                            <td><input type="button" value="Save"  class="btn-dark"> <input type="button" value="Next" class="btn-dark"></td>
                                                                        </tr>
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
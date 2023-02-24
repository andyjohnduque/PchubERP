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
    <script src="https://kit.fontawesome.com/7dc3015a44.js" crossorigin="anonymous"></script>
    <script type="text/javascript">
        function Quotation(){
            document.user.action="<?php echo base_url();?>purchasing/quotation";
            document.user.submit();
        }
        function ViewApprovals(){
            document.user.action="<?php echo base_url();?>purchasing/view_pending?S=Pending";
            document.user.submit();
        }
        function UploadArticle(){
            alert('This is still ongoing development');
            return false;
        }
        function AddBulletin(){
            document.user.action="<?php echo base_url();?>bulletin/crt_msg";
            document.user.submit();
        }
    </script>
  
</head>
<body>
<!-- START NAV -->
<?php
$this->load->view('menu');
?>
<!-- END NAV -->
    <div class="container body-content">
        


<h2>PCHub</h2>

<hr>
<?php if($this->session->userdata('username')!=null){?>
<p>Hello, <b><?php echo $this->session->userdata('username'); ?></b> </p>
<?php }?>

<form action="" name="user" method="post"><input name="__RequestVerificationToken" type="hidden" value="5zevPLhOb2buYSwaoWTOsRlnxoukFkHye1KLwhuFAsnbxP_1fDFra60MUeAMOQ2lYeAdzHzZkMzH0QjZGI36Zt6x32UScuInqglrDKHg-hE1">    <div class="form-horizontal">
<?php if ($this->session->userdata('role')=="Vendor"){?>
    <div class="form-group">
            <div class="col-md-offset-2 col-md-10">
                <input type="button" onclick="UploadArticle()" value="Upload Article Master" class="btn btn-default">
            </div>
            <div class="col-md-offset-2 col-md-10">
                <input type="button" onclick="Quotation()" value="Create Quotation" class="btn btn-primary">
            </div>
    </div>
<?php }elseif($this->session->userdata('role')=="Admin" || substr($this->session->userdata('access'),strpos($this->session->userdata('access'), 'po-')+3,1)=="Y" ){ ?>
    <div class="form-group">
            <div class="col-md-offset-2 col-md-10">
                <a   class="btn btn-default" href="<?php echo base_url();?>bulletin/crt_msg">Add Bulletin</a>&nbsp;<input type="button" onclick="ViewApprovals()" value="View Approvals" class="btn btn-primary">
            </div>
        
    </div>
<?php } ?>
</form>
<!--
<?php if(isset($bulletin)){
    
foreach($bulletin as $x){
?>
<div class="col-sm-6 col-md-6 col-md-offset-6">
            <div class="alert alert-info">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                    ×</button>
                <span class="glyphicon glyphicon-info-sign"></span> <strong><?php echo $x['title'];?></strong>
                <hr class="message-inner-separator">
                <p><?php echo $x['msg'];?></p>
            </div>
        </div>
<?php }} ?>
-->

        <hr>

    </div>
  </div>
<br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br>
<!-- START Footer -->
<?php
$this->load->view('footer');
?>
<!-- END Footer -->

</body>
</html>


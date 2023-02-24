<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PCHub</title>
    <link rel="stylesheet" href="<?php echo base_url();?>css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
  </head>
  <body>
      
<nav class="navbar is-dark" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item" href="<?php echo base_url();?>">
        <h1>PCHub</h1>
    </a>

    <a role="button" class="navbar-burger burger" onclick="document.querySelector('.navbar-menu').classList.toggle('is-active');" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>

  <div id="navbarBasicExample" class="navbar-menu">
    <div class="navbar-start">
      <a class="navbar-item" href="<?php echo base_url();?>">Home</a>
      <?php if($this->session->userdata('role')=="Admin" || $this->session->userdata('role')=="Vendor"){?>
      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link is-arrowless">Quotation</a>
        <div class="navbar-dropdown">
          <?php if ($this->session->userdata('role')=="Vendor"){?>
          <a class="navbar-item" href="<?php echo base_url();?>purchasing/quotation">Create Quotation</a>
          <a class="navbar-item" href="<?php echo base_url();?>purchasing/user_quotations?S=Pending">View Quotation</a>
          <?php }else{ ?>
          <a class="navbar-item" href="<?php echo base_url();?>purchasing/view_pending?S=Pending">View Quotation</a>
          <?php }?>
        </div>
      </div>
      <?php } ?>
      <?php if($this->session->userdata('role')=="Admin"){?>
      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link is-arrowless">Article Master</a>
        <div class="navbar-dropdown">
            <a class="navbar-item" href="<?php echo base_url();?>am/create">Create Article Master</a>
            <a class="navbar-item" href="<?php echo base_url();?>am/view_all_am">View Article Master</a>
        </div>
      </div>
      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link is-arrowless">Administration</a>
        <div class="navbar-dropdown">
            <a class="navbar-item" href="<?php echo base_url();?>user/all_users">Users</a>
            <a class="navbar-item" href="<?php echo base_url();?>branch">Branch and Storage Types</a>
            <a class="navbar-item" href="<?php echo base_url();?>pricing">Vendor Pricing Record</a>
            <a class="navbar-item" href="<?php echo base_url();?>inventory/view_inventory">Inventory</a>
        </div>
      </div>
      <?php } ?>
      <?php  if($this->session->userdata('username')!=''){?>
      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link is-arrowless">Return Management</a>
        <div class="navbar-dropdown">
            <a class="navbar-item" href="<?php echo base_url();?>return_mgmt/return_request">Create a request</a>
            <a class="navbar-item" href="<?php echo base_url();?>return_mgmt">View RMA Ticket</a>
            <?php if(substr($this->session->userdata('access'),strpos($this->session->userdata('access'), 'rm-')+3,1)=="Y"){ ?>
            <a class="navbar-item" href="<?php echo base_url();?>return_mgmt/view_completed">Completed RMA Ticket</a>
            <?php }?>
        </div>
      </div>
      <?php } ?>
    </div>

    <div class="navbar-end">
      
            <?php if($this->session->userdata('username')==null){?>
          <a class="navbar-item" href="<?php echo base_url();?>user/signup"><strong>Sign up</strong></a>
          <a class="navbar-item" href="<?php echo base_url();?>user">Log in</a>
            <?php }else{?>
          <a class="navbar-item" href="<?php echo base_url();?>user/profile"><strong><?php echo $this->session->userdata('username');?></strong></a>
          <a class="navbar-item" href="<?php echo base_url();?>user/logout">Logout</a>
            <?php }?>
    </div>
  </div>


</nav>
 <div class="container">
     <h2 class="title is-3">Bulletin</h2>
    <div class="block">
      <div class="columns">
          <div class="column"></div>
        <div class="column is-7">
            <form method="post" action="<?php echo base_url();?>bulletin">
        <div class="field">
          <label class="label">Title</label>
          <input type="text" class="input" placeholder="Enter Title">
        </div>
        <div class="field">
          <label class="label">Message</label>
          <p class="control">
            <textarea class="textarea" placeholder="Bulletin Message"></textarea>
          </p>
        </div>
          <button class="button ">Clear</button>
          <button class="button is-info">Send</button>
      </form>
        </div>
          <div class="column"></div>
      </div>
    </div>
 </div>     

<section class="section" >
    
    <div class="columns is-centered">
        <div class="column is-narrow">
            <table class="table is-bordered is-striped is-hoverable">
                <thead style="background-color:darkcyan">
                    <tr>
                        <th>Title</th>
                        <th>Message</th>
                        <th>User</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($bulletin as $x){?>
                    <tr>
                        <td><?php echo $x['title']; ?></td>
                        <td><?php echo $x['message']; ?></td>
                        <td><?php echo $x['userid']; ?></td>
                        <td><?php echo $x['crt_date']; ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
 
  </body>
</html>


<!-- Main Sidebar -->
<div id="sidebar">
   <!-- Wrapper for scrolling functionality -->
   <div id="sidebar-scroll">
      <!-- Sidebar Content -->
      <div class="sidebar-content">
         <!-- Brand -->
         <a href="index.html" class="sidebar-brand">
            <i class="gi gi-flash"></i><span class="sidebar-nav-mini-hide"><strong>CRM WOKU STAF</strong></span>
         </a>
         <!-- END Brand -->
         <!-- User Info -->
         <div class="sidebar-section sidebar-user clearfix sidebar-nav-mini-hide">
            <div class="sidebar-user-avatar">
               <a href="<?php echo base_url('index.php/staf/dashboard'); ?>">
                  <img src="<?php echo base_url(); ?>/assets/staf_image/<?php echo $this->session->userdata('icon'); ?>" alt="avatar">
               </a>
            </div>
            <div class="sidebar-user-name">
               <?php echo $this->session->userdata('nama_staf'); ?> <br>  <small> (  <?php echo $this->session->userdata('status'); ?> ) </small>
            </div>
            <div class="sidebar-user-links">
               <!-- <a href="<?php echo base_url('index.php/welcome/profile'); ?>" data-toggle="tooltip" data-placement="bottom" title="Profile"><i class="gi gi-user"></i></a> -->
               <a href="<?php echo base_url('index.php/login/logout'); ?>" data-toggle="tooltip" data-placement="bottom" title="Logout"><i class="gi gi-exit"></i></a>
            </div>
         </div>
         <!-- END User Info -->

         <!-- Sidebar Navigation -->
         <ul class="sidebar-nav">
            <li>
               <a href="<?php echo base_url(); ?>index.php/staf/dashboard"><i class="gi gi-dashboard sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">My Project</span></a>
            </li>
            <li>
               <a href="<?php echo base_url();?>index.php/staf/dashboard/performance_staf"><i class="gi gi-building sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Performance</span></a>
            </li>
         </ul>
         <!-- END Sidebar Navigation -->
      </div>
      <!-- END Sidebar Content -->
   </div>
   <!-- END Wrapper for scrolling functionality -->
</div>
<!-- END Main Sidebar -->

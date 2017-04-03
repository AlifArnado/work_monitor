<!-- Main Sidebar -->
<div id="sidebar">
   <!-- Wrapper for scrolling functionality -->
   <div id="sidebar-scroll">
      <!-- Sidebar Content -->
      <div class="sidebar-content">
         <!-- Brand -->
         <a href="<?php echo base_url('staf/dashboard'); ?>" class="sidebar-brand">
            <i class="gi gi-flash"></i><span class="sidebar-nav-mini-hide"><strong>CRM WOKU STAF</strong></span>
         </a>
         <!-- END Brand -->
         <!-- User Info -->
         <div class="sidebar-section sidebar-user clearfix sidebar-nav-mini-hide">
         <?php
            $kode_staf = $this->session->userdata('kode_staf');
            $data_staf = $this->db->query("SELECT * FROM data_staf WHERE id_staf = '$kode_staf'");
            $value_staf = $data_staf->row_array();
          ?>
            <div class="sidebar-user-avatar">
               <a href="<?php echo base_url('staf/dashboard'); ?>">
                  <img src="<?php echo base_url(); ?>/assets/staf_image/<?php echo $value_staf['icon']; ?>" alt="avatar">
               </a>
            </div>
            <div class="sidebar-user-name">
               <?php echo $value_staf['nama_staf']; ?> <br>  <small> (  <?php echo $value_staf['status_staf']; ?> ) </small>
            </div>
            <div class="sidebar-user-links">
               <!-- <a href="<?php echo base_url('welcome/profile'); ?>" data-toggle="tooltip" data-placement="bottom" title="Profile"><i class="gi gi-user"></i></a> -->
               <a href="<?php echo base_url('login/logout'); ?>" data-toggle="tooltip" data-placement="bottom" title="Logout"><i class="gi gi-exit"></i></a>
            </div>
         </div>
         <!-- END User Info -->

         <!-- Sidebar Navigation -->
         <ul class="sidebar-nav">
            <li>
               <a href="<?php echo base_url(); ?>staf/dashboard"><i class="gi gi-dashboard sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">My Project</span></a>
            </li>
            <li>
               <a href="<?php echo base_url();?>staf/dashboard/performance_staf"><i class="gi gi-building sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Performance</span></a>
            </li>
         </ul>
         <!-- END Sidebar Navigation -->
      </div>
      <!-- END Sidebar Content -->
   </div>
   <!-- END Wrapper for scrolling functionality -->
</div>
<!-- END Main Sidebar -->

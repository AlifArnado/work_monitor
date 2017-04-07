<!-- Main Sidebar -->
<div id="sidebar">
   <!-- Wrapper for scrolling functionality -->
   <div id="sidebar-scroll">
      <!-- Sidebar Content -->
      <div class="sidebar-content">
         <!-- Brand -->
         <a href="index.html" class="sidebar-brand">
            <i class="gi gi-flash"></i><span class="sidebar-nav-mini-hide"><strong>CRM WOKU</strong></span>
         </a>
         <!-- END Brand -->
         <!-- User Info -->
         <div class="sidebar-section sidebar-user clearfix sidebar-nav-mini-hide">
            <?php
            $kode_register = $this->session->userdata('kode_register');
            $data_register = $this->db->query("SELECT * FROM data_register WHERE kode_register = '$kode_register'");
            $value_register = $data_register->row_array();
          ?>
            <div class="sidebar-user-avatar">
               <a href="<?php echo base_url('index.php/welcome/profile'); ?>">
                  <img src="<?php echo base_url(); ?>/assets/img/placeholders/avatars/avatar2.jpg" alt="avatar">
               </a>
            </div>
            <div class="sidebar-user-name"><?php echo $value_register['nama'];?></div>
            <div class="sidebar-user-links">
               <a href="<?php echo base_url('index.php/welcome/profile'); ?>" data-toggle="tooltip" data-placement="bottom" title="Profile"><i class="gi gi-user"></i></a>
               <a href="<?php echo base_url('index.php/login/logout'); ?>" data-toggle="tooltip" data-placement="bottom" title="Logout"><i class="gi gi-exit"></i></a>
            </div>
         </div>

         <ul class="sidebar-nav">
            <li>
               <a href="<?php echo base_url(); ?>"><i class="gi gi-dashboard sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Projects</span></a>
            </li>
            <li>
               <a href="<?php echo base_url();?>index.php/welcome/create_project"><i class="gi gi-building sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Create Project</span></a>
            </li>
            <li>
               <a href="<?php echo base_url();?>index.php/welcome/workload"><i class="gi gi-server sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Workload</span></a>
            </li>
            <li>
               <a href="<?php echo base_url();?>index.php/welcome/archive"><i class="gi gi-book_open sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Archive</span></a>
            </li>
            <!-- <li>
               <a href="<?php echo base_url();?>index.php/welcome/timeline"><i class="gi gi-lightbulb sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Timeline</span></a>
            </li>
            <li>
               <a href="<?php echo base_url();?>index.php/welcome/calender"><i class="gi gi-calendar sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Calender</span></a>
            </li> -->

         </ul>
         <!-- END Sidebar Navigation -->
      </div>
      <!-- END Sidebar Content -->
   </div>
   <!-- END Wrapper for scrolling functionality -->
</div>
<!-- END Main Sidebar -->

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
               <a href="<?php echo base_url('welcome/profile'); ?>">
                  <img src="<?php echo base_url(); ?>/assets/img/placeholders/avatars/avatar2.jpg" alt="avatar">
               </a>
            </div>
            <div class="sidebar-user-name"><?php echo $value_register['nama'];?></div>
            <div class="sidebar-user-links">
               <a href="<?php echo base_url('welcome/profile'); ?>" data-toggle="tooltip" data-placement="bottom" title="Profile"><i class="gi gi-user"></i></a>
               <a href="<?php echo base_url('login/logout'); ?>" data-toggle="tooltip" data-placement="bottom" title="Logout"><i class="gi gi-exit"></i></a>
            </div>
         </div>
         <!-- END User Info -->
         <!-- Theme Colors -->
         <!-- Change Color Theme functionality can be found in js/app.js - templateOptions() -->
         <!-- <ul class="sidebar-section sidebar-themes clearfix sidebar-nav-mini-hide">
            <li>
               <a href="javascript:void(0)" class="themed-background-dark-night themed-border-night" data-theme="css/themes/night.css" data-toggle="tooltip" title="Night"></a>
            </li>
            <li>
               <a href="javascript:void(0)" class="themed-background-dark-amethyst themed-border-amethyst" data-theme="css/themes/amethyst.css" data-toggle="tooltip" title="Amethyst"></a>
            </li>
            <li>
               <a href="javascript:void(0)" class="themed-background-dark-modern themed-border-modern" data-theme="css/themes/modern.css" data-toggle="tooltip" title="Modern"></a>
            </li>
            <li>
               <a href="javascript:void(0)" class="themed-background-dark-autumn themed-border-autumn" data-theme="css/themes/autumn.css" data-toggle="tooltip" title="Autumn"></a>
            </li>
            <li>
               <a href="javascript:void(0)" class="themed-background-dark-flatie themed-border-flatie" data-theme="css/themes/flatie.css" data-toggle="tooltip" title="Flatie"></a>
            </li>
            <li>
               <a href="javascript:void(0)" class="themed-background-dark-spring themed-border-spring" data-theme="css/themes/spring.css" data-toggle="tooltip" title="Spring"></a>
            </li>
            <li>
               <a href="javascript:void(0)" class="themed-background-dark-fancy themed-border-fancy" data-theme="css/themes/fancy.css" data-toggle="tooltip" title="Fancy"></a>
            </li>
            <li>
               <a href="javascript:void(0)" class="themed-background-dark-fire themed-border-fire" data-theme="css/themes/fire.css" data-toggle="tooltip" title="Fire"></a>
            </li>
            <li>
               <a href="javascript:void(0)" class="themed-background-dark-coral themed-border-coral" data-theme="css/themes/coral.css" data-toggle="tooltip" title="Coral"></a>
            </li>
            <li>
               <a href="javascript:void(0)" class="themed-background-dark-lake themed-border-lake" data-theme="css/themes/lake.css" data-toggle="tooltip" title="Lake"></a>
            </li>
            <li>
               <a href="javascript:void(0)" class="themed-background-dark-forest themed-border-forest" data-theme="css/themes/forest.css" data-toggle="tooltip" title="Forest"></a>
            </li>
            <li>
               <a href="javascript:void(0)" class="themed-background-dark-waterlily themed-border-waterlily" data-theme="css/themes/waterlily.css" data-toggle="tooltip" title="Waterlily"></a>
            </li>
            <li>
               <a href="javascript:void(0)" class="themed-background-dark-emerald themed-border-emerald" data-theme="css/themes/emerald.css" data-toggle="tooltip" title="Emerald"></a>
            </li>
            <li>
               <a href="javascript:void(0)" class="themed-background-dark-blackberry themed-border-blackberry" data-theme="css/themes/blackberry.css" data-toggle="tooltip" title="Blackberry"></a>
            </li>
         </ul> -->
         <!-- END Theme Colors -->
         <!-- Sidebar Navigation -->
         <ul class="sidebar-nav">
            <li>
               <a href="<?php echo base_url(); ?>"><i class="gi gi-dashboard sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Projects</span></a>
            </li>
            <li>
               <a href="<?php echo base_url();?>welcome/create_project"><i class="gi gi-building sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Create Project</span></a>
            </li>
            <li>
               <a href="<?php echo base_url();?>welcome/workload"><i class="gi gi-server sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Workload</span></a>
            </li>
            <li>
               <a href="<?php echo base_url();?>welcome/timeline"><i class="gi gi-lightbulb sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Timeline</span></a>
            </li>
            <li>
               <a href="<?php echo base_url();?>welcome/calender"><i class="gi gi-calendar sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Calender</span></a>
            </li>

         </ul>
         <!-- END Sidebar Navigation -->
      </div>
      <!-- END Sidebar Content -->
   </div>
   <!-- END Wrapper for scrolling functionality -->
</div>
<!-- END Main Sidebar -->

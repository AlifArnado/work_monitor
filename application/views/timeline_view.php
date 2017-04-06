<!DOCTYPE html>
<!--[if IE 9]>         <html class="no-js lt-ie10" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
    <head>
        <?php $this->load->view('include/include_style.php'); ?>
    </head>
    <body>
        <div id="page-wrapper">
            <div id="page-container" class="sidebar-partial sidebar-visible-lg sidebar-no-animations">

                <?php $this->load->view('include/side_bar.php'); ?>

                <!-- Main Container -->
                <div id="main-container">
                    <!-- Page content -->
                    <div id="page-content">
                        <!-- Dashboard Header -->
                        <div class="content-header">
                            <div class="header-section">
                                <h1>
                                <i class="fa fa-ticket"></i>Blank Template<br><small>Easily push project to Oranyelab Team!</small>
                                </h1>
                            </div>
                        </div>
                            <ul class="breadcrumb breadcrumb-top">
                                <li><a href="<?php echo base_url(); ?>">Projects</a></li>
                                <li><a href="<?php echo base_url(); ?>index.php/welcome/create_project">Create Projects</a></li>
                            </ul>
                            <div class="row">
                                <div class="col-md-12">
                                    <h1>Available Soon</h1>
                                </div>
                            </div>
                    <!-- END Page Content -->
                </div>
                <!-- END Main Container -->
            </div>
            <!-- END Page Container -->
        </div>
        <!-- END Page Wrapper -->

        <?php $this->load->view('include/include_script.php'); ?>
    </body>
</html>

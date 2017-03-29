<!DOCTYPE html>
<!--[if IE 9]>         <html class="no-js lt-ie10" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
    <head>
        <?php $this->load->view('./include/include_style.php'); ?>
    </head>
    <body>
        <div id="page-wrapper">
            <div id="page-container" class="sidebar-partial sidebar-visible-lg sidebar-no-animations">

                <?php $this->load->view('./include/side_bar_staf.php'); ?>

                <!-- Main Container -->
                <div id="main-container">

                    <!-- Page content -->
                    <div id="page-content">
                        <!-- Mini Top Stats Row -->
                        <div class="row">

                        </div>
                        <!-- END Mini Top Stats Row -->
                    </div>
                    <!-- END Page Content -->
                </div>
                <!-- END Main Container -->
            </div>
            <!-- END Page Container -->
        </div>
        <!-- END Page Wrapper -->



        <?php $this->load->view('./include/include_script.php'); ?>
    </body>
</html>

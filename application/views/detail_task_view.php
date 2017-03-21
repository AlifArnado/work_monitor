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
                        <ul class="breadcrumb breadcrumb-top">
                            <li><a href="dashboard.php">Projects</a></li>
                            <li><a href="" onclick="window.history.back();">Project Detail</a></li>
                            <li><a href="">Request</a></li>
                        </ul>

                        <div class="row">
                            <div class="col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
                                <!-- Article Block -->
                                <div class="block block-alt-noborder">
                                    <!-- Article Content -->
                                    <article>
                                        <h1></h1>
                                        <h3 class="sub-header text-center">by <a href="#"><strong></strong></a> on <strong></strong></h3>
                                    <p> </p>

                                    </article>
                                    <!-- END Article Content -->
                                </div>
                                <!-- END Article Block -->

                            </div>
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

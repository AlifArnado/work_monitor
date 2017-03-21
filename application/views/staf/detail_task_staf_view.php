<!DOCTYPE html>
<!--[if IE 9]>         <html class="no-js lt-ie10" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
    <head>
        <?php $this->load->view('include/include_style.php'); ?>
    </head>
    <body>
        <div id="page-wrapper">
            <div id="page-container" class="sidebar-partial sidebar-visible-lg sidebar-no-animations">

                <?php $this->load->view('include/side_bar_staf.php'); ?>

                <!-- Main Container -->
                <div id="main-container">
                    <!-- Page content -->
                    <div id="page-content">
                        <ul class="breadcrumb breadcrumb-top">
                            <li><a href="<?php echo base_url(); ?>">Projects</a></li>
                            <li><a href="" onclick="window.history.back();">Project Detail</a></li>
                            <li><a href="">Request</a></li>
                        </ul>

                        <?php foreach ($data_task as $row_task): ?>
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
                                <!-- Article Block -->
                                <div class="block block-alt-noborder">
                                    <!-- Article Content -->
                                    <article>
                                        <h1 align="center"><?php echo $row_task->judul_task; ?></h1>
                                        <h3 class="sub-header text-center">by <a href="#"><strong> <?php echo $row_task->task_request; ?> </strong></a> on <strong> <?php echo $row_task->waktu; ?> </strong></h3>
                                        <p> <?php echo $row_task->task_desc; ?> </p>

                                    </article>
                                    <!-- END Article Content -->
                                </div>
                                <!-- END Article Block -->
                            </div>
                        </div>
                        <?php endforeach ?>



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

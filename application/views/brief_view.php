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
                    <?php foreach ($data_project as $row_data_project): ?>

                        <!-- Article Header -->
                        <!-- For an image header add the class 'content-header-media' and an image as in the following example -->
                       <ul class="breadcrumb breadcrumb-top">
                            <li><a href="<?php echo base_url('/index.php'); ?>">Projects</a></li>
                            <li><a href="<?php echo base_url('/index.php/welcome/task_list/'.$row_data_project->kode_project); ?>">Project Detail</a></li>
                            <li><a href="">Brief</a></li>
                        </ul>

                        <!-- Mini Top Stats Row -->
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
                                <!-- Article Block -->
                                <div class="block block-alt-noborder">
                                    <!-- Article Content -->
                                    <article>
                                        <h1>BRIEF: <?php echo $row_data_project->project_name; ?> </h1>
                                        <h3 class="sub-header text-center">by <a href="#"><strong> <?php echo $row_data_project->ae_name; ?> </strong></a> on <strong> <?php echo $row_data_project->tanggal_project; ?> </strong></h3>
                                    <p>
                                        <?php echo $row_data_project->project_desc; ?>

                                    </p>
                                    <p>
                                        <h4>Berkas Brief</h4>
                                        <?php foreach ($berkas_task as $row_berkas_task): ?>
                                            <?php if (empty($row_berkas_task->name_file) == TRUE): ?>
                                                <h5> Tanggal : <?php echo $row_berkas_task->tgl_upload_task; ?> -> Berkas Kosong</h5>
                                            <?php else: ?>
                                                <h5> Tanggal : <?php echo $row_berkas_task->tgl_upload_task; ?> ->
                                                <a href="<?php echo base_url('index.php/welcome/download/'.$row_berkas_task->name_file); ?>" target="_blank" downloads><?php echo $row_berkas_task->name_file; ?></a>
                                                </h5>
                                            <?php endif ?>
                                        <?php endforeach ?>
                                    </p>
                                    </article>
                                    <!-- END Article Content -->
                                </div>
                                <!-- END Article Block -->
                            </div>
                        </div>
                        <!-- END Mini Top Stats Row -->
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

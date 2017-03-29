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
                            <li><a href="<?php echo base_url(''); ?>index.php/staf/dashboard/">Projects</a></li>
                            <li><a href="" onclick="window.history.back();">Project Detail</a></li>
                            <li><a href="">Request</a></li>
                        </ul>

                        <?php foreach ($data_task as $row_task): ?>
                        <div class="row">
                            <div class="col-md-9 col-lg-9">
                                <!-- Article Block -->
                                <div class="block block-alt-noborder">
                                    <!-- Article Content -->
                                    <?php
                                            if ($row_task->status_task == "Start") {
                                                echo '<a class="btn btn-sm btn-info pull-right" id="get_work" href="'.base_url('index.php/staf/dashboard/get_work/'.$row_task->kode_task.'/work').'" role="button"> <i class="gi gi-cogwheels"></i> Accept Task</a>';
                                            } else if ($row_task->status_task == "Proses") {
                                                echo '<a class="btn btn-sm btn-danger pull-right" id="waitting" href="'.base_url('index.php/staf/dashboard/get_work/'.$row_task->kode_task.'/waitting').'" role="button"> <i class="hi hi-fire"></i> Finish Task</a>';
                                            } else {

                                            }

                                     ?>

                                    <article>
                                        <h1 align="center"><?php echo $row_task->judul_task; ?></h1>
                                        <h3 class="sub-header text-center">by <a href="#"><strong> <?php echo $row_task->task_request; ?> </strong></a> on <strong> <?php echo $row_task->waktu; ?> </strong></h3>
                                        <p> <?php echo $row_task->task_desc; ?> </p>

                                    </article>
                                    <!-- END Article Content -->
                                </div>
                                <!-- END Article Block -->
                            </div>
                            <div class="col-md-3 col-lg-3">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <label for="">Berikan Pesan</label>
                                        <textarea id="example-textarea-input" name="example-textarea-input" rows="7" class="form-control" placeholder="Pesan.."></textarea>
                                        <a class="btn btn-success pull-right btn-block btn-sm" href="#" role="button"> <i class="fa fa-comment"></i> Command </a>
                                    </div>
                                </div>
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

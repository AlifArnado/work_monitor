<!DOCTYPE html>
<!--[if IE 9]>         <html class="no-js lt-ie10" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
    <head>
        <?php $this->load->view('include/include_style.php'); ?>
        <?php $this->load->view('include/include_costom.php'); ?>
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
                            <li><a href="<?php echo base_url(); ?>">Projects</a></li>
                            <li><a href="" onclick="window.history.back();">Project Detail</a></li>
                            <li><a href="">Request</a></li>
                        </ul>

                        <div class="row">
                        <?php foreach ($data_task as $row_task): ?>
                            <div class="col-md-8 col-lg-8">

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
                         <?php endforeach ?>

                            <div class="col-md-4 col-lg-4">
                                <!-- Simple Widget with Post Input - Variation 3 -->
                                <div class="widget">
                                    <div class="widget-extra-full">
                                        <form action="<?php echo base_url('index.php/pesan/pesan_ae'); ?>" method="post" class="form-horizontal">
                                        <?php foreach ($data_task as $row_task): $kode_task = $row_task->kode_task; ?>
                                            <div class="form-group">
                                                <div class="col-xs-12">
                                                    <input type="hidden" name="kode_register" value="<?php echo $this->session->userdata('kode_register'); ?>" placeholder="">
                                                    <input type="hidden" name="nama_pesan" value="<?php echo $this->session->userdata('nama'); ?> " placeholder="">
                                                    <input type="hidden" name="kode_task" value="<?php  echo $row_task->kode_task; ?>" placeholder="">
                                                    <textarea id="widget-post3" name="pesan" rows="4" class="form-control" placeholder="Compose a post.."></textarea>
                                                    <script>
                                                      CKEDITOR.replace('widget-post3');
                                                </script>
                                                </div>
                                            </div>
                                            <div class="form-group remove-margin-bottom">
                                                <div class="col-xs-6">
                                                    <!-- <div class="btn-group">
                                                        <button type="button" class="btn btn-default" data-toggle="tooltip" title="Add Image"><i class="fa fa-picture-o"></i></button>
                                                        <button type="button" class="btn btn-default" data-toggle="tooltip" title="Add Location"><i class="fa fa-location-arrow"></i></button>
                                                        <button type="button" class="btn btn-default" data-toggle="tooltip" title="Add Recording"><i class="fa fa-microphone"></i></button>
                                                    </div> -->
                                                </div>
                                                <div class="col-xs-6 text-right">
                                                    <button type="submit" class="btn btn-default"><i class="fa fa-pencil"></i> POST</button>
                                                </div>
                                            </div>
                                        <?php endforeach ?>
                                        </form>
                                    </div>


                                <!-- Timeline Block -->
                                <div class="block">
                                    <!-- Timeline Content -->
                                    <div class="block-content-full">
                                        <div class="timeline">
                                            <ul class="timeline-list" >

                                                <?php
                                                    $query = $this->db->query("SELECT * FROM data_pesan WHERE kode_task = '$kode_task' order by id_pesan desc");
                                                    $data_pesan = $query->result();
                                                ?>

                                                <?php foreach ($data_pesan as $row_pesan): ?>
                                                <li class="active">
                                                    <div class="timeline-icon"><i class="fa fa-file-text"></i></div>
                                                    <div class="timeline-time"><small><?php echo time_elapsed_string($row_pesan->tanggal_pesan);?></small></div>
                                                    <div class="timeline-content">
                                                        <p class="push-bit"><strong><span class="label <?php echo $row_pesan->color_label; ?>"><?php echo $row_pesan->nama_pesan; ?></span></strong></p>
                                                        <?php echo $row_pesan->isi_pesan; ?>
                                                    </div>
                                                </li>
                                                <?php endforeach ?>


                                                <li class="text-center">
                                                    <a href="javascript:void(0)" class="btn btn-xs btn-default">View more..</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- END Timeline Content -->
                                </div>
                                <!-- END Timeline Block -->



                                </div>
                                <!-- END Simple Widget with Post Input - Variation 3 -->
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

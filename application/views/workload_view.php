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
                        <div class="content-header">
                            <div class="header-section">
                                <h1>
                                    <i></i>Workloads<br><small>Find information who is free today</small>
                                </h1>
                            </div>
                        </div>
                        <ul class="breadcrumb breadcrumb-top">
                            <li><a href="dashboard.php">Projects</a></li>
                            <li><a href="">Workloads</a></li>
                        </ul>

                       <div class="row">

                            <?php foreach ($data_staf as $row): ?>
                                <?php
                                        $data_task = $this->db->query("SELECT * FROM data_task WHERE kode_staf = '$row->id_staf' ORDER BY kode_project DESC LIMIT 1");
                                        $value = $data_task->row_array();
                                        $kode_project = $value['kode_project'];
                                 ?>
                            <div class="col-sm-6 col-lg-4">
                                <a href="<?php echo base_url('index.php/welcome/detail_performance_staf/'.$row->id_staf); ?>" class="widget widget-hover-effect1">
                                    <?php if ($row->status_staf === "Full"): ?>
                                        <div class="widget-simple themed-background-dark namastaff" data-id="<?php echo $row->id_staf; ?>" data-status="<?php echo $row->status_staf; ?>">
                                    <?php else: ?>
                                        <div class="widget-simple themed-background-modern namastaff"  data-id="<?php echo $row->id_staf; ?>" data-status="<?php echo $row->status_staf; ?>">
                                    <?php endif ?>
                                        <?php if (!empty($row->icon)): ?>
                                            <img src="<?php echo base_url('assets/staf_image/'.$row->icon); ?>" alt="avatar" class="widget-image img-circle pull-left" style="object-fit: cover;">
                                        <?php else: ?>
                                            <img src="<?php echo base_url('assets/img/placeholders/avatars/avatar12.jpg'); ?>" alt="avatar" class="widget-image img-circle pull-left" style="object-fit: cover;">
                                        <?php endif ?>

                                        <h4 class="widget-content widget-content-light">
                                            <strong><?php echo $row->nama_staf; ?></strong>
                                            <small><?php echo $row->posisi; ?></small>
                                        </h4>
                                    </div>
                                    <div class="widget-extra">
                                        <div class="row text-center">
                                            <div class="col-xs-4">
                                                <?php if ($row->status_staf === "Full"): ?>
                                                    <h3>
                                                        <strong>Full</strong><br>
                                                        <small>Status</small>
                                                    </h3>
                                                <?php else: ?>
                                                    <h3>
                                                        <strong>Free</strong><br>
                                                        <small>Status</small>
                                                    </h3>
                                                <?php endif ?>

                                            </div>
                                            <div class="col-xs-8">

                                            <?php
                                                if (empty($value['judul_task'])) {
                                                    echo "
                                                    <h3>
                                                        <strong>No Job</strong><br>
                                                        <small>Handle Project</small>
                                                    </h3>
                                                    ";
                                                } else if ($value['status_task'] == 'Finish') {
                                                    echo "
                                                    <h3>
                                                        <strong>No Job</strong><br>
                                                        <small>Handle Project</small>
                                                    </h3>
                                                    ";
                                                } else {
                                                    $data_project = $this->db->query("SELECT * FROM data_project WHERE kode_project = '$kode_project'");
                                                    $value_project = $data_project->row_array();

                                                    echo "<h3>
                                                        <strong>". $value_project['project_name'] ."</strong><br>
                                                        <small>Handle Project</small>
                                                        </h3>";

                                                }
                                             ?>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <?php endforeach ?>

                            <!-- <div class="col-sm-6 col-lg-4">
                                <div class="widget">
                                    <div class="widget-simple themed-background-dark namastaff" data-id="" data-status="">
                                    <font color="white">FULL</font>
                                        <a >
                                            <img src="<?php echo base_url('assets/img/placeholders/avatars/avatar12.jpg'); ?>" alt="avatar" class="widget-image img-circle pull-left">
                                        </a>
                                        <h4 class="widget-content widget-content-light text-right">
                                            <a><strong></strong></a>
                                            <small></small>
                                            <small></small>
                                        </h4>
                                    </div>
                                </div>
                            </div> -->
                           <!--  <div class="col-sm-6 col-lg-4">
                                <a href="javascript:void(0)" class="widget widget-hover-effect1">
                                    <div class="widget-simple themed-background">
                                        <img src="img/placeholders/avatars/avatar12.jpg" alt="avatar" class="widget-image img-circle pull-left">
                                        <h4 class="widget-content widget-content-light">
                                            <strong>Julia Warren</strong>
                                            <small>Web Designer</small>
                                        </h4>
                                    </div>
                                    <div class="widget-extra">
                                        <div class="row text-center">
                                            <div class="col-xs-4">
                                                <h3>
                                                    <strong>Full</strong><br>
                                                    <small>Status</small>
                                                </h3>
                                            </div>
                                            <div class="col-xs-8">
                                                <h3>
                                                    <strong>Project Name</strong><br>
                                                    <small>Handle Project</small>
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div> -->


                    <!-- END Page Content -->
                </div>
                <!-- END Main Container -->
            </div>
            <!-- END Page Container -->
        </div>
        <!-- END Page Wrapper -->
        <?php $this->load->view('include/include_script.php'); ?>

        <script type="text/javascript">
            $(document).ready(function($) {
                $('#simpan').hide();
                $('.namastaff').click(function() {
                    $('.namastaff').removeAttr("style");
                    $(this).css("background-color", "yellowgreen");
                });
            });
        </script>

    </body>
</html>

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
                                    <div class="widget">

                                        <?php if ($row->status_staf === "Full"): ?>
                                             <div class="widget-simple themed-background-dark namastaff" data-id="<?php echo $row->id_staf; ?>" data-status="<?php echo $row->status_staf; ?>">
                                             <font color="white">FULL</font>
                                        <?php else: ?>
                                            <div class="widget-simple namastaff"  data-id="<?php echo $row->id_staf; ?>" data-status="<?php echo $row->status_staf; ?>">
                                            FREE
                                        <?php endif ?>

                                        <?php if (!empty($row->icon)): ?>
                                            <a >
                                                <img src="<?php echo base_url('assets/staf_image/'.$row->icon); ?>" alt="avatar" class="widget-image img-circle pull-left" style="object-fit: cover;">
                                            </a>
                                        <?php else: ?>
                                            <a >
                                                <img src="<?php echo base_url('assets/img/placeholders/avatars/avatar12.jpg'); ?>" alt="avatar" class="widget-image img-circle pull-left" style="object-fit: cover;">
                                            </a>
                                        <?php endif ?>


                                            <h4 class="widget-content">
                                                <a><strong> <?php echo $row->nama_staf; ?> </strong></a>
                                                <small> <?php echo $row->posisi; ?> </small>
                                                <small>
                                                    <?php
                                                        if (empty($value['judul_task'])) {
                                                            echo "<br> No Job";
                                                        } else {
                                                            $data_project = $this->db->query("SELECT * FROM data_project WHERE kode_project = '$kode_project'");
                                                            $value_project = $data_project->row_array();
                                                            echo "<br> Handle : ".$value_project['project_name'];
                                                        }
                                                     ?>
                                                </small>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach ?>

                            <!-- <div class="col-sm-6 col-lg-4">
                                <div class="widget">
                                    <div class="widget-simple themed-background-dark namastaff" data-id="" data-status="">
                                    <font color="white">FULL</font>
                                        <a >
                                            <img src="<?php echo base_url('assets/img/placeholders/avatars/avatar12.jpg'); ?>" alt="avatar" class="widget-image img-circle pull-left">
                                        </a>
                                        <h4 class="widget-content">
                                            <a><strong></strong></a>
                                            <small></small>
                                            <small></small>
                                        </h4>
                                    </div>
                                </div>
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

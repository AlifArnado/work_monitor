<!DOCTYPE html>
<!--[if IE 9]>         <html class="no-js lt-ie10" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
    <head>
        <?php $this->load->view('include/include_style.php'); ?>
    </head>
    <style type="text/css">
        .widget-simple {
            cursor: pointer;
        }
    </style>
    <body>
        <div id="page-wrapper">
            <div id="page-container" class="sidebar-partial sidebar-visible-lg sidebar-no-animations">
                <?php $this->load->view('include/side_bar_manual.php'); ?>
                <!-- Main Container -->
                <div id="main-container">
                    <!-- Page content -->
                    <div id="page-content">
                        <div class="content-header">
                            <div class="header-section">
                            <form action="<?php echo base_url('index.php/welcome/heandle_option'); ?>" method="POST">

                            <input type="text" name="kode_project" value="<?php echo $kode_project; ?>">
                            <input type="text" name="kode_berkas_task" value="<?php echo $kode_berkas_task; ?>" >
                            <input type="text" name="kode_staf" value="">
                            <input type="text" name="status" value="">
                                <h1>
                                   </i>Assign Project<br><small>Choose suitable staff for your project, in most case you should start from Visual Designer</small>
                                   <br><button type="submit" id="simpan" name="task_update" class="btn btn-md btn-danger pull-right" style="margin-top: -10px;">Create Project</button>
                                </h1>
                            </div>
                        </div>
                        <ul class="breadcrumb breadcrumb-top">
                            <li><a href="<?php echo base_url(); ?>">Projects</a></li>
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
                                                        } else if ($value['status_task'] == 'Finish') {
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
                            </form>
                    <!-- END Page Content -->
                </div>
                <!-- END Main Container -->
            </div>
            <!-- END Page Container -->
        </div>
        <!-- END Page Wrapper -->
        <?php $this->load->view('include/include_script.php'); ?>

        <script type="text/javascript">
            $(document).ready(function() {
                $('#simpan').hide();

                $('.namastaff').click(function() {
                   var kodeid = $(this).attr('data-id');
                   var status = $(this).attr('data-status');
                    $('.namastaff').removeAttr("style");
                    $(this).css("background-color", "yellowgreen");

                   console.log(kodeid);
                   $('input[name=kode_staf]').val(kodeid);
                   $('input[name=status]').val(status);

                    if (status == "Full") {
                        alert("Staff yang anda pilih sedang mengerjakan project lain, anda tetap bisa melanjutkan dan project lain tersebut akan dipending pekerjaannya.");
                    }

                    $('#simpan').show();
                });

            });
        </script>

    </body>
</html>

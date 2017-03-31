<!DOCTYPE html>
<!--[if IE 9]>         <html class="no-js lt-ie10" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
    <head>
        <?php $this->load->view('include/include_style.php'); ?>
    </head>
    <body>
        <div id="page-wrapper">
            <div id="page-container" class="sidebar-partial sidebar-visible-lg sidebar-no-animations">

                <?php //$this->load->view('include/side_bar.php'); ?>

                <!-- Main Container -->
                <div id="main-container">
                    <!-- Page content -->
                    <div id="page-content">
                        <!-- Dashboard Header -->

                        <!-- Mini Top Stats Row -->
                        <div class="row">
                            <div class="col-sm-6 col-lg-12">

                               <div class="block full">
                            <div class="block-title">
                                <h2><strong>Log Project</strong></h2>
                            </div>
                            <div class="table-responsive">
                                <table id="example-datatable" class="table table-vcenter table-condensed table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th class="text-center">Kode Project</th>
                                            <th class="text-center">Kode Task</th>
                                            <th class="text-center">Kode Staf</th>
                                            <th class="text-center">Keterangan</th>
                                            <th class="text-center">Status Task</th>
                                            <th class="text-center">Status Transfer</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; foreach ($log_task as $row_log_task): ?>
                                        <tr>
                                            <td class="text-center"><?php echo $no++; ?></td>
                                            <td class="text-center">
                                            <?php echo $row_log_task->kode_project."<br>";
                                               $data_project = $this->db->query("SELECT * FROM data_project WHERE kode_project = '$row_log_task->kode_project'");
                                               $value_project = $data_project->row_array();
                                                echo $value_project['project_name'];
                                             ?>
                                            </td>
                                            <td class="text-center">
                                            <?php echo $row_log_task->kode_task."<br>";
                                               $data_task = $this->db->query("SELECT * FROM data_task WHERE kode_task = '$row_log_task->kode_task'");
                                               $value_task = $data_task->row_array();
                                                echo $value_task['judul_task'];
                                             ?>
                                            </td>
                                            <td class="text-center">
                                            <?php echo $row_log_task->kode_staf."<br>";
                                               $data_project = $this->db->query("SELECT * FROM data_staf WHERE id_staf = '$row_log_task->kode_staf'");
                                               $value_staf = $data_project->row_array();
                                                echo $value_staf['nama_staf'];
                                             ?>
                                            </td>
                                            <td class="text-center">
                                            <?php
                                            echo "
                                            Accept Task <br>
                                            Start Time = ".$row_log_task->tanggal_log."<br> End Time = ".$row_log_task->start_time."";

                                            echo "
                                            <br><br> Proses Task <br>
                                            Start Time = ".$row_log_task->start_time."<br> End Time = ".$row_log_task->end_time."";

                                            echo "
                                            <br><br> Transfer Task <br>
                                            Start Time = ".$row_log_task->start_time_transfer."<br> End Time = ".$row_log_task->end_time_transfer."";
                                            ?>

                                            </td>
                                            <td class="text-center"><?php echo $row_log_task->status_log_task; ?></td>
                                            <td class="text-center"><?php echo $row_log_task->status_transfer; ?></td>
                                            <td class="text-center">
                                                <!-- <div class="btn-group">
                                                    <a href="" data-toggle="tooltip" title="Edit" class="btn btn-sm btn-success"><i class="fa fa-check"></i> Accept Task</a>
                                                    <a href="" data-toggle="tooltip" title="Delete" class="btn btn-sm btn-default"><i class="fa fa-file-text-o"></i> Detail Job</a>
                                                    <a href="" data-toggle="tooltip" title="Delete" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
                                                </div> -->
                                            </td>
                                        </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                            </div>
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
        <?php $this->load->view('include/include_script.php'); ?>
    </body>
</html>

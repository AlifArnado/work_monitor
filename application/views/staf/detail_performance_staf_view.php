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

                        <!-- Datatables Header -->
                        <div class="content-header">
                            <div class="header-section">
                                <h1>
                                    <i class="fa fa-building"></i>Performance<br><small></small>
                                </h1>
                            </div>
                        </div>
                        <ul class="breadcrumb breadcrumb-top">
                            <li><a href="<?php echo base_url('staf/dashboard/'); ?>">Home</a></li>
                            <li><a href="<?php echo base_url('staf/dashboard/performance_staf'); ?>">Performance</a></li>
                            <li><a href="" onclick="window.history.back();"">Detail Tasks</a></li>
                        </ul>
                        <!-- END Datatables Header -->

                        <!-- Datatables Content -->
                        <div class="block full">
                            <div class="block-title">
                                <h2><strong>Performance List</strong></h2>
                            </div>
                            <div class="table-responsive">
                                <table id="example-datatable" class="table table-vcenter table-condensed table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th class="text-center">Tanggal Project</th>
                                            <th class="text-center">Kode Project</th>
                                            <th class="text-center">Nama Project</th>
                                            <th class="text-center">Nama Task</th>
                                            <th class="text-center">Nama AE</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; foreach ($performance_task_staf as $row_performance): ?>
                                        <tr>
                                            <td class="text-center"><?php echo $no++; ?></td>
                                            <td class="text-center"><?php echo $row_performance->tanggal_task; ?></td>
                                            <td class="text-center"><?php echo $row_performance->kode_project; ?></td>
                                            <td class="text-center">
                                                <?php
                                                    $query = $this->db->query("SELECT * FROM data_project WHERE kode_project = '$row_performance->kode_project'");
                                                    $data_project = $query->row();
                                                    echo $data_project->project_name;
                                                ?>
                                            </td>
                                            <td class="text-center">
                                                <?php echo $row_performance->task_request; ?>
                                            </td>
                                             <td class="text-center">
                                                <?php echo $row_performance->judul_task; ?>
                                            </td>
                                        </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- END Datatables Content -->

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

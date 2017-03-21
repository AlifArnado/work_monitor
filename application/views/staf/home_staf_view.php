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
                                    <i class="fa fa-tachometer"></i>My Project<br><small></small>
                                </h1>
                            </div>
                        </div>
                        <ul class="breadcrumb breadcrumb-top">
                            <li>Tables</li>
                            <li><a href="">Datatables</a></li>
                        </ul>
                        <!-- END Datatables Header -->

                        <!-- Datatables Content -->
                        <div class="block full">
                            <div class="block-title">
                                <h2><strong>List Project</strong></h2>
                            </div>
                            <div class="table-responsive">
                                <table id="example-datatable" class="table table-vcenter table-condensed table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center">ID</th>
                                            <th class="text-center"><i class="gi gi-user"></i> Taks Request</th>
                                            <th class="text-center">Judul Task</th>
                                            <th class="text-center">Tanggal Task</th>
                                            <th class="text-center">Status Task</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no = 1; foreach ($data_task as $row): ?>
                                        <tr>
                                            <td class="text-center"><?php echo $no++; ?></td>
                                            <td class="text-center"><?php echo $row->task_request; ?></td>
                                            <td class="text-center"><?php echo $row->judul_task; ?></td>
                                            <td class="text-center"><?php echo $row->tanggal_task; ?></td>
                                            <td class="text-center"><?php echo $row->status_task; ?></td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <a href="<?php echo base_url('index.php/staf/dashboard/detail_project/'.$row->kode_project); ?>" data-toggle="tooltip" title="Edit" class="btn btn-md btn-default"><i class="fa fa-code-fork"></i> Fork Job</a>
                                                    <a href="<?php echo base_url('index.php/staf/dashboard/detail_project/'.$row->kode_project); ?>" data-toggle="tooltip" title="Delete" class="btn btn-md btn-danger"><i class="fa fa-file-text-o"></i> Detail Job</a>
                                                </div>
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

<!DOCTYPE html>
<!--[if IE 9]>         <html class="no-js lt-ie10" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
    <head>
        <?php $this->load->view('./include/include_style.php'); ?>
    </head>
    <body>
        <div id="page-wrapper">
            <div id="page-container" class="sidebar-partial sidebar-visible-lg sidebar-no-animations">

                <?php $this->load->view('./include/side_bar.php'); ?>

                <!-- Main Container -->
                <div id="main-container">

                    <!-- Page content -->
                    <div id="page-content">

                        <!-- Datatables Header -->
                        <div class="content-header">
                            <div class="header-section">
                                <h1>
                                    <i class="fa fa-building"></i>Archive<br><small></small>
                                </h1>
                            </div>
                        </div>
                        <ul class="breadcrumb breadcrumb-top">
                            <li><a href="<?php echo base_url('index.php/staf/dashboard/'); ?>">Home</a></li>
                            <li><a href="<?php echo base_url('index.php/staf/dashboard/archive'); ?>">Archive</a></li>
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
                                            <th class="text-center">Nama Project</th>
                                            <th class="text-center">Order By</th>
                                            <th class="text-center">Deadline</th>
                                            <th class="text-center">Project Type</th>
                                            <th class="text-center">Status Project</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; foreach ($data_project as $row): ?>
                                        <tr>
                                            <td class="text-center"><?php echo $no++; ?></td>
                                            <td class="text-center"><?php echo $row->project_name; ?></td>
                                            <td class="text-center"><?php echo $row->ae_name; ?></td>
                                            <td class="text-center"><?php echo $row->deadline_project; ?></td>
                                            <td class="text-center"><?php echo $row->project_type; ?></td>
                                            <td class="text-center">
                                                <?php
                                                if ($row->status_project == 'ACTIVE'){
                                                    echo '<b><span class="label label-success"><i class="fa fa-asterisk fa-spin text-default"></i> ACTIVE</span></b>';
                                                } else if ($row->status_project == 'PENDING'){
                                                    echo '<b><span class="label label-warning"><i class="fa fa-recycle fa-spin text-defailt"></i> PENDING</span></b>';
                                                } else if ($row->status_project == 'FINISH'){
                                                    echo '<b><span class="label label-info"><i class="hi hi-flag"></i> FINISH</span></b>';
                                                }
                                              ?>

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

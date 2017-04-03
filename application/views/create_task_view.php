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
                        <!-- Dashboard Header -->
                        <div class="content-header">
                            <div class="header-section">
                                <h1>
                                <i class="fa fa-ticket"></i>Create Request<br><small></small>
                                </h1>
                            </div>
                        </div>
                        <ul class="breadcrumb breadcrumb-top">
                            <li><a href="<?php echo base_url(); ?>">Projects</a></li>
                            <li><a href="<?php echo base_url('welcome/task_list/'.$kode_project);?>">Project Detail</a></li>
                            <li><a href=" <?php echo base_url('welcome/create_task'); ?> ">Create Request</a></li>
                        </ul>

                        <div class="row">
                            <div class="col-md-7">
                                <div class="block">
                                    <div class="block-title">
                                        <h2><strong>Request Form</strong></h2>
                                    </div>
                                    <form action="<?php echo base_url('welcome/save_new_task'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Request by &nbsp;:</label>
                                            <div class="col-md-9">
                                            <?php foreach ($data_project as $row_data_project): ?>
                                                <p class="form-control-static"><?php echo $row_data_project->ae_name; ?></p>
                                                <input type="hidden" name="name_ae" value="<?php echo $row_data_project->ae_name; ?>">
                                                <input type="hidden" name="kode_project" value="<?php echo $row_data_project->kode_project; ?>">

                                            <?php endforeach ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Request Title</label>
                                            <div class="col-md-9">
                                                <input type="text" id="example-text-input" required name="title_task" class="form-control" value="<?php echo $title_task; ?>" >
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-textarea-input">Request Brief</label>
                                            <div class="col-md-9">
                                                <textarea id="example-textarea-input" required name="keterangan" rows="9" class="form-control"></textarea>
                                                <script>
                                                      CKEDITOR.replace('example-textarea-input');
                                                </script>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-file-multiple-input">Attachment <br><span style="color: red;">file_type[.zip, .pdf, .rar]</span></label>
                                            <div class="col-md-9">
                                                <input type="file" id="example-file-multiple-input" name="task_file">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="start-select">When Oranyelab's Team should work for this request?</label>
                                            <?php
                                            $data = array('Not urgent, As soon as possible','in Next 2 Day','Tomorrow','Urgent, Start Now!');
                                            ?>
                                            <div class="col-md-9">
                                                <select id="start-select" name="work_request" class="form-control" size="1">
                                                    <?php for ($i = 0; $i < count($data); $i++): ?>
                                                    <option value="<?php echo $data[$i]; ?>"><?php echo $data[$i]; ?></option>
                                                    <?php endfor ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group form-actions">
                                            <div class="col-md-9 col-md-offset-3">
                                                <button type="submit" name="create_task" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Submit</button>
                                                <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Reset</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="col-md-5">
                                <div class="block">
                                        <div class="block-title">
                                        <h2><strong>Project Phase</strong> Recommendation</h2>
                                        </div>

                                        <div class="widget" style="border:1px solid;">
                                            <div class="widget-advanced widget-advanced-alt">
                                                <h4>&nbsp;&nbsp;Web / App (mobile & desktop) Project</h4>
                                                <div class="widget-main">
                                                    <div class="row text-center">
                                                        <div class="col-xs-6 col-lg-3">
                                                            <h5>
                                                            <strong>VISUAL<br/>DESIGNER</strong><br>
                                                            <small>Phase 1</small>
                                                            </h5>
                                                        </div>
                                                        <div class="col-xs-6 col-lg-3">
                                                            <h5>
                                                            <strong>FRONTEND PROGRAMMER</strong><br>
                                                            <small>Phase 2</small>
                                                            </h5>
                                                        </div>
                                                        <div class="col-xs-6 col-lg-3">
                                                            <h5>
                                                            <strong>BACKEND PROGRAMMER</strong><br>
                                                            <small>Phase 3</small>
                                                            </h5>
                                                        </div>
                                                        <div class="col-xs-6 col-lg-3">
                                                            <h5>
                                                            <strong></strong><br>
                                                            <small></small>
                                                            </h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="widget" style="border:1px solid;">
                                            <div class="widget-advanced widget-advanced-alt">
                                                <h4>&nbsp;&nbsp;Ads Project</h4>
                                                <div class="widget-main">
                                                    <div class="row text-center">
                                                        <div class="col-xs-6 col-lg-3">
                                                            <h5>
                                                            <strong>VISUAL<br/>DESIGNER</strong><br>
                                                            <small>Phase 1</small>
                                                            </h5>
                                                        </div>
                                                        <div class="col-xs-6 col-lg-3">
                                                            <h5>
                                                            <strong>FRONTEND PROGRAMMER</strong><br>
                                                            <small>Phase 2</small>
                                                            </h5>
                                                        </div>
                                                        <div class="col-xs-6 col-lg-3">
                                                            <h5>
                                                            <strong></strong><br>
                                                            <small></small>
                                                            </h5>
                                                        </div>
                                                        <div class="col-xs-6 col-lg-3">
                                                            <h5>
                                                            <strong></strong><br>
                                                            <small></small>
                                                            </h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="widget" style="border:1px solid;">
                                            <div class="widget-advanced widget-advanced-alt">
                                                <h4>&nbsp;&nbsp;Game Project</h4>
                                                <div class="widget-main">
                                                    <div class="row text-center">
                                                        <div class="col-xs-6 col-lg-3">
                                                            <h5>
                                                            <strong>VISUAL<br/>DESIGNER</strong><br>
                                                            <small>Phase 1</small>
                                                            </h5>
                                                        </div>
                                                        <div class="col-xs-6 col-lg-3">
                                                            <h5>
                                                            <strong>GAME PROGRAMMER</strong><br>
                                                            <small>Phase 2</small>
                                                            </h5>
                                                        </div>
                                                        <div class="col-xs-6 col-lg-3">
                                                            <h5>
                                                            <strong></strong><br>
                                                            <small></small>
                                                            </h5>
                                                        </div>
                                                        <div class="col-xs-6 col-lg-3">
                                                            <h5>
                                                            <strong></strong><br>
                                                            <small></small>
                                                            </h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="widget" style="border:1px solid;">
                                            <div class="widget-advanced widget-advanced-alt">
                                                <h4>&nbsp;&nbsp;Key Visual Project</h4>
                                                <div class="widget-main">
                                                    <div class="row text-center">
                                                        <div class="col-xs-6 col-lg-3">
                                                            <h5>
                                                            <strong>VISUAL<br/>DESIGNER</strong><br>
                                                            <small>Phase 1</small>
                                                            </h5>
                                                        </div>
                                                        <div class="col-xs-6 col-lg-3">
                                                            <h5>
                                                            <strong></strong><br>
                                                            <small></small>
                                                            </h5>
                                                        </div>
                                                        <div class="col-xs-6 col-lg-3">
                                                            <h5>
                                                            <strong></strong><br>
                                                            <small></small>
                                                            </h5>
                                                        </div>
                                                        <div class="col-xs-6 col-lg-3">
                                                            <h5>
                                                            <strong></strong><br>
                                                            <small></small>
                                                            </h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="widget" style="border:1px solid;">
                                            <div class="widget-advanced widget-advanced-alt">
                                                <h4>&nbsp;&nbsp;Writing Project</h4>
                                                <div class="widget-main">
                                                    <div class="row text-center">
                                                        <div class="col-xs-6 col-lg-3">
                                                            <h5>
                                                            <strong>Content<br/>Writter</strong><br>
                                                            <small>Phase 1</small>
                                                            </h5>
                                                        </div>
                                                        <div class="col-xs-6 col-lg-3">
                                                            <h5>
                                                            <strong></strong><br>
                                                            <small></small>
                                                            </h5>
                                                        </div>
                                                        <div class="col-xs-6 col-lg-3">
                                                            <h5>
                                                            <strong></strong><br>
                                                            <small></small>
                                                            </h5>
                                                        </div>
                                                        <div class="col-xs-6 col-lg-3">
                                                            <h5>
                                                            <strong></strong><br>
                                                            <small></small>
                                                            </h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
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

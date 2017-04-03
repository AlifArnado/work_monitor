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
                        <!-- Tickets Header -->
                        <div class="content-header">
                            <div class="header-section">
                                <h1>
                                    <i class="fa fa-ticket"></i>Create Project<br><small>Easily push project to Oranyelab Team!</small>
                                </h1>
                            </div>
                        </div>
                        <ul class="breadcrumb breadcrumb-top">
                            <li><a href="<?php echo base_url(); ?>">Projects</a>
                            </li>
                            <li><a href=" <?php echo base_url(); ?>welcome/create_project">Create Projects</a>
                            </li>

                        </ul>
                        <!-- END Tickets Header -->

                        <div class="row">
                            <div class="col-md-7">
                                <div class="block">
                                    <div class="block-title">
                                        <h2><strong>Order Form</strong></h2>
                                    </div>

                                    <form action="<?php echo base_url('index.php/welcome/submit_create_project'); ?>" method="POST" enctype="multipart/form-data" class="form-horizontal form-bordered" >
                                        <div class="form-group">
                                            <!-- <label class="col-md-3 control-label">Order by:</label> -->
                                            <div class="col-md-9">
                                                <input type="hidden" name="ae_name" value="<?php echo $this->session->userdata('nama'); ?>" placeholder="<?php echo $this->session->userdata('nama'); ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Project Title</label>
                                            <div class="col-md-9">
                                                <input type="text" required id="example-text-input" name="project_title" class="form-control" >
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-textarea-input">Brief</label>
                                            <div class="col-md-9">
                                                <textarea required id="example-textarea-input" name="keterangan" placeholder="Letakan link lainnya" rows="9" class="form-control"></textarea>
                                                <script>
                                                      CKEDITOR.replace('example-textarea-input');
                                                </script>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-file-multiple-input">Attachment <br><span style="color: red;">file_type[.zip, .pdf, .rar]</span></label>
                                            <div class="col-md-9">
                                            <input type="file" id="example-file-multiple-input" name="images">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Deadline</label>
                                            <div class="col-md-9">
                                                <input type="date" required id="example-text-input" name="deadline" class="form-control" >
                                                 <span class="help-block">Your deadline may conflict with other projects</span>
                                            </div>
                                        </div>
                                        <?php
                                            $project_type = array('Website / Microsite', 'Desktop & Mobile App', 'HTML5 Ads', 'Key Visual', 'Game', 'Other');
                                            $load = array('in Next 2 Week', 'in Next Week', 'Not urgent, As soon as possible', 'Urgent, Start Now!');
                                         ?>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-select">Project Type</label>
                                            <div class="col-md-9">
                                                <select required id="example-select" name="project_type" class="form-control" size="1">
                                                    <?php for ($n = 0 ; $n < count($project_type); $n++): ?>
                                                        <option value="<?php echo $project_type[$n]; ?>"><?php echo $project_type[$n]; ?></option>
                                                    <?php endfor ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="start-select">When Oranyelab's Team should run this project?</label>
                                            <div class="col-md-9">
                                                <select required id="start-select" name="project_load" class="form-control" size="1">
                                                    <?php for ($i = 0; $i < count($load); $i++): ?>
                                                        <option value="<?php echo $load[$i]; ?>"><?php echo $load[$i]; ?></option>
                                                    <?php endfor ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group form-actions">
                                            <div class="col-md-9 col-md-offset-3">
                                                <button type="submit" class="btn btn-sm btn-primary" name="add_project"><i class="fa fa-angle-right"></i> Submit</button>
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

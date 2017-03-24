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

                        <!-- Calendar Header -->
                        <div class="content-header">
                            <div class="header-section">
                                <h1>
                                    <i class="fa fa-calendar"></i>Calendar<br><small>An awesome calendar for your events!</small>
                                </h1>
                            </div>
                        </div>
                        <ul class="breadcrumb breadcrumb-top">
                            <li>Components</li>
                            <li><a href="<?php echo base_url('index.php/welcome/calender'); ?>">Calendar</a></li>
                        </ul>
                        <!-- END Calendar Header -->

                        <!-- FullCalendar Content -->
                        <div class="block block-alt-noborder full">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="block-section">
                                        <a class="btn btn-block btn-primary" href="<?php echo base_url('index.php/welcome/input_event'); ?>"> <i class="fa fa-calendar"></i> Add Event </a>
                                    </div>
                                    <div class="block-section">
                                        <div class="block-section text-center text-muted">
                                            <small><em><i class="fa fa-arrows"></i> Drag and Drop Events on the Calendar</em></small>
                                        </div>
                                        <ul class="calendar-events">
                                            <li style="background-color: #1abc9c">Work</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div id="calendar"></div>
                                </div>
                            </div>
                        </div>
                        <!-- END FullCalendar Block -->
                        <!-- END FullCalendar Content -->

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

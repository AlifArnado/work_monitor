<!DOCTYPE html>
<!--[if IE 9]>         <html class="no-js lt-ie10" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
    <head>
        <?php $this->load->view('./include/include_style.php'); ?>
    </head>
    <body>

    <!-- Error Container -->
        <div id="error-container">
            <div class="error-options">
                <!-- <h3><i class="fa fa-chevron-circle-left text-muted"></i> <a href="page_ready_search_results.html">Go Back</a></h3> -->
            </div>
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2 text-center">
                    <h1 class="animation-hatch"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Maintenance System Woku</h1>
                    <h2 class="h3">Oops, we are sorry but you do not have permission to access this page..</h2>
                </div>
               <!--  <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                    <form action="page_ready_search_results.html" method="post">
                        <input type="text" id="search-term" name="search-term" class="form-control input-lg" placeholder="Search ProUI..">
                    </form>
                </div> -->
            </div>
        </div>
        <!-- END Error Container -->

        <?php $this->load->view('./include/include_script.php'); ?>
    </body>
</html>

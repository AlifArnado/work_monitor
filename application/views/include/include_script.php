<!-- jQuery, Bootstrap.js, jQuery plugins and Custom JS code -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src=" <?php //echo base_url('assets/js/vendor/jquery.min.js'); ?> "></script>
<script src=" <?php echo base_url('assets/js/vendor/bootstrap.min.js'); ?> "></script>
<script src=" <?php echo base_url('assets/js/plugins.js'); ?> "></script>
<script src=" <?php echo base_url('assets/js/app.js'); ?> "></script>
<!-- Google Maps API Key (you will have to obtain a Google Maps API key to use Google Maps) -->
<!-- For more info please have a look at https://developers.google.com/maps/documentation/javascript/get-api-key#key -->
<!-- Load and execute javascript code used only in this page -->
<script src=" <?php echo base_url('assets/js/pages/index.js'); ?> "></script>

<!-- Load and execute javascript code used only in this page -->
<script src="<?php echo base_url('assets/js/pages/tablesDatatables.js'); ?> "></script>
<script>$(function(){ TablesDatatables.init(); });</script>

<script src="<?php echo base_url('assets/js/pages/login.js'); ?>"></script>
<script>$(function(){ Login.init(); });</script>
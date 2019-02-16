<?php // Filename: display-records.php
// This handles the UI for displaying the records it reqires the header, content and footer code
$pageTitle = "Record Management";
require 'inc/layout/header.inc.php'; 
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
        <?php require "inc/display/content.inc.php"; ?>
        </div>
    </div> <!-- end row -->
</div> <!-- end container -->
<?php require 'inc/layout/footer.inc.php'; ?>
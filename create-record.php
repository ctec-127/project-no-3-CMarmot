<?php // Filename: create-record.php
// This will provide the UI to add a new record to the file
$pageTitle = "Create Record";
// the require is to get the header file (in layout) which then requires the config and nav
require 'inc/layout/header.inc.php'; 
?>

<div class="container">
<!-- bootstrap for 12 large columns with margin top of 5 -->
	<div class="row mt-5">
		<div class="col-lg-12">
			<h1>Create a New Record</h1>
			<!-- the __DIR__ is because php wants to know the directory of the required files -->
			<?php require __DIR__ .'/inc/create/content.inc.php'; ?>
			<?php require __DIR__ .'/inc/create/form.inc.php' ?>
		</div>
    </div>
</div>

<?php require 'inc/layout/footer.inc.php'; ?>
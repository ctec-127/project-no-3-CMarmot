<?php // Filename: search-records.php
// This creates the search functionality across all fields of the table

$pageTitle = "Search Records";
// These are the required files to show the UI and allow searching and show results
require 'inc/layout/header.inc.php';
require 'inc/db/mysqli_connect.inc.php';
require 'inc/functions/functions.inc.php';
require 'inc/app/config.inc.php';
?>

<div class="container">
    <div class="row">
        <div class="col-lg-12 mt-4">
        <?php 
        // If there is a request to search...
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                // If there is content in the search field, see if that content is in the db
                if(!empty($_POST['search'])){
                    $sql = "SELECT * FROM $db_table WHERE " . '"' . $_POST["search"] . '"' . " IN (student_id, first_name, last_name, email, phone) ORDER BY last_name ASC";
                    // $sql = "SELECT * FROM student WHERE student_id LIKE '%val%' or field2 LIKE '%val%'
                    $result = $db->query($sql);
// IF there are no matching results, display message that nothing matches, display sad face
                    if ($result->num_rows == 0) {
                        echo "<p class=\"display-4 mt-4 text-center\">No results found for \"<strong>{$_POST['search']}</strong>\"</p>";
                        echo '<img class="mx-auto d-block mt-4" src="img/frown.png" alt="A sad face">';
                        echo "<p class=\"display-4 mt-4 text-center\">Please try again.</p>";
                        // echo "<h2 class=\"mt-4\">There are currently no records to display for <strong>last names</strong> starting with <strong>$filter</strong></h2>";
                    // IF there are results, display them in the usual table format
                    } else {
                        echo "<h2 class=\"mt-4 text-center\">$result->num_rows record(s) found for \"" . $_POST['search'] . '"</h2>';
                        display_record_table($result);
                    }
                } else {
                    // If the search request is empty, display a message that it needs content, display no-smile face
                    echo "<p class=\"display-4 mt-4 text-center\">I can't search if you don't give<br>me something to search for.</p>";
                    echo '<img class="mx-auto d-block mt-4" src="img/nosmile.png" alt="A face with no smile">';
                }
            }
        ?>
        </div>
    </div>
</div>

<?php require 'inc/layout/footer.inc.php';?>
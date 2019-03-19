<?php // Filename: advanced-search.php ?>


<?php 
$pageTitle="Advanced Search";
require_once 'inc/layout/header.inc.php'; 
require_once 'inc/db/mysqli_connect.inc.php';
require_once 'inc/functions/functions.inc.php';


?>


<?php


// searching by gpa because that's where I started

// $sql = 'SELECT DISTINCT gpa FROM student_v2';
// $result = $db->query($sql);

// for sticky select
// $gpa = '';

// $sidSQL was squirrely so I'm setting it here 
$sidSQL='';
$selected = '';
$result = '';


// if (isset($_POST['gpa'])) {
//     $gpa = $_POST['gpa'];
// }
?>
<!-- displaying the form -->
<?php
require_once 'inc/display/search-form.inc.php';
?>

<?php 
// Code to display search results
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // build SQL


    // STUFF BRUCE AND CORLENE MODIFIED
    // >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
    if (!empty($_POST['student_id'])) {
        $student_id = $_POST['student_id'];
        $sidSQL = " AND student_id = " . '"' . $student_id . '"';
    } else {
        $sidSQL = '';
    }


    if (!empty($_POST['last_name'])) {
        $last_name = $_POST['last_name'];
        $lastSQL = " AND last_name = " . '"' . $last_name . '"';
    } else {
        $lastSQL = '';
    }

    if (!empty($_POST["first_name"])) {
        $first_name = $_POST['first_name'];
        $firstSQL = " AND first_name = " . '"' . $first_name . '"';
    } else {
        $firstSQL = '';
    }

    if (!empty($_POST["email"])) {
        $email = $_POST['email'];
        $emailSQL = " AND email = " . '"' . $email . '"';
    } else {
        $emailSQL = '';
    }

    if (!empty($_POST["phone"])) {
        $phone = $_POST['phone'];
        $phoneSQL = " AND phone = " . '"' . $phone . '"';
    } else {
        $phoneSQL = '';
    }

    if (!empty($_POST["degree_program"])) {
        $degree_program = $_POST['degree_program'];
        $degree_programSQL = " AND degree_program = " . '"' . $degree_program . '"';
    } else {
        $degree_programSQL = '';
    }

    if (!empty($_POST["financial_aid"])) {
        $financial_aid = $_POST['financial_aid'];
        $financial_aidSQL = " AND financial_aid = " . '"' . $financial_aid . '"';
    } else {
        $financial_aidSQL = '';
    }

    if (!empty($_POST["graduation_date"])) {
        $graduation_date = $_POST['graduation_date'];
        $graduation_dateSQL = " AND graduation_date = " . '"' . $graduation_date . '"';
    } else {
        $graduation_dateSQL = '';
    }

   

    // trying to get gpa to work when empty
    if (!empty($_POST["gpa"])) {
        $gpa = $_POST['gpa'];
        $gpaSQL= $gpa;
        $sql = 'SELECT * FROM student_v2 WHERE gpa=' . '"' . $_POST['gpa'] .'"' . $lastSQL .$firstSQL. $phoneSQL.$financial_aidSQL.$sidSQL.$emailSQL.$degree_programSQL.$graduation_dateSQL;
    } 
   if (empty($_POST["gpa"])) {
    //    setting the gpa to all possible values
       
        $sql = 'SELECT * FROM student_v2 WHERE (gpa="0" OR gpa="1" OR gpa="2" OR gpa="3" OR gpa="4" OR gpa="5" OR gpa="6" OR gpa="7")'. $lastSQL .$firstSQL. $phoneSQL.$financial_aidSQL.$sidSQL.$emailSQL.$degree_programSQL.$graduation_dateSQL;
    }

// various tests commented out
//  $sql = 'SELECT * FROM student_v2 WHERE gpa=' . '"' . $_POST['gpa'] .'"' . $lastSQL .$firstSQL. $phoneSQL.$financial_aidSQL;

//  $sql ='SELECT * FROM student_v2 WHERE gpa="4" AND last_name = "Rojas"';
//  $sql ='SELECT * FROM student_v2 WHERE (gpa="4" OR gpa = "6") AND last_name= "Ankrum"';

    // echo the info to see if it is getting the right stuff

    // echo $sql;
   
    // why does the result happen without submit????
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        echo "<h3 class='alert alert-success mb-4'>$result->num_rows results were found</h3>";
        ?>
    <table class="table table-hover">
        <thead class="thead-dark"><tr><th>Student ID</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Phone</th><th>GPA</th><th>Degree Program</th><th>Financial Aid</th><th>Graduation Date</th></tr></thead>
            <?php 
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>{$row["student_id"]}</td><td>{$row["first_name"]}</td><td>{$row["last_name"]}</td><td>{$row["email"]}</td><td>{$row["phone"]}</td><td>{$row["gpa"]}</td><td>{$row["degree_program"]}</td><td>{$row["financial_aid"]}</td><td>{$row["graduation_date"]}</td>";
                    echo "</tr>";
            }    
            ?>
    </table>
            <?php
            } else {
                echo "<h3 class=\"mt-5\">Rut-roh. No data was found for your query.</h3>";
            }
        } 
            ?>
   </div> <!-- Closing column -->
   
</div> <!-- Closing container -->
<?php require_once 'inc/layout/footer.inc.php';?>


<?php // Filename: advcanced-search.php ?>


<?php 
$pageTitle="Advanced Search";
require_once 'inc/layout/header.inc.php'; 
require_once 'inc/db/mysqli_connect.inc.php';?>


<?php

// trying unset 
    unset($first);
    unset($last);
    unset($sid);
    unset($email);
    unset($phone);
    unset($gpa);
    unset($fin);
    unset($degree);
    unset($graduation);

// searching by gpa
$sql = 'SELECT DISTINCT gpa FROM student_v2';
$result = $db->query($sql);

// for sticky select
$gpa = '';
// $sidSQL was squirrely so I'm setting it here 
$sidSQL='';
$selected = '';

if (isset($_POST['gpa'])) {
    $gpa = $_POST['gpa'];
}
?>
<!-- displaying the form -->
<div class="container bg-light p-3">
    <div class="col-12 mt-5">
        <h1 class="display-4 font-weight-bold">Advanced Search</h1>
        <p class="mb-5">CTEC 127 - Winter 2019</p>

        <form action="<?=htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST" onsubmit class="mb-3">
       

    
  
     <!-- Each search term gets a div -->
  
        <div class="form-group">
            <label for="first_name">Student ID</label>
                <input type="text" id="student_id" name="student_id" class="form-control w-25" placeholder="Enter a Student ID" value="<?=(isset($_POST["student_id"]) ? $_POST["student_id"]:'') ?>">  
        </div>

        <div class="form-group">
            <label for="first_name">First Name</label>
                <input type="text" id="first_name" name="first_name" class="form-control w-25" placeholder="Enter a First Name" value="<?=(isset($_POST["first_name"]) ? $_POST["first_name"]:'') ?>">  
        </div>
        <div class="form-group">
            <label for="last_name">Last Name</label>
                <input type="text" id="last_name" name="last_name" class="form-control w-25" placeholder="Enter a Last Name" value="<?=(isset($_POST["last_name"]) ? $_POST["last_name"]:'') ?>">       
        </div>
        
        <div class="form-group">
            <label for="email">Email</label>
                <input type="text" id="email" name="email" class="form-control w-25" placeholder="Enter an Email" value="<?=(isset($_POST["email"]) ? $_POST["email"]:'') ?>">  
        </div>

        <div class="form-group">
            <label for="phone">Phone</label>
                <input type="text" id="phone" name="phone" class="form-control w-25" placeholder="Enter a Phone Number" value="<?=(isset($_POST["phone"]) ? $_POST["phone"]:'') ?>">  
        </div>

        <div class="form-group">
            <label for="degree_program">Degree Program</label>
                <input type="text" id="degree_program" name="degree_program" class="form-control w-25" placeholder="Enter a Degree" value="<?=(isset($_POST["degree_program"]) ? $_POST["degree_program"]:'') ?>"> 
        </div>

        <div class="form-group">
            <label for="last_name">GPA</label>
                <input type="text" id="gpa" name="gpa" class="form-control w-25" placeholder="Enter a GPA" value="<?=(isset($_POST["gpa"]) ? $_POST["gpa"]:'') ?>">       
        </div>

        <div class="form-group">
            <label for="phone">Financial Aid</label>
                <input type="text" id="financial_aid" name="financial_aid" class="form-control w-25" placeholder="Financial Aid? (1 or 0)" value="<?=(isset($_POST["financial_aid"]) ? $_POST["financial_aid"]:'') ?>">  
        </div>

<!-- Graduation Date needs to be in date format -->
        <div>
            <label for="graduation_date">Graduation date:</label>
            <br>
            <input type="date" id="graduation_date" name="graduation_date"
            value="<?=(isset($_POST["graduation_date"]) ? $_POST["graduation_date"]:'') ?>">  
            <br><br>
       </div>
 
        <!-- end of terms so do the Search -->
        <div class="form-group">
   
            <input type="submit" value="Search" class="btn btn-primary" onclick="submitClick()"/>
        </div>
    </form>



<?php 
// Code to display search results
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // build SQL
    // be sure to handle if no gpa is included

    // STUFF BRUCE AND CORLENE MODIFIED
    // >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
    if (!empty($_POST['student_id'])) {
        $student_id = $_POST['student_id'];
        $sidSQL = " AND student_id = " . '"' . $student_id . '"';
    } else {
        $sidSQL = '';
    }


    }if (!empty($_POST['last_name'])) {
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
    } else {
        $gpaSQL ='"0" OR "1" OR "2" OR "3" OR "4" OR "5"';
        $sql = 'SELECT * FROM student_v2 WHERE (gpa="0" OR gpa="1" OR gpa="2" OR gpa="3" OR gpa="4" OR gpa="5" OR gpa="6" OR gpa="7")'. $lastSQL .$firstSQL. $phoneSQL.$financial_aidSQL.$sidSQL.$emailSQL.$degree_programSQL.$graduation_dateSQL;
    }

// various tests commented out
//  $sql = 'SELECT * FROM student_v2 WHERE gpa=' . '"' . $_POST['gpa'] .'"' . $lastSQL .$firstSQL. $phoneSQL.$financial_aidSQL;

//  $sql ='SELECT * FROM student_v2 WHERE gpa="4" AND last_name = "Rojas"';
// $sql ='SELECT * FROM student_v2 WHERE (gpa="4" OR gpa = "6") AND last_name= "Ankrum"';
     echo $sql;
   
 
    
    $result = $db->query($sql);
  



// Display results and handle no results
 

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
        

            ?>
   </div> <!-- Closing column -->
   
</div> <!-- Closing container -->
<?php require_once 'inc/layout/footer.inc.php';?>


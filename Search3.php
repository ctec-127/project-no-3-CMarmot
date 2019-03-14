<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Search Attempt 3</title>
</head>
<body>
<?php 
require_once 'inc/layout/header.inc.php'; 
require_once 'inc/db/mysqli_connect.inc.php';?>
<?php
// searching by gpa
$sql = 'SELECT DISTINCT gpa FROM student_v2';
$result = $db->query($sql);

// for sticky select
$gpa = '';

$selected = '';

if (isset($_POST['gpa'])) {
    $gpa = $_POST['gpa'];
}
?>
<!-- displaying the form -->
<div class="container bg-light p-3">
    <div class="col-12 mt-5">
        <h1 class="display-4 font-weight-bold">Students by GPA</h1>
        <p class="mb-5">CTEC 127 - Winter 2019</p>

        <form action="<?=htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST" class="mb-3">
       
                        
       
     <!-- Creating the input fields for search -->
        <div class="form-group">
            <label for="last_name">GPA</label>
                <input type="text" id="gpa" name="gpa" class="form-control w-25" placeholder="Enter a GPA" value="<?=(isset($_POST["gpa"]) ? $_POST["gpa"]:'') ?>">       
        </div>

        <div class="form-group">
            <label for="last_name">Last Name</label>
                <input type="text" id="last_name" name="last_name" class="form-control w-25" placeholder="Enter a Last Name" value="<?=(isset($_POST["last_name"]) ? $_POST["last_name"]:'') ?>">       
        </div>
        <div class="form-group">
            <label for="first_name">First Name</label>
                <input type="text" id="first_name" name="first_name" class="form-control w-25" placeholder="Enter a First Name" value="<?=(isset($_POST["first_name"]) ? $_POST["first_name"]:'') ?>">  
        </div>
        <div class="form-group">
            <input type="submit" value="Search" class="btn btn-primary">
        </div>
        </form>

<?php 
// Code to display search results
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // build SQL
    // be sure to handle if no population is included

    // STUFF BRUCE AND CORLENE MODIFIED
    // >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
    if (!empty($_POST['last_name'])) {
        $last_name = $_POST['last_name'];
        $lastSQL = " AND last_name = " . '"' . $last_name . '"';
        echo $last_name;
    } else {
        $lastSQL = '';
    }

    if (!empty($_POST["first_name"])) {
        $first_name = $_POST['first_name'];
        $firstSQL = " AND first_name = " .$first_name;
    } else {
        $firstSQL = '';
    }

    $sql = 'SELECT * FROM student_v2 WHERE gpa=' . '"' . $_POST['gpa'] .'"' . $lastSQL .$firstSQL;
    // $sql ='SELECT * FROM student_v2 WHERE gpa="4" AND last_name = "Rojas"';
     echo $sql;
 
    
    $result = $db->query($sql);
  



// Display results and handle no results
 

    if ($result->num_rows > 0) {
        echo "<h3 class='alert alert-success mb-4'>$result->num_rows results were found</h3>";
        ?>
    <table class="table table-hover">
        <thead class="thead-dark"><tr><th>First Name</th><th>Last Name</th><th>Email</th><th>Phone</th><th>GPA</th><th>Degree Program</th><th>Financial Aid</th><th>Graduation Date</th></tr></thead>
            <?php 
         
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>{$row["first_name"]}</td><td>{$row["last_name"]}</td><td>{$row["email"]}</td><td>{$row["phone"]}</td><td>{$row["gpa"]}</td><td>{$row["degree_program"]}</td><td>{$row["financial_aid"]}</td><td>{$row["graduation_date"]}</td>";
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

</body>
</html> 
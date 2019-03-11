<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Advanced Search</title>
</head>
<body>
<?php require_once 'inc/db/mysqli_connect.inc.php';?>
<?php
$sql = 'SELECT DISTINCT gpa FROM student_v2';
$result = $db->query($sql);

// for sticky select
$gpa = '';
$selected = '';

if (isset($_POST['gpa'])) {
    $region = $_POST['gpa'];
}
?>

<div class="container bg-light p-3">
    <div class="col-12 mt-5">
        <h1 class="display-4 font-weight-bold">Students by GPA</h1>
        <p class="mb-5">CTEC 127 - Winter 2019</p>

        <form action="<?=htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST" class="mb-3">
            <div class="form-group">
                <label for="region">Select a GPA</label>
                    <select class="form-control w-25" name="gpa" id="gpa">
                        <?php
                        
                        while ($row = $result->fetch_assoc()) {
                            // sticky select check
                            if ($row['gpa'] == $gpa) {
                                $selected = ' selected';
                            }

                            echo "<option value=\"" . $row['gpa'] . "\" $selected>" . $row['gpa'] . "</option>\n";
                            // reset this variable after a select match may have been made
                            $selected = '';
                        }
                        ?>
                    </select>
            </div>
            <input type="submit" value="Search" class="btn btn-primary mb-2">
        </form>
           

<?php 
// Code to display search results
if ($_SERVER['REQUEST_METHOD'] == 'POST')
    $sql = "SELECT * FROM student_v2 WHERE gpa=" . '"' . $_POST["gpa"] . '"';
    $result = $db->query($sql);
 

    if ($result->num_rows > 0) {
        echo "<h3 class='alert alert-success mb-4'>$result->num_rows results were found</h3>";
        ?>
    <table class="table table-hover">
        <thead class="thead-dark"><tr><th>First Name</th><th>Last Name</th><th>Email</th><th>Phone</th><th>Degree Program</th><th>Financial Aid</th><th>Graduation Date</th></tr></thead>
            <?php 
         
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>{$row["first_name"]}</td><td>{$row["last_name"]}</td><td>{$row["email"]}</td><td>{$row["phone"]}</td><td>{$row["degree_program"]}</td><td>{$row["financial_aid"]}</td><td>{$row["graduation_date"]}</td>";
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
</body>
</html> 
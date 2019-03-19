<?php // Filename: search-form.inc.php ?>
<!-- Moved the form out of main advanced search -->



<div class="container bg-light p-3">
    <div class="col-12 mt-5">
        <h1 class="display-4 font-weight-bold">Advanced Search</h1>
        <p class="mb-5">CTEC 127 - Winter 2019</p>

        <form action="<?=htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST"  class="mb-3">
      
       
     
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
            <label for="gpa">GPA</label>
                <input type="text" id="gpa" name="gpa" class="form-control w-25" placeholder="Enter a GPA" value="<?=(isset($_POST["gpa"]) ? $_POST["gpa"]:'') ?>">       
        </div>

        <div class="form-group">
            <label for="financial_aid">Financial Aid</label>
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

<!-- Here is the Submit -->
        <div class="form-group">
            <input type="submit" value="Search" class="btn btn-primary"/>
        </div>

        

    </form>
    <!-- give an option to clear the form -->


    <form id='php_clear_form' action="<?php echo $_SERVER['PHP_SELF']; ?>"  $_POST=array();accept-charset="utf-8"> <!-- When this posts it reloads the page -->
    <input type="submit" name="clear" class="btn btn-primary" value="Reset Form"></a>
 
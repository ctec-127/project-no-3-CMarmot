<?php // Filename: form.inc.php ?>

<!-- Note the use of sticky fields below -->
<!-- Note the use of the PHP Ternary operator
Scroll down the page
http://php.net/manual/en/language.operators.comparison.php#language.operators.comparison.ternary
-->
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
    <label class="col-form-label" for="first">First Name </label>
    <input class="form-control" type="text" id="first" name="first" value="<?php echo (isset($first) ? $first : '');?>">
    <br>
    <label class="col-form-label" for="last">Last Name </label>
    <input class="form-control" type="text" id="last" name="last" value="<?php echo (isset($last) ? $last : '');?>"">
    <br>
    <label class="col-form-label" for="sid">Student ID </label>
    <input class="form-control" type="text" id="sid" name="sid" value="<?php echo (isset($sid) ? $sid: '');?>"">
    <br>
    <label class="col-form-label" for="email">Email </label>
    <input class="form-control" type="text" id="email" name="email" value="<?php echo (isset($email) ? $email : '');?>"">
    <br>
    <label class="col-form-label" for="phone">Phone </label>
    <input class="form-control" type="text" id="phone" name="phone" value="<?php echo (isset($phone) ? $phone : '');?>"">
    <br>
     <!-- Trying to add GPA -->
    <label class="col-form-label" for="gpa">GPA </label>
    <input class="form-control" type="text" id="gpa" name="gpa" value="<?php echo (isset($gpa) ? $gpa: '');?>"">
    <br>
    <!-- attempting financial aid -->
    <label class="col-form-label" for="fin">Financial Aid </label>
    <br>
    <label for="yes">
        <input type="radio" name="fin" value="1" id="yes" <?php echo $yes; ?>>
            Yes
    </label>
    <label for="no">
        <input type="radio" name="fin" value="0" id="no" <?php echo $no; ?>>
            No
    </label>
    <br>
 
    
    <!--  degree  --> 
    
    <label class="col-form-label" for="degree">Degree </label>
    <select class="form-control" name ="degree" id="degree">
        <!-- <option value="--Select--">--Select--</option> -->
        <option value ="Communications">Communications</option>
        <option value ="Ceramics">Ceramics</option>
    </select>  
   
    <br>   
    <label for="graduation">Graduation date:</label>
    <br>
    <input type="date" id="graduation" name="graduation"
       value="2019-07-22"
       min="2018-01-01" max="2030-12-31">
    <br><br>
 

    <a href="display-records.php">Cancel</a>&nbsp;&nbsp;
    <button class="btn btn-primary" type="submit">Save Record</button>
    <input type="hidden" name="id" value="<?php echo (isset($id) ? $id : '');?>">
</form>
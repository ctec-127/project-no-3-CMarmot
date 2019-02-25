<?php // Filename: form.inc.php ?>
<!-- This handles the display while creating a new record, it shows the contents of the field after it is entered -->

<!-- Note the use of sticky fields below -->
<!-- Note the use of the PHP Ternary operator
Scroll down the page
http://php.net/manual/en/language.operators.comparison.php#language.operators.comparison.ternary
-->
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
    <label class="col-form-label" for="first">First Name </label>
    <input class="form-control" type="text" id="first" name="first" value="<?php echo (isset($first) ? $first: '');?>">
    <br>
    <label class="col-form-label" for="last">Last Name </label>
    <!-- fixed mistake in next line -->
    <input class="form-control" type="text" id="last" name="last" value="<?php echo (isset($last) ? $last: '');?>"">
    <br>
    <label class="col-form-label" for="id">Student ID </label>
    <input class="form-control" type="text" id="id" name="id" value="<?php echo (isset($id) ? $id: '');?>"">
    <br>
    <label class="col-form-label" for="email">Email </label>
    <input class="form-control" type="text" id="email" name="email" value="<?php echo (isset($email) ? $email: '');?>"">
    <br>
    <label class="col-form-label" for="phone">Phone </label>
    <input class="form-control" type="text" id="phone" name="phone" value="<?php echo (isset($phone) ? $phone: '');?>"">
    <br>
    <!-- Trying to add GPA -->
    <label class="col-form-label" for="gpa">GPA </label>
    <input class="form-control" type="text" id="gpa" name="gpa" value="<?php echo (isset($gpa) ? $gpa: '');?>"">
    <br>

    <!-- attempting financial aid -->

    <label class="col-form-label" for="fin">Financial Aid </label>
    <div class="custom-control custom-radio">
    <input type="radio" class="custom-control-input" id="fin" name="fin">
    <label class="custom-control-label" for="fin" value="Yes">Yes</label>
    </div>

 
    <div class="custom-control custom-radio">
    <input type="radio" class="custom-control-input" id="fin" name="fin" checked>
    <label class="custom-control-label" for="fin" value="No">No</label>
    </div>


    <!-- attempting degree  --> 
    <label class="col-form-label" for="degree">Degree </label>
    <select class="form-control" name ="degree" id="degree">
        <option value="--Select--">--Select--</option>
        <option value ="Graphic and Web Design">Graphics and Web Design</option>
        <option value ="Web Design">Web Design</option>
    </select>  
   
    <br>   
    <a href="display-records.php">Cancel</a>&nbsp;&nbsp;
    <button class="btn btn-primary" type="submit">Save Record</button>
</form>
<?php // Filename: form.inc.php ?>


<!-- changed this to be able to get data from graduation and degree and financial aid to correctly display so can be updated -->
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
    <!-- changed from dropdown for update-->
    <label class="col-form-label" for="fin">Financial Aid (1 or 0)</label>
    <input class="form-control" type="text" id="fin" name="fin" value="<?php echo (isset($fin) ? $fin: '');?>"">
    <br>
 
    
    <!--  changed from dropdown for update--> 
    
    <label class="col-form-label" for="degree">Degree </label>
    <input class="form-control" type="text" id="degree" name="degree" value="<?php echo (isset($degree) ? $degree : '');?>"">
    <br>
  
   
    <br>   
    <label for="graduation">Graduation date:</label>
    <input class="form-control" type="date" id="graduation" name="graduation" value="<?php echo (isset($graduation) ? $graduation : '');?>"">
    <br><br>
 

    <a href="display-records.php">Cancel</a>&nbsp;&nbsp;
    <button class="btn btn-primary" type="submit">Update Record</button>
    <input type="hidden" name="id" value="<?php echo (isset($id) ? $id : '');?>">
</form>
<?php 
session_start();

if(!$_SESSION['username'])
{

    header('location:login.php');

}
else
{
  include 'functions/register_student.php';
}


 ?>
<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Events</title>
		

		<!-- CSS -->        
        
	 <?php include 'plugins/styles.php';?>
   <style>
	 label { color: #000;
    font-family: 'Trocchi', serif;
     font-size: 15px;
    font-weight: normal;
    line-height: 38px; margin: 0; }
	</style>

</head>
<body>
<?php include'plugins/navigation.php';?>
 <div id="page-wrapper">
  <div id="page-inner">
      <div class="row">
  <!-- new -->
<form class="well form-horizontal" action="<?php echo htmlentities($_SERVER['PHP_SELF'])?>" method="post"  id="contact_form">
<?php
                              if($error)
                              {
                                $obj->errorDisplay($error);
                              }
                              if($success)
                              {
                                $obj->successDisplay($success);
                              }
                          ?>
<fieldset>

<!-- Form Name -->
<legend><center><h5><b>Register Student</b></h5></center></legend><br>

<!-- Text input-->
<div class="form-group">
<label class="col-md-4 control-label" >Admission</label> 
<div class="col-md-4 inputGroupContainer">
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
<input name="adm" placeholder="Adm number" class="form-control" required  type="text">
</div>
</div>
</div>

<div class="form-group">
<label class="col-md-4 control-label">First Name</label>  
<div class="col-md-4 inputGroupContainer">
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
<input  name="first_name" placeholder="First Name" class="form-control" required  type="text">
</div>
</div>
</div>

<!-- Text input-->

<div class="form-group">
<label class="col-md-4 control-label" >Last Name</label> 
<div class="col-md-4 inputGroupContainer">
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
<input name="last_name" placeholder="Last Name" class="form-control" required  type="text">
</div>
</div>
</div>

<!-- school -->
<div class="form-group"> 
<label class="col-md-4 control-label">School</label>
<div class="col-md-4 selectContainer">
<div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
<select name="school" class="form-control selectpicker">
  <option value="">Select your School</option>
  <option>School of Engineering</option>
  <option>School of Agriculture</option>
</select>
</div>
</div>
</div>

<!-- school -->

<div class="form-group"> 
<label class="col-md-4 control-label">Department</label>
<div class="col-md-4 selectContainer">
<div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
<select name="department" class="form-control selectpicker">
  <option value="">Select your Department</option>
  <option>Department of Engineering</option>
  <option>Department of Agriculture</option>
  <option >Accounting Office</option>
  <option >Tresurer's Office</option>
  <option >MPDC</option>
  <option >MCTC</option>
  <option >MCR</option>
  <option >Mayor's Office</option>
  <option >Tourism Office</option>
</select>
</div>
</div>
</div>

<!-- program -->
<div class="form-group"> 
<label class="col-md-4 control-label">Program</label>
<div class="col-md-4 selectContainer">
<div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
<select name="program" class="form-control selectpicker">
  <option value="">Select your Program</option>
  <option>Information Technology</option>
  <option>Computer Technology</option>

</select>
</div>
</div>
</div>
<!-- program -->

<!-- Button -->
<div class="form-group">
<label class="col-md-4 control-label"></label>
<div class="col-md-4"><br>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button type="submit" class="btn btn-primary" name="register" >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspSUBMIT <span class="glyphicon glyphicon-send"></span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</button>
</div>
</div>

</fieldset>
</form>
</div>
  <!-- end new -->


	  </div>
	</div>

    </div>
  </div>

</div>


<?php include 'plugins/scripts.php'; ?>
</body>
</html>
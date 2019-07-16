<?php
session_start();
include 'functions/actions.php';
$obj = new DataOperations();

$error = $success=$username="";
$_SESSION['username']='';

if(isset($_POST['login']))
{
$username = $obj->con->real_escape_string(htmlentities($_POST['username']));
$password = $obj->con->real_escape_string(htmlentities($_POST['password']));

$where = array("username"=>$username,"password"=>$password);
$exist = $obj->fetch_records("admin",$where);
if($exist)
{
 $_SESSION['username'] = $username;
 header('location: transactionReport.php');
}
else
{
  $error = "Wrong username or password!";
}
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Signin</title>
	<link rel="stylesheet" type="text/css" href="login.css">
  <?php include 'plugins/styles.php';?>
</head>


<body>
	<div id="logo" align="center"><img src="images/logo1.png"></div>

	<div id="login">
			<div id="container">
				<div align="center" style="color:red">
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
        </div>
         <form method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF'])?>">
				<div id="login_form">
					<div class="input-group">
						<span class="input-group-addon input-sm"><span class="glyphicon glyphicon-user"></span></span>
						<input class="form-control" placeholder="Username" name="username" type="username" size=20 autofocus></input>
					</div>

					<div class="input-group">
						<span class="input-group-addon input-sm"><span class="glyphicon glyphicon-lock"></span></span>
						<input class="form-control" placeholder="password" name="password" type="password" size=20></input>
					</div>
        
					<input class="btn btn-primary btn-block" type="submit" name="login" value="Login"/>
				</div>
        </form>
			</div>
		<h1>Maseno University Retake</h1>

	</div>
</body>
</html>
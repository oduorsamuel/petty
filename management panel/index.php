<?php
session_start();

if(!$_SESSION['username'])
{

    header('location:login.php');

}
else
{
	include 'functions/actions.php';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Petty Pro</title>

<script>
    function refreshPage(){
        window.location.reload();
    } 
</script>

		<!-- CSS -->        
        
	 <?php include 'plugins/styles.php' ?>
</head>
<body>
<?php include'plugins/navigation.php';?>
<div id="page-wrapper">
  <div id="page-inner">
      <div class="row">
      <div class="row">
</div>
</div>


<?php include 'plugins/scripts.php'; ?>
</body>
</html>
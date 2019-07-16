<?php
$error=$success="";
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
		<title>Filter Payments</title>
    
		

		<!-- CSS -->        
        
	 <?php include 'plugins/styles.php';?>
     <style>
     table {
           border-collapse: separate;
           border-spacing: 10px 0;
            }
     </style>
      <script>
			$(function() {

			$('.dates #usr1').datepicker({
				'format': 'yyyy-mm-dd',
				'autoclose': true
			});
		});
	  </script>	
</head>
<body>
<?php include'plugins/navigation.php';?>
 <div id="page-wrapper">
  <div id="page-inner">
      <div class="row">
      <form  method="post" action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>">
      <table>
       <tr>
       </tr>
       <tr>
       <td>
       <div class="dates">
                <input type="text" id="usr1" class="form-control " style="width:200px;background-color:#fff;" name="startDate" placeholder="start date" required="required" autocomplete="off">
                
            </div>
       </td>
       <td>
       <div class="dates">
                <input type="text" id="usr1" class="form-control " style="width:200px;background-color:#fff;" name="endDate" placeholder="end date" required="required" autocomplete="off">
                
            </div>
       </td>
       <td>
       <input type="submit" name="submit" class="btn btn-primary">
       </td>
       </tr>
      </table>

        </form>
        <?php
        $obj = new DataOperations();
         $con=new mysqli("localhost","root", "","mobile_payment") or die('error with connection');
         if(isset($_POST['submit']))
         {
          $startDate= $obj->con->real_escape_string(htmlentities($_POST['startDate']));
          $endDate= $obj->con->real_escape_string(htmlentities($_POST['endDate']));
          $query="SELECT * FROM mobile_payments WHERE TransTime BETWEEN '$startDate' AND '$endDate' ";
          $result=$con->query($query);
          if(mysqli_num_rows($result)>0){
            $data= array();
            foreach($result as $row){
            $data[] = $row;
            $Amount[] = $row['TransAmount'];
           }
           
           print json_encode($data);
           echo "sum(TransAmount) = " . array_sum($Amount) . "\n";; 
        }
        else{
            $error= "No transaction for the period $startDate to $endDate";
        }
        
         }

        ?>
           <div class="row">
         <div class="col-md-6" style="margin-top: 25px;">
             <?php

                        if($error){

                            $obj->errorDisplay($error);

                        }
                        else if($success){

                            $obj->successDisplay($success);

                        }
                           

                        ?>
         </div>
          
        </div>

      </div>
</div>
</div>
<script type="text/javascript">
            $(function () {
                $('#datetimepicker1').datetimepicker();
            });
        </script>
<?php include 'plugins/scripts.php'; ?>

 
</body>
</html>
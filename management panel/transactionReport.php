<?php
session_start();

if(!$_SESSION['username'])
{

    header('location:login.php');

}
else
{
	include 'functions/transactionReport.php';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Transaction report</title>
		

		<!-- CSS -->        
        
	 <?php include 'plugins/styles.php';?>	
   <style>
	 th { color: #000;
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
      <div class="panel panel-default">
	  
	  <div class="panel-heading">Students payment Report</div>
	  <div class="panel-body">
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
	    <table class="table  table-hover table-striped table-bordered display nowrap" id="table">
             <thead>
                  <tr>
                   <th>Bill Ref. Number</th>
                   <th>Transaction ID</th>
                    <th>Transaction Amount</th>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>lastname Name</th>          
                    <th>Reverse</th>        
                  </tr>
                </thead>
               <tbody>
               <?php
                $obj = new DataOperations();
                $get_data = $obj->fetch_all_records("mobile_payments");
                foreach ($get_data as $row)
                 {
                  $BillRefNumber = $row['BillRefNumber'];
                   $TransID = $row['TransID'];
                   $TransAmount = $row['TransAmount'];
                   $FirstName = $row['FirstName'];
                   $MiddleName= $row['MiddleName'];
                   $LastName = $row['LastName'];
                   $data[] = $row['TransAmount'];
                   $json= json_encode($data);

                   

                  ?>
                  <tr>
                  <td><?php echo $BillRefNumber?></td>
                  	<td><?php echo $TransID?></td>
                    <td><?php echo $TransAmount?></td>
                    <td><?php echo $FirstName?></td>
                    <td><?php echo $MiddleName?></td>
                    <td><?php echo $LastName?></td>
                  	
                  	<td>
                      <div class="btn-group">
                                    
                        <a href="#delete<?php echo $BillRefNumber;?>" data-toggle="modal" title="delete"><button type="button" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-transfer" aria-hidden="true"></span> </button> </a>
                        </div>
                  	</td>
                  </tr>

                       <div class="modal fade" id="delete<?php echo $BillRefNumber;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                      <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                              <div class="modal-header">
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                  <h4 class="modal-title" id="myModalLabel">Reverse prompt</h4>
                                              </div>
                                              <div class="modal-body">
                                                  <form method="post" action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>">

                                                  <div class="alert alert-danger">
                                                      <p>Are you sure you want to reverse payments from <b><?php echo $FirstName?> </b> <b><?php echo $LastName?></b>  with admision  <b><?php echo $BillRefNumber?> </b>?</p>
                                                  </div>
                                                  <div class="modal-footer">
                                                      <button type="button" class="btn btn-default"  data-dismiss="modal">Cancel</button>
                                                      <button name="reverse" class="btn btn-primary" value="<>" data-dismiss="modal">Yes</button>
                                                  </div>
                                                  </form>
                                              </div>
                                          </div>
                                      </div>
                                      </div>                  
               <?php
                 }
               ?> 
           </tbody>
           <strong><?php echo "sum(TransAmount) = " . array_sum($data) . "\n";?></strong>
           <br><br>
       </table>


	  </div>
	</div>


     </div>
  </div>
</div>



<?php include 'plugins/scripts.php'; ?>
<script>
    $('.table').DataTable();
</script>

<script>
</body>
</html>
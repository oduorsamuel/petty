<?php
include 'actions.php';
$obj = new DataOperations();

$error = $success = "";
$first_name = $last_name =$adm = $school = $department = $program = "";

if(isset($_POST['register']))
{
$first_name = $obj->con->real_escape_string(htmlentities($_POST['first_name']));
$last_name = $obj->con->real_escape_string(htmlentities($_POST['last_name']));
$adm = $obj->con->real_escape_string(htmlentities($_POST['adm']));
$school = $obj->con->real_escape_string(htmlentities($_POST['school']));
$department = $obj->con->real_escape_string(htmlentities($_POST['department']));
$program = $obj->con->real_escape_string(htmlentities($_POST['program']));
$password = password_hash($adm, PASSWORD_DEFAULT);

$where = array("adm"=>$adm);
$exist = $obj->fetch_records("student",$where);
if($exist)
{
$error = "Student with the same admission number already exist!";
} 

else
{

$data = array(
        "adm"=>$adm,
        "first_name"=>$first_name,
        "last_name"=>$last_name,
        "school"=>$school,
        "program"=>$program,
        "department"=>$department,
        "student_password"=>$password,
        
);

$insert = $obj->insert_record("student",$data);
if($insert)
{
$success = "New student registered successfully";
}
else
{
	$error = mysqli_error($obj->con);
}

}
}

?>
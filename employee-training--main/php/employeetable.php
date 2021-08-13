<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "traintech";
$employee_code = $_POST["employee_code"];
$employee_name = $_POST["employee_name"];
$employee_college = $_POST["employee_college"];
$experience_year = $_POST["experience_year"];
$phone_no = $_POST["phone_no"];
$skill_id = $_POST["skill_id"];
$training_id = $_POST["training_id"];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// insert
if(isset($_POST["insert"])){
    $sql="INSERT INTO employee VALUES(".$employee_code.",'".$employee_name."','".$employee_college."',".$experience_year.",".$phone_no.",'".$skill_id.",".$training_id.")";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Value inserted successfully!!!!');window.location='../html/employee.html';</script>";
      } else {
        echo "<script>alert('".$conn->error."') ;window.location='../html/employee.html';</script> "  ;
      }

}
// update
if(isset($_POST["update"])){
    $sql="UPDATE employee SET employee_name='".$employee_name."',employee_college='".$employee_college."',experience_year=".$experience_year.",phone_no=".$phone_no.",training_id=".$training_id.",skill_id='".$skill_id."', WHERE employee_code=".$$employee_code."" ;
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Value updated successfully!!!!'); window.location='../html/employee.html';</script>";
      } else {
        echo "<script>alert('".$conn->error."');window.location='../html/employee.html';</script>"  ;
      } 
}
// delete
if(isset($_POST["delete"])){
    $sql="DELETE FROM employee WHERE employee_code=".$employee_code."";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Value deleted successfully!!!!');window.location='../html/employee.html';</script>";
      } else {
        echo "<script>alert('".$conn->error."');window.location='../html/employee.html';</script>"  ;
      }
}

$conn->close();
?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "traintech";
$training_id = $_POST["training_id"];
$start_date = $_POST["start_date"];
$end_date = $_POST["end_date"];
$duration = $_POST["duration"];
$cost = $_POST["cost"];
$performance = $_POST["performance"];
$course_id = $_POST["course_id"];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// insert
if(isset($_POST["insert"])){
    $sql="INSERT INTO TRAINING VALUES(".$training_id.",'".$start_date."','".$end_date."',".$duration.",".$cost.",'".$performance.",".$course_id.")";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Value inserted successfully!!!!');window.location='../html/training.html';</script>";
      } else {
        echo "<script>alert('".$conn->error."') ;window.location='../html/training.html';</script> "  ;
      }

}
// update
if(isset($_POST["update"])){
    $sql="UPDATE TRAINING SET START_DATE='".$start_date."',END_DATE='".$end_date."',DURATION_HOUR=".$duration.",COST=".$cost.",COURSE_ID=".$course_id.",PERFORMANCE='".$performance."', WHERE TRAINING_ID=".$$training_id."" ;
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Value updated successfully!!!!'); window.location='../html/training.html';</script>";
      } else {
        echo "<script>alert('".$conn->error."');window.location='../html/training.html';</script>"  ;
      } 
}
// delete
if(isset($_POST["delete"])){
    $sql="DELETE FROM TRAINING WHERE TRAINING_ID=".$training_id."";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Value deleted successfully!!!!');window.location='../html/training.html';</script>";
      } else {
        echo "<script>alert('".$conn->error."');window.location='../html/training.html';</script>"  ;
      }
}

$conn->close();
?>
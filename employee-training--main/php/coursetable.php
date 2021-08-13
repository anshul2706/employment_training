<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "traintech";
$course_id = $_POST["course_id"];
$course_name = $_POST["course_name"];
$duration_hour = $_POST["duration"];
$description = $_POST["description"];
$instruction = $_POST["instruction"];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// insert
if(isset($_POST["insert"])){
    $sql="INSERT INTO COURSE VALUES(".$course_id.",'".$course_name."',".$duration_hour.",'".$description."','".$instruction."')";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Value inserted successfully!!!!');window.location='../html/course.html';</script>";
      } else {
        echo "<script>alert('".$conn->error."') ;window.location='../html/course.html';</script> "  ;
      }

}
// update
if(isset($_POST["update"])){
    $sql="UPDATE COURSE SET COURSE_NAME='".$course_name."',DURATION_HOUR=".$duration_hour.",DESCRIPTION='".$description."',INSTRUCTION='".$instruction."' WHERE COURSE_ID=".$course_id."" ;
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Value updated successfully!!!!'); window.location='../html/course.html';</script>";
      } else {
        echo "<script>alert('".$conn->error."');window.location='../html/course.html';</script>"  ;
      } 
}
// delete
if(isset($_POST["delete"])){
    $sql="DELETE FROM COURSE WHERE COURSE_ID=".$course_id."";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Value deleted successfully!!!!');window.location='../html/course.html';</script>";
      } else {
        echo "<script>alert('".$conn->error."');window.location='../html/course.html';</script>"  ;
      }
}

$conn->close();
?>
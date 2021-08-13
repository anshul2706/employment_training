<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "traintech";
$skill_id = $_POST["skill_id"];
$skill_name = $_POST["skill_name"];
$skill_type = $_POST["skill_type"];
$skill_description = $_POST["skill_description"];
$training_needed = $_POST["training_needed"];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// insert
if(isset($_POST["insert"])){
    $sql="INSERT INTO skill VALUES(".$skill_id.",'".$skill_name."','".$skill_type."','".$skill_description."','".$training_needed."')";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Value inserted successfully!!!!');window.location='../html/skill.html';</script>";
      } else {
        echo "<script>alert('".$conn->error."') ;window.location='../html/skill.html';</script> "  ;
      }

}
// update
if(isset($_POST["update"])){
    $sql="UPDATE skill SET skill_NAME='".$skill_name."',DURATION_HOUR=".$duration_hour.",skill_DESCRIPTION='".$skill_description."',training_needed='".$training_needed."' WHERE skill_ID=".$skill_id."" ;
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Value updated successfully!!!!'); window.location='../html/skill.html';</script>";
      } else {
        echo "<script>alert('".$conn->error."');window.location='../html/skill.html';</script>"  ;
      } 
}
// delete
if(isset($_POST["delete"])){
    $sql="DELETE FROM skill WHERE skill_ID=".$skill_id."";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Value deleted successfully!!!!');window.location='../html/skill.html';</script>";
      } else {
        echo "<script>alert('".$conn->error."');window.location='../html/skill.html';</script>"  ;
      }
}

$conn->close();
?>
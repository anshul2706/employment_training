<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "traintech";
$training_code = $_POST["training_code"];
$training_name = $_POST["training_name"];
$training_description = $_POST["training_description"];
$training_id = $_POST["training_id"];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// insert
if(isset($_POST["insert"])){
    $sql="INSERT INTO TRAINING_CATEGORY VALUES(".$training_code.",'".$training_name."','".$training_description."',".$training_id.")";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Value inserted successfully!!!!');window.location='../html/trainingcategory.html';</script>";
      } else {
        echo "<script>alert('".$conn->error."') ;window.location='../html/trainingcategory.html';</script> "  ;
      }

}
// update
if(isset($_POST["update"])){
    $sql="UPDATE TRAINING_CATEGORY SET training_name='".$training_name."',TRAINING_DESCRIPTION='".$training_description."',TRAINING_ID=".$training_id." WHERE TRAINING_CODE=".$training_code."" ;
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Value updated successfully!!!!'); window.location='../html/trainingcategory.html';</script>";
      } else {
        echo "<script>alert('".$conn->error."');window.location='../html/trainingcategory.html';</script>"  ;
      } 
}
// delete
if(isset($_POST["delete"])){
    $sql="DELETE FROM TRAINING_CATEGORY WHERE TRAINING_CODE=".$training_code."";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Value deleted successfully!!!!');window.location='../html/trainingcategory.html';</script>";
      } else {
        echo "<script>alert('".$conn->error."');window.location='../html/trainingcategory.html';</script>"  ;
      }
}

$conn->close();
?>
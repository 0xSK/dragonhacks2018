<?php
include 'database.php';

if(isset($_GET["name"]) && isset($_GET["address"]) && isset($_GET["phone"]) && isset($_GET["email"]) && isset($_GET["lat"]) && isset($_GET["long"]) && isset($_GET["sev"])) {
  $timenow = time();
  $str_timenow = (string) $timenow;
  $sql = "INSERT INTO reports VALUES ('".$_GET["name"]."', '".$_GET["address"]."', '".$_GET["phone"]."', '".$_GET["email"]."', '".$_GET["lat"]."', '".$_GET["long"]."', ".$_GET["sev"].", ".$str_timenow." , 0)";
  if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

$conn->close();
?>
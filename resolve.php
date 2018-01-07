<?php
include 'database.php';

if(isset($_GET["phone"]) && isset($_GET["time"])) {
  $sql = "UPDATE reports SET resolved = 1 WHERE time=".$_GET["time"]." AND cust_phone=".$_GET["phone"];
  if ($conn->query($sql) === TRUE) {
      echo "Resolved successfully";
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

$conn->close();
?>
<?php
// define variables and set to empty values
$nameErr = $priceErr = "";
$name = $price= "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
  }
  
  if (empty($_POST["price"])) {
    $priceErr = "Price is required";
  } else {
    $price = test_input($_POST["price"]);
  }
    
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
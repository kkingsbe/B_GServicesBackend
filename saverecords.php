<?php
$host         = "localhost";
$username     = "bkuser";
$password     = "GtF6XlmZDnL1";
$dbname       = "bkservices";
$result = 0;
/* Create connection */
$conn = new mysqli($host, $username, $password, $dbname);
/* Check connection */
if ($conn->connect_error) {
 die("Connection to database failed: " . $conn->connect_error);
}
/* Get data from Client side using $_POST array */
$first        = filter_input(INPUT_POST, "first");
$last         = filter_input(INPUT_POST, "last");
$email        = filter_input(INPUT_POST, "email");
$phone        = filter_input(INPUT_POST, "phone");
$price        = filter_input(INPUT_POST, "price");
$date         = filter_input(INPUT_POST, "date");
$address      = filter_input(INPUT_POST, "inputAddress");
$city         = filter_input(INPUT_POST, "inputCity");
$state        = filter_input(INPUT_POST, "inputState");
$zip          = filter_input(INPUT_POST, "inputZip");
$notes        = filter_input(INPUT_POST, "notes");
$services     = filter_input(INPUT_POST, "services");
$paymentmethod= filter_input(INPUT_POST, "paymentmethod");
$reoccuring   = filter_input(INPUT_POST, "reoccuring");
//$address      = $addressshort.' '.$city.' '.$state.' '.$zip;

//$paymentmethod  = $_POST['paymentmethod'];
/* validate whether user has entered all values. */
if(!empty($first) || !empty($last) || !empty($email) || !empty($date) || !empty($address) || !empty($notes)) {

} else {
  echo "Field should not be empty";
  die("Field should not be empty");
}
   //SQL query to get results from database
 $sql    = "insert into ActiveSchedules (first, last, email, phone, date, address, notes, services, reoccuring, paymentmethod, price) values ('$first', '$last', '$email', '$phone', '$date', '$address', '$notes', '$services', '$reoccuring', '$paymentmethod', '$price')  ";
 if($conn->query($sql)){
  echo "New record successfully input";
 } else {
  echo "Error: ". $sql ."<br>". $conn->error;
 }
$conn->close();

header("Location: schedules.php?filter=today");
die();
?>
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
$description = $_GET['description'];
$amountpaid  = $_GET['amountPaid'];
$username    = strtolower($_GET['username']);
$date        = date('m/d/Y');

//$paymentmethod  = $_POST['paymentmethod'];
/* validate whether user has entered all values. */
if(!empty($description) || !empty($amountpaid) || !empty($username)) {

} else {
  echo "Field should not be empty";
  die("Field should not be empty");
}
   //SQL query to get results from database
 $sql1    = "insert into thisperiodexpenses (description, amount, username, date) values ('$description', '$amountpaid', '$username', '$date');";
 $sql2    = "insert into allexpenses (description, amount, username, date) values ('$description', '$amountpaid', '$username', '$date');";
echo sql1;
 if($conn->query($sql1)){
  echo "New record successfully input";
 } else {
  echo "Error: ". $sql1 ."<br>". $conn->error;
 }
 if($conn->query($sql2)){
  echo "New record successfully input";
 } else {
  echo "Error: ". $sql2 ."<br>". $conn->error;
 }
$conn->close();

mail("kensingtonbkservices@gmail.com", "New Buisness Expense Reported " . date(
'm/d/Y'), "A new buisness expense was reported by " . $username . " on " . date('m/d/Y') . " for $" . $amountpaid . ".\nDescription: " . $description);
//header("Location: schedules.php?filter=today");
die();
?>
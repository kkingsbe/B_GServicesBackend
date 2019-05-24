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
$jobid       = filter_input(INPUT_POST, "jobid");
$amountpaid  = filter_input(INPUT_POST, "amountCharged");
$username    = strtolower(filter_input(INPUT_POST, "username"));
$date        = date('m/d/Y');
$first       = "";
$last        = "";
$email       = "";
$phone       = "";
$address     = "";
$services    = "";

//$paymentmethod  = $_POST['paymentmethod'];
/* validate whether user has entered all values. */
   //SQL query to get results from database
$sql0 = "SELECT * FROM ActiveSchedules WHERE job='$jobid';";
$result = $conn->query($sql0);
while($row = mysqli_fetch_array($result)) {
	$first    = $result["first"];
	$last     = $result["last"];
	$email    = $result["email"];
	$phone    = $result["phone"];
	$address  = $result["address"];
	$services = $result["services"];
}

echo "First: " . $first; 
$sql1 = "DELETE FROM ActiveSchedules WHERE jobid='$jobid';";
$sql2 = "INSERT INTO completedschedules (jobid, amountCharged, username, date, first, last, email, phone, address, services) VALUES ('$jobid', '$amountpaid', '$username', '$date', '$first', '$last', '$email', '$phone', '$address', '$services');";
echo sql1;
echo sql2;
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
//header("Location: schedules.php?filter=today");
die();
?>
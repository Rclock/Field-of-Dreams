<?php
if(!isset($_SESSION["login"])){ // make sure user is logged in
    header("Location: http://fieldofdreams.ml/Sign-In.html");
}
?>

<!DOCTYPE html>
<html>
<body>
<?php


// Require the bundled autoload file - the path may need to change
// based on where you downloaded and unzipped the SDK
require __DIR__ . '/twilio-php-master/Twilio/autoload.php';

// Use the REST API Client to make requests to the Twilio REST API
use Twilio\Rest\Client;
 

// Your Account SID, Auth Token, and Twilio phone number from twilio.com/console
$twilioPhone = '+13025817175';
$sid = 'AC89a94ed31367669484d648d1157dcadd';
$token = 'c96131fb4b572ca3844d9de828e0832d';
$client = new Client($sid, $token);

//connect to database
//Kia's test database
$DB_HOST = 'localhost';
$DB_NAME = 'id7335129_db';
$DB_USER = 'id7335129_fieldofdreams';
$DB_PASSWORD = 'database';

//create connection
$conn=mysqli_connect($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);
//check connection
if (!$conn){
	die("Failed to connect to MySQL: " . mysqli_connect_error());
}
//echo "Connected to database" . "<br>";

//query for database
$sql = "SELECT DISTINCT phonenum FROM user_phonenumbers";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0){
	echo "query successful" . "<br>";
	$i = 0;
	while($row = mysqli_fetch_assoc($result)){
		
		echo $row["phonenum"] . "<br>";
		
				
			// Use the client to send text messages
			$client->messages->create(
			// the number you'd like to send the message to
			$row["phonenum"],
				array(
					// A Twilio phone number you purchased at twilio.com/console
					'from' => $twilioPhone,
					// the body of the text message you'd like to send
					'body' => $_POST["yourMessage"]
				)
			);
		
		$i++;
	}
}else{
	die("0 results.");
}

mysqli_close($conn);
header("Location: http://fieldofdreams.ml/sendsms.html");
?>
</body>
</html>

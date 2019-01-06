<?php
//if(!isset($_SESSION["login"])){
//	header("Location: http://fieldofdreams.ml/Sign-In.html");
//}
// Get the PHP helper library from https://twilio.com/docs/libraries/php
//Database:
//Table-> user_phonenumbers; column-> phonenum;

require __DIR__ . '/twilio-php-master/Twilio/autoload.php'; // Loads the library
use Twilio\Twiml;
use Twilio\Rest\Client;
// Your Account SID, Auth Token, and Twilio phone number from twilio.com/console
$twilioPhone = '+13025817175';
$sid = 'AC89a94ed31367669484d648d1157dcadd';
$token = 'c96131fb4b572ca3844d9de828e0832d';
//connect to database
$DB_HOST = 'localhost';
$DB_NAME = 'id7335129_db';
$DB_USER = 'id7335129_fieldofdreams';
$DB_PASSWORD = 'database';

//Twilio API to respond to incoming message
$response = new Twiml;
$body = $_REQUEST['Body'];
$fromNumber = $_REQUEST['From']; // user's number
$default = "Not a valid keyword";
$userJoin = false;
$userStop = false;
if (strtolower(trim($body)) == "join") {
    $response->message("Thank you for signing up for alerts from Field of Dreams.  Text 'done' at anytime if you no longer to wish receive our alerts");
	$userJoin = true;
} else if(strtolower(trim($body)) == "done") {
    $response->message("You will no longer recieve alerts from Field of Dreams.  Text 'join' at anytime to recieve our alerts.");
    $userStop = true;
}else{
    $response->message($default);
}
//responds to user message
print $response;

// Got errors when trying to print/echo something 
if($userJoin == true){
	//create connection
	$conn=mysqli_connect($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);
	//check connection
	if (!$conn){
		die("Failed to connect to MySQL: " . mysqli_connect_error());
	}
	//echo "Connected to database   ";
	
	//query for database
	$sql = "INSERT IGNORE INTO user_phonenumbers (phonenum) VALUES ('$fromNumber')";

	if(mysqli_query($conn, $sql)){
		//echo "new record created   ";
	}else{
		//echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}

if($userStop == true){
    //create connection
	$conn=mysqli_connect($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);
	//check connection
	if (!$conn){
		die("Failed to connect to MySQL: " . mysqli_connect_error());
	}
	//echo "Connected to database   ";
	
	//query for database
	$sql = "DELETE FROM user_phonenumbers WHERE phonenum='$fromNumber'";

	if(mysqli_query($conn, $sql)){
		//echo "new record created   ";
	}else{
		//echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}

?>

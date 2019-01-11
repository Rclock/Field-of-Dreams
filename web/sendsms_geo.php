<!DOCTYPE html>
<html>

<head> 
 <body>
	<div id="header">
		<h1> Send Message Page </h1>
		<div id="nav">
			<a href="admin.html"><button type="button">Home</button></a>
			<a href="sendsms_geo.html"><button type="button">Send SMS</button></a>
			<a href="dataForm.html"><button type="button">Data Form</button></a>
			<a href="logout.php"><button type="button">Logout</button></a>
		</div>
	</div>
</body>

<title>Message Sent!</title>
<link rel="stylesheet" href="style.css"/>

</head>
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

	$lat = $_GET["lat"]; 
	$lon = $_GET["lon"];
	$msg = $_GET["msg"];
	$addr = $_GET["addr"];	
	$today = date("Y-m-d");
	$link = url();
	
	if(isset($lat) && isset($lon)){
	
		$conn = new mysqli("localhost", "root", "mysql", "Msg_Info");
	
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 

		$sql = "INSERT INTO Message_Info(Latitude, Longitude, Message, Address, Date, URL)
			VALUES ('$lat', '$lon', '$msg', '$addr', '$today', '$link')";

		if ($conn->query($sql) === TRUE) {
			echo "New record created successfully";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	
		$conn->close();
	
		$client->messages->create(
			"+14433731768",  
			array(    
				'from' => "+13025817175",  
				'body' => $_POST["msg"],
			)
		);
		echo "Done! ";
		echo "The followins information has been saved and sent: ";
		echo "\nLongitude is $lon. ";
		echo "\nLatitude is $lat. ";
		echo "\nMessage is $msg. ";
		echo "\nAddress is $addr. ";
		echo "\nDate is $today. ";
		echo "\nLink is $link. ";
		echo "\nMessage is $msg. ". "In the area of ".$addr.". Tap link to see a map ".$link;
	
	}
	else{
		echo "Error. Please try again.";
	}
	function url(){
		$location = $_GET['addr'];
		$word = explode(" ", $location);
		$url = "https://www.google.com/maps/search/?api=1&query=";
		$url = $url.$word[0];
		for($i = 1; $i < count($word, COUNT_RECURSIVE); $i++){
			$url = $url."+".$word[$i];
			}
		return $url;
	}
	?>
	

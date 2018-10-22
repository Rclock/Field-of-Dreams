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
$smsMessage = $_POST["yourMessage"];
$twilioPhone = '+13025817175';
$sid = 'AC89a94ed31367669484d648d1157dcadd';
$token = 'c96131fb4b572ca3844d9de828e0832d';
$client = new Client($sid, $token);

// Use the client to do fun stuff like send text messages!
$client->messages->create(
    // the number you'd like to send the message to
    '+12408328669',
    array(
        // A Twilio phone number you purchased at twilio.com/console
        'from' => '$twilioPhone',
        // the body of the text message you'd like to send
		//"Hey Jenny! Good luck on the bar exam!"
        'body' => '$smsMessage'
    )
);

echo "done";
?>
</body>
</html>
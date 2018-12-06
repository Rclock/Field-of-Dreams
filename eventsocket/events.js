
  //  </script>

//set up websocket connection
const jsonfile = require('jsonfile')
var io = require('socket.io-client')
const file = 'latlong.json'

var socket = io('https://stream.automatic.com?token=6d7513e198cade8ff0b1:9404dcc3a563cbeb221f6474af8064083471a255')//connects to automatics events API

// Listen for `trip:finished` event
socket.on('location:updated', function(data) {//change to what event we want
   // console.log('Trip Finished', data);
    console.log(data.location.lat);
    console.log(data.location.lon);
   // const obj = { lat: data.location.lat, long: data.location.lon } 
    jsonfile.writeFile(file, data.location, function(err) {
	if (err) console.error(err)
    })
   /* const obj2 = { long: data.location.lat }
    jsonfile.writeFile(file, obj2, function(err) {
	if (err) console.error(err)
    })*/
    
    
    // var lat = JSON.parse(data.location);
 // console.log(lat.lat);
});
//window.location.href="testfile.php?lat=data.location.lat";

//window.location.href="testfile.php?long=data.location.lon"; 

   


//socket.onmessage = function (data){
//  var data = JSON.parse(data);
//  var title = getEventName(data.type);
//  console.log(data.location);
//};

// Handle `error` messages
socket.on('error', function(errorMessage) {
    console.log('Error', errorMessage);

    window.location.href="test.html?uid=1";
    
});
    

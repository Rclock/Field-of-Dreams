//set up websocket connection
const jsonfile = require('jsonfile')//need to do this for json file operations 
var io = require('socket.io-client')//socketio library
const file = 'latlong.json'//name of file we create and write to 
 
var socket = io('https://stream.automatic.com?token=6d7513e198cade8ff0b1:9404dcc3a563cbeb221f6474af8064083471a255')//connects to automatics events API

// Listen for `location:updated` event
socket.on('location:updated', function(data) {
   // console.log(data.location.lat);
   // console.log(data.location.lon);
    console.log(data.location);//shows entire object in console
    // const obj = { lat: data.location.lat, long: data.location.lon }

    //this writes data.location to "file" defined at the top
    jsonfile.writeFile(file, data.location, function(err) {
	if (err) console.error(err)
    })


    //Could also make a constant object and write that 
   /* const obj2 = { long: data.location.lng }
    jsonfile.writeFile(file, obj2, function(err) {
	if (err) console.error(err)
    })*/
    
    
    // var lat = JSON.parse(data.location);
 // console.log(lat.lat);
});
 

   

//forgot what this does
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
    

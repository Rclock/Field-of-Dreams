
var io = require('socket.io-client')

var socket = io('https://stream.automatic.com?token=6d7513e198cade8ff0b1:9404dcc3a563cbeb221f6474af8064083471a255')//connects to automatics events API

// Listen for `trip:finished` event
socket.on('trip:finished', function(data) {//change to what event we want
  console.log('Trip Finished', data);
});
//output formatting
socket.onmessage = function (msg) {
  var data = JSON.parse(msg.data);
  var description = [];
  var title = getEventName(data.type);
  console.log(data);
};

// Handle `error` messages
socket.on('error', function(errorMessage) {
  console.log('Error', errorMessage);
});


src="http://code.jquery.com/jquery-latest.min.js"//need this to use jquery, accesses it online 

//var json = require('latlong.json');

//uses JQuery to get JSON data from the file we wrote to in events.js. js is the object where the data is stored
jQuery.getJSON("latlong.json", function(js) {
    
    console.log("JSON data received, data is: " + js.lat);
    console.log("Lat received: " + js.lat);//access lat
    console.log("Long received: " + js.lon);//access lng
});


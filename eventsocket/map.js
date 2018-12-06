 src="http://code.jquery.com/jquery-latest.min.js"

jQuery.getJSON("latlong.json", function( json ) {
    console.log("JSON data received, data is: " + json.lat);
});

var http = require("http");                                                        
var io = require('socket.io-client');                                              
var socket = io("https://stream.automatic.com?token=6d7513e198cade8ff0b1:9404dc\   
c3a563cbeb221f6474af8064083471a255")                                               
                                                                                   
                                                                                   
                                                                                   
http.createServer(function(request, response){                                     
    var lat;                                                                       
    var lon;                                                                       
    response.writeHead(200, {"Content-Type": "text/html"});                        
   // response.write("<html>");                                                    
   // response.write("<head><title>Node.js</title></head>");                       
   // response.write("<body>Hello Web</body>");                                    
   // response.write("</html>");                                                   
   // response.end();                                                              
    response.write("Hello FOD\n");                                                 
                                                                                   
socket.on('location:updated',function(data){                                       
    lat = data.location.lat;                                                       
    lon = data.location.lon;                                                       
        console.log( 'Lat = ' + lat + ' Lon = ' + lon);                            
        // response.write("Lat = " + lat + " Lon = " + lon + "\n");                
});                                                                                
response.write("Lat = " + lat + " Lon = " + lon + "\n");                           
                                                                                   
}).listen(9999); 


<style>
#map                                                                                             
          {                                                                                      
                border: solid black;                                                             
                background-color: #efefef;                                                       
        height: 420px;                                                                           
                width: 1230px;
       }
</style>

<div>
<div id="map">                                                                            
<!-- map implementation starts here-->                                                            
        <script>                                                                                  
// function to Initialize and add the map                                                         
function initMap()                                                                                
{                                                                                                 
  // The location of Salisbury                                                                    
  var salisbury = {lat: 34, lng: 4};                                                              
    // The map, centered at Salisbury                                                             
  var map = new google.maps.Map(                                                                  
      document.getElementById('map'), {zoom: 10, center: salisbury});                             
  // The marker, positioned at Salisbury                                                          
  var marker = new google.maps.Marker({position: salisbury, map: map});                           
}                                                                                                 
        </script>                                                                                 
        <!-- the script below brings in the google maps image-->                                  
        <script async defer                                                                       
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDCiTM--BfznhwUxvosLnF99JzDElv0yew&call\
back=initMap">                                                                                    
    </script>                                                                                     
</div>           
</div>

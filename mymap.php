<?php include 'dbconnection.php';?>
<!DOCTYPE html>
<html>
  <head>
    <link
      rel="stylesheet"
      href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
    />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <style>
      #map {
        position: absolute;
        top: 0;
        bottom: 0;
        right: 0;
        left: 0;
      }
    </style>
  </head>

  <body>
    <div id="map"></div>
<!-- <table>
<thead>
  <th>Value</th>
  <th>Key</th>
</thead>
<tbody id="load-table">

</tbody>
</table> -->


<script type="text/javascript" src="js/jquery.js"></script>

<script type="text/javascript">

 
  var a = [];
  var b = [];

  
  $(document).ready(function(){

    function loadTable(){
      $.ajax({
        url:'http://110.93.223.67:8182/api/api_mobile.php?cmd=api_load_object_data&username=BFX846&group=AA-JUNE-2021',
        type:"GET",
        success:function(data){
          $.each(data,function(key,value){
            a.push(value[2]);
            b.push(value[3]);  
            
            
            $("#load-table").append("<tr>"+"<td>"+value[2]+"</td>"+"<td>"+value[3]+"</td>"+"</tr>"
          
            ); 
            $("#load-select").append("<option value='"+ value["Code"]+"'>"+ value["Code"]+"</option>"
            
            
            );


          });
          //console.log(a);
        
        }
        

      });

    }
    loadTable();
})

</script>
<script>
  
       // window.alert("a");
            // a += value[2];
            // a.push(key);
            // b.push(key);
            // window.alert(a+b);
           let dict = b;
           //console.log(dict);
      //This is to set the view of graph...
      var map = L.map("map").setView([24, 67.1146619713956], 6);

L.tileLayer(
  "https://api.maptiler.com/maps/streets/256/{z}/{x}/{y}.png?key=b3GSUSUhp2uFh8O4gSPm",
  {
    attribution:
      '<<a href="https://www.maptiler.com/copyright/" target="_blank">&copy; MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">&copy; OpenStreetMap contributors</a>`',
  }
).addTo(map);


//Doing Dynamic Multiple Indications..


// for (let i in dict) {
//   //   L.marker([24,68])
//   // .addTo(map)
// console.log(i);
// }

L.marker([24,68])
.addTo(map)

 // .bindPopup("Vehicle Name")
  // .openPopup();

// L.circle([24.862391206176955, 67.02924941145207], {
//   color: "red",
//   fillcolor: "#f03",
//   fillOpacity: 0.5,
//   radius: 10000,
// })
//   .addTo(map)
//   .bindPopup("I Am A Circle.")
//   .openPopup();
</script>
   

<!--===============================================================================================-->
  <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/bootstrap/js/popper.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/daterangepicker/moment.min.js"></script>
  <script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
  <script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
  <script src="js/main.js"></script>
</body>
</html>
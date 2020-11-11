  <script src="{{ URL::to('js/lib/jquery.min.js')}}"></script>
    <!-- jquery vendor -->
    <script src="{{ URL::to('js/lib/jquery.nanoscroller.min.js')}}"></script>
    <!-- nano scroller -->
    <script src="{{ URL::to('js/lib/menubar/sidebar.js')}}"></script>
    <script src="{{ URL::to('js/lib/preloader/pace.min.js')}}"></script>
    <!-- sidebar -->
    <script src="{{ URL::to('js/lib/bootstrap.min.js')}}"></script>
    <!-- bootstrap -->
    <script src="{{ URL::to('js/lib/weather/jquery.simpleWeather.min.js')}}"></script>
    <script src="{{ URL::to('js/lib/weather/weather-init.js')}}"></script>
    <script src="{{ URL::to('js/lib/circle-progress/circle-progress.min.js')}}"></script>
    <script src="{{ URL::to('js/lib/circle-progress/circle-progress-init.js')}}"></script>
    <script src="{{ URL::to('js/lib/chartist/chartist.min.js')}}"></script>
    <script src="{{ URL::to('js/lib/chartist/chartist-init.js')}}"></script>
    <script src="{{ URL::to('js/lib/sparklinechart/jquery.sparkline.min.js')}}"></script>
    <script src="{{ URL::to('js/lib/sparklinechart/sparkline.init.js')}}"></script>
    <script src="{{ URL::to('js/lib/owl-carousel/owl.carousel.min.js')}}"></script>
    <script src="{{ URL::to('js/lib/owl-carousel/owl.carousel-init.js')}}"></script>
    <script src="{{ URL::to('js/scripts.js')}}"></script>
<script src="{{ URL::to('js/jquery.dataTables.min.js')}}"></script>
<script src="{{ URL::to('js/dataTables.bootstrap.min.js')}}"></script>

<script src="{{ URL::to('js/lib/jquery-ui/jquery-ui.min.js')}}"></script>
    <script src="{{ URL::to('js/lib/moment/moment.js')}}"></script>
    <script src="{{ URL::to('js/lib/calendar/fullcalendar.min.js')}}"></script>
    <script src="{{ URL::to('js/editor.js')}}"></script>
<!--  <script src="{{ URL::to('js/lib/calendar/fullcalendar-init.js')}}"></script>  -->

<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>

<script>
$(function() {
  $("#addMore").click(function(e) {
    e.preventDefault();
   // $("#fieldList").append("&nbsp;");
 $("#fieldList_inner").append("<input type='text' id='including' name='including[]' class='form-control' placeholder='title: text' />"); 
  });

});
</script>



<script>

$(function() {

  $("#addMores").click(function(e) {

    e.preventDefault();

    $("#fieldLists_inner").append("&nbsp;");

 $("#fieldLists_inner").append("<input type='text' id='exincluding' name='exincluding[]' class='form-control' placeholder='title: text' />");
  });

});
</script>


<script src="{{ URL::to('js/bootstrap-input-spinner.js')}}"></script>
<script>
    $("input[type='number']").inputSpinner()
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBe55a_qbs6_O5osTFmpjwdABd3sVT8Yy8&libraries=places&callback=initMap" async defer></script>
<script type="text/javascript">

  function checktext(){ 
    var txt = $('#address').val();  
    if (($('#address').val() != null) && ($('#address').val() != '')) {  
      $('#getmapbtn').show();       
    }   
  } 
function getlatLong(){  
var geocoder = new google.maps.Geocoder();
var address = document.getElementById('address').value;
geocoder.geocode( { 'address': address}, function(results, status) {

  if (status == google.maps.GeocoderStatus.OK) {
    var latitude = results[0].geometry.location.lat();
    var longitude = results[0].geometry.location.lng();   
    console.log(latitude);
  console.log(longitude);

  } 
}); 
}

$('#getmapbtn').click(function(e){
  e.preventDefault();
  $('#map').show();
});
</script>

  <script>

      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -33.8688, lng: 151.2195},
          zoom: 13
        });
      
        var input = document.getElementById('address');      

        var autocomplete = new google.maps.places.Autocomplete(input);

        // Bind the map's bounds (viewport) property to the autocomplete object,
        // so that the autocomplete requests use the current map bounds for the
        // bounds option in the request.
        autocomplete.bindTo('bounds', map);

        // Set the data fields to return when the user selects a place.
        autocomplete.setFields(
            ['address_components', 'geometry', 'icon', 'name']);

        var infowindow = new google.maps.InfoWindow();
        var infowindowContent = document.getElementById('infowindow-content');
        infowindow.setContent(infowindowContent);
        var marker = new google.maps.Marker({
          map: map,
          anchorPoint: new google.maps.Point(0, -29)
        });

        autocomplete.addListener('place_changed', function() {
          infowindow.close();
          marker.setVisible(false);
          var place = autocomplete.getPlace();
          if (!place.geometry) {
            // User entered the name of a Place that was not suggested and
            // pressed the Enter key, or the Place Details request failed.
            window.alert("No details available for input: '" + place.name + "'");
            return;
          }

          // If the place has a geometry, then present it on a map.
          if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
          } else {
            map.setCenter(place.geometry.location);
            map.setZoom(13);  // Why 17? Because it looks good.
          }
          marker.setPosition(place.geometry.location);
          marker.setVisible(true);

          var address = '';
          if (place.address_components) {
            address = [
              (place.address_components[0] && place.address_components[0].short_name || ''),
              (place.address_components[1] && place.address_components[1].short_name || ''),
              (place.address_components[2] && place.address_components[2].short_name || '')
            ].join(' ');
          }

          infowindowContent.children['place-icon'].src = place.icon;
          infowindowContent.children['place-name'].textContent = place.name;
          infowindowContent.children['place-address'].textContent = address;
          infowindow.open(map, marker);
        });

        // Sets a listener on a radio button to change the filter type on Places
        // Autocomplete.
        function setupClickListener(id, types) {
          var radioButton = document.getElementById(id);
          radioButton.addEventListener('click', function() {
            autocomplete.setTypes(types);
          });
        }

        setupClickListener('changetype-all', []);
        setupClickListener('changetype-address', ['address']);
        setupClickListener('changetype-establishment', ['establishment']);
        setupClickListener('changetype-geocode', ['geocode']);

        document.getElementById('use-strict-bounds')
            .addEventListener('click', function() {
              console.log('Checkbox clicked! New state=' + this.checked);
              autocomplete.setOptions({strictBounds: this.checked});
            });
  google.maps.event.addListener(marker, 'dragend', function() {
        geocoder.geocode({'latLng': marker.getPosition()}, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
          if (results[0]) {        
              bindDataToForm(results[0].formatted_address,marker.getPosition().lat(),marker.getPosition().lng());
              infowindow.setContent(results[0].formatted_address);
              infowindow.open(map, marker);
          }
        }
        });
    });
      } 
</script> 


<script>
$('#courses_name').on('change', function() {
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
      }
  });
    
  var value = $(this).val();
  var token = $('input[name="_token"]').val();
  var base_url = '<?php echo url('/'); ?>';
 // alert(value + token); 
  jQuery.ajax({
    url:base_url+'/getlocation',
    method: 'POST',
    data:{courses_id:value,_token:token},
    success: function(response){
      //console.log(response);
       var len = Object.keys(response).length;
       console.log(response[0].tranning_place);
      $('#show_l').html('<input class="form-control form-white" value="'+response[0].tranning_place+'" placeholder="Enter place" type="text" name="location" required="" readonly/>');
    }
  });
});
</script>


<script type="text/javascript">
  $(document).ready(function() {
  $('.class_sub').click(function() {

           var start_date = $('.start_date').val();
           var end_date = $('.end_date').val();
          if(start_date > end_date){ 
            $('#date_error').html("<span style='color:red'><b>Start date must be smaller than End date </b></span>");
            $('#date_error').focus();
            return false;
          } 
          else{
            $('#date_error').html('');
          }
           
  });

 
});


 </script>


<script>
$(function() {
  $("#More").click(function(e) {
    e.preventDefault();
   // $("#fieldList").append("&nbsp;");
 $("#field_inner").append("<input type='text' id='specifications' name='specifications[]' class='form-control' placeholder='title: text' />"); 
  });

});
</script>

<script type="text/javascript">
function Upload() {
    //Get reference of FileUpload.
    var fileUpload = document.getElementById("fileUpload");
 
    //Check whether the file is valid Image.
    var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(.jpg|.png|.gif)$");
    if (regex.test(fileUpload.value.toLowerCase())) {
 
        //Check whether HTML5 is supported.
        if (typeof (fileUpload.files) != "undefined") {
            //Initiate the FileReader object.
            var reader = new FileReader();
            //Read the contents of Image File.
            reader.readAsDataURL(fileUpload.files[0]);
            reader.onload = function (e) {
                //Initiate the JavaScript Image object.
                var image = new Image();
 
                //Set the Base64 string return from FileReader as source.
                image.src = e.target.result;
                       
                //Validate the File Height and Width.
                image.onload = function () {
                    var height = this.height;
                    var width = this.width;
                    //alert(width);
                    if (height < 584 && width < 1600) {
                       $('#file_err').show();
                        $('#file_err').html('Please select a file must be Height 584px & Width 1600px');
                        //alert("Height and Width must not exceed 1600px.");
                        return false;
                    }
                      $('#file_err').hide();
                       $('#file_err').html('');
                    //alert("Uploaded image has valid Height and Width.");
                    return true;
                };
 
            }
        } else {
            alert("This browser does not support HTML5.");
            return false;
        }
    } else {
        alert("Please select a valid Image file.");
        return false;
    }
}
</script>

<script>
$(document).ready(function(){
  $(".pri").change(function(){
    $(".disc_p").hide();
  });
  $(".disc_p").click(function(){
    $(".pri").hide();
  });
});
</script>

<script>
      $(document).ready(function() {
        $("#txtEditor").Editor();
      });
</script>


<script>
$('#page_id').on('change', function() {
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
      }
  });
    
  var value = $(this).val();
  var token = $('input[name="_token"]').val();
  var base_url = '<?php echo url('/'); ?>';
 alert(value + token); 
  jQuery.ajax({
    url:base_url+'/get_content',
    method: 'POST',
    data:{id:value,_token:token},
    success: function(response){
      //console.log(response);
       var len = Object.keys(response).length;
       console.log(response[0].description);
      $('#move_edit').html('<textarea id="txtEditor" class="form-control" type="text" name="description" required="" >'+response[0].description+'</textarea>');
    }
  });
});
</script>

<script>
  $(document).ready(function() {
  $("#team_id").validate({
     rules: {
  'email':{
    //required: true,
    email:true  
    },
  'linkdin':{
    //required: true,
    url: true   
    },

    }
       });
    });   
</script>
    
</body>
</html>
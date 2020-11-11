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
 $("#fieldList").append("<div class='col-md-12'><input type='text' id='including' name='including[]' class='form-control' placeholder='title: text' /></div>");
 

    
  });
});

</script>

<script>
$(function() {
  $("#addMores").click(function(e) {
    e.preventDefault();
    $("#fieldLists").append("&nbsp;");
 $("#fieldLists").append("<div class='col-md-12'><input type='text' id='exincluding' name='exincluding[]' class='form-control' placeholder='title: text' /></div>");
 

    
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



     <!----------------------- CLENDER SCRIPT---------------------------------- -->
<script>
  
!function($) {
    "use strict";

    var CalendarApp = function() {
        this.$body = $("body")
        this.$modal = $('#event-modal'),
        this.$event = ('#external-events div.external-event'),
        this.$calendar = $('#calendar'),
        this.$saveCategoryBtn = $('.save-category'),
        this.$categoryForm = $('#add-category form'),
        this.$extEvents = $('#external-events'),
        this.$calendarObj = null
    };


    CalendarApp.prototype.onEventClick =  function (calEvent, jsEvent, view) {     
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
      
        var $this = this;
        var id = calEvent.id;    
        var base_url = '<?php echo url('/'); ?>';
        var token = $('input[name="_token"]').val(); 
       // alert(token);
        $.ajax({
           type:'POST',
           url:base_url+'/showmyclass',
           data:{id:id,_token:token},
           success:function(data){
              //console.log(data);
              var return1="";
            
                return1 +='<ul>';
                return1 +='<li>';
                return1 +='<label>Class Name</label>';
                return1 +='<div class="model-info">'+data[0].name+'</div>';
                return1 +='</li>';

                return1 +='<li>';
                return1 +='<label>Location</label>';
                return1 +='<div class="model-info">'+data[0].location+'</div>';
                return1 +='</li>';

                return1 +='<li>';
                return1 +='<label>Start Date & Time</label>';
                return1 +='<div class="model-info">'+data[0].start_date+' '+data[0].start_time+'</div>';
                return1 +='</li>';

                return1 +='<li>';
                return1 +='<label>End Date & Time</label>';
                return1 +='<div class="model-info">'+data[0].end_date+' '+data[0].end_time+'</div>';
                return1 +='</li>';

                return1 +='</ul>';

                return1 +='<div class="model-footer">';
                return1 +='<a class="btn btn-default waves-effect" style="margin-right: 10px;" data-dismiss="modal">Cancle</a>';
                return1 +='<a class="btn btn-danger" href ="{{url('tranner_status')}}/'+data[0].id+'/'+2+'" style="margin-right: 10px;">Not Attend</a>';
                return1 +='<a class="btn btn-success" href ="{{url('tranner_status')}}/'+data[0].id+'/'+1+'" >Attend</a>';
                return1 +='</div>';

                $('#show_model_details').html(return1);
                 $('#event-modal').modal("show");

             
           },
        })
             
    },


  
    /* Initializing */
    CalendarApp.prototype.init = function() {
       // this.enableDrag();
        /*  Initialize the calendar  */
        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();
        var form = '';
        var today = new Date($.now());

       var defaultEvents =  [ 
            @foreach($class as $task)
            {
                    title : '{{ $task->start_time }}  {{ $task->name }}',
                    id : '{{ $task->id }}',
                    start : '{{ $task->start_date }}',
                   // url : '{{ url('my_classes', $task->id) }}',
                    className: 'bg-primary'

                },
                @endforeach
          ];

        var $this = this;
        $this.$calendarObj = $this.$calendar.fullCalendar({
             
            handleWindowResize: true,   
            height: $(window).height() - 200,   
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek'
            },
            events: defaultEvents,
            eventClick: function(calEvent, jsEvent, view) { $this.onEventClick(calEvent, jsEvent, view); }

        });

        //on new event
        this.$saveCategoryBtn.on('click', function(){
            var categoryName = $this.$categoryForm.find("input[name='category-name']").val();
            var categoryColor = $this.$categoryForm.find("select[name='category-color']").val();
            if (categoryName !== null && categoryName.length != 0) {
                $this.$extEvents.append('<div class="external-event bg-' + categoryColor + '" data-class="bg-' + categoryColor + '" style="position: relative;"><i class="fa fa-move"></i>' + categoryName + '</div>')
               // $this.enableDrag();
            }

        });
    },

   //init CalendarApp
    $.CalendarApp = new CalendarApp, $.CalendarApp.Constructor = CalendarApp
    
}(window.jQuery),

//initializing CalendarApp
function($) {
    "use strict";
    $.CalendarApp.init()
}(window.jQuery);

</script>

<!----------------------- END CLENDER SCRIPT---------------------------------- -->

</body>
</html>
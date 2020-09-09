@extends('adminpanelcenter.adminlayout')

@section('content')
  <div class="content">
      <div class="container-fluid">
          <h4 class="page-title">Dashboard</h4>
          <div class="row">

            <!-- 
            
            FIRST CARD 
            
            -->

            <div class="col-md-3">
              <div class="card card-stats card-primary">
                <div class="card-body">
                  <div class="row">
                    <div class="col-5">
                      <div class="icon-big text-center">
                        <i class="fas fa-user-friends"></i>
                      </div>
                    </div>

                    <div class="col-7 d-flex align-items-center">
                      <div class="numbers">
                        <p class="card-category">Bookings</p>
                        <h4 class="card-title">{{$bookingNumber}}</h4>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>

            <!-- 
            
            SECOND CARD 
            
            -->

            <div class="col-md-3">
              <div class="card card-stats card-success">
                <div class="card-body">
                  <div class="row">
                    <div class="col-5">
                      <div class="icon-big text-center">
                        <i class="fas fa-hotel"></i>
                      </div>
                    </div>

                    <div class="col-7 d-flex align-items-center">
                      <div class="numbers">
                        <p class="card-category">Hotels</p>
                        <h4 class="card-title">{{$hotelNumber}}</h4>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>


             <!-- 
            
            3ed CARD 
            
            -->


            <div class="col-md-3">
              <div class="card card-stats card-danger">
                <div class="card-body">
                  <div class="row">
                    <div class="col-5">
                      <div class="icon-big text-center">
                        <i class="fas fa-city"></i>
                      </div>
                    </div>

                    <div class="col-7 d-flex align-items-center">
                      <div class="numbers">
                        <p class="card-category">Cities to visit</p>
                        <h4 class="card-title">{{$cityNumber}}</h4>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>



            <div class="col-md-3">
              <div class="card card-stats card-warning">
                <div class="card-body">
                  <div class="row">
                    <div class="col-5">
                      <div class="icon-big text-center">
                        <i class="fas fa-skating"></i>
                      </div>
                    </div>

                    <div class="col-7 d-flex align-items-center">
                      <div class="numbers">
                        <p class="card-category">Activities</p>
                        <h4 class="car  d-title">{{$activityNumber}}</h4>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header">
                  <div class="d-flex justify-content-between">
                    <div class="p-2 bd-highlight">
                      <h3>The Bookings of the last mounths</h3>
                    </div>
                    <div class="p-2 bd-highlight"><h3 ><i class="la la-download"></i></h3></div>
                  </div>
                <div class="card-body">
                  <div id="chart_div" style="width: 100%; height: 650px;"></div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="card">
              <div class="card-header">
                <p class="fw-bold">My Balance</p>
               
                <h4 class="mt-2">$ {{$ourbalance[0]->balance}}</h4>
                <p class="card-category">Table contains the last Booking requests</p>
                <table class="table table table-head-bg-primary mt-4">
                  <thead>
                    <tr>
                    <th scope="col">id</th>
                      <th scope="col">requester</th>
                      <th scope="col">price</th>
                      <th scope="col">Booked at</th>
                    </tr>
                  </thead>
                  <tbody>

                    @foreach ($allbookings as $item)
                    <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>$ {{$item->price}}</td>
                    <td>{{$item->dateof}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
      </div>

      <div class="row mt-4">
        <div class="card" style="width: 100%;">
          <div class="card-header">
            <h3>Top visited Cities</h3>
            <p class="card-category">
              a static Map that  describe the top cities visited
            </p>
          </div>

          <div id="regions_div" style="width: 100%; height: 500px;"></div>
        </div>
      </div>
  </div>  
</div>















  
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">

      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawVisualization);

      function drawVisualization() {
        // Some raw data (not necessarily accurate)
        var data = google.visualization.arrayToDataTable(
          
          
          [
            ['Month', 'Number of bookings'],
            @foreach($googlechartBookings as $gb )
              ['{{$gb->month}}' , {{$gb->bookingsNumber}}],
            @endforeach
          ]
        
        );

        var options = {
          title : 'Number of Booking each Month',
          vAxis: {title: 'number of booking'},
          hAxis: {title: 'Month'},
          seriesType: 'bars',
          series: {5: {type: 'line'}}
        };

        var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }


    google.charts.load('current', {
    'packages':['geochart'],
    // Note: you will need to get a mapsApiKey for your project.
    // See: https://developers.google.com/chart/interactive/docs/basic_load_libs#load-settings
    'mapsApiKey': 'AIzaSyD-9tSrke72PouQMnMX-a7eZSW0jkFMBWY'
  });
  google.charts.setOnLoadCallback(drawRegionsMap);

  function drawRegionsMap() {
    var data = google.visualization.arrayToDataTable([
      ['Country', 'visited'],
      @foreach($topCitisVisited as $tc )
        ['{{$tc->name}}' , {{$tc->numberOfBooking}}],
      @endforeach
    ]);

    var options = {};
    options['colorAxis'] = { minValue : 1, maxValue : 20, colors : ['#59D05D', '#4D7CFE']};

    var chart = new google.visualization.GeoChart(document.getElementById('regions_div'));

    chart.draw(data, options);
  }
  </script>


  @endsection
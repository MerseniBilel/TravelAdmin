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
                        <i class="la la-users"></i>
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
                        <i class="la la-hotel"></i>
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
                        <i class="la la-building"></i>
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
                        <i class="la la-calendar-o"></i>
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
            <div class="col-md-6">
              <div class="card">
                <div class="card-header">
                  <div class="d-flex justify-content-between">
                    <div class="p-2 bd-highlight">
                      <h3>The Bookings of the last mounths</h3>
                    </div>
                    <div class="p-2 bd-highlight"><h3 ><i class="la la-download"></i></h3></div>
                  </div>
                <div class="card-body">
                  <div id="chart_div" style="width: 800px; height: 650px;"></div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <h1>to do </h1>
            <h2>nkamel map mta3 google chart</h2>
            <h2>ne7seb el ballance</h2>
            <h2>nadhef tamplate</h2>
            <h2>na3mel crud mta3 city</h2>
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
  </script>



  @endsection
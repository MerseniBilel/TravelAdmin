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
                        <p class="card-category">App Users</p>
                        <h4 class="card-title">1,294</h4>
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
                        <h4 class="card-title">1,294</h4>
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
                        <h4 class="card-title">1,294</h4>
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
                        <h4 class="card-title">1,294</h4>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>


            

          </div>
      </div>
  </div>
@endsection
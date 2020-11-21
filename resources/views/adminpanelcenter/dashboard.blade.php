@extends('adminpanelcenter.adminlayout')





@section('content')
  <div class="content">
      <div class="container-fluid">
        @if (session('cityadded'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{session('cityadded')}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
          </div> 
        @endif

        @if (session('citynotadded'))
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{session('citynotadded')}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
          </div> 
        @endif
        @if (session('hotelAdded'))
          <div class="alert alert-success alert-success fade show" role="alert">
            <strong>{{session('hotelAdded')}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
          </div> 
        @endif
        @if (session('citydeleted'))
          <div class="alert alert-success alert-success fade show" role="alert">
            <strong>{{session('citydeleted')}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
          </div> 
        @endif
        @if (session('hoteldeleted'))
          <div class="alert alert-success alert-success fade show" role="alert">
            <strong>{{session('hoteldeleted')}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
          </div> 
        @endif

          <h4 class="page-title">Dashboard</h4>
          <div class="row">

            <!-- 
            
            FIRST CARD 
            
            -->

            <div class="col-md-4">
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

            <div class="col-md-4">
              <div class="card card-stats card-success">
                <div class="card-body">
                  <div class="row">
                    <div class="col-5">
                      <div class="icon-big text-center">
                        <a href="" data-toggle="modal" data-target="#addHotelModal" style="text-decoration: none;color: #FFF;">
                          <i class="fas fa-hotel"></i>
                        </a>
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


            <div class="col-md-4">
              <div class="card card-stats card-danger">
                <div class="card-body">
                  <div class="row">
                    <div class="col-5">
                      <div class="icon-big text-center">
                        <a href="" data-toggle="modal" data-target="#addcityModal" style="text-decoration: none;color: #FFF;">
                          <i class="fas fa-city"></i>
                        </a>
                        
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
                    <td>{{$item->email}}</td>
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

      <div class="row">
        <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <table class="table mt-3">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">counrty</th>
                      <th scope="col">description</th>
                      <th scope="col">action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($allcities as $item)
                        <tr>
                          <td>{{$item->id}}</td>
                          <td>{{$item->name}}</td>
                          <td>{{$item->description}}</td>
                          <td>
                            <a href="#" onclick="event.preventDefault();
                            document.querySelector('{{'#citydelete'.$item->id}}').submit();"><i class="fas fa-trash-alt text-danger"></i></a>
                            <a href="{{route('cities.edit', $item->id)}}"><i class="far fa-edit text-warning"></i></a>
                          </td>
                        </tr>

                        <form action="{{route('cities.destroy',$item->id)}}" method="POST" id="{{'citydelete'.$item->id}}" style="display: none;">
                          @csrf
                          @method('DELETE')
                        </form> 
                    @endforeach
                  </tbody>
                </table>
              </div>

              <div class="card-body">

              </div>
            </div>  
        </div>
        <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <table class="table mt-3">
                  <thead>
                    <tr>
                      <th scope="col">id</th>
                      <th scope="col">name</th>
                      <th scope="col">address</th>
                      <th scope="col">price</th>
                      <th scope="col">rating</th>
                      <th scope="col">action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($allhotels as $item)
                      <tr>

                        <td>{{$item->id}}</td>  
                        <td>{{$item->name}}</td>  
                        <td>{{$item->address}}</td>  
                        <td>${{$item->price}}</td>  
                        <td>{{$item->rating}}/5</td>  
                        <td>
                          <a href="#" onclick="event.preventDefault();
                            document.querySelector('{{'#hoteldelete'.$item->id}}').submit();"><i class="fas fa-trash-alt text-danger"></i></a>
                            <a href="{{route('hotels.edit', $item->id)}}"><i class="far fa-edit text-warning"></i></a>
                          </td>
                        </td>

                      </tr> 
                      <form action="{{route('hotels.destroy',$item->id)}}" method="POST" id="{{'hoteldelete'.$item->id}}" style="display: none;">
                        @csrf
                        @method('DELETE')
                      </form> 
                    @endforeach
                  </tbody>
                </table>
              </div>

              <div class="card-body"></div>
            </div>  
        </div>

  
      </div>
  </div>  
</div>


<!-- add city Modal -->

<div class="modal fade" id="addcityModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add new city</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <span id="addcity-result"></span>
            <form action="{{route('cities.store')}}" enctype="multipart/form-data" method="POST" id="addcitymodelform">
              @csrf
              <div class="form-group">
                  <label for="largeSelect">Large Select</label>
                  <select class="form-control form-control-lg" id="country" name="country" >
                      <option value="0">Select Country</option>
                      <option value="Afganistan">Afghanistan</option>
                      <option value="Albania">Albania</option>
                      <option value="Algeria">Algeria</option>
                      <option value="American Samoa">American Samoa</option>
                      <option value="Andorra">Andorra</option>
                      <option value="Angola">Angola</option>
                      <option value="Anguilla">Anguilla</option>
                      <option value="Antigua & Barbuda">Antigua & Barbuda</option>
                      <option value="Argentina">Argentina</option>
                      <option value="Armenia">Armenia</option>
                      <option value="Aruba">Aruba</option>
                      <option value="Australia">Australia</option>
                      <option value="Austria">Austria</option>
                      <option value="Azerbaijan">Azerbaijan</option>
                      <option value="Bahamas">Bahamas</option>
                      <option value="Bahrain">Bahrain</option>
                      <option value="Bangladesh">Bangladesh</option>
                      <option value="Barbados">Barbados</option>
                      <option value="Belarus">Belarus</option>
                      <option value="Belgium">Belgium</option>
                      <option value="Belize">Belize</option>
                      <option value="Benin">Benin</option>
                      <option value="Bermuda">Bermuda</option>
                      <option value="Bhutan">Bhutan</option>
                      <option value="Bolivia">Bolivia</option>
                      <option value="Bonaire">Bonaire</option>
                      <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
                      <option value="Botswana">Botswana</option>
                      <option value="Brazil">Brazil</option>
                      <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                      <option value="Brunei">Brunei</option>
                      <option value="Bulgaria">Bulgaria</option>
                      <option value="Burkina Faso">Burkina Faso</option>
                      <option value="Burundi">Burundi</option>
                      <option value="Cambodia">Cambodia</option>
                      <option value="Cameroon">Cameroon</option>
                      <option value="Canada">Canada</option>
                      <option value="Canary Islands">Canary Islands</option>
                      <option value="Cape Verde">Cape Verde</option>
                      <option value="Cayman Islands">Cayman Islands</option>
                      <option value="Central African Republic">Central African Republic</option>
                      <option value="Chad">Chad</option>
                      <option value="Channel Islands">Channel Islands</option>
                      <option value="Chile">Chile</option>
                      <option value="China">China</option>
                      <option value="Christmas Island">Christmas Island</option>
                      <option value="Cocos Island">Cocos Island</option>
                      <option value="Colombia">Colombia</option>
                      <option value="Comoros">Comoros</option>
                      <option value="Congo">Congo</option>
                      <option value="Cook Islands">Cook Islands</option>
                      <option value="Costa Rica">Costa Rica</option>
                      <option value="Cote DIvoire">Cote DIvoire</option>
                      <option value="Croatia">Croatia</option>
                      <option value="Cuba">Cuba</option>
                      <option value="Curaco">Curacao</option>
                      <option value="Cyprus">Cyprus</option>
                      <option value="Czech Republic">Czech Republic</option>
                      <option value="Denmark">Denmark</option>
                      <option value="Djibouti">Djibouti</option>
                      <option value="Dominica">Dominica</option>
                      <option value="Dominican Republic">Dominican Republic</option>
                      <option value="East Timor">East Timor</option>
                      <option value="Ecuador">Ecuador</option>
                      <option value="Egypt">Egypt</option>
                      <option value="El Salvador">El Salvador</option>
                      <option value="Equatorial Guinea">Equatorial Guinea</option>
                      <option value="Eritrea">Eritrea</option>
                      <option value="Estonia">Estonia</option>
                      <option value="Ethiopia">Ethiopia</option>
                      <option value="Falkland Islands">Falkland Islands</option>
                      <option value="Faroe Islands">Faroe Islands</option>
                      <option value="Fiji">Fiji</option>
                      <option value="Finland">Finland</option>
                      <option value="France">France</option>
                      <option value="French Guiana">French Guiana</option>
                      <option value="French Polynesia">French Polynesia</option>
                      <option value="French Southern Ter">French Southern Ter</option>
                      <option value="Gabon">Gabon</option>
                      <option value="Gambia">Gambia</option>
                      <option value="Georgia">Georgia</option>
                      <option value="Germany">Germany</option>
                      <option value="Ghana">Ghana</option>
                      <option value="Gibraltar">Gibraltar</option>
                      <option value="Great Britain">Great Britain</option>
                      <option value="Greece">Greece</option>
                      <option value="Greenland">Greenland</option>
                      <option value="Grenada">Grenada</option>
                      <option value="Guadeloupe">Guadeloupe</option>
                      <option value="Guam">Guam</option>
                      <option value="Guatemala">Guatemala</option>
                      <option value="Guinea">Guinea</option>
                      <option value="Guyana">Guyana</option>
                      <option value="Haiti">Haiti</option>
                      <option value="Hawaii">Hawaii</option>
                      <option value="Honduras">Honduras</option>
                      <option value="Hong Kong">Hong Kong</option>
                      <option value="Hungary">Hungary</option>
                      <option value="Iceland">Iceland</option>
                      <option value="Indonesia">Indonesia</option>
                      <option value="India">India</option>
                      <option value="Iran">Iran</option>
                      <option value="Iraq">Iraq</option>
                      <option value="Ireland">Ireland</option>
                      <option value="Isle of Man">Isle of Man</option>
                      <option value="Israel">Israel</option>
                      <option value="Italy">Italy</option>
                      <option value="Jamaica">Jamaica</option>
                      <option value="Japan">Japan</option>
                      <option value="Jordan">Jordan</option>
                      <option value="Kazakhstan">Kazakhstan</option>
                      <option value="Kenya">Kenya</option>
                      <option value="Kiribati">Kiribati</option>
                      <option value="Korea North">Korea North</option>
                      <option value="Korea Sout">Korea South</option>
                      <option value="Kuwait">Kuwait</option>
                      <option value="Kyrgyzstan">Kyrgyzstan</option>
                      <option value="Laos">Laos</option>
                      <option value="Latvia">Latvia</option>
                      <option value="Lebanon">Lebanon</option>
                      <option value="Lesotho">Lesotho</option>
                      <option value="Liberia">Liberia</option>
                      <option value="Libya">Libya</option>
                      <option value="Liechtenstein">Liechtenstein</option>
                      <option value="Lithuania">Lithuania</option>
                      <option value="Luxembourg">Luxembourg</option>
                      <option value="Macau">Macau</option>
                      <option value="Macedonia">Macedonia</option>
                      <option value="Madagascar">Madagascar</option>
                      <option value="Malaysia">Malaysia</option>
                      <option value="Malawi">Malawi</option>
                      <option value="Maldives">Maldives</option>
                      <option value="Mali">Mali</option>
                      <option value="Malta">Malta</option>
                      <option value="Marshall Islands">Marshall Islands</option>
                      <option value="Martinique">Martinique</option>
                      <option value="Mauritania">Mauritania</option>
                      <option value="Mauritius">Mauritius</option>
                      <option value="Mayotte">Mayotte</option>
                      <option value="Mexico">Mexico</option>
                      <option value="Midway Islands">Midway Islands</option>
                      <option value="Moldova">Moldova</option>
                      <option value="Monaco">Monaco</option>
                      <option value="Mongolia">Mongolia</option>
                      <option value="Montserrat">Montserrat</option>
                      <option value="Morocco">Morocco</option>
                      <option value="Mozambique">Mozambique</option>
                      <option value="Myanmar">Myanmar</option>
                      <option value="Nambia">Nambia</option>
                      <option value="Nauru">Nauru</option>
                      <option value="Nepal">Nepal</option>
                      <option value="Netherland Antilles">Netherland Antilles</option>
                      <option value="Netherlands">Netherlands (Holland, Europe)</option>
                      <option value="Nevis">Nevis</option>
                      <option value="New Caledonia">New Caledonia</option>
                      <option value="New Zealand">New Zealand</option>
                      <option value="Nicaragua">Nicaragua</option>
                      <option value="Niger">Niger</option>
                      <option value="Nigeria">Nigeria</option>
                      <option value="Niue">Niue</option>
                      <option value="Norfolk Island">Norfolk Island</option>
                      <option value="Norway">Norway</option>
                      <option value="Oman">Oman</option>
                      <option value="Pakistan">Pakistan</option>
                      <option value="Palau Island">Palau Island</option>
                      <option value="Palestine">Palestine</option>
                      <option value="Panama">Panama</option>
                      <option value="Papua New Guinea">Papua New Guinea</option>
                      <option value="Paraguay">Paraguay</option>
                      <option value="Peru">Peru</option>
                      <option value="Phillipines">Philippines</option>
                      <option value="Pitcairn Island">Pitcairn Island</option>
                      <option value="Poland">Poland</option>
                      <option value="Portugal">Portugal</option>
                      <option value="Puerto Rico">Puerto Rico</option>
                      <option value="Qatar">Qatar</option>
                      <option value="Republic of Montenegro">Republic of Montenegro</option>
                      <option value="Republic of Serbia">Republic of Serbia</option>
                      <option value="Reunion">Reunion</option>
                      <option value="Romania">Romania</option>
                      <option value="Russia">Russia</option>
                      <option value="Rwanda">Rwanda</option>
                      <option value="St Barthelemy">St Barthelemy</option>
                      <option value="St Eustatius">St Eustatius</option>
                      <option value="St Helena">St Helena</option>
                      <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                      <option value="St Lucia">St Lucia</option>
                      <option value="St Maarten">St Maarten</option>
                      <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
                      <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
                      <option value="Saipan">Saipan</option>
                      <option value="Samoa">Samoa</option>
                      <option value="Samoa American">Samoa American</option>
                      <option value="San Marino">San Marino</option>
                      <option value="Sao Tome & Principe">Sao Tome & Principe</option>
                      <option value="Saudi Arabia">Saudi Arabia</option>
                      <option value="Senegal">Senegal</option>
                      <option value="Seychelles">Seychelles</option>
                      <option value="Sierra Leone">Sierra Leone</option>
                      <option value="Singapore">Singapore</option>
                      <option value="Slovakia">Slovakia</option>
                      <option value="Slovenia">Slovenia</option>
                      <option value="Solomon Islands">Solomon Islands</option>
                      <option value="Somalia">Somalia</option>
                      <option value="South Africa">South Africa</option>
                      <option value="Spain">Spain</option>
                      <option value="Sri Lanka">Sri Lanka</option>
                      <option value="Sudan">Sudan</option>
                      <option value="Suriname">Suriname</option>
                      <option value="Swaziland">Swaziland</option>
                      <option value="Sweden">Sweden</option>
                      <option value="Switzerland">Switzerland</option>
                      <option value="Syria">Syria</option>
                      <option value="Tahiti">Tahiti</option>
                      <option value="Taiwan">Taiwan</option>
                      <option value="Tajikistan">Tajikistan</option>
                      <option value="Tanzania">Tanzania</option>
                      <option value="Thailand">Thailand</option>
                      <option value="Togo">Togo</option>
                      <option value="Tokelau">Tokelau</option>
                      <option value="Tonga">Tonga</option>
                      <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                      <option value="Tunisia">Tunisia</option>
                      <option value="Turkey">Turkey</option>
                      <option value="Turkmenistan">Turkmenistan</option>
                      <option value="Turks & Caicos Is">Turks & Caicos Is</option>
                      <option value="Tuvalu">Tuvalu</option>
                      <option value="Uganda">Uganda</option>
                      <option value="United Kingdom">United Kingdom</option>
                      <option value="Ukraine">Ukraine</option>
                      <option value="United Arab Erimates">United Arab Emirates</option>
                      <option value="United States of America">United States of America</option>
                      <option value="Uraguay">Uruguay</option>
                      <option value="Uzbekistan">Uzbekistan</option>
                      <option value="Vanuatu">Vanuatu</option>
                      <option value="Vatican City State">Vatican City State</option>
                      <option value="Venezuela">Venezuela</option>
                      <option value="Vietnam">Vietnam</option>
                      <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                      <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                      <option value="Wake Island">Wake Island</option>
                      <option value="Wallis & Futana Is">Wallis & Futana Is</option>
                      <option value="Yemen">Yemen</option>
                      <option value="Zaire">Zaire</option>
                      <option value="Zambia">Zambia</option>
                      <option value="Zimbabwe">Zimbabwe</option>
                  </select>
                  @error('country') <div class="text-danger">{{$message}}</div> @enderror
              </div>

              <div class="form-group">
                  <label for="comment">Description</label>
                  <textarea class="form-control" id="description" name="description" rows="5">
                  </textarea>
                  @error('description') <div class="text-danger">{{ $message }}</div> @enderror
              </div>

              <div class="form-group">
                  <label for="exampleFormControlFile1">upload file</label>
                  <input  type="file" class="form-control-file" id="exampleFormControlFile1" name="image">
                  @error('image') <div class="text-danger">{{ $message }}</div> @enderror
              </div>

              <div class="modal-footer">
                  <button class="btn btn-primary" name="submit" id="submit">submit</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

              </div>
          </form>

      </div>
    </div>
  </div>
</div>



<div class="modal fade" id="addHotelModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add new Hotel</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <span id="addcity-result"></span>
            <form action="{{route('hotels.store')}}" enctype="multipart/form-data" method="POST" id="addcitymodelform">
              @csrf
              <div class="form-group">
                <label for="squareInput">name</label>
                <input type="text" name="name" class="form-control input-square" id="name" placeholder="Hotel name">
                @error('name') <div class="text-danger">{{ $message }}</div> @enderror
              </div>

              <div class="form-group">
                <label for="squareInput">address</label>
                <input type="text" name="address" class="form-control input-square" id="address" placeholder="Hotel address">
                @error('address') <div class="text-danger">{{ $message }}</div> @enderror
              </div>


              <div class="form-group">
                <label for="squareSelect">stars</label>
                <select class="form-control input-square" id="rating" name="rating">
                  <option value="1" >1</option>
                  <option value="2" >2</option>
                  <option value="3" >3</option>
                  <option value="4" >4</option>
                  <option value="5" >5</option>
                </select>
              </div>

              <div class="form-group">
                <label for="squareSelect">City</label>
                <select class="form-control input-square" id="city" name="city">
                  @foreach ($allcities as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                  @endforeach
                </select>
              </div>

              

              <div class="form-group">
                <label for="squareInput">price</label>
                <input type="number" name="price" class="form-control input-square" id="address" placeholder="Hotel price $ ">
                @error('price') <div class="text-danger">{{ $message }}</div> @enderror
              </div>

              <div class="form-group">
                  <label for="comment">Description</label>
                  <textarea class="form-control" id="description" name="description" rows="5">
                  </textarea>
                  @error('description') <div class="text-danger">{{ $message }}</div> @enderror
              </div>

              <div class="form-group">
                  <label for="exampleFormControlFile1">upload file</label>
                  <input  type="file" class="form-control-file" id="exampleFormControlFile1" name="image">
                  @error('image') <div class="text-danger">{{ $message }}</div> @enderror
              </div>

              <div class="modal-footer">
                  <button class="btn btn-primary" name="submit" id="submit">submit</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

              </div>
          </form>

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
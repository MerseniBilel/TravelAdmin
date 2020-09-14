@extends('adminpanelcenter.adminlayout')


@section('content')
<div class="content">
    <div class="container-fluid">

        @if (session('hotelupdate'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>{{session('hotelupdate')}}</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
        </div> 
      @endif

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3>{{$hotel->name}} : </h3>
                        <h6>{{$hotel->description}}</h6>
                    </div>
                    <div class="card-body">
                        <img src="{{asset('storage/'.$hotel->imageurl)}}" alt="{{$hotel->name}}" class="img-thumbnail" style="width: 100%; height:100%">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3>{{$hotel->name}} Info :</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{route('hotels.update',$hotel->id)}}" enctype="multipart/form-data" method="POST" id="modifyhotel">
                            @csrf
                            @method('PATCH')
              
                            <div class="form-group">
                              <label for="squareInput">name</label>
                                <input type="text" name="name" class="form-control input-square" id="name" placeholder="Hotel name" value="{{$hotel->name}}">
                            </div>
              
                            <div class="form-group">
                              <label for="squareInput">address</label>
                              <input type="text" name="address" class="form-control input-square" id="address" placeholder="Hotel address" value="{{$hotel->address}}">
                            </div>
              
              
                            <div class="form-group">
                              <label for="squareSelect">stars</label>
                              <select class="form-control input-square" id="rating" name="rating">
                                <option value="{{$hotel->rating}}" >{{$hotel->rating}}</option>
                                <option value="1" >1</option>
                                <option value="2" >2</option>
                                <option value="3" >3</option>
                                <option value="4" >4</option>
                                <option value="5" >5</option>
                              </select>
                            </div>

                            <div class="form-group">
                                <label for="squareSelect">City</label>
                                <select class="form-control input-solid" id="city" name="city">
                                    <option value="{{$cityofhotel[0]->id}}" selected>{{$cityofhotel[0]->name}}</option>
                                  @foreach ($cities as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                  @endforeach
                                </select>
                            </div>                            
                            
                            
              
                            
              
                            <div class="form-group">
                              <label for="squareInput">price</label>
                              <input type="number" name="price" class="form-control input-square" id="address" placeholder="Hotel price $ " value="{{$hotel->price}}">
                              @error('price') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
              
                            <div class="form-group">
                                <label for="comment">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="5">
                                    {{$hotel->description}}
                                </textarea>
                                @error('description') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
              
                            <div class="form-group">
                                <label for="exampleFormControlFile1">upload file</label>
                                <input  type="file" class="form-control-file" id="exampleFormControlFile1" name="image">
                                @error('image') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
              
                            <div class="modal-footer">
                                <button class="btn btn-primary" name="submit" id="submit">update</button>
              
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection
@extends('adminpanelcenter.adminlayout')
@section('content')
<div class="content">
    <div class="container-fluid">

        @if (session('cityupdated'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>{{session('cityupdated')}}</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
        </div> 
      @endif

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3>{{$city->name}} : </h3>
                        <h6>{{$city->description}}</h6>
                    </div>
                    <div class="card-body">
                        <img src="{{asset('storage/'.$city->imageurl)}}" alt="{{$city->name}}" class="img-thumbnail" style="width: 100%; height:100%">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3>{{$city->name}} Info :</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{route('cities.update', $city->id)}}" enctype="multipart/form-data" method="POST" id="addcitymodelform">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="largeSelect">Large Select</label>
                                <select class="form-control input-solid" id="country" name="country" >
                                    <option value="{{$city->name}}">{{$city->name}}</option>
                                </select>
                                @error('country') <div class="text-danger">{{$message}}</div> @enderror
                            </div>
              
                            <div class="form-group">
                                <label for="comment">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="5">
                                    {{$city->description}}
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
    </div>
</div>
    
@endsection
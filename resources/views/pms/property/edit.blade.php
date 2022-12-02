@extends('pms.layouts.master')

@section('content')
<div class="app-content">
            <div class="side-app">
						<div class="page-header">
							<h4 class="page-title">Client</h4>
						
						</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit Client</h3>
            </div>
            <div class="card-body">
                 <div class="row">
                     <form action="{{route('property.update',$property->id)}}" method="post">
                         @csrf
                         {{method_field('PUT')}}
                         <div class="row">
                          <div class="col-md-6">
                          <div class="form-group">
                            <label class="form-label">Location</label>
                            <select name="location" id="location" class="form-control">
                            @foreach($locations as $location)
                            @if($property->location_id == $location->id )
                                <option value="{{$location->id}}">{{$location->name}}</option>
                            @endif
                            @endforeach
                            @foreach($locations as $location)
                            @if($property->location_id != $location->id )
                                <option value="{{$location->id}}">{{$location->name}}</option>
                            @endif
                            @endforeach
                            </select>
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Nature</label>
                           <select name="nature" id="nature" class="form-control">
                           @foreach($natures as $nature)
                            @if($property->nature_id == $nature->id )
                            <option value="{{$nature->id}}">{{$nature->type}}</option>
                            @endif
                            @endforeach
                            @foreach($natures as $nature)
                            @if($property->nature_id != $nature->id )
                            <option value="{{$nature->id}}">{{$nature->type}}</option>
                            @endif
                            @endforeach
                           
                        </select>
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Property Type</label>
                            <input type="text" class="form-control @error('property_type') is-invalid @enderror" name="property_type" value="{{$property->property_type}}" placeholder="property_type">
                            @error('property_type')
                             <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                             </span>
                           @enderror
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Size of Property(PerSquareFeet)</label>
                            <input type="text" class="form-control  @error('size_of_property') is-invalid @enderror" name="size_of_property" value="{{$property->size_of_property}}" placeholder="size_of_property">
                            @error('size_of_property')
                             <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                             </span>
                           @enderror
                        </div>
                        </div>
                        
                        <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Property No</label>
                            <input type="number" class="form-control @error('appartment_no') is-invalid @enderror" name="appartment_no"  value="{{$property->appartment_no}}" placeholder="Property No">
                            @error('appartment_no')
                             <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                             </span>
                           @enderror
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Price</label>
                            <input type="number" class="form-control @error('price') is-invalid @enderror" value="{{$property->price}}" name="price" placeholder="price">
                            @error('price')
                             <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                             </span>
                            @enderror
                        </div>
                        </div>
                         </div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>  
                    </div>
                    </form>    
                </div>
            </div>
            
        </div>
     
    </div>
</div>
</div>
@endsection
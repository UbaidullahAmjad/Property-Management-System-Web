@extends('pms.layouts.master')

@section('content')
<div class="app-content">
    <div class="side-app">
        <div class="page-header">
            <h4 class="page-title">Property</h4>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                    
                        <h3 class="card-title">Property Type</h3>
                    </div>
                    <div class="card-body">
                    @if(Session::has('type-updated')) 
                        <p class="alert alert-success">{{ Session::get('type-updated') }}</p>
                        @endif
                        <div class="row">
                        
                            <form action="{{route('property-type.update',$type->id)}}" method="post">
                                @csrf
                                {{method_field('PUT')}}
                                <input type="hidden" name="id" value="{{$type->id}}">
                                <div class="col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label class="form-label">Name</label>
                                        <input type="text" class="form-control" name="name" value="{{$type->name}}" placeholder="Name">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection
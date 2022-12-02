@extends('pms.layouts.master')

@section('content')
<div class="app-content">
    <div class="side-app">
        <div class="page-header">
            <h4 class="page-title">Property</h4>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                    
                        <h3 class="card-title">Property Plot</h3>
                    </div>
                    <div class="card-body">
                    @if(Session::has('plot-updated')) 
                        <p class="alert alert-success">{{ Session::get('plot-updated') }}</p>
                        @endif
                        <div class="row">
                        
                            <form action="{{route('plot.update',$plot->id)}}" method="post">
                                @csrf
                                {{method_field('PUT')}}
                                <input type="hidden" name="id" value="{{$plot->id}}">
                                <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Name</label>
                                        <input type="text" class="form-control" name="sector_no" value="{{$plot->sector_no}}" placeholder="Enter Sector No">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Plot No</label>
                                        <input type="text" class="form-control" name="plot_no" value="{{$plot->plot_no}}" placeholder="Ener Plot No">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Street No:</label>
                                        <input type="text" class="form-control" name="street_no" value="{{$plot->street_no}}" placeholder="Ener Street No">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Size No:</label>
                                        <input type="text" class="form-control" name="size_no" value="{{$plot->size_no}}" placeholder="Ener Size No">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Category:</label>
                                        <input type="text" class="form-control" name="category" value="{{$plot->category}}" placeholder="Ener Category">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Price:</label>
                                        <input type="integer" class="form-control" name="price" value="{{$plot->price}}" placeholder="Ener Price">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Phase No:</label>
                                        <input type="text" class="form-control" name="phase_no" value="{{$plot->phase_no}}" placeholder="Ener Phase No">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <select class="form-control" name="status" value="{{$plot->status}}">
                                    <option>Transferable</option>
                                    <option>Open Transfer</option>
                                    </select>
                                    </div>
                                    </div>
                                    <div class="col-md-12">
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
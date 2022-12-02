@extends('pms.layouts.master')

@section('content')

<div class="app-content">
    <div class="side-app">
        <div class="page-header">
            <h4 class="page-title">Property Plot</h4>
        </div>
        <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                <div class="card-body"> 
                @if(Session::has('plot_deleted'))
            <p class="alert alert-success">{{ Session::get('plot_deleted') }}</p>
            @endif
            @if(Session::has('plot-updated')) 
                        <p class="alert alert-success">{{ Session::get('plot-updated') }}</p>
                        @endif
            <div class="col-md-12 col-lg-12 text-right">
                         <a href="{{route('plot.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i></a>
                    </div>
                </div>
                    <table class="table table-bordered" style="text-align:center;">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Sr#</th>
                                <th scope="col">Sector </th>
                                <th scope="col">Plot </th>
                                <th scope="col">Street</th>
                                <th scope="col">Size </th>
                                <th scope="col">Category</th>
                                <th scope="col">Price </th>
                                <th scope="col">Phase </th>
                                <th scope="col">Status</th>
                                <th scope="col">Sale</th>
                                <th colspan="3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($plots as $key => $plot)
                            <tr>
                                <td>{{ $key++ }}</td>
                                <td>{{$plot->sector_no}}</td>
                                <td>{{$plot->plot_no}}</td>
                                <td>{{$plot->street_no}}</td>
                                <td>{{$plot->size_no}}</td>
                                <td>{{$plot->category}}</td>
                                <td>{{$plot->price}}</td>
                                <td>{{$plot->phase_no}}</td>
                                <td>{{$plot->status}}</td>

                                   <td>
                                       @if($plot->client_id == 0)
                                        <a href="{{route('plot.show',$plot->id)}}" class="btn btn-warning">Sale</a>
                                        @else
                                        <a href="{{route('invoice.plot_invoice',$plot->id)}}" class="btn btn-info">View</a>
                                        @endif
                                    </td>
                                
                                    <td style="display: flex;"> <a href="{{route('plot.edit',$plot->id)}}" class="btn btn-info">Edit</a>
                                     <form action="{{route('plot.destroy',$plot->id)}}" method="POST">
                                     @csrf
                                     {{method_field('DELETE')}}
                                     <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                     </form>
                                    </td>

                                    
                                    
                            
                        </tr>
                            @endforeach
                        </tbody>
                    </table>
               
                </div>
            </div>

        </div>



@endsection
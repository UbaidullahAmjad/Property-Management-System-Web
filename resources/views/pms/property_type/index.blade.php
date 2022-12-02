@extends('pms.layouts.master')

@section('content')

<div class="app-content">
    <div class="side-app">
        <div class="page-header">
            <h4 class="page-title">Property Type</h4>
        </div>
        <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                <div class="card-body"> 
                @if(Session::has('type_deleted'))
            <p class="alert alert-success">{{ Session::get('type_deleted') }}</p>
            @endif
            @if(Session::has('status'))  
                        <p class="alert alert-success">{{ Session::get('status') }}</p>
                        @endif
                        @if(Session::has('update'))  
                        <p class="alert alert-success">{{ Session::get('update') }}</p>
                        @endif
            <div class="col-md-12 text-right">
                         <a href="{{route('property-type.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i></a>
                    </div>
                </div>
                    <table class="table table-bordered" style="text-align:center;">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Property Name</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($types as $type)
                            <tr>
                                <td style="padding: 20px;">{{$type->id}}</td>
                                <td style="padding: 20px;">{{$type->name}}</td>

                                <td style=" display: inline-flex">
                                    <a href="{{route('property-type.edit',$type->id)}}" class="btn btn-info">Edit</a>
                                <form action="{{route('property-type.destroy',$type->id)}}" method="POST">
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
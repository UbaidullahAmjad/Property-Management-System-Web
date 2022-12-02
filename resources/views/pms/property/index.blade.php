@extends('pms.layouts.master')

@section('content')

<div class="app-content">
    <div class="side-app">
        <div class="page-header">
            <h4 class="page-title">Property</h4>
        </div>

        <div class="container">

      
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                <div class="card-body">
                <div class="col-md-12 text-right">
                         <a href="{{route('property.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i></a>
                    </div>
                </div>
                    <div class="card-body">
                        <table class="table table-bordered" style="text-align:center;">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col"> Id</th>
                                    <th scope="col"> Nature</th>
                                    <th scope="col"> Location</th>
                                    <th scope="col"> PropType</th>
                                    <th scope="col"> PropSize</th>
                                    <th scope="col"> Appart No #</th>
                                    <th scope="col"> Price</th> 
                                    <th scope="col">Sale</th>
                                    &nbsp;&nbsp;<th colspan="2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($property as $prop)
                                <tr>
                                    <td style="padding: 20px;">{{$loop->index+1}}</td>
                                    <td style="padding: 20px;">{{$prop->natures->type}}</td>
                                    <td style="padding: 20px;">{{$prop->locations->name}}</td>
                                    <td style="padding: 20px;">{{$prop->property_type}}</td>
                                    <td style="padding: 20px;">{{$prop->size_of_property}}</td>
                                    <td style="padding: 20px;">{{$prop->appartment_no}}</td>
                                    <td style="padding: 20px;">{{$prop->price}}</td>
                                      
                                    <td>
                                       @if($prop->status == 0)
                                        <a href="{{route('property.sale',$prop->id)}}" class="btn btn-warning">Sale</a>
                                        @else
                                        <a href="{{route('installment.index',$prop->id)}}" class="btn btn-info">View</a>
                                        @endif
                                    <td>
                                    <td style=" display: inline-flex">
                                   
                                    <a href="{{route('property.edit',$prop->id)}}" class="btn btn-success" style="margin: 2px;"><i class="fa fa-pencil"></i></a>
                                    <form action="{{route('property.destroy',$prop->id)}}" method="post">
                                      @csrf
                                      {{method_field('DELETE')}}

                                        <button type="submit" style="margin: 2px;" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                    </form>
                                  
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                   
                </div>
            </div>

        </div>
        </div>

    </div>
</div>

@endsection
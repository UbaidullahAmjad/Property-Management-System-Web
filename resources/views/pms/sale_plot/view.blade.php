@extends('pms.layouts.master')

@section('content')

<div class="app-content">
    <div class="side-app">
        <div class="page-header">
            <h4 class="page-title">Sale View</h4>
        </div>

     <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Sale list</h3>
                      
                    </div>
                    <div class="card-body">
                        <table class=" table table-bordered m-2" style="text-align:center">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="row"> Id</th>
                                    <th scope="row">Created Date</th>
                                    <th scope="row"> Sector No</th>
                                    <th scope="row"> Plot No</th>
                                    <th scope="row"> Size No </th>
                                    <th scope="row"> Category</th>
                                    <th scope="row"> Price</th>
                                    <th scope="row"> Phase</th>
                                    
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($plotsales as $plotsale)
                                <tr>
                                    <td>{{$plotsale->id}}</td>
                                    <td>{{$plotsale->created_at->format('d-M-y')}}</td>
                                    <td>{{$plotsale->sector_no}}</td>
                                    <td>{{$plotsale->plot_no}}</td>
                                    <td>{{$plotsale->size_no}}</td>
                                    <td>{{$plotsale->category}}</td>
                                    <td>{{$plotsale->price}}</td>
                                    <td>{{$plotsale->phase_no}}</td>
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
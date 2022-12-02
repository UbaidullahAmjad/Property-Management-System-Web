@extends('pms.layouts.master')

@section('content')

<div class="app-content">
    <div class="side-app">
        <div class="page-header">
            <h4 class="page-title">Location</h4>
        </div>
        <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                <div class="card-body"> 
                   <div class="col-md-12 text-right">
                        <a href="{{route('location.create')}}" class="btn-wide btn btn-primary"><i class="fa fa-plus-circle"></i></a>
                    </div>
                </div>
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Location Name</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($locations as $location)
                            <tr>
                                <td style="padding: 20px;">{{$location->id}}</td>
                                <td style="padding: 20px;">{{$location->name}}</td>
                                <td style="padding: 20px;">
                                    @if($location->active == 1)
                                    <span class="mb-2 mr-2 badge badge-success">Active</span>
                                    @else
                                    <span class="badge badge-danger">Inactive</span>
                                    @endif
                                </td>
                                <td style=" display: inline-flex">
                            
                                   <a type="button" class="btn btn-success" style="margin: 2px;"  onclick="show_modal('{{ $location->id }}')">
                                    <i class="fa fa-pencil"></i></a>
                                    
                                       <form action="{{route('location.destroy',$location->id)}}" method="POST">
                                        @csrf
                                        {{method_field('DELETE')}}
                            
                                        <button type="submit" style="margin: 2px;" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                    </form>
                                    
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
               


                    {{ $locations->links()}}
                </div>
            </div>

        </div>

        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <form action="{{route('location.updated')}}" method="post">
                        @csrf

                        <input type="hidden" name="id" id="id">
                     <div class="col-md-12 col-lg-12">
                        <label class="radio-inline" style="margin: 10px;"><input type="radio" name="active" value="1" checked style="margin: 15px;">Active </label>
                        <label class="radio-inline"><input type="radio" name="active" value="0" style="margin: 15px;">InActive</label>                    
                            <div class="form-group">
                                <label class="form-label">Location Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Name">
                                @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                             </div>
                            
                        </div>

                   
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" >Submit</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
        </div>
    </div>


</div>
</div>

<script>
    function show_modal(id) {


        var _token = $('input[name="_token"]').val();
        $.ajax({
            type: "post",
            url: "{{ route('location.editing') }}",
            data: {
                id: id,
                _token: _token
            },
            success: function(location) {

                // console.log(user);
                $('#id').val(location.id);
                $('#name').val(location.name);
                $('#active').val(location.active);
                $('#myModal').modal('show');


            },
            error: function(error) {
                console.log(error);
            }
        });
    }
</script>

@endsection
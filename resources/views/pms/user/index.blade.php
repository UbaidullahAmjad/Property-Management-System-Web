@extends('pms.layouts.master')

@section('content')

<div class="app-content">
    <div class="side-app">
        <div class="page-header">
            <h4 class="page-title">Location</h4>
        </div>

        <div class="container">


            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="col-md-12 text-right">
                                <a href="{{route('user.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i></a>
                            </div>

                        </div>
                        <div class="card-body">
                            <table class="table table-bordered  m-2" style="text-align:center;">
                                <thead class="thead-dark">
                                    <tr>
                                        <th> Id</th>
                                        <th>Name</th>
                                        <th> email</th>
                                        <th> Cnic</th>
                                        <th>Phone</th>
                                        <th>Type</th>

                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $use)
                                    <tr>
                                        <td style="padding: 20px;">{{$use->id}}</td>
                                        <td style="padding: 20px;">{{$use->name}}</td>
                                        <td style="padding: 20px;">{{$use->email}}</td>
                                        <td style="padding: 20px;">{{$use->cnic}}</td>
                                        <td style="padding: 20px;">{{$use->phone}}</td>
                                        <td style="padding: 20px;">{{$use->type}}</td>
                                        <td style=" display: inline-flex">

                                            <a type="button" class="btn btn-success" data-toggle="modal" onclick="show_modal('{{ $use->id }}')" style="margin: 2px;"><i class="fa fa-pencil">
                                                </i>
                                            </a>

                                            <form action="{{route('user.destroy',$use->id)}}" method="post">
                                                @csrf
                                                {{method_field('DELETE')}}

                                                <button type="submit" class="btn btn-danger" style="margin: 2px;"><i class="fa fa-trash"></i></button>
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

<!-- Edit MOdal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>
            <form action="{{route('user.updated')}}" method="post">
                @csrf

                <input type="hidden" name="id" id="id">

                <div class="col-md-12 col-lg-12">
                    <div class="form-group">
                        <label class="form-label"> Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Name">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label"> Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Email">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label"> CNIC</label>
                        <input type="number" class="form-control @error('cnic') is-invalid @enderror" name="cnic" id="cnic" placeholder="cnic">
                        @error('cnic')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label"> Phone</label>
                        <input type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" placeholder="phone">
                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>

                </div>


                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>

    </div>
</div>

<script>
    function show_modal(id) {
        var _token = $('input[name="_token"]').val();
        $.ajax({
            type: "post",
            url: "{{ route('user.editing') }}",
            data: {
                id: id,
                _token: _token
            },
            success: function(client) {

                // console.log(nature);
                $('#id').val(client.id);
                $('#name').val(client.name);
                $('#email').val(client.email);
                $('#cnic').val(client.cnic);
                $('#phone').val(client.phone);
                $('#myModal').modal('show');


            },
            error: function(error) {
                console.log(error);
            }
        });
    }
</script>

@endsection
@extends('pms.layouts.master')

@section('content')

<div class="app-content">
    <div class="side-app">
        <div class="page-header">
            <h4 class="page-title">Nature</h4>
        </div>

        <div class="container">


            <div class="row">
                <div class="col-md-8">
                    <div class="card">

                        <div class="card-body"> 
                            <div class="col-md-12 text-right">
                                <a href="{{route('nature.create')}}" class="btn-wide btn btn-primary"><i class="fa fa-plus-circle"></i></a>
                            </div>


                        </div>

                        <table class="table table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col"> Id</th>
                                    <th scope="col">Nature Name</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($nature as $nat)
                                <tr>
                                    <td style="padding: 20px;">{{$nat->id}}</td>
                                    <td style="padding: 20px;">{{$nat->type}}</td>
                                    <td style=" display: inline-flex">
                                        <a type="button" class="btn btn-success" style="margin: 2px;" data-toggle="modal" onclick="show_modal('{{ $nat->id }}')"><i class="fa fa-pencil">
                                        </i>
                                    </a>

                                    <form action="{{route('nature.destroy',$nat->id)}}" method="POST">
                                        @csrf
                                        {{method_field('DELETE')}}
                                        <button type="submit" class="btn btn-danger" style="margin: 2px;"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>


                    {{ $nature->links()}}
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
                    <form action="{{route('nature.updated')}}" method="post">
                        @csrf

                        <input type="hidden" name="id" id="id">

                        <div class="col-md-12 col-lg-12">
                            <div class="form-group">
                                <label class="form-label"> Nature type</label>
                                <input type="text" class="form-control @error('type') is-invalid @enderror" name="type" id="type" placeholder="Type">
                            </div>
                            @error('type')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>


                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" >Submit</button>
                        </div>
                    </form>
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
            url: "{{ route('nature.editing') }}",
            data: {
                id: id,
                _token: _token
            },
            success: function(nature) {

// console.log(nature);
$('#id').val(nature.id);
$('#type').val(nature.type);
$('#myModal').modal('show');


},
error: function(error) {
    console.log(error);
}
});
    }
</script>


@endsection
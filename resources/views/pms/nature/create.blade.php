@extends('pms.layouts.master')

@section('content')
<div class="app-content">
            <div class="side-app">
						<div class="page-header">
							<h4 class="page-title">Nature</h4>
							<!-- <ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">Dashboard 1</li>
							</ol> -->
						</div>
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Nature</h3>
            </div>
            <div class="card-body">
                 <div class="row">
                     <form action="{{route('nature.store')}}" method="post">
                         @csrf
                    
                        <div class="form-group">
                            <label class="form-label"> Nature Type</label>
                            <input type="text" class="form-control @error('type') is-invalid @enderror" name="type" placeholder="type">
                            @error('type')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
             
                    </form>    
                </div>
            </div>
            
        </div>
     
    </div>
</div>
</div>
@endsection
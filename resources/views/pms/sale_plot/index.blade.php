@extends('pms.layouts.master')

@section('content')
<div class="app-content" >
            <div class="side-app">
						<div class="page-header">
							<h4 class="page-title">Sale</h4>
						
						</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Sale</h3>
            </div>
            <div class="card-body">
                 <div class="row">
                     <form action="{{route('plot-sale.store',$plot->id)}}" method="post" >
                         @csrf
                         
                         <div class="row">
                         <input type="hidden" name="plot_id" value="{{$plot->id}}">
                         <!-- <input type="hidden" name="user_id" value="{{ Auth::user()->id }}"> -->
                         <!-- /// -->
                         <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Client</label>
                         
                            <select name="client" class="form-control">
                            @foreach($users as $user)
                               <option value="{{$user->id}}">{{$user->name}}</option>
                               @endforeach
                            </select>
                            
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Sector No</label>
                            <input type="text" class="form-control" name="sector_no" value="{{$plot->sector_no}}" readonly>
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Plot No</label>
                            <input type="text" class="form-control" name="plot_no" id="plot_no"  placeholder="total_amount" value="{{$plot->plot_no}}" readonly>
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Size</label>
                            <input type="text" class="form-control" name="size_no" id="size_no"  placeholder="" value="{{$plot->size_no}}" readonly>
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Category</label>
                            <input type="text" class="form-control" name="category" id="category"  placeholder="Category" value="{{$plot->category}}" readonly>
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Price</label>
                            <input type="integer" class="form-control" name="price"   placeholder="Price" value="{{$plot->price}}" readonly>
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Phase No</label>
                            <input type="text" class="form-control" name="phase_no" id="phase_no"  placeholder="phase_no" value="{{$plot->phase_no}}" readonly>
                        </div>
                        </div>
                         </div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>  
                    </div>
                    </form>    
                </div>
            </div>
            
        </div>
     
    </div>
</div>
</div>
@endsection
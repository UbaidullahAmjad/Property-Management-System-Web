@extends('pms.layouts.master')

@section('content')
<div class="app-content">
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
                     <form action="{{route('sale.store',$sale->id)}}" method="post">
                         @csrf
                         <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Property</label>
                            <input type="text" class="form-control" placeholder="total_amount" value="{{$property->property_type}}" readonly>
                        </div>
                        </div>
                         <div class="row">
                         <input type="hidden" name="property_id" value="{{$property->id}}">
                         <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">total_amount</label>
                            <input type="number" class="form-control" name="total_amount" id="total_amount"  placeholder="total_amount" value="{{$property->price}}" readonly>
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">down_payment</label>
                            <input type="number" class="form-control" name="down_payment"  onchange="downPayment()" id="downpayment" placeholder="down_payment">
                        </div>
                        </div>
                        
                        <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">arrear</label>
                            <input type="number" class="form-control" id="arrear" name="arrear" placeholder="arrear" readonly>
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">no_of_installment</label>
                            <input type="number" class="form-control" id="noOfInstallment" onchange="NoOfInstallment()" name="no_of_installment" placeholder="no_of_installment">
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">installment_amount</label>
                            <input type="number" class="form-control" name="installment_amount" id="installment_amount" placeholder="installment_amount" readonly>
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

<script>
function downPayment()
  { 
      
      var downpy = $('#downpayment').val();
      var totalAmount = $('#total_amount').val();

      var totalno =  totalAmount - downpy;
    //   alert(totalno);
    
         $('#arrear').val(totalno); 
        
  }

  function NoOfInstallment()
  {   

        var arrear= $("#arrear").val();
        var installment = $('#noOfInstallment').val();
        var TotalInstallment = arrear / installment;

        $('#installment_amount').val(TotalInstallment);
     
  }



</script>
@endsection
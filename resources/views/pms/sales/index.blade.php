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
                     <form action="{{route('sale.store',$property->id)}}" method="post" >
                         @csrf
                         
                         <div class="row">
                         <input type="hidden" name="property_id" value="{{$property->id}}">
                         <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                         <!-- /// -->
                         <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Property</label>
                            <input type="text" class="form-control" placeholder="total_amount" value="{{$property->property_type}}" readonly>
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Select Client</label>
                            <!-- //select data from table -->
                            <select name="client_id" id="client" class="form-control">
                                @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        </div>
                         <!-- /// -->
                        <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Total Amount</label>
                            <input type="number" class="form-control" name="total_amount" id="total_amount"  placeholder="total_amount" value="{{$property->price}}" readonly>
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Down Payment</label>
                            <input type="number" class="form-control" name="down_payment"  onchange="downPayment()" id="downpayment" placeholder="Please enter down payment">
                        </div>
                        </div>
                        
                        <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Arrear</label>
                            <input type="number" class="form-control" id="arrear" name="arrear" placeholder="Please enter arrear" readonly>
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">No Of Installment</label>
                            <input type="number" class="form-control" id="noOfInstallment" onchange="NoOfInstallment()" name="no_of_installment" placeholder="Please enter no of installment">
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Installment Amount</label>
                            <input type="number" class="form-control" name="installment_amount" id="installment_amount" placeholder="Please enter installment amount" readonly>
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Gap in Installment</label>
                            <input type="number" class="form-control" name="gap_in_installment" id="gap_in_installment" placeholder="Please enter installment gap" >
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Cash/ Cheaque</label>
                            <div class="addRow"> 
                            
                           <select name="cash_cheaque" class="form-control" id="fnivel">
                              <option value="cash">Cash</option>
                              <option value="cheaque">Cheaque</option>
                           </select>
                           <input type="text"  class="form-control" name="cheaque" style="display:none;" id="fnivel2" placeholder="Enter cheaque number">
                            <!-- <a href="#" class="btn btn-success" onclick="addRow()"><i class="fa fa-plus"></i></a>  -->
                            </div>
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
<script
            src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
            crossorigin="anonymous"></script>
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
<script>
                            $("#fnivel").change(function () {
            var selected_option = $('#fnivel').val();
            console.log(selected_option);
            if (selected_option === 'cheaque') {
                $('#fnivel2').attr('pk','cash').show();
            }
            if (selected_option != 'cheaque') {
                $("#fnivel2").removeAttr('pk').hide();
            }
            })
        </script>
@endsection
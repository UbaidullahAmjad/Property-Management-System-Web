@extends('pms.layouts.master')

@section('content')


<!--App-Content-->
<div class="app-content">
	<div class="side-app">
		<div class="page-header">
			<h4 class="page-title">Invoice</h4>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Pages</a></li>
				<li class="breadcrumb-item active" aria-current="page">Invoice</li>
			</ol>
		</div>
		<!--/Page-Header-->
		<div class="row ">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">#INV-287</h3>
						<div class="card-options">
							<a href="#">
								<button type="button" class="btn btn-sm btn-pink mr-2"><i class="icon icon-wallet"></i> Send Email</button>
							</a>
						</div>
					</div>
					<!-- ////start header -->
					<div class="card-body">
						<div class="row mb-4">
							<div class="col-sm-6">
								<h3 class="mb-3"><strong> Invoice From </strong></h3>
								<div>
									<strong>Name: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$user->name}}</strong>
								</div><br>
								<div>CNIC: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$user->cnic}}</div><br>
								<div>Email:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$user->email}}</div><br>
								<div>Phone:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$user->phone}}</div><br>
							</div>

							<div class="col-sm-6">
								<h3 class="mb-3"><strong> Invoice To:</strong></h3><br>
								<div>
									<strong>Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$client->name}}</strong>
								</div><br>
								<div>CNIC:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$client->cnic}}</div><br>
								<div>Email: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$client->email}}</div><br>
								<div>Phone: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$client->phone}}</div><br>
							</div>

						</div>

						<hr>
						<div class=" text-dark">
							<p class="mb-1 mt-5"><strong>Invoice Date :</strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$installment->created_at}}</p>
							<p><strong>Due Date :</strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$installment->due_date}}</p>
						</div>
						<div class="table-responsive push">
							<table class="table table-bordered table-hover text-nowrap" style="text-align:center">
								<thead class="thead-dark">
								<tr>
									<th>Location</th>
									<th>Size of Property</th>
									<th>Property Type</th>
									<th>Appartment No</th>
									<th>Due Amount</th>
									<th>Cash/Checque</th>
									<th>Paid</th>
								</tr>
								</thead>

								<tbody>
								<tr>


									<td>{{$locations->name}}</td>

									<td>{{$property->size_of_property}}</td>

									<td>{{$property->property_type}}</td>
									<td>{{$property->appartment_no}}</td>
									<td>{{$installment->due_amount}}</td>
									<td>{{$installment->cash_cheaque}}</td>
									<td>{{$installment->paid}}</td>
								</tr>
                                 </tbody>

								<tr>
									<td colspan="6" class="font-w600 text-right">Paid</td>
									<td>{{$installment->paid}}</td>
								</tr>


<!-- <tr>
<td colspan="6" class="font-w600 text-right">Total</td>
<td>{{$property->price}}</td>
</tr> -->
@php
$total_plan = 0;
$total_plan = $downpay->total_amount - $total;
@endphp

<tr>
	<td colspan="6" class="font-weight-semibold text-uppercase text-right">Pending</td>
	<td class="font-weight-semibold text-center">{{$total_plan}}</td>
</tr>
<tr>
	<td colspan="7" class="text-right" id="printpagebutton" onclick="printpage()">
		<!-- <button type="button" class="btn btn-primary"><i class="icon icon-paper-plane"></i> Send Email</button> -->
		<button type="button" class="btn btn-info" onclick="printpage()"><i class="icon icon-printer"></i> Print Invoice</button>
		<!-- <input id="printpagebutton" type="button" value="Print this page" onclick="printpage()" hide button while print/>													</td> -->
	</tr>
</table>
</div>
<p class="text-muted text-center">Thank you very much for doing business with us. We look forward to working with you again!</p>
</div>
</div>
</div>
</div>
</div>
<script type="text/javascript">
	function printpage() {
//Get the print button and put it into a variable
var printButton = document.getElementById("printpagebutton");
//Set the print button visibility to 'hidden' 
printButton.style.visibility = 'hidden';
//Print the page content
window.print()
//Set the print button to 'visible' again 
//[Delete this line if you want it to stay hidden after printing]
printButton.style.visibility = 'visible';
}
</script>
@endsection
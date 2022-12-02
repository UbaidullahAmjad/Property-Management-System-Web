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
										<h3 class="card-title">#INV-288</h3>
										<div class="card-options">
										<a href="/property">
											<button type="button" class="btn btn-sm btn-pink mr-2"><i class="icon icon-wallet"></i> Send Email</button>
											</a>
										</div>
									</div>
									<!-- ////start header -->
									<div class="card-body">
									<div class="row mb-4">
                                    <div class="col-sm-6">
									<h3 class="mb-3"><strong> Invoice To</strong></h3>
									<div>
									<strong>Name: {{$client->name}}</strong></div>
									<br>
									<div><strong>CNIC: {{$client->cnic}}</strong></div><br>
									<!-- <div></div> -->
									<div><strong>Email: {{$client->email}}</strong></div><br>
									<div><strong>Phone: {{$client->phone}}</strong></div><br>
									</div>
									<hr>

										<div class="table-responsive push">
											<br>
										    <br>
			
											<table class="table table-bordered table-hover text-nowrap" style="text-align:center">

												<thead class="thead-dark">
												<tr>
                                                <th scope="col">Sector #</th>
                                                <th scope="col">Plot #</th>
                                                <th scope="col">Stree t#</th>
                                                <th scope="col">Size #</th>
                                                <th scope="col">Category #</th>
                                                <th scope="col">Price #</th>
                                                <th scope="col">Phase #</th>
                                                <th scope="col">Status #</th>
												</tr>
                                              </thead>

                                              <tbody>
												<tr>
                                                <td>{{$plot->sector_no}}</td>
                                                <td>{{$plot->plot_no}}</td>
                                                <td>{{$plot->street_no}}</td>
                                                <td>{{$plot->size_no}}</td>
                                                <td>{{$plot->category}}</td>
                                                <td>{{$plot->price}}</td>
                                                <td>{{$plot->phase_no}}</td>
                                                <td>{{$plot->status}}</td>
												</tr>
												</tbody>
											
												<tr>
													<td colspan="7" class="font-weight-semibold text-uppercase text-right">Paid</td>
													<td class="font-weight-semibold text-center">{{$plot->price}}</td>
												</tr>

												<tr>
													<td colspan="8" class="text-right" id="printpagebutton" onclick="printpage()">
														<!-- <button type="button" class="btn btn-primary"><i class="icon icon-paper-plane"></i> Send Email</button> -->
														<button type="button" class="btn btn-info" onclick="printpage()"><i class="icon icon-printer"></i> Print Invoice</button>
														<!-- <input id="printpagebutton" type="button" value="Print this page" onclick="printpage()" hide button while print/>													</td> -->
												</tr>
											</table>
										</div>
                                        
										<p class="text-muted">Thank you very much for doing business with us. We look forward to working with you again!</p>
                                        
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
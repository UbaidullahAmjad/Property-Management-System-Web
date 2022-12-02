@extends('pms.layouts.master')

@section('content')
<div class="app-content">
    <div class="side-app">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-md-12">
                                <div class="col-md-8 text-right">
                                    <h2 style="margin: 20px;">( INSTALLMENTS PLAN )</h2>
                                </div>
                                <div>
                                    <img src="">logo here
                                    <p>
                                    <h6>Garrison Estate & Builder</h6>
                                    </p>
                                </div>

                            </div>
                        </div>
                        <h1>
                            <hr>
                        </h1>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <h6>
                                        <div class="column">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Property Type : {{$property->property_type}} </div><br>
                                    </h6>
                                    <h6>
                                        <div class="column">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Appartment Size :{{$property->size_of_property}}</div><br>
                                    </h6>
                                    <h6>
                                        <div class="column">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Appartment Num : {{$property->appartment_no}}</div><br>
                                    </h6>
                                </div>
                                <div class="col-md-4 text-center">

                                </div>
                                <div class="col-md-4">
                                   
                                    <!-- <div class="column">Name :  Cplus soft</div><br>
                                    <div class="column">Cnic :  Cplus soft</div><br> -->
                                
                        </div>
                        <br>
                        <br>
                        <br>
                        
                        <table class="table table-bordered  m-2" style="text-align:center;">
                            <div class="column">
                            <h3 Style="color:blue;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Payment Plan :</h3>
                            </div>
                            <br>
                            <thead class="thead-dark">
                                <tr>

                                    <th scope="col">Installment</th>
                                    <th scope="col">Due Ammount</th>
                                    <th scope="col">Due Date</th>
                                    <th scope="col">Paid</th>
                                    <th scope="col">Paid On</th>
                                    <th scope="col">Cash/Cheque</th>
                                    <th scope="col">Out / Stand</th>
                                    <th >Action</th>
                                    <th >Print</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr >
                                    <td scope="column">Down Payment</td>
                                    <td scope="column">{{$sale->down_payment}}</td>
                                    <td scope="column">{{$sale->created_at->format('d-M-Y')}}</td>
                                    <td scope="column">{{$sale->down_payment}}</td>
                                    <td scope="column">{{$sale->created_at->format('d-M-Y')}}</td>
                                    <td scope="column">{{$sale->cash_cheaque}}</td>
                                    <td scope="column">0</td>
                                    <td scope="column">Paid</td>
                                    <!-- <td scope="column"></td> -->
                                    
                                    <td><a href="{{route('invoice.create',$sale->id)}}" class="btn btn-secondry">View</a></td>
                                   
                                </tr>

                                @php
                                $installment = $sale->no_of_installment;
                                $j=0;
                                @endphp

                                    @for($i=0 ; $i<$installment ; $i++) 
                                    <tr>
                                        <td scope="column">{{$i+1}} Installment</td>
                                        <td scope="column">{{round($sale->installment_amount)}}</td>
                                        <td scope="column">{{$dates[$i]}} </td>
                                        @php $flag=0; @endphp
                                        @foreach($installments as $key => $insta)
                                            @if($key == $i)
                                            
                                                <td scope="column">{{$insta->paid}}</td>
                                                <td scope="column">{{$insta->paid_on}}</td>
                                                <td scope="column">{{$insta->cash_cheaque}}</td>
                                                <td scope="column">{{$insta->out_stand}}</td>
                                                <td>paid</td>
                                                <td><a href="{{route('invoice.create',$i+1)}}" class="btn btn-secondry">View</a></td>
                                            </tr>
                                                @php $flag=1; @endphp
                                            @endif
                                        @endforeach
                                        @if($flag == 0)
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>

                                            @if($j<=0)
                                                @php
                                                    $j++;
                                                @endphp
                                                <td class="btn btn-warning" onclick="chash('{{$i}}','{{$dates[$i]}}')">Payment</td>
                                            @endif
                                        @endif
                                            
                                    @endfor
                            </tbody>
                            <tfoot>
                                @php
                                $total = $installmentsTotall + $sale->down_payment;
                                $total_plan = $sale->total_amount - $total;
                                @endphp
                                <td scope="col">Total</td>
                                <td scope="col">{{$sale->total_amount}}</td>
                                <td scope="col"></td>
                                <td scope="col">{{$total}}</td>
                                <td scope="col"></td>
                                <td scope="col">Pending</td>
                                <td scope="col"></td>
                                <td scope="col"></td>
                                <td rowspan="2">{{$total_plan}} </td>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-md-12 bg-light text-right" id="printpagebutton">
        <button type="button" class="btn btn-primery" onclick="printpage()"><i class="icon icon-printer"></i> Print Plan</button>
        </div>
        <div class="modal fade" id="show_modal">
            <div class="modal-dialog">
                <form action="{{route('installment.store',$property->id)}}" method="post">
                    @csrf
                    <div class="modal-content">
                        <input type="hidden" id="id" name="installment_no">
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="property_id" value="{{$property->id}}">
                        <input type="hidden" name="status" value="1">
                        <div class="modal-body">
                            <span>Due Amount:</span>
                            <input type="number" name="due_amount" value="{{$sale->installment_amount}}" class="form-control" readonly>

                        </div>
                        <div class="modal-body">
                            <span>due date:</span>
                            <input type="text" name="due_date" id="due_date" value="" class="form-control" readonly>
                        </div>
                        <div class="" >
                            <!-- <span>paid:</span> -->
                            <input type="hidden" name="paid" id="paid" value="{{$sale->installment_amount}}" class="form-control">
                        </div>
                        <div class="" >
                            <!-- <span>paid:</span> -->
                            <input type="hidden" name="client_id" id="client_id" value="{{$sale->client_id}}" class="form-control">
                        </div>
                        <div class="modal-body">
                            <span>paid_on:</span>
                            <input type="date" name="paid_on" id="paid_on" value="" class="form-control" required="">
                        </div>
                        <div class="modal-body">
                            <span>Out_Stand:</span>
                            <input type="number" name="out_stand" id="out_stand" value="0" class="form-control" readonly>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Cash/ Cheaque</label>
                                <div class="addRow">
                                    <select name="cash_cheaque" class="form-control" id="fnivel" >
                                        <option value="cash">Cash</option>
                                        <option  value="cheaque" >Cheaque</option>
                                    </select>
                                    <!-- <input id="fnivel2" name="cheque" /> -->
                                    <input type="text"  class="form-control" name="cheaque" style="display:none;" id="fnivel2" placeholder="cheaque number">

                                    <!-- <a href="#" class="btn btn-success" onclick="addRow()"><i class="fa fa-plus"></i></a> -->
                                </div>
                            </div>
                        </div>

                        <input type="submit" value="Submit" id="submit" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>

        <script
            src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
            crossorigin="anonymous"></script>
        <script>
            function chash(i, date) {
                $('#id').val(i);
                $('#due_date').val(date);
                $('#show_modal').modal('show');

            }
   
            // function addRow() {
            //     $(".addRow").append('<input type="text" class="form-control" name="cheaque" id="cheaque" placeholder="cheaque number">');
            // }
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
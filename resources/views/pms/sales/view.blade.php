@extends('pms.layouts.master')

@section('content')

<div class="app-content">
    <div class="side-app">
        <div class="page-header">
            <h4 class="page-title">Sale View</h4>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Sale list</h3>

                        </div>
                        <div class="card-body">
                            <table class=" table table-bordered m-2" style="text-align:center">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="row"> Id</th>
                                        <th scope="row"> Date</th>
                                        <th scope="row"> Amount</th>
                                        <th scope="row"> Property </th>
                                        <th scope="row"> Payment</th>
                                        <th scope="row"> Arrear</th>
                                        <th scope="row"> InstallmentNO#</th>
                                        <th scope="row"> InstallmentAmt</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($sales as $sal)
                                    <tr>
                                        <td  style="padding: 20px;">{{$sal->id}}</td>
                                        <td style="padding: 20px;">{{$sal->created_at->format('d-M-Y')}}</td>
                                        <td style="padding: 20px;">{{$sal->total_amount}}</td>
                                        <td style="padding: 20px;">{{$sal->property->property_type}}</td>
                                        <td style="padding: 20px;">{{$sal->down_payment}}</td>
                                        <td style="padding: 20px;">{{$sal->arrear}}</td>
                                        <td style="padding: 20px;">{{$sal->no_of_installment}}</td>
                                        <td style="padding: 20px;">{{$sal->installment_amount}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>


                            </table>
                            <div>
                            {{ $sales}}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

@endsection
@extends('admin.admin_master')
@section('admin')
    {{-- <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="me-auto">
                <h3 class="page-title">Invoice</h3>
            </div>
        </div>
    </div> --}}

    <!-- Main content -->
    <section class="invoice printableArea">
        <div class="row">
            <div class="col-12 no-print">
                <div class="bb-1 clearFix">
                    <div class="text-end pb-15">
                        <button class="btn btn-success" type="button"> <span><i class="fa fa-print"></i> Save</span>
                        </button>
                        <button onclick="window.print()" id="print2" class="btn btn-warning" type="button"> <span><i
                                    class="fa fa-print"></i>
                                Print</span> </button>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="page-header">
                    <h2 class="d-inline"><span class="fs-30">Invoice Copy</span></h2>
                    <div class="pull-right text-end">
                        <h3>{{ date('m-F-Y') }}</h3>
                    </div>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <div class="row invoice-info">
            <div class="col-md-6 invoice-col">
                <strong>From</strong>
                <address>
                    <strong class="text-blue fs-24">Tailor Shop</strong><br>
                    <strong class="d-inline">Block#B,Road:04,House:40, Banasree,Dhaka-1219</strong><br>
                    <strong>Phone: (00) 123-456-7890 &nbsp;&nbsp;&nbsp;&nbsp; Email: info@example.com</strong>
                </address>
            </div>
            <!-- /.col -->
            <div class="col-md-6 invoice-col text-end">
                <strong>To</strong>
                <address>
                    <strong class="text-blue fs-24">{{ $order->customer->name }}</strong><br>
                    {{ $order->customer->address }}<br>
                    <strong>Phone: (+880) {{ $order->customer->phone }}</strong>
                </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-12 invoice-col mb-15">
                <div class="invoice-details row no-margin">
                    <div class="col-md-6 col-lg-3"><b>Invoice </b> {{ $order->invoice_no }}</div>
                    <div class="col-md-6 col-lg-3"><b>Status:</b> {{ $order->order_status }}</div>
                    <div class="col-md-6 col-lg-3"><b>Priority:</b> {{ $order->priority }}</div>
                    <div class="col-md-6 col-lg-3"><b>Delivery Date:</b> {{ $order->delivery_date }}</div>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <div class="row">
            <div class="col-12 table-responsive">
                <table class="table">
                    <tbody>
                        <tr>
                            <th>Sl</th>
                            <th>Service</th>
                            <th class="text-end">Quantity</th>
                            <th class="text-end">Total</th>
                        </tr>
                        @php
                            $sl = 1;
                        @endphp
                        @foreach ($orderDetails as $key => $od)
                            <tr>
                                <td>{{ $key++ }}</td>
                                <td>{{ $od->service->service_name }}</td>
                                <td class="text-end">{{ $od->quantity }}</td>
                                <td class="text-end">{{ $od->total }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.col -->
        </div>
        <div class="row">
            <div class="col-12 text-end">
                <div>
                    <p>Sub - Total amount : {{ $order->sub_total }}</p>
                    <p>Vat (15%) : {{ $order->vat }}</p>
                    <p>Shipping : $0</p>
                </div>
                <div class="total-payment">
                    <h3><b>Total :</b> {{ $order->total_price }}</h3>
                </div>

            </div>
            <!-- /.col -->
        </div>
        {{-- <div class="row no-print">
            <div class="col-12">
                <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
                </button>
            </div>
        </div> --}}
    </section>
@endsection

@extends('admin.admin_master')
@section('admin')
<div class="content-header">
    <div class="d-flex align-items-center">
        <div class="me-auto">
            <h3 class="page-title">Invoice</h3>
            <div class="d-inline-block align-items-center">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                        <li class="breadcrumb-item" aria-current="page">Invoice</li>
                        <li class="breadcrumb-item active" aria-current="page">Invoice Sample</li>
                    </ol>
                </nav>
            </div>
        </div>

    </div>
</div>

<!-- Main content -->
<section class="invoice printableArea">
    <div class="row">
        <div class="col-12">
            <div class="bb-1 clearFix">
                <div class="text-end pb-15 d-print-none">
                    <button onclick="window.print()" id="print2" class="btn btn-warning" type="button"> <span><i class="fa fa-print"></i>
                            Print</span> </button>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="page-header">
                <h2 class="d-inline">
                    <span class="fs-30 text-primary">Tailor Shop</span>
                </h2>
                <div class="pull-right text-end">
                    <h3>{{ date('d-F-Y') }}</h3>
                </div>
            </div>
        </div>
        <!-- /.col -->
    </div>
    <div class="row invoice-info mb-25">
        <div class="col-md-6 invoice-col">
            <strong>To</strong>
            <address>
                <strong class="text-blue fs-24">{{$customer->name}}</strong><br>
                <strong>Phone: (+880) {{$customer->phone}} &nbsp;&nbsp;&nbsp;&nbsp;</strong>
            </address>
        </div>
        <!-- /.col -->

        <div class="col-md-6 invoice-col text-end">
            <address>
                <p><strong>Order Date : </strong> <span class="float-end"> &nbsp;&nbsp;&nbsp;&nbsp;{{ date('d-F-Y') }}</span></p>
                    <p><strong>Order Status&nbsp;&nbsp;&nbsp;&nbsp;</strong> <span class="float-end"><span class="badge badge-danger">Unpaid</span></span></p>
                    {{-- <p><strong>Invoice No. : </strong> <span class="float-end">000028 </span></p> --}}
            </address>
        </div>
        <!-- /.col -->
        {{-- <div class="col-sm-12 invoice-col mb-15">
            <div class="invoice-details row no-margin">
                <div class="col-md-6 col-lg-3"><b>Invoice </b>#0154879</div>
                <div class="col-md-6 col-lg-3"><b>Order ID:</b> FC12548</div>
                <div class="col-md-6 col-lg-3"><b>Payment Due:</b> 14/08/2018</div>
                <div class="col-md-6 col-lg-3"><b>Account:</b> 00215487541296</div>
            </div>
        </div> --}}
        <!-- /.col -->
    </div>
    <div class="row">
        <div class="col-12 table-responsive">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>Sl</th>
                        <th>Service Name</th>
                        <th class="text-end">Quantity</th>
                        <th class="text-end">Unit Cost</th>
                        <th class="text-end">Subtotal</th>
                    </tr>
                    @php
                        $sl=1;
                    @endphp
                    @foreach ($orderItems as $key=>$item)
                    <tr>
                        <td>{{$sl++}}</td>
                        <td>{{$item->name}}</td>
                        <td class="text-end">{{$item->qty}}</td>
                        <td class="text-end">{{$item->price}}</td>
                        <td class="text-end">{{$item->subtotal}}</td>
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
                <p>Sub - Total amount : {{ Cart::subtotal() }}</p>
                <p>Vat (15%) : {{ Cart::tax() }}</p>
            </div>
            <div class="total-payment">
                <h3><b>Total :</b> {{ Cart::total() }}</h3>
            </div>

        </div>
        <!-- /.col -->
    </div>
    <div class="row no-print">
        <div class="col-12">
            <button data-bs-toggle="modal" data-bs-target="#myModal" type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
            </button>
        </div>
    </div>

    {{-- Modal --}}
    <div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" style="display: none;"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="text-center mt-2">
                    <div class="auth-logo">
                        <h3>Issue To : {{ $customer->name }}</h3>
                        <h3>Total Amount - {{ Cart::total() }}</h3>
                    </div>
                </div>
                <div class="modal-body">
                    <section class="content">
                        <div class="row">
                            <div class="col-lg-12 col-12">
                                <!-- /.box-header -->
                                <form class="form" action="#" method="POST">
                                    @csrf
                                    <div class="box-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label">Payment By</label>
                                                    <select class="form-select" name="gender">
                                                        <option disabled selected>select pay method</option>
                                                        <option value="male">Cash</option>
                                                        <option value="female">Bkash</option>
                                                        <option value="female">Nagad</option>
                                                        <option value="female">Rocket</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label">Payment Phone No</label>
                                                    <input value="+880{{ $customer->phone }}" type="text" name="name"
                                                        class="form-control" placeholder="enter phone no">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label">Pay Now</label>
                                                    <input value="{{ Cart::total() }}" type="text" name="name"
                                                        class="form-control" placeholder="enter payable amount">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label">Due Amount</label>
                                                    <input type="text" name="name" class="form-control"
                                                        placeholder="enter due amount">
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <button type="submit" class="btn btn-primary mt-5">
                                                <i class="ti-save-alt"></i> Complete Order
                                            </button>
                                        </div>
                                    </div>
                                    <!-- /.box-body -->
                                </form>
                            </div>
                            <!-- /.box -->
                        </div>
                </div>
                </section>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endsection

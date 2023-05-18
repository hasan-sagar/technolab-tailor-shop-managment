@extends('admin.admin_master')
@section('admin')
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="me-auto">
                <h3 class="page-title">Invoice of {{ $order->customer->name }}</h3>
            </div>

        </div>
    </div>

    <!-- Main content -->
    <section class="invoice printableArea">
        <div class="row">
            <div class="col-12 no-print">
                <div class="bb-1 clearFix">
                    <div class="text-end pb-15">
                        <button class="btn btn-success" type="button"> <span><i class="mdi mdi-message-text"></i> Notify
                                User</span>
                        </button>
                        <button onclick="window.print()" id="print2" class="btn btn-warning" type="button"> <span><i
                                    class="fa fa-print"></i>
                                Print</span> </button>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="page-header">
                    <h2 class="d-inline"><span class="fs-30">Customer Invoice</span></h2>
                    <div class="pull-right text-end">
                        <h3>{{ date('d-F-Y') }}</h3>
                    </div>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <div class="row invoice-info">
            <div class="col-md-6 invoice-col">
                <strong>From</strong>
                <address>
                    <strong class="text-blue fs-24">EduAdmin</strong><br>
                    <strong class="d-inline">124 Lorem Ipsum, Suite 478, Dummuy, USA 123456</strong><br>
                    <strong>Phone: (00) 123-456-7890 &nbsp;&nbsp;&nbsp;&nbsp; Email: info@example.com</strong>
                </address>
            </div>
            <!-- /.col -->
            <div class="col-md-6 invoice-col text-end">
                <strong>To</strong>
                <address>
                    <strong class="text-blue fs-24">Doe Shina</strong><br>
                    124 Lorem Ipsum, Suite 478, Dummuy, USA 123456<br>
                    <strong>Phone: (00) 789-456-1230 &nbsp;&nbsp;&nbsp;&nbsp; Email: conatct@example.com</strong>
                </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-12 invoice-col mb-15">
                <div class="invoice-details row no-margin">
                    <div class="col-md-6 col-lg-3"><b>Invoice </b>#0154879</div>
                    <div class="col-md-6 col-lg-3"><b>Order ID:</b> FC12548</div>
                    <div class="col-md-6 col-lg-3"><b>Payment Due:</b> 14/08/2018</div>
                    <div class="col-md-6 col-lg-3"><b>Account:</b> 00215487541296</div>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <div class="row">
            <div class="col-12 table-responsive">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>#</th>
                            <th>Description</th>
                            <th>Serial #</th>
                            <th class="text-end">Quantity</th>
                            <th class="text-end">Unit Cost</th>
                            <th class="text-end">Subtotal</th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Milk Powder</td>
                            <td>12345678912514</td>
                            <td class="text-end">2</td>
                            <td class="text-end">$26.00</td>
                            <td class="text-end">$52.00</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Air Conditioner</td>
                            <td>12345678912514</td>
                            <td class="text-end">1</td>
                            <td class="text-end">$1500.00</td>
                            <td class="text-end">$1500.00</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>TV</td>
                            <td>12345678912514</td>
                            <td class="text-end">2</td>
                            <td class="text-end">$540.00</td>
                            <td class="text-end">$1080.00</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Mobile</td>
                            <td>12345678912514</td>
                            <td class="text-end">3</td>
                            <td class="text-end">$320.00</td>
                            <td class="text-end">$960.00</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.col -->
        </div>
        <div class="row">
            <div class="col-12 text-end">
                <p class="lead"><b>Payment Due</b><span class="text-danger"> 14/08/2018 </span></p>

                <div>
                    <p>Sub - Total amount : $3,592.00</p>
                    <p>Tax (18%) : $646.56</p>
                    <p>Shipping : $110.44</p>
                </div>
                <div class="total-payment">
                    <h3><b>Total :</b> $4,349.00</h3>
                </div>

            </div>
            <!-- /.col -->
        </div>
        <div class="row no-print">
            <div class="col-12">
                <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
                </button>
            </div>
        </div>
    </section>
@endsection
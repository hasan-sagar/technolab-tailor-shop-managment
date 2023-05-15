@extends('admin.admin_master')
@section('admin')
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="me-auto">
                <h3 class="page-title">Purchase Summary</h3>
            </div>

        </div>
    </div>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-header">
                        <div class="col-12">
                            <div class="bb-1 clearFix">
                                <div class="pb-15">
                                    <span class="btn btn-info fw-600"> <span>Customer {{ $customer->name }}</span> </span>
                                    <span class="btn btn-warning fw-600"> <span>Phone +880{{ $customer->phone }}</span>
                                    </span>
                                    {{-- <button data-bs-toggle="modal" data-bs-target="#myModal" type="button"
                                    class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
                                </button> --}}
                                </div>
                            </div>
                        </div>
                        {{-- <h4 class="box-title pull-right badge badge-xl badge-primary">Customer : {{$customer->name}}
                    </h4>
                    <h4 class="box-title pull-right">Product Summary</h4> --}}
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Service Name</th>
                                        <th>Quantity</th>
                                        <th>Unit Cost</th>
                                        <th class="w-200">Sub Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $sl = 1;
                                    @endphp
                                    @foreach ($orderItems as $key => $item)
                                        <tr>
                                            <td>{{ $sl++ }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td class="text-end">{{ $item->qty }}</td>
                                            <td class="text-end">{{ $item->price }}</td>
                                            <td class="text-end">{{ $item->subtotal }}</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <th colspan="4" class="text-end">Quantity</th>
                                        <th>{{ Cart::count() }}</th>
                                    </tr>
                                    <tr>
                                        <th colspan="4" class="text-end">Total</th>
                                        <th>{{ Cart::subtotal() }}</th>
                                    </tr>
                                    <tr>
                                        <td colspan="4" align="right">Vat(15%)</td>
                                        <td>{{ Cart::tax() }}</td>
                                    </tr>
                                    <tr>
                                        <th colspan="4" class="text-end fs-24 fw-700">Payable Amount</th>
                                        <th class="fs-24 fw-700">{{ Cart::total() }}</th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row no-print">
                        <div class="col-12">
                            <button data-bs-toggle="modal" data-bs-target="#myModal" type="button"
                                class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- MODAL PAYMENT --}}
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
                                <form class="form" action="{{ route('create.order') }}" method="POST">
                                    @csrf
                                    {{-- ALL HIDDEN INPUTS--}}
                                        <input type="hidden" name="customer_id" value="{{$customer->id}}">
                                        <input type="hidden" name="order_date" value="{{date('d-F-Y')}}">
                                        <input type="hidden" name="order_status" value="pending">
                                        <input type="hidden" name="total_products" value="{{ Cart::count() }}">
                                        <input type="hidden" name="mobile_bank_number" value="{{ $customer->phone }}">
                                        <input type="hidden" name="sub_total" value="{{ Cart::subtotal() }}">
                                        <input type="hidden" name="vat" value="{{ Cart::tax() }}">
                                        <input type="hidden" name="total" value="{{ Cart::total() }}">
                                    {{-- ALL HIDDEN INPUTS --}}
                                    <div class="box-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label">Payment By</label>
                                                    <select class="form-select" name="payment_status">
                                                        <option disabled selected>select pay method</option>
                                                        <option value="cash">Cash</option>
                                                        <option value="bkash">Bkash</option>
                                                        <option value="nagad">Nagad</option>
                                                        <option value="rocket">Rocket</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="phone">Phone</label>
                                                    <input name="mobile_bank_number" type="number" class="form-control"
                                                        placeholder="Enter phone" value="{{ $customer->phone }}">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="pay">Pay Now</label>
                                                    <input name="pay" type="text" class="form-control"
                                                        placeholder="Enter Payable Amount" value="{{ Cart::total() }}">
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-label">Due Amount</label>
                                                        <input type="text" name="due" class="form-control"
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

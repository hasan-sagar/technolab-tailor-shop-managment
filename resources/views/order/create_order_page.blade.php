@extends('admin.admin_master')
@section('admin')
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="me-auto">
                <h3 class="page-title">Create New Order</h3>
                @error('customer_id')
                    <span class="text-danger fw-bold text-uppercase">****{{ $message }}*****</span>
                @enderror
            </div>
        </div>
    </div>
    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-12 col-lg-7">
                <div class="box">
                    <div class="box-header bg-primary">
                        <h4 class="box-title">Service List</h4>
                    </div>

                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="complex_header" class="table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Service Name</th>
                                        <th>Category</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($service as $key => $item)
                                        <tr>
                                            <form action="{{ route('add.to.cart') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $item->id }}">
                                                <input type="hidden" name="name" value="{{ $item->service_name }}">
                                                <input type="hidden" name="qty" value="1">
                                                <input type="hidden" name="price" value="{{ $item->selling_price }}">
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $item->service_name }}</td>
                                                <td>{{ $item['category']['name'] }}</td>
                                                <td>
                                                    <button type="submit" class="waves-effect waves-light btn btn-light"><i
                                                            class="fa fa-cart-plus text-success"></i></button>
                                                </td>

                                            </form>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            {{-- ORDERS --}}
            <div class="col-12 col-lg-5">
                <div class="box">
                    <div class="box-header bg-success">
                        <h4 class="box-title">Order Items</h4>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table simple mb-0">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Subtotal</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $allCartItems = Cart::content();
                                    @endphp
                                    @foreach ($allCartItems as $cartItem)
                                        <tr>
                                            <td>{{ $cartItem->name }}</td>
                                            <td>
                                                <form action="{{ route('update.cart', $cartItem->rowId) }}" method="POST">
                                                    @csrf
                                                    <div class="list-icons d-inline-flex ">
                                                        <input name="qty" class="me-2" type="number"
                                                            value="{{ $cartItem->qty }}" style="width:60px;"
                                                            min="1">
                                                        <button type="submit" class="btn btn-success btn-xs"><i
                                                                class="mdi mdi-check"></i>
                                                        </button>
                                                    </div>
                                                </form>
                                            </td>
                                            <td>{{ $cartItem->price }}</td>
                                            <td>{{ $cartItem->subtotal }}</td>
                                            <td>
                                                <div class="list-icons d-inline-flex ">
                                                    <a href="{{ route('remove.cart', $cartItem->rowId) }}"
                                                        class="list-icons-item me-15 "><i
                                                            class="fa fa-trash-o text-danger"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="box">
                    <div class="box-header bg-info">
                        <h4 class="box-title">Order Summary</h4>
                    </div>

                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table simple mb-0">
                                <tbody>
                                    <tr>
                                        <td>Quantity</td>
                                        <td class="text-end fw-700">{{ Cart::count() }}</td>
                                    </tr>
                                    <tr>
                                        <td>Sub Total</td>
                                        <td class="text-end fw-700">{{ Cart::subtotal() }}</td>
                                    </tr>
                                    <tr>
                                        <td>Tax</td>
                                        <td class="text-end fw-700">{{ Cart::tax() }}</td>
                                    </tr>
                                    <tr>
                                        <th class="bt-1">Payable Amount</th>
                                        <th class="bt-1 text-end fw-900 fs-18">{{ Cart::total() }}</th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="box-footer">
                            <a href="#" class="btn btn-warning">Add Customer</a>
                            <button data-bs-toggle="modal" data-bs-target="#myModal" type="button"
                                class="btn btn-primary pull-right">Place Order</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
    </section>

    {{-- modal --}}
    <div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" style="display: none;"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <section class="content">
                        <div class="row">
                            <div class="col-lg-12 col-12">
                                <!-- /.box-header -->
                                <form class="form" action="{{ route('create.order') }}" method="POST">
                                    @csrf
                                    {{-- ALL HIDDEN INPUTS --}}
                                    <input type="hidden" name="order_date" value="{{ date('d-F-Y') }}">
                                    <input type="hidden" name="order_status" value="pending">
                                    <input type="hidden" name="total_products" value="{{ Cart::count() }}">
                                    <input type="hidden" name="sub_total" value="{{ Cart::subtotal() }}">
                                    <input type="hidden" name="vat" value="{{ Cart::tax() }}">
                                    <input type="hidden" name="total_price" value="{{ Cart::total() }}">
                                    {{-- ALL HIDDEN INPUTS --}}
                                    <div class="box-body">
                                        <div class="row">
                                            <div class="row">
                                                <div class="col-md-6 ">
                                                    <div class="form-group">
                                                        <label class="form-label">Customer</label>
                                                        <select name="customer_id"
                                                            class="form-select @error('customer_id')is-invalid @enderror">
                                                            <option disabled selected>Choose customer</option>
                                                            @foreach ($customer as $cus)
                                                                <option value="{{ $cus->id }}" class="fw-600">
                                                                    {{ $cus->name }}: +880{{ $cus->phone }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Delivery Date</label>
                                                        <input class="form-control" type="date" name="delivery_date">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 ">
                                                    <div class="form-group">
                                                        <label class="form-label">Status</label>
                                                        <select class="form-select" name="order_status">
                                                            <option disabled selected>select status</option>
                                                            <option value="Pending">Pending</option>
                                                            <option value="Preparing">Preparing</option>
                                                            <option value="Complete">Complete</option>
                                                            <option value="Ready">Ready</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Assign To</label>
                                                        <select name="employee_id" class="form-select">
                                                            <option disabled selected>Choose employee</option>
                                                            @foreach ($employee as $emp)
                                                                <option value="{{ $emp->id }}" class="fw-600">
                                                                    {{ $emp->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Payment By</label>
                                                        <select class="form-select" name="payment_method">
                                                            <option disabled selected>select pay method</option>
                                                            <option value="cash">Cash</option>
                                                            <option value="bkash">Bkash</option>
                                                            <option value="nagad">Nagad</option>
                                                            <option value="rocket">Rocket</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Pay Now</label>
                                                        <input name="pay" type="text" class="form-control"
                                                            placeholder="Enter Payable Amount"
                                                            value="{{ Cart::total() }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label">Priority</label>
                                                        <select class="form-select" name="priority">
                                                            <option disabled selected>priority</option>
                                                            <option value="High">High</option>
                                                            <option value="Normal">Normal</option>
                                                            <option value="Urgent">Urgent</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label class="form-label">Note/Comments</label>
                                                        <input name="comment" type="text" class="form-control"
                                                            placeholder="Enter Payable Amount">
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <button type="submit"
                                                    class="waves-effect waves-light btn btn-outline btn-success mt-15">
                                                    <i class="ti-save-alt"></i> Create Order
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

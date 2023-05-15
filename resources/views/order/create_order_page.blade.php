@extends('admin.admin_master')
@section('admin')
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="me-auto">
                <h3 class="page-title">POS - Point Of Sale</h3>
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
                                                            value="{{ $cartItem->qty }}" style="width:60px;" min="1">
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
                        {{-- Customer --}}
                        <form id="myForm" action="{{ route('create.order') }}" method="POST">
                            @csrf
                            <div class="form-group mt-20">
                                <h4>Customer</h4>
                                <select name="customer_id" class="form-select @error('customer_id') is-invalid @enderror">
                                    <option disabled selected>Choose customer</option>
                                    @foreach ($customer as $cus)
                                        <option value="{{ $cus->id }}" class="fw-600">
                                                {{ $cus->name }} - +880{{ $cus->phone }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('customer_id')
                                    <span class="text-danger"> {{ $message }} </span>
                                @enderror
                            </div>
                            <div class="form-group mt-20">
                                <h4>Assign To </h4>
                                <select name="employee_id" class="form-select @error('employee_id') is-invalid @enderror">
                                    <option disabled selected>Choose Tailor</option>
                                    @foreach ($employee as $emp)
                                        <option value="{{ $emp->id }}">{{ $emp->name }}</option>
                                    @endforeach
                                </select>
                                @error('employee_id')
                                    <span class="text-danger"> {{ $message }} </span>
                                @enderror
                            </div>
                            {{-- Customer --}}
                    </div>
                    <div class="box-footer">
                        <a href="#" class="btn btn-warning">Add Customer</a>
                        <button type="submit" class="btn btn-primary pull-right">Place Order</button>
                    </div>
                    </form>
                </div>

            </div>

        </div>

    </section>
@endsection

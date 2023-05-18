@extends('admin.admin_master')
@section('admin')
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="me-auto">
                <h3 class="page-title">Invoice List</h3>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-12">
                <div class="box">
                    <div class="box-body">
                        <div class="table-responsive">

                            <table id="complex_header" class="table table-lg display">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Invoice No.</th>
                                        <th>Status</th>
                                        <th>Customer</th>
                                        <th>Priority</th>
                                        <th>Issue date</th>
                                        <th>Delivery date</th>
                                        <th>Grand Total</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($allOrderslist as $key => $item)
                                        <tr>
                                            <td>{{ $key++ }}</td>
                                            <td>{{ $item->invoice_no }}</td>
                                            <td>
                                                <form action="{{ route('order.status.update', $item->id) }}" method="POST">
                                                    @csrf
                                                    <select onchange="form.submit()" name="order_status"
                                                        class="form-select w-120" data-placeholder="Select status">
                                                        <option
                                                            value="Pending"{{ $item->order_status == 'Pending' ? 'selected' : '' }}>
                                                            {{ $item->order_status }}</option>
                                                        <option value="Preparing"
                                                            {{ $item->order_status == 'Preparing' ? 'selected' : '' }}>
                                                            Preparing
                                                        </option>
                                                        <option value="Complete"
                                                            {{ $item->order_status == 'Complete' ? 'selected' : '' }}>
                                                            Complete</option>
                                                        <option value="Ready"
                                                            {{ $item->order_status == 'Ready' ? 'selected' : '' }}>Ready
                                                        </option>
                                                    </select>
                                                </form>
                                            </td>
                                            <td>
                                                <h6 class="mb-0">
                                                    <a href="#">{{ $item['customer']['name'] }}</a>
                                                    <span class="d-block text-muted">Payment method:
                                                        {{ $item->payment_method }}</span>
                                                </h6>
                                            <td>
                                                <span
                                                    class="{{ $item->priority == 'Urgent' ? 'badge badge-danger-light' : '' }}">
                                                    @if ($item->priority == 'Urgent')
                                                        Urgent
                                                    @endif
                                                </span>
                                                <span
                                                    class="{{ $item->priority == 'Normal' ? 'badge badge-secondary-light' : '' }}">
                                                    @if ($item->priority == 'Normal')
                                                        Normal
                                                    @endif
                                                </span>
                                                <span
                                                    class="{{ $item->priority == 'High' ? 'badge badge-warning-light' : '' }}">
                                                    @if ($item->priority == 'High')
                                                        High
                                                    @endif
                                                </span>
                                            </td>
                                            <td>
                                                {{ $item->order_date }}
                                            </td>
                                            <td>
                                                <span class="badge badge-pill badge-success">
                                                    {{ $item->delivery_date }}
                                                </span>
                                            </td>
                                            <td>
                                                <h6 class="mb-0 fw-bold">{{ $item->total_price }}<span
                                                        class="d-block text-muted fw-normal">VAT
                                                        {{ $item->vat }}</span></h6>
                                            </td>
                                            <td class="text-center">
                                                <div class="list-icons d-inline-flex">
                                                    <a href="{{ route('order.invoice', $item->id) }}"
                                                        class="list-icons-item me-10"><i class="fas fa-file-text-o"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

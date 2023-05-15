@extends('admin.admin_master')
@section('admin')
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="me-auto">
                <h3 class="page-title">Customers List</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/dashboard"><i class="mdi mdi-home-outline"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Customers list</li>
                        </ol>
                    </nav>
                </div>
            </div>
            
            <h3 class="page-title float-right">
                <a href="{{ route('add.customer') }}" class="waves-effect waves-light btn btn-primary"><i
                        class="fa fa-plus me-2"></i> Add
                    Customer</a>
            </h3>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="complex_header" class="table table-striped display"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Name</th>
                                        <th>E-Mail</th>
                                        <th>Phone</th>
                                        <th>Gender</th>
                                        <th>Address</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($customers as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>
                                                <span class="badge badge-success">
                                                    +880{{ $item->phone }}
                                                </span>
                                            </td>
                                            <td>{{ $item->gender }}</td>
                                            <td>{{ $item->address }}</td>
                                            <td class="text-center">
                                                <div class="list-icons d-inline-flex">
                                                    <a href="{{ route('edit.customer', $item->id) }}" class="list-icons-item me-15"><i
                                                            class="fa fa-pencil text-success"></i></a>
                                                    <a href="{{route('delete.customer',$item->id)}}" class="list-icons-item"><i
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
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
@endsection

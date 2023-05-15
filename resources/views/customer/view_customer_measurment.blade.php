@extends('admin.admin_master')
@section('admin')
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="me-auto">
                <h3 class="page-title">Customers Measurments</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/view/customer"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">customer measurments</li>
                        </ol>
                    </nav>
                </div>
            </div>

        </div>
    </div>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-body p-15">
                        <div class="table-responsive">
                            <table id="tickets" class="table mt-0 table-hover no-wrap" data-page-size="10">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Name</th>
                                        <th>Gender</th>
                                        <th>Chest</th>
                                        <th>Waist</th>
                                        <th>Hips</th>
                                        <th>Rise</th>
                                        <th>Neck To Waist</th>
                                        <th>Waist To Floor</th>
                                        <th>Outseam</th>
                                        <th>Inseam</th>
                                        <th>Bust</th>
                                        <th>Crotch</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($customers as $key => $item)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>
                                                <span class="badge badge-success">{{$item->name}}</span>
                                            </td>
                                            <td>{{$item->gender}}</td>
                                            <td>{{$item->chest}}</td>
                                            <td>{{$item->waist}}</td>
                                            <td>{{$item->hips}}</td>
                                            <td>{{$item->rise}}</td>
                                            <td>{{$item->neck_to_waist}}</td>
                                            <td>{{$item->waist_to_floor}}</td>
                                            <td>{{$item->outseam}}</td>
                                            <td>{{$item->inseam}}</td>
                                            <td>{{$item->bust}}</td>
                                            <td>{{$item->crotch}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->

    </section>
@endsection

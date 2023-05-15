@extends('admin.admin_master')
@section('admin')
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="me-auto">
                <h3 class="page-title">Add New Service</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/dashboard"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add Service</li>
                        </ol>
                    </nav>
                </div>
            </div>

        </div>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="box">
                    <!-- /.box-header -->
                    <form method="POST" action="{{ route('store.service') }}">
                        @csrf
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="service_name mb-2">Service Name</label>
                                        <input name="service_name" type="text"
                                            class="form-control  @error('service_name ') is-invalid @enderror"
                                            placeholder="Enter service name">
                                        @error('service_name ')
                                            <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="service_code mb-2">Service Code</label>
                                        <input name="service_code" type="text"
                                            class="form-control @error('service_code ') is-invalid @enderror"
                                            placeholder="Enter email">
                                        @error('service_code ')
                                            <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="category_id">Category</label>
                                        <select class="form-select @error('category_id') is-invalid @enderror" name="category_id">
                                            <option disabled selected>Select category</option>
                                            @foreach ($category as $cat )
                                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="selling_price mb-2">Selling Price</label>
                                        <input name="selling_price" type="number"
                                            class="form-control @error('selling_price') is-invalid @enderror"
                                            placeholder="Enter address">
                                        @error('selling_price')
                                            <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div>
                                <input type="submit" value="Save Service" class="btn btn-success text-white">
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </form>
                </div>
                <!-- /.box -->
            </div>
        </div>
        <!-- /.row -->

    </section>
@endsection

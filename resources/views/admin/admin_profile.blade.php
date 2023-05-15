@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="me-auto">
                <h3 class="page-title">Admin Profile</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/dashboard"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Profile</li>
                        </ol>
                    </nav>
                </div>
            </div>

        </div>
    </div>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-12 col-lg-7 col-xl-8">

                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li><a href="#settings" class="active" data-bs-toggle="tab">Profile Settings</a></li>
                    </ul>

                    <div class="tab-content">

                        <div class="active tab-pane" id="settings">

                            <div class="box no-shadow">
                                <form class="form-horizontal form-element col-12" method="POST"
                                    action="{{ route('admin.profile.store') }}">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 form-label">Name</label>

                                        <div class="col-sm-10">
                                            <input name="name" value="{{ $adminData->name }}" type="text"
                                                class="form-control" id="inputName" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail" class="col-sm-2 form-label">Email</label>

                                        <div class="col-sm-10">
                                            <input name="email" value="{{ $adminData->email }}" type="email"
                                                class="form-control" id="inputEmail" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="ms-auto col-sm-10 mt-15">
                                            <button type="submit" class="btn btn-success">Update Admin Profile</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-lg-5 col-xl-4">
                <div class="box box-widget widget-user">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-img bbsr-0 bber-0"
                        style="background: url('../images/gallery/full/10.jpg') center center;" data-overlay="5">
                        <h3 class="widget-user-username text-white">{{ $adminData->name }}</h3>
                        <h6 class="widget-user-desc text-white">@Admin</h6>
                    </div>
                    <div class="widget-user-image">
                        <img class="rounded-circle"
                            src="https://images.unsplash.com/photo-1529665253569-6d01c0eaf7b6?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1085&q=80">
                    </div>
                </div>
                <div class="box">
                    <div class="box-body box-profile">
                        <div class="row">
                            <div class="col-12">
                                <div>
                                    <p>Email :<span class="text-gray ps-10">{{ $adminData->email }}</span> </p>
                                    <p>Password :<span class="text-gray ps-10"><a href="{{ route('admin.password.change') }}" class="text-primary font-weight-bold">Change Password</a></span> </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>

            </div>

        </div>
        <!-- /.row -->
    </section>
@endsection

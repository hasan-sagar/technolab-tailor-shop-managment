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
                            <li class="breadcrumb-item active" aria-current="page">Change Password</li>
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
                        <li><a href="#settings" class="active" data-bs-toggle="tab">Admin Change Password</a></li>
                    </ul>

                    <div class="tab-content">

                        <div class="active tab-pane" id="settings">

                            <div class="box no-shadow">
                                <form class="form-horizontal form-element col-12" method="POST"
                                    action="{{ route('admin.password.update') }}">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="old_password" class="col-sm-2 form-label">Old Password</label>

                                        <div class="col-sm-10">
                                            <input name="old_password" type="password"
                                                class="form-control @error('old_password') is-invalid @enderror"
                                                id="old_password" placeholder="">
                                        </div>
                                        @error('old_password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group row">
                                        <label for="new_password" class="col-sm-2 form-label">New Password</label>

                                        <div class="col-sm-10">
                                            <input name="new_password" type="password"
                                                class="form-control @error('new_password') is-invalid @enderror"
                                                id="new_password" placeholder="">
                                        </div>
                                        @error('new_password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group row">
                                        <label for="new_password_confirmation" class="col-sm-2 form-label">Confirm
                                            Password</label>

                                        <div class="col-sm-10">
                                            <input name="new_password_confirmation" type="password" class="form-control"
                                                id="new_password_confirmation" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="ms-auto col-sm-10 mt-15">
                                            <button type="submit" class="btn btn-success">Update Admin Password</button>
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
        </div>
        <!-- /.row -->
    </section>
@endsection

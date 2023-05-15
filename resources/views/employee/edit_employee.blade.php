@extends('admin.admin_master')
@section('admin')
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="me-auto">
                <h3 class="page-title">Edit Employee - {{$employee->name}}</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/dashboard"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Employee</li>
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
                    <form method="POST" action="{{ route('update.employee') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{$employee->id}}">
                        <div class="box-body">
                            <h4 class="box-title text-info mb-0"><i class="ti-user me-15"></i> Employee Info</h4>
                            <hr class="my-15">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="name">Name</label>
                                        <input name="name" type="text"
                                            class="form-control  @error('name') is-invalid @enderror"
                                            placeholder="Enter name" value="{{$employee->name}}">
                                        @error('name')
                                            <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="gender">Gender</label>
                                        <select class="form-select @error('gender') is-invalid @enderror" name="gender">
                                            <option disabled selected>select gender</option>
                                            <option value="male" {{$employee->gender == 'male' ? 'selected':''}}>Male</option>
                                            <option value="female" {{$employee->gender == 'female' ? 'selected':''}}>Female</option>
                                        </select>
                                        @error('gender')
                                            <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="email">E-Mail</label>
                                        <input name="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            placeholder="Enter email" value="{{$employee->email}}">
                                        @error('email')
                                            <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="phone">Phone</label>
                                        <input name="phone" type="number"
                                            class="form-control @error('phone') is-invalid @enderror"
                                            placeholder="Enter phone" value="{{$employee->phone}}">
                                        @error('phone')
                                            <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="salary">Salary</label>
                                        <input name="salary" type="number"
                                            class="form-control @error('salary') is-invalid @enderror"
                                            placeholder="Enter address" value="{{$employee->salary}}">
                                        @error('salary')
                                            <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="experience">Experience</label>
                                        <select class="form-select @error('experience') is-invalid @enderror"
                                            name="experience">
                                            <option disabled selected>select experience</option>
                                            <option value="1 year" {{$employee->experience == '1 year' ? 'selected':''}}>1 year</option>
                                            <option value="2 year" {{$employee->experience == '2 year' ? 'selected':''}}>2 year</option>
                                            <option value="3 year" {{$employee->experience == '3 year' ? 'selected':''}}>3 year</option>
                                        </select>
                                        @error('experience')
                                            <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="address">Address</label>
                                        <input name="address" type="text"
                                            class="form-control @error('address') is-invalid @enderror"
                                            placeholder="Enter address" value="{{$employee->address}}">
                                        @error('address')
                                            <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <input type="submit" value="Update Employee" class="btn btn-success text-white">
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
        </div>
        <!-- /.row -->

    </section>
@endsection

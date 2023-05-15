@extends('admin.admin_master')
@section('admin')
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="me-auto">
                <h3 class="page-title">Edit Customer - {{$customer->name}}</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/dashboard"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Customer</li>
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
                    <form method="POST" action="{{ route('update.customer') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{$customer->id}}">
                        <div class="box-body">
                            <h4 class="box-title text-info mb-0"><i class="ti-user me-15"></i> Customer Info</h4>
                            <hr class="my-15">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="name">Name</label>
                                        <input name="name" type="text"
                                            class="form-control  @error('name') is-invalid @enderror"
                                            placeholder="Enter name" value="{{$customer->name}}">
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
                                            <option value="male" {{$customer->gender == 'male' ? 'selected' :''}}>Male</option>
                                            <option value="female"{{$customer->gender == 'female' ? 'selected' :''}}>Female</option>
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
                                            placeholder="Enter email" value="{{$customer->email}}">
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
                                            placeholder="Enter phone" value="{{$customer->phone}}">
                                        @error('phone')
                                            <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="address">Address</label>
                                        <input name="address" type="text"
                                            class="form-control @error('address') is-invalid @enderror"
                                            placeholder="Enter address" value="{{$customer->address}}">
                                        @error('address')
                                            <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            {{-- Measurments --}}
                            <h4 class="box-title text-info mb-0 mt-20"><i class="ti-ruler-pencil me-15"></i> Measurments
                            </h4>
                            <hr class="my-15">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="chest">Chest</label>
                                        <input name="chest" step=".1" type="number"
                                            class="form-control @error('chest') is-invalid @enderror" value="{{$customer->chest}}">
                                        @error('chest')
                                            <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="waist">Waist</label>
                                        <input name="waist" step=".1" type="number"
                                            class="form-control @error('waist') is-invalid @enderror"value="{{$customer->waist}}">
                                        @error('waist')
                                            <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="hips">Hips</label>
                                        <input name="hips" step=".1" type="number"
                                            class="form-control @error('hips') is-invalid @enderror" value="{{$customer->hips}}">
                                        @error('hips')
                                            <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="rise">Rise</label>
                                        <input name="rise" step=".1" type="number"
                                            class="form-control @error('rise') is-invalid @enderror"value="{{$customer->rise}}">
                                        @error('rise')
                                            <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="neck_to_waist">Neck to Waist</label>
                                        <input name="neck_to_waist" step=".1" type="number"
                                            class="form-control @error('neck_to_waist') is-invalid @enderror"value="{{$customer->neck_to_waist}}">
                                        @error('neck_to_waist')
                                            <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="waist_to_floor">Waist to Floor</label>
                                        <input name="waist_to_floor" step=".1" type="number"
                                            class="form-control @error('waist_to_floor') is-invalid @enderror"value="{{$customer->waist_to_floor}}">
                                        @error('waist_to_floor')
                                            <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="outseam">Outseam</label>
                                        <input name="outseam" step=".1" type="number"
                                            class="form-control @error('outseam') is-invalid @enderror"value="{{$customer->outseam}}">
                                        @error('outseam')
                                            <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="inseam">Inseam</label>
                                        <input name="inseam" step=".1" type="number"
                                            class="form-control @error('inseam') is-invalid @enderror"value="{{$customer->inseam}}">
                                        @error('inseam')
                                            <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="bust">Bust</label>
                                        <input name="bust" step=".1" type="number"
                                            class="form-control @error('bust') is-invalid @enderror"value="{{$customer->bust}}">
                                        @error('bust')
                                            <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="crotch">Crotch</label>
                                        <input name="crotch" step=".1" type="number"
                                            class="form-control @error('crotch') is-invalid @enderror"value="{{$customer->crotch}}">
                                        @error('crotch')
                                            <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <input type="submit" value="Update Customer" class="btn btn-success text-white">
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
        </div>
        <!-- /.row -->

    </section>
@endsection

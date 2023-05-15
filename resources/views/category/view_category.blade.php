@extends('admin.admin_master')
@section('admin')
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="me-auto">
                <h3 class="page-title">Category List</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/dashboard"><i class="mdi mdi-home-outline"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">category list</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <h3 class="page-title float-right">
                <a data-bs-toggle="modal" data-bs-target="#myModal" class="waves-effect waves-light btn btn-primary"><i
                        class="fa fa-plus me-2"></i> Add Category</a>
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
                            <table id="complex_header" class="table table-striped display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($category as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td class="text-center">
                                                <div class="list-icons d-inline-flex">
                                                    <a href="{{ route('edit.category', $item->id) }}"
                                                        class="list-icons-item me-15"><i
                                                            class="fa fa-pencil text-success"></i></a>
                                                    <a href="{{ route('delete.category', $item->id) }}" class="list-icons-item"><i
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
    <div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" style="display: none;"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-center" id="myModalLabel">Add Category</h3>
                    <a type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></a>
                </div>
                <div class="modal-body">
                    <section class="content">
                        <div class="row">
                            <div class="col-lg-12 col-12">
                                <!-- /.box-header -->
                                <form class="form" action="{{ route('store.category') }}" method="POST">
                                    @csrf
                                    <div class="box-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label">Category Name</label>
                                                    <input type="text" name="name"
                                                        class="form-control @error('name') is-invalid @enderror"
                                                        placeholder="category name">
                                                    @error('name')
                                                        <span class="text-danger"> {{ $message }} </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <button type="submit" class="btn btn-primary mt-5">
                                                <i class="ti-save-alt"></i> Save Category
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

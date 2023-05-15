@extends('admin.admin_master')
@section('admin')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-header no-border">
                        <h4 class="box-title">Measurment Guide For Tailors</h4>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="news-slider owl-carousel">
                    <div class="box">
                        <img class="card-img-top img-responsive" src="{{ asset('images/card/img3.jpg') }}"
                            alt="Card image cap" />
                        <div class="box-body">
                            <div class="text-center">
                                <h4 class="box-title">Men's Measurment</h4>
                                <p class="box-text">
                                    Some quick example and measurements guide for custom tailored
                                </p>
                                <a target="_blank"
                                    href="https://www.sewneau.com/assets/images_how-to/worksheets/worksheet-male.pdf"
                                    class="btn btn-primary btn-md">
                                    Show
                                    <i class="mdi mdi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <div class="box">
                        <img class="card-img-top img-responsive" src="../images/card/img2.jpg" alt="Card image cap" />
                        <div class="box-body">
                            <div class="text-center">
                                <h4 class="box-title">Women's Measurment</h4>
                                <p class="box-text">
                                    Some quick example and measurements guide for custom tailored
                                </p>
                                <a target="_blank"
                                    href="https://www.sewneau.com/assets/images_how-to/worksheets/worksheet-female.pdf"
                                    class="btn btn-primary btn-md">Show<i class="mdi mdi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <div class="box">
                        <img class="card-img-top img-responsive" src="../images/card/img3.jpg" alt="Card image cap" />
                        <div class="box-body">
                            <div class="text-center">
                                <h4 class="box-title">Punjabi Measurment</h4>
                                <p class="box-text">
                                    Some quick example and measurements guide for custom tailored
                                </p>
                                <a target="_blank" href="https://www.siwaklifestyle.com/size-chart-panjabi/"
                                    class="btn btn-primary btn-md">Show <i class="mdi mdi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <div class="box">
                        <img class="card-img-top img-responsive" src="../images/card/img4.jpg" alt="Card image cap" />
                        <div class="box-body">
                            <div class="text-center">
                                <h4 class="box-title">Tops Measurment</h4>
                                <p class="box-text">
                                    Some quick example and measurements guide for custom tailored
                                </p>
                                <a target="_blank" href="https://www.asos.com/discover/size-charts/women/tshirts-tops/"
                                    class="btn btn-primary btn-md">Show <i class="mdi mdi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </section>
@endsection

<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar position-relative">
        <div class="multinav">
            <div class="multinav-scroll" style="height: 100%;">

                <!-- sidebar menu-->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">Dashboard & Apps</li>
                    <li class="{{ Request::path() == 'dashboard' ? 'active' : '' }}">
                        <a href="{{ route('dashboard') }}">
                            <i class="icon-Layout-4-blocks"><span class="path1"></span><span class="path2"></span></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="{{ Request::path() == 'allOrderList' ? 'active' : '' }}">
                        <a href="{{ route('all.orders') }}">
                            <i class="icon-Bullet-list"><span class="path1 "></span><span class="path2"></span></i>
                            <span>Orders</span>
                        </a>
                    </li>
                    <li class="{{ Request::path() == 'order' ? 'active' : '' }}">
                        <a href="{{ route('order') }}">
                            <i class="fas fa-cash-register"><span class="path1 "></span><span class="path2"></span></i>
                            <span>Create Order</span>
                        </a>
                    </li>
                    <li class="header">System Apps</li>

                    <!-- {{-- customer --}} -->
                    <li class="treeview">
                        <a href="{{ route('view.customer') }}">
                            <i class="icon-User"><span class="path1"></span><span class="path2"></span></i>
                            <span>Customer</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="{{ Request::path() == 'view/customer' ? 'active' : '' }}"><a
                                    href="{{ route('view.customer') }}"><i class="icon-Commit"><span
                                            class="path1"></span><span class="path2"></span></i>All Customer</a>
                            </li>
                            <li class="{{ Request::path() == 'add/customer' ? 'active' : '' }}"><a
                                    href="{{ route('add.customer') }}"><i class="icon-Commit"><span
                                            class="path1"></span><span class="path2"></span></i>Add Customer</a>
                            </li>
                            <li class="{{ Request::path() == 'view/customer/measurment' ? 'active' : '' }}"><a
                                    href="{{ route('view.customer.measurment') }}"><i class="icon-Commit"><span
                                            class="path1"></span><span class="path2"></span></i>Measurments</a>
                            </li>
                        </ul>
                    </li>
                    <!-- {{-- customer --}} -->

                    <!-- {{-- Employee --}} -->
                    <li class="treeview">
                        <a href="{{ route('view.customer') }}">
                            <i class="icon-User-folder"><span class="path1"></span><span class="path2"></span></i>
                            <span>Employee</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="{{ Request::path() == 'view/employee' ? 'active' : '' }}"><a
                                    href="{{ route('view.employee') }}"><i class="icon-Commit"><span
                                            class="path1"></span><span class="path2"></span></i>All Employee</a>
                            </li>
                            <li class="{{ Request::path() == 'add/employee' ? 'active' : '' }}"><a
                                    href="{{ route('add.employee') }}"><i class="icon-Commit"><span
                                            class="path1"></span><span class="path2"></span></i>Add Employee</a>
                            </li>
                        </ul>
                    </li>
                    <!-- {{-- Employee --}} -->

                    <!-- {{-- Measurment Guide --}} -->
                    <li class="{{ Request::path() == 'measurment/guide' ? 'active' : '' }}">
                        <a href="{{ url('measurment/guide') }}">
                            <i class="icon-Penruller"><span class="path1"></span><span class="path2"></span></i>
                            <span>Measurment Guide</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                    </li>
                    <!-- {{-- Measurment Guide --}} -->

                    <!-- {{-- Category --}} -->
                    <li class="treeview">
                        <a href="{{ route('view.category') }}">
                            <i class="icon-Bullet-list"><span class="path1"></span><span class="path2"></span></i>
                            <span>Category</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="{{ Request::path() == 'view/category' ? 'active' : '' }}"><a
                                    href="{{ route('view.category') }}"><i class="icon-Commit"><span
                                            class="path1"></span><span class="path2"></span></i>All Category</a>
                            </li>
                        </ul>
                    </li>
                    <!-- {{-- Category --}} -->

                    <!-- {{-- Service --}} -->
                    <li class="treeview">
                        <a href="{{ route('view.service') }}">
                            <i class="icon-Box2"><span class="path1"></span><span class="path2"></span></i>
                            <span>Service</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="{{ Request::path() == 'view/service' ? 'active' : '' }}"><a
                                    href="{{ route('view.service') }}"><i class="icon-Commit"><span
                                            class="path1"></span><span class="path2"></span></i>All Service</a>
                            </li>
                            <li class="{{ Request::path() == 'add/service' ? 'active' : '' }}"><a
                                    href="{{ route('add.service') }}"><i class="icon-Commit"><span
                                            class="path1"></span><span class="path2"></span></i>Add Service</a>
                            </li>
                        </ul>
                    </li>
                    <!-- {{-- Service --}} -->
                </ul>
            </div>
        </div>
    </section>
</aside>

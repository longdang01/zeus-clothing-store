@extends('admin.shared._layout_admin')
@section('content')
<div class="content-wrapper" ng-controller="statistic">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>@{{new_orders}}</h3>

                <p>New Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="/admin/order" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>@{{success_rate}}<sup style="font-size: 20px">%</sup></h3>

                <p>Success Rate</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>@{{new_customers}}</h3>

                <p>New Customers</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="/admin/customer" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>@{{new_products}}</h3>

                <p>New Products</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-6 connectedSortable" >
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card" style="min-height: 300px;">
              <div class="card-header">
                <h3 class="card-title">
                  Top <input id="top-product-input" type="number" style="width: 40px" value='3'> Products
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total</th>
                  </tr>
                </thead>
                <tbody>
                  <tr dir-paginate="item in products|itemsPerPage:top">
                    <td>@{{$index+1}}</td>
                    <td>@{{item.product_name}}</td>
                    <td>@{{item.amount}}</td>
                    <td>@{{item.totalprice}}</td>
                  </tr>
                </tbody>
              </table>
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-6 connectedSortable" >
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card" style="min-height: 300px;">
              <div class="card-header">
                <h3 class="card-title">
                  Top <input id="top-customer-input" type="number" style="width: 40px" value='3'> Customers
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Customer Name</th>
                    <th scope="col">Total</th>
                  </tr>
                </thead>
                <tbody>
                  <tr dir-paginate="item in customers|itemsPerPage:top">
                    <td>@{{$index+1}}</td>
                    <td>@{{item.customer_name}}</td>
                    <td>@{{item.totalprice}}</td>
                  </tr>
                </tbody>
              </table>
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section>
          <!-- right col -->
        </div>
        <div class="row">
          <div class="col-lg-6">
            <div class="card">
              <canvas id="doughnutChart"></canvas>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="card">
              <canvas id="lineChart"></canvas>
            </div>
          </div>
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@stop
@section('js')
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="/assets/admin/dist/js/pages/dashboard.js"></script>
<script src="/assets/admin/dist/js/statisticController.js"></script>
@stop
@extends('admin.shared._layout_admin')
@section('content')
<div class="content-wrapper" ng-controller="order">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Orders Manager</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Manager</a></li>
              <li class="breadcrumb-item active">Orders</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Customer Name</th>
              <th scope="col">Delivery Address</th>
              <th scope="col">Total</th>
              <th scope="col">Status</th>
              <th scope="col">Details</th>
            </tr>
          </thead>
          <tbody>
            <tr dir-paginate="item in orders|itemsPerPage:5" pagination-id="1">
              <td>@{{$index+1}}</td>
              <td>@{{item.customer.customer_name}}</td>
              <td>@{{item.delivery_address}}</td>
              <td>@{{item.total|number}}</td>
              <td>
                <select class="custom-select" name="status" id="status" ng-model="item.status" ng-change="status_changed(item.id,item.status)">
                    <option value="1">Đã hủy</option>   
                    <option value="2">Chờ lấy hàng</option>
                    <option value="3">Đang chuyển hàng</option>
                    <option value="4">Giao hàng thành công</option>
                </select>
              </td>
              <td><button class="btn btn-info" ng-click="showmodal(item.id)">&nbsp;Details</button></td>
            </tr>
          </tbody>
        </table>
        <dir-pagination-controls
            pagination-id="1"
            max-size="5"
            direction-links="true"
            boundary-links="true" >
        </dir-pagination-controls>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    <!-- Modal -->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" style="max-width: 1400px;" role="document">
            <div class="modal-content" style="min-height: 500px;">
                <div class="modal-header">
                    <h5 class="modal-title">Mã đơn hàng: @{{id}}</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body row">
                    <div class="col-md-12 col-lg-7 col-xl-7">
                      <h5>List product order</h5>
                      <section class="content">
                        <div class="container-fluid">
                            <table class="table">
                              <thead>
                                <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">Product Name</th>
                                  <th scope="col">Color</th>
                                  <th scope="col">Size</th>
                                  <th scope="col">Quantity</th>
                                  <th scope="col">Price</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr dir-paginate="item in orders_detail|itemsPerPage:5" pagination-id="2">
                                  <td>@{{$index+1}}</td>
                                  <td>@{{item.product.product_name}}</td>
                                  <td>@{{item.color.color_name}}</td>
                                  <td>@{{item.size.size_name}}</td>
                                  <td>@{{item.quantity}}</td>
                                  <td>@{{item.price}}</td>
                                </tr>
                              </tbody>
                            </table>
                            <dir-pagination-controls
                                pagination-id="2"
                                max-size="5"
                                direction-links="true"
                                boundary-links="true" >
                            </dir-pagination-controls>
                        </div><!-- /.container-fluid -->
                      </section>
                    </div>
                    <div class="col-md-12 col-lg-5 col-xl-5">
                      <h5>List status <button id="btn-update-status" class="btn btn-primary" style="float: right;" ng-click="showmodal_status()">Update status</button></h5>
                      <section class="content">
                        <div class="container-fluid">
                          <table class="table">
                              <thead>
                                <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">Status Name</th>
                                  <th scope="col">Date start</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr dir-paginate="item in orders_status|itemsPerPage:5" pagination-id="3">
                                  <td>@{{$index+1}}</td>
                                  <td>@{{item.status_name}}</td>
                                  <td>@{{item.date_start}}</td>
                                </tr>
                              </tbody>
                            </table>
                            <dir-pagination-controls
                                pagination-id="3"
                                max-size="5"
                                direction-links="true"
                                boundary-links="true" >
                            </dir-pagination-controls>
                          </div><!-- /.container-fluid -->
                      </section>
                      <div class="modal fade" id="modelstatus" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <h5 class="modal-title">@{{modalTitle}}</h5>
                                      <button type="button" class="close" onclick=" $('#modelstatus').modal('hide');" data-bs-dismiss="modelstatus" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                  </div>
                                  <div class="modal-body">
                                      <div class="container-fluid">
                                          <div class="form-group">
                                              <label>Status:</label>
                                              <div>
                                                <textarea style="min-height: 90px;" type="text" class="form-control" ng-model="status.status_name"></textarea>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" onclick=" $('#modelstatus').modal('hide');" data-bs-dismiss="modelstatus">Close</button>
                                          <button type="button" class="btn btn-primary" onclick=" $('#modelstatus').modal('hide');" ng-click="savestatus()">Save</button>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
@stop
@section('js')
<script src="/assets/admin/dist/js/ordercontroller.js"></script>
@stop

@extends('admin.shared._layout_admin')
@section('content')
<div class="content-wrapper" ng-controller="customer">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Customer Manager</h1>
            <!-- <p style="margin-top: 10px;"><button class="btn btn-primary" ng-click="showmodal(0)"><i class="fa fa-plus"> Create</i></button></p> -->
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Manager</a></li>
              <li class="breadcrumb-item active">Customer</li>
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
              <th scope="col">Image</th>
              <th scope="col">Date of birth</th>
              <th scope="col">Address</th>
              <th scope="col">Phone</th>
              <th scope="col">Email</th>
              <th scope="col">Account</th>
              <th scope="col">Password</th>
              <!-- <th scope="col">Edit</th> -->
              <th scope="col">Delete</th>
            </tr>
          </thead>
          <tbody>
            <tr dir-paginate="item in customers|itemsPerPage:5">
              <td>@{{$index+1}}</td>
              <td>@{{item.customer_name}}</td>
              <td><img style="width: 60px" src="/upload/customer/@{{item.picture!=null&&item.picture!=''?item.picture:'add.jpg'}}"></td>
              <td>@{{item.dob}}</td>
              <td>@{{item.address}}</td>
              <td>@{{item.phone}}</td>
              <td>@{{item.email}}</td>
              <td>@{{item.users.username}}</td>
              <td>@{{item.users.password}}</td>
              <!-- <td><button class="btn btn-info" ng-click="showmodal(item.id)">&nbsp;Edit</button></td> -->
              <td><button class="btn btn-danger" ng-click="deleteClick(item.id)">&nbsp;Delete</button></td>
            </tr>
          </tbody>
        </table>
        <dir-pagination-controls
            max-size="5"
            direction-links="true"
            boundary-links="true" >
        </dir-pagination-controls>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    <!-- Modal -->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">@{{modalTitle}}</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="form-group">
                            <label>Customer Name:</label>
                            <div>
                                <input type="text" class="form-control" ng-model="customer.customer_name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Image:</label>
                            <div>
                                <input type="file" class="form-control" id="avatar-input" ng-model="customer.picture">
                            </div>
                            <div style="margin: 10px 0px 10px 0px;">
                              <img src="" id="avatar" style="width: 60px">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Date of birth:</label>
                            <div>
                                <input type="datetime-local" class="form-control" ng-model="customer.dob">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Address:</label>
                            <div>
                                <input type="text" class="form-control" ng-model="customer.address">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Phone:</label>
                            <div>
                                <input type="text" class="form-control" ng-model="customer.phone">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Email:</label>
                            <div>
                                <input type="text" class="form-control" ng-model="customer.email">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" ng-click="saveData()">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
@stop
@section('js')
<script src="/assets/admin/dist/js/customercontroller.js"></script>
@stop

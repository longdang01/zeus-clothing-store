@extends('admin.shared._layout_admin')
@section('content')
<div class="content-wrapper" ng-controller="staff">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Staff Manager</h1>
            <p style="margin-top: 10px;"><button class="btn btn-primary" ng-click="showmodal(0)"><i class="fa fa-plus"> Create</i></button></p>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Manager</a></li>
              <li class="breadcrumb-item active">Staff</li>
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
              <th scope="col">Staff Name</th>
              <th scope="col">Image</th>
              <th scope="col">Phone</th>
              <th scope="col">Email</th>
              <th scope="col">Position</th>
              <th scope="col">Role</th>
              <th scope="col">Edit</th>
              <th scope="col">Delete</th>
            </tr>
          </thead>
          <tbody>
            <tr dir-paginate="item in staffs|itemsPerPage:5|filter:keyword_search">
              <td>@{{$index+1}}</td>
              <td>@{{item.staff_name}}</td>
              <td><img style="width: 60px" src="/upload/staff/@{{item.id}}/@{{item.picture}}"></td>
              <td>@{{item.phone}}</td>
              <td>@{{item.email}}</td>
              <td>@{{item.position.position_name}}</td>
              <td>@{{item.role.role_name}}</td>
              <td><button class="btn btn-info" ng-click="showmodal(item.id)">&nbsp;Edit</button></td>
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
        <div class="modal-dialog " style="max-width: 1200px;" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">@{{modalTitle}}</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                  <div class="container-fluid row">
                    <div class="form-group col-md-12 col-lg-6 col-xl-6">
                      <select class="custom-select" name="position" id="position" ng-model="staff.position_id">
                        <option ng-repeat="option in positions" value="@{{option.id}}">@{{option.position_name}}</option>
                      </select>
                    </div>
                    <div class="form-group col-md-12 col-lg-6 col-xl-6">
                      <select class="custom-select" name="role" id="role" ng-model="staff.role_id">
                        <option ng-repeat="option in roles" value="@{{option.id}}">@{{option.role_name}}</option>
                      </select>
                    </div>
                  </div>
                  <div class="container-fluid row">
                    <div class="form-group col-md-12 col-lg-6 col-xl-6">
                      <label>Staff Name:</label>
                      <div>
                          <input type="text" class="form-control" ng-model="staff.staff_name">
                      </div>
                    </div>
                    <div class="form-group col-md-12 col-lg-6 col-xl-6">
                      <label>Date of birth:</label>
                      <div>
                          <input type="datetime-local" class="form-control" ng-model="staff.dob">
                      </div>
                    </div>
                  </div>
                  <div class="container-fluid row">
                    <div class="form-group col-md-12 col-lg-6 col-xl-6">
                      <label>Image:</label>
                        <div>
                          <input type="file" class="form-control" id="avatar-input" ng-model="staff.picture">
                        </div>
                        <div style="margin: 10px 0px 10px 0px;">
                          <img src="" id="avatar" style="width: 60px">
                        </div>
                    </div>
                    <div class="form-group col-md-12 col-lg-6 col-xl-6">
                      <label>Email:</label>
                            <div>
                                <input type="text" class="form-control" ng-model="staff.email">
                            </div>
                    </div>
                  </div>
                  <div class="container-fluid row">
                    <div class="form-group col-md-12 col-lg-6 col-xl-6">
                      <label>Address:</label>
                            <div>
                                <input type="text" class="form-control" ng-model="staff.address">
                            </div>
                    </div>
                    <div class="form-group col-md-12 col-lg-6 col-xl-6">
                      <label>Phone:</label>
                            <div>
                                <input type="text" class="form-control" ng-model="staff.phone">
                            </div> 
                    </div>
                  </div>
                  <div class="container-fluid row">
                    <div class="form-group col-md-12 col-lg-6 col-xl-6">
                      <label>Username:</label>
                            <div>
                                <input id="username" type="text" class="form-control" ng-model="staff.users.username">
                            </div> 
                    </div>
                    <div class="form-group col-md-12 col-lg-6 col-xl-6">
                      <label>Password:</label>
                            <div>
                                <input type="text" class="form-control" ng-model="staff.users.password">
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
<script src="/assets/admin/dist/js/staffcontroller.js"></script>
@stop

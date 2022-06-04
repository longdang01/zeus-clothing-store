@extends('admin.shared._layout_admin')
@section('content')
<div class="content-wrapper" ng-controller="transport">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Transport Manager</h1>
            <p><button class="btn btn-primary" ng-click="showmodal(0)"><i class="fa fa-plus"> Create</i></button></p>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Manager</a></li>
              <li class="breadcrumb-item active">Transport</li>
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
              <th scope="col">Transport Type</th>
              <th scope="col">Fee</th>
              <th scope="col">Status</th>
              <th scope="col">Edit</th>
              <th scope="col">Delete</th>
            </tr>
          </thead>
          <tbody>
            <tr dir-paginate="item in transports|itemsPerPage:5|filter: keyword">
              <td>@{{$index+1}}</td>
              <td>@{{item.transport_type}}</td>
              <td>@{{item.fee}}</td>
              <td>@{{item.status==1?"Đang áp dụng":"Ngừng áp dụng"}}</td>
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
                            <label>Transport Type:</label>
                            <div>
                                <input type="text" class="form-control" ng-model="transport.transport_type">
                            </div>
                        </div>
                        <div class="form-group">    
                            <label>Fee:</label>
                            <div>
                                <input type="number" class="form-control" ng-model="transport.fee">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Status:</label>
                            <select class="custom-select" name="status" id="status" ng-model="transport.status" ng-change="">
                              <option value="0">Không áp dụng</option>
                              <option value="1">Áp dụng</option>  
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Description:</label>
                            <div>
                                <input style="height: 60px;" type="text" class="form-control" ng-model="transport.description">
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
<script src="/assets/admin/dist/js/transportcontroller.js"></script>
@stop

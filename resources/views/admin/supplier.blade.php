@extends('admin.shared._layout_admin')
@section('content')
<div class="content-wrapper" ng-controller="supplier">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Supplier Manager</h1>
            <p style="margin-top: 10px;"><button class="btn btn-primary" ng-click="showmodal(0)"><i class="fa fa-plus"> Create</i></button></p>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Manager</a></li>
              <li class="breadcrumb-item active">Supplier</li>
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
              <th scope="col">Supplier Name</th>
              <th scope="col">Address</th>
              <th scope="col">Phone</th>
              <th scope="col">Email</th>
              <th scope="col">Edit</th>
              <th scope="col">Delete</th>
            </tr>
          </thead>
          <tbody>
            <tr dir-paginate="item in suppliers|itemsPerPage:5|filter:keyword_search">
              <td>@{{$index+1}}</td>
              <td>@{{item.supplier_name}}</td>
              <td>@{{item.address}}</td>
              <td>@{{item.phone}}</td>
              <td>@{{item.email}}</td>
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
        <div class="modal-dialog " style="max-width: 600px;" role="document">
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
                      <label>Supplier Name:</label>
                      <div>
                          <input type="text" class="form-control" ng-model="supplier.supplier_name">
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Email:</label>
                        <div>
                            <input type="text" class="form-control" ng-model="supplier.email">
                        </div>
                    </div>
                    <div class="form-group">
                      <label>Address:</label>
                        <div>
                            <input type="text" class="form-control" ng-model="supplier.address">
                        </div>
                    </div>
                    <div class="form-group">
                      <label>Phone:</label>
                        <div>
                            <input type="text" class="form-control" ng-model="supplier.phone" onkeypress="return onlyNumberKey(event)">
                        </div>
                    </div>
                    <div class="form-group">
                      <label>Description:</label>
                        <div>
                            <textarea style="min-width: 70px;" class="form-control" ng-model="supplier.description">
                            </textarea>
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
<script src="/assets/admin/dist/js/suppliercontroller.js"></script>
@stop

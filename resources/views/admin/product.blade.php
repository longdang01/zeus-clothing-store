@extends('admin.shared._layout_admin')
@section('content')
<div class="content-wrapper" ng-controller="product">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Product Manager</h1>
            <p><button class="btn btn-primary" ng-click="showmodal(0)"><i class="fa fa-plus"> Create</i></button></p>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Manager</a></li>
              <li class="breadcrumb-item active">Product</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Product content -->
    <section class="content">
      <div class="container-fluid">
      <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Product Name</th>
              <th scope="col">Origin</th>
              <th scope="col">Material</th>
              <th scope="col">Style</th>
              <th scope="col">Brand</th>
              <th scope="col">Gender</th>
              <th scope="col">Edit</th>
              <th scope="col">Delete</th>
            </tr>
          </thead>
          <tbody>
            <tr dir-paginate="item in products|itemsPerPage:4|filter:keyword_search" pagination-id="1">
              <td>@{{$index+1}}</td>
              <td>@{{item.product_name}}</td>
              <td>@{{item.origin}}</td> 
              <td>@{{item.material}}</td>
              <td>@{{item.style}}</td>
              <td>@{{item.brand.brand_name}}</td>
              <td>
                @{{item.gender=1?'Nam':item.gender=2?'Nữ':'Nam và nữ'}}
              </td>
              <td><button class="btn btn-info" ng-click="showmodal(item.id)" >&nbsp;Edit</button></td>
              <td><button class="btn btn-danger" ng-click="deleteClick(item.id)">&nbsp;Delete</button></td>
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
    <!-- /.product content -->
    <!-- Product Modal -->
    <div class="modal fade" id="modelupdate" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" style="max-width: 1400px" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">@{{modalTitle}}</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body row">
                    <!-- Product modal content -->
                    <div class="col-6">
                        <div class="container-fluid row">
                            <div class="form-group col-sm-6">
                                <label for="category">Category: </label>
                                <select class="custom-select" name="category" id="category" ng-model="product.sub_category_id">
                                    <option ng-repeat="option in sub_categories" value="@{{option.id}}">@{{option.sub_category_name}}</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="brand">Brand: </label>
                                <select class="custom-select" name="brand" id="brand" ng-model="product.brand_id">
                                    <option ng-repeat="option in brands" value="@{{option.id}}">@{{option.brand_name}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="container-fluid row">
                            <div class="form-group col-sm-6">
                                <label>Product Code:</label>
                                <div>
                                    <input type="text" class="form-control" ng-model="product.product_code">
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="Supplier">Supplier: </label>
                                <select class="custom-select" name="Supplier" id="Supplier" ng-model="product.supplier_id">
                                    <option ng-repeat="option in suppliers" value="@{{option.id}}">@{{option.supplier_name}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="container-fluid row">
                            <div class="form-group col-sm-6">
                                <label>Product Name:</label>
                                <div>
                                    <input type="text" class="form-control" ng-model="product.product_name">
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Origin:</label>
                                <div>
                                    <input type="text" class="form-control" ng-model="product.origin">
                                </div>
                            </div>
                        </div>
                        <div class="container-fluid row">
                            <div class="form-group col-sm-6">
                                <label>Material:</label>
                                <div>
                                    <input type="text" class="form-control" ng-model="product.material">
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Style:</label>
                                <div>
                                    <input type="text" class="form-control" ng-model="product.style">
                                </div>
                            </div>
                        </div>
                        <div class="container-fluid row">
                            <div class="form-group col-sm-6">
                                <!-- <label for="brand">Gender: </label>
                                <select class="custom-select" name="gender" id="gender" ng-model="product.gender">
                                    <option value="0">Tất cả</option>   
                                    <option value="1">Nam</option>
                                    <option value="2">Nữ</option>
                                </select> -->
                                <label>Price:</label>
                                <div>
                                    <input type="text" class="form-control" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" ng-model="product.price.price" >
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Size table:</label>
                                <div>
                                    <input type="file" id="size-table-update-input" class="form-control" ng-model="product.size_table">
                                </div>
                                <div style="margin: 10px 0px 10px 0px;">
                                    <img src="" id="size-table-update" style="width: 60px">
                                </div>
                            </div>
                        </div>
                        <div class="container-fluid row">
                            <div class="form-group">
                                <label>Description:</label>
                                <div>
                                    <textarea  type="text" style="min-height: 90px;" class="form-control" ng-model="product.description"></textarea>
                                    <!-- <textarea id="description-editor-update"  style="min-height: 100px;" ng-model="product.description" placeholder="Mô tả">
                                    </textarea> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End Product modal content -->
                    <!-- Product color main -->
                    <div class="col-6">
                        <div>
                            <h5 class="modal-title">Color manager <button class="btn btn-primary"style="float: right;" ng-click="show_color_modal(0)">Add</button></h5>
                            <!-- Product color update modal -->
                            <div class="modal fade" id="modelcolorupdate" tabindex="-2" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                <div class="modal-dialog" style="max-width: 1000px;" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">@{{colormodal_title}}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick=" $('#modelcolorupdate').modal('hide');">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body row">
                                        <!-- Product color modal content -->
                                        <div class="col-6">
                                            <div class="container-fluid row">
                                                <div class="form-group col-sm-6">
                                                    <label>Color Name:</label>
                                                    <div>
                                                        <input type="text" class="form-control" ng-model="color.color_name">
                                                    </div>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                <label>Hexcode:</label>
                                                    <div>
                                                        <input type="text" class="form-control" ng-model="color.hex">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="container-fluid">
                                                <div class="form-group">
                                                    <label>Avatar: </label>
                                                    <div>
                                                        <input type="file" class="form-control" id="avatar-color-update-input" ng-model="color.avatar">
                                                    </div>
                                                    <div style="margin: 10px 0px 10px 0px;">
                                                        <img src="" id="avatar-color-update" style="width: 60px"> 
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="container-fluid">
                                                <div class="form-group">
                                                    <label>Image: </label>
                                                    <div>
                                                        <input type="file" class="form-control" id="image-color-update-input" ng-model="color.images">
                                                    </div>
                                                    <div style="margin: 10px 0px 10px 0px;">
                                                        <img src="" id="image-color-update" style="width: 60px">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Product color modal content -->
                                        <!-- Product size main -->
                                        <div class="col-6">
                                            <div>
                                                <h5 class="modal-title">Size manager <button class="btn btn-primary"style="float: right;" ng-click="show_size_modal(0)">Add</button></h5>
                                                <!-- Product size modal -->
                                                <div class="modal fade" id="modelsize" tabindex="-3" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">@{{sizemodal_title}}</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="$('#modelsize').modal('hide');">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="container-fluid">
                                                                <div class="form-group">
                                                                    <label>Size name:</label>
                                                                    <div>
                                                                        <input type="text" class="form-control" ng-model="size.size_name">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="container-fluid">
                                                                <div class="form-group">
                                                                    <label>Quantity:</label>
                                                                    <div>
                                                                        <input type="number" class="form-control" ng-model="size.quantity">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="container-fluid">
                                                                <div class="form-group">
                                                                    <label>Status:</label>
                                                                    <div>
                                                                        <input type="text" class="form-control"onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" ng-model="size.status">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" onclick="$('#modelsize').modal('hide');">Close</button>
                                                            <button type="button" class="btn btn-primary" ng-click="savesize()">Save changes</button>
                                                        </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Product size modal -->
                                            </div>
                                            <!-- Product size content -->
                                            <section class="content">
                                                <div class="container-fluid">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Size Name</th>
                                                        <th scope="col">Quantity</th>
                                                        <th scope="col">Status</th>
                                                        <th scope="col">Edit</th>
                                                        <th scope="col">Delete</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr dir-paginate="s in color.sizes|itemsPerPage:4" pagination-id="3">
                                                        <td>@{{$index_color+1}}</td>
                                                        <td>@{{s.size_name}}</td>
                                                        <td>@{{s.quantity}}</td>
                                                        <td>@{{s.status}}</td>
                                                        <td><button class="btn btn-info" ng-click="show_size_modal(s.id)">&nbsp;Edit</button></td>
                                                        <td><button class="btn btn-danger" ng-click="deletesizeClick(s.id)">&nbsp;Delete</button></td>
                                                        </tr>
                                                    </tbody>
                                                    </table>
                                                    <dir-pagination-controls
                                                        pagination-id="3"
                                                        max-size="4"
                                                        direction-links="true"
                                                        boundary-links="true" >
                                                    </dir-pagination-controls>
                                                </div><!-- /.container-fluid -->
                                            </section>
                                            <!-- End Product size content -->
                                        </div>
                                        <!-- End Product size main -->
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" onclick=" $('#modelcolorupdate').modal('hide');">Close</button>
                                        <button type="button" class="btn btn-primary" ng-click="updatecolor()">Save changes</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Product color update modal -->
                            <!-- Product color add modal -->
                            <div class="modal fade " id="modelcolorcreate" tabindex="-2" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">@{{colormodal_title}}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="$('#modelcolorcreate').modal('hide');">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="container-fluid row">
                                                <div class="form-group col-sm-6">
                                                    <label>Color Name:</label>
                                                    <div>
                                                        <input type="text" class="form-control" ng-model="color.color_name">
                                                    </div>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                <label>Hexcode:</label>
                                                    <div>
                                                        <input type="text" class="form-control" ng-model="color.hex">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="container-fluid">
                                                <div class="form-group">
                                                    <label>Avatar: </label>
                                                    <div>
                                                        <input type="file" class="form-control" id="avatar-color-add-input" ng-model="color.avatar">
                                                    </div>
                                                    <div style="margin: 10px 0px 10px 0px;">
                                                        <img src="" id="avatar-color-add" style="width: 60px">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="container-fluid">
                                                <div class="form-group">
                                                    <label>Image: </label>
                                                    <div>
                                                        <input type="file" class="form-control" id="image-color-add-input" ng-model="color.images">
                                                    </div>
                                                    <div style="margin: 10px 0px 10px 0px;">
                                                        <img src="" id="image-color-add" style="width: 60px">
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" onclick="$('#modelcolorcreate').modal('hide');">Close</button>
                                        <button type="button" class="btn btn-primary" ng-click="addcolor()">Save changes</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Product color add modal -->
                        </div>
                        <!-- Product color content -->
                        <section class="content" style="position: relative;">
                            <div class="container-fluid">
                            <table class="table">
                                <thead>
                                    <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Color Name</th>
                                    <th scope="col">Avatar</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Hex Code</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr dir-paginate="c in product.color|itemsPerPage:4" pagination-id="2">
                                    <td>@{{$index_color+1}}</td>
                                    <td>@{{c.color_name}}</td>
                                    <td><img style="width: 60px;" src="/upload/product/@{{product.id}}/@{{c.avatar}}" alt=""></td>
                                    <td><img style="width: 60px;" src="/upload/product/@{{product.id}}/@{{c.images}}" alt=""></td>
                                    <td>@{{c.hex}}</td>
                                    <td><button class="btn btn-info" ng-click="show_color_modal(c.id)">&nbsp;Edit</button></td>
                                    <td><button class="btn btn-danger" ng-click="deletecolorClick(c.id)">&nbsp;Delete</button></td>
                                    </tr>
                                </tbody>
                                </table>
                                <dir-pagination-controls
                                    pagination-id="2"
                                    max-size="4"
                                    direction-links="true"
                                    boundary-links="true" style="position: absolute;bottom: 0px;right: 0;">
                                </dir-pagination-controls>
                            </div><!-- /.container-fluid -->
                        </section>
                        <!-- Product color content -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="$('#modelupdate').modal('hide');">Close</button>
                    <button type="button" class="btn btn-primary" ng-click="saveData()">Save</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modelcreate" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">@{{modalTitle}}</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid row">
                            <div class="form-group col-sm-6">
                                <lab    el for="category">Category: </label>
                                <select class="custom-select" name="category" id="category" ng-model="product.sub_category_id">
                                    <option ng-repeat="option in sub_categories" value="@{{option.id}}">@{{option.sub_category_name}}</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="brand">Brand: </label>
                                <select class="custom-select" name="brand" id="brand" ng-model="product.brand_id">
                                    <option ng-repeat="option in brands" value="@{{option.id}}">@{{option.brand_name}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="container-fluid row">
                            <div class="form-group col-sm-6">
                                <label>Product Code:</label>
                                <div>
                                    <input type="text" class="form-control" ng-model="product.product_code">
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="Supplier">Supplier: </label>
                                <select class="custom-select" name="Supplier" id="Supplier" ng-model="product.supplier_id">
                                    <option ng-repeat="option in suppliers" value="@{{option.id}}">@{{option.supplier_name}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="container-fluid row">
                            <div class="form-group col-sm-6">
                                <label>Product Name:</label>
                                <div>
                                    <input type="text" class="form-control" ng-model="product.product_name">
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Origin:</label>
                                <div>
                                    <input type="text" class="form-control" ng-model="product.origin">
                                </div>
                            </div>
                        </div>
                        <div class="container-fluid row">
                            <div class="form-group col-sm-6">
                                <label>Material:</label>
                                <div>
                                    <input type="text" class="form-control" ng-model="product.material">
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Style:</label>
                                <div>
                                    <input type="text" class="form-control" ng-model="product.style">
                                </div>
                            </div>
                        </div>
                        <div class="container-fluid row">
                            <div class="form-group col-sm-6">
                                <!-- <label for="brand">Gender: </label>
                                <select class="custom-select" name="gender" id="gender" ng-model="product.gender">
                                    <option value="0">Tất cả</option>   
                                    <option value="1">Nam</option>
                                    <option value="2">Nữ</option>
                                </select> -->
                                <label>Price:</label>
                                <div>
                                    <input type="text" class="form-control" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" ng-model="product.price.price">
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Size table:</label>
                                <div>
                                    <input type="file" id="size-table-create-input" class="form-control" ng-model="product.size_table">
                                </div>
                                <div style="margin: 10px 0px 10px 0px;">
                                    <img src="" id="size-table-create" style="width: 60px">
                                </div>
                            </div>
                        </div>
                        <div class="container-fluid row">
                            <div class="form-group">
                                <label>Description:</label>
                                <div>
                                    <textarea id="description-editor-create" style="min-height: 90px;" type="text" class="form-control" ng-model="product.description"></textarea>
                                    <!-- <textarea id="description_editor_create" style="min-height: 300px;" ng-model="product.description" placeholder="Mô tả">
                                        {{csrf_field()}}
                                    </textarea> -->
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="$('#modelcreate').modal('hide');">Close</button>
                    <button type="button" class="btn btn-primary" ng-click="addproduct()">Save</button>
                </div>
            </div>
        </div>
    </div>
  </div>
@stop
@section('js')
<script src="/assets/admin/dist/js/productcontroller.js"></script>
@stop

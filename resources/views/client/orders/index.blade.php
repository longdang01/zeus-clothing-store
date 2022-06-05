@extends('client.shared.layout')
@section('content')

<section class="orders" ng-controller="OrdersController">
    <div class="container">
        <div class="orders__wrap">
            <nav aria-label="breadcrumb">
                <div class="breadcrumb__wrap">
                    <p>Đơn hàng</p>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
                        <li class="breadcrumb-item active"><a href="#">Đơn hàng</a></li>
                    </ol>
                </div>
            </nav>

            <div class="orders__wrap-main" style="margin-top: 4rem">
                <div class="unit__body">
                    <ul class="nav nav-pills">
                        <li class="nav-item">
                            <a href="#ordersStatus1" class="nav-link active" 
                            data-bs-toggle="tab">Đơn hàng chưa xác nhận</a>
                        </li>
                        <li class="nav-item">
                            <a href="#ordersStatus2" class="nav-link" 
                            data-bs-toggle="tab">Đơn hàng chờ lấy hàng</a>
                        </li>
                        <li class="nav-item">
                            <a href="#ordersStatus3" class="nav-link" 
                            data-bs-toggle="tab">Đơn hàng đang giao</a>
                        </li>
                        <li class="nav-item">
                            <a href="#ordersStatus4" class="nav-link" 
                            data-bs-toggle="tab">Đơn hàng đã giao</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="ordersStatus1">
                            <div class="unit__main orders__wrap-main-body">
                                <div class="orders__wrap-main-body-item">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>Thời gian đặt</th>
                                                <th>Địa chỉ nhận</th>
                                                <th>Thành tiền (VNĐ)</th>
                                                <th>Lựa chọn</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr ng-repeat="orders in orders1 track by $index">
                                                <td>
                                                    @{{ $index + 1}}
                                                </td>
                                                <td>
                                                    @{{ orders.order_date.slice(0, 10) }}
                                                </td>
                                                <td>
                                                    @{{ orders.delivery_address }}
                                                </td>
                                                <td>
                                                    @{{ orders.total | currency:"":0 }}
                                                </td>
                                                <td>
                                                    <div>
                                                        <a href="javascript:void(0)"
                                                        ng-click="goDetail(orders)"
                                                        data-bs-toggle="modal" data-bs-target="#ordersDetailModal" 
                                                        data-bs-toggle="tooltip"
                                                        data-bs-placement="top"
                                                        title="Xem chi tiết đơn"
                                                        style="font-size: 1.6rem; margin-right: 2.5em">
                                                            <i class="ti-eye"></i>
                                                        </a>
                                                        <a href="javascript:void(0)" 
                                                        ng-click="remove($event, orders)"
                                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Hủy đơn" style="font-size: 1.6rem; margin-right: 2.5rem">  
                                                            <i class="ti-close"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            
                                        </tbody>
                                    </table>
                                </div>
                                
                            </div>
                        </div>
                        <div class="tab-pane fade" id="ordersStatus2">
                            <div class="unit__main orders__wrap-main-body">
                                    <div class="orders__wrap-main-body-item">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>STT</th>
                                                    <th>Thời gian đặt</th>
                                                    <th>Địa chỉ nhận</th>
                                                    <th>Thành tiền (VNĐ)</th>
                                                    <th>Lựa chọn</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr ng-repeat="orders in orders2 track by $index">
                                                    <td>
                                                        @{{ $index + 1}}
                                                    </td>
                                                    <td>
                                                        @{{ orders.order_date.slice(0, 10) }}
                                                    </td>
                                                    <td>
                                                        @{{ orders.delivery_address }}
                                                    </td>
                                                    <td>
                                                        @{{ orders.total | currency:"":0 }}
                                                    </td>
                                                    <td>
                                                        <div>
                                                            <a href="javascript:void(0)"
                                                            ng-click="goDetail(orders)"
                                                            data-bs-toggle="modal" data-bs-target="#ordersDetailModal" 
                                                            data-bs-toggle="tooltip"
                                                            data-bs-placement="top"
                                                            title="Xem chi tiết đơn"
                                                            style="font-size: 1.6rem; margin-right: 2.5em">
                                                                <i class="ti-eye"></i>
                                                            </a>
                                                            <a href="javascript:void(0)" 
                                                            ng-click="remove($event, orders)"
                                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Hủy đơn" style="font-size: 1.6rem; margin-right: 2.5rem">  
                                                                <i class="ti-close"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                </div>
                            </div>
                        <div class="tab-pane fade" id="ordersStatus3">
                            <div class="unit__main orders__wrap-main-body">
                                    <div class="orders__wrap-main-body-item">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>STT</th>
                                                    <th>Thời gian đặt</th>
                                                    <th>Địa chỉ nhận</th>
                                                    <th>Thành tiền (VNĐ)</th>
                                                    <th>Lựa chọn</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr ng-repeat="orders in orders3 track by $index">
                                                    <td>
                                                        @{{ $index + 1}}
                                                    </td>
                                                    <td>
                                                        @{{ orders.order_date.slice(0, 10) }}
                                                    </td>
                                                    <td>
                                                        @{{ orders.delivery_address }}
                                                    </td>
                                                    <td>
                                                        @{{ orders.total | currency:"":0 }}
                                                    </td>
                                                    <td>
                                                        <div>
                                                            <a href="javascript:void(0)"
                                                            ng-click="goDetail(orders)"
                                                            data-bs-toggle="modal" data-bs-target="#ordersDetailModal" 
                                                            data-bs-toggle="tooltip"
                                                            data-bs-placement="top"
                                                            title="Xem chi tiết đơn"
                                                            style="font-size: 1.6rem; margin-right: 2.5em">
                                                                <i class="ti-eye"></i>
                                                            </a>
                                                            <!-- <a href="javascript:void(0)" 
                                                            ng-click="remove($event, orders)"
                                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Hủy đơn" style="font-size: 1.6rem; margin-right: 2.5rem">  
                                                                <i class="ti-close"></i>
                                                            </a> -->
                                                        </div>
                                                    </td>
                                                </tr>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                </div>
                            </div>
                        <div class="tab-pane fade" id="ordersStatus4">
                        <div class="unit__main orders__wrap-main-body">
                                <div class="orders__wrap-main-body-item">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>Thời gian đặt</th>
                                                <th>Địa chỉ nhận</th>
                                                <th>Thành tiền (VNĐ)</th>
                                                <th>Lựa chọn</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr ng-repeat="orders in orders4 track by $index">
                                                <td>
                                                    @{{ $index + 1}}
                                                </td>
                                                <td>
                                                    @{{ orders.order_date.slice(0, 10) }}
                                                </td>
                                                <td>
                                                    @{{ orders.delivery_address }}
                                                </td>
                                                <td>
                                                    @{{ orders.total | currency:"":0 }}
                                                </td>
                                                <td>
                                                    <div>
                                                        <a href="javascript:void(0)"
                                                        ng-click="goDetail(orders)"
                                                        data-bs-toggle="modal" data-bs-target="#ordersDetailModal" 
                                                        data-bs-toggle="tooltip"
                                                        data-bs-placement="top"
                                                        title="Xem chi tiết đơn"
                                                        style="font-size: 1.6rem; margin-right: 2.5em">
                                                            <i class="ti-eye"></i>
                                                        </a>
                                                        <!-- <a href="javascript:void(0)" 
                                                        ng-click="remove($event, orders)"
                                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Hủy đơn" style="font-size: 1.6rem; margin-right: 2.5rem">  
                                                            <i class="ti-close"></i>
                                                        </a> -->
                                                    </div>
                                                </td>
                                            </tr>
                                            
                                        </tbody>
                                    </table>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

</section>

@stop
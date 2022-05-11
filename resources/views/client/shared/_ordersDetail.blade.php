<div class="orders__detail-wrap" ng-controller="OrdersController">
    <!-- Modal -->
    <div class="modal fade" id="ordersDetailModal">
        <div class="modal-dialog modal-dialog-scrollable modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header" style="padding: 2rem 5rem;">
                    <h5 class="modal-title" id="exampleModalLabel">Chi tiết đơn hàng</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="padding: 2rem 5rem;">
                    <div class="row mb-5">
                        <div class="col-lg-3 col-md-3 col-sm-3 px-3">
                            <div class="mb-3">
                                <label for="">Tên khách hàng: </label>
                                <span>@{{ ordersItem.customer.customer_name }}</span>
                            </div>
                            <div class="mb-3">
                                <label for="">Ngày đặt: </label>
                                <span>@{{ ordersItem.order_date.slice(0, 10) }}</span>
                            </div>
                            <div class="mb-3">
                                <label for="">Tổng tiền: </label>
                                <span>@{{ ordersItem.total | currency:"":0 }} VNĐ</span>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-9 px-3">
                            <div class="mb-3">
                                <label for="">Địa chỉ nhận: </label>
                                <span>@{{ ordersItem.delivery_address }}</span>
                            </div>
                            <div class="mb-3">
                                <label for="">Hình thức thanh toán: </label>
                                <span>@{{ ordersItem.payment.payment_type }}</span>
                            </div>
                            <div class="mb-3">
                                <label for="">Đơn vị giao hàng: </label>
                                <span>@{{ ordersItem.transport.transport_type }}/@{{ ordersItem.transport.fee | currency:"":0 }}VNĐ</span>
                            </div>
                        </div>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="text-align: left">Ảnh</th>
                                <th style="padding-left: 1rem">Tên</th>
                                <th>Loại</th>
                                <th>Đơn giá</th>
                                <th>Lượng</th>
                                <th>Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="item in ordersItem.orders_details">
                                <td style="text-align: left">
                                    <img ng-src="@{{ item.color.avatar }}"
                                    style="width: 50px; height: 50px; object-fit: cover"
                                    alt="">
                                </td>
                                <td style="padding-left: 1rem">
                                    <a href="#">@{{ item.product.product_name }}</a>
                                </td>
                                <td>
                                    @{{ item.color.color_name }}/@{{ item.size.size_name }}
                                </td>
                                <td>@{{ item.price | currency:"":0 }}</td>
                                <td>@{{ item.quantity }}</td>
                                <td>@{{ item.price * item.quantity | currency:"":0 }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
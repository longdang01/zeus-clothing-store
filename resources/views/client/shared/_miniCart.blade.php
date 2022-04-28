<div class="mini__cart active" ng-controller="CartController">
    <div class="modal fade show" id="miniCart">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <ul>
                            <li></li>
                            <li></li>
                            <li></li>
                        </ul>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div ng-repeat="product in carts" class="col-lg-12">
                            <div class="mini__cart-item">
                                <a href="#">
                                    <img ng-src="@{{ product.color.avatar }}" class="mini__cart-item-picture" />
                                </a>
                                <div class="mini__cart-item-info">
                                    <a href="#"></a>
                                    <p>Phân loại: 
                                        @{{ product.color.color_name }}/@{{ product.size.size_name }}/x@{{ product.quantity }}
                                    </p>
                                </div>
                                <a href="#" class="btn-delete">
                                    <i class="ti-trash"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <p>@{{ totalCart }} sản phẩm</p>
                    <div>
                        <button type="button" class="btn">Xem giỏ hàng</button>
                        <button type="button" class="btn">Thanh toán</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="/assets/client/dist/controllers/CartController.js"></script>

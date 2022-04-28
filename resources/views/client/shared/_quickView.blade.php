<div class="quickview__wrap" ng-controller="ProductController">
    <div class="modal fade show" id="quickView">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <ul>
                            <li></li>
                            <li></li>
                            <li></li>
                        </ul>
                    </h5>
                    <button type="button" 
                    class="btn-close"
                    data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="product__quickview-information-slide">
                                   
                                <div class="quickview__gallery-thumbs">
                                    <div ng-repeat="image in selectedColor.listImages track by $index">
                                        <img ng-src="@{{ image }}" class="show" alt="">
                                    </div>
                                </div>
                                
                                <div class="quickview__gallery">
                                    <div ng-repeat="image in selectedColor.listImages track by $index">
                                        <img ng-src="@{{ image }}" class="show" alt="">
                                    </div>
                                </div>     
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="quickview-content">
                                <h2>@{{ product.product_name }}</h2>
                                <p>
                                    Tình trạng:
                                    <span ng-class="selectedSize.quantity > 0 ? 'available' : 'sold'">
                                        @{{ selectedSize.quantity > 0 ? 'Còn ' + selectedSize.quantity + ' sản phẩm' : 'Hết hàng' }}
                                        
                                    </span>
                                </p>
                                <h3>@{{ product.price.price | currency:"":0}} VNĐ</h3>
                                <div class="quickview-paragraph">
                                    <p>
                                        @{{ product.description }}
                                    </p>
                                </div>
                                <div class="quickview-options">
                                    <div class="row mb-5">
                                        <div class="col-lg-6">
                                            <h5 class="title" >Màu sắc</h5>
                                            <div class="d-flex align-items-center">
                                                <div class="dropdown quickview__option-select">
                                                    <button class="btn btn-secondary dropdown-toggle"
                                                        type="button"
                                                        id="dropdownSelectColor" 
                                                        data-bs-toggle="dropdown">
                                                        @{{ selectedColor.color_name }}
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li ng-repeat="color in product.color track by $index">
                                                            <a 
                                                            ng-click="changeColor(color, $index)"
                                                            ng-class="color.id == selectedColor.id ? 'selected' : ''"
                                                            class="dropdown-item" href="#">
                                                                @{{ color.color_name }}
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div ng-style="{ 'background': selectedColor.hex }" class="quickview-options-color ms-3"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <h5 class="title">Size</h5>
                                            <div class="dropdown quickview__option-select">
                                                <button class="btn btn-secondary dropdown-toggle"
                                                    type="button"
                                                    id="dropdownSelectSize" 
                                                    data-bs-toggle="dropdown">
                                                    @{{ selectedSize.size_name }}
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li ng-repeat="size in product.size | filter: filterSize">
                                                        <a 
                                                        ng-click="changeSize(size, $index)"
                                                        ng-class="size.id == selectedSize.id ? 'selected' : ''"
                                                        class="dropdown-item" href="#">
                                                            @{{ size.size_name }}
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <h5 class="title">Số lượng</h5>

                                            <div class="d-flex align-items-center product__quantity">
                                                <input ng-click="handlingAmount($event, 0)" type="text" class="product__quantity-item btn-sub" value="-" readonly>
                                                <input type="text" class="product__quantity-item product__quantity-value" value="1" readonly>
                                                <input ng-click="handlingAmount($event, 1)" type="text" class="product__quantity-item btn-plus" value="+" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="add-to-cart">
                                    <a href="#" data-dismiss="modal" data-toggle="modal" ng-click="addToCart(product)"
                                     class="btn">Thêm vào giỏ hàng</a>
                                    <a href="#" class="btn min"><i class="ti-heart"></i></a>
                                    <a href="#" class="btn min"><i class="fa fa-compress"></i></a>
                                </div>
                                    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="/assets/client/dist/controllers/ProductController.js"></script>

@extends('client.shared.layout')
@section('content')

<section ng-app="App" ng-controller="ProductController" class="product__list">
    <div class="container">
        <div class="product__list-wrap">
            <nav aria-label="breadcrumb">
                <div class="breadcrumb__wrap">
                    <p>Cửa hàng</p>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
                        <li class="breadcrumb-item active"><a href="#">Cửa hàng</a></li>
                    </ol>
                </div>
            </nav>

            <div class="product__list-wrap-main">
                <div class="product__list-wrap-main-header">
                    <p>Hiển thị @{{ pageSize }} / @{{ products.length }} sản phẩm</p>
                    <div>
                        <div>
                            <label style="min-width: 90px" for="">Sắp xếp theo: </label>

                            <select 
                                class="main__header-option-select form-select"
                                style="height: 48px; font-size: 1.4rem; padding-right: 4.5rem; margin-left: 1rem"
                                name="sort"  
                                ng-change="sortBy()" ng-model="valueSort">
                                <option value="" selected>Mặc định</option>
                                <option value="price.price|Ascending">Giá tăng dần</option>
                                <option value="price.price|Descending">Giá giảm dần</option>
                            </select>
                        </div>
                        <div>
                            <select 
                            style="height: 48px; font-size: 1.4rem; padding-right: 4.5rem; margin-left: 1rem"
                            class="main__header-option-select main__header-option-select--display form-select"
                            ng-model="pageSize" ng-init="pageSize='9'"
                            >
                                <option value="9" selected>9</option>
                                <option value="15">15</option>
                                <option value="25">25</option>
                                <option value="30">30</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row product__list-wrap-main-body">
                    <div class="col-lg-3">
                        <div class="left__item">
                            <div class="left__item-header">
                                <span>Danh mục</span>    

                                <a data-bs-toggle="collapse" 
                                href="#collapseGroupCategory" role="button" 
                                aria-expanded="false" 
                                aria-controls="collapseGroupCategory">
                                    <i class="ti-plus"></i>
                                </a>
                            </div>
                            <div class="left__item-body collapse" id="collapseGroupCategory">
                                <div class="accordion accordion-flush" id="accordionFlushExample1">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="flush-headingOne">
                                            <div>
                                                <a
                                                href="#"
                                                class="accordion-button collapsed collapsed-disabled" 
                                                type="button" 
                                                data-bs-toggle="collapse" 
                                                data-bs-target="#flush-collapseNewArrival" aria-expanded="false" 
                                                aria-controls="flush-collapseNewArrival">
                                                    New arrival
                                                </a>
                                            </div>
                                        </h2>
                                        <div id="flush-collapseNewArrival" class="accordion-collapse collapse" 
                                        aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample1">
                                            <div class="accordion-body p-0">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="flush-headingOne">
                                            <div>
                                                <a
                                                href="#"
                                                class="accordion-button collapsed collapsed-disabled" 
                                                type="button" 
                                                data-bs-toggle="collapse" 
                                                data-bs-target="#flush-collapseBestSeller" aria-expanded="false" 
                                                aria-controls="flush-collapseBestSeller">
                                                    Best Seller
                                                </a>
                                            </div>
                                        </h2>
                                        <div id="flush-collapseBestSeller" class="accordion-collapse collapse" 
                                        aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample1">
                                            <div class="accordion-body p-0">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="flush-headingOne">
                                            <div>
                                                <a
                                                href="#"
                                                class="accordion-button collapsed collapsed-disabled" 
                                                type="button" 
                                                data-bs-toggle="collapse" 
                                                data-bs-target="#flush-collapseSale" aria-expanded="false" 
                                                aria-controls="flush-collapseSale">
                                                    Sale
                                                </a>
                                            </div>
                                        </h2>
                                        <div id="flush-collapseSale" class="accordion-collapse collapse" 
                                        aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample1">
                                            <div class="accordion-body p-0">
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="left__item">
                            <div class="left__item-header">
                                <span>Phân loại</span>    

                                <a data-bs-toggle="collapse" 
                                href="#collapseCategory" role="button" 
                                aria-expanded="false" 
                                aria-controls="collapseCategory">
                                    <i class="ti-plus"></i>
                                </a>
                            </div>
                            <div class="left__item-body collapse show" id="collapseCategory">
                                <div class="accordion accordion-flush" id="accordionFlushExample2">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="flush-headingOne">
                                            <div>
                                                <a
                                                href="#"
                                                class="accordion-button collapsed collapsed-disabled" 
                                                type="button" 
                                                ng-click="search(4, all)"
                                                data-bs-toggle="collapse" 
                                                data-bs-target="#flush-collapseAll" aria-expanded="false" 
                                                aria-controls="flush-collapseAll">
                                                    Tất cả sản phẩm
                                                </a>
                                            </div>
                                        </h2>
                                        <div id="flush-collapseAll" class="accordion-collapse collapse" 
                                        aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample2">
                                            <div class="accordion-body p-0">
                                            </div>
                                        </div>
                                    </div>
                                    <div ng-repeat="category in categories" class="accordion-item">
                                        <h2 class="accordion-header" id="flush-headingTwo">
                                            <div style="display: flex; align-items: center; justify-content: space-between">
                                                <a 
                                                ng-click="search(1, category)"
                                                href="javascript:void(0)"
                                                style="display: inline-block; font-size: 1.4rem; color: black; flex: 2" >
                                                @{{ category.category_name }}</a>
                                                <button 
                                                style="width: auto"
                                                class="accordion-button collapsed" 
                                                type="button" 
                                                data-bs-toggle="collapse" 
                                                data-bs-target="#collapseCategory@{{ category.id }}" aria-expanded="false" 
                                                aria-controls="flush-collapse">
                                                    
                                                </button>
                                            </div>
                                        </h2>
                                        <div id="collapseCategory@{{ category.id }}" class="accordion-collapse collapse"
                                         aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample2">
                                            <div class="accordion-body">
                                                <nav class="nav flex-column">
                                                    <a 
                                                    ng-repeat="subcategory in category.sub_category" 
                                                    ng-click="search(2, subcategory)"
                                                    href="#"
                                                    data-bs-toggle="tab" 
                                                    class="nav-link" aria-current="page" >
                                                    @{{ subcategory.sub_category_name }}
                                                    </a>
                                                </nav>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="accordion-item">
                                        <h2 class="accordion-header" id="flush-headingThree">
                                            <div>
                                                <button class="accordion-button collapsed" 
                                                type="button" 
                                                data-bs-toggle="collapse" 
                                                data-bs-target="#flush-collapseWoman" aria-expanded="false" 
                                                aria-controls="flush-collapseThree">
                                                    Quần
                                                </button>
                                            </div>
                                        </h2>
                                        <div id="flush-collapseWoman" class="accordion-collapse collapse" 
                                        aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample2">
                                            <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the third item's accordion body. Nothing more exciting happening here in terms of content, but just filling up the space to make it look, at least at first glance, a bit more representative of how this would look in a real-world application.</div>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="row">

                            <div dir-paginate="product in products |
                            orderBy:sortColumn:reverse | itemsPerPage:pageSize | filter: keySearch"
                            current-page="currentPage"
                            class="col-lg-4">
                                <div class="product__wrap">
                                    <div class="product__wrap-img">
                                        <a href="#">
                                            <img ng-src="@{{ product.color[0].avatar }}"
                                            class="product__img">
                                        </a>
        
                                        <div class="product__options-wrap">
                                            <div class="product__options">
                                                <a 
                                                href="javascript:void(0)"
                                                class="product__options-add-to-cart">
                                                    Thêm vào giỏ hàng
                                                    <i class="fa-solid fa-arrow-right"></i>
                                                </a>
                                                <div class="product__options-child">
                                                    <a href="#" 
                                                    ng-click="goQuickView(product)"
                                                    class="btn-quick-view" data-bs-toggle="modal"
                                                    data-bs-target="#quickView"><i class="ti-eye"></i></a>
                                                    <a href="#" class="btn-add-favorites"><i class="ti-heart"></i></a>
                                                    <a href="#" class="btn-add-compare"><i class="ti-location-arrow"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="product__wrap-info">
                                        <a 
                                        ng-click="goDetail(product)"
                                        href='@{{ url }}' class="product__name">
                                            @{{ product.product_name }}
                                        </a>
                                        <span class="product__price">@{{ product.price.price | currency:"":0}} VNĐ</span>
                                    </div>
                                </div>
                            </div>

                           
                        </div>
                        <div class="d-flex justify-content-end">
                            <dir-pagination-controls 
                                max-size="10" 
                                direction-links="true"
                                boundary-links="true"
                                >
                            </dir-pagination-controls>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- <script src="/assets/client/dist/controllers/ProductController.js"></script> -->

@stop
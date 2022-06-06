<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zeus - Thương hiệu top đầu xu thế thời trang</title>

    <!-- Font: Open sans -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="/assets/client/dist/libs/bootstrap/css/bootstrap.min.css">
    <!-- Jquery plugins: Nice select -->
    <link rel="stylesheet" href="/assets/client/dist/libs/jquery/plugins/jquery-nice-select/css/nice-select.css">
    <!-- Owl carousel -->
    <link rel="stylesheet" href="/assets/client/dist/libs/owl-carousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/assets/client/dist/libs/owl-carousel/css/owl.theme.default.css">
    <!-- Slick carousel -->
    <link rel="stylesheet" href="/assets/client/dist/libs/slick/css/slick.css"/>
    <link rel="stylesheet" href="/assets/client/dist/libs/slick/css/slick-theme.css"/>
    <!-- Flex slider -->
    <link rel="stylesheet" href="/assets/client/dist/libs/flex-slider/css/flexslider.css"/>
    <!-- Icons: Fontawesome, themify -->
    <link rel="stylesheet" href="/assets/client/dist/libs/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="/assets/client/dist/libs/fontawesome/css/all.min.css">
    <!-- Animate -->
    <link rel="stylesheet" href="/assets/client/dist/libs/animate/animate.min.css">
    <!-- Fancy box -->
    <link rel="stylesheet" href="/assets/client/dist/libs/fancybox/css/jquery.fancybox.min.css">
    <!-- Style -->
    <link rel="stylesheet" href="/assets/client/dist/css/style.css">

    <!-- Angular, Pagination -->
    <script src="/assets/client/dist/libs/angularJs/angular.min.js"></script>
    <script src="/assets/client/dist/libs/pagination/dirPagination.js"></script>
    <script src="/assets/client/dist/controllers/AppController.js"></script>

</head>
<body ng-app="App">
    <div class="app">

        <!-- Preloader -->
        <div class="preloader">
            <div class="preloader-inner">
                <div class="preloader-icon">
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
        <!-- End Preloader -->
        
        <!-- [Header] -->
        @include('client.shared._header')

        <!-- [Content] -->
        <main>
        @yield('content')
        </main>  

        <!-- [Footer] -->
        @include('client.shared._footer')
        
        <!-- [Mini cart] -->
        @include('client.shared._miniCart')

        <!-- [Quick view] -->
        @include('client.shared._quickView')

        <!-- [Orders Detail] -->
        @include('client.shared._ordersDetail')
    </div>


    
    <!-- Jquery -->
    <script src="/assets/client/dist/libs/jquery/jquery-3.6.0.min.js"></script>
    <!-- Jquery: Jquery migrate, Jquery ui -->
    <script src="/assets/client/dist/libs/jquery/plugins/jquery-migrate/jquery-migrate.min.js"></script>
    <script src="/assets/client/dist/libs/jquery/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Jquery plugins: Nice select -->
    <script src="/assets/client/dist/libs/jquery/plugins/jquery-nice-select/js/jquery.nice-select.min.js"></script>
    <!-- Bootstrap: popper, bootstrap v5 -->
    <script src="/assets/client/dist/libs/bootstrap/js/popper.min.js"></script>
    <script src="/assets/client/dist/libs/bootstrap/js/bootstrap.min.js"></script>
    <!-- Owl carousel -->
    <script src="/assets/client/dist/libs/owl-carousel/js/owl.carousel.min.js"></script>
    <!-- Slick carousel -->
    <script src="/assets/client/dist/libs/slick/js/slick.min.js"></script>
    <!-- Fancy box -->
    <script src="/assets/client/dist/libs/fancybox/js/jquery.fancybox.min.js"></script>
    <!-- Flex slider -->
    <script src="/assets/client/dist/libs/flex-slider/js/jquery.flexslider.js"></script>
    <!-- Scroll up -->
    <script src="/assets/client/dist/libs/scrollUp/jquery.scrollUp.min.js"></script>
    <script src="/assets/client/dist/libs/scrollUp/jquery.easing.js"></script>
    <!-- App.js -->
    <script src="/assets/client/dist/js/app.js"></script>

    <script src="/assets/client/dist/controllers/ProductController.js"></script>
    <script src="/assets/client/dist/controllers/DetailController.js"></script>
    <script src="/assets/client/dist/controllers/CustomerController.js"></script>
    <script src="/assets/client/dist/controllers/CartController.js"></script>
    <script src="/assets/client/dist/controllers/CheckoutController.js"></script>
    <script src="/assets/client/dist/controllers/OrdersController.js"></script>
    <script src="/assets/client/dist/controllers/HomeController.js"></script>
</body>
</html>
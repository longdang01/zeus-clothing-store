
app.controller('news', function($scope, $http) { //tao 1 controller
    $http({
        method: "GET",
        url: "http://localhost:8000/api/news"
    }).then(function(response) {
        $scope.list_news= response.data;
    });
    $scope.showmodal = function(id) {;
        $http({
            method: "GET",
            url: "http://localhost:8000/api/category"
        }).then(function(response) {
            $scope.categories= response.data;
        });
        $scope.id = id;
        if (id == 0) {
            $scope.news = null;
            $scope.modalTitle = "Add new product sub category";
        } else {
            $scope.modalTitle = "Edit product sub category";     
            $http({
                method: "GET",
                url: "http://localhost:8000/api/news/" + id
            }).then(function(response) {
                $scope.news = response.data;
                $scope.news.category_id = $scope.news.category_id + "";
            });
        }
        $('#modelId').modal('show');
    }
    $scope.deleteClick = function(id) {
        var hoi = confirm("Ban co muon xoa that khong");
        if (hoi) {
            $http({
                method: "DELETE",
                url: "http://localhost:8000/api/news/" + id
            }).then(function(response) {
                $scope.list_news.pop(id);
            });
        }
    }
    $scope.saveData = function() {
        if ($scope.id == 0) { //dang them tin moi
            $http({
                method: "POST",
                url: "http://localhost:8000/api/news",
                data: $scope.news,
                "content-Type": "application/json"
            }).then(function(response) {
                $('#modelId').modal('hide');
                $scope.list_news.push(response.data);
            },function(e){
                alert("Thêm thất bại");
            });
        } else { //sua tin
            $http({
                method: "PUT",
                url: "http://localhost:8000/api/news/" + $scope.id,
                data: $scope.news,
                "content-Type": "application/json"
            }).then(function(response) {
                $('#modelId').modal('hide');
                var e = $scope.sub_categories.findIndex((obj => obj.id == $scope.id));
                $scope.list_news[e].category_id = $scope.news.category_id;
                $scope.list_news[e].news_name = $scope.news.news_name;
                $scope.list_news[e].description = $scope.news.description;
                
            },function(e){
                alert("Cập nhật thất bại");
            });
        }
    }
});
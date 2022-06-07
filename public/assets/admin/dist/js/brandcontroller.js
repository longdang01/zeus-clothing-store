
app.controller('brand', function($scope, $http) { //tao 1 controller
    $scope.pageSize = 5;
    $http({
        method: "GET",
        url: "http://localhost:8000/api/brand"
    }).then(function(response) {
        $scope.brands= response.data;
    });
    $scope.showmodal = function(id) {;
        $scope.id = id;
        if (id == 0) {
            $scope.brand = null;
            $scope.modalTitle = "Add new product brand";
        } else {
            $scope.modalTitle = "Edit product brand";     
            $http({
                method: "GET",
                url: "http://localhost:8000/api/brand/" + id
            }).then(function(response) {
                $scope.brand = response.data;
            });
        }
        $('#modelId').modal('show');
    }
    $scope.deleteClick = function(id) {
        var hoi = confirm("Ban co muon xoa that khong");
        if (hoi) {
            $http({
                method: "DELETE",
                url: "http://localhost:8000/api/brand/" + id
            }).then(function(response) {
                $scope.brands.pop(id);
            },function(e){
                alert(e);
            });
        }
    }
    $scope.saveData = function() {
        if ($scope.id == 0) { //dang them tin moi
            $http({
                method: "POST",
                url: "http://localhost:8000/api/brand",
                data: $scope.brand,
                "content-Type": "application/json"
            }).then(function(response) {
                $scope.brands.push(response.data);
            },function(e){
                alert(e);
            });
        } else { //sua tin
            $http({
                method: "PUT",
                url: "http://localhost:8000/api/brand/" + $scope.id,
                data: $scope.brand,
                "content-Type": "application/json"
            }).then(function(response) {
                var e = $scope.brands.findIndex((obj => obj.id == $scope.id));  
                $scope.brands[e].brand_name = $scope.brand.brand_name;
                $scope.brands[e].description = $scope.brand.description;
            },function(e){
                alert(e);
            });
        }
        $('#modelId').modal('hide');
    }
});
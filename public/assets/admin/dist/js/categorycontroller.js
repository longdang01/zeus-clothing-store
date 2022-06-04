
app.controller('category', function($scope, $http) { //tao 1 controller
    $http({
        method: "GET",
        url: "http://localhost:8000/api/category"
    }).then(function(response) {
        console.log(response.data);
        $scope.categories= response.data;
    });
    $scope.showmodal = function(id) {;
        $scope.id = id;
        if (id == 0) {
            $scope.category = null;
            $scope.modalTitle = "Add new product category";
        } else {
            $scope.modalTitle = "Edit product category";     
            $http({
                method: "GET",
                url: "http://localhost:8000/api/category/" + id
            }).then(function(response) {
                $scope.category = response.data;
            });
        }
        $('#modelId').modal('show');
    }
    $scope.deleteClick = function(id) {
        var hoi = confirm("Ban co muon xoa that khong");
        if (hoi) {
            $http({
                method: "DELETE",
                url: "http://localhost:8000/api/category/" + id
            }).then(function(response) {
                $scope.categories.pop(id);
            });
        }
    }
    $scope.saveData = function() {
        if ($scope.id == 0) { //dang them tin moi
            $http({
                method: "POST",
                url: "http://localhost:8000/api/category",
                data: $scope.category,
                "content-Type": "application/json"
            }).then(function(response) {
                $scope.categories.push(response.data);
            });
        } else { //sua tin
            $http({
                method: "PUT",
                url: "http://localhost:8000/api/category/" + $scope.id,
                data: $scope.category,
                "content-Type": "application/json"
            }).then(function(response) {
                var e = $scope.categories.findIndex((obj => obj.id == $scope.id));
                $scope.categories[e].category_name = $scope.category.category_name;
                $scope.categories[e].description = $scope.category.description;
            });
        }
        $('#modelId').modal('hide');
    }
});
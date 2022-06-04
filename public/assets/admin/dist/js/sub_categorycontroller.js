
app.controller('sub_category', function($scope, $http) { //tao 1 controller
    $http({
        method: "GET",
        url: "http://localhost:8000/api/sub_category"
    }).then(function(response) {
        $scope.sub_categories= response.data;
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
            $scope.sub_category = null;
            $scope.modalTitle = "Add new product sub category";
        } else {
            $scope.modalTitle = "Edit product sub category";     
            $http({
                method: "GET",
                url: "http://localhost:8000/api/sub_category/" + id
            }).then(function(response) {
                $scope.sub_category = response.data;
                $scope.sub_category.category_id = $scope.sub_category.category_id + "";
            });
        }
        $('#modelId').modal('show');
    }
    $scope.deleteClick = function(id) {
        var hoi = confirm("Ban co muon xoa that khong");
        if (hoi) {
            $http({
                method: "DELETE",
                url: "http://localhost:8000/api/sub_category/" + id
            }).then(function(response) {
                $scope.sub_categories.pop(id);
            });
        }
    }
    $scope.saveData = function() {
        if ($scope.id == 0) { //dang them tin moi
            $http({
                method: "POST",
                url: "http://localhost:8000/api/sub_category",
                data: $scope.sub_category,
                "content-Type": "application/json"
            }).then(function(response) {
                $('#modelId').modal('hide');
                $scope.sub_categories.push(response.data);
            },function(e){
                alert("Thêm thất bại");
            });
        } else { //sua tin
            $http({
                method: "PUT",
                url: "http://localhost:8000/api/sub_category/" + $scope.id,
                data: $scope.sub_category,
                "content-Type": "application/json"
            }).then(function(response) {
                $('#modelId').modal('hide');
                var e = $scope.sub_categories.findIndex((obj => obj.id == $scope.id));
                $scope.sub_categories[e].category_id = $scope.sub_category.category_id;
                $scope.sub_categories[e].sub_category_name = $scope.sub_category.sub_category_name;
                $scope.sub_categories[e].description = $scope.sub_category.description;
                
            },function(e){
                alert("Cập nhật thất bại");
            });
        }
    }
});
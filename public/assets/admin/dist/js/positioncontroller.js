
app.controller('position', function($scope, $http) { //tao 1 controller
    $http({
        method: "GET",
        url: "http://localhost:8000/api/position"
    }).then(function(response) {
        console.log(response.data);
        $scope.positions= response.data;
    });
    $scope.showmodal = function(id) {;
        $scope.id = id;
        if (id == 0) {
            $scope.position = null;
            $scope.modalTitle = "Add new position";
        } else {
            $scope.modalTitle = "Edit position";     
            $http({
                method: "GET",
                url: "http://localhost:8000/api/position/" + id
            }).then(function(response) {
                $scope.position = response.data;
            });
        }
        $('#modelId').modal('show');
    }
    $scope.deleteClick = function(id) {
        var hoi = confirm("Ban co muon xoa that khong");
        if (hoi) {
            $http({
                method: "DELETE",
                url: "http://localhost:8000/api/position/" + id
            }).then(function(response) {
                $scope.positions.pop(id);
            },function(e){
                alert(e);
            });
        }
    }
    $scope.saveData = function() {
        if ($scope.id == 0) { //dang them tin moi
            $http({
                method: "POST",
                url: "http://localhost:8000/api/position",
                data: $scope.position,
                "content-Type": "application/json"
            }).then(function(response) {
                $scope.positions.push(response.data);
            },function(e){
                alert(e);
            });
        } else { //sua tin
            $http({
                method: "PUT",
                url: "http://localhost:8000/api/position/" + $scope.id,
                data: $scope.position,
                "content-Type": "application/json"
            }).then(function(response) {
                var e = $scope.positions.findIndex((obj => obj.id == $scope.id));  
                $scope.positions[e].position_name = $scope.position.position_name;
                $scope.positions[e].description = $scope.position.description;
                $scope.positions[e].quantity = $scope.position.quantity;
            },function(e){
                alert(e);
            });
        }
        $('#modelId').modal('hide');
    }
});
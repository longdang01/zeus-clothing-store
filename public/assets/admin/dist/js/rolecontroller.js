
app.controller('role', function($scope, $http) { //tao 1 controller
    $http({
        method: "GET",
        url: "http://localhost:8000/api/role"
    }).then(function(response) {
        console.log(response.data);
        $scope.roles= response.data;
    });
    $scope.showmodal = function(id) {;
        $scope.id = id;
        if (id == 0) {
            $scope.role = null;
            $scope.modalTitle = "Add new role";
        } else {
            $scope.modalTitle = "Edit role";     
            $http({
                method: "GET",
                url: "http://localhost:8000/api/role/" + id
            }).then(function(response) {
                $scope.role = response.data;
            });
        }
        $('#modelId').modal('show');
    }
    $scope.deleteClick = function(id) {
        var hoi = confirm("Ban co muon xoa that khong");
        if (hoi) {
            $http({
                method: "DELETE",
                url: "http://localhost:8000/api/role/" + id
            }).then(function(response) {
                $scope.roles.pop(id);
            },function(e){
                alert(e);
            });
        }
    }
    $scope.saveData = function() {
        if ($scope.id == 0) { //dang them tin moi
            $http({
                method: "POST",
                url: "http://localhost:8000/api/role",
                data: $scope.role,
                "content-Type": "application/json"
            }).then(function(response) {
                $scope.roles.push(response.data);
            },function(e){
                alert(e);
            });
        } else { //sua tin
            $http({
                method: "PUT",
                url: "http://localhost:8000/api/role/" + $scope.id,
                data: $scope.role,
                "content-Type": "application/json"
            }).then(function(response) {
                var e = $scope.roles.findIndex((obj => obj.id == $scope.id));  
                $scope.roles[e].role_name = $scope.role.role_name;
                $scope.roles[e].description = $scope.role.description;
            },function(e){
                alert(e);
            });
        }
        $('#modelId').modal('hide');
    }
});
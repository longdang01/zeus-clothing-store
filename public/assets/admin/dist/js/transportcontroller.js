
app.controller('transport', function($scope, $http) { //tao 1 controller
    $http({
        method: "GET",
        url: "http://localhost:8000/api/transport"
    }).then(function(response) {
        console.log(response.data);
        $scope.transports= response.data;
    });
    $scope.showmodal = function(id) {;
        $scope.id = id;
        if (id == 0) {
            $scope.transport = null;
            $scope.modalTitle = "Add new transport";
        } else {
            $scope.modalTitle = "Edit transport";     
            $http({
                method: "GET",
                url: "http://localhost:8000/api/transport/" + id
            }).then(function(response) {
                $scope.transport = response.data;
                $scope.transport.status = $scope.transport.status + "";
            });
        }
        $('#modelId').modal('show');
    }
    $scope.deleteClick = function(id) {
        var hoi = confirm("Ban co muon xoa that khong");
        if (hoi) {
            $http({
                method: "DELETE",
                url: "http://localhost:8000/api/transport/" + id
            }).then(function(response) {
                $scope.transports.pop(id);
            },function(e){
                alert(e);
            });
        }
    }
    $scope.saveData = function() {
        if ($scope.id == 0) { //dang them tin moi
            $http({
                method: "POST",
                url: "http://localhost:8000/api/transport",
                data: $scope.transport,
                "content-Type": "application/json"
            }).then(function(response) {
                $scope.transports.push(response.data);
            },function(e){
                alert(e);
            });
        } else { //sua tin
            $http({
                method: "PUT",
                url: "http://localhost:8000/api/transport/" + $scope.id,
                data: $scope.transport,
                "content-Type": "application/json"
            }).then(function(response) {
                var e = $scope.transports.findIndex((obj => obj.id == $scope.id));  
                $scope.transports[e].transport_type = $scope.transport.transport_type;
                $scope.transports[e].description = $scope.transport.description;
                $scope.transports[e].fee = $scope.transport.fee;
                $scope.transports[e].status = $scope.transport.status;
            },function(e){
                alert(e);
            });
        }
        $('#modelId').modal('hide');
    }
});
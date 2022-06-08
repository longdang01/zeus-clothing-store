
app.controller('order', function($scope, $http) { //tao 1 controller
    $http({
        method: "GET",
        url: "http://localhost:8000/api/orderss"
    }).then(function(response) {
        $scope.orders= response.data;
        $scope.orders.forEach(function(e){
            e.status = e.status + '';
        })
        console.log($scope.orders);
    });
    $scope.close_status_modal = function(){
        $('#modelstatus').modal('hide');
    }
    $scope.showmodal = function(id) {;
        $scope.id = id;
        $http({
            method: "GET",
            url: "http://localhost:8000/api/ordersDetails/" + id
        }).then(function(response) {
            $scope.orders_detail = response.data;
        });
        $http({
            method: "GET",
            url: "http://localhost:8000/api/orders_status/" + id
        }).then(function(response) {
            $scope.orders_status = response.data;
        });
        if($scope.orders.find(e => e.id == $scope.id).status != 2){
            $('#btn-update-status').attr("hidden",true);
        }
        else{
            $('#btn-update-status').attr("hidden",false);
        }
        $('#modelId').modal('show');
    }
    $scope.showmodal_status = function() {
        $scope.status={
            'orders_id': $scope.id,
            'status_name': ''
        } 
        $('#modelstatus').modal('show');
    }
    $scope.status_changed = function(id,status) {
        $http({
            method: "PUT",
            url: "http://localhost:8000/api/orderss/" + id,
            data: {
                'status': status
            },
            "content-Type": "application/json"
        }).then(function(response) {
            $scope.message = response.data;
        });
        $scope.status={
            'orders_id': id,
            'status_name': ""
        } 
        switch(status) {
            case "1":
                $scope.status.status_name = "Đã hủy";
                break;
            case "2":
                $scope.status.status_name = "Chờ lấy hàng"
                break;
            case "3":
                $scope.status.status_name = "Đang chuyển hàng"
                break;
            case "4":
                $scope.status.status_name = "Giao hàng thành công"
                break;
        }
        $http({
            method: "POST",
            url: "http://localhost:8000/api/orders_status",
            data: $scope.status,
            "content-Type": "application/json"
        }).then(function(response) {
            alert("Cật nhật trạng thái thành công");
        },function(e){
            alert("Cật nhật trạng thái thất bại");
        });
    }
    $scope.savestatus = function() {

        $http({
            method: "POST",
            url: "http://localhost:8000/api/orders_status",
            data: $scope.status,
            "content-Type": "application/json"
        }).then(function(response) {
            $scope.orders_status[$scope.orders_status.findIndex((item => item.active == 1))].active = 0;
            $scope.status = response.data;
            $scope.orders_status.push($scope.status);
        });

    }
});
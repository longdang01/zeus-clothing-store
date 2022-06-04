
app.controller('payment', function($scope, $http) { //tao 1 controller
    $http({
        method: "GET",
        url: "http://localhost:8000/api/payment"
    }).then(function(response) {
        console.log(response.data);
        $scope.payments= response.data;
    });
    $scope.showmodal = function(id) {;
        $scope.id = id;
        if (id == 0) {
            $scope.payment = null;
            $scope.modalTitle = "Add new payment";
        } else {
            $scope.modalTitle = "Edit payment";     
            $http({
                method: "GET",
                url: "http://localhost:8000/api/payment/" + id
            }).then(function(response) {
                $scope.payment = response.data;
                $scope.payment.status = $scope.payment.status + "";
            });
        }
        $('#modelId').modal('show');
    }
    $scope.deleteClick = function(id) {
        var hoi = confirm("Ban co muon xoa that khong");
        if (hoi) {
            $http({
                method: "DELETE",
                url: "http://localhost:8000/api/payment/" + id
            }).then(function(response) {
                $scope.payments.pop(id);
            },function(e){
                alert(e);
            });
        }
    }
    $scope.saveData = function() {
        if ($scope.id == 0) { //dang them tin moi
            $http({
                method: "POST",
                url: "http://localhost:8000/api/payment",
                data: $scope.payment,
                "content-Type": "application/json"
            }).then(function(response) {
                $scope.payments.push(response.data);
            },function(e){
                alert(e);
            });
        } else { //sua tin
            $http({
                method: "PUT",
                url: "http://localhost:8000/api/payment/" + $scope.id,
                data: $scope.payment,
                "content-Type": "application/json"
            }).then(function(response) {
                var e = $scope.payments.findIndex((obj => obj.id == $scope.id));  
                $scope.payments[e].payment_type = $scope.payment.payment_type;
                $scope.payments[e].description = $scope.payment.description;
                $scope.payments[e].status = $scope.payment.status;
            },function(e){
                alert(e);
            });
        }
        $('#modelId').modal('hide');
    }
});
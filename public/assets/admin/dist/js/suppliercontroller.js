
app.controller('supplier', function($scope, $http) { //tao 1 controller
    $http({
        method: "GET",
        url: "http://localhost:8000/api/supplier"
    }).then(function(response) {
        console.log(response.data);
        $scope.suppliers= response.data;
    });
    $scope.showmodal = function(id) {;
        $scope.id = id;
        if (id == 0) {
            $scope.supplier = null;
            $scope.modalTitle = "Add new supplier";
        } else {
            $scope.modalTitle = "Edit supplier";     
            $http({
                method: "GET",
                url: "http://localhost:8000/api/supplier/" + id
            }).then(function(response) {
                $scope.supplier = response.data;
            });
        }
        $('#modelId').modal('show');       
    }
    $scope.deleteClick = function(id) {
        var hoi = confirm("Ban co muon xoa that khong");
        if (hoi) {
            $http({
                method: "DELETE",
                url: "http://localhost:8000/api/supplier/" + id
            }).then(function(response) {
                $scope.suppliers.pop(id);
            });
        }
    }
    $scope.saveData = function() {
        if ($scope.id == 0) { //dang them tin moi
            $http({
                method: "POST",
                url: "http://localhost:8000/api/supplier",
                data: $scope.supplier,
                "content-Type": "application/json"
            }).then(function(response) {
                $scope.suppliers.push($scope.supplier);
            });
            
        } else { //sua tin
            $http({
                method: "PUT",
                url: "http://localhost:8000/api/supplier/" + $scope.id,
                data: $scope.supplier,
                "content-Type": "application/json"
            }).then(function(response) {
                e = $scope.suppliers.findIndex((obj => obj.id == $scope.id));
                $scope.suppliers[e].supplier_name = $scope.supplier.supplier_name;
                $scope.suppliers[e].address = $scope.supplier.address;
                $scope.suppliers[e].phone = $scope.supplier.phone;
                $scope.suppliers[e].email = $scope.supplier.email;
                $scope.suppliers[e].description = $scope.supplier.description;
            });
        
        }
        $('#modelId').modal('hide');
    }
});
function onlyNumberKey(evt) {
          
    // Only ASCII character in that range allowed
    var ASCIICode = (evt.which) ? evt.which : evt.keyCode
    if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
        return false;
    return true;
}
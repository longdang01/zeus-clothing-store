
app.controller('customer', function($scope, $http) { //tao 1 controller
    $http({
        method: "GET",
        url: "http://localhost:8000/api/customer"
    }).then(function(response) {
        console.log(response.data);
        $scope.customers= response.data;
    });
    $scope.showmodal = function(id) {;
        $scope.id = id;
        if (id == 0) {
            $scope.customer = null;
            $scope.modalTitle = "Add new customer";
        } else {
            $scope.modalTitle = "Edit customer";     
            $http({
                method: "GET",
                url: "http://localhost:8000/api/customer/" + id
            }).then(function(response) {
                $scope.customer = response.data;
                $scope.customer.dob = new Date($scope.customer.dob);
                $('#avatar').attr("src","/upload/customer/" + $scope.customer.picture);
            });
        }
        $('#modelId').modal('show');
        
    }
    $scope.uploadFile = function(filedata, element) {
        var reader = new FileReader();
        reader.onload = function (ev) {
            $(element)
            .attr('src', ev.target.result)
            .css('width', '120px');
        };
        reader.readAsDataURL(filedata);
        $scope.image = filedata.name;
        //upload
        $scope.postData = new FormData();
        $scope.postData.append('file', filedata);
        $scope.postData.append('object', 'customer');
      }; 

    $('#avatar-input').change(function () {
        $img = $('#avatar-input')[0].value.split("\\");
        $('#avatar').attr("src","/upload/customer" + $img[$img.length-1]);
        $scope.uploadFile(this.files[0], '#avatar');
       });
    $scope.deleteClick = function(id) {
        var hoi = confirm("Ban co muon xoa that khong");
        if (hoi) {
            $http({
                method: "DELETE",
                url: "http://localhost:8000/api/customer/" + id
            }).then(function(response) {
                $scope.message = response.data;
                location.reload();
            });
        }
    }
    $scope.saveData = function() {
        $img = $('#avatar-input')[0].value.split("\\");
        $('#avatar').attr("src","/upload/customer/" + $img[$img.length-1])
        $scope.customer.picture = $img[$img.length-1];
        if ($scope.id == 0) { //dang them tin moi
            $http({
                method: "POST",
                url: "http://localhost:8000/api/customer",
                data: $scope.customer,
                "content-Type": "application/json"
            }).then(function(response) {
                $scope.message = response.data;
                console.log(response.data);
                location.reload();

            });
        } else { //sua tin
            $http({
                method: "PUT",
                url: "http://localhost:8000/api/customer/" + $scope.id,
                data: $scope.customer,
                "content-Type": "application/json"
            }).then(function(response) {
                $scope.message = response.data;
                console.log(response.data);
                location.reload();

            });
        }
        if($scope.postData != null){
            $scope.postData.append('id', $scope.customer.id);
            $.ajax({
                headers: { 'X-CSRF-Token': $('meta[name=csrf_token]').attr('content') },
                async: true,
                type: 'post',
                contentType: false,
                processData: false,
                url: "http://127.0.0.1:8000/api/" + 'upload',
                data: $scope.postData,
                success: function (res) {
                  console.log('success');
                  $scope.postData =null;
                },
                error: function (res) {
                  console.log('loi');
                },
              });  
        }
    }
});
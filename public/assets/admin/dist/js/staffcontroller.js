
app.controller('staff', function($scope, $http) { //tao 1 controller
    $http({
        method: "GET",
        url: "http://localhost:8000/api/staff"
    }).then(function(response) {
        console.log(response.data);
        $scope.staffs= response.data;
        $scope.staffs.forEach(function(e){
            e.position_id = e.position_id + '';
            e.role_id = e.role_id + '';
        })
    });
    $http({
        method: "GET",
        url: "http://localhost:8000/api/role"
    }).then(function(response) {
        $scope.roles= response.data;
    });
    $http({
        method: "GET",
        url: "http://localhost:8000/api/position"
    }).then(function(response) {
        $scope.positions= response.data;
    });
    $scope.showmodal = function(id) {;
        $scope.id = id;
        if (id == 0) {
            $scope.staff = null;
            $scope.modalTitle = "Add new staff";
            $('#username').attr('disabled',null);
            $('#avatar').attr('src',null);
            $('#avatar-input').val(null);
        } else {
            $scope.modalTitle = "Edit staff";     
            $http({
                method: "GET",
                url: "http://localhost:8000/api/staff/" + id
            }).then(function(response) {
                $scope.staff = response.data;
                $scope.staff.role_id = $scope.staff.role_id + "";
                $scope.staff.position_id = $scope.staff.position_id + "";
                console.log($scope.staff);
                $scope.staff.dob = new Date($scope.staff.dob);
                $('#avatar').attr('src','/upload/staff/'+$scope.staff.id+'/'+ $scope.staff.picture);
            });
            $('#username').attr('disabled','disabled');
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
        $scope.postData.append('object', 'staff');
      }; 
    $('#avatar-input').change(function () {
        $scope.uploadFile(this.files[0], '#avatar');
       });
    $scope.deleteClick = function(id) {
        var hoi = confirm("Ban co muon xoa that khong");
        if (hoi) {
            $http({
                method: "DELETE",
                url: "http://localhost:8000/api/staff/" + id
            }).then(function(response) {
                $scope.message = response.data;
                location.reload();
            });
        }
    }
    $scope.saveData = function() {
        $img = $('#avatar-input')[0].value.split("\\");
        $('#avatar').attr("src","/upload/staff/" + $img[$img.length-1])
        $scope.staff.picture = $img[$img.length-1];
        if ($scope.id == 0) { //dang them tin moi
            $http({
                method: "GET",
                url: "http://localhost:8000/api/user/" + $scope.staff.users.username,
                "content-Type": "application/json"
            }).then(function(response) {
                if(response.data == null)
                {
                    alert('Tài khoản đã tồn tại'); 
                    $('#username').focus();                   
                }
                else{
                    $http({
                        method: "POST",
                        url: "http://localhost:8000/api/user",
                        data: $scope.staff.users,
                        "content-Type": "application/json"
                    }).then(function(response) {
                        $scope.staff.users = response.data;
                        console.log($scope.staff.users);
                        $scope.staff.users_id = response.data.id;
                    });
                    // $http({
                    //     method: "POST",
                    //     url: "http://localhost:8000/api/staff",
                    //     data: $scope.staff,
                    //     "content-Type": "application/json"
                    // }).then(function(response) {
                    //     $scope.message = response.data;
                    //     console.log(response.data);
                    //     $scope.staffs.push($scope.staff);
                    //     if($scope.postData != null){
                    //         $scope.postData.append('id', $scope.staff.id);
                    //         $.ajax({
                    //             headers: { 'X-CSRF-Token': $('meta[name=csrf_token]').attr('content') },
                    //             async: true,
                    //             type: 'post',
                    //             contentType: false,
                    //             processData: false,
                    //             url: "http://127.0.0.1:8000/api/" + 'upload',
                    //             data: $scope.postData,
                    //             success: function (res) {
                    //               console.log('success');
                    //               $scope.postData = null;
                    //             },
                    //             error: function (res) {
                    //               console.log('loi');
                    //             },
                    //           });  
                    //     }
                    // });
                    $('#modelId').modal('hide');
                }
            });
            
        } else { //sua tin
            $avatar = $('#avatar-input')[0].value.split("\\");  
            $scope.staff.picture = $avatar[$avatar.length-1]==""?$scope.staff.picture:$avatar[$avatar.length-1];
            $http({
                method: "PUT",
                url: "http://localhost:8000/api/user/" + $scope.staff.users_id,
                data: $scope.staff.users,
                "content-Type": "application/json"
            }).then(function(response) {
                $scope.staff.users = response.data[0];
            });
            $http({
                method: "PUT",
                url: "http://localhost:8000/api/staff/" + $scope.id,
                data: $scope.staff,
                "content-Type": "application/json"
            }).then(function(response) {
                e = $scope.staffs.findIndex((obj => obj.id == $scope.id));
                $scope.staffs[e].position_id = $scope.staff.position_id;
                $scope.staffs[e].role_id = $scope.staff.role_id;
                $scope.staffs[e].dob = $scope.staff.dob;
                $scope.staffs[e].address = $scope.staff.address;
                $scope.staffs[e].phone = $scope.staff.phone;
                $scope.staffs[e].email = $scope.staff.email;
                $scope.staffs[e].picture = $scope.staff.picture==""?$scope.staffs[e].picture:$scope.staff.picture;
                if($scope.postData != null){
                    $scope.postData.append('id', $scope.staff.id);
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
                          $scope.postData = null;
                        },
                        error: function (res) {
                          console.log('loi');
                        },
                      });  
                }
            });
            $('#modelId').modal('hide');
        }
        
        
    }
});
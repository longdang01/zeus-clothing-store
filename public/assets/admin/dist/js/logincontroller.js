$(document).ready(function(){
    var login = JSON.parse(sessionStorage.getItem('users'));
    if(login != null){
      location.replace('/admin');
    }
  })
var app = angular.module('app', []);
app.controller('login', function($scope, $http) { //tao 1 controller
    // $http({
    //     method: "GET",
    //     url: "http://localhost:8000/api/staff"
    // }).then(function(response) {
    //     console.log(response.data);
    //     $scope.staffs= response.data;
    //     $scope.staffs.forEach(function(e){
    //         e.position_id = e.position_id + '';
    //         e.role_id = e.role_id + '';
    //     })
    // });
    $scope.login = function(){
        var check = true;
        var input = $('.validate-input .input100');
        for(var i=0; i<input.length; i++) {
            if(validate(input[i]) == false){
                showValidate(input[i]);
                check = false;
            }
        }
        if(check){
            $http({
                method: "GET",
                url: "http://localhost:8000/api/user/" + $('#username')[0].value
            }).then(function(response) {
                console.log(response.data);
                if(response.data != ""){
                    if(response.data.username == "admin" && $("#password")[0].value == response.data.password){
                        sessionStorage.setItem('users',JSON.stringify(response.data));
                        window.location.replace("/admin");
                    }
                    else if(response.data.staff != null){
                        if($("#password")[0].value == response.data.password){
                            sessionStorage.setItem('users',JSON.stringify(response.data));
                            window.location.replace("/admin");
                        }
                        else{
                            $('#validate').attr('data-validate',"Tài khoản hoặc mật khẩu không đúng")
                            $('#validate').addClass('alert-validate');
                        }
                    }
                    else{
                        $('#validate').attr('data-validate',"Tài khoản không tồn tại")
                        $('#validate').addClass('alert-validate');
                    }
                }
                else{
                    $('#validate').attr('data-validate',"Tài khoản không tồn tại")
                    $('#validate').addClass('alert-validate');
                }
            });
        }
        
    }
});

$('.validate-form .input100').each(function(){
    $(this).focus(function(){
       hideValidate(this);
       $('#validate').removeClass('alert-validate');
    });
});

function validate (input) {
    if($(input).attr('type') == 'email' || $(input).attr('name') == 'email') {
        if($(input).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
            return false;
        }
    }
    else {
        if($(input).val().trim() == ''){
            return false;
        }
    }
}

function showValidate(input) {
    var thisAlert = $(input).parent();

    $(thisAlert).addClass('alert-validate');
}

function hideValidate(input) {
    var thisAlert = $(input).parent();

    $(thisAlert).removeClass('alert-validate');
}
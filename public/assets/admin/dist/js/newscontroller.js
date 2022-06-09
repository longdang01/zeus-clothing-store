
app.controller('news', function($scope, $http) { //tao 1 controller
    $scope.options = {  
        language: 'en',
        allowedContent: true,
        entities: false,
        extraPlugins: 'divarea'
    };
    $http({
        method: "GET",
        url: "http://localhost:8000/api/news"
    }).then(function(response) {
        $scope.list_news= response.data;
        console.log(response.data);
    });
    $scope.showmodal = function(id) {;
        $scope.id = id;
        if (id == 0) {
            $scope.news = null;
            $scope.modalTitle = "Add new News";
        } else {
            $scope.modalTitle = "Edit News";     
            $http({
                method: "GET",
                url: "http://localhost:8000/api/news/" + id
            }).then(function(response) {
                $scope.news = response.data;    
            });
        }
        $('#modelId').modal('show');
    }
    $scope.deleteClick = function(id) {
        console.log(id);
        console.log($scope.list_news);
        var hoi = confirm("Ban co muon xoa that khong");
        if (hoi) {
            $http({
                method: "DELETE",
                url: "http://localhost:8000/api/news/" + id
            }).then(function(response) {
                $scope.list_news.pop(id);
            });
        }
    }
    $scope.saveData = function() {
        var login = JSON.parse(sessionStorage.getItem('users'));
        $scope.news.staff_id = login.staff.id;
        if ($scope.id == 0) { //dang them tin moi
            $http({
                method: "POST",
                url: "http://localhost:8000/api/news",
                data: $scope.news,
                "content-Type": "application/json"
            }).then(function(response) {
                $('#modelId').modal('hide');
                $scope.list_news.push(response.data);
                $scope.news.id = response.data.id
            },function(e){
                alert("Thêm thất bại");
            });
        } else { //sua tin
            $http({
                method: "PUT",
                url: "http://localhost:8000/api/news/" + $scope.id,
                data: $scope.news,
                "content-Type": "application/json"
            }).then(function(response) {
                $('#modelId').modal('hide');
                var e = $scope.list_news.findIndex((obj => obj.id == $scope.id));
                $scope.list_news[e].title = $scope.news.title;
                $scope.list_news[e].content = $scope.news.content;
                
            },function(e){
                alert("Cập nhật thất bại");
            });
        }
    }
});
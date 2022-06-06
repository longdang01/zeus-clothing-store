
app.controller('statistic', function($scope, $http) { //tao 1 controller
    $http({
        method: "POST",
        url: "http://localhost:8000/api/statistic/getTopCustomer",
        data: {
            'top': 3,
            'month': 5
        },
        "content-Type": "application/json"
    }).then(function(response) {
        console.log(response.data);
    });
    $http({
        method: "POST",
        url: "http://localhost:8000/api/statistic/getTopProduct",
        data: {
            'top': 3,
            'month': 5
        },
        "content-Type": "application/json"
    }).then(function(response) {
        console.log(response.data);
    });
});
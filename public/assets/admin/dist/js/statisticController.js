app.controller('statistic', function($scope, $http) { //tao 1 controller
    var now = new Date();
    $("#top-product-input").change(function(){
        $http({
            method: "POST",
            url: "http://localhost:8000/api/statistic/getTopProduct",
            data: {
                'top': this.value,
                'month': now.getMonth()+1
            },
            "content-Type": "application/json"
        }).then(function(response) {
            $scope.products = response.data;
        });
    })
    $("#top-customer-input").change(function(){
        $http({
            method: "POST",
            url: "http://localhost:8000/api/statistic/getTopCustomer",
            data: {
                'top': this.value,
                'month': now.getMonth()+1
            },
            "content-Type": "application/json"
        }).then(function(response) {
            $scope.customers = response.data;
        });
    })
    $http({
        method: "POST",
        url: "http://localhost:8000/api/statistic/getTopCustomer",
        data: {
            'top': 3,
            'month': now.getMonth()+1
        },
        "content-Type": "application/json"
    }).then(function(response) {
        $scope.customers = response.data;
    });
    $http({
        method: "POST",
        url: "http://localhost:8000/api/statistic/getTopProduct",
        data: {
            'top': 3,
            'month': now.getMonth()+1
        },
        "content-Type": "application/json"
    }).then(function(response) {
        $scope.products = response.data;
    });
    $http({
        method: "POST",
        url: "http://localhost:8000/api/statistic/getNewProducts",
        data: {
            'year': now.getFullYear(),
            'month': now.getMonth()+1
        },
        "content-Type": "application/json"
    }).then(function(response) {
        $scope.new_products = response.data.amount;
    });
    $http({
        method: "POST",
        url: "http://localhost:8000/api/statistic/getNewOrders",
        data: {
            'year': now.getFullYear(),
            'month': now.getMonth()+1
        },
        "content-Type": "application/json"
    }).then(function(response) {
        $scope.new_orders = response.data.amount;
    });
    $http({
        method: "POST",
        url: "http://localhost:8000/api/statistic/getNewCustomers",
        data: {
            'year': now.getFullYear(),
            'month': now.getMonth()+1
        },
        "content-Type": "application/json"
    }).then(function(response) {
        $scope.new_customers = response.data.amount;
    });
    $http({
        method: "POST",
        url: "http://localhost:8000/api/statistic/getOrderRate",
        data: {
            'year': now.getFullYear(),
            'month': now.getMonth()+1
        },
        "content-Type": "application/json"
    }).then(function(response) {    
        $scope.success_rate = ((response.data[0].amount*100)/(response.data[0].amount + response.data[1].amount)).toFixed(1);
        const data = {
            labels: ['Failed',  'Successed',],
            datasets: [{
            label: 'Doughnut Chart',
            backgroundColor: ['rgb(255, 99, 132)',
            'rgb(54, 162, 235)'],
            data: [100-$scope.success_rate,$scope.success_rate],
            }]
        };
        const config = {
            type: 'doughnut',
            data: data, 
            options: {}
        };
            const myChart = new Chart(
            document.getElementById('doughnutChart'),
            config
        );
    });
    var labels=[];
    var data1=[];
    for (let i = 1; i <= now.getMonth(); i++) {
        $http({
            method: "POST",
            url: "http://localhost:8000/api/statistic/getOrderRate",
            data: {
                'year': now.getFullYear(),
                'month': i
            },
            "content-Type": "application/json"
        }).then(function(response) { 
            // data1.push({'success': response.data[0].amount,
            // 'failed': response.data[0].amount});
            data1.push(response.data[0].amount);
        },function(e){
            // data1.push({'success': 0,
            // 'failed': 0});
            data1.push(0);
        });
    }
    // console.log(list_order_rate);
    const month = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

    for (let i = 0; i < now.getMonth(); i++){
        labels.push(month[i]);
    }
    const data = {
        labels: labels,
        datasets: [{
        label: 'Success ',
        backgroundColor: ['rgba(255, 99, 132, 0.2)',
        'rgba(255, 159, 64, 0.2)'],
        borderColor: 'rgb(255, 99, 132)',
        data: [0,0,1,2,4],
        }]  
    };
    console.log(data);
    const config = {
        type: 'bar',
        data: data,
        options: {}
    };
        const myChart = new Chart(
        document.getElementById('lineChart'),
        config
    );
});

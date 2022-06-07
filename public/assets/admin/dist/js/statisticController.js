app.controller('statistic', function($scope, $http) { //tao 1 controller
    var now = new Date();
    $("#top-product-input").change(function(){
        $http({
            method: "POST",
            url: "http://localhost:8000/api/statistic/getTopProduct",
            data: {
                'top': this.value,
                'month': now.getMonth()
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
                'month': now.getMonth()
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
            'month': now.getMonth()
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
            'month': now.getMonth()
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
            'month': now.getMonth()
        },
        "content-Type": "application/json"
    }).then(function(response) {
        console.log(response.data);
        $scope.new_products = response.data.amount;
    });
    $http({
        method: "POST",
        url: "http://localhost:8000/api/statistic/getNewOrders",
        data: {
            'year': now.getFullYear(),
            'month': now.getMonth()
        },
        "content-Type": "application/json"
    }).then(function(response) {
        console.log(response.data);
        $scope.new_orders = response.data.amount;
    });
    $http({
        method: "POST",
        url: "http://localhost:8000/api/statistic/getNewCustomers",
        data: {
            'year': now.getFullYear(),
            'month': now.getMonth()
        },
        "content-Type": "application/json"
    }).then(function(response) {
        console.log(response.data);
        $scope.new_customers = response.data.amount;
    });
    $http({
        method: "POST",
        url: "http://localhost:8000/api/statistic/getOrderRate",
        data: {
            'year': now.getFullYear(),
            'month': now.getMonth()
        },
        "content-Type": "application/json"
    }).then(function(response) {    
        $scope.success_rate = ((response.data[0].amount*100)/(response.data[0].amount + response.data[1].amount));
    });
    $scope.list_order_rate=[];
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
            if(response.data[0].amount == 0){
                $scope.list_order_rate.push(0);
            }
            else{
                $scope.list_order_rate.push(((response.data[0].amount*100)/(response.data[0].amount + response.data[1].amount)));
            };
        });
    }
    const month = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"]
    var labels=[];
    for (let i = 0; i < now.getMonth(); i++){
        labels.push(month[i]);
    }
    const data1 = {
    labels: labels,
    datasets: [{
        label: 'Line chart',
        data: $scope.list_order_rate,
        fill: false,
        borderColor: 'rgb(75, 192, 192)',
        tension: 0.1
    }]
    };
    const config1 = {
        type: 'line',
        data: data1,
      };
    const data = {
        labels: [
          'Failed',
          'Successed',
        ],
        datasets: [{
          label: 'Order Rate',
          data: [(100-$scope.success_rate),$scope.success_rate],
          backgroundColor: [
            'rgb(255, 99, 132)',
            'rgb(54, 162, 235)'
          ],
          hoverOffset: 4
        }]
        };
          const config = {
          type: 'doughnut',
          data: data,
        };
    const myChart = new Chart(
        document.getElementById('doughutChart'),
        config
      );
      const myChart1 = new Chart(
        document.getElementById('lineChart'),
        config
      );
});

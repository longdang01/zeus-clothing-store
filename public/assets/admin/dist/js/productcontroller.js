app.controller('product', function($scope, $http,$rootScope) { //tao 1 controller
    $scope.pageSize = 5;

    // config ckeditor.
    $scope.options = {  
        language: 'en',
        allowedContent: true,
        entities: false,
        extraPlugins: 'divarea'
    };

    $("#select-pageSize").change(function(){
        $scope.pageSize = this.value;
        console.log($scope.pageSize);
    })
    $http({
        method: "GET",
        url: "http://localhost:8000/api/product"
    }).then(function(response) {
        $scope.products= response.data[0];
    });
    $http({
        method: "GET",
        url: "http://localhost:8000/api/brand"
    }).then(function(response) {
        $scope.brands= response.data;
    });
    $http({
        method: "GET",
        url: "http://localhost:8000/api/supplier"
    }).then(function(response) {
        $scope.suppliers= response.data;
    });
    $http({
        method: "GET",
        url: "http://localhost:8000/api/subcategories"
    }).then(function(response) {
        $scope.sub_categories= response.data[0];
    });
    $scope.color = null;
    $scope.price =null;
    $scope.size = null;
    $scope.product = null;
    $scope.products = null;
    $scope.uploadFile = function(filedata, element, object) {
        var reader = new FileReader();
        reader.onload = function (ev) {
            $(element)
            .attr('src', ev.target.result)
            .css('width', '80px');
        };
        reader.readAsDataURL(filedata);
        $scope.image = filedata.name;
        //upload
        if(object == 'product'){
            $scope.postProduct = new FormData();
            $scope.postProduct.append('file', filedata);
            $scope.postProduct.append('object', 'product');
        }
        else if(object == 'color-avatar'){
            $scope.postAvatar = new FormData();
            $scope.postAvatar.append('file', filedata);
            $scope.postAvatar.append('object', 'product');
        }
        else if(object == 'color-image'){
            $scope.postImage = new FormData();
            $scope.postImage.append('file', filedata);
            $scope.postImage.append('object', 'product'); 
        }
        
      };
    $('#size-table-update-input').change(function () {
        $scope.uploadFile(this.files[0], '#size-table-update','product');
    });
    $('#size-table-create-input').change(function () {
        $scope.uploadFile(this.files[0], '#size-table-create','product');
    });
    $('#avatar-color-add-input').change(function () {
        $scope.uploadFile(this.files[0], '#avatar-color-add','color-avatar');
       });
    $('#image-color-add-input').change(function () {
        $scope.uploadFile(this.files[0], '#image-color-add','color-image');
    });
    $('#avatar-color-update-input').change(function () {
        $scope.uploadFile(this.files[0], '#avatar-color-update','color-avatar');
       });
    $('#image-color-update-input').change(function () {
        $scope.uploadFile(this.files[0], '#image-color-update','color-image');
    });

    $scope.showmodal = function(id) {
        $scope.id = id;
        if (id == 0) {
            $scope.product = null;
            $scope.modalTitle = "Add new product";
            $('#modelcreate').modal('show');
            // ClassicEditor
            //     .create( document.querySelector( '#description-editor-create' ), {
            //         plugins: [ Essentials, Paragraph, Bold, Italic ],
            //         toolbar: [ 'bold', 'italic' ]
            //     } )
            //     .then( editor => {
            //         console.log( 'Editor was initialized', editor );
            //     } )
            //     .catch( error => {
            //         console.error( error.stack );
            //     } );
        } else {
            $scope.modalTitle = "Edit product";     
            $http({
                method: "GET",
                url: "http://localhost:8000/api/product/" + id
            }).then(function(response) {
                $scope.product = response.data;
                $scope.product.gender = $scope.product.gender + '';
                $scope.product.sub_category_id = $scope.product.sub_category_id + '';
                $scope.product.supplier_id = $scope.product.supplier_id + '';
                $scope.product.brand_id = $scope.product.brand_id + '';
                $('#description-editor-update').text($scope.product.description);
                $('#size-table-update').attr("src",'/upload/product/' + $scope.product.id + "/" +$scope.product.size_table);
                $('#modelupdate').modal('show');
                // ClassicEditor
                //     .create( document.querySelector( '#description-editor-update' ))
                //     .then( editor => {
                //         console.log( editor.content );
                //     } ) 
                //     .catch( error => {
                //         console.error( error.stack );
                //     } );
            },function(e){
                alert("Error");
            });
        }
        
    }
    $scope.show_color_modal = function(id) {;
        $scope.color_id = id;
        if (id == 0) {
            $scope.color = null;
            $scope.colormodal_title = "Add new color";
            $('#modelcolorcreate').modal('show');
        } else {
            $scope.colormodal_title = "Edit color";     
            $http({
                method: "GET",
                url: "http://localhost:8000/api/color/" + id
            }).then(function(response) {
                $scope.color = response.data[0];
                $('#avatar-color-update').attr("src",'/upload/product/' + $scope.product.id + "/" +$scope.color.avatar);
                $('#image-color-update').attr("src",'/upload/product/' + $scope.product.id + "/" +$scope.color.images);
            },function(e){
                alert("Error");
            });
            $('#modelcolorupdate').modal('show');
            
        }    
    }

    $scope.show_size_modal = function(id) {;
        $scope.size_id = id;
        if (id == 0) {
            $scope.size = null;
            $scope.sizemodal_title = "Add new size";
        } else {
            $scope.sizemodal_title = "Edit size";     
            $http({
                method: "GET",
                url: "http://localhost:8000/api/size/" + id
            }).then(function(response) {
                $scope.size = response.data;
            },function(e){
                alert("Error");
            });
        }
        $('#modelsize').modal('show');
    }
    $scope.deletesizeClick = function(id) {
        var hoi = confirm("Ban co muon xoa that khong");
        if (hoi) {
            $http({
                method: "DELETE",
                url: "http://localhost:8000/api/size/" + id
            }).then(function(response) {
                $scope.message = response.data;
                $scope.color.sizes.pop(id);
            },function(e){
                alert("Error");
            });
        }
    }
    $scope.deleteClick = function(id) {
        var hoi = confirm("Ban co muon xoa that khong");
        if (hoi) {
            $http({
                method: "DELETE",
                url: "http://localhost:8000/api/product/" + id
            }).then(function(response) {
                $scope.message = response.data;
                $scope.products.pop(id);
            },function(e){
                alert("Error");
            });
        }
    }

    $scope.deletecolorClick = function(id) {
        var hoi = confirm("Ban co muon xoa that khong");
        if (hoi) {
            $http({
                method: "DELETE",
                url: "http://localhost:8000/api/color/" + id
            }).then(function(response) {
                $scope.message = response.data;
                $scope.product.color.pop(id);
            },function(e){
                alert("Error");
            });
        }
    }
    $scope.addproduct = function(){
        $img = $('#size-table-create-input')[0].value.split("\\");
        $('#size-table').attr("src","/upload/product/" + $img[$img.length-1])
        $scope.product.size_table = $img[$img.length-1];
        $http({
            method: "POST",
            url: "http://localhost:8000/api/product",
            data: $scope.product,
            "content-Type": "application/json"
        }).then(function(response) {
            $scope.message = response.data;
            $scope.product.id = response.data[0].id;
            $scope.products.push($scope.product);
            $scope.price = {
                'id': -1,
                'product_id': $scope.product.id,
                'price': $scope.product.price.price
            }
            $http({
                method: "POST",
                url: "http://localhost:8000/api/price",
                data: $scope.price,
                "content-Type": "application/json"
            }).then(function(response) {
                $scope.message = response.data;
            },function(e){
                alert("Error");
            });

            if($scope.postProduct != null){
                $scope.postProduct.append('id', $scope.product.id);
                $.ajax({
                    headers: { 'X-CSRF-Token': $('meta[name=csrf_token]').attr('content') },
                    async: true,
                    type: 'post',
                    contentType: false,
                    processData: false,
                    url: "http://127.0.0.1:8000/api/" + 'upload',
                    data: $scope.postProduct,
                    success: function (res) {
                      console.log('success');
                    },
                    error: function (res) {
                      console.log('loi');
                    },
                  });
                
            }
            $('#modelcreate').modal('hide');
            
        });

    }
    $scope.addcolor = function(){
        $avt = $('#avatar-color-add-input')[0].value.split("\\");
        $scope.color.avatar = $avt[$avt.length-1];
        $img = $('#image-color-add-input')[0].value.split("\\");
        $scope.color.images = $img[$img.length-1];

        $scope.color.product_id = $scope.id;
        $http({
            method: "POST",
            url: "http://localhost:8000/api/color",
            data: $scope.color,
            "content-Type": "application/json"
        }).then(function(response) {
            $scope.color = response.data[0];
            $scope.product.color.push($scope.color);
            if($scope.postAvatar != null){
                $scope.postAvatar.append('id', $scope.product.id);
                $.ajax({
                    headers: { 'X-CSRF-Token': $('meta[name=csrf_token]').attr('content') },
                    async: true,
                    type: 'post',
                    contentType: false,
                    processData: false,
                    url: "http://127.0.0.1:8000/api/" + 'upload',
                    data: $scope.postAvatar,
                    success: function (res) {
                      console.log('success');
                      $scope.postAvatar = null;
                      
                    },
                    error: function (res) {
                      console.log('loi');
                    },
                  });  
            }
            $('#modelcolorcreate').modal('hide');
            if($scope.postImage != null){
                $scope.postImage.append('id', $scope.product.id);
                $.ajax({
                    headers: { 'X-CSRF-Token': $('meta[name=csrf_token]').attr('content') },
                    async: true,
                    type: 'post',
                    contentType: false,
                    processData: false,
                    url: "http://127.0.0.1:8000/api/" + 'upload',
                    data: $scope.postImage,
                    success: function (res) {
                      console.log('success');
                      $scope.postImage = null;
                      
                    },
                    error: function (res) {
                      console.log('loi');
                    },
                  });  
            }
            $('#modelcolorcreate').modal('hide');   
        },function(e){
            alert("Error");
        });
        
    }
    $scope.updatecolor = function(){
        $avt = $('#avatar-color-update-input')[0].value.split("\\");
        $scope.color.avatar = $avt[$avt.length-1];
        $img = $('#image-color-update-input')[0].value.split("\\");
        $scope.color.images = $img[$img.length-1];
        $http({
            method: "PUT",
            url: "http://localhost:8000/api/color/" + $scope.color_id,
            data: $scope.color,
            "content-Type": "application/json"
        }).then(function(response) {
            e = $scope.product.color.findIndex((obj => obj.id == $scope.color_id));
            $scope.product.color[e].color_name = $scope.color.color_name;
            $scope.product.color[e].hex = $scope.color.hex;
            $scope.product.color[e].avatar = $scope.color.avatar==""?$scope.product.color[e].avatar:$scope.color.avatar;
            $scope.product.color[e].images = $scope.color.images==""?$scope.product.color[e].images:$scope.color.images;
            if($scope.postAvatar != null){
                $scope.postAvatar.append('id', $scope.product.id);
                $.ajax({
                    headers: { 'X-CSRF-Token': $('meta[name=csrf_token]').attr('content') },
                    async: true,
                    type: 'post',
                    contentType: false,
                    processData: false,
                    url: "http://127.0.0.1:8000/api/" + 'upload',
                    data: $scope.postAvatar,
                    success: function (res) {
                      console.log('success');
                      $scope.postAvatar = null;
                    },
                    error: function (res) {
                      console.log('loi');
                    },
                  });  
            }
            if($scope.postImage != null){
                $scope.postImage.append('id', $scope.product.id);
                $.ajax({
                    headers: { 'X-CSRF-Token': $('meta[name=csrf_token]').attr('content') },
                    async: true,
                    type: 'post',
                    contentType: false,
                    processData: false,
                    url: "http://127.0.0.1:8000/api/" + 'upload',
                    data: $scope.postImage,
                    success: function (res) {
                      console.log('success');
                      $scope.postImage = null;
                    },
                    error: function (res) {
                      console.log('loi');
                    },
                  });  
            }
            $('#modelcolorupdate').modal('hide');
        });
    }
    $scope.savesize = function(){
        $scope.size.color_id = $scope.color_id;
        if ($scope.size_id != 0){
            $http({
                method: "PUT",
                url: "http://localhost:8000/api/size/" + $scope.size_id,
                data: $scope.size,
                "content-Type": "application/json"
            }).then(function(response) {   
                e = $scope.color.sizes.findIndex((obj => obj.id == $scope.size_id));
                $scope.color.sizes[e].size_name = $scope.size.size_name;
                $scope.color.sizes[e].quantity = $scope.size.quantity;
                $scope.color.sizes[e].status = $scope.size.status;
                $('#modelsize').modal('hide');
            },function(e){
                alert("Error");
            });
        }
        else{
            $http({
                method: "POST",
                url: "http://localhost:8000/api/size",
                data: $scope.size,
                "content-Type": "application/json"
            }).then(function(response) {
                $scope.size.id = response.data[0].id;
                $scope.color.sizes.push($scope.size);
                $('#modelsize').modal('hide');
            },function(e){
                alert("Error");
            });
        }
       
    }
    $scope.saveData = function() {
        //sua product
        $sizetable = $('#size-table-update-input')[0].value.split("\\");
        $scope.product.size_table = $sizetable[$sizetable.length-1]==""?$scope.product.size_table:$sizetable[$sizetable.length-1];
        $http({
            method: "PUT",
            url: "http://localhost:8000/api/product/" + $scope.id,
            data: $scope.product,
            "content-Type": "application/json"
        }).then(function(response) {
            e = $scope.products.findIndex((obj => obj.id == $scope.id));
            $scope.products[e].sub_category_id = $scope.product.sub_category_id;
            $scope.products[e].supplier_id = $scope.product.supplier_id;
            $scope.products[e].brand_id = $scope.product.brand_id;
            $scope.products[e].product_code = $scope.product.product_code;
            $scope.products[e].product_name = $scope.product.product_name;
            $scope.products[e].origin = $scope.product.origin;
            $scope.products[e].style = $scope.product.style;
            $scope.products[e].material = $scope.product.material;
            $scope.products[e].size_table = $scope.product.size_table;
            $scope.products[e].description = $scope.product.description;

            $scope.price = {
                'id': $scope.product.price.id!=null?$scope.product.price.id:-1,
                'product_id': $scope.product.id,
                'price': $scope.product.price.price
            }
            $http({
                method: "POST",
                url: "http://localhost:8000/api/price",
                data: $scope.price,
                "content-Type": "application/json"
            }).then(function(response) {
                $scope.message = response.data;
            },function(e){
                alert("Error");
            });
            if($scope.postProduct != null){
                $scope.postProduct.append('id', $scope.product.id);
                $.ajax({
                    headers: { 'X-CSRF-Token': $('meta[name=csrf_token]').attr('content') },
                    async: true,
                    type: 'post',
                    contentType: false,
                    processData: false,
                    url: "http://127.0.0.1:8000/api/" + 'upload',
                    data: $scope.postProduct,
                    success: function (res) {
                      console.log('success');
                      
                    },
                    error: function (res) {
                      console.log('loi');
                    },
                  });  
            }
            $('#modelupdate').modal('hide');
        },function(e){
            alert("Error");
        });
        
    }
});
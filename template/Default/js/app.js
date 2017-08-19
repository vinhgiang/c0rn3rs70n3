var app = angular.module('app', ['ngTouch', 'ui.grid', 'ui.grid.edit', 'ui.grid.rowEdit', 'ui.grid.selection',
    'ui.grid.cellNav', 'ui.grid.resizeColumns', 'ui.grid.moveColumns', 'ui.grid.exporter']);

var suppliers = [];

app.controller('MainCtrl', ['$scope', '$http', '$q', '$interval', function ($scope, $http, $q, $interval) {

    $scope.priceList = {

        enableSorting: true,
        enableGridMenu: true,
        enableFiltering: true,
        showGridFooter: true,
        enableColumnResizing: true,

        exporterCsvFilename: 'price-list.csv',

        onRegisterApi: function( gridApi ){
            $scope.gridApi = gridApi;

            gridApi.core.on.columnVisibilityChanged( $scope, function( changedColumn ){
                $scope.columnChanged = { name: changedColumn.colDef.name, visible: changedColumn.colDef.visible };
            });
        },
    };

    $scope.saveRow = function( rowEntity ) {

        var promise = $q.defer();
        $scope.gridApi.rowEdit.setSavePromise( rowEntity, promise.promise );

        $http.put('/ajax/update',rowEntity).success(function(response){
            var msg = response.msg;

            $('.pop-msg').html(msg);

            if(response.code == 1) {
                promise.resolve();
                if(msg) {
                    $('.alert-info').removeClass('hidden');
                }
            } else {
                promise.reject();
                $('.alert-danger').removeClass('hidden');
            }
        }).error(function () {
            promise.reject();
        });

    };

    $scope.priceList.onRegisterApi = function(gridApi){
        $scope.gridApi = gridApi;
        gridApi.rowEdit.on.saveRow($scope, $scope.saveRow);
    };

    $http.get('/ajax/supplier-columns').success(function(data) {
        var columns = [
            {
                name:'SKU', field: 'sku', displayName: 'SKU', width: '230',
                enableCellEdit: false,
                cellClass: function (grid, row, col, rowRenderIndex, colRenderIndex) {
                    return outOfDateCellClass(row)
                }
            },
            { name:'Description', field: 'description', width: '200'},
            {
                name:'Brand', field: 'brand',
                editableCellTemplate: 'ui-grid/dropdownEditor', cellFilter: 'mapBrand', editDropdownValueLabel: 'brand',
                editDropdownOptionsArray: [
                    { id: 'Canon', brand: 'Canon'},
                    { id: 'Casio', brand: 'Casio'},
                    { id: 'DJI', brand: 'DJI'},
                    { id: 'D-Link', brand: 'D-Link'},
                    { id: 'Feuyutech', brand: 'Feuyutech'},
                    { id: 'FujiFilm', brand: 'FujiFilm'},
                    { id: 'Go Pro', brand: 'Go Pro'},
                    { id: 'JVC', brand: 'JVC'},
                    { id: 'Nikon', brand: 'Nikon'},
                    { id: 'Olympus', brand: 'Olympus'},
                    { id: 'Panasonic', brand: 'Panasonic'},
                    { id: 'Sony', brand: 'Sony'},
                    { id: 'Fuji', brand: 'Fuji'},
                    { id: 'Samyang', brand: 'Samyang'},
                    { id: 'Sigma', brand: 'Sigma'},
                    { id: 'Tamron', brand: 'Tamron'},
                    { id: 'Tokina', brand: 'Tokina'},
                ]
            },
            { name:'Color', field: 'color'},
            {
                name:'Weight', field: 'weight',
                type: 'number'
            },
            {
                name:'Battery', field: 'battery',
                type: 'number'
            },
            { name:'Website Category', field: 'website_cate'},
            { name:'ebay UK Category', field: 'ebay_uk_cate', displayName: 'eBay UK Category'},
            { name:'ebay AU Category', field: 'ebay_au_cate', displayName: 'eBay AU Category'},
        ];

        columns = columns.concat(data);

        $.each(data, function (k, v) {
            suppliers.push(v.field);
        });

        var restColumns = [
            {
                name:'USD', field: 'usd', displayName: 'USD',
                type: 'number'
            },
            {
                name:'HKD', field: 'hkd', displayName: 'HKD',
                type: 'number'
            },
            {
                name:'Best Price', field: 'best_price', displayName: 'Best Price',
            },
            {
                name:'Date', field: 'date',
                enableCellEdit: false,
                cellClass: function (grid, row, col, rowRenderIndex, colRenderIndex) {
                    return outOfDateCellClass(row)
                }
            },
            {
                name:'Action', enableCellEdit: false,
                cellTemplate: '<div class="text-right ui-grid-cell-contents ng-binding ng-scope"><a target="_blank" href="/list/{{row.entity.sku}}">Detail</a></div>'
            },
        ];

        columns = columns.concat(restColumns);

        $scope.priceList.columnDefs = columns;
    });

    $http.get('/ajax').success(function(data) {
        $scope.priceList.data = data;
    });

    // Access outside scope functions from row template
    $scope.rowFormatter = function( row, column ) {
        var supplierPriceList = [];
        var totalSupplier = suppliers.length;

        for( var i = 0; i < totalSupplier; i++) {
            var supplierKey = suppliers[i];
            supplierPriceList[supplierKey] = parseFloat(row['entity'][supplierKey]);
        }

        var sortable = [];
        for (var price in supplierPriceList) {
            sortable.push([price, supplierPriceList[price]]);
        }

        sortable.sort(function(a, b) {
            return a[1] - b[1];
        });

        for(var i = 0; i < totalSupplier; i++) {
            var supplierKey = sortable[i][0];
            var price = sortable[i][1];

            if(price > 0) {
                if(column == supplierKey) {
                    return 'color: green';
                } else {
                    break;
                }
            }
        }

        return '';
    };

    // return warning class when product hadn't update for 12 days
    function outOfDateCellClass ( row ) {
        var today = new Date();
        var lastUpdateDate  = new Date(row.entity.date);

        var outOfDateDay  = parseInt((today - lastUpdateDate) / (1000*60*60*24));
        if(outOfDateDay >= 12) {
            return 'warning';
        }
        return '';
    }
}])
.filter('mapBrand', function() {
    var genderHash = {
        'Canon' : 'Canon',
        'Casio' : 'Casio',
        'DJI' : 'DJI',
        'D-Link' : 'D-Link',
        'Feuyutech' : 'Feuyutech',
        'FujiFilm' : 'FujiFilm',
        'Go Pro' : 'Go Pro',
        'JVC' : 'JVC',
        'Nikon' : 'Nikon',
        'Olympus' : 'Olympus',
        'Panasonic' : 'Panasonic',
        'Sony' : 'Sony',
        'Fuji' : 'Fuji',
        'Samyang' : 'Samyang',
        'Sigma' : 'Sigma',
        'Tamron' : 'Tamron',
        'Tokina' : 'Tokina',
    };

    return function(input) {
        if (!input){
            return '';
        } else {
            return genderHash[input];
        }
    };
})







app.controller('HistoryCtrl', ['$scope', '$http', '$q', '$interval', function ($scope, $http, $q, $interval) {

    $scope.productHistory = {

        enableSorting: true,
        enableGridMenu: true,
        showGridFooter: true,
        enableColumnResizing: true,

        exporterCsvFilename: sku + '-history.csv',
    };

    $http.get('/ajax/supplier-columns').success(function(data) {
        var columns = [
            {
                name:'SKU', field: 'sku', displayName: 'SKU', width: '230',
                enableCellEdit: false,
            },
            { name:'Description', field: 'description', width: '200'},
            {
                name:'Brand', field: 'brand',
            },
            { name:'Color', field: 'color'},
            {
                name:'Weight', field: 'weight',
                type: 'number'
            },
            {
                name:'Battery', field: 'battery',
                type: 'number'
            },
            { name:'Website Category', field: 'website_cate'},
            { name:'ebay UK Category', field: 'ebay_uk_cate', displayName: 'eBay UK Category'},
            { name:'ebay AU Category', field: 'ebay_au_cate', displayName: 'eBay AU Category'},
        ];

        columns = columns.concat(data);

        var restColumns = [
            {
                name:'USD', field: 'usd', displayName: 'USD',
                type: 'number'
            },
            {
                name:'HKD', field: 'hkd', displayName: 'HKD',
                type: 'number'
            },
            {
                name:'Date', field: 'date',
                enableCellEdit: false
            }
        ];

        columns = columns.concat(restColumns);

        $scope.productHistory.columnDefs = columns;
    });

    $http.get('/ajax/history/' + sku).success(function(data) {
        $scope.productHistory.data = data;
    });

}])
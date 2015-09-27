/**
 * Created by Hani on 9/27/2015.
 */

app.controller('appController', ['$scope', '$mdSidenav', function($scope, $mdSidenav){
    $scope.toggleSidenav = function(menuId) {
        $mdSidenav(menuId).toggle();
    };

}]);
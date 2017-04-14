/**
 * Created by guabirabadev on 14/04/2017.
 */
angular.module('app.controllers')
    .controller('ClientRemoveController', ['$scope', '$location', '$routeParams' ,'Client',
        function ($scope, $location, $routeParams, Client) {
            $scope.client =  Client.get({id: $routeParams.id}); //faz a consulta do cliente pelo ID

            $scope.remove = function () {
                $scope.client.$delete().then(function () {
                    $location.path('/clients');
                });
            }
        }]);
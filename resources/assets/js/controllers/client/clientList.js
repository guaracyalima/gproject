/**
 * Created by guabirabadev on 14/04/2017.
 */
angular.module('app.controllers')
        .controller('ClientListController', ['$scope', 'Client', function ($scope, Client) {
            $scope.clients = Client.query();
        }]);
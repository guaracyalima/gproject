/**
 * Created by guabirabadev on 14/04/2017.
 */
angular.module('app.services').
                service('Client', ['$resource', 'appConfig',
                function ($resource, appConfig) {
                        return $resource(appConfig.baseUrl + '/client/:id',
                            {
                            id:'@id'
                            },
                            {
                              update:
                              {
                                method: 'PUT'
                              }
                            }
                        );

}]);
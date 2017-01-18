var app = angular.module('app', ['ngSanitize']);

app.controller('Tickets', function ($scope, $http, $timeout) {

    //-------------------------------------------------------------------------
    // Refreshes data view for all tickets
    $scope.getTickets = function () {
        $http.get($scope.api.resource+'?api_token='+$scope.api.token).
            then(function (response) {
                if (response.status === 200) {
                    $scope.tickets = response.data;
                }
            }, function (response) {

            });
    };

    //-------------------------------------------------------------------------
    // Sends a request to the API to create a new ticket
    // @Success refreshes data view
    // @error displays message
    $scope.createNewTicket = function () {
        if (typeof $scope.newTicket === 'undefined') {
            $scope.newTicket = {init: true};
        }

        $http({
            method          : 'post',
            url             : $scope.api.resource,
            data            : {
                api_token : $scope.api.token,
                first_name: $scope.newTicket.firstName,
                last_name : $scope.newTicket.lastName,
                email     : $scope.newTicket.email
            }
        }).
            then(function (response) {
                if (response.status === 200) {
                    $scope.alert($scope.newTicket, 'success', response.data.message);
                    $scope.getTickets();

                    $scope.newTicket.firstName = null;
                    $scope.newTicket.lastName  = null;
                    $scope.newTicket.email     = null;
                }
            }, function (response) {
                // This could be better
                if (response.data.message) {
                    $scope.alert($scope.newTicket, 'danger', response.data.message);
                } else if (response.status === 422) {
                    $scope.alert($scope.newTicket, 'danger', response.data);
                } else {
                    $scope.alert($scope.newTicket, 'danger', 'Ticket could not be created');
                }
            });
    };

    //-------------------------------------------------------------------------
    // Sends redemption request to API
    // @Success refresh data view 
    // @error display message 
    $scope.redeemTicket = function () {
        if (typeof $scope.ticketRedemption === 'undefined') {
            $scope.ticketRedemption = {init: true};
            $scope.alert($scope.ticketRedemption, 'danger', 'Ticket could not be found');
            return;
        }

        $http.post($scope.api.resource+'/'+$scope.ticketRedemption.id+'?api_token='+$scope.api.token).
            then(function (response) {
                if (response.status === 200) {
                    $scope.getTickets();
                    $scope.alert($scope.ticketRedemption, 'success', response.data.message);
                }
            }, function (response) {
                if (response.data.message) {
                    $scope.alert($scope.ticketRedemption, 'danger', response.data.message);
                } else if (response.status === 422) {
                    $scope.alert($scope.ticketRedemption, 'danger', response.data);
                } else {
                    $scope.alert($scope.ticketRedemption, 'danger', 'Ticket could not be found');
                }
            });
    };

    //-------------------------------------------------------------------------
    // Handles alerts
    $scope.alert = function (model, type, message) {
        if (typeof message === 'object') {
            var newMessage = '<ul class="list-unstyled">';
            for (var i in message) {
                newMessage += '<li>'+message[i][0]+'</li>';
            }
            newMessage += '</ul>';
            message = newMessage;
        }

        model.alert = {
            show: true,
            type: type,
            message: message
        };

        $timeout(function () {
            model.alert.show = false;
        }, 5000);
    };

    //-------------------------------------------------------------------------
    // Load data view for tickets wrapped in timeout to handle init delay
    $timeout(function () {
        $scope.getTickets();
    }, 100);
});

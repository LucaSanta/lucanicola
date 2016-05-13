// Qui metto la mia app JS in angular
'use strict';

var app = angular.module('sapioApp', [
    // 'codemaster.controllers'
  ])

app.constant('sapioConfig', {
    'apiKey' : 'INSERT_CONFIG_HERE',
    'baseUrl' : 'https://localhost:8000/api'
});

app.config(['$interpolateProvider', function($interpolateProvider) {
    $interpolateProvider.startSymbol('{@');
    $interpolateProvider.endSymbol('@}');
  }]);
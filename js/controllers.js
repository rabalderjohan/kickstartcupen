
angular.module('KscApp.controllers',[])

  .controller('HeaderCtrl',['$scope','parallaxHelper',function($scope,parallaxHelper){
    $scope.background = parallaxHelper.createAnimator(-0.3,null,null,-80);
  }])

  .controller('PageCtrl',['$scope',function($scope){
    console.log('Page ctrl');
  }])

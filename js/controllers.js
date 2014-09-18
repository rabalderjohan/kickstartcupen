
angular.module('KscApp.controllers',[])

  .controller('HeaderCtrl',['$scope','parallaxHelper',function($scope,parallaxHelper){
    $scope.background = parallaxHelper.createAnimator(-0.3,null,null,-80);
  }])

  .controller('PageCtrl',['$scope',function($scope){
    console.log('Page ctrl');
  }])

  .controller('TagCtrl',['$scope','TagService','usSpinnerService',function($scope,TagService,usSpinnerService){
    $scope.items = [];
    $scope.tag = TagService.start();

    $scope.$on('rawlist',function(event,response){
      console.log(response);
      $scope.items = response;
      usSpinnerService.stop('spinner');
    });

  }])

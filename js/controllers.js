
angular.module('KscApp.controllers',[])

  .controller('HeaderCtrl',['$scope','parallaxHelper',function($scope,parallaxHelper){
    $scope.background = parallaxHelper.createAnimator(-0.12,null,null,-80);
  }])

  .controller('PageCtrl',['$scope',function($scope){
    console.log('Page ctrl');
  }])

  .controller('TagCtrl',['$scope','$modal','TagService','usSpinnerService',function($scope,$modal,TagService,usSpinnerService){
    $scope.items = [];
    $scope.tag = TagService.start();

    $scope.$on('rawlist',function(event,response){
      console.log(response);
      $scope.items = response;
      usSpinnerService.stop('spinner');
    });

    $scope.showItem = function(url) {
      $scope.link = url;
      var modalInstance = $modal.open({
        templateUrl: 'wp-content/themes/kickstartcupen/partials/itemmodal.html',
        size: '',
        controller: ModalInstanceCtrl,
        resolve: {
          items: function () {
            return $scope.items;
          },
          url: function() {
            return $scope.link;
          }
        }
      })

      modalInstance.result.then(function (selectedItem) {
        $scope.selected = selectedItem;
      }, function () {
        //console.info('Modal dismissed at: ' + new Date());
      });
    }
    var ModalInstanceCtrl = function ($scope, $modalInstance, $sce,items, url) {

      $scope.items = items;
      $scope.url = url;

      $scope.trustedUrl = $sce.trustAsResourceUrl($scope.url+'embed');

      $scope.selected = {
        item: $scope.items[0]
      };

      $scope.ok = function () {
        $modalInstance.close($scope.selected.item);
      };

      $scope.cancel = function () {
        $modalInstance.dismiss('cancel');
      };
    }
  }])

  .controller('PlayCtrl',['$scope','$modal',function($scope,$modal){
    $scope.showMov = function() {
      var modalInstance = $modal.open({
        templateUrl: 'wp-content/themes/kickstartcupen/partials/movmodal.html',
        size: '',
        controller: ModalInstanceCtrl,
      })

      modalInstance.result.then(function (selectedItem) {
        $scope.selected = selectedItem;
      }, function () {

      });
    }
    var ModalInstanceCtrl = function ($scope, $modalInstance) {

      $scope.cancel = function () {
        $modalInstance.dismiss('cancel');
      };
    }
  }])

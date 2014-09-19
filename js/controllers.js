
angular.module('KscApp.controllers',[])

  .controller('HeaderCtrl',['$scope','parallaxHelper','animationSpeed','animationOffset',function($scope,parallaxHelper,animationSpeed,animationOffset){
    $scope.background = parallaxHelper.createAnimator(animationSpeed,null,null,animationOffset);
  }])

  .controller('PageCtrl',['$scope',function($scope){

  }])

  .controller('TagCtrl',['$scope','$modal','TagService','usSpinnerService',function($scope,$modal,TagService,usSpinnerService){
    $scope.loaded = false;
    $scope.startNum = 12;
    $scope.items = [];
    $scope.tag = TagService.start();

    $scope.$on('rawlist',function(event,response){
      $scope.items = response;
      $scope.loaded = true;
      usSpinnerService.stop('spinner');
    });

    $scope.infiniteScroll = function() {
      $scope.loaded ? $scope.startNum += 12 : null;
    };

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

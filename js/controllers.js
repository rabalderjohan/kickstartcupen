
angular.module('KscApp.controllers',[])

  .controller('WrappCtrl',['$scope',function($scope){
    $scope.rulesCollapsed = false;
    $scope.rulesFix = function(){
      $scope.rulesCollapsed = true;
    }
  }])

  .controller('HeaderCtrl',['$scope','parallaxHelper','animationSpeed','animationOffset',function($scope,parallaxHelper,animationSpeed,animationOffset){
    $scope.background = parallaxHelper.createAnimator(animationSpeed,null,null,animationOffset);
  }])

  .controller('PageCtrl',['$scope',function($scope){

  }])

  .controller('BasicRoundCtrl',['$scope','$cookieStore','BasicRoundFctry','usSpinnerService',function($scope,$cookieStore,BasicRoundFctry,usSpinnerService){
    console.log('Hejsan v');
    $scope.loaded = false;
    $scope.items = [];
    $scope.startNum = 12;
    BasicRoundFctry.getItems(function(pItems){
      $scope.items = pItems;
      $scope.loaded = true;
    });

    $scope.vote = function(){
      console.log('Vote');
      if ($cookieStore.get('voted')) {
        console.log('I voted');
      } else {
        $cookieStore.put('voted',true);
        console.log('I did not vote');
      }
    }
  }])

  .controller('TagCtrl',['$scope','$modal','TagService','usSpinnerService',function($scope,$modal,TagService,usSpinnerService){
    $scope.loaded = false;
    $scope.smaller = true;
    $scope.startNum = 12;
    $scope.items = [];
    $scope.itemsLength = 0;
    $scope.tag = TagService.start();

    $scope.$on('rawlist',function(event,response){
      $scope.items = response;
      $scope.itemsLength = response.length;
      $scope.loaded = true;
      usSpinnerService.stop('spinner');
      console.log(JSON.stringify($scope.items));
    });

    $scope.infiniteScroll = function() {
      //$scope.loaded ? $scope.startNum += 12 : null;
    };

    $scope.nextTwelve = function() {
      $scope.loaded ? $scope.startNum += 12 : null;
      $scope.itemsLength < $scope.startNum ? $scope.smaller = false : null;
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

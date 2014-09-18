
angular.module('KscApp.services',[])
  .service('TagService',['$http','$rootScope',function($http,$rootScope){
    var self = this;
    this.toplist = [];
    this.likes = 0;
    this.total = 0;
    this.comments = 0;
    var shit = 'skiiiit';
    this.start = function() {
      self.toplist = [];
      var endPoint = "https://api.instagram.com/v1/tags/drpeppermedina/media/recent?client_id=7cfece48918a4a1db389814eaefda823&callback=JSON_CALLBACK";
      this.getMore(endPoint);
    }

    this.getMore = function(endPoint) {
      $http.jsonp(endPoint).success(function(response){
        if (response.pagination.next_url) {
          for (var i = 0; i < response.data.length; i++) {
            self.toplist.push(response.data[i]);
            //console.log(self.toplist);
            self.total += 1;
            self.comments += response.data[i].comments.count;
            self.likes += response.data[i].likes.count;
          }
          self.getMore(response.pagination.next_url+'&callback=JSON_CALLBACK');
        } else {
          for (var i = 0; i < response.data.length; i++) {
            self.toplist.push(response.data[i]);
            self.total += 1;
            self.comments += response.data[i].comments.count;
            self.likes += response.data[i].likes.count;
          }
          console.log('Done');
          console.log('Total: '+self.total);
          console.log('Comments: '+self.comments);
          console.log('Likes: '+self.likes);
          $rootScope.$broadcast('rawlist',self.toplist);
        }
      })
      .error(function(error){
        console.log(error);
      });
    }
  }])

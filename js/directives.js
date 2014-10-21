
angular.module('KscApp.directives',[])

  .directive('voteHeart',function(){
    return {
      restrict: 'A',
      link: function(scope,element,attrs){
        element.on('click',function(event){
          element.addClass('supercool');
        })
      }
    }
  })

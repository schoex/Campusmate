schoex.config(function($routeProvider,$locationProvider) {

    $routeProvider.when('/', {
      templateUrl : 'templates/home.html',
      controller  : 'dashboardController'
    })

    .when('/dormitories', {
      templateUrl : 'templates/dormitories.html',
      controller  : 'dormitoriesController'
    })

    .when('/admins', {
      templateUrl : 'templates/admins.html',
      controller  : 'adminsController'
    })

    .when('/teachers', {
      templateUrl : 'templates/teachers.html',
      controller  : 'teachersController'
    })

    .when('/students', {
      templateUrl : 'templates/students.html',
      controller  : 'studentsController'
    })

    .when('/parents', {
      templateUrl : 'templates/stparents.html',
      controller  : 'parentsController'
    })

    .when('/classes', {
      templateUrl : 'templates/classes.html',
      controller  : 'classesController'
    })

    .when('/subjects', {
      templateUrl : 'templates/subjects.html',
      controller  : 'subjectsController'
    })

    .when('/newsboard', {
      templateUrl : 'templates/newsboard.html',
      controller  : 'newsboardController'
    })

    .when('/newsboard/:newsId', {
      templateUrl : 'templates/newsboard.html',
      controller  : 'newsboardController'
    })

    .when('/library', {
      templateUrl : 'templates/library.html',
      controller  : 'libraryController'
    })

    .when('/accountSettings/profile', {
      templateUrl : 'templates/accountSettings.html',
      controller  : 'accountSettingsController',
      methodName: 'profile'
    })

    .when('/accountSettings/email', {
      templateUrl : 'templates/accountSettings.html',
      controller  : 'accountSettingsController',
      methodName: 'email'
    })

    .when('/accountSettings/password', {
      templateUrl : 'templates/accountSettings.html',
      controller  : 'accountSettingsController',
      methodName: 'password'
    })

    .when('/classschedule', {
      templateUrl : 'templates/classschedule.html',
      controller  : 'classScheduleController'
    })

    .when('/attendance', {
      templateUrl : 'templates/attendance.html',
      controller  : 'attendanceController'
    })

    .when('/gradeLevels', {
      templateUrl : 'templates/gradeLevels.html',
      controller  : 'gradeLevelsController'
    })

    .when('/examsList', {
      templateUrl : 'templates/examsList.html',
      controller  : 'examsListController'
    })

    .when('/events', {
      templateUrl : 'templates/events.html',
      controller  : 'eventsController'
    })

    .when('/events/:eventId', {
      templateUrl : 'templates/events.html',
      controller  : 'eventsController'
    })

    .when('/assignments', {
      templateUrl : 'templates/assignments.html',
      controller  : 'assignmentsController'
    })

    .when('/materials', {
      templateUrl : 'templates/materials.html',
      controller  : 'materialsController'
    })

    .when('/mailsms', {
      templateUrl : 'templates/mailsms.html',
      controller  : 'mailsmsController'
    })

    .when('/messages', {
      templateUrl : 'templates/messages.html',
      controller  : 'messagesController'
    })

    .when('/messages/:messageId', {
      templateUrl : 'templates/messages.html',
      controller  : 'messagesController'
    })

    .when('/onlineExams', {
      templateUrl : 'templates/onlineExams.html',
      controller  : 'onlineExamsController'
    })

    .when('/calender', {
      templateUrl : 'templates/calender.html',
      controller  : 'calenderController'
    })

    .when('/transports', {
      templateUrl : 'templates/transportation.html',
      controller  : 'TransportsController'
    })

    .when('/settings', {
      templateUrl : 'templates/settings.html',
      controller  : 'settingsController',
      methodName: 'settings'
    })

    .when('/terms', {
      templateUrl : 'templates/settings.html',
      controller  : 'settingsController',
      methodName: 'terms'
    })

    .when('/media', {
      templateUrl : 'templates/media.html',
      controller  : 'mediaController'
    })

    .when('/static', {
      templateUrl : 'templates/static.html',
      controller  : 'staticController'
    })

    .when('/static/:pageId', {
      templateUrl: 'templates/static.html',
      controller: 'staticController'
    })

    .when('/attendanceStats', {
      templateUrl : 'templates/attendanceStats.html',
      controller  : 'attendanceStatsController'
    })

    .when('/polls', {
      templateUrl : 'templates/polls.html',
      controller  : 'pollsController'
    })

    .when('/mailsmsTemplates', {
      templateUrl : 'templates/mailsmsTemplates.html',
      controller  : 'mailsmsTemplatesController'
    })

    .when('/payments', {
      templateUrl : 'templates/payments.html',
      controller  : 'paymentsController'
    })

    .when('/languages', {
      templateUrl : 'templates/languages.html',
      controller  : 'languagesController'
    })

    .when('/upgrade', {
      templateUrl : 'templates/upgrade.html',
      controller  : 'upgradeController'
    })

    .when('/promotion', {
      templateUrl : 'templates/promotion.html',
      controller  : 'promotionController'
    })

    .when('/academicYear', {
      templateUrl : 'templates/academicYear.html',
      controller  : 'academicYearController'
    })

    .when('/staffAttendance', {
      templateUrl : 'templates/staffAttendance.html',
      controller  : 'staffAttendanceController'
    })

    .when('/reports', {
      templateUrl : 'templates/reports.html',
      controller  : 'reportsController'
    })

    .when('/vacation', {
      templateUrl : 'templates/vacation.html',
      controller  : 'vacationController'
    })
.when('/permissions', {
      templateUrl : 'templates/permissions.html',
      controller  : 'permissionsController'
    })
	.when('/mycampus', {
      templateUrl : 'templates/mycampus.html',
      controller  : 'mycampusController'
    })
	.when('/exammanagment', {
      templateUrl : 'templates/exammanagment.html',
      controller  : 'exammanagmentController'
    })
	.when('/inventory', {
      templateUrl : 'templates/inventory.html',
      controller  : 'inventoryController'
    })
	
	.when('/noticeboard', {
      templateUrl : 'templates/noticeboard.html',
      controller  : 'noticeboardController'
    })
	.when('/permanentachiev', {
      templateUrl : 'templates/permanentachiev.html',
      controller  : 'permanentachievController'
    })
	
    .otherwise({
      redirectTo:'/'
    });

});
schoex.factory('datateachersFactory', function($http) {
  var myteachersService = {
    httpRequest: function(url,method,params,dataPost) {
   var  teacherpromise= $http.post(url, dataPost, {
                        transformRequest: angular.identity,
                        headers: {'Content-Type': undefined}
                    }).then(function (response) {
        if(typeof response.data == 'string' && response.data != 1){
          $.gritter.add({
            title: 'School Application',
            text: response.data
          });
          return false;
        }
        if(response.data.jsMessage){
          $.gritter.add({
            title: response.data.jsTitle,
            text: response.data.jsMessage
          });
        }
        return response.data;
      },function(){
        $.gritter.add({
          title: 'School Application',
          text: 'An error occured while processing your request.'
        });
      });
      return teacherpromise;
    }
  };
  return myteachersService;
});
schoex.factory('dataFactory', function($http) {
  var myService = {
    httpRequest: function(url,method,params,dataPost,upload) {
      var passParameters = {};
      passParameters.url = url;

      if (typeof method == 'undefined'){
        passParameters.method = 'GET';
      }else{
        passParameters.method = method;
      }

      if (typeof params != 'undefined'){
        passParameters.params = params;
      }

      if (typeof dataPost != 'undefined'){
        passParameters.data = dataPost;
      }

      if (typeof upload != 'undefined'){
         passParameters.upload = upload;
      }

      var promise = $http(passParameters).then(function (response) {
        if(typeof response.data == 'string' && response.data != 1){
          if(response.data.substr('loginMark')){
              location.reload();
              return;
          }
          $.gritter.add({
            title: 'School Application',
            text: response.data
          });
          return false;
        }
        if(response.data.jsMessage){
          $.gritter.add({
            title: response.data.jsTitle,
            text: response.data.jsMessage
          });
        }
        return response.data;
      },function(){

        $.gritter.add({
          title: 'School Application',
          text: 'An error occured while processing your request.'
        });
      });
      return promise;
    }
  };
  return myService;
});
schoex.directive('datePicker', function($parse, $timeout){
    return {
        restrict: 'A',
        replace: true,
        transclude: false,
        compile: function(element, attrs) {
          return function (scope, slider, attrs, controller) {
            $(attrs.selector).datepicker();
          };
        }
    };
});
schoex.directive('ngEnter', function () {
    return function (scope, element, attrs) {
        element.bind("keydown keypress", function (event) {
            if(event.which === 13) {
                scope.$apply(function (){
                    scope.$eval(attrs.ngEnter);
                });

                event.preventDefault();
            }
        });
    };
});
schoex.directive('chatBox', function($parse, $timeout){
    return {
        restrict: 'A',
        replace: true,
        transclude: false,
        compile: function(element, attrs) {
          return function (scope, slider, attrs, controller) {
            $('#chat-box').slimScroll({
              height: '500px',alwaysVisible: true,start : "bottom"
            });
          };
        }
    };
});
schoex.directive('colorbox', function() {
  return {
    restrict: 'AC',
    link: function (scope, element, attrs) {
      var itemsVars = {transition:'elastic',title:attrs.title,rel:'gallery',scalePhotos:true};
      if(attrs.youtube){
          itemsVars['iframe'] = true;
          itemsVars['innerWidth'] = 640;
          itemsVars['innerHeight'] = 390;
      }
      if(attrs.vimeo){
          itemsVars['iframe'] = true;
          itemsVars['innerWidth'] = 500;
          itemsVars['innerHeight'] = 409;
      }
      if(!attrs.youtube && !attrs.vimeo){
          itemsVars['height'] = "100%";
      }
      $(element).colorbox(itemsVars);
    }
  };
});
schoex.directive('ckEditor', [function () {
    return {
        require: '?ngModel',
        link: function ($scope, elm, attr, ngModel) {
            var ck = CKEDITOR.replace(elm[0]);

            ck.on('pasteState', function () {
                $scope.$apply(function () {
                    ngModel.$setViewValue(ck.getData());
                });
            });

            ngModel.$render = function (value) {
                ck.setData(ngModel.$modelValue);
            };
        }
    };
}]);
schoex.directive('calendarBox', function($parse, $timeout){
    return {
        restrict: 'A',
        replace: true,
        transclude: false,
        compile: function(element, attrs) {
          return function (scope, slider, attrs, controller) {
            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                buttonText: {//This is to add icons to the visible buttons
                    prev: "Previous",
                    next: "Next",
                    today: 'today',
                    month: 'month',
                    week: 'week',
                    day: 'day'
                },
                //Random default events
                events: "calender"
            });
          };
        }
    };
});
schoex.directive('modal', function () {
return {
    template: '<div class="modal fade">' +
        '<div class="modal-dialog">' +
          '<div class="modal-content">' +
            '<div class="modal-header">' +
              '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>' +
              '<h4 class="modal-title">{{ modalTitle }}</h4>' +
            '</div>' +
            '<div class="modal-body" ng-transclude></div>' +
          '</div>' +
        '</div>' +
      '</div>',
    restrict: 'E',
    transclude: true,
    replace:true,
    scope:true,
    link: function postLink(scope, element, attrs) {
      scope.$watch(attrs.visible, function(value){
        if(value == true)
          $(element).modal('show');
        else
          $(element).modal('hide');
      });

      $(element).on('shown.bs.modal', function(){
        scope.$apply(function(){
          scope.$parent[attrs.visible] = true;
        });
      });

      $(element).on('hidden.bs.modal', function(){
        scope.$apply(function(){
          scope.$parent[attrs.visible] = false;
        });
      });
    }
  };
});

schoex.directive('scalendarBox', function($parse, $timeout){
    return {
        restrict: 'A',
        replace: true,
        transclude: false,
        compile: function(element, attrs) {
          return function (scope, slider, attrs, controller) {
            $('#scalendar').fullCalendar({
                events: "calender"
            });
          };
        }
    };
});
schoex.directive('tooltip', function(){
    return {
        restrict: 'A',
        link: function(scope, element, attrs){
          $(element).hover(function(){
              $(element).tooltip('show');
          }, function(){
              $(element).tooltip('hide');
          });
        }
    };
});
schoex.directive('fileModel', ['$parse', function ($parse) {
    return {
        restrict: 'A',
        link: function(scope, element, attrs) {
            var model = $parse(attrs.fileModel);
            var modelSetter = model.assign;
            
            element.bind('change', function(){
                scope.$apply(function(){
                    modelSetter(scope, element[0].files[0]);
                });
            });
        }
    };
}]);
schoex.directive('showtab',
    function () {
        return {
            link: function (scope, element, attrs) {
                element.click(function(e) {
                    e.preventDefault();
                    $(element).tab('show');
                });
            }
        };
    });


schoex.filter('object2Array', function() {
  return function(input) {
    var out = [];
    for(i in input){
      out.push(input[i]);
    }
    return out;
  }
});

function uploadSuccessOrError(response){
  if(typeof response == 'string' && response != 1){
    $.gritter.add({
      title: 'School Application',
      text: response
    });
    return false;
  }
  if(response.jsMessage){
    $.gritter.add({
      title: response.jsTitle,
      text: response.jsMessage
    });
  }
  if(response.jsStatus){
    if(response.jsStatus == "0"){
      return false;
    }
  }
  return response;
}

function successOrError(data){
  if(data.jsStatus){
    if(data.jsStatus == "0"){
      return false;
    }
  }
  return data;
}

//New Functions Implementation

function apiResponse(response,image){
    if(response.status){
        if(typeof response.title !== 'undefined'){
            if(response.status == "success"){
                if(typeof image !== 'undefined'){
                    $.gritter.add({
                      title: response.title,
                      text: response.message,
                      image: "../assets/img/gritter_"+image+".png"
                    });
                }else{
                    $.gritter.add({
                      title: response.title,
                      text: response.message
                    });
                }
            }
            if(response.status == "failed"){
                $.gritter.add({
                  title: response.title,
                  text: response.message,
                  image: "../assets/img/gritter_warning.png"
                });
            }
        }
        if(response.data){
            return response.data;
        }
    }else{
        return response;
    }
}

function apiModifyTable(originalData,id,response){
    angular.forEach(originalData, function (item,key) {
        if(item.id == id){
            originalData[key] = response;
        }
    });
    return originalData;
}

angular.module('myApp', []).controller('userCtrl', function($scope) {
$scope.taskName = '';
$scope.dueDate = '';
$scope.tasks = [
{id:1, taskName:'Review Paper', dueDate:"Oct.1" },
{id:2, taskName:'Mock Up',  dueDate:"Nov.7" },
{id:3, taskName:'Rough Draft',dueDate:"Dec.1" }
];
$scope.tasks2 = [
{id:1, taskName:'Review Paper', dueDate:"Oct.12" },
{id:2, taskName:'Assignment',  dueDate:"Nov.17" },
{id:3, taskName:'Assigment',dueDate:"Dec.11" }
];
$scope.tasks3 = [
{id:1, taskName:'Review Paper', dueDate:"Oct.30" },
{id:2, taskName:'Final Report',  dueDate:"Nov.25" },
{id:3, taskName:'Assigment',dueDate:"Dec.15" }
];

$scope.edit = true;
$scope.error = false;
$scope.incomplete = false; 

$scope.editUser = function(id) {
  if (id == 'new') {
    $scope.edit = true;
    $scope.incomplete = true;
    $scope.fName = '';
    $scope.lName = '';
    } else {
    $scope.edit = false;
    $scope.fName = $scope.tasks[id-1].fName;
    $scope.lName = $scope.tasks[id-1].lName; 
  }
};

$scope.save = function() {
$scope.tasks.push({id:$scope.index,  taskName:$scope.taskName,  dueDate: $scope.dueDate });
};


$scope.$watch('taskName', function() {$scope.test();});
$scope.$watch('dueDate', function() {$scope.test();});

$scope.test = function() {
  $scope.incomplete = false;
  if ($scope.edit && (!$scope.taskName.length ||
  !$scope.dueDate.length)) {
     $scope.incomplete = true;
  }
};


});

<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html>
	<head>
	<title>StudyLife</title>
	 <meta charset="utf-8">
	 <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	  <script src= "http://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script> 

	  <script src= "https://cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>	  
	  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.10/css/jquery.dataTables.min.css">
	  
	  </head>
	  
	  <!-- Custom styles for this template -->
    <link href="theme.css" rel="stylesheet">  
	<body ng-app="myApp" ng-controller="userCtrl">

		    <!-- Fixed navbar -->	
	<nav class="navbar navbar-inverse navbar-fixed-top header">
	  <div class="container-fluid">
		<div class="navbar-header">
		  <a class="navbar-brand" href="#">StudyLife</a>
		</div>
		<div>
		  <ul class="nav navbar-nav">
			<li><a href="#">Home</a></li>
			<li class="active"><a href="#">Courses</a></li>
			<li><a href="index_forum.php">Forum</a></li>
		  </ul>
		  <ul class="nav navbar-nav navbar-right">
		    <li id="welcome_user"><a style="color:white;"><span class="glyphicon glyphicon-user"></span>
			<?php 
				   //session_start();
				   if( isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true){
						echo 'Welcome, ' . $_SESSION['userName'] ;	
					}
					else
					{
						echo "You are not logged in";
					}
			?>
			</a></li>
			<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
		  </ul>
		</div>
	  </div>
	</nav>
	
	<div class="container">
	

	
	<br>
	
	<div class="col-md-3">
		  <ul class="nav nav-pills nav-stacked">
			<li id="header_pill" style="background-color:black;"><a style="color:white;">Courses Currently Taking</a></li>
			<li class="active"><a href="#csce444" data-toggle="pill">CSCE 444</a></li>
			<li><a href="#anth210" data-toggle="pill">ANTH 210</a></li>
			<li><a href="#eng110" data-toggle="pill">ENG 110</a></li>
		  </ul>
    </div>
	
	
		<div class="tab-content">
		
		<!--Course Information -->
		<div class="tab-pane fade in active" id="csce444">
		  
		<div class="col-md-9" >
			<div class="jumbotron">
			  <h3 style="text-align:center;">Course Information for CSCE 444</h3>
			  <p style="font-size:15px;text-align:center;">Learn about your course tasks, notes, and visit the forum to see what people are talking about.</p>
			</div>
		</div>
		  
		  <div>
			<ul class="nav nav-tabs" role="tablist">
			  <li role="presentation" class="active"><a href="#A" data-toggle="tab">Tasks</a></li>
			  <li role="presentation"><a href="#B" data-toggle="tab">Notes</a></li>
			  <li role="presentation"><a href="#C" data-toggle="tab">Forum </a></li>
			</ul>
		</div>
		  
		
		<div class="tab-content">
			<div class="tab-pane fade in active" id="A">
			
					
					 <!-- Table -->   
				  <table id="tasktable" class="display" cellspacing="0" width="100%" style="padding-top:5px;">
					<thead>
					  <tr>
						<th>#</th>
						<th>Task:</th>
						<th>Due Date</th>
						<th>Complete</th>
						<th>In Progress</th>
					  </tr>
					</thead>
					<tbody>
					  <tr ng-repeat="task in tasks">
						<td>{{ $index + 1 }}</td>
						<td>{{task.taskName}}</td>
						<td>{{task.dueDate}}</td>
						<td style="text-align:center; vertical-align:top"><label class="radio"><input type="radio" name="{{$index + 1}}"></label></td>
						<td style="text-align:center; vertical-align:top"><label class="radio"><input type="radio" name="{{$index + 1}}"></label></td>
					  </tr>
					</tbody>
				  </table>
				  
				  
				<!--  <button class="btn btn-success" ng-click="editUser('new')">
				  <span class="glyphicon glyphicon-tasks"></span> Create New Task
				</button> -->
				
				<hr>
				
				<h3 ng-show="edit">Create New Task:</h3>
				<h3 ng-hide="edit">Edit User:</h3>
				
				<form class="form-horizontal">
				<div class="form-group">
				  <label class="col-sm-2 control-label">Task:</label>
				  <div class="col-sm-10">
					<input type="text" ng-model="taskName" ng-disabled="!edit" placeholder="First Name">
				  </div>
				</div> 
				<div class="form-group">
				  <label class="col-sm-2 control-label">Due Date:</label>
				  <div class="col-sm-10">
					<input type="text" ng-model="dueDate" ng-disabled="!edit" placeholder="Last Name">
				  </div>
				</div>
				</form>
				
				<hr>
				<button class="btn btn-success" ng-disabled="error || incomplete" ng-click="save()">
				<span class="glyphicon glyphicon-save"></span>  Save Changes
				</button>

				<script src= "myTasks.js"></script>
			
		
			</div>
			<div class="tab-pane fade" id="B">Content inside tab B</div>
			<div class="tab-pane fade" id="C">
			
			<a class="item" href="create_topic.php">Create a topic</a> 
			<a class="item" href="create_cat.php">Create a category</a>
			
			
			</div>
		</div> <!-- tab-content -->
	    
	 </div>
	  
	  <!--Course Information -->
	  <div class="tab-pane fade" id="anth210"> <!--Course information for ANTH 210 start here -->
		
		<div class="col-md-9" >
			<div class="jumbotron">
			  <h3 style="text-align:center;">Course Information for ANTH 210</h3>
			  <p style="font-size:15px;text-align:center;">Learn about your course tasks, notes, and visit the forum to see what people are talking about.</p>
			</div>
		</div>
		  
		  <div>
			<ul class="nav nav-tabs" role="tablist">
			  <li role="presentation" class="active"><a href="#A" data-toggle="tab">Tasks</a></li>
			  <li role="presentation"><a href="#B" data-toggle="tab">Notes</a></li>
			  <li role="presentation"><a href="#C" data-toggle="tab">Forum </a></li>
			</ul>
		</div>
		  
		
		<div class="tab-content">
			<div class="tab-pane fade in active" id="A">
			
			
					 <!-- Table -->   
				  <table id="tasktable2" class="display" cellspacing="0" width="100%" style="padding-top:5px;">
					<thead>
					  <tr>
						<th>#</th>
						<th>Task:</th>
						<th>Due Date</th>
						<th>Complete</th>
						<th>In Progress</th>
					  </tr>
					</thead>
					<tbody>
					  <tr ng-repeat="task in tasks2">
						<td>{{ $index + 1 }}</td>
						<td>{{task.taskName}}</td>
						<td>{{task.dueDate}}</td>
						<td style="text-align:center; vertical-align:top"><label class="radio"><input type="radio" name="{{$index + 1}}"></label></td>
						<td style="text-align:center; vertical-align:top"><label class="radio"><input type="radio" name="{{$index + 1}}"></label></td>
					  </tr>
					</tbody>
				  </table>
				  
				  
				<!--  <button class="btn btn-success" ng-click="editUser('new')">
				  <span class="glyphicon glyphicon-tasks"></span> Create New Task
				</button> -->
				
				<hr>
				
				<h3 ng-show="edit">Create New Task:</h3>
				<h3 ng-hide="edit">Edit User:</h3>
				
				<form class="form-horizontal">
				<div class="form-group">
				  <label class="col-sm-2 control-label">Task:</label>
				  <div class="col-sm-10">
					<input type="text" ng-model="taskName" ng-disabled="!edit" placeholder="First Name">
				  </div>
				</div> 
				<div class="form-group">
				  <label class="col-sm-2 control-label">Due Date:</label>
				  <div class="col-sm-10">
					<input type="text" ng-model="dueDate" ng-disabled="!edit" placeholder="Last Name">
				  </div>
				</div>
				</form>
				
				<hr>
				<button class="btn btn-success" ng-disabled="error || incomplete" ng-click="save()">
				<span class="glyphicon glyphicon-save"></span>  Save Changes
				</button>

				<script src= "myTasks.js"></script>
			
		
			</div>
			<div class="tab-pane fade" id="B">Content inside tab B</div>
			<div class="tab-pane fade" id="C">
			
			<a class="item" href="create_topic.php">Create a topic</a> 
			<a class="item" href="create_cat.php">Create a category</a>
			
			
			 </div>
		</div> <!-- tab-content --> 
	  </div>
	  
	  
	  <div class="tab-pane fade" id="eng110"> <!--Course information for ENG 110 start here -->
		
		<div class="col-md-9" >
			<div class="jumbotron">
			  <h3 style="text-align:center;">Course Information for ENG 110</h3>
			  <p style="font-size:15px;text-align:center;">Learn about your course tasks, notes, and visit the forum to see what people are talking about.</p>
			</div>
		</div>
		  
		  <div>
			<ul class="nav nav-tabs" role="tablist">
			  <li role="presentation" class="active"><a href="#A" data-toggle="tab">Tasks</a></li>
			  <li role="presentation"><a href="#B" data-toggle="tab">Notes</a></li>
			  <li role="presentation"><a href="#C" data-toggle="tab">Forum </a></li>
			</ul>
		</div>
		  
		
		<div class="tab-content">
			<div class="tab-pane fade in active" id="A">
			
			
					 <!-- Table -->   
				  <table id="tasktable3" class="display" cellspacing="0" width="100%" style="padding-top:5px;">
					<thead>
					  <tr>
						<th>#</th>
						<th>Task:</th>
						<th>Due Date</th>
						<th>Complete</th>
						<th>In Progress</th>
					  </tr>
					</thead>
					<tbody>
					  <tr ng-repeat="task in tasks3">
						<td>{{ $index + 1 }}</td>
						<td>{{task.taskName}}</td>
						<td>{{task.dueDate}}</td>
						<td style="text-align:center; vertical-align:top"><label class="radio"><input type="radio" name="{{$index + 1}}"></label></td>
						<td style="text-align:center; vertical-align:top"><label class="radio"><input type="radio" name="{{$index + 1}}"></label></td>
					  </tr>
					</tbody>
				  </table>
				<hr>
				
				<h3 ng-show="edit">Create New Task:</h3>
				<h3 ng-hide="edit">Edit User:</h3>
				
				<form class="form-horizontal">
				<div class="form-group">
				  <label class="col-sm-2 control-label">Task:</label>
				  <div class="col-sm-10">
					<input type="text" ng-model="taskName" ng-disabled="!edit" placeholder="First Name">
				  </div>
				</div> 
				<div class="form-group">
				  <label class="col-sm-2 control-label">Due Date:</label>
				  <div class="col-sm-10">
					<input type="text" ng-model="dueDate" ng-disabled="!edit" placeholder="Last Name">
				  </div>
				</div>
				</form>
				
				<hr>
				<button class="btn btn-success" ng-disabled="error || incomplete" ng-click="save()">
				<span class="glyphicon glyphicon-save"></span>  Save Changes
				</button>

				<script src= "myTasks.js"></script>
			
		
			</div>
			<div class="tab-pane fade" id="B">Content inside tab B, this is where the notes should go</div><!--Notes should go inside this div -->
			<div class="tab-pane fade" id="C">
			
			<a class="item" href="create_topic.php">Create a topic</a> 
			<a class="item" href="create_cat.php">Create a category</a>
			
			
			 </div>
		</div> <!-- tab-content --> 
		
	  
	  </div>
	</div>

	
	
	
	</div>
	
	<script>
	$(document).ready(function(){
		$('#tasktable').DataTable();
		$('#tasktable2').DataTable();
		$('#tasktable3').DataTable();
	});
	</script>

	</body>
</html>

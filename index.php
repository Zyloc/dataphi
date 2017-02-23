<?php
  require_once(realpath(dirname(__FILE__).'/functions/addPatient.php'));
  require_once(realpath(dirname(__FILE__).'/functions/fetchData.php'));
?>
<!DOCTYPE html>
<html>
<head>
	<title>Dataphi Labs</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/Lobibox.min.css"/>
</head>
<body>
	<?php
		if($_SERVER['REQUEST_METHOD'] == 'POST'){	
			try{
				insertPatient($conn,$_POST);   
			}
			catch(Exception $e){
			// trigger error message to input data properly
			echo $e->getMessage();   
			}
		}
		$result = fetchData($conn);
	?>
<header class="header-basic-light">
	<div class="header-limiter">
		<h1><a href="#"><img src="images/logo.png"></a></h1>
		<nav>
			<a href="#">Home</a>
			<a href="#" data-toggle="modal" data-target="#myModalHorizontal">Register</a>
			<a href="#">Pricing</a>
			<a href="#">About</a>
			<a href="#">Faq</a>
			<a href="#">Contact</a>
		</nav>
	</div>

</header>
<div class="modal fade" id="myModalHorizontal" tabindex="-1" role="dialog" 
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" 
                   data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    Patient Information
                </h4>
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
                <form class="form-horizontal" role="form" method="POST" action="index.php">
                  <div class="form-group">
                    <div class="col-sm-10">
                        <input type="text" name="firstname" class="form-control" 
                        id="firstname" placeholder="First name ..."/>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-10">
                        <input type="text" name="lastname" class="form-control" 
                        id="lastname" placeholder="Last name ..."/>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-10">
                        <input type="text" name="age" class="form-control" 
                        id="age" placeholder="Age ..."/>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-10">
                        <select class="form-control" id="gender" name="gender">
						<option value="notselected"> Gender</option>
						<option value="M">Male</option>
						<option value="F">Female</option>
						<option value="O">Other</option>
						</select>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-10">
						<div class="input-group date" data-provide="datepicker">
							<input type="text" class="form-control" name="dob">
							<div class="input-group-addon">
								<span class="glyphicon glyphicon-th"></span>
							</div>
						</div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-10">
                        <input type="text" name="phone" class="form-control" 
                        id="phone" placeholder="Phone ..."/>
                    </div>
                  </div>
                  <div class="form-group">
                    <textarea style="height: 100px;padding: 2%" name="info" placeholder="About patient..." class="form-about-yourself form-control" id="form-about-yourself"></textarea>
                  </div>
                  <button type="submit" onclick="validate()" class="btn btn-primary"> Submit </button>
                </form>
            </div>
            
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="col-md-8 col-md-offset-2" style="margin-top:2%">	
	<div class="form-group pull-right">
		<input type="text" class="search form-control" placeholder="Whom are you looking for?" style="height: 40px">
	</div>
	<span class="counter pull-right"></span>
	<table class="table table-hover table-bordered results" id="listOfPatient">
		<thead>
			<tr>
				<th>#</th>
				<th class="col-md-4 col-xs-4">Name</th>
				<th class="col-md-3 col-xs-3">Age</th>
				<th class="col-md-3 col-xs-3">Date of Birth</th>
				<th class="col-md-3 col-xs-3">Gender</th>
				<th class="col-md-3 col-xs-3">Phone</th>
			</tr>
			<tr class="warning no-result">
				<td colspan="4"><i class="fa fa-warning"></i> No result</td>
			</tr>
		</thead>
		<tbody>
		<?php 
			$count = 1;
			foreach($result as $row){
				?>
				<tr><td> <?php echo $count ?> </td>
				<td> <?php echo $row['firstname']." ".$row['lastname'] ?></td>
				<td> <?php echo $row['age'] ?> </td>
				<td> <?php echo $row['dob'] ?> </td>
				<?php 
					if($row['gender'] == 'M'){
						echo "<td> Male </td>";
					}
					else if($row['gender'] == 'F'){
						echo "<td> Female </td>";
					}
					else{
						echo "<td> Other </td>";
					}?>
				<td> <?php echo $row['phone']; ?> </td>
				</tr>
				<?php 
				$count++;
			}
		?>
		</tbody>
	</table>
</div>	
<div class="col-sm-12">
    <hr />
        <div class="text-center center-block">
            <p class="txt-railway"> Dataphi <span style="color:blue">Labs</span></p>
            <br />
                <a href="https://www.facebook.com/bootsnipp"><i class="fa fa-facebook-square fa-3x social"></i></a>
	            <a href="https://twitter.com/bootsnipp"><i class="fa fa-twitter-square fa-3x social"></i></a>
	            <a href="https://plus.google.com/+Bootsnipp-page"><i class="fa fa-google-plus-square fa-3x social"></i></a>
	            <a href="mailto:bootsnipp@gmail.com"><i class="fa fa-envelope-square fa-3x social"></i></a>
</div>
    <hr />
</div>
<script src="http://cdn.tutorialzine.com/misc/enhance/v3.js" async></script>
<script src="js/Lobibox.min.js"></script>
<script src="js/search.js"></script>
<script>  
	//Lobibox.alert("error",{msg:"Please enter a valid name"});
</script>
</body>
</html>
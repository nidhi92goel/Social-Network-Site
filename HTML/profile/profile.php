<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style>
		body { padding-bottom: 60px; }
		.thumbnail {
			position: relative;
			width: 200px;
			height: 200px;
			overflow: hidden;
		}
		.thumbnail img {
			position: absolute;
			left: 50%;
			top: 50%;
			height: 100%;
			width: auto;
			-webkit-transform: translate(-50%,-50%);
			-ms-transform: translate(-50%,-50%);
			transform: translate(-50%,-50%);
		}
		.thumbnail img.portrait {
			width: 100%;
			height: auto;
		}
		.avatar{
			width:200px;
			height:200px;
			object-fit: cover;
			overflow: hidden;
			display: block;
			margin-left: auto;
			margin-right: auto;
			border-color:#D8D8D8;
		}
		.btn-theme{
			background:#CD9CB0;
			color:#FFFFFF;
			border: 2px solid #ddcfe7;

		}
		.btn-home{
			background:#FFC1C1;
			color:#FFFFFF;
			font-weight:bold;
		}
		.btn-file{
			background:#CD9CB0;
			color:#FFFFFF;
			border: 2px solid #ddcfe7;	
		}

		.text-table-right{
			padding-right:50px;
			text-align: right;
		}
		.text-table-left{
			padding-left:20px;
			text-align:left;
		}
		table {
			border-collapse: separate;
			border-spacing: 50px 0;
		}
		th, td {
			padding: 5px;
		}
		body .modal-dialog {
			/* new custom width */
			width: 750px;
		}
	</style>

</head>
<body>
	<?php
	$connection = mysqli_connect("localhost:3306", "root", "", "webbuds");

	if (mysqli_connect_errno())
		echo 'Failed to connect to the MySQL server: '. mysqli_connect_error();
// Set session variables
	$_SESSION["userID"] = "1";
	$query = "SELECT a.email,b.* FROM accounts as a INNER JOIN users as b ON a.userID = b.userID where b.userID = '{$_SESSION['userID']}'";
	$result = mysqli_query($connection,$query)
	or die('Error making select users query' . mysql_error());
	$query_privacy_birthday = "SELECT * from user_settings where userID = '{$_SESSION['userID']}' and settingID = '1' ";
	$privacy_bday = mysqli_query($connection,$query_privacy_birthday)
	or die ('Error making select users query' . mysql_error());
	$query_privacy_email = "SELECT * from user_settings where userID = '{$_SESSION['userID']}' and settingID = '2'";
	$privacy_email = mysqli_query($connection,$query_privacy_email)
	or die ('Error making select users query' . mysql_error());
	$query_privacy_gender = "SELECT * from user_settings where userID = '{$_SESSION['userID']}' and settingID = '3'";
	$privacy_gender = mysqli_query($connection,$query_privacy_gender)
	or die ('Error making select users query' . mysql_error());
	$row = mysqli_fetch_assoc($result);
	$row_bday= mysqli_fetch_assoc($privacy_bday);
	$row_email = mysqli_fetch_assoc($privacy_email);
	$row_gender = mysqli_fetch_assoc($privacy_gender);
	?>
	<div class="container-fluid">
		<h2>Profile  
			<a href="../home/home.html" type="button" class="btn btn-home"><span class="glyphicon glyphicon-home"></span><strong> Back to home page</strong></a>
		</h2>
		<?php
		if($row['imageData'] == NULL){
			echo '<img class="thumbnail img-responsive avatar" id = "Profile_img" src="assets/Profile_Default.png"/>';
		}else{
			echo '<img class="thumbnail img-responsive avatar" id = "Profile_img" src="data:image/jpeg;base64, '.base64_encode($row['imageData']).'"/>';
		}
		?>
		<div class='wrapper text-center'>
			<div class="btn-group">
				<a tabindex="0" class="btn btn-theme" role="button" data-toggle="popover" data-trigger="focus" data-placement="left"><span class="glyphicon glyphicon-camera"></span><strong>  Change/Remove Profile Picture</strong></a>
				<button type="button" class="btn btn-theme" data-toggle="modal" data-target="#ProfileModal"><span class="glyphicon glyphicon-edit"></span><strong> Edit Profile</strong></button>
				<button type="button" class="btn btn-theme" data-toggle="modal" data-target="#PasswordModal"><span class="glyphicon glyphicon-lock"></span><strong>  Change Password</strong></a>
				</div>
			</div>
			<br>
			<div class="text-center">
				<table style="margin: 0px auto;">
					<tr>
						<td style="color:#ac3973"><strong>First Name</strong></td>
						<td>
							<?php
							echo $row['name'];
							?>
						</td> 
					</tr>
					<tr></tr>
					<tr>
						<td style="color:#ac3973"><strong>Surname</strong></td>
						<td>
							<?php
							echo $row['surname'];
							?></td>
						</tr>
						<tr>
							<td style="color:#ac3973"><strong>Birthday</strong></td>
							<td>
								<?php
								echo date("d F Y", strtotime($row['birthday']));
								?>
							</td>
						</tr>
						<tr>
							<td style="color:#ac3973"><strong>Email</strong></td>
							<td><?php
								echo $row['email'];
								?></td>
							</tr>
							<tr>
								<td style="color:#ac3973"><strong>Gender</strong></td>
								<td><?php
									echo $row['gender'];
									?></td>
								</tr>
							</table>
						</div>

						<div class="modal fade" id="ProfileModal" tabindex="-1" role="dialog" aria-labelledby="Edit Profile" aria-hidden="true">
							<div class="modal-dialog modal-lg">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
										<h5 class="modal-title">Edit your profile</h5>
									</div>
									<div class="modal-body">
										<!-- The form is placed inside the body of modal -->
										<form id="ProfileForm" method="post" class="form-horizontal text-center" action = "update.php">
											<div class="form-group">
												<label class="col-xs-3 control-label">First Name</label>
												<div class="col-xs-5">
													<input type="text" class="form-control" name="name" id="name" value="<?php echo $row['name'];?>"/>
												</div>
											</div>
											<div class="form-group">
												<label class="col-xs-3 control-label">Surname</label>
												<div class="col-xs-5">
													<input type="text" class="form-control" name="surname" id="surname" value="<?php echo $row['surname'];?>"/>
												</div>
											</div>
											<div class="form-group">
												<label class="col-xs-3 control-label" >Birthday</label>
												<div class="col-xs-5">
													<input type="date" class="form-control" name="birthday" id="birthday" value="<?php echo date("Y-m-d", strtotime($row['birthday']));?>"/>
												</div>
												<label class="col-xs-1 control-label">Privacy</label>
												<div class="col-xs-3">
													<select class="form-control" id="sel1" name="privacy_birthday">
														<option value='public' <?php echo ($row_bday['status']=='public')?'selected="selected"':'' ?>>Public</option>
														<option value='friends of friends' <?php echo ($row_bday['status']=='friends of friends')?'selected="selected"':'' ?>>Friends of friends</option>
														<option value='friends' <?php echo ($row_bday['status']=='friends')?'selected="selected"':'' ?>>Friends</option>
														<option value='friends in circles' <?php echo ($row_bday['status'] == 'friends in circles')?'selected="selected"':'' ?>>Friends in circles</option>
														<option value='only me' <?php echo ($row_bday['status']=='only me')?'selected="selected"':'' ?>>Only me</option>
													</select>
												</div>
											</div>
											<div class="form-group">
												<label class="col-xs-3 control-label" >Email</label>
												<div class="col-xs-5">
													<input type="email" class="form-control" name="email" id = "email" value="<?php echo $row['email'];?>" disabled/>
												</div>
												<label class="col-xs-1 control-label">Privacy</label>
												<div class="col-xs-3">
													<select class="form-control" id="sel2" name="privacy_email">
														<option value="public" <?php echo ($row_email['status']=='public')?'selected="selected"':'' ?>>Public</option>
														<option value="friends of friends" <?php echo ($row_email['status']=='friends of friends')?'selected="selected"':'' ?>>Friends of friends</option>
														<option value="friends" <?php echo ($row_email['status']=='friends')?'selected="selected"':'' ?>>Friends</option>
														<option value="friends in circles" <?php echo ($row_email['status']=='friends in circles')?'selected="selected"':'' ?>>Friends in circles</option>
														<option value="only me" <?php echo ($row_email['status']=='only me')?'selected="selected"':'' ?>>Only me</option>
													</select>
												</div>
											</div>
											<div class="form-group">
												<label class="col-xs-3 control-label">Gender</label>
												<div class="col-xs-5">
													<label class="radio-inline"><input type="radio" name="gender" id="gender" value="Female" <?php echo ($row['gender']=='Female')?'checked':'' ?>>Female</label>
													<label class="radio-inline"><input type="radio" id = "gender" name="gender" value = "Male" <?php echo ($row['gender']=='Male')?'checked':'' ?>>Male</label>
													<label class="radio-inline"><input type="radio" id = "gender" name="gender" value="Prefer not to say" <?php echo ($row['gender']=='Prefer not to say')?'checked':''   ?>>Prefer not to say</label>
												</div>
												<label class="col-xs-1 control-label">Privacy</label>
												<div class="col-xs-3">
													<select class="form-control" id="sel3" name="privacy_gender">
														<option value="public" <?php echo ($row_gender['status']=='public')?'selected="selected"':'' ?>>Public</option>
														<option value='friends of friends' <?php echo ($row_gender['status']=='friends of friends')?'selected="selected"':'' ?>>Friends of friends</option>
														<option value='friends' <?php echo ($row_gender['status']=='friends')?'selected="selected"':'' ?>>Friends</option>
														<option value='friends in circles' <?php echo ($row_gender['status']=='friends in circles')?'selected="selected"':'' ?>>Friends in circles</option>
														<option value='only me' <?php echo ($row_gender['status']=='only me')?'selected="selected"':'' ?>>Only me</option>
													</select>
												</div>
											</div>
											<div class="form-group">
												<div class="col-xs-5 col-xs-offset-3">
													<button type="submit" name="submit" class="btn btn-primary" onclick="return alert('Changes saved!')">Save profile</button>
													<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
						<div class="modal fade" id="PasswordModal" tabindex="-1" role="dialog" aria-labelledby="Change Password" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
										<h5 class="modal-title">Change password</h5>
									</div>
									<div style="margin: 0 auto 0 auto;">
										<div class="modal-body text-center">
											<!-- The form is placed inside the body of modal -->
											<form id="PasswordForm" method="post" class="form-horizontal" action="password.php">
												<div class="form-group">
													<label class="col-xs-3 control-label">Please enter your old password: </label>
													<div class="col-xs-5">
														<input type="password" class="form-control" name="old_password"/>
													</div>
												</div>
												<div class="form-group">
													<label class="col-xs-3 control-label">Please enter your new password: <br>(at least 6 characters)</label>
													<div class="col-xs-5">
														<input type="password" class="form-control" name="new_password" />
													</div>
												</div>
												<div class="form-group">
													<label class="col-xs-3 control-label" >Please enter the new password again:</label>
													<div class="col-xs-5">
														<input type="password" class="form-control" name="new_password_second"/>
													</div>
												</div>
												<div class="form-group">
													<div class="col-xs-5 col-xs-offset-3">
														<button type="submit" class="btn btn-primary" name="submit" onclick="return confirm('Do you wish to update your password?');return false;">Submit</button>
														<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="modal fade" id="UploadModal" tabindex="-1" role="dialog" aria-labelledby="Change Photo" aria-hidden="true">
							<div class="modal-dialog modal-sm">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
										<h5 class="modal-title">Change photo</h5>
									</div>
									<div style="margin: 0 auto 0 auto;">
										<div class="modal-body text-center">
										<form  id = "UploadForm" method="post" enctype="multipart/form-data"  action="save.php">
										<div class="form-group">
											<div class="text-center">
													<input type="file" name = "imgInput" data-iconName="glyphicon glyphicon-inbox" id="imgInput">
													<img id='img-upload' class="avatar"/>
												</div>
										</div>
												<div class="form-group">
												<div class="text-right">
													<button type="submit" name="submit"  class="btn btn-theme" data-dismiss="modal" onclick="return confirm('Do you wish to update your profile picture?');return false;" >Submit</button>
													<button type="button" class="btn btn-default"  data-dismiss="modal">Cancel</button>
												</div>
												</div>
										</form>

										</div>
									</div>
								</div>
							</div>
						</div>
						<script>
							var url = "";
							var popupElement='<div class="btn-group-vertical"> <button type="button" class="btn btn-default" data-toggle="modal" data-target="#UploadModal"><span class="glyphicon glyphicon-upload" ></span> Change Photo</button> <button type="button" class="btn btn-danger" onclick="Delete()"><span class="glyphicon glyphicon-remove"></span> Remove Photo</button></div>';
							$(document).ready(function(){
								$('[data-toggle="popover"]').popover({
									animation: true,
									content: popupElement,
									html: true
								});

								$(document).on('change', '.btn-file :file', function() {
									var input = $(this),
									label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
									input.trigger('fileselect', [label]);
								});

								$('.btn-file :file').on('fileselect', function(event, label) {

									var input = $(this).parents('.input-group').find(':text'),
									log = label;

									if( input.length ) {
										input.val(log);
									} else {
										if( log ) alert(log);
									}

								});
								function readURL(input) {
									if (input.files && input.files[0]) {
										var reader = new FileReader();

										reader.onload = function (e) {
											$('#img-upload').attr('src', e.target.result);
											url = e.target.result;
										}

										reader.readAsDataURL(input.files[0]);
									}
								}

								$("#imgInput").change(function(){
									readURL(this);
								});      

							});
							function Delete(){
								var r = confirm("Are you sure you want to delete this photo?");
								if(r == true){
									window.location.href = "delete.php";
								}
							};
							function Save(){
								window.location.href = "save.php";
							}





						</script>
					</body>

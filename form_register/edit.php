<?php

require 'user.php';

require 'check_input_update.php';

$userObj = new User();

if (isset($_GET['editId']) && !empty($_GET['editId'])) {
    $editId = $_GET['editId'];
    $user = $userObj->displyaRecordById($editId);
    $language = trim($user['languages']);
    $arrlanguage = preg_split('/\s+/', $language);
  
}
// if data is valid 
if ($_inputvalid_U_firstname == 1 && $_inputvalid_U_lastname == 1 && $_inputvalid_U_gender == 1 && $_inputvalid_U_addr == 1 && $_inputvalid_U_checkbox == 1){
	if (isset($_POST['update'])) {
	$id = $_POST['editId'];
	$userObj->updateRecord($firstname_update,$lastname_update,$addr_update,$gender_update,$description_update,$language_update,$id);
	}
}
// setup gender
 $gender = "";

if(empty($user['gender'])){
	$gender = $gender_update;
}else{
	$gender = $user['gender'];
}

if(empty($arrlanguage)){
	$arrlanguage = $arrlanguage_update;
}else{
	$arrlanguage = preg_split('/\s+/', trim($user['languages']));
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit</title>
	<style>
	.error {color: #FF0000;}
	</style>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<a class="navbar-brand" href="index.php">Navbar</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
		<li class="nav-item active">
			<a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
		</li>
		</ul>
	</div>
	</nav>
	<div class="row">
		<div class="col-sm-3">			
		</div>
		<div class="col-sm-6">
           
			<form action="edit.php" method="post" >
            <h2 form-group>Edit</h2>
					<input style="display: none;" type="text" name="editId" value="<?php echo $user['id']?>"/>
				<div class="form-group row">
					<label for="firstname" class="col-sm-3 col-form-label">First Name</label>
					<div class="col-sm-9">
					<span class="error"><?php echo $firstnameErr_update;?></span>
						<input type="text" name="firstname_update" class="form-control" id="firstname" placeholder="First Name"
						value="<?php echo $user['firstname']??$firstname_update?>" >
					</div>
				</div>
				<div class="form-group row">
					<label for="lastname" class="col-sm-3 col-form-label">Last Name</label>
					<div class="col-sm-9">
					<span class="error"><?php echo $lastnameErr_update;?></span>
						<input type="text" name="lastname_update" class="form-control" id="lastname" placeholder="Last Name"
						value="<?php echo $user['lastname']??$lastname_update?>">
					</div>
				</div>
                <!-- <div class="form-group row">
					<label for="email" class="col-sm-3 col-form-label">Email</label>
					<div class="col-sm-9">
						<input type="text" name="email_update" class="form-control" id="email" placeholder="Email"
						value="<?php echo $user['email']??$email_update?> " disabled>
					</div>
				</div> -->
                <div class="form-group row">
					<label for="addr" class="col-sm-3 col-form-label">Address</label>
					<div class="col-sm-9">
					<span class="error"><?php echo $addrErr_update;?></span>
						<input type="text" name="addr_update" class="form-control" id="addr" placeholder="Address"
						value="<?php echo $user['addr']??$addr_update?>">
					</div>
				</div>
                <!-- <div class="form-group row">
				
					<label for="phone" class="col-sm-3 col-form-label">Phone Number</label>
					<div class="col-sm-9">
						<input type="text" name="phone_update" class="form-control" id="phone" placeholder="Phone Number"
						value="<?php echo $user['phone']??$phone_update?> "disabled>
					</div>
				</div>                 -->
                <div class="form-group row">
                    <label for="textarea"class="col-sm-3 col-form-label">Description</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" name="description_update" id="textarea" rows="3"
						><?php echo $user['descriptions']??$description_update?></textarea>
                    </div>
                   
                </div>
				<fieldset class="form-group">
					<div class="row">
						<legend class="col-form-label col-sm-3 pt-0"> Gender</legend>
						<div class="col-sm-9">
						<span class="error"><?php echo $genderErr_update;?></span>
							<div class="form-check">
								<input class="form-check-input" type="radio" name="gender_update" id="gridRadios1" value="male"
								<?php 
									if($gender==1){
										echo 'checked';
									}?>>
								<label class="form-check-label" for="gridRadios1">Male</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="radio" name="gender_update" id="gridRadios2" value="female"
								<?php  
									if($gender==0){
										echo 'checked';
									}?>>
								<label class="form-check-label" for="gridRadios2">Female</label>
							</div>						
						</div>
					</div>
				</fieldset>
				<div class="form-group row">
					<div class="col-sm-3">Language you want to learn</div>
					<div class="col-sm-9">
					<span class="error"><?php echo $languageErr_update;?></span>
						<div class="form-check">						
							<input class="form-check-input" name="chk_update[]" value="PHP" type="checkbox" id="Check1"
							<?php if($arrlanguage != ""){
									foreach($arrlanguage as $item){
										if($item == "PHP"){
											echo "checked";
										}
									}
									}
							?>
							>
							<label class="form-check-label" for="Check1">PHP</label>
						</div>					
						<div class="form-check">
							<input class="form-check-input" name="chk_update[]" value="JAVA" type="checkbox" id="Check2"
							<?php if($arrlanguage != ""){
									foreach($arrlanguage as $item){
										if($item == "JAVA"){
											echo "checked";
										}
									}
									}?>>
							<label class="form-check-label" for="Check2">Java</label>
						</div>
				
						<div class="form-check">
							<input class="form-check-input" name="chk_update[]" value="CSHARP" type="checkbox" id="Check3"
							<?php if($arrlanguage != ""){
									foreach($arrlanguage as $item){
										if($item == "CSHARP"){
											echo "checked";
										}
									}
									}?>>
							<label class="form-check-label" for="Check3">Csharp</label>
						</div>
					</div>
				</div>
				<div class="form-group row">
					<div class="col-sm-9">
						<input type="submit" name="update" class="btn btn-primary"  value="Update"/>
						<a  href="http://localhost:81/my_web_pages/form_register/" class="btn btn-danger">cancel</a>
						
					</div>
				</div>
			</form>
		</div>
		<div class="col-sm-3">
		</div>
	</div>

</body>

</html>
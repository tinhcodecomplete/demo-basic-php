<?php
require 'user.php';

require 'check_input_add.php';
if ($_inputvalidfirstname == 1 && $_inputvalidlastname == 1 && $_inputvalidphone == 1 && $_inputvalidemail == 1 && $_inputvalidgender == 1 && $_inputvalidaddr == 1 && $_inputvalidcheckbox == 1){
	$user = new User();
	if($user->isExistEmail($email)==false && $user->isExistPhone($phone)==false){
		include 'upload_image.php';
		
		$user->insertData($firstname,$lastname,$email,$phone,$addr,$gender,$description,$language,$target_file);
	}else{		
		if($user->isExistEmail($email)==true){
			$emailErr = "Email da ton tai!";}
		if($user->isExistPhone($phone)==true){
			$phoneErr = "So dien thoai da ton tai!";
		}		
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Add </title>
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
		<div class="col-sm-3">	</div>
		<div class="col-sm-6">           
			<form action="add.php" method="post"  enctype="multipart/form-data">
            <h2 form-group>Form Add</h2>
			<p><span class="error">* required field</span></p>
				<div class="form-group row">
					<div class="col-sm-3">						
						<label for="firstname" class=" col-form-label">First Name</label>
						<span class="error">*</span>
					</div>					
					<div class="col-sm-9">
					    <span class="error"><?php echo $firstnameErr; ?></span>
						<input type="text" name="firstname" class="form-control" id="firstname" placeholder="First Name"
						value="<?php echo $firstname?>" >
					</div>
				</div>
				<div class="form-group row">
					<div class="col-sm-3">						
						<label for="lastname" class=" col-form-label">Last Name</label>
						<span class="error">*</span>
					</div>					
					<div class="col-sm-9">
					    <span class="error"><?php echo $lastnameErr;?></span>
						<input type="text" name="lastname" class="form-control" id="lastname" placeholder="Last Name"
						value="<?php echo $lastname?>">
					</div>
				</div>
                <div class="form-group row">
					<div class="col-sm-3">						
						<label for="email" class="col-form-label">Email</label>
						<span class="error">*</span>
					</div>					
					<div class="col-sm-9">
					    <span class="error"><?php echo $emailErr;?></span>
						<input type="text" name="email" class="form-control" id="email" placeholder="Email"
						value="<?php echo $email?>">
					</div>
				</div>
                <div class="form-group row">
					<div class="col-sm-3">						
						<label for="addr" class="col-form-label">Address</label>
						<span class="error">*</span>
					</div>
					<div class="col-sm-9">
					    <span class="error"><?php echo $addrErr;?></span>
						<input type="text" name="addr" class="form-control" id="addr" placeholder="Address"
						value="<?php echo $addr?>">
					</div>
				</div>
                <div class="form-group row">
					<div class="col-sm-3">						
						<label for="phone" class="col-form-label">Phone Number</label>
						<span class="error">*</span>
					</div>
					<div class="col-sm-9">
					    <span class="error"><?php echo $phoneErr;?></span>
						<input type="text" name="phone" class="form-control" id="phone" placeholder="Phone Number"
						value="<?php echo $phone?>">
					</div>
				</div>                
                <div class="form-group row">
					<div class="col-sm-3">						
					<label for="textarea"class="col-form-label">Description</label>
					</div>
                    <div class="col-sm-9">
                        <textarea class="form-control" name="description" id="textarea" rows="3"
						><?php echo $description?></textarea>
                    </div>                   
                </div>
				<div class="form-group row">
					<div class="col-sm-3">						
						<label for="customFile"class="col-form-label">Image</label>
					</div>
                    <div class="col-sm-9">
						<input type="file" id="iamge" name="fileToUpload" class="form-control" id="customFile"
						value="<?php echo $image_name?>" />
                    </div>                   
                </div>
				<fieldset class="form-group">
					<div class="row">						
						<div class="col-sm-3">Gender <span class="error">*</span></div>
						<div class="col-sm-9">
						    <span class="error"><?php echo $genderErr;?></span>
							<div class="form-check">
								<input class="form-check-input" type="radio" name="gender" id="gridRadios1" value="male"
								<?php if (isset($gender) && $gender==1) echo "checked";?>>
								<label class="form-check-label" for="gridRadios1">Male</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="radio" name="gender" id="gridRadios2" value="female"
								<?php if (isset($gender) && $gender==0) echo "checked";?>>
								<label class="form-check-label" for="gridRadios2">Female</label>
							</div>						
						</div>
					</div>
				</fieldset>
				<div class="form-group row">
					<div class="col-sm-3">Language you want to learn<span class="error">*</span></div>
					<div class="col-sm-9">
					    <span class="error"><?php echo $languageErr;?></span>
						<div class="form-check">						
							<input class="form-check-input" name="chk[]" value="PHP" type="checkbox" id="Check1"
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
							<input class="form-check-input" name="chk[]" value="JAVA" type="checkbox" id="Check2"
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
							<input class="form-check-input" name="chk[]" value="CSHARP" type="checkbox" id="Check3"
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
						<button type="submit" name="submit" class="btn btn-primary">Submit</button>
					</div>
				</div>
			</form>
		</div>
		<div class="col-sm-3"></div>
	</div>

</body>

</html>
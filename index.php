<?php
include 'header.php';
$fn = $ln = $dob = $gender = $email = $pass = $address = $phone = $pin = $city = $state = $country_id = $xboard = $xperc = $xyop = $xiiboard = $xiiperc = $xiiyop = "";
$Hobbies = [];
$qualifications = [];
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['submit'] == 'Register') {
	$inputNameArr = ['firstname', 'lastname', 'email', 'date', 'password', 'cpassword', 'gender', 'pincode', 'city', 'state', 'address', 'country', 'contact_no', 'xboard', 'xperc', 'xyop', 'xiiboard', 'xiiperc', 'xiiyop'];
	$sanitizedInput = [];
	$errors = [];
	$csvfile = 'csvdata/students.csv';
	foreach ($inputNameArr as $name) {
		if (isset($_POST[$name]) && !empty($_POST[$name])) {
			$sanitizedInput[$name] = htmlspecialchars(stripslashes(trim($_POST[$name])));
			if ($name === 'email' && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
				$errors[$name . "error"] = "Please enter a valid email address";
			}
			if ($name === 'password' && strlen($_POST['password']) < 6) {
				$errors[$name . "error"] = "Password must be atleast 6 characters long";
			}
			if ($name === 'cpassword' && $_POST[$name] != $_POST['password']) {
				$errors[$name . "error"] = "Passwords do not match";
			}
		} else {
			$errors[$name . "error"] = "$name is a required field";
		}
	}
	if (!isset($errors['emailerror'])) {
        if (($handleduplicate = fopen($csvfile, 'r')) !== false) {
            while (($row = fgetcsv($handleduplicate)) !== false) {
                if (isset($row[12]) && $row[12] == $sanitizedInput['email']) { 
                    $errors['emailerror'] = "Email already exists";
                    break;
                }
            }
            fclose($handleduplicate);
        }
    }
	if (!empty($errors)) {
		foreach ($errors as $error) {
			echo $error . "<br>";
		}
	} else {
		$finalValueArr = [];
		$allrows = file($csvfile);
		$lastLine = end($allrows);
		echo $lastLine . "<br>";
		$lastLinearr = str_getcsv($lastLine);
		$maxId = (int)$lastLinearr[0];
		if ($maxId > 1) {
			$newId = $maxId + 1;
		} else {
			$newId = 1;
		}
		$sanitizedInput['id'] = $newId;
		foreach ($sanitizedInput as $key => $value) {
			if ($key != 'cpassword') {
				$finalValueArr[$key] = $value;
			}
		}
		$fieldsOrder = [
			'id', 'pincode', 'firstname', 'lastname', 'gender', 'dob', 'address',
			'city', 'state', 'country_id', 'phone', 'course', 'email',
			'password', 'image', 'file', 'hobbies', 'xboard', 'xperc',
			'xyop', 'xiiboard', 'xiiperc', 'xiiyop', 'role'
		];
		$sanitizedArray = [];
		foreach ($fieldsOrder as $field) {
			$sanitizedArray[] = isset($finalValueArr[$field]) ? $finalValueArr[$field] : "N/A";
		}
		$handlecsv = fopen($csvfile, 'a');
		$updateCsv = fputcsv($handlecsv, $sanitizedArray, ',');
		fclose($handlecsv);
		$fn = $sanitizedInput['firstname'];
		$dob = $sanitizedInput['date'];
		$ln = $sanitizedInput['lastname'];
		$email = $sanitizedInput['email'];
		$gender = $sanitizedInput['gender'];
		$address = $sanitizedInput['address'];
		$pass = $sanitizedInput['password'];
		$city = $sanitizedInput['city'];
		$pin = $sanitizedInput['pincode'];
		$state = $sanitizedInput['state'];
		$country_id = $sanitizedInput['country'];
		$phone = $sanitizedInput['contact_no'];
		$xboard = $sanitizedInput['xboard'];
		$xperc = $sanitizedInput['xperc'];
		$xyop = $sanitizedInput['xyop'];
		$xiiboard = $sanitizedInput['xiiboard'];
		$xiiperc = $sanitizedInput['xiiperc'];
		$xiiyop = $sanitizedInput['xiiyop'];
		header("Location: login.php");
	}
}
?>
<div class="container">
	<div class="ManagementSystem">
		<h1 class="form-title">Student Management System</h1>
		<form id="sample" method="post" action="index.php">
			<div class="row">
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 pull-right">
					<div class="profile-pic">
						<div class="form-group">
							<label>Upload Image</label>
							<img id='img-upload' src="images/user.png" />
							<div class="input-group">
								<span class="input-group-btn">
									<span class="btn btn-default btn-file">
										Browse… <input type="file" name="image" id="imgInp">
									</span>
								</span>
								<input type="text" class="form-control" readonly>
							</div>

							<div class="form-group">
								<label>Upload Documents</label>
								<div class="box">
									<input type="file" name="file" id="file-1" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" />
									<label for="file-1"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17">
											<path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z" />
										</svg> <span>Choose a file&hellip;</span></label>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6">
							<div class="form-group">
								<label>First Name <span class="color-danger">*</span></label>
								<input type="text" class="form-control" id="first_name" name="firstname" data-rule-firstname="true" value="<?php echo $fn ?>" />
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6">
							<div class="form-group">
								<label>Last Name <span class="color-danger">*</span></label>
								<input type="text" class="form-control" id="last_name" name="lastname" data-rule-lastname="true" value="<?php echo $ln ?>" />
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6">
							<div class="form-group">
								<label>Date of Birth <span class="color-danger">*</span></label>
								<input placeholder="DD/MM/YYYY" type="text" class="form-control" id="date1" name="date" value="<?php echo $dob ?>" data-rule-requiredmmddyy="true" />

							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6">
							<div class="form-group">
								<label>Email <span class="color-danger">*</span></label>
								<input type="text" id="email" name="email" class="form-control" value="<?php echo $email ?>" data-rule-email="true" />
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6">
							<div class="form-group">
								<label>Password <span class="color-danger">*</span></label>
								<input type="password" class="form-control" id="password" name="password" value="<?php echo $pass ?>" data-rule-passwd="true" />
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6">
							<div class="form-group">
								<label>Confirm Password <span class="color-danger">*</span></label>
								<input type="password" name="cpassword" class="form-control" value="" />
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6">
							<div class="form-group">
								<label>Mobile Number <span class="color-danger">*</span></label>
								<input type="text" id="contact_no" name="contact_no" value="<?php echo $phone ?>" class="form-control" />
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6">
							<div class="form-group">
								<label>Gender <span class="color-danger">*</span></label>
								<div class="gender_controls">
									<label class="radio-inline" for="gender-0">
										<input name="gender" id="gender-0" value="Male" type="radio" checked="checked">
										Male
									</label>
									<label class="radio-inline" for="gender-1">
										<input name="gender" id="gender-1" value="Female" type="radio">
										Female
									</label>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12">
							<div class="form-group">
								<label>Address <span class="color-danger">*</span></label>
								<textarea class="form-control" id="address_line1" name="address" value=""><?php echo $address ?></textarea>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6">
							<div class="form-group">
								<label>City <span class="color-danger">*</span></label>
								<input type="text" name="city" id="city" class="form-control" value="<?php echo $city ?>" />
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6">
							<div class="form-group">
								<label>Zip Code<span class="color-danger">*</span></label>
								<input type="text" name="pincode" id="pincode" class="form-control" value="<?php echo $pin ?>" />
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6">
							<div class="form-group">
								<label>State <span class="color-danger">*</span></label>
								<input type="text" name="state" id="state" class="form-control" value="<?php echo $state ?>" />
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6">
							<div class="form-group">
								<label>Country <span class="color-danger">*</span></label>
								<select name="country" class="form-control">
									<option value="  " selected="">(please select a country)</option>
									<option value="AF">Afghanistan </option>
									<option value="AL">Albania </option>
									<option value="DZ">Algeria </option>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12">
							<div class="form-group">
								<label>Hobbies</label>
								<div class="controls">
									<label class="checkbox-inline"><input type="checkbox" value="drawing">Drawing</label>
									<label class="checkbox-inline"><input type="checkbox" value="singing">Singing</label>
									<label class="checkbox-inline"><input type="checkbox" value="dancing">Dancing</label>
									<label class="checkbox-inline"><input type="checkbox" value="sketching">Sketching</label>
									<label class="checkbox-inline"><input type="checkbox" value="">Others</label>
									<label class="checkbox-inline"><input type="text" class="form-control" value="<?php echo $otherhobbies ?>"></label>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12">
							<div class="form-group">
								<label>Qualification</label>
								<div class="table-responsive">
									<table>
										<thead>
											<tr>
												<th>Sr. No.</th>
												<th>Examination</th>
												<th>Board</th>
												<th>Percentage</th>
												<th>Year of Passing</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>1</td>
												<td>Class X</td>
												<td><input type="text" class="form-control" name="xboard" id="X-board" value="<?php echo $xboard ?>"></td>
												<td><input type="text" class="form-control" name="xperc" id="X-perc" value="<?php echo $xperc ?>"></td>
												<td><input type="text" class="form-control" name="xyop" id="X-yop" value="<?php echo $xyop ?>"></td>
											</tr>
											<tr>
												<td>2</td>
												<td>Class XII</td>
												<td><input type="text" class="form-control" name="xiiboard" id="XII-board" value="<?php echo $xiiboard ?>"></td>
												<td><input type="text" class="form-control" name="xiiperc" id="XII-perc" value="<?php echo $xiiperc ?>"></td>
												<td><input type="text" class="form-control" name="xiiyop" id="XII-yop" value="<?php echo $xiiyop ?>"></td>
											</tr>

										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12">
							<div class="form-group">
								<label>Courses Applied for</label>
								<div class="controls">
									<label class="radio-inline" for="gender-0">
										<input name="course" id="course-0" value="bca" type="radio">
										BCA
									</label>
									<label class="radio-inline" for="gender-1">
										<input name="course" id="course-1" value="bcom" type="radio">
										B.COM
									</label>
									<label class="radio-inline" for="gender-1">
										<input name="course" id="course-2" value="bsc" type="radio">
										B.Sc
									</label>
									<label class="radio-inline" for="gender-1">
										<input name="course" id="course-3" value="ba" type="radio">
										B.A
									</label>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12">
							<div class="action-button">
								<input type="submit" name="submit" class="btn btn-green submit-form" value="Register" />
								<input type="reset" name="reset" class="btn btn-orange" value="Reset" />
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
<?php include 'footer.php'; ?>
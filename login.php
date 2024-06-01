<?php
session_start();
include 'header.php';
include 'googlevariables.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
$email = "";
$password = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST'  && isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = $_POST['password'];
	$csvFile = fopen('csvdata/students.csv', 'r');
	if ($csvFile !== FALSE) {
		echo "yes";
		while (($data = fgetcsv($csvFile, 1024, ',')) !== FALSE) {
			if ($data[12] == $email && $data[13] == $password) {
				echo "yes";
				$_SESSION['email'] = $email;
				fclose($csvFile);
				header("Location: student-listing.php");
				exit();
			}
		}
		fclose($csvFile);
	}
}

?>
<div class="container">
	<div class="ManagementSystem">
		<h1 class="form-title">Sign In</h1>
		<div class="signup-content">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6 col-lg-offset-3 col-md-offset-3 col-sm-offset-3">
					<form id="sample" method="post" action="login.php">
						<div class="form-group">
							<label>Email Address <span class="color-danger">*</span></label>
							<input type="text" id="email" name="email" class="form-control" value="<?php echo $email ?>" data-rule-email="true" />
						</div>
						<div class="form-group">
							<label>Password <span class="color-danger">*</span></label>
							<input type="password" class="form-control" id="password" name="password" value="<?php echo $password ?>" data-rule-passwd="true" />
						</div>
						<div class="form-group" style="display: inline-block;   width: 100%;">
							<div class="rememberme_block pull-left">
								<label for="rememberme">
									<input type="checkbox" name="rememberme" id="rememberme" class="" value="yes"> Remember me</label>
							</div>
							<div class="forgot_block pull-right"><a href="#">Forgot Password?</a></div>
						</div>
						<div class="form-group">
							<input type="submit" name="submit" value="Sign In" class="btn btn-green sign_in">
						</div>
						<div class="form-group">
							<a href="https://accounts.google.com/o/oauth2/v2/auth?response_type=code&client_id=<?php echo $google_client_id; ?>&redirect_uri=<?php echo urlencode($google_redirect_url); ?>&scope=openid%20email%20profile&access_type=offline" type="button" name="google" class="btn btn-green google"><span><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 48 48">
									<path fill="#FFC107" d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12c0-6.627,5.373-12,12-12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,24c0,11.045,8.955,20,20,20c11.045,0,20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z"></path>
									<path fill="#FF3D00" d="M6.306,14.691l6.571,4.819C14.655,15.108,18.961,12,24,12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C16.318,4,9.656,8.337,6.306,14.691z"></path>
									<path fill="#4CAF50" d="M24,44c5.166,0,9.86-1.977,13.409-5.192l-6.19-5.238C29.211,35.091,26.715,36,24,36c-5.202,0-9.619-3.317-11.283-7.946l-6.522,5.025C9.505,39.556,16.227,44,24,44z"></path>
									<path fill="#1976D2" d="M43.611,20.083H42V20H24v8h11.303c-0.792,2.237-2.231,4.166-4.087,5.571c0.001-0.001,0.002-0.001,0.003-0.002l6.19,5.238C36.971,39.205,44,34,44,24C44,22.659,43.862,21.35,43.611,20.083z"></path>
								</svg></span>Continue with Google</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include 'footer.php'; ?>
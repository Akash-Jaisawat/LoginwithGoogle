<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Student Management System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/component.css">
  <link rel="stylesheet" href="css/bootstrap-datepicker3.css">
  
  
</head>
<body>
	<header>
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-3">
					<div class="logo">
						<img src="images/logo.png"/>
					</div>
				</div>
				<div class="col-lg-8 col-md-8 col-sm-8 col-xs-9">
					<div class="user-account">
						<ul>
							<li>
							<?php if (isset($_SESSION['name']) && isset($_SESSION['picture'])): ?>
                                    <span class="user-welcome">Welcome <?php echo htmlspecialchars($_SESSION['name']); ?></span>
                                    <img class="account-pic" src="<?php echo htmlspecialchars($_SESSION['picture']); ?>" alt="Profile Picture"/>
                                <?php else: ?>
                                    <span class="user-welcome">Welcome Guest</span>
                                <?php endif; ?>
							</li>
							<li>
								<a href="logout.php" class="btn btn-green btn-logout"><i class="fa fa-sign-out"></i> Log Out</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			
			
		</div>
	</header>
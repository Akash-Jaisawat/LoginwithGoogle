<?php include 'header.php'; ?>
<div class="container">
	<div class="ManagementSystem">
		<h1 class="form-title">Student Data</h1>
		<div class="save-data">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6">
					<div class="student-count">
						<p><span>Total Students: </span>  3</p>
						<p><span>Registered Students: </span>  2</p>
						<p><span>Unregister Students: </span>  1</p>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6">
					<form>
						<div class="form-group">
							<label>Upload File</label>
							<div class="box">
								<input type="file" name="file-1[]" id="file-1" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" multiple />
								<label for="file-1"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Choose a file&hellip;</span></label>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="table-responsive">
			<table class="user-detail">			
				<thead>
					<tr>
						<th>Sr. No.</th>
						<th>Student Id</th>
						<th>Student</th>
						<th>Course</th>
						<th>Email id</th>
						<th>Qualification</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>1</td>
						<td>1511088</td>
						<td>
							<div class="image">
								<img src="images/user.png" class="img-responsive"/>
							</div>
							<h4 class="user-name">Monika</h4>
							<h5 class="user-gender">Female</h5>
							<h5 class="user-dob">18-08-1994</h5>
							<div class="user-address">
								<p>H.No. 353, Rajiv colony,Panipat </p>
							</div>
						</td>
						<td>B.A</td>
						<td>msharma@gmail.com</td>
						<td>XII passout</td>
					</tr>
				</tbody>
			</table>
			</div>
						
		</div>
	</div>
</div>	
<?php include 'footer.php'; ?>
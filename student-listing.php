<?php 
include 'header2.php';
?>
<div class="container">
	<div class="ManagementSystem">
		<h1 class="form-title">Student Detail</h1>
		<div class="option-buttons">
		<div class="row">
			<div class="col-lg-8 col-md-8 col-sm-8">
				<label href="#" class="btn btn-orange"><i class="fa fa-plus-circle"></i> Add Student <input type="file" name="add-file" id="add-file" class="inputfile" /></label>
				<label href="#" class="btn btn-green"><i class="fa fa-plus-circle"></i> Import CSV <input type="file" name="import-file" id="import-file" class="inputfile" /></label>
				<label href="#" class="btn btn-orange"><i class="fa fa-plus-circle"></i> Export CSV <input type="file" name="export-file" id="export-file" class="inputfile" /></label>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4">
				<div class="input-group">
					<input type="text" class="form-control" placeholder="Search for...">
					  <span class="input-group-btn">
						<button class="btn btn-search btn-green" type="button"><i class="fa fa-search fa-fw"></i> Search</button>
					  </span>
				</div>
			</div>
		</div>
			
			
		</div>
		<div class="table-responsive">
			<table class="user-detail">			
				<thead>
					<tr>
						<th><input type="checkbox" name="all-selected" value=""/></th>
						<th>Student Id</th>
						<th>Student</th>
						<th>Course</th>
						<th>Email id</th>
						<th>Qualification</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><input type="checkbox" name="selected1" value=""/></td>
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
						<td><a href="" class="btn btn-green"><i class="fa fa-download"></i> Document</a>
							<div class="user-actions">
								<a href="" class="btn btn-orange" title="View"><i class="fa fa-eye"></i> </a>
								<a href="" class="btn btn-orange" title="Delete"><i class="fa fa-trash"></i> </a>
								<a href="" class="btn btn-orange" title="Edit"><i class="fa fa-pencil"></i> </a>
							</div>
						</td>
					</tr>
					<tr>
						<td><input type="checkbox" name="selected1" value=""/></td>
						<td>1511088</td>
						<td>
							<div class="image">
								<img src="images/user.png" class="img-responsive"/>
							</div>
							<h4 class="user-name">Gaurav</h4>
							<h5 class="user-gender">Male</h5>
							<h5 class="user-dob">18-08-1994</h5>
							<div class="user-address">
								<p>H.No. 353, Rajiv colony,Panipat </p>
							</div>
						</td>
						<td>B.A</td>
						<td>gauravtimari@gmail.com</td>
						<td>XII passout</td>
						<td><a href="" class="btn btn-green"><i class="fa fa-download"></i> Document</a>
							<div class="user-actions">
								<a href="" class="btn btn-orange" title="View"><i class="fa fa-eye"></i> </a>
								<a href="" class="btn btn-orange" title="Delete"><i class="fa fa-trash"></i> </a>
								<a href="" class="btn btn-orange" title="Edit"><i class="fa fa-pencil"></i> </a>
							</div>
						</td>
					</tr>
					<tr>
						<td><input type="checkbox" name="selected1" value=""/></td>
						<td>1511088</td>
						<td>
							<div class="image">
								<img src="images/user.png" class="img-responsive"/>
							</div>
							<h4 class="user-name">Ekta</h4>
							<h5 class="user-gender">Female</h5>
							<h5 class="user-dob">18-08-1994</h5>
							<div class="user-address">
								<p>H.No. 353, Rajiv colony,Panipat </p>
							</div>
						</td>
						<td>B.A</td>
						<td>ektasingh@gmail.com</td>
						<td>XII passout</td>
						<td><a href="" class="btn btn-green"><i class="fa fa-download"></i> Document</a>
							<div class="user-actions">
								<a href="" class="btn btn-orange" title="View"><i class="fa fa-eye"></i> </a>
								<a href="" class="btn btn-orange" title="Delete"><i class="fa fa-trash"></i> </a>
								<a href="" class="btn btn-orange" title="Edit"><i class="fa fa-pencil"></i> </a>
							</div>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="pager-navigation">
        <ul class="pagination">
            <li ><a href="#">&laquo;</a></li>
            <li class="active"><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">&raquo;</a></li>
        </ul>
    </div>
	</div>
</div>
<?php include 'footer.php'; ?>
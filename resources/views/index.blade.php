<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Bootstrap CRUD Data Table for Database with Modal Form</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="{{asset('fontawesome/css/all.css')}}">
<link rel="stylesheet" href="{{asset('css/style.css')}}">
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>

<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
<script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>

<style>
</style>


<script>


</script>

<script>
</script>
</head>
<body>
<div class="container-xl">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title fixed-top">
				<div class="row">
					<div class="col-sm-4">
						<h2 class="ml-3">Lev<b>Data</b></h2>
					</div>
					<div class="col-sm-4">
						<div class="input-group searchBox">
							<input type="text" placeholder="search" class="form-control search_input mb-1">
							<i class="material-icons m-2" style="font-size: 20px">search</i>
						</div>
					</div>
					<div class="col-sm-4">
						<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New</span></a>
						<a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>						
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>
							<span class="custom-checkbox">
								<input type="checkbox" id="selectAll">
								<label for="selectAll"></label>
							</span>
						</th>
						<th>Avatar</th>
						<th>Name</th>
						<th>Email</th>
						<th>Address</th>
						<th>Phone</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<tr >
						<td>
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox1" name="options[]" value="1">
								<label for="checkbox1"></label>
							</span>
						</td>
							<td href="#infomodal" data-toggle="modal"><img src="{{asset('images/avatar.png')}}" alt="Avatar" class="avatar"></td>
							<td href="#infomodal" data-toggle="modal">Thomas Hardy</td>
							<td href="#infomodal" data-toggle="modal">thomashardy@mail.com</td>
							<td href="#infomodal" data-toggle="modal">89 Chiaroscuro Rd, Portland, USA</td>
							<td href="#infomodal" data-toggle="modal">(171) 555-2222</td>
						<td>
							<a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
							<a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
						</td>
					</tr>
					<tr>
						<td>
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox2" name="options[]" value="1">
								<label for="checkbox2"></label>
							</span>
						</td>
						<td>Dominique Perrier</td>
						<td>dominiqueperrier@mail.com</td>
						<td>Obere Str. 57, Berlin, Germany</td>
						<td>(313) 555-5735</td>
						<td>
							<a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
							<a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
						</td>
					</tr>
					<tr>
						<td>
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox3" name="options[]" value="1">
								<label for="checkbox3"></label>
							</span>
						</td>
						<td>Maria Anders</td>
						<td>mariaanders@mail.com</td>
						<td>25, rue Lauriston, Paris, France</td>
						<td>(503) 555-9931</td>
						<td>
							<a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
							<a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
						</td>
					</tr>
					<tr>
						<td>
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox4" name="options[]" value="1">
								<label for="checkbox4"></label>
							</span>
						</td>
						<td>Fran Wilson</td>
						<td>franwilson@mail.com</td>
						<td>C/ Araquil, 67, Madrid, Spain</td>
						<td>(204) 619-5731</td>
						<td>
							<a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
							<a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
						</td>
					</tr>					
					<tr>
						<td>
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox5" name="options[]" value="1">
								<label for="checkbox5"></label>
							</span>
						</td>
						<td>Martin Blank</td>
						<td>martinblank@mail.com</td>
						<td>Via Monte Bianco 34, Turin, Italy</td>
						<td>(480) 631-2097</td>
						<td>
							<a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
							<a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
						</td>
					</tr> 
				</tbody>
			</table>
			<div class="clearfix">
				<div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
				<ul class="pagination">
					<li class="page-item disabled"><a href="#">Previous</a></li>
					<li class="page-item"><a href="#" class="page-link">1</a></li>
					<li class="page-item"><a href="#" class="page-link">2</a></li>
					<li class="page-item active"><a href="#" class="page-link">3</a></li>
					<li class="page-item"><a href="#" class="page-link">4</a></li>
					<li class="page-item"><a href="#" class="page-link">5</a></li>
					<li class="page-item"><a href="#" class="page-link">Next</a></li>
				</ul>
			</div>
		</div>
	</div>        
</div>
<!-- add Modal HTML -->
<div id="addEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
				<div class="modal-header">						
					<h4 class="modal-title">Add Employee</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				
				<div class="circle">
					<!-- User Profile Image -->
					<img class="profile-pic" src="{{asset('images/avatar.png')}}">
				</div>
				<div class="p-image">
				<i class="material-icons upload-button ">add_a_photo</i>
					<input class="file-upload" type="file" accept="image/*"/>
				</div>
				
				  <br>
				<div class="modal-body">
					<section class="signup-step-container">
						<div class="container">
							<div class="row d-flex justify-content-center">
								<div class="col">
									<div class="wizard">
										<div class="wizard-inner">
											<div class="connecting-line" style="width: 75%"></div>
											<ul class="nav nav-tabs" role="tablist">
												<li role="presentation" class="active">
													<a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" aria-expanded="true"><span class="round-tab">1 </span> <i>Personal Info</i></a>
												</li>
												<li role="presentation" class="disabled">
													<a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" aria-expanded="false"><span class="round-tab">2</span> <i>Relational Info</i></a>
												</li>
												<li role="presentation" class="disabled">
													<a href="#step3" data-toggle="tab" aria-controls="step3" role="tab"><span class="round-tab">3</span> <i>Emergency Contact</i></a>
												</li>
												<li role="presentation" class="disabled">
													<a href="#step4" data-toggle="tab" aria-controls="step4" role="tab"><span class="round-tab">4</span> <i>Finish</i></a>
												</li>
											</ul>
										</div>
						
										<form role="form" action="index.html" class="login-box">
											<div class="tab-content" id="main_form">
												<div class="tab-pane active" role="tabpanel" id="step1">
													<h4 class="text-center">Personal Information</h4>
													<div class="row">
														<div class="col-md-2 pr-1">
															<div class="form-group mt-4">
																<div class="form-check form-check-inline mr-1">
																	<input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="Mr">
																	<label class="form-check-label" for="inlineRadio1">Mr</label>
																</div>
																<div class="form-check form-check-inline mr-1">
																	<input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="Mrs">
																	<label class="form-check-label" for="inlineRadio2">Mrs</label>
																</div>
																<div class="form-check form-check-inline mr-1">
																	<input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="Miss" >
																	<label class="form-check-label" for="inlineRadio3">Miss</label>
																</div>
															</div>
														</div>	

														<div class="col-md-6">
															<div class="form-group">
																<label>First and Last Name *</label> 
																<input class="form-control form-control-sm" type="text" name="name" placeholder="" required > 
															</div>
														</div>
														<div class="col-md-2" style="max-width: 20%">
															<div class="form-group">
																<label>DoB  *</label> 
																<input class="form-control form-control-sm" type="date" name="dob" placeholder="" required > 
															</div>
														</div>
														<div class="col-md-2" style="max-width: 10%">
															<div class="form-group">
																<label>Age  *</label> 
																<input class="form-control form-control-sm" type="number" name="age" placeholder="22"  required> 
															</div>
														</div>
														<div class="col-md-4 pr-1">
															<label class="font-weight-bold">Status</label>
															<div class="form-group mt-0">
																<div class="form-check form-check-inline mr-1">
																	<input class="form-check-input" type="radio" name="title" id="inlineRadio1" value="married" required>
																	<label class="form-check-label" for="inlineRadio1">Married</label>
																</div>
																<div class="form-check form-check-inline mr-1">
																	<input class="form-check-input" type="radio" name="title" id="inlineRadio2" value="widow" required>
																	<label class="form-check-label" for="inlineRadio2">Widow</label>
																</div>
																<div class="form-check form-check-inline mr-1">
																	<input class="form-check-input" type="radio" name="title" id="inlineRadio3" value="single" required>
																	<label class="form-check-label" for="inlineRadio3">Single</label>
																</div>
																<div class="form-check form-check-inline mr-1">
																	<input class="form-check-input" type="radio" name="title" id="inlineRadio3" value="divorced" required>
																	<label class="form-check-label" for="inlineRadio3">Divorced</label>
																</div>
															</div>
														</div>	
														<div class="col-md-4">
															<div class="form-group">
																<label>Phone *</label> 
																<input class="form-control form-control-sm" type="text" name="Phone" placeholder="020 xxx xxxx" required> 
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group">
																<label>Email Address *</label> 
																<input class="form-control form-control-sm" type="email" name="name" placeholder="" required> 
															</div>
														</div>
														
														<div class="col-md-6">
															<div class="form-group">
																<label>Resdential Address *</label> 
																<input class="form-control form-control-sm" type="text" name="address" placeholder="Tema comm16, lashibi, Gas station" required> 
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<label>Hometown & Region *</label> 
																<input class="form-control form-control-sm" type="text" name="hometown" placeholder="Sege, Ada; Greater Accra " required> 
															</div>
														</div>
														<div class="col-md-4 pr-1">
															<label class="font-weight-bold">Employment Status</label>
															<div class="form-group mt-0">
																<div class="form-check form-check-inline mr-1">
																	<input class="form-check-input" type="radio" name="empStatus" id="inlineRadio1" value="employed" required>
																	<label class="form-check-label" for="inlineRadio1">Employed</label>
																</div>
																<div class="form-check form-check-inline mr-1">
																	<input class="form-check-input" type="radio" name="empStatus" id="inlineRadio2" value="unemployed" required>
																	<label class="form-check-label" for="inlineRadio2">Unemployed</label>
																</div>
																<div class="form-check form-check-inline mr-1">
																	<input class="form-check-input" type="radio" name="empStatus" id="inlineRadio3" value="retired" required >
																	<label class="form-check-label" for="inlineRadio3">Retired</label>
																</div>
																<div class="form-check form-check-inline mr-1">
																	<input class="form-check-input" type="radio" name="empStatus" id="inlineRadio3" value="student" required>
																	<label class="form-check-label" for="inlineRadio3">Student</label>
																</div>
															</div>
														</div>	
														<div class="col-md-4">
															<div class="form-group">
																<label>Occupation *</label> 
																<input class="form-control form-control-sm" type="text" name="occupation" placeholder="Reseacher or shs" required> 
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group">
																<label>Field of Profession  *</label> 
																<input class="form-control form-control-sm" type="text" name="hometown" placeholder="crop Researchist or General Science" required> 
															</div>
														</div>
														
														
													</div>
													<ul class="list-inline pull-right">
														<li><button type="button" class="default-btn next-step">Continue to next step</button></li>
													</ul>
												</div>
												<div class="tab-pane" role="tabpanel" id="step2">
													<h4 class="text-center">Church Relational Info</h4>
													<div class="row">
													<div class="col-md-4">
														<div class="form-group">
															<label for="exampleFormControlSelect1">Period of Stay</label>
															<select class="form-control form-control-sm" id="exampleFormControlSelect1">
															  <option>10 years and above</option>
															  <option>5  years and above</option>
															  <option>2  years and above</option>
															  <option>1 year</option>
															  <option>Just Joined</option>
															</select>
														  </div>
													</div>
													<div class="col-md-2">
														<div class="form-group">
															<label>Berea Center No. *</label> 
															<input class="form-control form-control-sm" type="text" name="centerNo" placeholder=""> 
														</div>
													</div>
													<div class="col-md-2 ml-5 pr-1">
														<label class="font-weight-bold">Tithe</label>
														<div class="form-group mt-0">
															<div class="form-check form-check-inline mr-1">
																<input class="form-check-input" type="radio" name="tithe" id="inlineRadio1" value="regular" required>
																<label class="form-check-label" for="inlineRadio1">Regular</label>
															</div>
															<div class="form-check form-check-inline mr-1">
																<input class="form-check-input" type="radio" name="tithe" id="inlineRadio2" value="irregular" required>
																<label class="form-check-label" for="inlineRadio2">Irregular</label>
															</div>
														</div>
													</div>
													<div class="col-md-2 ml-5 pr-1">
														<label class="font-weight-bold">Welfare</label>
														<div class="form-group mt-0">
															<div class="form-check form-check-inline mr-1">
																<input class="form-check-input" type="radio" name="welfare" id="inlineRadio1" value="yes" required>
																<label class="form-check-label" for="inlineRadio1">Yes</label>
															</div>
															<div class="form-check form-check-inline mr-1">
																<input class="form-check-input" type="radio" name="welfare" id="inlineRadio2" value="no" required>
																<label class="form-check-label" for="inlineRadio2">No</label>
															</div>
														</div>
													</div>
													<div class="col-md-4">
														<label class="font-weight-bold">Ministry</label>
														<div class="form-group mt-0">
															<div class="form-check form-check-inline mr-1">
																<input class="form-check-input" type="radio" name="ministry" id="inlineRadio1" value="men" required>
																<label class="form-check-label" for="inlineRadio1">Men </label>
															</div>
															<div class="form-check form-check-inline mr-1">
																<input class="form-check-input" type="radio" name="ministry" id="inlineRadio2" value="women" required>
																<label class="form-check-label" for="inlineRadio2">Women</label>
															</div>
															<div class="form-check form-check-inline mr-1">
																<input class="form-check-input" type="radio" name="ministry" id="inlineRadio2" value="youth" required>
																<label class="form-check-label" for="inlineRadio2">Youth</label>
															</div>
														</div>
													</div>
													
													<div class="col-md-8">
														<label class="font-weight-bold">Department</label>
														<div class="form-group mt-0">
															<div class="form-check form-check-inline mr-1">
																<input class="form-check-input" type="radio" name="department" id="inlineRadio1" value="music" required>
																<label class="form-check-label" for="inlineRadio1">Music Ministry</label>
															</div>
															<div class="form-check form-check-inline mr-1">
																<input class="form-check-input" type="radio" name="department" id="inlineRadio2" value="usher" required>
																<label class="form-check-label" for="inlineRadio2">Protocol Department</label>
															</div>
															<div class="form-check form-check-inline mr-1">
																<input class="form-check-input" type="radio" name="department" id="inlineRadio1" value="teacher" required>
																<label class="form-check-label" for="inlineRadio1">Sunday Sch Dept.</label>
															</div>
															<div class="form-check form-check-inline mr-1">
																<input class="form-check-input" type="radio" name="department" id="inlineRadio2" value="theater" required>
																<label class="form-check-label" for="inlineRadio2">Theater Ministry</label>
															</div>
														</div>
													</div>
												   </div>
													
													
													<ul class="list-inline pull-right">
														<li><button type="button" class="default-btn prev-step">Back</button></li>
														{{-- <li><button type="button" class="default-btn next-step skip-btn">Skip</button></li> --}}
														<li><button type="button" class="default-btn next-step">Continue</button></li>
													</ul>
												</div>
												<div class="tab-pane" role="tabpanel" id="step3">
													<h4 class="text-center">Emergency Contact</h4>
													 <div class="row">
														<div class="col-md-4">
															<div class="form-group">
																<label>Name *</label> 
																<input class="form-control form-control-sm" type="text" name="emrgName" placeholder="Kofi Mensah" required> 
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group">
																<label>Relationship  *</label> 
																<input class="form-control form-control-sm" type="text" name="relationship" placeholder="eg..brother, wife, father" required> 
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group">
																<label>Phone *</label> 
																<input class="form-control form-control-sm" type="text" name="phone" placeholder="024 xxx xxxx" required> 
															</div>
														</div>
													</div>
													<ul class="list-inline pull-right">
														<li><button type="button" class="default-btn prev-step">Back</button></li>
														{{-- <li><button type="button" class="default-btn next-step skip-btn">Skip</button></li> --}}
														<li><button type="button" class="default-btn next-step">Continue</button></li>
													</ul>
												</div>
												<div class="tab-pane" role="tabpanel" id="step4">
													<h4 class="text-center">Finalize</h4>
														<p class="text-center"><b>FINISH</b> will store all data entries, cross-check and verify before submit. </p>
														<h6 class="text-center">Completed</h6>
													<ul class="list-inline pull-right">
														<li><button type="button" class="default-btn prev-step">Back</button></li>
														<li><button type="button" class="default-btn next-step">Finish</button></li>
													</ul>
												</div>
												<div class="clearfix"></div>
											</div>
											
										</form>
									</div>
								</div>
							</div>
						</div>
					</section>
				</div>			
				</div>
		</div>
	</div>
</div>
<!-- Edit Modal HTML -->
<div id="editEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form>
				<div class="modal-header">						
					<h4 class="modal-title">Edit Employee</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>



				<div class="circle ">
					<!-- User Profile Image -->
					<img class="profile-pic upload-button" src="{{asset('images/avatar.png')}}">
					<input class="file-upload" type="file" accept="image/*"/>
				</div>
				{{-- <div class="p-image">
				<i class="material-icons  ">add_a_photo</i>
					<input class="file-upload" type="file" accept="image/*"/>
				</div> --}}
				
				  <br>
				<div class="modal-body">
					<section class="signup-step-container">
						<div class="container">
							<div class="row d-flex justify-content-center">
								<div class="col">
									<div class="wizard">
										<div class="wizard-inner" style="margin-left: 20%;">
											<div class="connecting-line"></div>
											<ul class="nav nav-tabs" role="tablist">
												<li role="presentation" class="active">
													<a href="#updatestep1" data-toggle="tab" aria-controls="updatestep1" role="tab" aria-expanded="true"><span class="round-tab">1 </span> <i>Personal Info</i></a>
												</li>
												<li role="presentation" class="disabled">
													<a href="#updatestep2" data-toggle="tab" aria-controls="updatestep2" role="tab" aria-expanded="false"><span class="round-tab">2</span> <i>Relational Info</i></a>
												</li>
												<li role="presentation" class="disabled">
													<a href="#updatestep3" data-toggle="tab" aria-controls="updatestep3" role="tab"><span class="round-tab">3</span> <i>Emergency Contact</i></a>
												</li>
											<ul>
										</div>
						
										<form role="form" action="index.html" class="login-box">
											<div class="tab-content" id="main_form">
												<div class="tab-pane active" role="tabpanel" id="updatestep1">
													<h4 class="text-center">Personal Information</h4>
													<div class="row">
														<div class="col-md-2 pr-1">
															<div class="form-group mt-4">
																<div class="form-check form-check-inline mr-1">
																	<input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="Mr">
																	<label class="form-check-label" for="inlineRadio1">Mr</label>
																</div>
																<div class="form-check form-check-inline mr-1">
																	<input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="Mrs">
																	<label class="form-check-label" for="inlineRadio2">Mrs</label>
																</div>
																<div class="form-check form-check-inline mr-1">
																	<input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="Miss">
																	<label class="form-check-label" for="inlineRadio3">Miss</label>
																</div>
															</div>
														</div>	

														<div class="col-md-6">
															<div class="form-group">
																<label>First and Last Name *</label> 
																<input class="form-control form-control-sm" type="text" name="name" placeholder="" > 
															</div>
														</div>
														<div class="col-md-2" style="max-width: 20%">
															<div class="form-group">
																<label>DoB  *</label> 
																<input class="form-control form-control-sm" type="date" name="dob" placeholder=""  > 
															</div>
														</div>
														<div class="col-md-2" style="max-width: 10%">
															<div class="form-group">
																<label>Age  *</label> 
																<input class="form-control form-control-sm" type="number" name="age" placeholder="22"  > 
															</div>
														</div>
														<div class="col-md-4 pr-1">
															<label class="font-weight-bold">Status</label>
															<div class="form-group mt-0">
																<div class="form-check form-check-inline mr-1">
																	<input class="form-check-input" type="radio" name="title" id="inlineRadio1" value="married" >
																	<label class="form-check-label" for="inlineRadio1">Married</label>
																</div>
																<div class="form-check form-check-inline mr-1">
																	<input class="form-check-input" type="radio" name="title" id="inlineRadio2" value="widow" >
																	<label class="form-check-label" for="inlineRadio2">Widow</label>
																</div>
																<div class="form-check form-check-inline mr-1">
																	<input class="form-check-input" type="radio" name="title" id="inlineRadio3" value="single" >
																	<label class="form-check-label" for="inlineRadio3">Single</label>
																</div>
																<div class="form-check form-check-inline mr-1">
																	<input class="form-check-input" type="radio" name="title" id="inlineRadio3" value="divorced" >
																	<label class="form-check-label" for="inlineRadio3">Divorced</label>
																</div>
															</div>
														</div>	
														<div class="col-md-4">
															<div class="form-group">
																<label>Phone *</label> 
																<input class="form-control form-control-sm" type="text" name="Phone" placeholder="020 xxx xxxx" > 
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group">
																<label>Email Address *</label> 
																<input class="form-control form-control-sm" type="email" name="name" placeholder="" > 
															</div>
														</div>
														
														<div class="col-md-6">
															<div class="form-group">
																<label>Resdential Address *</label> 
																<input class="form-control form-control-sm" type="text" name="address" placeholder="Tema comm16, lashibi, Gas station" > 
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<label>Hometown & Region *</label> 
																<input class="form-control form-control-sm" type="text" name="hometown" placeholder="Sege, Ada; Greater Accra " > 
															</div>
														</div>
														<div class="col-md-4 pr-1">
															<label class="font-weight-bold">Employment Status</label>
															<div class="form-group mt-0">
																<div class="form-check form-check-inline mr-1">
																	<input class="form-check-input" type="radio" name="empStatus" id="inlineRadio1" value="employed" >
																	<label class="form-check-label" for="inlineRadio1">Employed</label>
																</div>
																<div class="form-check form-check-inline mr-1">
																	<input class="form-check-input" type="radio" name="empStatus" id="inlineRadio2" value="unemployed" >
																	<label class="form-check-label" for="inlineRadio2">Unemployed</label>
																</div>
																<div class="form-check form-check-inline mr-1">
																	<input class="form-check-input" type="radio" name="empStatus" id="inlineRadio3" value="retired"  >
																	<label class="form-check-label" for="inlineRadio3">Retired</label>
																</div>
																<div class="form-check form-check-inline mr-1">
																	<input class="form-check-input" type="radio" name="empStatus" id="inlineRadio3" value="student" >
																	<label class="form-check-label" for="inlineRadio3">Student</label>
																</div>
															</div>
														</div>	
														<div class="col-md-4">
															<div class="form-group">
																<label>Occupation *</label> 
																<input class="form-control form-control-sm" type="text" name="occupation" placeholder="Reseacher or shs" > 
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group">
																<label>Field of Profession  *</label> 
																<input class="form-control form-control-sm" type="text" name="hometown" placeholder="crop Researchist or General Science" > 
															</div>
														</div>												
														
													</div>
													<div class="float-right">
														<input type="button" class="btn btn-outline-danger mr-2 btn-sm" data-dismiss="modal" value="Close">
														<input type="submit" class="btn btn-outline-success btn-sm updatePersonalInfo" value="Save">
													</div>
																					
												</div>
												<div class="tab-pane" role="tabpanel" id="updatestep2">
													<h4 class="text-center">Church Relational Info</h4>
													<div class="row">
													<div class="col-md-4">
														<div class="form-group">
															<label for="exampleFormControlSelect1">Example select</label>
															<select class="form-control form-control-sm" id="exampleFormControlSelect1">
															  <option>10 years and above</option>
															  <option>5  years and above</option>
															  <option>2  years and above</option>
															  <option>1 year</option>
															  <option>Just Joined</option>
															</select>
														  </div>
													</div>
													<div class="col-md-2">
														<div class="form-group">
															<label>Berea Center No. *</label> 
															<input class="form-control form-control-sm" type="text" name="centerNo" placeholder=""> 
														</div>
													</div>
													<div class="col-md-2 ml-5 pr-1">
														<label class="font-weight-bold">Tithe</label>
														<div class="form-group mt-0">
															<div class="form-check form-check-inline mr-1">
																<input class="form-check-input" type="radio" name="tithe" id="inlineRadio1" value="regular" >
																<label class="form-check-label" for="inlineRadio1">Regular</label>
															</div>
															<div class="form-check form-check-inline mr-1">
																<input class="form-check-input" type="radio" name="tithe" id="inlineRadio2" value="irregular" >
																<label class="form-check-label" for="inlineRadio2">Irregular</label>
															</div>
														</div>
													</div>
													<div class="col-md-2 ml-5 pr-1">
														<label class="font-weight-bold">Welfare</label>
														<div class="form-group mt-0">
															<div class="form-check form-check-inline mr-1">
																<input class="form-check-input" type="radio" name="welfare" id="inlineRadio1" value="yes" >
																<label class="form-check-label" for="inlineRadio1">Yes</label>
															</div>
															<div class="form-check form-check-inline mr-1">
																<input class="form-check-input" type="radio" name="welfare" id="inlineRadio2" value="no" >
																<label class="form-check-label" for="inlineRadio2">No</label>
															</div>
														</div>
													</div>
													<div class="col-md-4">
														<label class="font-weight-bold">Ministry</label>
														<div class="form-group mt-0">
															<div class="form-check form-check-inline mr-1">
																<input class="form-check-input" type="radio" name="ministry" id="inlineRadio1" value="men" >
																<label class="form-check-label" for="inlineRadio1">Men </label>
															</div>
															<div class="form-check form-check-inline mr-1">
																<input class="form-check-input" type="radio" name="ministry" id="inlineRadio2" value="women" >
																<label class="form-check-label" for="inlineRadio2">Women</label>
															</div>
															<div class="form-check form-check-inline mr-1">
																<input class="form-check-input" type="radio" name="ministry" id="inlineRadio2" value="youth" >
																<label class="form-check-label" for="inlineRadio2">Youth</label>
															</div>
														</div>
													</div>
													
													<div class="col-md-8">
														<label class="font-weight-bold">Department</label>
														<div class="form-group mt-0">
															<div class="form-check form-check-inline mr-1">
																<input class="form-check-input" type="radio" name="department" id="inlineRadio1" value="music" >
																<label class="form-check-label" for="inlineRadio1">Music Ministry</label>
															</div>
															<div class="form-check form-check-inline mr-1">
																<input class="form-check-input" type="radio" name="department" id="inlineRadio2" value="usher" >
																<label class="form-check-label" for="inlineRadio2">Protocol Department</label>
															</div>
															<div class="form-check form-check-inline mr-1">
																<input class="form-check-input" type="radio" name="department" id="inlineRadio1" value="teacher" >
																<label class="form-check-label" for="inlineRadio1">Sunday Sch Dept.</label>
															</div>
															<div class="form-check form-check-inline mr-1">
																<input class="form-check-input" type="radio" name="department" id="inlineRadio2" value="theater" >
																<label class="form-check-label" for="inlineRadio2">Theater Ministry</label>
															</div>
														</div>
													</div>
													<div class="float-right">
														<input type="button" class="btn btn-outline-danger mr-2 btn-sm" data-dismiss="modal" value="Close">
														<input type="submit" class="btn btn-outline-success btn-sm updateRelationalInfo" value="Save">
													</div>
												</div>
												</div>
												<div class="tab-pane" role="tabpanel" id="updatestep3">
													<h4 class="text-center">Emergency Contact</h4>
													 <div class="row">
														<div class="col-md-4">
															<div class="form-group">
																<label>Name *</label> 
																<input class="form-control form-control-sm" type="text" name="emrgName" placeholder="Kofi Mensah" > 
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group">
																<label>Relationship  *</label> 
																<input class="form-control form-control-sm" type="text" name="relationship" placeholder="eg..brother, wife, father" > 
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group">
																<label>Phone *</label> 
																<input class="form-control form-control-sm" type="text" name="phone" placeholder="024 xxx xxxx" > 
															</div>
														</div>
													</div>
													<input type="button" class="btn btn-outline-danger btn-sm" data-dismiss="modal" value="Close">
													<input type="submit" class="btn btn-outline-success btn-sm updateEmergencyInfo" value="Save">
												</div>
												<div class="clearfix"></div>
											</div>
											
										</form>
									</div>
								</div>
							</div>
						</div>
					</section>
				</div>
				<div class="modal-footer">
					
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Delete Modal HTML -->
<div id="deleteEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form>
				<div class="modal-header">						
					<h4 class="modal-title">Delete Employee</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<p>Are you sure you want to delete these Records?</p>
					<p class="text-warning"><small>This action cannot be undone.</small></p>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-danger" value="Delete">
				</div>
			</form>
		</div>
	</div>
</div>
<!-- info Modal HTML -->
<div id="infomodal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">						
				<h4 class="modal-title">Profile</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<div class="circle circle-vw">
					<!-- User Profile Image -->
					<img class="profile-pic" src="{{asset('images/avatar.png')}}">
				</div>
				<div class="card">
					<h5 class="card-header">Personal Info</h5>
					<div class="card-body">
						<div class="row">
							<div class="col-md-4">
								<p class=" viewname"><span class="title">Mr</span> Kofi Mensah</p>
							</div>
							<div class="col-md-2">
								<p >Age: <span class=" viewage">24</span> </p>
							</div>
							<div class="col-md-2">
								<p >DoB: <span class=" viewdob">dd/mm/yy</span> </p>
							</div>
							<div class="col-md-2">
								<p class=" viewsex">male</p>
							</div>
							<div class="col-md-2">
								<p class=" viewstatus">single</p>
							</div>
							<div class="col-md-2">
								<p class=" viewphone">024 xxx xxxx</p>
							</div>
							<div class="col-md-4">
								<p class=" viewaddress">tema, comm16; lashibi</p>
							</div>
							<div class="col-md-2">
								<p class=" viewsemail">mensahkofi@gmail.com</p>
							</div>
							<div class="col-md-4">
								<p > Hometown: <span class=" viewhometown">Sege, ada;</span><span class="viewregion">Greater Accra</span></p>
							</div>
							<div class="col-md-4">
								<p class=" viewoccupation">Researchist, <span class="viewprofession"> crop and animal Researchist</span></p>
							</div>
							<div class="col-md-2">
								<p class=" viewemploymentstat">Employed</p>
							</div>
						</div>					
					</div>
				  </div>
				  <div class="card">
					<h5 class="card-header">Church Relational Info</h5>
					<div class="card-body">
						<div class="row">
							<div class="col-md-4">
								<p>Period: <span class="viewperiod">10 years and above</span></p>
							</div>
							<div class="col-md-2">
								<p>Berean Center: <span class="viewberea">5</span></p>
							</div>
							<div class="col-md-2">
								<p>Ministry: <span class=" viewministry"> Youth</span></p>
							</div>
							<div class="col-md-4">
								<p>Tithe: <span class=" viewtithe"> regular</span></p>
							</div>
							<div class="col-md-2">
								<p class=" ">welfare: <span class="viewwelfare">yes</span></p>
							</div>
							<div class="col-md-2">
								<p >Department: <span class=" viewdepartment"> Sunday school</span></p>
							</div>
						</div>					
					</div>
				</div>
				<div class="card">
					<h5 class="card-header">Emergency Contact</h5>
					<div class="card-body">
						<div class="row">
							<div class="col-md-4">
								<p class=" viewemergencyname">yaw mensah</p>
							</div>
							<div class="col-md-2">
								<p class=" viewemergencyphone">024 xxx xxxx</p>
							</div>
							<div class="col-md-4">
								<p>Relationship: <span class=" viewemergencyrelation">brother </span> </p>
							</div>
						</div>					
					</div>
				</div>
			</div>
			<div class="modal-footer">
				
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function(){
	// Activate tooltip
	$('[data-toggle="tooltip"]').tooltip();
	
	// Select/Deselect checkboxes
	var checkbox = $('table tbody input[type="checkbox"]');
	$("#selectAll").click(function(){
		if(this.checked){
			checkbox.each(function(){
				this.checked = true;                        
			});
		} else{
			checkbox.each(function(){
				this.checked = false;                        
			});
		} 
	});
	checkbox.click(function(){
		if(!this.checked){
			$("#selectAll").prop("checked", false);
		}
	});

	var readURL = function(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function (e) {
				$('.profile-pic').attr('src', e.target.result);
			}

			reader.readAsDataURL(input.files[0]);
		}
	}


	$(".file-upload").on('change', function(){
		readURL(this);
	});

	$(".upload-button").on('click', function() {
		$(".file-upload").click();
    });
    










    $('.nav-tabs > li a[title]').tooltip();
    
    //Wizard
    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {

        var target = $(e.target);
    
        if (target.parent().hasClass('disabled')) {
            return false;
        }
    });

    $(".next-step").click(function (e) {

        var active = $('.wizard .nav-tabs li.active');
        active.next().removeClass('disabled');
        nextTab(active);

    });
    $(".prev-step").click(function (e) {
        var active = $('.wizard .nav-tabs li.active');
        prevTab(active);

    });
});

function nextTab(elem) {
    $(elem).next().find('a[data-toggle="tab"]').click();
}
function prevTab(elem) {
    $(elem).prev().find('a[data-toggle="tab"]').click();
}


$('.nav-tabs').on('click', 'li', function() {
    $('.nav-tabs li.active').removeClass('active');
    $(this).addClass('active');

});


</script>
</body>
</html>
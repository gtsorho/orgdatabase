<!DOCTYPE html>
<html lang="en">
<head>

<link rel="icon" type="image/png" sizes="16x16" href ="{{asset('images/aglogo.png')}}">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>LPWC A/G</title>
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
					<div class="col-sm-4" id="logoCol">
						<img class="mb-4 mr-1 float-left" src="{{asset('images/aglogo.png')}}" alt="" width="40" height="40">
						<p style="display: inline;" id="nameP">LPWC Assemblies of God</p>
						<p style="margin: 0px 40px;" id="databaseP">DataBase</p>
					</div>
					<div class="col-sm-4" id="searchCol">
						<div class="input-group searchBox">
							<input type="text" placeholder="search" class="form-control search_input mb-1" >
							<i class="material-icons m-2" style="font-size: 20px">search</i>
						</div>
					</div>
					<div class="col-sm-4" id="addDelCol">	
						<nav class="navbar navbar-expand-sm navbar-dark	 ">
							<button class="navbar-toggler" style="border-color:none" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
							  <span class="navbar-toggler-icon"></span>
							</button>
							<div class="collapse navbar-collapse" id="navbarNav">
								<a  id="navlogoutdBtn" onclick="logout()"  class="btn btn-warning"><i class="material-icons">&#xe899;</i></a>						
								<a href="#addEmployeeModal" id="navAddBtn" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New</span></a>
								<a href="#deleteEmployeeModal" id='navDelBtn' class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>			
							</div>
						  </nav>

						</div>
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>
							<span class="custom-checkbox ">
								<input type="checkbox" id="selectAll" onclick="selectAll()" >								
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
				<tbody class="member_info">
										
				</tbody>
				<tbody class="relationalinfos" style="display: none">
					<tr class="relationalinfos_tr">
						<th colspan="7" class="text-center">Church Information Results</th>
					</tr>					
				</tbody>
				<tbody class="emergencyinfos" style="display: none">
					<tr class="emergencyinfos_tr">
						<th colspan="7" class="text-center">Emergency Contact Results</th>
					</tr>		
				</tbody>
			</table>
			<div class="clearfix">
				<div class="hint-text">Showing <b class="allPerPage">0</b> out of <b class="allEntries">0</b> entries</div>
				<ul class="pagination">
						<li class="page-item " onclick='previous_page()'  ><a href="#" class="page-link">Previous</a></li>
                        <span class="pagination_li" style="display:inline-flex" ></span>
                        <li class="page-item " onclick='next_page()' ><a href="#" class="page-link">Next</a></li>
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
					<h4 class="modal-title">Add Member</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				
				<form role="form" enctype="multipart/form-data" class="login-box addForm">
				
				<div class="circle ">
					<!-- User Profile Image -->
					<img class="profile-pic upload-button" src="{{asset('images/avatar.png')}}">
					<input class="file-upload" type="file" />
				</div>

				  <br>
				<div class="modal-body">
					<section class="signup-step-container">
						<div class="container">
							<div class="row d-flex justify-content-center">
								<div class="col">
									<div class="wizard addWizard">
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
						
										
											<div class="tab-content" id="main_form">
												<div class="tab-pane active" role="tabpanel" id="step1">
													<h4 class="text-center">Personal Information</h4>
													<div class="row">
														<div class="col-md-2 pr-1">
															<div class="form-group mt-4">
																<div class="form-check form-check-inline mr-1">
																	<input  class="form-check-input" type="radio" name="title" id="inlineRadio1" value="Mr">
																	<label class="form-check-label" for="inlineRadio1">Mr</label>
																</div>
																<div class="form-check form-check-inline mr-1">
																	<input  class="form-check-input" type="radio" name="title" id="inlineRadio2" value="Mrs">
																	<label class="form-check-label" for="inlineRadio2">Mrs</label>
																</div>
																<div class="form-check form-check-inline mr-1">
																	<input  class="form-check-input" type="radio" name="title" id="inlineRadio3" value="Miss" >
																	<label class="form-check-label" for="inlineRadio3">Miss</label>
																</div>
															</div>
														</div>	

														<div class="col-md-6">
															<div class="form-group">
																<label>First and Last Name*</label> 
																<input  class="form-control form-control-sm" type="text" name="name" placeholder=""  > 
															</div>
														</div>
														<div class="col-md-2" style="max-width: 20%">
															<div class="form-group">
																<label>DoB*</label> 
																<input  class="form-control form-control-sm" type="date" name="dob" placeholder=""  > 
															</div>
														</div>
														<div class="col-md-2" style="max-width: 10%">
															<div class="form-group">
																<label>Age*</label> 
																<input  class="form-control form-control-sm" type="number" name="age" placeholder="22"  style="width:200%"> 
															</div>
														</div>
														<div class="col-md-4 pr-1">
															<label class="font-weight-bold">Status*</label>
															<div class="form-group mt-0">
																<div class="form-check form-check-inline mr-1">
																	<input  class="form-check-input" type="radio" name="status" id="addinlineRadio1" value="married" >
																	<label class="form-check-label" for="addinlineRadio1">Married</label>
																</div>
																<div class="form-check form-check-inline mr-1">
																	<input  class="form-check-input" type="radio" name="status" id="addinlineRadio2" value="widow" >
																	<label class="form-check-label" for="addinlineRadio2">Widow</label>
																</div>
																<div class="form-check form-check-inline mr-1">
																	<input  class="form-check-input" type="radio" name="status" id="addinlineRadio3" value="single" >
																	<label class="form-check-label" for="addinlineRadio3">Single</label>
																</div>
																<div class="form-check form-check-inline mr-1">
																	<input  class="form-check-input" type="radio" name="status" id="addinlineRadio4" value="divorced" >
																	<label class="form-check-label" for="addinlineRadio4">Divorced</label>
																</div>
															</div>
														</div>
														<div class="col-md-2" style="max-width: 10%">
															<div class="form-group">
																<label>No# Children*</label> 
																<input class="form-control form-control-sm" type="number" name="noChildren" placeholder="2"  > 
															</div>
														</div>	
														<div class="col-md-4">
															<div class="form-group">
																<label>Phone*</label> 
																<input  class="form-control form-control-sm" type="text" name="phone" placeholder="020 xxx xxxx" > 
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group">
																<label>Email Address</label> 
																<input  class="form-control form-control-sm" type="email" name="email" placeholder="" > 
															</div>
														</div>
														
														<div class="col-md-6">
															<div class="form-group">
																<label>Resdential Address*</label> 
																<input  class="form-control form-control-sm" type="text" name="address" placeholder="Tema comm16, lashibi, Gas station" > 
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<label>Hometown & Region*</label> 
																<input  class="form-control form-control-sm" type="text" name="hometown" placeholder="Sege, Ada; Greater Accra " > 
															</div>
														</div>
														<div class="col-md-4 pr-1">
															<label class="font-weight-bold">Employment Status*</label>
															<div class="form-group mt-0">
																<div class="form-check form-check-inline mr-1">
																	<input  class="form-check-input" type="radio" name="employmentstat" id="addempstat1" value="employed" >
																	<label class="form-check-label" for="inlineRadio1">Employed</label>
																</div>
																<div class="form-check form-check-inline mr-1">
																	<input  class="form-check-input" type="radio" name="employmentstat" id="addempstat2" value="unemployed" >
																	<label class="form-check-label" for="inlineRadio2">Unemployed</label>
																</div>
																<div class="form-check form-check-inline mr-1">
																	<input  class="form-check-input" type="radio" name="employmentstat" id="addempstat3" value="retired"  >
																	<label class="form-check-label" for="inlineRadio3">Retired</label>
																</div>
																<div class="form-check form-check-inline mr-1">
																	<input  class="form-check-input" type="radio" name="employmentstat" id="addempstat4" value="student" >
																	<label class="form-check-label" for="inlineRadio3">Student</label>
																</div>
															</div>
														</div>	
														<div class="col-md-4">
															<div class="form-group">
																<label>Occupation*</label> 
																<input  class="form-control form-control-sm" type="text" name="occupation" placeholder="Reseacher or shs" > 
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group">
																<label>Field of Profession*</label> 
																<input  class="form-control form-control-sm" type="text" name="profession" placeholder="crop Researchist or General Science" > 
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
															<label for="exampleFormControlSelect1">Period of Stay*</label>
															<select class="form-control form-control-sm" name="period_of_stay" id="exampleFormControlSelect1">
															  <option>10 years and above</option>
															  <option>5  years and above</option>
															  <option>2  years and above</option>
															  <option>1 year</option>
															  <option>Just Joined</option>
															  <option>Distant Member</option>
															</select>
														  </div>
													</div>
													<div class="col-md-2 ml-5 pr-1">
														<label class="font-weight-bold">Baptized*</label>
														<div class="form-group mt-0">
															<div class="form-check form-check-inline mr-1">
																<input class="form-check-input" type="radio" name="baptized" id="addbaptized1" value="Baptized" >
																<label class="form-check-label" for="inlineRadio1">Baptized</label>
															</div>
															<div class="form-check form-check-inline mr-1">
																<input class="form-check-input" type="radio" name="baptized" id="addbaptized2" value="Not Baptized" >
																<label class="form-check-label" for="inlineRadio2">Not Baptized</label>
															</div>
														</div>
													</div>
													<div class="col-md-2">
														<div class="form-group">
															<label>Berea Center No.*</label> 
															<input class="form-control form-control-sm" type="text" name="berean_center" placeholder=""> 
														</div>
													</div>
													<div class="col-md-2 ml-5 pr-1">
														<label class="font-weight-bold">Tithe*</label>
														<div class="form-group mt-0">
															<div class="form-check form-check-inline mr-1">
																<input class="form-check-input" type="radio" name="tithe" id="addtithe1" value="regular" >
																<label class="form-check-label" for="inlineRadio1">Regular</label>
															</div>
															<div class="form-check form-check-inline mr-1">
																<input class="form-check-input" type="radio" name="tithe" id="addtithe2" value="irregular" >
																<label class="form-check-label" for="inlineRadio2">Irregular</label>
															</div>
														</div>
													</div>
													<div class="col-md-2 ml-5 pr-1">
														<label class="font-weight-bold">Welfare*</label>
														<div class="form-group mt-0">
															<div class="form-check form-check-inline mr-1">
																<input class="form-check-input" type="radio" name="welfare" id="addwelfare1" value="yes" >
																<label class="form-check-label" for="inlineRadio1">Yes</label>
															</div>
															<div class="form-check form-check-inline mr-1">
																<input class="form-check-input" type="radio" name="welfare" id="addwelfare2" value="no" >
																<label class="form-check-label" for="inlineRadio2">No</label>
															</div>
														</div>
													</div>
													<div class="col-md-4">
														<label class="font-weight-bold">Ministry*</label>
														<div class="form-group mt-0">
															<div class="form-check form-check-inline mr-1">
																<input class="form-check-input" type="radio" name="ministry" id="addmin1" value="men" >
																<label class="form-check-label" for="inlineRadio1">Men </label>
															</div>
															<div class="form-check form-check-inline mr-1">
																<input class="form-check-input" type="radio" name="ministry" id="addmin2" value="women" >
																<label class="form-check-label" for="inlineRadio2">Women</label>
															</div>
															<div class="form-check form-check-inline mr-1">
																<input class="form-check-input" type="radio" name="ministry" id="addmin3" value="youth" >
																<label class="form-check-label" for="inlineRadio2">Youth</label>
															</div>
														</div>
													</div>
													
													<div class="col-md-8">
														<label class="font-weight-bold">Department*</label>
														<div class="form-group mt-0">
															<div class="form-check form-check-inline mr-1">
																<input class="form-check-input" type="radio" name="department" id="addDpt1" value="music" >
																<label class="form-check-label" for="inlineRadio1">Music Ministry</label>
															</div>
															<div class="form-check form-check-inline mr-1">
																<input class="form-check-input" type="radio" name="department" id="addDpt2" value="usher" >
																<label class="form-check-label" for="inlineRadio2">Protocol Department</label>
															</div>
															<div class="form-check form-check-inline mr-1">
																<input class="form-check-input" type="radio" name="department" id="addDpt3" value="teacher" >
																<label class="form-check-label" for="inlineRadio1">Sunday Sch Dept.</label>
															</div>
															<div class="form-check form-check-inline mr-1">
																<input class="form-check-input" type="radio" name="department" id="addDpt4" value="theater" >
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
																<label>Name*</label> 
																<input class="form-control form-control-sm" type="text" name="emergency_name" placeholder="Kofi Mensah" > 
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group">
																<label>Relationship*</label> 
																<input class="form-control form-control-sm" type="text" name="emergency_relation" placeholder="eg..brother, wife, father" > 
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group">
																<label>Phone*</label> 
																<input class="form-control form-control-sm" type="text" name="emergency_phone" placeholder="024 xxx xxxx" > 
															</div>
														</div>
													</div>
													<ul class="list-inline pull-right">
														<li><button type="button" class="default-btn prev-step">Back</button></li>
														{{-- <li><button type="button" class="default-btn next-step skip-btn">Skip</button></li> --}}
														<li><button type="button" class="default-btn next-step submit_addform">Continue</button></li>
													</ul>
												</div>
												<div class="tab-pane" role="tabpanel" id="step4">
													<h4 class="text-center finalize">Finalize</h4>
														<div class="finalize_msg row" ></div>
														<h6 class="text-center finalize_foot">Completed</h6>
													<ul class="list-inline pull-right">
														<li><button type="button" class="default-btn prev-step">Back</button></li>
														<li><button type="button" class="default-btn next-step" onclick="location.reload()">Finish</button></li>
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
				<div class="modal-header">						
					<h4 class="modal-title">Edit Member</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>

				<form role="form" enctype="multipart/form-data" class="login-box updateForm">

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
						
										
											<div class="tab-content" id="main_form">
												<div class="tab-pane active" role="tabpanel" id="updatestep1">
													<h4 class="text-center">Personal Information</h4>
													<div class="row personalinfo">
														<div class="col-md-2 pr-1">
															<div class="form-group mt-4">
																<div class="form-check form-check-inline mr-1">
																	<input class="form-check-input" type="radio" name="inlineRadioOptions" id="updatetitle1" value="Mr">
																	<label class="form-check-label" for="inlineRadio1">Mr</label>
																</div>
																<div class="form-check form-check-inline mr-1">
																	<input class="form-check-input" type="radio" name="inlineRadioOptions" id="updatetitle2" value="Mrs">
																	<label class="form-check-label" for="inlineRadio2">Mrs</label>
																</div>
																<div class="form-check form-check-inline mr-1">
																	<input class="form-check-input" type="radio" name="inlineRadioOptions" id="updatetitle3" value="Miss">
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
																	<input class="form-check-input" type="radio" name="status" id="updatestatus1" value="married" >
																	<label class="form-check-label" for="inlineRadio1">Married</label>
																</div>
																<div class="form-check form-check-inline mr-1">
																	<input class="form-check-input" type="radio" name="status" id="updatestatus2" value="widow" >
																	<label class="form-check-label" for="inlineRadio2">Widow</label>
																</div>
																<div class="form-check form-check-inline mr-1">
																	<input class="form-check-input" type="radio" name="status" id="updatestatus3" value="single" >
																	<label class="form-check-label" for="inlineRadio3">Single</label>
																</div>
																<div class="form-check form-check-inline mr-1">
																	<input class="form-check-input" type="radio" name="status" id="updatestatus4" value="divorced" >
																	<label class="form-check-label" for="inlineRadio3">Divorced</label>
																</div>
															</div>
														</div>	
														<div class="col-md-2" style="max-width: 10%">
															<div class="form-group">
																<label>No# Children*</label> 
																<input class="form-control form-control-sm" type="number" name="noChildren" placeholder="2"  > 
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group">
																<label>Phone *</label> 
																<input class="form-control form-control-sm" type="text" name="phone" placeholder="020 xxx xxxx" > 
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group">
																<label>Email Address *</label> 
																<input class="form-control form-control-sm" type="email" name="email" placeholder="" > 
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
																	<input class="form-check-input" type="radio" name="employmentstat" id="updateempStatus1" value="employed" >
																	<label class="form-check-label" for="updateempStatus1">Employed</label>
																</div>
																<div class="form-check form-check-inline mr-1">
																	<input class="form-check-input" type="radio" name="employmentstat" id="updateempStatus2" value="unemployed" >
																	<label class="form-check-label" for="updateempStatus1">Unemployed</label>
																</div>
																<div class="form-check form-check-inline mr-1">
																	<input class="form-check-input" type="radio" name="employmentstat" id="updateempStatus3" value="retired"  >
																	<label class="form-check-label" for="updateempStatus3">Retired</label>
																</div>
																<div class="form-check form-check-inline mr-1">
																	<input class="form-check-input" type="radio" name="employmentstat" id="updateempStatus4" value="student" >
																	<label class="form-check-label" for="updateempStatus4">Student</label>
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
														<input type="button" class="btn btn-outline-danger mr-2 btn-sm" data-dismiss="modal" onclick="location.reload()" value="Close">
														<input type="button" class="btn btn-outline-success btn-sm updatePersonalInfo1" onclick="update('personalinfo')" value="Save">
													</div>
																					
												</div>
												<div class="tab-pane" role="tabpanel" id="updatestep2">
													<h4 class="text-center">Church Relational Info</h4>
													<div class="row  relationalinfo">
														<div class="col-md-4">
															<div class="form-group">
																<label for="exampleFormControlSelect2">Period of Stay</label>
																<select class="form-control form-control-sm" name="period_of_stay" id="exampleFormControlSelect2">
																<option>10 years and above</option>
																<option>5  years and above</option>
																<option>2  years and above</option>
																<option>1 year</option>
																<option>Just Joined</option>
																</select>
															</div>
														</div>
														<div class="col-md-2 ml-5 pr-1">
															<label class="font-weight-bold">Baptized*</label>
															<div class="form-group mt-0">
																<div class="form-check form-check-inline mr-1">
																	<input class="form-check-input" type="radio" name="baptized" id="updatebaptized1" value="Baptized" >
																	<label class="form-check-label" for="updatebaptized1">Baptized</label>
																</div>
																<div class="form-check form-check-inline mr-1">
																	<input class="form-check-input" type="radio" name="baptized" id="updatebaptized2" value="Not Baptized" >
																	<label class="form-check-label" for="updatebaptized2">Not Baptized</label>
																</div>
															</div>
														</div>
														<div class="col-md-2">
															<div class="form-group">
																<label>Berea Center No. *</label> 
																<input class="form-control form-control-sm" type="text" name="berean_center" placeholder=""> 
															</div>
														</div>
														<div class="col-md-2 ml-5 pr-1">
															<label class="font-weight-bold">Tithe</label>
															<div class="form-group mt-0">
																<div class="form-check form-check-inline mr-1">
																	<input class="form-check-input" type="radio" name="tithe" id="updatetithe1" value="regular" >
																	<label class="form-check-label" for="updatetithe1">Regular</label>
																</div>
																<div class="form-check form-check-inline mr-1">
																	<input class="form-check-input" type="radio" name="tithe" id="updatetithe2" value="irregular" >
																	<label class="form-check-label" for="updatetithe2">Irregular</label>
																</div>
															</div>
														</div>
														<div class="col-md-2 ml-5 pr-1">
															<label class="font-weight-bold">Welfare</label>
															<div class="form-group mt-0">
																<div class="form-check form-check-inline mr-1">
																	<input class="form-check-input" type="radio" name="welfare" id="updatewelfare1" value="yes" >
																	<label class="form-check-label" for="updatewelfare1">Yes</label>
																</div>
																<div class="form-check form-check-inline mr-1">
																	<input class="form-check-input" type="radio" name="welfare" id="updatewelfare2" value="no" >
																	<label class="form-check-label" for="updatewelfare2">No</label>
																</div>
															</div>
														</div>
														<div class="col-md-4">
															<label class="font-weight-bold">Ministry</label>
															<div class="form-group mt-0">
																<div class="form-check form-check-inline mr-1">
																	<input class="form-check-input" type="radio" name="ministry" id="updateministry1" value="men" >
																	<label class="form-check-label" for="updateministry1">Men </label>
																</div>
																<div class="form-check form-check-inline mr-1">
																	<input class="form-check-input" type="radio" name="ministry" id="updateministry2" value="women" >
																	<label class="form-check-label" for="updateministry2">Women</label>
																</div>
																<div class="form-check form-check-inline mr-1">
																	<input class="form-check-input" type="radio" name="ministry" id="updateministry3" value="youth" >
																	<label class="form-check-label" for="updateministry3">Youth</label>
																</div>
															</div>
														</div>
														
														<div class="col-md-8">
															<label class="font-weight-bold">Department</label>
															<div class="form-group mt-0">
																<div class="form-check form-check-inline mr-1">
																	<input class="form-check-input" type="radio" name="department" id="updatedpt1" value="music" >
																	<label class="form-check-label" for="updatedpt1">Music Ministry</label>
																</div>
																<div class="form-check form-check-inline mr-1">
																	<input class="form-check-input" type="radio" name="department" id="updatedpt2" value="usher" >
																	<label class="form-check-label" for="updatedpt2">Protocol Department</label>
																</div>
																<div class="form-check form-check-inline mr-1">
																	<input class="form-check-input" type="radio" name="department" id="updatedpt3" value="teacher" >
																	<label class="form-check-label" for="updatedpt3">Sunday Sch Dept.</label>
																</div>
																<div class="form-check form-check-inline mr-1">
																	<input class="form-check-input" type="radio" name="department" id="updatedpt4" value="theater" >
																	<label class="form-check-label" for="updatedpt4">Theater Ministry</label>
																</div>
															</div>
														</div>
													</div>
													<div class="float-right">
														<input type="button" class="btn btn-outline-danger mr-2 btn-sm" data-dismiss="modal" onclick="location.reload()" value="Close">
														<input type="button" class="btn btn-outline-success btn-sm updateRelationalInfo2" onclick="update('relationalinfo')" value="Save">
													</div>
												</div>
												<div class="tab-pane emergencyinfo" role="tabpanel" id="updatestep3">
													<h4 class="text-center ">Emergency Contact</h4>
													 <div class="row">
														<div class="col-md-4">
															<div class="form-group">
																<label>Name *</label> 
																<input class="form-control form-control-sm" type="text" name="emergency_name" placeholder="Kofi Mensah" > 
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group">
																<label>Relationship  *</label> 
																<input class="form-control form-control-sm" type="text" name="emergency_relation" placeholder="eg..brother, wife, father" > 
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group">
																<label>Phone *</label> 
																<input class="form-control form-control-sm" type="text" name="emergency_phone" placeholder="024 xxx xxxx" > 
															</div>
														</div>
													</div>
													<div class="float-right">
														<input type="button" class="btn btn-outline-danger btn-sm" data-dismiss="modal" onclick="location.reload()" value="Close">
														<input type="button" class="btn btn-outline-success btn-sm updateEmergencyInfo3"onclick="update('emergencyinfo')"  value="Save">
													</div>
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
				<div class="modal-footer edit_errorMsg">
					
				</div>
		</div>
	</div>
</div>
<!-- Delete Modal HTML -->
<div id="deleteEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form>
				<div class="modal-header">						
					<h4 class="modal-title">Delete Member</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<p>Are you sure you want to delete these Records?</p>
					<p class="text-warning"><small>This action cannot be undone.</small></p>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="button" id="deleteData" class="btn btn-danger" value="Delete">
				</div>
			</form>
		</div>
	</div>
</div>
<div id="deleteEmployeeModal2" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form>
				<div class="modal-header">						
					<h4 class="modal-title">Delete Member</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<p>Are you sure you want to delete these Records?</p>
					<p class="text-warning"><small>This action cannot be undone.</small></p>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="button" id="deleteSingleData" class="btn btn-danger" value="Delete">
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
			<div class="modal-body view_profile">
				<div class="circle circle-vw">
					<!-- User Profile Image -->
					<img class="profile-pic view_pic" src="{{asset('images/avatar.png')}}">
				</div>
				<div class="card " >
					<h5 class="card-header">Personal Info</h5>
					<div class="card-body ">
						<div class="row ">
							<div class="col-md-4">
								<span style="font-weight: 100" class="viewtitle d-inline">Mr</span> <p style="font-weight: bold" class=" viewname d-inline"> Kofi Mensah</p>
							</div>
							<div class="col-md-2">
								<p style="font-weight: bold" >Age: <span style="font-weight: 100" class=" viewage">24</span> </p>
							</div>
							<div class="col-md-2">
								<p style="font-weight: bold" >DoB: <span style="font-weight: 100" class=" viewdob">dd/mm/yy</span> </p>
							</div>
							<div class="col-md-2">
								<p style="font-weight: bold">Sex: <span style="font-weight: 100" class=" viewsex">male</span></p>
							</div>
							<div class="col-md-2">
								<p style="font-weight: bold">Status: <span style="font-weight: 100" class=" viewstatus">single</span></p>
							</div>
							<div class="col-md-2">
								<p style="font-weight: bold">No# Children: <span style="font-weight: 100" class=" viewnochildren">2</span></p>
							</div>
							<div class="col-md-2">
								<p style="font-weight: bold">Phone: <span style="font-weight: 100" class=" viewphone">024 xxx xxxx</span></p>
							</div>
							<div class="col-md-4">
								<p style="font-weight: bold">Address: <span style="font-weight: 100" class=" viewaddress">tema, comm16; lashibi</span></p>
							</div>
							<div class="col-md-2">
								<p style="font-weight: bold">Email: <span style="font-weight: 100;text-transform: lowercase !important" class=" viewemail">mensahkofi@gmail.com</span></p>
							</div>
							<div class="col-md-4">
								<p style="font-weight: bold" > Hometown: <span style="font-weight: 100" class=" viewhometown">Sege, ada;</span></p>
							</div>
							<div class="col-md-4">
								<p class=" viewoccupation  d-inline" style="font-weight: bold">Researchist, </p>, &nbsp; &nbsp; <p class="viewprofession  d-inline"> crop and animal Researchist</p>
							</div>

							<div class="col-md-2">
								<p style="font-weight: bold" class=" viewemploymentstat">Employed</p>
							</div>
						</div>					
					</div>
				  </div>
				  <div class="card">
					<h5 class="card-header">Church Relational Info</h5>
					<div class="card-body">
						<div class="row">
							<div class="col-md-4">
								<p style="font-weight: bold">Period: <span style="font-weight: 100" class="viewperiod">10 years and above</span></p>
							</div>
							<div class="col-md-4">
								<p style="font-weight: bold">Baptizim: <span style="font-weight: 100" class="viewbaptized">Baptized</span></p>
							</div>
							<div class="col-md-2">
								<p style="font-weight: bold">Berean Center: <span style="font-weight: 100" class="viewberea">5</span></p>
							</div>
							<div class="col-md-2">
								<p style="font-weight: bold">Ministry: <span style="font-weight: 100" class=" viewministry"> Youth</span></p>
							</div>
							<div class="col-md-4">
								<p style="font-weight: bold">Tithe: <span style="font-weight: 100" class=" viewtithe"> regular</span></p>
							</div>
							<div class="col-md-2">
								<p style="font-weight: bold" class=" ">welfare: <span style="font-weight: 100" class="viewwelfare">yes</span></p>
							</div>
							<div class="col-md-2">
								<p style="font-weight: bold" >Department: <span style="font-weight: 100" class=" viewdepartment"> Sunday school</span></p>
							</div>
						</div>					
					</div>
				</div>
				<div class="card">
					<h5 class="card-header">Emergency Contact</h5>
					<div class="card-body">
						<div class="row">
							<div class="col-md-4">
								<p style="font-weight: bold"  class=" viewemergencyname">yaw mensah</p>
							</div>
							<div class="col-md-2">
								<p style="font-weight: bold"  class=" viewemergencyphone">024 xxx xxxx</p>
							</div>
							<div class="col-md-4">
								<p style="font-weight: bold" >Relationship: <span style="font-weight: 100" class=" viewemergencyrelation">brother </span> </p>
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

<a class="btn btn-dark" style="display: none" id="logs"><i class="material-icons">&#xe873;</i> <span>logs</span></a><br><br>					

<a class="btn btn-warning" id="export"><i class="material-icons">&#xe873;</i> <span>Export</span></a><br><br>					
<small style="display: none" class="text-muted float-right mr-5 " id="exportNote"><i class="material-icons">&#xe001;</i>  Export all members from DataBase</small>

<script>
	$(document).ready(function(){
	// Activate tooltip
	$('[data-toggle="tooltip"]').tooltip();
	
	// Select/Deselect checkboxes
	

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

	$(".upload-button").on('click', function(e) {
		e.stopImmediatePropagation();
		e.preventDefault()
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

        var active = $('.addWizard .nav-tabs li.active');
		active.next().removeClass('disabled');
        nextTab(active);

    });
    $(".prev-step").click(function (e) {
        var active = $('.addWizard .nav-tabs li.active');
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
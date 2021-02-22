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
<script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>

<style>
	body, table, .table-wrapper  {
		background-color: #272929;
	}
	table.table tr th, table.table tr td {
    border-color: #272929 !important;
}
    table.table tr th, table.table tr td {
        border-color: #e9e9e9;
        padding: 6px 15px;
        vertical-align: middle;
}
.pagination li a:hover {
    background-color: #ffc107;
}
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
					<div class="col-sm-6" id="logoCol" href="/">
						<a href="/" style="text-decoration: inherit; color:inherit">
							<img class="mb-4 mr-1 float-left" src="{{asset('images/aglogo.png')}}" alt="" width="40" height="40">
							<p style="display: inline;" id="nameP">LPWC Assemblies of God</p>
							<p style="margin: 0px 40px;" id="databaseP">DataBase</p>
						</a>
					</div>
					<div class="col-sm-6" id="addDelCol">					
						<a  onclick="logout()"  class="btn btn-warning mr-4"><i class="material-icons">&#xe899;</i></a>						
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr style="	color: #8e8d8d;">
						<th>Name</th>
						<th>Description</th>
						<th>Time</th>
					</tr>
				</thead>
				<tbody style="font-size: 11px;" class="log_data">
										
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

<!-- info Modal HTML -->
<div id="infomodal" class="modal fade">
	<div class="modal-dialog" style="max-width: 50%;  ">
		<div class="modal-content"  style=" background-color: #272929;">
			<div class="modal-header">						
				<h4 class="modal-title">Log Info</h4>
				<button type="button" class="close text-danger" style="text-shadow: none" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body view_profile">
				
			</div>
			<div class="modal-footer" style=" background-color: #272929;">
				
			</div>
		</div>
	</div>
</div>

<script>
    
	$(document).ready(function(){
		var page;
        var token = localStorage.getItem('access_token')
        $.ajax({
            type: 'get',
            url: 'api/log',
            dataType: 'json',
            headers: {
                "Authorization": `Bearer ${token}`
            },
            success: function(data) {
				console.log(data)
               logView(data)
            }, 
            error: function(data){
				if(data.status == 401 || data.responseJSON.message =="Unauthenticated."){
					window.location = 'login'
				}
            }
        })

		window.pageView = function(i){
			$.ajax({
				type: 'get',
				url: `api/log?page=${i}`,
				dataType: 'json',
				headers: {
					"Authorization": `Bearer ${token}`
				},
				success: function(data) {
					page = data.current_page
					$('.log_data').html('')
					var obj3 = data.data
					var j = data.from - 2
					for(var prop in obj3 ){
						var item3 = obj3[prop];
						j++
						if(item3.properties.attributes.name){
							var name = item3.properties.attributes.name
						}else(
							name = item3.log_name               
						)
						$('.log_data').append(`
						<tr class='logRow${item3.id}' >
								<td  style="width: 30%;" href="#infomodal" onclick='viewone("${item3.id}", ${j})' data-toggle="modal">${name}</td>
								<td  style="width: 50%;" href="#infomodal" onclick='viewone("${item3.id}", ${j})' data-toggle="modal">${item3.description}</td>
								<td  style="width: 30%;" href="#infomodal" onclick='viewone("${item3.id}", ${j})' data-toggle="modal">${item3.updated_at}</td>
						</tr>
						` )
						
						if(item3.log_name == "personal"){
							$(`.logRow${item3.id}`).css({'background-color':'rgb(202 108 108)','font-weight': '600'})
						}
						else{
							$(`.logRow${item3.id}`).css('background-color','#abd4c8 ')
						}

						$('.allPerPage').text(data.to)
						$('.allEntries').text(data.total)

					}


					window.viewone = function(id, index){
						console.log(data)
						console.log(data.data[index].properties.attributes)
						var obj = data.data[index].properties.attributes;	
						var obj2 = data.data[index].properties.old;
						$('.view_profile').html('');
						$('.view_profile').append(`
							<p style="font-weight: bold; font-size:15px">Data</p>
							<hr>
						`)
						for(var prop in obj) {
							var item = obj[prop]; 
							$('.view_profile').append(`
								<p style="font-weight: bold; color:#09bd09">${prop}: <span style="font-weight: 100" class=" viewaddress">${item}</span></p>
							`) 
						}
						if(data.data[index].description == "Has been updated"){
							$('.view_profile').append(`
								<p style="font-weight: bold; font-size:15px" >Old Data</p>
								<hr>
							`)
							for(var prop in obj2) {
								var item2 = obj2[prop];
								$('.view_profile').append(`
									<p style="font-weight: bold; color:red" >${prop}: <span style="font-weight: 100" class=" viewaddress">${item2}</span></p>
								`) 
							}
						}
					} 
					$('.pagination_li').html('');
					for(var i = 1; i <= data.last_page; i++ ){
						$('.pagination_li').append(`
							<li class="page-item" id="active${i}"><a href="#" onclick='pageView(${i})' class="page-link">${i}</a></li>
						`) 
					}
					
					$(`#active${data.current_page}`).attr('class','page-item active' )
				}, 
				error: function(data){
					if(data.status == 401 || data.responseJSON.message =="Unauthenticated."){
						window.location = 'login'
					}
				}
			})
		}
		
		window.logView = function(data){
			page = data.current_page
			$('.log_data').html('')
			for(var i = 0; i < data.data.length; i++ ){
				
				if(data.data[i].properties.attributes.name){0
					var name = data.data[i].properties.attributes.name
				}else(
					name = data.data[i].log_name               
				)
				$('.log_data').append(`
				<tr class='logRow${data.data[i].id}' >
						<td  style="width: 30%; " href="#infomodal" onclick='viewone("${data.data[i].id}", ${i})' data-toggle="modal">${name}</td>
						<td  style="width: 50%; " href="#infomodal" onclick='viewone("${data.data[i].id}", ${i})' data-toggle="modal">${data.data[i].description}</td>
						<td  style="width: 30%; " href="#infomodal" onclick='viewone("${data.data[i].id}", ${i})' data-toggle="modal">${data.data[i].updated_at}</td>
				</tr>
				` )
				
				
				
				if(data.data[i].log_name == "personal"){
					$(`.logRow${data.data[i].id}`).css({'background-color':'rgb(202 108 108)','font-weight': '600'})
				}
				else{
					$(`.logRow${data.data[i].id}`).css('background-color','#abd4c8 ')
				}

				$('.allPerPage').text(data.to)
				$('.allEntries').text(data.total)

			}


			window.viewone = function(id, index){
				console.log(data.data[index].properties.attributes)
				var obj = data.data[index].properties.attributes;
				var obj2 = data.data[index].properties.old;
				$('.view_profile').html('');
				$('.view_profile').append(`
					<p style="font-weight: bold; font-size:15px">Data</p>
					<hr>
				`)
				for(var prop in obj) {
					var item = obj[prop]; 
					$('.view_profile').append(`
						<p style="font-weight: bold; color:#09bd09">${prop}: <span style="font-weight: 100" class=" viewaddress">${item}</span></p>
					`) 
				}
				if(data.data[index].description == "Has been updated"){
					$('.view_profile').append(`
						<p style="font-weight: bold; font-size:15px" >Old Data</p>
						<hr>
					`)
					for(var prop in obj2) {
						var item2 = obj2[prop];
						$('.view_profile').append(`
							<p style="font-weight: bold; color:red" >${prop}: <span style="font-weight: 100" class=" viewaddress">${item2}</span></p>
						`) 
					}
				}
			} 
			$('.pagination_li').html('');
			for(var i = 1; i <= data.last_page; i++ ){
				$('.pagination_li').append(`
					<li class="page-item" id="active${i}"><a href="#" onclick='pageView(${i})' class="page-link">${i}</a></li>
				`) 
			}
			
			$(`#active${data.current_page}`).attr('class','page-item active' )
		}

		window.logout = function(){
        $.ajax({
            type: 'post',
            url: 'api/logout',
            dataType: 'json',
            headers: {
                "Authorization": `Bearer ${token}`
            },
            success: function(data) {
               window.location = 'login'
            }, 
            error: function(data){
                    if(data.status == 401 || data.responseJSON.message =="Unauthenticated."){
                        window.location = 'login'
                    }
            }
        })
    }

    window.previous_page = function (){
		if(page > 1){
		pageView(page-1)
		}
    }
	window.next_page = function (){
		pageView( page + 1)
	}
	});


</script>
</body>
</html>
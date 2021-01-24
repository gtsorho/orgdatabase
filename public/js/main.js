

$(document).ready(function(){
    $('.submit_addform').on('click', function(){
        // e.preventDefault()
        var fd = new FormData();
        var image = $('.file-upload')[0].files[0]; 
        if(image){
            fd.append('image',image);
        }
        var input = $(".addForm .form-control")
		for (var i = 0; i < input.length; i++) {
            fd.append(input[i].name, input[i].value)
        }   
        var checkedInput =  $('.addForm input[type=radio]:checked') 
        for (var i = 0; i < checkedInput.length; i++){
            fd.append(checkedInput[i].name, checkedInput[i].value)
        }
            $.ajax({
                type: 'post',
                url: 'api/store',
                data:fd,            
                cache: false,
                contentType: false, //must, tell jQuery not to process the data
                processData: false,
                headers: {
                    "Authorization": `Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYXBpXC9sb2dpbiIsImlhdCI6MTYxMTUyODE2NiwiZXhwIjoxNjExNTMxNzY2LCJuYmYiOjE2MTE1MjgxNjYsImp0aSI6InE3cHFvN2tNZ3ljOGlqYmsiLCJzdWIiOjEsInBydiI6Ijg3ZTBhZjFlZjlmZDE1ODEyZmRlYzk3MTUzYTE0ZTBiMDQ3NTQ2YWEifQ.htiy9SuLDJkdIZs27PboFI3lxH40pG0VOvlAYELs2ck`
                },
                success: function(data)
                {
                    $(".addForm").trigger("reset")
                //     console.log($($(`#portfolioIndex${data[0].id}`)[0].childNodes[1]))
                //     $($(`#portfolioIndex${data[0].id}`)[0].childNodes[1]).attr("src", `{{asset('storage/${data[0].portfolioImage}')}}`)
                }
            });
            // $(`#portfolioIndex${value.id}`).popover('hide')
         
    })
    var update_id;
    window.update = function (sectionToUpdate){

        console.log([sectionToUpdate, update_id])

        var fd = new FormData();
        var image = $('.file-upload')[0].files[0]; 
        if(image){
            fd.append('image',image);
        }

        var input = $(`.updateForm .${sectionToUpdate} .form-control`)
		for (var i = 0; i < input.length; i++) {
            if(input[i].value){
                fd.append(input[i].name, input[i].value)
            }
        }   
        var checkedInput =  $(`.updateForm .${sectionToUpdate} input[type=radio]:checked`) 
        for (var i = 0; i < checkedInput.length; i++){
            fd.append(checkedInput[i].name, checkedInput[i].value)
        }
        fd.append('update_id', update_id)
        fd.append('flavour', sectionToUpdate)
        $.ajax({
            type: 'post',
            url: 'api/update',
            data:fd,            
            cache: false,
            contentType: false, //must, tell jQuery not to process the data
            processData: false,
            headers: {
                "Authorization": `Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYXBpXC9sb2dpbiIsImlhdCI6MTYxMTUyODE2NiwiZXhwIjoxNjExNTMxNzY2LCJuYmYiOjE2MTE1MjgxNjYsImp0aSI6InE3cHFvN2tNZ3ljOGlqYmsiLCJzdWIiOjEsInBydiI6Ijg3ZTBhZjFlZjlmZDE1ODEyZmRlYzk3MTUzYTE0ZTBiMDQ3NTQ2YWEifQ.htiy9SuLDJkdIZs27PboFI3lxH40pG0VOvlAYELs2ck`
            },
            success: function(data)
            {
                $(".updateForm").trigger("reset")
            }
        });
    } 
    
    
    $.ajax({
        type: 'get',
        url: 'api/viewall',
        dataType: 'json',
        headers: {
            "Authorization": `Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYXBpXC9sb2dpbiIsImlhdCI6MTYxMTUyODE2NiwiZXhwIjoxNjExNTMxNzY2LCJuYmYiOjE2MTE1MjgxNjYsImp0aSI6InE3cHFvN2tNZ3ljOGlqYmsiLCJzdWIiOjEsInBydiI6Ijg3ZTBhZjFlZjlmZDE1ODEyZmRlYzk3MTUzYTE0ZTBiMDQ3NTQ2YWEifQ.htiy9SuLDJkdIZs27PboFI3lxH40pG0VOvlAYELs2ck`
        },
        success: function(data) {
                var response = data.data
            for(var i = 0; i < response.length; i++ ){
                console.log(response[i])
                $('.member_info').append(`
                    <tr>
                        <td>
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox${response[i].id}" name="options[]" value="1">
								<label for="checkbox${response[i].id}"></label>
							</span>
						</td>
							<td href="#infomodal" onclick='viewone("${response[i].id}")' data-toggle="modal"><img src="storage/${response[i].profileImg}" alt="Avatar" class="avatar"></td>
							<td href="#infomodal" onclick='viewone("${response[i].id}")' data-toggle="modal">${response[i].name}</td>
							<td href="#infomodal" onclick='viewone("${response[i].id}")' data-toggle="modal">${response[i].email}</td>
							<td href="#infomodal" onclick='viewone("${response[i].id}")' data-toggle="modal">${response[i].address}</td>
							<td href="#infomodal" onclick='viewone("${response[i].id}")' data-toggle="modal">${response[i].phone}</td>
						<td>
							<a href="#editEmployeeModal" class="edit" onclick='updateMember("${response[i].id}")' data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
							<a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                        </td>
                    </tr>
                `)
            }

            window.updateMember = function(id){
                update_id = id;
            }

            window.viewone = function (id){
                $.ajax({
                    type: 'post',
                    url: 'api/viewone',
                    dataType: 'json',
                    data: {
                        'id': id
                    },
                    headers: {
                        "Authorization": `Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYXBpXC9sb2dpbiIsImlhdCI6MTYxMTUyODE2NiwiZXhwIjoxNjExNTMxNzY2LCJuYmYiOjE2MTE1MjgxNjYsImp0aSI6InE3cHFvN2tNZ3ljOGlqYmsiLCJzdWIiOjEsInBydiI6Ijg3ZTBhZjFlZjlmZDE1ODEyZmRlYzk3MTUzYTE0ZTBiMDQ3NTQ2YWEifQ.htiy9SuLDJkdIZs27PboFI3lxH40pG0VOvlAYELs2ck`
                    },
                    success: function(data) {
                        console.log(data)
                        $('.viewtitle').text(data[0].title)
                        $('.viewname').text(data[0].name)
                        $('.viewage').text(data[0].age)
                        $('.viewemail').text(data[0].email)
                        $('.viewphone').text(data[0].phone)
                        $('.viewstatus').text(data[0].status)
                        $('.viewdob').text(data[0].dob)
                        $('.viewsex').text(data[0].sex)
                        $('.viewaddress').text(data[0].address)
                        $('.viewhometown').text(data[0].hometown)
                        $('.viewprofession').text(data[0].profession)
                        $('.viewoccupation').text(data[0].occupation)
                        $('.viewemploymentstat').text(data[0].employmentstat)
                        $('.viewperiod').text(data[0].period_of_stay)
                        $('.viewberea').text(data[0].berean_center)
                        $('.viewministry').text(data[0].ministry)
                        $('.viewtithe').text(data[0].tithe)
                        $('.viewwelfare').text(data[0].welfare)
                        $('.viewdepartment').text(data[0].department)
                        $('.viewemergencyname').text(data[0].emergency_name)
                        $('.viewemergencyphone').text(data[0].emergency_phone)
                        $('.viewemergencyrelation').text(data[0].emergency_relation)
                        $('.view_pic').attr("src", `storage/${data[0].profileImg}`)
                    },
                    error: function (data){
                        console.log(data)
                    }
                })
        
            }

        }, 
        error: function(data){

        }
    })

    









})

















// $(`#portfolioIndex${value.id}`).on('shown.bs.popover', function () {
//     $('#portfolioUpdate').on('click', function(e){
//     e.preventDefault()                  
//     var fd = new FormData();
//     var files =  $(`#displayedClient${value.id}`)[0].files[0]
//     var text = $(`#displayedPortfolioText${value.id}`)[0].value
//     fd.append('file',files);
//     fd.append('imgId', value.id)
//     fd.append('portfolioText', text)
//         $.ajax({
//             type: 'post',
//             url: `{{url('api/adminportfolioupdate')}}`,
//             data:fd,            
//             cache: false,
//             contentType: false, //must, tell jQuery not to process the data
//             processData: false,
//             headers: {
//                 "Authorization": `Bearer ${token}`
//             },
//             success: function(data)
//             {
//                 console.log($($(`#portfolioIndex${data[0].id}`)[0].childNodes[1]))
//                 $($(`#portfolioIndex${data[0].id}`)[0].childNodes[1]).attr("src", `{{asset('storage/${data[0].portfolioImage}')}}`)
//             }
//         });
//         $(`#portfolioIndex${value.id}`).popover('hide')
//     });

//     $('#destroyPortfolio').on('click', function(e){
//         var imgPath = value.portfolioImage
//         var imgId = value.id
//     e.preventDefault()                  
//         $.ajax({
//             type: 'post',
//             url: `{{url('api/admindeleteportfolio')}}`,
//             data:{  'path':imgPath,
//                     'imgId':imgId
//                 },            
//             datatype:'json',
//             headers: {
//                 "Authorization": `Bearer ${token}`
//             },
//             success: function(data)
//             {
//                 $(`#portfolioIndex${value.id}`).popover('hide')
//                 $(`#portfolioIndex${value.id}`).parent().detach()
//             }
//         });
//         $(`#portfolioIndex${value.id}`).popover('hide')
//     });

//  }); 


$(document).ready(function(){
    var token = localStorage.getItem('access_token')
    var checkboxItem =[]
    $('.submit_addform').on('click', function(e){
        e.preventDefault()
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
                    "Authorization": `Bearer ${token}`
                },
                success: function(data)
                {
                    console.log(data)
                    $(".addForm").trigger("reset")
                    // location.reload()

                },
                error:function(data){
                    console.log(data)
                }
            });
         
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
                "Authorization": `Bearer ${token}`
            },
            success: function(data)
            {
                $(".updateForm").trigger("reset")
            }
        });
    } 
    getAll()
    function getAll(){
        $.ajax({
            type: 'get',
            url: 'api/viewall',
            dataType: 'json',
            headers: {
                "Authorization": `Bearer ${token}`
            },
            success: function(data) {
                    var response = data.data
                for(var i = 0; i < response.length; i++ ){
                    console.log(response[i])
                    $('.member_info').append(`
                        <tr>
                            <td>
                                <span class="custom-checkbox">
                                    <input type="checkbox" id="checkbox${response[i].id}" name="options[]" value="${response[i].id}">
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
                                <a href="#deleteEmployeeModal2" class="delete" onclick='deleteSingle("${response[i].id}")'  data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                            </td>
                        </tr>
                    `)
                    
                    var checkbox = $(`table tbody input[type="checkbox"]`);
                    console.log(checkbox)
                    
                    $("#selectAll").click(function(e){
                        e.stopImmediatePropagation();
                        if(this.checked){
                            checkbox.each(function(i){
                                this.checked = true; 
                                if(!checkboxItem.includes(checkbox[i].value)){
                                    checkboxItem.push(checkbox[i].value)
                                }        
                            }); 
                        } else{
                            checkbox.each(function(i){
                                this.checked = false;  
                                if(checkboxItem.includes(checkbox[i].value)){
                                    var x = checkbox[i].value
                                    // for (var i=0; i<checkboxItem.length; i++){
                                    //     if(checkboxItem[i] === x){
                                    //         checkboxItem.splice(i,1)
                                    //     }
                                    // }
                                    checkboxItem.splice(checkboxItem.indexOf(x))
                                }                      
                            });
                        }
                        console.log(checkboxItem)
                    });
                    checkbox.click(function(e){
                        if(!this.checked){
                            $("#selectAll").prop("checked", false);
                        }
                    });
    
                    checkbox.click(function(e){
                        e.stopImmediatePropagation();
                        checkbox.each(function(i){
                            if(checkbox[i].checked && !checkboxItem.includes(checkbox[i].value)){
                                    checkboxItem.push(checkbox[i].value)
                            }
                            else if(!checkbox[i].checked && checkboxItem.includes(checkbox[i].value)){
                                var x = checkbox[i].value
                                // for (var i=0; i<checkboxItem.length; i++){
                                //     if(checkboxItem[i] === x){
                                //         checkboxItem.splice(i,1)
                                //     }
                                // }
                                checkboxItem.splice(checkboxItem.indexOf(x))
                            }
                        })
                        console.log(checkboxItem)
                    });
    
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
                            "Authorization": `Bearer ${token}`
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
    }
    

    $('#deleteData').on('click', function(e){
        e.preventDefault()
        checkboxItem.forEach(deleteData)
    })

    window.deleteSingle = function(i){
        $('#deleteSingleData').attr('onclick', `deleteData("${i}")`)
        
    }

    window.deleteData = function(i){
        $.ajax({
            type: 'post',
            url: 'api/delete',
            data: {
                'member_id': i
            },
            dataType: 'json',
            headers:{
                "Authorization": `Bearer ${token}`
            },
            success: function(response){
                $('#deleteEmployeeModal2').modal('hide')
                $('#deleteEmployeeModal').modal('hide')
                location.reload()

            },
            error:function(response){
                console.log(response)
            }
        })
    }

    $('.search_input').keyup(function(e){
        e.preventDefault()
        $.ajax({
            type: 'post',
            url: 'api/search',
            data: {
                'search':$('.search_input').val()
            },
            dataType: 'json',
            headers:{
                "Authorization": `Bearer ${token}`
            },
            success: function(response){
               console.log(response)
               $('.member_info').html('')

               for(var i = 0; i < response.data.length; i++ ){
                $('.member_info').append(`
                    <tr>
                        <td>
                            <span class="custom-checkbox">
                                <input type="checkbox" id="checkbox${response.data[i].searchable.id}" name="options[]" value="${response.data[i].searchable.id}">
                                <label for="checkbox${response.data[i].searchable.id}"></label>
                            </span>
                        </td>
                            <td href="#infomodal" onclick='viewone("${response.data[i].searchable.id}")' data-toggle="modal"><img src="storage/${response.data[i].searchable.profileImg}" alt="Avatar" class="avatar"></td>
                            <td href="#infomodal" onclick='viewone("${response.data[i].searchable.id}")' data-toggle="modal">${response.data[i].searchable.name}</td>
                            <td href="#infomodal" onclick='viewone("${response.data[i].searchable.id}")' data-toggle="modal">${response.data[i].searchable.email}</td>
                            <td href="#infomodal" onclick='viewone("${response.data[i].searchable.id}")' data-toggle="modal">${response.data[i].searchable.address}</td>
                            <td href="#infomodal" onclick='viewone("${response.data[i].searchable.id}")' data-toggle="modal">${response.data[i].searchable.phone}</td>
                        <td>
                            <a href="#editEmployeeModal" class="edit" onclick='updateMember("${response.data[i].searchable.id}")' data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                            <a href="#deleteEmployeeModal2" class="delete" onclick='deleteSingle("${response.data[i].searchable.id}")'  data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                        </td>
                    </tr>
                `)
               }
            },
            error:function(response){
                console.log(response)
            }
        })
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
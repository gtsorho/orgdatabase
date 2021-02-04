

$(document).ready(function(){
    var token = localStorage.getItem('access_token')
    var checkbox 
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
                    if(data.status == 'error'){
                        console.log(data)
                        var err = data.error
                        $('.finalize').html(`<i class="material-icons" style="font-size: 21px; margin-right: 5px;">&#xe001;</i>Error`)
                        $('.finalize').addClass('text-danger')
                        $('.finalize_msg').html('')
                        for(i=0; i<err.length; i++){
                            $('.finalize_msg').append(`
                            <p class="text-danger"><b>&nbsp;&nbsp;${i+1}.</b> ${err[i]}  </p>
                        `) 
                        }  
                        $('.finalize_foot').html(`
                            <div class="alert alert-danger" role="alert">
                            Invalid Fields Submitted
                            </div>
                        `)
                        $('.finalize_foot').addClass('text-danger')                                     
                    }else if(data.status == 'success'){
                        $('.finalize').html(`Finalize`)
                        $('.finalize').removeClass('text-danger')
                        $('.finalize').addClass('text-success')
                        $('.finalize_msg').removeClass('row')
                        $('.finalize_msg').html(`<p class=" text-center text-muted">Member Added Sucessfully, visit dashboard to view Member</p>`)
                        $('.finalize_foot').text('Completed')
                        $('.finalize_foot').removeClass('text-danger')  
                        $('.finalize_foot').addClass('text-success')
                        $(".addForm").trigger("reset")
                    }
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
                if(data.status == 'error'){
                    $('.edit_errorMsg').html(`<p class="text-danger" style='width: -webkit-fill-available; text-align: center;'><b>${data.error[0]} </b> </p>`)
                }
                console.log(data)
                $(".updateForm").trigger("reset")
            },
            error: function(data)
            {
                console.log(data)
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
                viewAll_action(data)
                // $('.allPerPage').text(response.to)
                // $('.allEntries').text(response.total)
            }, 
            error: function(data){
    
            }
        })
    }

    function viewAll_action(data){
        var response = data.data
        for(var i = 0; i < response.length; i++ ){
            console.log(data)
            var imgPath = `storage/${response[i].profileImg}`
            if(!response[i].profileImg){
                imgPath = `images/avatar.png`  
            }

            $('.member_info').append(`
                <tr>
                    <td>
                        <span class="custom-checkbox">
                            <input type="checkbox" id="checkbox${response[i].id}" name="options[]" value="${response[i].id}">
                            <label for="checkbox${response[i].id}"></label>
                        </span>
                    </td>
                        <td href="#infomodal" onclick='viewone("${response[i].id}")' data-toggle="modal"><img src="${imgPath}" alt="Avatar" class="avatar"></td>
                        <td href="#infomodal" onclick='viewone("${response[i].id}")' data-toggle="modal">${response[i].name}</td>
                        <td href="#infomodal" onclick='viewone("${response[i].id}")' data-toggle="modal" style="text-transform: lowercase;">${response[i].email}</td>
                        <td href="#infomodal" onclick='viewone("${response[i].id}")' data-toggle="modal">${response[i].address}</td>
                        <td href="#infomodal" onclick='viewone("${response[i].id}")' data-toggle="modal">${response[i].phone}</td>
                    <td>
                        <a href="#editEmployeeModal" class="edit" onclick='updateMember("${response[i].id}")' data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                        <a href="#deleteEmployeeModal2" class="delete" onclick='deleteSingle("${response[i].id}")'  data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                    </td>
                </tr>
            `)
            $('.allPerPage').text(data.to)
            $('.allEntries').text(data.total)

            checkbox = $(`table tbody input[type="checkbox"]`);
            console.log(checkbox)
            
            
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
                        checkboxItem.splice(checkboxItem.indexOf(x))
                    }
                })
                console.log(checkboxItem)
                if(checkboxItem.length){
                    $('#navDelBtn').attr('class','btn btn-danger')                
                }else{
                        $('#navDelBtn').attr('class','disabled btn btn-danger')  
                 }
            });
        }
        $('.pagination_li').html('');
        for(var i = 1; i <= data.last_page; i++ ){
            $('.pagination_li').append(`
                <li class="page-item" id="active${i}"><a href="#" onclick='pageView(${i})' class="page-link">${i}</a></li>
            `) 
        }
    }

    window.selectAll = function(){
        console.log(checkbox)
        if($('#selectAll')[0].checked){ 
            checkbox.each(function(i){ 
                console.log($(checkbox[i]))
                $(checkbox[i]).prop('checked', true)
                if(!checkboxItem.includes(checkbox[i].value)){
                    checkboxItem.push(checkbox[i].value)
                }        
            }); 
        } else{
            checkbox.each(function(i){
                checkbox.prop('checked', false)
                if(checkboxItem.includes(checkbox[i].value)){
                    var x = checkbox[i].value
                    checkboxItem.splice(checkboxItem.indexOf(x))
                }                      
            });
        }
        
        console.log(checkboxItem)
        if(checkboxItem.length){
            $('#navDelBtn').attr('class','btn btn-danger')                    
        }else{
            $('#navDelBtn').attr('class','disabled btn btn-danger')  
        }
    }

    var page
    window.previous_page = function (){
        console.log(page)
        $('.page-item').attr('class', 'page-item')

        if(page.prev_page_url){
            $.ajax({
                type: 'get',
                url: `api/viewall?page=${page.current_page - 1}`,
                dataType: 'json',
                headers:{
                    "Authorization": `Bearer ${token}`
                },
                success: function(data){
                   console.log(data)
                   page = data
                   $('.pagination_li').html('')
                   $('.member_info').html('')
                   viewAll_action(data)
                   $(`#active${data.current_page}`).attr('class','page-item active' )
       
                },
                error:function(data){
                    console.log(data)
                }
            })
        }
    }
 window.next_page = function (){
    $('.page-item').attr('class', 'page-item')
     console.log(page)
     if(page.next_page_url){
        $.ajax({
            type: 'get',
            url: `api/viewall?page=${page.current_page + 1}`,
            dataType: 'json',
            headers:{
                "Authorization": `Bearer ${token}`
            },
            success: function(data){
               console.log(data)
               page = data
               $('.pagination_li').html('')
               $('.member_info').html('')
               viewAll_action(data)
               $(`#active${data.current_page}`).attr('class','page-item active' )
   
            },
            error:function(data){
                console.log(data)
            }
        })
     }
 }

        // window.searchView = function (i){
        //     $('.page-item').attr('class', 'page-item')
        //     $.ajax({
        //         type: 'post',
        //         url: `api/search?page=${i}`,
        //         dataType: 'json',
        //         data: {
        //             'search':$('.search_input').val()
        //         },
        //         headers:{
        //             "Authorization": `Bearer ${token}`
        //         },
        //         success: function(data){
        //             page = data
        //             console.log(data)
        //             $('.pagination_li').html('')
        //             $('.member_info').html('')
    
        //             $(`#active${data.current_page}`).attr('class','page-item active' )

        //         },
        //         error:function(data){
        //             console.log(data)
        //         }
        //     })
        // }

     window.pageView = function (i){
        $('.page-item').attr('class', 'page-item')
         $.ajax({
             type: 'get',
             url: `api/viewall?page=${i}`,
             dataType: 'json',
             headers:{
                 "Authorization": `Bearer ${token}`
             },
             success: function(data){
                 page = data
                console.log(data)
                $('.pagination_li').html('')
                $('.member_info').html('')
                viewAll_action(data)
                $(`#active${data.current_page}`).attr('class','page-item active' )
 
             },
             error:function(data){
                 console.log(data)
             }
         })
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
                 if(data[0].profileImg){
                    $('.view_pic').attr("src", `storage/${data[0].profileImg}`)
                }else{
                    $('.view_pic').attr("src", `images/avatar.png`)
                }
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
                 
             },
             error: function (data){
                 console.log(data)
             }
         })
 
     }

    $('#deleteData').on('click', function(e){
        e.preventDefault()
        checkboxItem.forEach(deleteData)
    })
    // $('#navDelBtn').on('click', function(e){
    //     e.preventDefault()
        
    // })

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
                $('.relationalinfos').hide()
                $('.emergencyinfos').hide()
                $('.relationalinfos .relationalinfos_tr ~ tr').remove()
                $('.emergencyinfos .emergencyinfos_tr ~ tr').remove()

                $('#deleteEmployeeModal2').modal('hide')
                $('#deleteEmployeeModal').modal('hide')
                $('.member_info').html('')
                getAll()

            },
            error:function(response){
                console.log(response)
            }
        })
    }

    

    function delay(callback, ms) {
        var timer = 0;
        return function() {
          var context = this, args = arguments;
          clearTimeout(timer);
          timer = setTimeout(function () {
            callback.apply(context, args);
          }, ms || 0);
        };
      }

    $('.search_input').keydown(delay(function(e){
        console.log( $('.relationalinfos'))
        $('.relationalinfos').show()
        $('.emergencyinfos').show()
        if($('.search_input').val()){
            $('.relationalinfos .relationalinfos_tr ~ tr').remove()
            $('.emergencyinfos .emergencyinfos_tr ~ tr').remove()
           

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
                   
                   
    
                   for(var i = 0; i < response.length; i++ ){
                    var imgPath = `storage/${response[i].searchable.profileImg}`
                    if(!response[i].searchable.profileImg){
                        imgPath = `images/avatar.png`  
                    }
                    if(response[i].type == "personalinfos"){
                    $('.member_info').append(`
                        <tr>
                            <td>
                                <span class="custom-checkbox">
                                    <input type="checkbox" id="checkbox${response[i].searchable.id}" name="options[]" value="${response[i].searchable.id}">
                                    <label for="checkbox${response[i].searchable.id}"></label>
                                </span>
                            </td>
                                <td href="#infomodal" onclick='viewone("${response[i].searchable.id}")' data-toggle="modal"><img src="${imgPath}" alt="Avatar" class="avatar"></td>
                                <td href="#infomodal" onclick='viewone("${response[i].searchable.id}")' data-toggle="modal">${response[i].searchable.name}</td>
                                <td href="#infomodal" onclick='viewone("${response[i].searchable.id}")' data-toggle="modal" style="text-transform: lowercase;">${response[i].searchable.email}</td>
                                <td href="#infomodal" onclick='viewone("${response[i].searchable.id}")' data-toggle="modal">${response[i].searchable.address}</td>
                                <td href="#infomodal" onclick='viewone("${response[i].searchable.id}")' data-toggle="modal">${response[i].searchable.phone}</td>
                            <td>
                                <a href="#editEmployeeModal" class="edit" onclick='updateMember("${response[i].searchable.id}")' data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                                <a href="#deleteEmployeeModal2" class="delete" onclick='deleteSingle("${response[i].searchable.id}")'  data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                            </td>
                        </tr>
                    `)
                    }

                    if(response[i].type == "relationalinfos"){
                        $('.relationalinfos > .relationalinfos_tr').after(`
                        
                        <tr>
                            <tr>
                                <td>
                                    <span class="custom-checkbox">
                                        <input type="checkbox" id="checkbox${response[i].searchable.id}" name="options[]" value="${response[i].searchable.id}">
                                        <label for="checkbox${response[i].searchable.id}"></label>
                                    </span>
                                </td>
                                    <td href="#infomodal" onclick='viewone("${response[i].searchable.id}")' data-toggle="modal">Center: ${response[i].searchable.berean_center}</td>
                                    <td href="#infomodal" onclick='viewone("${response[i].searchable.id}")' data-toggle="modal">${response[i].searchable.department}</td>
                                    <td href="#infomodal" onclick='viewone("${response[i].searchable.id}")' data-toggle="modal">${response[i].searchable.period_of_stay}</td>    
                                    <td href="#infomodal" onclick='viewone("${response[i].searchable.id}")' data-toggle="modal" >${response[i].searchable.ministry}</td>
                                    <td href="#infomodal" onclick='viewone("${response[i].searchable.id}")' data-toggle="modal">Tithe: ${response[i].searchable.tithe}</td>
                                    <td href="#infomodal" onclick='viewone("${response[i].searchable.id}")' data-toggle="modal">Welfare:${response[i].searchable.welfare}</td>    
                            </tr>
                        </tr>
                    `)
                    }
                    if(response[i].type == "emergencyinfos"){
                        $('.emergencyinfos > .emergencyinfos_tr').after(`
                        
                            <tr >
                                <td>
                                    <span class="custom-checkbox">
                                        <input type="checkbox" id="checkbox${response[i].searchable.id}" name="options[]" value="${response[i].searchable.id}">
                                        <label for="checkbox${response[i].searchable.id}"></label>
                                    </span>
                                </td>
                                    <td colspan='3 href="#infomodal" onclick='viewone("${response[i].searchable.id}")' data-toggle="modal" >${response[i].searchable.emergency_name}</td>
                                    <td colspan='2' href="#infomodal" onclick='viewone("${response[i].searchable.id}")' data-toggle="modal">${response[i].searchable.emergency_phone}</td>
                                    <td ' href="#infomodal" onclick='viewone("${response[i].searchable.id}")' data-toggle="modal">${response[i].searchable.emergency_relation}</td>    
                            </tr>
                    `)
                    }                  


                   }

                   $('.pagination_li').html('');
                    // for(var i = 1; i <= response.last_page; i++ ){
                    //     $('.pagination_li').append(`
                    //         <li class="page-item" id="active${i}"><a href="#" onclick='searchView(${i})' class="page-link">${i}</a></li>
                    //     `) 
                    // }

                   checkbox = $(`table tbody input[type="checkbox"]`);
                    console.log(checkbox)
                    
                    
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
                                checkboxItem.splice(checkboxItem.indexOf(x))
                            }
                        })
                        console.log(checkboxItem)
                        if(checkboxItem.length){
                            $('#navDelBtn').attr('class','btn btn-danger')                
                        }else{
                                $('#navDelBtn').attr('class','disabled btn btn-danger')  
                        }
                    });

                    $('.allPerPage').text(response.length)
                    $('.allEntries').text(response.length)
                },
                error:function(response){
                    console.log(response)
                }
            })
        }else{  
            $('.relationalinfos').hide()
            $('.emergencyinfos').hide()
            $('.relationalinfos .relationalinfos_tr ~ tr').remove()
            $('.emergencyinfos .emergencyinfos_tr ~ tr').remove()
                $('.member_info').html('')            
                getAll()
        }

        
    },1000
    ))

    $('#export').on('click', function(e){
        e.preventDefault()
        $.ajax({
            type: 'get',
            url: 'api/export',
            dataType: 'json',
            headers:{
                "Authorization": `Bearer ${token}`
            },
            success: function(response){
                location.href = 'api/exportuser'

            },
            error:function(response){
                console.log(response)
            }
        })
    })



    
    if(!checkboxItem.length){
        $('#navDelBtn').attr('class','disabled btn btn-danger')
        
    }else{
        $('#navDelBtn').attr('class',' btn btn-danger')
    }


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
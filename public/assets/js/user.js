function selectUsers() {
    $.ajax({
        type:'GET',
        url:'/api/user?token='+token,
        dataType:'json',
        success:function(json){
            if(json.data.length>0){
                $('#navbarDropdownMenuLink').text('Seja bem-vindo '+user);
                for(var i in json.data){
                    newline = document.querySelector('.model').cloneNode(true);
                    newline.classList.remove("model");
                    newline.querySelector('#id').innerHTML = json.data[i].id;
                    newline.querySelector('#nome').innerHTML = json.data[i].name;
                    newline.querySelector('#email').innerHTML = json.data[i].email;
                    newline.querySelector('#cargo').innerHTML = json.data[i].office_name.toUpperCase();
                    newline.querySelector('#depto').innerHTML = json.data[i].department_name.toUpperCase();
                    newline.querySelector('#update_button').setAttribute('href','/api/web/userUpdate?id='+json.data[i].id);
                    newline.querySelector('#delete_button').setAttribute('href','/api/web/userDelete?id='+json.data[i].id);
                    $('.table').append(newline);
                }
            }
        },
        error:function(e){
            if (e.status == 401) {
                window.location.href = '/api/web/login';
            }
        }
    });
}

function createUser() {
    $('form').bind('submit',function(e){
        e.preventDefault();

        let cred = $(this).serialize();
        $.ajax({
            type:'POST',
            url:'/api/user',
            dataType:'json',
            data: cred,
            success:function(json){
                if(json.error) {
                    $('.alert').html(json.error);
                    $('.alert').show();
                } else {
                    window.location.href = '/api/web/user';
                }
            },
            error:function(){
                alert("Ocorreu um erro na consulta, tente novamente");
            }
        });
    });
}

function loadSelect() {
    $('#navbarDropdownMenuLink').text('Seja bem-vindo '+user);
    $.ajax({
        type:'GET',
        url:'/api/department?token='+token,
        dataType:'json',
        success:function(json){
            if(json.data.length>0){
                for(var i in json.data){
                    $('#select2').append('<option value=' + json.data[i].id + '>' + json.data[i].name.toUpperCase() + '</option>');
                }
            }
        },
        error:function(e){
            if (e.status == 401) {
                window.location.href = '/api/web/login';
            }
        }
    });
}

function loadUser() {
    loadSelect();
    let id = urlParams.get('id');
    $('#navbarDropdownMenuLink').text('Seja bem-vindo '+user);
    $.ajax({
        type:'GET',
        url:'/api/user/update/' + id + '?token=' + token,
        dataType:'json',
        success:function(json){
            $('#name').val(json.data.name);
            $('#email').val(json.data.email);
            $('#select1').val(json.data.id_office);
            $('#select2').val(json.data.id_department);
        },
        error:function(e){
            if (e.status == 401) {
                window.location.href = '/api/web/login';
            }
        }
    });
}

function deleteUser() {
    let id = urlParams.get('id');
    $.ajax({
        type:'POST',
        url:'/api/user/delete/'+id,
        dataType:'json',
        data:'token='+token,
        success:function(json){
            if(json.error) {
                alert(json.error);
            }
            window.location.href = '/api/web/user';
        },
        error:function(e){
            if (e.status == 401) {
                window.location.href = '/api/web/login';
            }
        }
    });
}

function updateUser() {
    let id = urlParams.get('id');
    $('form').bind('submit',function(e){
        e.preventDefault();
        let cred = $(this).serialize();
        $.ajax({
            type:'POST',
            url:'/api/user/update',
            dataType:'json',
            data: cred+'&token='+token+'&id='+id,
            success:function(json){
                if(json.error) {
                    $('.alert').html(json.error);
                    $('.alert').show();
                } else {
                    window.location.href = '/api/web/user';
                }
            },
            error:function(){
                alert("Ocorreu um erro na consulta, tente novamente");
            }
        });
    });
}

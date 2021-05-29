const urlParams = new URLSearchParams(window.location.search);
var token = localStorage.getItem('token');
var user = localStorage.getItem('user');

if (urlParams.get('token') || !token) {
    localStorage.setItem('token', urlParams.get('token'));
    localStorage.setItem('user', urlParams.get('user'));
    token = localStorage.getItem('token');
    user = localStorage.getItem('user');
}

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
                    //newline.querySelector('#delete_button');
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

function logout() {
    $.ajax({
        type:'POST',
        url:'/api/auth/logout',
        dataType:'json',
        data: 'token='+token,
        success:function(){
            localStorage.clear('token');
            localStorage.clear('user');
            document.location.reload();
        },
        error:function(e){
            if (e.status == 401) {
                window.location.href = '/api/web/login';
            }
        }
    });
}

function loadSelect() {
    $('#navbarDropdownMenuLink').text('Seja bem-vindo '+user);
    $.ajax({
        type:'GET',
        url:'/api/department?token='+token,
        dataType:'json',
        data:token,
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
            $('#name').val(json.data.name.toUpperCase());
            $('#email').val(json.data.email.toUpperCase());
            $('#pass').val(json.data.password);
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
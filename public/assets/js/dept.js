
const urlParams = new URLSearchParams(window.location.search);
var token = localStorage.getItem('token');
var user = localStorage.getItem('user');

if (urlParams.get('token') || !token) {
    localStorage.setItem('token', urlParams.get('token'));
    localStorage.setItem('user', urlParams.get('user'));
    token = localStorage.getItem('token');
    user = localStorage.getItem('user');
}

$(document).ready(
    function(){
        $.ajax({
            type:'GET',
            url:'/api/department?token='+token,
            dataType:'json',
            success:function(json){
                if(json.data.length>0){
                    $('#navbarDropdownMenuLink').text('Seja bem-vindo '+user);
                    for(var i in json.data){
                        newline = document.querySelector('.model').cloneNode(true);
                        newline.classList.remove("model");
                        newline.querySelector('#id').innerHTML = json.data[i].id;
                        newline.querySelector('#nome').innerHTML = json.data[i].name.toUpperCase();
                        $('.table').append(newline);
                        disabled = document.querySelectorAll('tr');
                        buttons = disabled[2].querySelectorAll('button');
                        buttons[0].setAttribute('disabled','disabled');
                        buttons[1].setAttribute('disabled','disabled');
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
);

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
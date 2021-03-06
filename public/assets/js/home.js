const urlParams = new URLSearchParams(window.location.search);
var token = localStorage.getItem('token');
var user = localStorage.getItem('user');

if (urlParams.get('token') || !token) {
    localStorage.setItem('token', urlParams.get('token'));
    token = localStorage.getItem('token');
}

if (urlParams.get('user') || !user) {
    localStorage.setItem('user', urlParams.get('user'));
    user = localStorage.getItem('user');
}

$('#navbarDropdownMenuLink').text('Seja bem-vindo '+user);

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
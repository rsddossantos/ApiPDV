$(document).ready(
    function(){
        const urlParams = new URLSearchParams(window.location.search);
        localStorage.setItem('token', urlParams.get('token'));
        var token = localStorage.getItem('token');

        $.ajax({
            type:'GET',
            url:'/api/user?token='+token,
            dataType:'json',
            success:function(json){
                if(json.data.length>0){
                    for(var i in json.data){
                        newline = document.querySelector('.model').cloneNode(true);
                        newline.classList.remove("model");
                        newline.querySelector('#id').innerHTML = json.data[i].id;
                        newline.querySelector('#nome').innerHTML = json.data[i].name;
                        newline.querySelector('#email').innerHTML = json.data[i].email;
                        newline.querySelector('#cargo').innerHTML = json.data[i].office_name.toUpperCase();
                        newline.querySelector('#depto').innerHTML = json.data[i].department_name.toUpperCase();
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
);
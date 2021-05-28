$(document).ready(
    function(){
        const urlParams = new URLSearchParams(window.location.search);
        localStorage.setItem('token', urlParams.get('token'));
        let token = localStorage.getItem('token');

        $.ajax({
            type:'GET',
            url:'/api/user',
            dataType:'json',
            success:function(json){
                if(json.data.length>0){
                    for(var i in json.data){
                        newline = document.querySelector('.model').cloneNode(true);
                        newline.classList.remove("model");
                        newline.querySelector('#id').innerHTML = json.data[i].id;
                        newline.querySelector('#nome').innerHTML = json.data[i].name;
                        newline.querySelector('#email').innerHTML = json.data[i].email;
                        $('.table').append(newline);
                    }
                }
            },
            error:function(){
                alert("Ocorreu um erro na consulta, tente novamente");
            }
        });






    }
);
function selectDepartments() {
    $.ajax({
        type: 'GET',
        url: '/api/department?token=' + token,
        dataType: 'json',
        success: function (json) {
            if (json.data.length > 0) {
                for (var i in json.data) {
                    newline = document.querySelector('.model').cloneNode(true);
                    newline.classList.remove("model");
                    newline.querySelector('#id').innerHTML = json.data[i].id;
                    newline.querySelector('#nome').innerHTML = json.data[i].name.toUpperCase();
                    newline.querySelector('#update_button').setAttribute('href','/api/web/departmentUpdate?id='+json.data[i].id);
                    newline.querySelector('#delete_button').setAttribute('href','/api/web/departmentDelete?id='+json.data[i].id);
                    $('.table').append(newline);
                    disabled = document.querySelectorAll('tr');
                    buttons = disabled[2].querySelectorAll('button');
                    buttons[0].setAttribute('disabled', 'disabled');
                    buttons[1].setAttribute('disabled', 'disabled');
                }
            }
        },
        error: function (e) {
            if (e.status == 401) {
                window.location.href = '/api/web/login';
            } else {
                alert("Ocorreu um erro na consulta, tente novamente");
            }
        }
    });
}

function createDepartment() {
    $('form').bind('submit',function(e){
        e.preventDefault();
        let cred = $(this).serialize();
        $.ajax({
            type:'POST',
            url:'/api/department',
            dataType:'json',
            data: cred+'&token='+token,
            success:function(json){
                if(json.error) {
                    $('.alert').html(json.error);
                    $('.alert').show();
                } else {
                    window.location.href = '/api/web/department';
                }
            },
            error:function(e){
                if (e.status == 401) {
                    window.location.href = '/api/web/login';
                } else {
                    alert("Ocorreu um erro na consulta, tente novamente");
                    console.log(e.status);
                }
            }
        });
    });
}

function loadDepartment() {
    let id = urlParams.get('id');
    $.ajax({
        type:'GET',
        url:'/api/department/update/' + id + '?token=' + token,
        dataType:'json',
        success:function(json){
            $('#name').val(json.data.name.toUpperCase());
        },
        error:function(e){
            if (e.status == 401) {
                window.location.href = '/api/web/login';
            } else {
                alert("Ocorreu um erro na consulta, tente novamente");
            }
        }
    });
}

function updateDepartment() {
    let id = urlParams.get('id');
    $('form').bind('submit',function(e){
        e.preventDefault();
        let cred = $(this).serialize();
        $.ajax({
            type:'POST',
            url:'/api/department/update',
            dataType:'json',
            data: cred+'&token='+token+'&id='+id,
            success:function(json){
                if(json.error) {
                    $('.alert').html(json.error);
                    $('.alert').show();
                } else {
                    window.location.href = '/api/web/department';
                }
            },
            error:function(e){
                if (e.status == 401) {
                    window.location.href = '/api/web/login';
                } else {
                    alert("Ocorreu um erro na consulta, tente novamente");
                }
            }
        });
    });
}

function deleteDepartment() {
    let id = urlParams.get('id');
    $.ajax({
        type:'POST',
        url:'/api/department/delete/'+id,
        dataType:'json',
        data:'token='+token,
        success:function(json){
            if(json.error) {
                alert(json.error);
            }
            window.location.href = '/api/web/department';
        },
        error:function(e){
            if (e.status == 401) {
                window.location.href = '/api/web/login';
            } else {
                alert("Ocorreu um erro na consulta, tente novamente");
            }
        }
    });
}
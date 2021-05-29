function selectCosts() {
    $.ajax({
        type:'GET',
        url:'/api/cost?token='+token,
        dataType:'json',
        success:function(json){
            if(json.data.length>0){
                for(var i in json.data){
                    newline = document.querySelector('.model').cloneNode(true);
                    newline.classList.remove("model");
                    newline.querySelector('#id').innerHTML = json.data[i].id;
                    newline.querySelector('#nome').innerHTML = json.data[i].name;
                    if(!json.data[i].department_name) {
                        json.data[i].department_name = '(item excluido)'
                    }
                    newline.querySelector('#depto').innerHTML = json.data[i].department_name.toUpperCase();
                    newline.querySelector('#update_button').setAttribute('href','/api/web/costcenterUpdate?id='+json.data[i].id);
                    newline.querySelector('#delete_button').setAttribute('href','/api/web/costcenterDelete?id='+json.data[i].id);
                    $('.table').append(newline);
                }
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
}

function createCost() {
    $('form').bind('submit',function(e){
        e.preventDefault();
        let cred = $(this).serialize();
        $.ajax({
            type:'POST',
            url:'/api/cost',
            dataType:'json',
            data: cred+'&token='+token,
            success:function(json){
                if(json.error) {
                    $('.alert').html(json.error);
                    $('.alert').show();
                } else {
                    window.location.href = '/api/web/cc';
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

function loadSelect() {
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
            } else {
                alert("Ocorreu um erro na consulta, tente novamente");
            }
        }
    });
}

function loadCost() {
    loadSelect();
    let id = urlParams.get('id');
    $.ajax({
        type:'GET',
        url:'/api/cost/update/' + id + '?token=' + token,
        dataType:'json',
        success:function(json){
            $('#name').val(json.data.name);
            $('#select2').val(json.data.id_department);
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

function updateCost() {
    let id = urlParams.get('id');
    $('form').bind('submit',function(e){
        e.preventDefault();
        let cred = $(this).serialize();
        $.ajax({
            type:'POST',
            url:'/api/cost/update',
            dataType:'json',
            data: cred+'&token='+token+'&id='+id,
            success:function(json){
                if(json.error) {
                    $('.alert').html(json.error);
                    $('.alert').show();
                } else {
                    window.location.href = '/api/web/cc';
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

function deleteCost() {
    let id = urlParams.get('id');
    $.ajax({
        type:'POST',
        url:'/api/cost/delete/'+id,
        dataType:'json',
        data:'token='+token,
        success:function(json){
            if(json.error) {
                alert(json.error);
            }
            window.location.href = '/api/web/cc';
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
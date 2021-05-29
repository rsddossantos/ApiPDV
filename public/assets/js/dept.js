function selectDepartments() {
    $.ajax({
        type: 'GET',
        url: '/api/department?token=' + token,
        dataType: 'json',
        success: function (json) {
            if (json.data.length > 0) {
                $('#navbarDropdownMenuLink').text('Seja bem-vindo ' + user);
                for (var i in json.data) {
                    newline = document.querySelector('.model').cloneNode(true);
                    newline.classList.remove("model");
                    newline.querySelector('#id').innerHTML = json.data[i].id;
                    newline.querySelector('#nome').innerHTML = json.data[i].name.toUpperCase();
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
            }
        }
    });
}
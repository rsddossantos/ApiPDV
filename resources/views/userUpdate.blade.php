@extends('home')

@section('title', 'ApIPDV - Novo Funcionário')

@section('content')
    <h3>Editar Funcionário</h3><br><br>
    <div class="alert alert-danger" style="display:none"></div>
    <form method="POST">
        @csrf
        <label for="name" class="form-label">Nome</label>
        <input class="form-control" type="text" name="name" id="name" spellcheck="false" required/>

        <label for="email" class="form-label">E-mail</label>
        <input class="form-control" type="email" name="email" id="email" spellcheck="false" required/>

        <label for="pass" class="form-label">Senha</label>
        <input class="form-control" type="password" name="password" id="pass" spellcheck="false" required/>

        <label for="select1" class="form-label">Cargo</label>
        <select class="form-control form-select" id="select1" name="id_office">
            <option value="1">NENHUM</option>
            <option value="2">GERENTE</option>
            <option value="3">SUPERVISOR</option>
            <option value="4">ASSISTENTE</option>
            <option value="5">TREINEE</option>
        </select>

        <label for="select2" class="form-label">Departamento</label>
        <select class="form-control form-select" id="select2" name="id_department">
        </select><br>

        <button class="btn btn-primary btn-lg btn-block" type="submit">Salvar</button><br>
    </form>

    <script type="text/javascript" src="{{url('assets/js/user.js')}}"></script>
    <script type="text/javascript">
        loadUser();
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
                        alert(json.data);
                        window.location.href = '/api/web/user';
                    }
                },
                error:function(){
                    alert("Ocorreu um erro na consulta, tente novamente");
                }
            });
        });
    </script>
@endsection
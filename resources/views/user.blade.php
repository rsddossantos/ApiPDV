@extends('home')

@section('title', 'ApIPDV - Funcionários')

@section('content')
    <h3>Funcionários</h3>
    <div class="newtask"><a href="/api/web/userCreate">+ Adicionar novo funcionário</a></div>
    <div class="importcsv"><a href="/api/web/importCSV"><button class="btn btn-success">Importar CSV</button></a></div>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Cargo</th>
            <th>Departamento</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <tr class="model">
            <td id="id"></td>
            <td id="nome"></td>
            <td id="email"></td>
            <td id="cargo"></td>
            <td id="depto"></td>
            <td style="text-align: right;">
                <a id="update_button"><button class="btn btn-primary">editar</button></a>
                <a id="delete_button" onClick="return confirm('Deseja excluir esse registro?')">
                    <button class="btn btn-primary">excluir</button>
                </a>
            </td>
        </tr>
        </tbody>
    </table>
    <script type="text/javascript" src="{{url('assets/js/user.js')}}"></script>
    <script type="text/javascript">selectUsers()</script>
@endsection
@extends('home')

@section('title', 'ApIPDV - Departamentos')

@section('content')
    <h3>Departamentos</h3>
    <div class="newtask"><a href="/api/web/departmentCreate">+ Adicionar novo departamento</a></div>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <tr class="model">
            <td id="id"></td>
            <td id="nome"></td>
            <td style="text-align: right;">
                <a id="update_button"><button class="btn btn-primary">editar</button></a>
                <a id="delete_button" onClick="return confirm('Deseja excluir esse registro?')">
                    <button class="btn btn-primary">excluir</button>
                </a>
            </td>
        </tr>
        </tbody>
    </table>
    <script type="text/javascript" src="{{url('assets/js/dept.js')}}"></script>
    <script type="text/javascript">selectDepartments()</script>
@endsection
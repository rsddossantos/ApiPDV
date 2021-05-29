@extends('home')

@section('title', 'ApIPDV - Centros de Custo')

@section('content')
    <h3>Centros de Custo</h3>
    <div class="newtask"><a href="/api/web/costcenterCreate">+ Adicionar novo centro de custo</a></div>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th>Código</th>
            <th>Departamento</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <tr class="model">
            <td id="id"></td>
            <td id="nome"></td>
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
    <script type="text/javascript" src="{{url('assets/js/costcenter.js')}}"></script>
    <script type="text/javascript">selectCosts()</script>
@endsection
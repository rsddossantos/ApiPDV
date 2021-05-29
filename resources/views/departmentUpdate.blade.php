@extends('home')

@section('title', 'ApIPDV - Departamentos')

@section('content')
    <h3>Editar Departamento</h3><br><br>
    <div class="alert alert-danger" style="display:none"></div>
    <form method="POST">
        @csrf
        <label for="name" class="form-label">Nome</label>
        <input class="form-control" type="text" name="name" id="name" spellcheck="false" required/><br>

        <button class="btn btn-primary btn-lg btn-block" type="submit">Salvar</button><br>
    </form>

    <script type="text/javascript" src="{{url('assets/js/dept.js')}}"></script>
    <script type="text/javascript">loadDepartment();updateDepartment();</script>
@endsection
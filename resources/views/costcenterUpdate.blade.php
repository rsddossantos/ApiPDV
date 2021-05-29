@extends('home')

@section('title', 'ApIPDV - Centros de Custo')

@section('content')
    <h3>Editar Centro de Custo</h3><br><br>
    <div class="alert alert-danger" style="display:none"></div>
    <form method="POST">
        @csrf
        <label for="name" class="form-label">Código</label>
        <input class="form-control" type="number" name="name" id="name" spellcheck="false" required/>

        <label for="select2" class="form-label">Departamento</label>
        <select class="form-control form-select" id="select2" name="id_department">
        </select><br>

        <button class="btn btn-primary btn-lg btn-block" type="submit">Salvar</button><br>
    </form>

    <script type="text/javascript" src="{{url('assets/js/costcenter.js')}}"></script>
    <script type="text/javascript">loadCost();updateCost();</script>
@endsection
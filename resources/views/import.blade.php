@extends('home')

@section('title', 'ApIPDV - Funcionário')

@section('content')
    <h3>Importação de CSV</h3><br><br>
    <div class="alert alert-danger" style="display:none"></div>
    <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label>Selecione o arquivo CSV:</label>
            <div class="custom-file">
                <label class="custom-file-label" for="customFile">Escolher arquivo</label>
                <input type="file" class="custom-file-input" id="customFile" name="csv" required>
            </div>
        </div>

        <button class="btn btn-primary btn-lg btn-block" type="submit">Enviar</button><br>
    </form>
    <script type="text/javascript" src="{{url('assets/js/user.js')}}"></script>
    <script type="text/javascript">importCSV();</script>
@endsection
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>ApIPDV - HOME</title>
    <link rel="stylesheet" href="{{url('assets/bootstrap/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{url('assets/css/home.css')}}" />
    <script src="{{url('assets/js/jquery.js')}}"></script>
    <script src="{{url('assets/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
</head>
<body>
<div id="token"></div>
<div class="container">
    <header>
        <div class="header">
            <a href=""><h1>Ap<b>iPDV</b><small style="text-align:right">1.0</small></h1></a>
        </div><hr>
    </header>
    <section>
        <h3>Controle de Funcionários</h3>
        <div class="newtask"><a href="">+ Adicionar novo funcionário</a></div>
        <?php
        $list = [
            ['nome' => 'Rodrigo', 'email' => 'email1'],
            ['nome' => 'João', 'email' => 'email2']
        ];
        ?>
        @if(count($list) > 0)
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                @foreach($list as $item)
                    <tr>
                        <td>{{$item['nome']}}</td>
                        <td>{{$item['email']}}</td>
                        <td style="text-align:right;width:10%">
                            <a href="">
                                <button class="btn btn-success">editar</button>
                            </a>
                        </td>
                        <td style="width:10%">
                            <a href="" onclick="return confirm('Deseja excluir esse funcionário?')">
                                <button class="btn btn-danger">excluir</button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </table>
        @else
            <div>Não há funcionários cadastrados</div>
        @endif
    </section>
    <footer></footer>
</div>


<script src="{{url('assets/js/script.js')}}"></script>
</script>
</body>
</html>

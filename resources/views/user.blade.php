<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>ApIPDV - HOME</title>
    <link rel="stylesheet" href="{{url('assets/bootstrap/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{url('assets/css/user.css')}}" />
    <script src="{{url('assets/js/jquery.js')}}"></script>
    <script src="{{url('assets/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
</head>
<body>
<div id="token"></div>
<div class="container">
    <header>
        <div class="header">
            <h1>Ap<b>iPDV</b><small style="text-align:right">1.0</small></h1>
        </div><hr>
    </header>
    <section>
        <h3>Funcionários</h3>
        <div class="newtask"><a href="">+ Adicionar novo funcionário</a></div>


        <table class="table table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <tr class="model">
                <td id="id">ID</td>
                <td id="nome">Nome</td>
                <td id="email">Email</td>
                <td style="text-align: right;">
                    <a href=""><button class="btn btn-primary">editar</button></a>
                    <a href="" onClick="return confirm('Deseja excluir esse funcionário?')">
                        <button class="btn btn-primary">excluir</button>
                    </a>
                </td>
            </tr>
            </tbody>
        </table>

    </section>
    <footer></footer>
</div>


<script src="{{url('assets/js/user.js')}}"></script>
</script>
</body>
</html>

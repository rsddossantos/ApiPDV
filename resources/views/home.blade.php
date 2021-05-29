<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{url('assets/bootstrap/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{url('assets/css/user.css')}}" />
    <script src="{{url('assets/js/jquery.js')}}"></script>
    <script src="{{url('assets/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/js/home.js')}}"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #2e4a70;">
    <a class="navbar-brand" href="#"><h4>Ap<b>iPDV</b><small style="text-align:right">1.0</small></h4></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="/api/web/user">Funcionários</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/api/web/department">Departamentos</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle"
                   href="#" id="navbarDropdownMenuLink"
                   data-toggle="dropdown"
                   aria-haspopup="true"
                   aria-expanded="false"></a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <button class="dropdown-item" onclick="logout()">Logout</button>
                </div>
            </li>
        </ul>
    </div>
</nav>
<div class="container">
    <div id="token"></div>
    <div id="user"></div>
    <section>
        @yield('content')
    </section>
</div>
<script type="text/javascript">$('#navbarDropdownMenuLink').text('Seja bem-vindo ' + user);</script>
</body>
</html>

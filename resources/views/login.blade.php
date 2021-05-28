<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>ApIPDV - Login</title>
	<link rel="stylesheet" href="{{url('assets/bootstrap/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{url('assets/css/login.css')}}" />
    <script src="{{url('assets/js/jquery.js')}}"></script>
    <script src="{{url('assets/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
</head>
<body>
    <div class="loginArea">
        <div class="title">
            <img id="imgLogo" src="{{url('assets/images/logo.png')}}" />
            <div><h2><b>Api</b>PDV</h2></div>
        </div>
        <div class="alert alert-danger" style="display:none"></div>
        <form method="POST">
            @csrf
            <input class="form-control" type="email" name="email" id="email" placeholder="Digite seu e-mail" spellcheck="false" />
            <div class="input-group">
                <input class="form-control pass" type="password" name="password" id="password" placeholder="Digite sua senha" spellcheck="false">
                <span class="input-group-btn">
                <button class="btn btn-default eye" id="eye" disabled="disabled">
                    <img id="eyeImg" width="25" height="25" src="{{url('assets/images/close.png')}}" />
                </button>
            </span>
            </div>
            <button class="btn btn-primary btn-lg btn-block" type="submit">Entrar</button>

            Ainda não tem cadastro? <a href="{{url('/api/web/register')}}">Cadastre-se</a>
        </form>
    </div>
    <script>
        $('#eyeImg').mouseover(function(){
            $(this).attr("src", "{{url('assets/images/open.png')}}");
            $('.pass').attr('type','text');
        });

        $('#eyeImg').mouseout(function(){
            $(this).attr("src", "{{url('assets/images/close.png')}}");
            $('.pass').attr('type','password');
        });
        $('form').bind('submit',function(e){
            e.preventDefault();
            let cred = $(this).serialize();
            $.ajax({
                type:'POST',
                url:'/api/auth/login',
                dataType:'json',
                data: cred,
                success:function(json){
                    if(json.error) {
                        $('.alert').html(json.error);
                        $('.alert').show();
                    } else {
                        window.location.href = '/api/web/user?token='+json.token;
                    }
                },
                error:function(){
                    alert("Ocorreu um erro na consulta, tente novamente");
                }
            });
        });
    </script>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>
    <link href="{{ asset("css/bootstrap.min.css") }}" rel="stylesheet" />
    <link href="{{ asset("css/jquery-ui.min.css") }}" rel="stylesheet" />
    <link href="{{ asset("css/style.css") }}" rel="stylesheet" />
    <link href="{{ asset("css/font-awesome.min.css") }}" rel="stylesheet" />
</head>
<body>
<div class="navbar-wrapper">
    <div class="container-fluid">
        <nav class="navbar navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="{{ url("agendamentos") }}" class="">Agendamentos</a></li>
                        <li><a href="{{ url("servicos") }}">Serviços</a></li>
                        <li><a href="{{ url("clientes") }}">Clientes</a></li>
                        <li><a href="{{ url("users") }}">Usuários</a></li>
                    </ul>
                    <ul class="nav navbar-nav pull-right">
                        <li><a href="#">Logado como: {{ Session::get('user')->nome }}</a></li>
                        <li><a href="{{ url("logout") }}">Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>

@yield('content')

<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script>
    $(document).ready(function(){
        $("#datepicker").datepicker({
            dateFormat: "dd/mm/yy"
        });
    })
</script>
</body>
</html>
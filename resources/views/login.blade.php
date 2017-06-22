<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - {{ config('app.name') }}</title>
    <link href="{{ asset("css/bootstrap.min.css") }}" rel="stylesheet"/>
    <link href="{{ asset('css/login.css') }}" rel="stylesheet" type="text/css">
</head>
<body>

<div class="login-page">
    <div class="form">
        <h1>Login</h1>
        {!! Form::open(['url' => 'login']) !!}
        @if($errors->has("email"))
            <div class="error">{{$errors->first('email')}}</div>
        @endif
        {!! Form::text('email', '', ['placeholder' => 'E-mail']) !!}
        @if($errors->has("senha"))
            <div class="error">{{$errors->first('senha')}}</div>
        @endif
        {!! Form::password('senha', ['placeholder' => 'Senha']) !!}
        {!! Form::submit('login') !!}
        {!! Form::close() !!}
    </div>
</div>

<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>
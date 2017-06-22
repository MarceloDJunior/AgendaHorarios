@extends("app")


@section("content")
    <div class="container">
        <h2>Novo usuário</h2>

        {!! Form::open(['url' => 'users/store']) !!}

        <div class="form-group">
            {!! Form::label('nome', 'Nome') !!}
            {!! Form::text('nome', null, ['class' => 'form-control']) !!}
            @if($errors->has("nome"))
                <div class="error">{{$errors->first('nome')}}</div>
            @endif
        </div>

        <div class="form-group">
            {!! Form::label('email', 'E-mail') !!}
            {!! Form::email('email', null, ['class' => 'form-control']) !!}
            @if($errors->has("email"))
                <div class="error">{{$errors->first('email')}}</div>
            @endif
        </div>

        <div class="form-group">
            {!! Form::label('senha', 'Senha') !!}
            {!! Form::password('senha', ['class' => 'form-control']) !!}
            @if($errors->has("senha"))
                <div class="error">{{$errors->first('senha')}}</div>
            @endif
        </div>

        <div class="form-group">
            {!! Form::submit('Salvar usuário', ['class' => 'btn btn-success']) !!}
        </div>

        {!! Form::close() !!}

    </div>
@endsection
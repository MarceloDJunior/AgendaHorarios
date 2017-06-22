@extends("app")


@section("content")
    <div class="container">
        <h2>Editar usuário</h2>

        @if($errors->any())
            <ul class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

        @endif

        {!! Form::open(['url' => "users/$user->id/update"]) !!}

        <div class="form-group">
            {!! Form::label('nome', 'Nome') !!}
            {!! Form::text('nome', $user->nome, ['class' => 'form-control']) !!}
            @if($errors->has("nome"))
                <div class="error">{{$errors->first('nome')}}</div>
            @endif
        </div>

        <div class="form-group">
            {!! Form::label('email', 'E-mail') !!}
            {!! Form::email('email', $user->email, ['class' => 'form-control']) !!}
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
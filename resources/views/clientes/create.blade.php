@extends("app")


@section("content")
    <div class="container">
        <h2>Novo cliente</h2>

        {!! Form::open(['url' => 'clientes/store']) !!}

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
            {!! Form::label('telefone', 'Telefone') !!}
            {!! Form::text('telefone', null, ['class' => 'form-control']) !!}
            @if($errors->has("telefone"))
                <div class="error">{{$errors->first('telefone')}}</div>
            @endif
        </div>

        <div class="form-group">
            {!! Form::submit('Salvar cliente', ['class' => 'btn btn-success']) !!}
        </div>

        {!! Form::close() !!}

    </div>
@endsection
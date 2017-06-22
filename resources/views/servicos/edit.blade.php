@extends("app")


@section("content")
    <div class="container">
        <h2>Editar servico</h2>

        {!! Form::open(['url' => "servicos/$servico->id/update"]) !!}

        <div class="form-group">
            {!! Form::label('nome', 'Nome') !!}
            {!! Form::text('nome', $servico->nome, ['class' => 'form-control']) !!}
            @if($errors->has("nome"))
                <div class="error">{{$errors->first('nome')}}</div>
            @endif
        </div>


        <div class="form-group">
            {!! Form::submit('Salvar cliente', ['class' => 'btn btn-success']) !!}
        </div>

        {!! Form::close() !!}

    </div>
@endsection
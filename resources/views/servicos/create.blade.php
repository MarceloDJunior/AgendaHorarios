@extends("app")


@section("content")
    <div class="container">
        <h2>Novo serviço</h2>

        {!! Form::open(['url' => 'servicos/store']) !!}

        <div class="form-group">
            {!! Form::label('nome', 'Nome') !!}
            {!! Form::text('nome', null, ['class' => 'form-control']) !!}
            @if($errors->has("nome"))
                <div class="error">{{$errors->first('nome')}}</div>
            @endif
        </div>


        <div class="form-group">
            {!! Form::submit('Salvar serviço', ['class' => 'btn btn-success']) !!}
        </div>

        {!! Form::close() !!}

    </div>
@endsection
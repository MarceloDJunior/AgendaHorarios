@extends("app")


@section("content")
    <div class="container">
        <h2>Novo agendamento</h2>

        @if($errors->any())
            <ul class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

        @endif

        {!! Form::open(['url' => 'agendamentos/store']) !!}

        <div class="form-group">
            {!! Form::label('cliente_id', 'Cliente:') !!}
            {!! Form::select('cliente_id',
                $clientes, 'Selecione um clientes',
                ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('servico_id', 'Serviço:') !!}
            {!! Form::select('servico_id',
                $servicos, 'Selecione um serviço',
                ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('dia', 'Selecione o dia:') !!}
            {!! Form::text('dia', '', ['class' => 'form-control', 'id' => 'datepicker']) !!}
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    {!! Form::label('hora_inicio', 'Horário do início:') !!}
                    {!! Form::time('hora_inicio', '', ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    {!! Form::label('hora_fim', 'Horário do fim:') !!}
                    {!! Form::time('hora_fim', '', ['class' => 'form-control']) !!}
                </div>
            </div>
        </div>


        <div class="form-group">
            {!! Form::submit('Salvar agendamento', ['class' => 'btn btn-success']) !!}
        </div>

        {!! Form::close() !!}

    </div>

@endsection
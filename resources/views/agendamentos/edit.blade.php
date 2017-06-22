@extends("app")


@section("content")
    <div class="container">
        <h2>Editar agendamento</h2>

        {!! Form::open(['url' => "agendamentos/$agendamento->id/update"]) !!}

        <div class="form-group">
            {!! Form::label('cliente_id', 'Cliente:') !!}
            {!! Form::select('cliente_id',
                $clientes, $agendamento->cliente->id,
                ['class' => 'form-control']) !!}
            @if($errors->has("cliente_id"))
                <div class="error">{{$errors->first('cliente_id')}}</div>
            @endif
        </div>

        <div class="form-group">
            {!! Form::label('servico_id', 'Serviço:') !!}
            {!! Form::select('servico_id',
                $servicos, $agendamento->servico->id,
                ['class' => 'form-control']) !!}
            @if($errors->has("servico_id"))
                <div class="error">{{$errors->first('servico_id')}}</div>
            @endif
        </div>

        <div class="form-group">
            {!! Form::label('dia', 'Selecione o dia:') !!}
            {!! Form::text('dia', Carbon\Carbon::parse($agendamento->dia)->format('d/m/Y'),
            ['class' => 'form-control', 'id' => 'datepicker']) !!}
            @if($errors->has("dia"))
                <div class="error">{{$errors->first('dia')}}</div>
            @endif
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    {!! Form::label('hora_inicio', 'Horário do início:') !!}
                    {!! Form::time('hora_inicio', $agendamento->hora_inicio, ['class' => 'form-control']) !!}
                    @if($errors->has("hora_inicio"))
                        <div class="error">{{$errors->first('hora_inicio')}}</div>
                    @endif
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    {!! Form::label('hora_fim', 'Horário do fim:') !!}
                    {!! Form::time('hora_fim', $agendamento->hora_fim, ['class' => 'form-control']) !!}
                    @if($errors->has("hora_fim"))
                        <div class="error">{{$errors->first('hora_fim')}}</div>
                    @endif
                </div>
            </div>
        </div>


        <div class="form-group">
            {!! Form::submit('Salvar agendamento', ['class' => 'btn btn-success']) !!}
        </div>

        {!! Form::close() !!}

    </div>

@endsection
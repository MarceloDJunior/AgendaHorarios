@extends("app")


@section("content")

    <div class="container">
        <h2>Agendamentos</h2>
        <a href="{{ url('agendamentos/create') }}"><button type="button" class="btn btn-success marginb-20">Novo agendamento</button></a>
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                <th>Cliente</th>
                <th>Dia</th>
                <th>Horário do início</th>
                <th>Horário do fim</th>
                <th>Serviço</th>
                <th style="text-align: center">Ação</th>
                </thead>
                <tbody>
                @foreach($agendamentos as $agendamento)
                    <tr>
                        <td>{{$agendamento->cliente->nome}}</td>
                        <td>{{Carbon\Carbon::parse($agendamento->dia)->format('d/m/Y')}}</td>
                        <td>{{$agendamento->hora_inicio}}</td>
                        <td>{{$agendamento->hora_fim}}</td>
                        <td>{{$agendamento->servico->nome}}</td>
                        <td align="center">
                            <a href="{{ url("agendamentos/$agendamento->id/edit") }}" title="Editar"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            <a href="{{ url("agendamentos/$agendamento->id/destroy") }}" title="Excluir"><i class="fa fa-trash" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
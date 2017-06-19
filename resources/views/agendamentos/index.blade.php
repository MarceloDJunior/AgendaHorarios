@extends("app")


@section("content")

    <div class="container">
        <h2>Agendamentos</h2>
        <a href="{{ url('agendamentos/create') }}"><button type="button" class="btn btn-success margin-20">Novo agendamento</button></a>
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                <th>Cliente</th>
                <th>Início</th>
                <th>Fim</th>
                <th>Serviço</th>
                <th style="text-align: center">Ação</th>
                </thead>
                <tbody>
                @foreach($agendamentos as $agendamento)
                    <tr>
                        <td>{{$agendamento->cliente->nome}}</td>
                        <td>{{$agendamento->inicio}}</td>
                        <td>{{$agendamento->fim}}</td>
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
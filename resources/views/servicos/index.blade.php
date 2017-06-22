@extends("app")


@section("content")

    <div class="container">
        <h2>Serviços</h2>
        <a href="{{ url('servicos/create') }}"><button type="button" class="btn btn-success marginb-20">Novo serviço</button></a>
        @if(!empty($excluirerro))
            <div class="error">{{$excluirerro}}</div>
        @endif
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                <th>Nome</th>
                <th style="text-align: center">Ação</th>
                </thead>
                <tbody>
                @foreach($servicos as $servico)
                    <tr>
                        <td>{{$servico->nome}}</td>
                        <td align="center">
                            <a href="{{ url("servicos/$servico->id/edit") }}" title="Editar"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            <a href="{{ url("servicos/$servico->id/destroy") }}" title="Excluir"><i class="fa fa-trash" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
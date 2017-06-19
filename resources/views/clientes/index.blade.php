@extends("app")


@section("content")

    <div class="container">
        <h2>Clientes</h2>
        <a href="{{ url('clientes/create') }}"><button type="button" class="btn btn-success margin-20">Novo cliente</button></a>
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Telefone</th>
                <th style="text-align: center">Ação</th>
                </thead>
                <tbody>
                @foreach($clientes as $cliente)
                    <tr>
                        <td>{{$cliente->nome}}</td>
                        <td>{{$cliente->email}}</td>
                        <td>{{$cliente->telefone}}</td>
                        <td align="center">
                            <a href="{{ url("clientes/$cliente->id/edit") }}" title="Editar"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            <a href="{{ url("clientes/$cliente->id/destroy") }}" title="Excluir"><i class="fa fa-trash" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@extends("app")


@section("content")

    <div class="container">
        <h2>Usuários</h2>
        <a href="{{ url('users/create') }}"><button type="button" class="btn btn-success marginb-20">Novo usuário</button></a>
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                <th>Nome</th>
                <th>E-mail</th>
                <th style="text-align: center">Ação</th>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->nome}}</td>
                        <td>{{$user->email}}</td>
                        <td align="center">
                            <a href="{{ url("users/$user->id/edit") }}" title="Editar"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            <a href="{{ url("users/$user->id/destroy") }}" title="Excluir"><i class="fa fa-trash" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
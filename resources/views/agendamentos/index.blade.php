@extends("app")


@section("content")

    <div class="container">
        <h2>Agendamentos</h2>
        <a href="{{ url('agendamentos/create') }}">
            <button type="button" class="btn btn-success marginb-20">Novo agendamento</button>
        </a>
        <div id="agenda"></div>
    </div>
@endsection
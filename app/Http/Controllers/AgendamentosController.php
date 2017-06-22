<?php

namespace App\Http\Controllers;

use App\Agendamento;
use App\Cliente;
use App\Http\Requests\AgendamentosRequest;
use App\Servico;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AgendamentosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agendamentos = Agendamento::with('cliente', 'servico', 'user')->get();
        return view('agendamentos.index', ['agendamentos' => $agendamentos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = Cliente::pluck("nome", "id");
        $servicos = Servico::pluck("nome", "id");
        return view('agendamentos.create', ['clientes' => $clientes, 'servicos' => $servicos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AgendamentosRequest $request)
    {
        $novo_agendamento = new Agendamento($request->all());
        $novo_agendamento->user_id = $request->session()->get("user")->id;
        $novo_agendamento->dia = Carbon::createFromFormat('d/m/Y', $novo_agendamento->dia)->format('Y-m-d');

        Agendamento::create($novo_agendamento->toArray());

        return redirect('agendamentos');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $agendamento = Agendamento::find($id);
        $clientes = Cliente::pluck("nome", "id");
        $servicos = Servico::pluck("nome", "id");
        $agendamento->hora_inicio = date('H:i',strtotime($agendamento->hora_inicio));
        $agendamento->hora_fim = date('H:i',strtotime($agendamento->hora_fim));
        return view('agendamentos.edit', ['agendamento' => $agendamento,
            'clientes' => $clientes, 'servicos' => $servicos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AgendamentosRequest $request, $id)
    {
        $agendamento = Agendamento::find($id);
        $novo_agendamento = new Agendamento($request->all());
        $novo_agendamento->dia = Carbon::createFromFormat('d/m/Y', $novo_agendamento->dia)->format('Y-m-d');
        $agendamento->update($novo_agendamento->toArray());
        return redirect('agendamentos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Agendamento::find($id)->delete();
        return redirect('agendamentos');
    }
}

<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Http\Requests\ClientesRequest;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::all();
        return view('clientes.index', ['clientes' => $clientes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientesRequest $request)
    {
        $novo_cliente = $request->all();
        Cliente::create($novo_cliente);

        return redirect('clientes');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente = Cliente::find($id);
        return view('clientes.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClientesRequest $request, $id)
    {
        $cliente = Cliente::find($id)->update($request->all());
        return redirect('clientes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente = Cliente::find($id);
        if(!$cliente->agendamentos()->where('agendamentos.cliente_id', $id)->exists()){
            $cliente->delete();
            return redirect('clientes');
        }
        else{
            $clientes = Cliente::all();
            $excluirerro = "O cliente '$cliente->nome' não pode ser excluído pois possui agendamentos referenciados.";
            return view('clientes.index', ['clientes' => $clientes, 'excluirerro' => $excluirerro]);
        }
    }
}

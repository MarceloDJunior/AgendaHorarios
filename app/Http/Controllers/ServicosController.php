<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServicosRequest;
use App\Servico;
use Illuminate\Http\Request;

class ServicosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servicos = Servico::all();
        return view('servicos.index', ['servicos' => $servicos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('servicos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServicosRequest $request)
    {
        $novo_servico = $request->all();
        Servico::create($novo_servico);

        return redirect('servicos');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $servico = Servico::find($id);
        return view('servicos.edit', compact('servico'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ServicosRequest $request, $id)
    {
        $servico = Servico::find($id)->update($request->all());
        return redirect('servicos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $servico = Servico::find($id);
        if(!$servico->agendamentos()->where('agendamentos.servico_id', $id)->exists()){
            $servico->delete();
            return redirect('servicos');
        }
        else{
            $servicos = Servico::all();
            $excluirerro = "O serviço '$servico->nome' não pode ser excluído pois possui agendamentos referenciados.";
            return view('servicos.index', ['servicos' => $servicos, 'excluirerro' => $excluirerro]);
        }
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agendamento extends Model
{
    protected $fillable = ["dia", "hora_inicio", "hora_fim", "user_id", "cliente_id", "servico_id"];

    public function cliente()
    {
        return $this->belongsTo('App\Cliente');
    }

    public function servico()
    {
        return $this->belongsTo('App\Servico');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function getAgendamentosData($datainicio, $datafim, $user)
    {
        $agendamentos = Agendamento::with('cliente', 'servico', 'user')->where([
            ["dia", ">=", $datainicio],
            ["dia", "<=", $datafim],
            ["user_id", "=", $user]
        ])->get();

        $agendamentos_array = array();

        foreach ($agendamentos as $agendamento){
            $agendamentos_array[] = array(
                "title" => $agendamento->cliente->nome,
                "start" => $agendamento->dia." ".$agendamento->hora_inicio,
                "end" => $agendamento->dia." ".$agendamento->hora_fim,
                "backgroundColor" => "#F10",
                "borderColor" => "#F10",
                "textColor" => "#FFF"
            );
        }

        return $agendamentos_array;
    }


}

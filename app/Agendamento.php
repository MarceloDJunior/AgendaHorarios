<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agendamento extends Model
{
    protected $fillable = ["inicio", "fim", "user_id", "cliente_id", "servico_id"];

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

}

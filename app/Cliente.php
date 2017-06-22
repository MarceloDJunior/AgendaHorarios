<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = ["nome", "email", "telefone"];

    public function agendamentos()
    {
        return $this->hasMany('App\Agendamento');
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
    protected $fillable = ["nome"];

    public function agendamentos()
    {
        return $this->hasMany('Agendamento');
    }

}

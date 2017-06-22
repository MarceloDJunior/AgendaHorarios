<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'email', 'senha',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'senha', 'remember_token',
    ];

    public function agendamentos()
    {
        return $this->hasMany('App\Agendamento');
    }

    public static function login($user)
    {
        $result = User::select('id', 'nome', 'email')
            ->where([
                ['email', '=', $user->email],
                ['senha', '=', $user->senha]
            ])->first();

        return $result;
    }
}

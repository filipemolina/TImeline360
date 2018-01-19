<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Contracts\UserResolver;
use Illuminate\Auth\Passwords\CanResetPassword;
use App\Notifications\enviaEmaildeDefinicaodeSenha;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements Auditable, UserResolver
{
    use Notifiable, \OwenIt\Auditing\Auditable;
	
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'acesso','avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function solicitante()
    {
        return $this->belongsTo('App\Models\Solicitante');
    }

    public function funcionario()
    {
        return $this->belongsTo('App\Models\Funcionario');
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new enviaEmaildeDefinicaodeSenha($token));
    }

    public static function resolveId()
    {
        return Auth::check() ? Auth::user()->getAuthIdentifier() : null;
    }
}


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
    protected $table = 'users';

    protected $fillable = [
        'email', 'password', 'nama_lengkap', 'jk', 'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function infoUser($users_id, $field)
    {
        return User::select($field)
            ->where('id', $users_id)
            ->first();
    }

    public static function getUserRole($role, $limit)
    {
        return User::where('role', $role)
            ->orderBy('nama_lengkap', 'asc')
            ->paginate($limit);
    }
}

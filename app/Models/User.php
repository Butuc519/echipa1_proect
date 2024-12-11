<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';

    protected $fillable = [
        'nume','email', 'parola', 'role'
    ];
    public function isAdmin()
    {
        return $this->role === 'admin';
    }
}

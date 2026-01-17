<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    use softDeletes;

    protected $table = 'role_user';
    protected $fillable = [
        'role_id',
        'user_id',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

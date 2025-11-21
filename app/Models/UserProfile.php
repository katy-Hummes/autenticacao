<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'biography',
        'cpf',
        'age',
        'birth',
        'photo',
        'race',
        'color'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

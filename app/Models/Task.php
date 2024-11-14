<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'status', 'user_id'];

    // Definir a relação com o usuário (um usuário tem muitas tarefas)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ElevadorLog extends Model
{
    protected $fillable = ['andar', 'mensagem'];
    protected $table = 'elevador_logs';
    protected $casts = [
        'andar' => 'integer',
        'mensagem' => 'string',
    ];
    protected $primaryKey = 'id';
}

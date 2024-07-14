<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    use HasFactory;

    protected $table = 'contrato';

    protected $fillable = [
        'id_contrato',
        'precio',
        'estado',
        'dni',
    ];

    public $incrementing = false;
    protected $keyType = 'string';
    protected $primaryKey = 'id_contrato';

    public function administrativo()
    {
        return $this->belongsTo(Administrativo::class, 'dni', 'dni');
    }
}

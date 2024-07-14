<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trabajador extends Model
{
    use HasFactory;

    protected $table = 'trabajador';

    protected $fillable = [
        'nombre',
        'dni',
        'direccion',
        'numero_telefono',
        'cif',
    ];

    public $incrementing = false;
    protected $keyType = 'string';
    protected $primaryKey = 'dni';

    public function consultoriaIntegral()
    {
        return $this->belongsTo(ConsultoriaIntegral::class, 'cif', 'cif');
    }
}

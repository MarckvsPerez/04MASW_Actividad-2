<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrata extends Model
{
    use HasFactory;

    protected $table = 'contrata';

    protected $fillable = [
        'fecha',
        'id_servicio',
        'cif',
    ];

    public function servicio()
    {
        return $this->belongsTo(Servicio::class, 'id_servicio', 'id_servicio');
    }

    public function institucion()
    {
        return $this->belongsTo(Institucion::class, 'cif', 'cif');
    }
}

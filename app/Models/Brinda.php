<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brinda extends Model
{
    use HasFactory;

    protected $table = 'brinda';

    protected $fillable = [
        'id_servicio',
        'cif',
    ];

    public function servicio()
    {
        return $this->belongsTo(Servicio::class, 'id_servicio', 'id_servicio');
    }

    public function consultoriaIntegral()
    {
        return $this->belongsTo(ConsultoriaIntegral::class, 'cif', 'cif');
    }
}

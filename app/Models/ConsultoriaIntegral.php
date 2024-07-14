<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsultoriaIntegral extends Model
{
    use HasFactory;

    protected $table = 'consultoria_integral';

    protected $fillable = [
        'id_consultoria_integral',
        'cif',
    ];

    public $incrementing = false;
    protected $keyType = 'string';
    protected $primaryKey = 'id_consultoria_integral';

    public function institucion()
    {
        return $this->belongsTo(Institucion::class, 'cif', 'cif');
    }
}

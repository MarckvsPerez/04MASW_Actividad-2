<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    protected $table = 'empresa';

    protected $fillable = [
        'representante_legal',
        'dni_representante_legal',
        'sector',
        'actividad',
        'cnae',
        'numero_trabajadores',
        'id_empresa',
        'cif',
    ];

    public $incrementing = false;
    protected $keyType = 'string';
    protected $primaryKey = 'id_empresa';

    public function institucion()
    {
        return $this->belongsTo(Institucion::class, 'cif', 'cif');
    }
}

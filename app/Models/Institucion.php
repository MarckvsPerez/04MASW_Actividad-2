<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Institucion extends Model
{
    use HasFactory;

    protected $table = 'institucion';

    protected $fillable = [
        'cif',
        'nombre',
        'direccion',
        'codigo_postal',
        'provincia',
        'telefono',
        'correo',
        'poblacion',
        'numero_cuenta_corriente',
        'dni',
    ];

    public $incrementing = false;
    protected $keyType = 'string';
    protected $primaryKey = 'cif';

    public function comercial()
    {
        return $this->belongsTo(Comercial::class, 'dni', 'dni');
    }

    public function consultoriaIntegrals()
    {
        return $this->hasMany(ConsultoriaIntegral::class, 'cif', 'cif');
    }

    public function asesorias()
    {
        return $this->hasMany(Asesoria::class, 'cif', 'cif');
    }

    public function empresas()
    {
        return $this->hasMany(Empresa::class, 'cif', 'cif');
    }
}

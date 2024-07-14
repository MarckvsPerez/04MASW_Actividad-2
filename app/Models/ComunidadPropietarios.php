<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComunidadPropietarios extends Model
{
    use HasFactory;

    protected $table = 'comunidad_propietarios';

    protected $fillable = [
        'id_comunidad',
        'nombre_fiscal',
        'cif',
    ];

    public $incrementing = false;
    protected $keyType = 'string';
    protected $primaryKey = 'id_comunidad';

    public function asesoria()
    {
        return $this->belongsTo(Asesoria::class, 'cif', 'cif');
    }
}

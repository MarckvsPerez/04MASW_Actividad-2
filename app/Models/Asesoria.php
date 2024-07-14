<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asesoria extends Model
{
    use HasFactory;

    protected $table = 'asesoria_';

    protected $fillable = [
        'id_asesoria',
        'cif',
    ];

    public $incrementing = false;
    protected $keyType = 'string';
    protected $primaryKey = 'id_asesoria';

    public function institucion()
    {
        return $this->belongsTo(Institucion::class, 'cif', 'cif');
    }
}

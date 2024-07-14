<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;

    protected $table = 'factura';

    protected $fillable = [
        'codigo_factura',
        'iva',
        'pagado',
        'irpf',
        're',
        'rectificativa',
        'dni',
    ];

    protected $primaryKey = 'codigo_factura';
    public $incrementing = false;
    protected $keyType = 'integer';

    public function administrativo()
    {
        return $this->belongsTo(Administrativo::class, 'dni', 'dni');
    }
}

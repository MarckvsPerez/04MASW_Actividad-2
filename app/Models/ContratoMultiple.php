<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContratoMultiple extends Model
{
    use HasFactory;

    protected $table = 'contrato_multiple';

    protected $fillable = [
        'fecha_cobro',
        'id_contrato_multiple',
        'id_contrato',
    ];

    public $incrementing = false;
    protected $keyType = 'string';
    protected $primaryKey = 'id_contrato_multiple';

    public function contrato()
    {
        return $this->belongsTo(Contrato::class, 'id_contrato', 'id_contrato');
    }
}

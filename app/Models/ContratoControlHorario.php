<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContratoControlHorario extends Model
{
    use HasFactory;

    protected $table = 'contrato_control_horario';

    protected $fillable = [
        'id_contrato_control_horario',
        'id_contrato',
    ];

    public $incrementing = false;
    protected $keyType = 'string';
    protected $primaryKey = 'id_contrato_control_horario';

    public function contrato()
    {
        return $this->belongsTo(Contrato::class, 'id_contrato', 'id_contrato');
    }
}

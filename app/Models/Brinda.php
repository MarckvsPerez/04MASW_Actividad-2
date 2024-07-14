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

    public $incrementing = false;
    public $timestamps = true;
    protected $primaryKey = ['id_servicio', 'cif'];

    public function getKey()
    {
        return [
            'id_servicio' => $this->attributes['id_servicio'],
            'cif' => $this->attributes['cif'],
        ];
    }

    protected function setKeysForSaveQuery($query)
    {
        foreach ($this->getKey() as $keyName => $keyValue) {
            $query->where($keyName, '=', $keyValue);
        }

        return $query;
    }

    public function servicio()
    {
        return $this->belongsTo(Servicio::class, 'id_servicio', 'id_servicio');
    }

    public function consultoriaIntegral()
    {
        return $this->belongsTo(ConsultoriaIntegral::class, 'cif', 'cif');
    }
}

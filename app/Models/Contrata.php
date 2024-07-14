<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrata extends Model
{
    use HasFactory;

    protected $table = 'contrata';

    protected $fillable = [
        'fecha',
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

    public function institucion()
    {
        return $this->belongsTo(Institucion::class, 'cif', 'cif');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    use HasFactory;

    protected $table = 'servicio';

    protected $primaryKey = 'id_servicio';

    protected $fillable = ['nombre', 'id_servicio'];

    public $incrementing = false;

    protected $keyType = 'string';
}

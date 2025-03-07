<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administrativo extends Model
{
    use HasFactory;

    protected $table = 'administrativo';

    protected $fillable = [
        'id_administrativo',
        'dni',
    ];

    public $incrementing = false;
    protected $keyType = 'string';
    protected $primaryKey = 'id_administrativo';
}

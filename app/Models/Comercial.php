<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comercial extends Model
{
    use HasFactory;

    protected $table = 'comercial';

    protected $fillable = [
        'id_comercial',
        'dni',
    ];

    public $incrementing = false;
    protected $keyType = 'string';
    protected $primaryKey = 'id_comercial';
}

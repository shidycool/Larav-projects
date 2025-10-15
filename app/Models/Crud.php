<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crud extends Model
{
    protected $fillable = [
        'name',
        'qty',
        'price',
        'description'
    ];
    /** @use HasFactory<\Database\Factories\CrudFactory> */
    use HasFactory;
}

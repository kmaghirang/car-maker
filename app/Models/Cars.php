<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cars extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'details',
        'created_by',
        'updated_by',
        'manufacturer',
        'type',
        'color'
    ];
}

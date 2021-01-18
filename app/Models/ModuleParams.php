<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModuleParams extends Model
{
    use HasFactory;

    protected $fillable = [
        'module_id',
        'value',
    ];

    public $timestamp = true;
}

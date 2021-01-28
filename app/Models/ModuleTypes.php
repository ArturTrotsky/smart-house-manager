<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ModuleTypes extends Model
{
    use HasFactory;

    use SoftDeletes;

    public $timestamp = true;

    protected $fillable = [
        'name',
    ];
}

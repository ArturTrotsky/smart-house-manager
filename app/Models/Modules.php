<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modules extends Model
{
    use HasFactory;

    protected $fillable = [
        'module_type_id',
        'object_id',
        'name',
        'ip_adress',
    ];

    public $timestamp = true;

    public function type()
    {
        return $this->hasOne(ModuleTypes::class, 'id', 'module_type_id');
    }

    public function objects()
    {
        return $this->hasMany(UserObject::class, 'id', 'object_id');
    }

    public function getObject()
    {
        return $this->objects()->first() ?? null;
    }
}

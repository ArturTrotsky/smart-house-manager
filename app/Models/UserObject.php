<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserObject extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
    ];

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id')->withDefault();
    }

    public function modules()
    {
        return $this->hasMany(Modules::class, 'object_id', 'id');
    }
}

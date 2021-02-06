<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Schedulers extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $table = 'module_plans';

    protected $fillable = [
        'module_id',
        'value',
        'on_time',
        'off_time',
        'every_day',
        'every_week',
        'every_work_day',
        'weekend',
    ];

    public $timestamp = true;

    public function modules()
    {
        return $this->belongsTo(Modules::class, 'module_id', 'id');
    }
}

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

    public function getActivePeriodName(int $schedulerId): string
    {
        $arrPeriodColumns = ['Every day' => $this->every_day, 'Every week' => $this->every_week,
            'Every work day' => $this->every_work_day, 'Every weekend' => $this->weekend];
        arsort($arrPeriodColumns);

        return array_key_first($arrPeriodColumns);
    }

    public function getActivePeriodColumnName(int $schedulerId): string
    {
        $arrPeriodColumnNames = ['every_day' => $this->every_day, 'every_week' => $this->every_week,
            'every_work_day' => $this->every_work_day, 'weekend' => $this->weekend];
        arsort($arrPeriodColumnNames);

        return array_key_first($arrPeriodColumnNames);
    }

}

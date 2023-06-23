<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClockIn extends Model
{
    use HasFactory;

    protected $table = 'dtr_app';

    public $timestamps = false;

    protected $fillable = [
        'biometric_id',
        'punch_date',
        'time_in',
        'time_out',
        'overtime_in',
        'overtime_out',
        'actual_time_in',
        'actual_time_out',
        'actual_overtime_in',
        'actual_overtime_out',
    ];

    function getLogs($biometric_id,$date)
    {
        $result = ClockIn::select()->where([
            ['biometric_id','=',$biometric_id],
            ['punch_date','=',$date]
        ])->first();

        return $result;
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarCode extends Model
{
    use HasFactory;

    protected $table = 'employees';

    function getEmployees()
    {
        $result = BarCode::select('biometric_id','lastname','firstname')->where('exit_status',1)->where('pay_type',3);

        return $result->get();
    }
}

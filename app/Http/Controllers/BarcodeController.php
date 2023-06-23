<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BarCode;

class BarcodeController extends Controller
{
    //

    public function index()
    {
        $employees = BarCode::getEmployees();

        return view('barcode',['employees' => $employees]);
    }
}

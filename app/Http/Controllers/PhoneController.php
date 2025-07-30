<?php

namespace App\Http\Controllers;

use App\Models\Phone;
use Illuminate\Http\Request;

class PhoneController extends Controller
{
    public function index()
    {
        $phone = Phone::with('user')->get();
        // return $phone; cek data
        return view('phone', compact('phone'));
    }
}

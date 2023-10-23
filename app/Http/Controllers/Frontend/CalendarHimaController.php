<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Anggota\Departemen;
use App\Models\Calendar;
use Illuminate\Http\Request;

class CalendarHimaController extends Controller
{
    public function index()
    {
        $dep = Departemen::all();
        $eventhimatifa = Calendar::all();
        return view('frontend.calendarhima.calendar', compact('eventhimatifa', 'dep'));
    }
}

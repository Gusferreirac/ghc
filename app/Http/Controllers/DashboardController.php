<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $name = Person::where('id', auth()->user()->person_id)->first()->name;
        return view('dashboard_types.start')->with('name', $name);
    }
}

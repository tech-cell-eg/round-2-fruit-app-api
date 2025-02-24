<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Meal;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index() {
        $title = 'Dashboard';
        $meals = Meal::all();
        return view('Dashboard.index', compact('title', 'meals'));
    }

}

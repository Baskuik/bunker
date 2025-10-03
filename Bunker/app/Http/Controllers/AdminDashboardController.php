<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    // Admin dashboard
    public function dashboard()
    {
        return view('admin.admindashboard');
    }

    // Openingstijden bekijken/bewerken
    public function openingstijden()
    {
        return view('admin.openingstijden');
    }

    public function updateOpeningstijden(Request $request)
    {
        return back()->with('success', 'Openingstijden bijgewerkt');
    }

    // Rondleidingen & kosten
    public function rondleidingen()
    {
        return view('admin.rondleidingen');
    }

    public function updateRondleidingen(Request $request)
    {
        return back()->with('success', 'Rondleidingen bijgewerkt');
    }

    // Tijden & max personen
    public function tijdenMax()
    {
        return view('admin.tijden_max');
    }

    public function updateTijdenMax(Request $request)
    {
        return back()->with('success', 'Tijden en max personen bijgewerkt');
    }

    // Rondleidingplanning
    public function planning()
    {
        return view('admin.rondleidingplanning');
    }
}


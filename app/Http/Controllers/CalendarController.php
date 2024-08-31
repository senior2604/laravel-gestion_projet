<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalendarController extends Controller
{
    /**
     * Afficher la vue du calendrier.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('calendar');
    }
}

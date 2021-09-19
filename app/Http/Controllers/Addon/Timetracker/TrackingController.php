<?php

namespace App\Http\Controllers\Addon\Timetracker;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TrackingController extends Controller
{
    public function render_index() {
        return Inertia::render('Addon/Timetracker/Overview');
    }
    public function render_single() {
        return Inertia::render('Addon/Timetracker/Single');
    }
}

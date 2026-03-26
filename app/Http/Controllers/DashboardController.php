<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_clients' => Client::count(),
            'leads' => Client::where('status', 'lead')->count(),
            'contacted' => Client::where('status', 'contacted')->count(),
            'clients' => Client::where('status', 'client')->count(),
        ];

        return view('dashboard', compact('stats'));
    }
}

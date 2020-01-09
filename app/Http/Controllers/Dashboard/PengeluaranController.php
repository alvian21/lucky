<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
    public function index()
    {
        return view('dashboard.pengeluaran.index');
    }

    public function show()
    {
        return view('dashboard.pengeluaran.create');
    }
}

<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Expense;

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

    public function create(Request $request)
    {
        $data = new Expense;
        $data->kode = $request->get('kode');
        $data->name = $request->get('name');
        $data->qty = $request->get('qty');
        $data->price = $request->get('price');
        $data->save();
        return back();
    }
}

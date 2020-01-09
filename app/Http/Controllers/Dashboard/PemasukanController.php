<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Income;

class PemasukanController extends Controller
{
    public function index()
    {
        $data = Income::all();
        return view('dashboard.pemasukan.index',['data'=>$data]);
    }

    public function show()
    {
        return view('dashboard.pemasukan.create');
    }

    public function create(Request $request)
    {
       $data = new Income;
       $data->kode = $request->get('kode');
       $data->name = $request->get('name');
       $data->qty = $request->get('qty');
       $data->price = $request->get('price');
       $data->save();
       return back();
    }
}

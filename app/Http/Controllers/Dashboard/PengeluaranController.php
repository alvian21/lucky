<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Expense;

class PengeluaranController extends Controller
{
    public function index()
    {
        $data = Expense::all();
        return view('dashboard.pengeluaran.index',['data'=>$data]);
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
        return redirect()->route('pengeluaran');
    }

    public function delete(Request $request)
    {
        if($request->get('delete')){
            Expense::find($request->get('id'))->delete();
        }
    }

    public function edit(Request $request)
    {
        if($request->get('edit'))
        {
           $data = Expense::find($request->get('id'));
           $data->kode = $request->get('kode');
           $data->name = $request->get('name');
           $data->qty = $request->get('jumlah');
           $data->price = $request->get('harga');
            $data->save();

        }
    }
}

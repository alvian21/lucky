<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Expense;
use Illuminate\Support\Facades\Auth;
use Validator;

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
        $validator = Validator::make(request()->all(), [
            'kode' => 'required',
            'name' => "required",
            'qty' => "required",
            'price' => 'required',
        ]);

        if($validator->fails()) {
            return back()->withErrors($validator->errors());
        } else {
        $data = new Expense;
        $data->user_id = Auth::user()->id;
        $data->kode = $request->get('kode');
        $data->name = $request->get('name');
        $data->qty = $request->get('qty');
        $data->date = $request->get('date');
        $data->price = $request->get('price');
        $data->total = $request->get('total');
        $data->save();
        return redirect()->route('pengeluaran');
         }
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

    public function total(Request $request)
    {
        $harga = 0;
        $qty = 0;
        $harga = intval($request->get('harga'));
        $qty = intval($request->get('qty'));

        $hasil = $harga * $qty;
        echo $hasil;

    }
}

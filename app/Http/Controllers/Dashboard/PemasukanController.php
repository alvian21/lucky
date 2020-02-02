<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Income;
use Validator;


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
        $validator = Validator::make(request()->all(), [
            'kode' => 'required',
            'name' => "required",
            'qty' => "required",
            'price' => 'required',
        ]);

        if($validator->fails()) {
            return back()->withErrors($validator->errors());
        } else {
       $data = new Income;
       $data->kode = $request->get('kode');
       $data->name = $request->get('name');
       $data->date = $request->get('date');
       $data->qty = $request->get('qty');
       $data->price = $request->get('price');
       $data->total = $request->get('total');
       $data->save();
       return redirect()->route('pemasukan');
        }
    }


    public function delete(Request $request)
    {
        if($request->get('delete')){
            Income::find($request->get('id'))->delete();
        }
    }

    public function edit(Request $request)
    {
        if($request->get('edit'))
        {
           $data = Income::find($request->get('id'));
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

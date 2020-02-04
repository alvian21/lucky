<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Income;
use Illuminate\Support\Facades\Auth;
use App\Expense;
use Validator;
use App\Data;

class PemasukanController extends Controller
{
    public function index()
    {
        $data = Income::all();

        return view('dashboard.pemasukan.index',['data'=>$data]);
    }

    public function show()
    {
        $exp = Expense::all();
        return view('dashboard.pemasukan.create',['exp'=>$exp]);
    }

    public function create(Request $request)
    {
        $new = new Data;
       $data = new Income;
       $exp = Expense::find($request->get('id'));
       $data->user_id = Auth::user()->id;
       $data->expense_id = $exp->id;
       $data->kode = $request->get('kode');
       $data->name = $exp->name;
       $data->date = $request->get('date');
       $data->qty = $request->get('qty');
       $data->price = $request->get('price');
       $data->total = $request->get('total');
       $data->save();
       if($data->save()){
           $new->user_id = $data->user_id;
           $new->name = $data->name;
           $new->data = $request->get('total') - $exp->total;
           $new->date = $request->get('date');
           $new->save();
           return $new;


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

    public function fetchjumlah(Request $request)
    {
        $data = Expense::find($request->get('id'));

        echo $data->qty;
    }
}

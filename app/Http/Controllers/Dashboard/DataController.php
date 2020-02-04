<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Data;

class DataController extends Controller
{
    public function index()
    {
        $data = Data::all();
        return view('dashboard.data.index',['data'=>$data]);

    }

    public function delete(Request $request)
    {
        if($request->get('delete')){
            $data = Data::find($request->get('id'));
            $data->delete();
            return $data;
        }

    }
}

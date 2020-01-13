<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Income;
use App\Expense;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $income = Income::all();
        $expense = Expense::all();

        $x = [];
        foreach($income as $key => $incomes){
            $inc = Income::where('id',$incomes->id)->first();
            $array['kode'] = $inc->kode;
            $array['name'] = $inc->name;
            $array['price'] = $inc->price;
            $array['type'] = 'Pemasukan';

            array_push($x, $array);
        }

        foreach($expense as $key => $expenses){
            $exp = Expense::where('id',$expenses->id)->first();
            $array['kode'] = $exp->kode;
            $array['name'] = $exp->name;
            $array['price'] = $exp->price;
            $array['type'] = 'Pengeluaran';

            array_push($x, $array);
        }

        $data['transaction'] = $x;

       return view('dashboard.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

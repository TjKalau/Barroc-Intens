<?php

namespace App\Http\Controllers;

use App\Models\Part;
use App\Models\Product;
use Illuminate\Http\Request;

class PartsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $parts = Part::orderBy('amount', 'asc')->get();
        $confirms = Part::where('varify' , '0')->get();
        $search = $request['search'] ?? "";

        if ($search != "") {
            //where
            $products = Product::where('name', 'LIKE', "%$search%")->orWhere('price', 'LIKE', "%$search%")->orWhere('description', 'LIKE', "%$search%")->orWhere('product_code', 'LIKE', "%$search%")->get();
        } else {
            $products = Product::all();
        }
        $data = compact('products','search');
        return view('web-app/parts')
            ->with($data)
            ->with(['confirms' => $confirms])
            ->with(['parts' => $parts]);

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
        $this->validate($request, [
            'amount' => 'required',

        ]);

        $part = Part::findorfail($id);
        $part->amount = $request->amount + $part->amount;
        if ($part->amount > 4999)
        {
            $part->varify = false;
        }
        $part->save();
        return back();

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

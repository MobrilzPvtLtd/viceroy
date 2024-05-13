<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Currency;

class CurrencyController extends Controller
{
    public function index()
    {
        $currencys = Currency::all();
        return view('backend.currency.index', compact('currencys'));
    }
    public function create()
    {

        return view('backend.currency.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required',
            'prefix'=> 'required',
            'suffix' => 'required',
            'bcr'=> 'required',
        ]);

        Currency::create($request->post());

        return redirect()->route('currency.index')->with('success', 'currency has been created successfully.');
    }

    public function show()
    {

    }

    public function edit(Currency $currency)
    {
        return view('backend.currency.edit', compact('currency'));
    }

    public function update(Request $request, Currency  $currency)
    {
        $request->validate([
            'code' => 'required',
            'prefix' => 'required',
            'suffix' => 'required',
            'bcr' => 'required',
        ]);

        $currency->fill($request->post())->save();

        return redirect()->route('currency.index');
    }

    public function destroy(Currency $currency)
    {
        $currency->delete();
        return redirect()->route('currency.index');
    }

}

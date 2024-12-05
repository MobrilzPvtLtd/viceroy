<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Currency;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

class CurrencyController extends Controller
{
    public function index()
    {
        $currencies = Currency::whereNull('deleted_at')->get();
        return view('backend.currency.index', compact('currencies'));
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

        $response = Http::get(url('/admin/update-currency'));

        if ($response->successful()) {
            return redirect()->route('currency.index')
                             ->with('success', 'Currency has been created successfully and updated.');
        } else {
            return redirect()->route('currency.index')
                             ->with('error', 'Currency created but failed to update.');
        }
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

        $response = Http::get(url('/admin/update-currency'));

        if ($response->successful()) {
            return redirect()->route('currency.index')
                             ->with('success', 'Currency has been updated successfully and updated.');
        } else {
            return redirect()->route('currency.index')
                             ->with('error', 'Currency updated but failed to update.');
        }
    }

    public function currencyTrash() {
        $currencies = Currency::onlyTrashed()->get();

        return view("backend.currency.trash", compact('currencies'));
    }

    public function destroy($id)
    {
        $currency = Currency::find($id);
        if ($currency) {
            $currency->deleted_at = Carbon::now();
            $currency->save();
        }
        return redirect()->route('currency.index')->with('success', 'Currency successfully deleted!');
    }

    public function currencyRestore($id)
    {
        $currency = Currency::withTrashed()->find($id);

        if ($currency && $currency->trashed()) {
            $currency->restore();
            return redirect()->route('currency-trash')->with('success', 'Currency successfully restored!');
        }

        return redirect()->route('currency-trash')->with('error', 'Currency not found or already restored.');
    }

    public function currencyDelete($id)
    {
        $currency = Currency::withTrashed()->find($id);

        if ($currency) {
            $currency->forceDelete();

            return redirect()->route('currency-trash')->with('success', 'Currency successfully permanently deleted!');
        }

        return redirect()->route('currency-trash')->with('error', 'Currency not found.');
    }
}

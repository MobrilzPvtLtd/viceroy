<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Holiday;
use Illuminate\Support\Facades\DB;

class HolidayController extends Controller
{

    public function index()
    {
        $holidays = Holiday::orderBy('id','desc')->paginate(5);
        return view('backend.holiday.index', compact('holidays'));

    }



    public function create()
    {
        return view('backend.holiday.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'address' => 'required',
            'beds' => 'required',
            'bath' => 'required',
            'area' => 'required',
            'p_type' => 'required',
            'url' => 'required',
        ]);
        $imagePaths = [];
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $file) {
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '_' . uniqid() . '.' . $extension;
                $file->move(public_path('uploads'), $filename);
                $imagePaths[] = $filename;
            }
        }
        $holidayData = $request->except('image');
        $holidayData['image'] = json_encode($imagePaths);
        Holiday::create($holidayData);
        return redirect()->route('holiday.index')->with('success', 'Holiday has been created successfully.');
    }

    public function show()
    {
    }

    public function edit(Holiday $holiday)
    {
        return view('backend.holiday.edit', compact('holiday'));
    }

public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required',
        'price' => 'required',
        'address' => 'required',
        'beds' => 'required',
        'bath' => 'required',
        'area' => 'required',
        'p_type' => 'required',
        'url' => 'required',
    ]);

    $holiday = Holiday::findOrFail($id);

    $imagePaths = [];
    if ($request->hasFile('image')) {
        foreach ($request->file('image') as $file) {
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '_' . uniqid() . '.' . $extension;
            $file->move(public_path('uploads'), $filename);
            $imagePaths[] = $filename;
        }
        // Delete old images
        foreach(json_decode($holiday->image) as $oldImage) {
            if(file_exists(public_path('uploads/' . $oldImage))) {
                unlink(public_path('uploads/' . $oldImage));
            }
        }
    }

    $holidayData = $request->except('image');
    $holidayData['image'] = json_encode($imagePaths);

    $holiday->update($holidayData);

    return redirect()->route('holiday.index')->with('success', 'Holiday has been updated successfully.');
}

    public function destroy(Holiday $holiday)
    {
        $holiday->delete();
        return redirect()->route('holiday.index');
    }
}

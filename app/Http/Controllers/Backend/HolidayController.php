<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Holiday;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class HolidayController extends Controller
{

    public function index()
    {
        $holidays = Holiday::where('deleted_at', null)->orderBy('id', 'desc')->get();
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
        $holidayData = $request->except('image','featured');
        $holidayData['image'] = json_encode($imagePaths);
        $holidayData['featured'] = $request->has('featured');
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
            // Upload new images
            foreach ($request->file('image') as $file) {
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '_' . uniqid() . '.' . $extension;
                $file->move(public_path('uploads'), $filename);
                $imagePaths[] = $filename;
            }
            // Delete old images
            if ($holiday->image) {
                foreach (json_decode($holiday->image) as $oldImage) {
                    if (file_exists(public_path('uploads/' . $oldImage))) {
                        unlink(public_path('uploads/' . $oldImage));
                    }
                }
            }
        }


        $holidayData = $request->except('image','featured');
        $holidayData['featured'] = $request->has('featured');

        if (!empty($imagePaths)) {
            $holidayData['image'] = json_encode($imagePaths);
        }

        $holiday->update($holidayData);

        return redirect()->route('holiday.index')->with('success', 'Holiday has been updated successfully.');
    }

    public function holidayTrash() {
        $holidays = Holiday::where('deleted_at', '!=', null)->orderBy('deleted_at', 'desc')->get();

        return view("backend.holiday.trash", compact('holidays'));
    }

    public function destroy($id)
    {
        $holiday = Holiday::find($id);
        if ($holiday) {
            $holiday->deleted_at = Carbon::now();
            $holiday->save();
        }
        return redirect()->route('holiday.index')->with('success', 'Holiday successfully deleted!');
    }

    public function holidayRestore($id)
    {
        $holiday = Holiday::find($id);
        if ($holiday) {
            $holiday->deleted_at = null;
            $holiday->save();
        }
        return redirect()->route('holiday-trash')->with('success', 'Holiday successfully restored!');
    }

    public function holidayDelete($id)
    {
        $holiday = Holiday::find($id);

        $holiday->delete();

        return redirect()->route('holiday-trash')->with('success', 'Holiday successfully permanently deleted!');
    }
}

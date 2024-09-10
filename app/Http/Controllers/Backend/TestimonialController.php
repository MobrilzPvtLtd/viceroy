<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;
use Carbon\Carbon;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::whereNull('deleted_at')->get();
        return view('backend.testimonial.index', compact('testimonials'));
    }
    public function create()
    {
        return view('backend.testimonial.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'company' => 'required',
            'description' => 'required',
            'rating' => 'required',
        ]);

        Testimonial::create($request->post());

        return redirect()->route('testimonial.index')->with('success', 'Testimonial has been created successfully.');
    }

    public function show()
    {
    }
    public function edit($id)
    {
        $testimonial = Testimonial::find($id);
        return view('backend.testimonial.edit', compact('testimonial'));
    }

    public function update(Request $request, Testimonial  $testimonial)
    {
        $request->validate([
            'name' => 'required',
            'company' => 'required',
            'description' => 'required',
            'rating' => 'required',
        ]);

        $testimonial->fill($request->post())->save();

        return redirect()->route('testimonial.index')->with('success', 'testimonial has been updated successfully.');
    }

    public function testimonialTrash() {
        $testimonials = Testimonial::onlyTrashed()->orderBy('deleted_at', 'desc')->get();

        return view("backend.testimonial.trash", compact('testimonials'));
    }

    public function destroy($id)
    {
        $testimonial = Testimonial::find($id);
        if ($testimonial) {
            $testimonial->deleted_at = Carbon::now();
            $testimonial->save();
        }
        return redirect()->route('testimonial.index')->with('success', 'Testimonials successfully deleted!');
    }

    public function testimonialRestore($id)
    {
        $testimonial = Testimonial::withTrashed()->find($id);

        if ($testimonial && $testimonial->trashed()) {
            $testimonial->restore();
            return redirect()->route('testimonial-trash')->with('success', 'Testimonial successfully restored!');
        }

        return redirect()->route('testimonial-trash')->with('error', 'Testimonial not found or already restored.');
    }

    public function testimonialDelete($id)
    {
        $testimonial = Testimonial::withTrashed()->find($id);

        if ($testimonial) {
            $testimonial->forceDelete();

            return redirect()->route('testimonial-trash')->with('success', 'Testimonial successfully permanently deleted!');
        }

        return redirect()->route('testimonial-trash')->with('error', 'Testimonial not found.');
    }
}

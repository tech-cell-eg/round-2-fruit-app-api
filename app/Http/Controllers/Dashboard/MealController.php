<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddMealRequest;
use App\Http\Requests\UpdateMealRequest;
use App\Models\Meal;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MealController extends Controller
{

    public function create() {
        $title = 'Add Meal';
        return view('Dashboard.add-meal', compact('title'));
    }

    public function store(AddMealRequest $request) {
        if (!$request->hasFile('image')) {
            return back()->with('error', 'Please upload an image');
        }
        $data = array_diff_key($request->validated(), array_flip(['image', '_token']));
        $data['image_url'] = $request->file('image')->store('images', 'public');
        $data['admin_id'] = Auth::id();
        if (Meal::create($data)) {
            return back()->with('success', 'Meal added successfully');
        }
        return back()->with('error', 'Something went wrong');
    }

    public function edit(Meal $meal) {
        $title = 'Edit Meal';
        return view('Dashboard.edit-meal', compact('title', 'meal'));
    }

    public function update(UpdateMealRequest $request, Meal $meal) {
        $data = array_diff_key($request->validated(), array_flip(['image', '_token']));
        if ($request->hasFile('image')) {
            if ($meal->image_url) {
                Storage::disk('public')->delete($meal->image_url);
            }
            $data['image_url'] = $request->file('image')->store('images', 'public');
        }
        $meal->update($data);
        return back()->with('success', 'Meal updated successfully.');
    }


    public function destroy(Meal $meal) {

        if ($meal->image_url) {
            Storage::disk('public')->delete($meal->image_url);
        }
        $meal->delete();
        return redirect()->route('dashboard.index')->with('success', 'Meal deleted successfully.');
    }


}

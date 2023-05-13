<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\AnimalCategory;
use Illuminate\Http\Request;

class AnimalCategoryController extends Controller
{
    public function AllAnimalCategory() {
        $animalcategory = AnimalCategory::latest()->get();
        return view('admin.animal_category.animal_category_all', compact('animalcategory'));
    }

    public function AddAnimalCategory() {
        return view('admin.animal_category.animal_category_add');
    }

    public function StoreAnimalCategory(Request $request) {

        $request->validate([
            'animal_category' => 'required',
        ], [
            'animal_category.required' => 'Animal Category Name is Required',
        ]);

        AnimalCategory::insert([
            'animal_category' => $request->animal_category,
        ]);
        $notification = array(
            'message' => 'Animal Category Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.animal.category')->with($notification);
    }

    public function EditAnimalCategory($id) {

        $animalcategory = AnimalCategory::findOrFail($id);
        return view('admin.animal_category.animal_category_edit', compact('animalcategory'));

    }

    public function UpdateAnimalCategory(Request $request, $id) {

        AnimalCategory::findOrFail($id)->update ([
            'animal_category' => $request->animal_category,
        ]);
        $notification = array(
            'message' => 'Animal Category Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.animal.category')->with($notification);

    }

    public function DeleteAnimalCategory($id) {

        AnimalCategory::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Animal Category Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }
}

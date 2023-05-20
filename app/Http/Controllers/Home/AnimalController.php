<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Animal;
use App\Models\AnimalCategory;
use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Carbon;


class AnimalController extends Controller
{
    public function AllAnimal()
    {
        $animals = Animal::latest()->get();
        return view('admin.animals.animals_all', compact('animals'));
    }

    public function AddAnimal()
    {
        $categories = AnimalCategory::orderBy('animal_category', 'ASC')->get();
        return view('admin.animals.animals_add', compact('categories'));
    }

    public function StoreAnimal(Request $request)
    {
        $image = $request->file('animal_image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

        Image::make($image)->resize(430, 327)->save('upload/animal/' . $name_gen);
        $save_url = 'upload/animal/' . $name_gen;

        Animal::insert([
            'animal_category_id' => $request->animal_category_id,
            'animal_title' => $request->animal_title,
            'animal_tags' => $request->animal_tags,
            'animal_description' => $request->animal_description,
            'animal_image' => $save_url,
            'created_at' => Carbon::now(),

        ]);
        $notification = array(
            'message' => 'Animal Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.animal')->with($notification);
    }

    public function EditAnimal($id)
    {

        $animals = Animal::findOrFail($id);
        $categories = AnimalCategory::orderBy('animal_category', 'ASC')->get();
        return view('admin.animals.animals_edit', compact('animals', 'categories'));
    }

    public function UpdateAnimal(Request $request)
    {

        $animal_id = $request->id;

        if ($request->file('animal_image')) {
            $image = $request->file('animal_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();  // 3434343443.jpg

            Image::make($image)->resize(430, 327)->save('upload/animal/' . $name_gen);
            $save_url = 'upload/animal/' . $name_gen;

            Animal::findOrFail($animal_id)->update([
                'animal_category_id' => $request->animal_category_id,
                'animal_title' => $request->animal_title,
                'animal_tags' => $request->animal_tags,
                'animal_description' => $request->animal_description,
                'animal_image' => $save_url,
                'created_at' => Carbon::now(),
            ]);
            $notification = array(
                'message' => 'Animal Updated with Image Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('all.gallery')->with($notification);
        } else {

            Animal::findOrFail($animal_id)->update([
                'animal_category_id' => $request->animal_category_id,
                'animal_title' => $request->animal_title,
                'animal_tags' => $request->animal_tags,
                'animal_description' => $request->animal_description,

            ]);
            $notification = array(
                'message' => 'Animal Updated without Image Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('all.animal')->with($notification);
        }
    }

    public function DeleteAnimal($id) {
        $animals = Animal::findOrFail($id);
        $img =  $animals->animal_image;
        unlink($img);
        Animal::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Animal Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function AnimalDetails($id) {
        $allanimals = Animal::latest()->limit(5)->get();
        $animals = Animal::findOrFail($id);
        $categories = AnimalCategory::orderBy('animal_category', 'ASC')->get();
        return view('frontend.animal_details', compact('animals','allanimals','categories'));
    }

    public function CategoryAnimal($id) {
      
        $animalpost = Animal::where('animal_category_id',$id)->orderBy('id','DESC')->get();
        $allanimals = Animal::latest()->limit(5)->get();
        $categories = AnimalCategory::orderBy('animal_category', 'ASC')->get();
        $categoryname = AnimalCategory::findOrFail($id);
        return view('frontend.cat_animal_details', compact('animalpost','allanimals','categories','categoryname'));
    }

    public function HomeAnimal() {
        $categories = AnimalCategory::orderBy('animal_category', 'ASC')->get();
        $allanimals = Animal::latest()->get();
        return view('frontend.animal', compact('allanimals','categories'));
    }
}

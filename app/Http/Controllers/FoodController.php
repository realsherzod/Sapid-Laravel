<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $foods = Food::all();
        return view('Food.index', compact('foods'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('Food.create' , compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'category_id' => 'required',
            'title_uz' => 'required',
            'title_ru' => 'required',
            'title_en' => 'required',
            'description_uz' => 'required',
            'description_ru' => 'required',
            'description_en' => 'required',
            'price' => 'required',
            'image' => 'required|image|mimes:png,jpg',
                ]);
        
                if($request->hasFile('image')){
                    $path = $request->file('image')->store("foods", 'public');
                }
                
                $requestData = $request->all();
                $requestData['image'] = $path;
                Food::create($requestData);
        
                return redirect()->route('foods.index')->with('success', trans('words.added'));
        
            
            }

    /**
     * Display the specified resource.
     */
    public function show(Food $food)
    {
        $categories = Category::all();
        return view('Food.show', compact('food','categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($food)
    {
        $categories = Category::all();
        $foods = Food::findOrFail($food);
        return view('Food.edit', compact('foods', 'categories'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Food $food)
    {
        $this->validate($request, [
            'category_id' => 'required',
            'title_uz' => 'required',
            'title_ru' => 'required',
            'title_en' => 'required',
            'description_uz' => 'required',
            'description_ru' => 'required',
            'description_en' => 'required',
            'price' => 'required',
            'image' => 'image|mimes:png,jpg', // Validate image conditionally
        ]);
    
        $requestData = $request->all();
    
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if (File::exists(storage_path("app/public/{$food->image}"))) {
                File::delete(storage_path("app/public/{$food->image}"));
            }
    
            // Store the new image
            $path = $request->file('image')->store("rooms", 'public');
            $requestData['image'] = $path;
        } else {
            $requestData['image'] = $food->image; // Keep the existing image
        }
    
        $food->update($requestData);
    
        return redirect()->route('foods.index')->with('warning', trans('words.edited'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $foods = Food::find($id);
        $foods->delete();
        return redirect()->route('foods.index')->with('danger', trans('words.delete1'));
    }
}

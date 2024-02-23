<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Food;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('Category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $this->validate($request, [
            'name_uz' => 'required',
            'name_ru' => 'required',
            'name_en' => 'required',
        ]);
        $requestData = $request->all();
        Category::create($requestData);

        return redirect()->route('categories.index')->with('success', trans('words.added'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('Category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($category)
    {
        $categories = Category::find($category);
        return view('Category.edit', compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $this->validate($request, [
            'name_uz' => 'required',
            'name_ru' => 'required',
            'name_en' => 'required',
        ]);
        $requestData = $request->all();
        $category->update($requestData);

        return redirect()->route('categories.index')->with('warning', trans('words.edited'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categories = Category::find($id);
        $categories->delete();
        return redirect()->route('categories.index')->with('danger', trans('words.delete1'));

    }
}

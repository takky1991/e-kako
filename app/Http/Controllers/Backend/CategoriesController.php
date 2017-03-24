<?php

namespace App\Http\Controllers\Backend;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\NewCategoryForm;

class CategoriesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

        return view('backend/category/index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend/category/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewCategoryForm $request)
    {
        $category = Category::create([
            'name' => $request->name,
            'slug' => str_slug($request->name, '-'),
            'description' => $request->description
        ]);

        flashSuccess('Uspjesno ste kreirali kategoriju ' . $category->name . '.');
        return redirect(route('categories.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('backend/category/edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NewCategoryForm $request, Category $category)
    {
        $category->update([
            'name' => $request->name,
            'slug' => str_slug($request->name, '-'),
            'description' => $request->description
        ]);

        flashSuccess('Uspjesno ste izmjenili kategoriju ' . $category->name . '.');
        return redirect(route('categories.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {   
        if(!$category->posts->isEmpty()) {
            flashError('Nije moguće obrisati kategoriju jer postoje postovi te kategorije.');
            return back();
        }

        $name = $category->name;
        $category->delete();
        flashSuccess('Uspjesno ste obrisali kategoriju ' . $name . '.');
        return back();
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categories = Category::orderByDesc('id')->get();

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        DB::transaction(function () use ($request) {
            $validated = $request->validated();

            // Periksa apakah file icon ada
            if ($request->hasFile('icon')) {
                // Simpan file icon dan ambil path-nya
                $iconPath = $request->file('icon')->store('icons', 'public');
                $validated['icon'] = $iconPath;
            } else {
                // Gunakan path default jika file icon tidak ada
                $validated['icon'] = 'images/avatar-default.png'; // Perbaiki path default
            }

            // Buat slug dan simpan kategori
            $validated['slug'] = Str::slug($validated['name']);
            Category::create($validated);
        });

        return redirect()->route('admin.categories.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
        return view('admin.categories.edit', compact('category'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        //
        DB::transaction(function () use ($request, $category){

            $validated = $request->validated();
            
            if ($request->hasFile('icon')) {
                # code...
                $iconPath = $request->file('icon')->store('icons','public');
                $validated['icon'] = $iconPath;
            }

            $validated['slug'] = Str::slug($validated['name']);
            $category->update($validated);
        });

            return redirect()->route('admin.categories.index');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
        DB::beginTransaction();

        try {
            //code...
            $category->delete();
            DB::commit();

            return redirect()->route('admin.categories.index');
        } catch (\Exception $th) {
            //throw $th;
            DB::rollBack();

            return redirect()->route('admin.categories.index')->with('Eror', 'Eror Category Not Found');
        }
    }
}

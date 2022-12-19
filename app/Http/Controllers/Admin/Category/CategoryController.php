<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreRequest;
use App\Http\Requests\Admin\Category\UpdateRequest;
use App\Models\Category;


class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::paginate(10);

        return view('admin.category.index', compact('category'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(StoreRequest $request)
    {
        $data= $request->validated();
        Category::firstOrcreate($data); // Используется first для создания только уникальных значений, при этом у можно развёрнуто делать с разными условиями

        return redirect()->route('admin.category.index');
    }

    public function show(Category $category)
    {
        return view('admin.category.show', compact('category'));
    }

    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    public function update(UpdateRequest $request, Category $category)
    {

        $data = $request->validated();
        $category->update($data);

        return redirect()->route('admin.category.show', compact('category'));
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('admin.category.index',compact('category'));
    }

}



<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategorytRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class CategoryController extends Controller
{

    public function index(): View
    {
        $categories = Category::with('lots')->paginate(5);

        Session::put('categories_url', request()->fullUrl());

        return view('categories.index', compact('categories'));
    }

    public function create(): View
    {
        return view('categories.create');
    }


    public function store(StoreCategorytRequest $request): RedirectResponse
    {
        Category::create($request->validated());

        if (session('categories_url')) {
            return redirect(session('categories_url'))->with('status', 'Category added successfully !!!');
        }

        return to_route('categories.index')->with('status', 'Category added successfully !!!');
    }

    public function show(Category $category): View
    {
        return view('categories.show', compact('category'));
    }

    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }


    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->update($request->validated());

        if (session('categories_url')) {
            return redirect(session('categories_url'))->with('status', 'Category updated successfully !!!');
        }

        return to_route('categories.index', $category->id)->with('status', 'Category updated successfully !!!');
    }


    public function destroy(Category $category)
    {
        $category->lots()->detach();
        $category->delete();

        if (session('categories_url')) {
            return redirect(session('categories_url'))->with('status', 'Category deleted successfully !!!');
        }

        return to_route('categories.index')->with('status', 'Category deleted successfully !!!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Lot;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LotController extends Controller
{

    public function index(): View
    {
        $lots = Lot::with('categories')
            ->paginate(5);

        return view('lots.index', compact('lots'));
    }

    public function create():View
    {
        $categories = Category::with('lots')->get();

        return view('lots.create', compact('categories'));
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLotRequest;
use App\Http\Requests\UpdateLotRequest;
use App\Models\Category;
use App\Models\Lot;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;
use ProtoneMedia\LaravelCrossEloquentSearch\Search;

class LotController extends Controller
{

    public function index(): View
    {
        $lots = Lot::with('categories')
            ->paginate(5);

        Session::put('lots_url', request()->fullUrl());

        return view('lots.index', compact('lots'));
    }

    public function create(): View
    {
        $categories = Category::with('lots')->get();

        return view('lots.create', compact('categories'));
    }

    public function store(StoreLotRequest $request): RedirectResponse
    {
        $lot = Lot::create($request->validated());
        $lot->categories()->attach($request->category);

        if(session('lots_url')){
            return redirect(session('lots_url'))->with('status', 'Lot added successfully !!!');
        }

        return to_route('lots.index')->with('status', 'Lot added successfully !!!');
    }

    public function show(Lot $lot): View
    {
        return view('lots.show', compact('lot'));
    }


    public function edit(Lot $lot): View
    {
        $categories = Category::all();

        return view('lots.edit', compact('lot', 'categories'));
    }


    public function update(UpdateLotRequest $request, Lot $lot): RedirectResponse
    {
        $lot->update($request->validated());
        $lot->categories()->sync($request->category);

        if(session('lots_url')){
            return redirect(session('lots_url'))->with('status', 'Lot updated successfully !!!');
        }

        return to_route('lots.index', $lot->id)->with('status', 'Lot updated successfully !!!');
    }


    public function destroy(Lot $lot): RedirectResponse
    {
        $lot->categories()->detach();
        $lot->delete();

        if(session('lots_url')){
            return redirect(session('lots_url'))->with('status', 'Lot deleted successfully !!!');
        }

        return to_route('lots.index')->with('status', 'Lot deleted successfully !!!');
    }

    public function searchByCategory(Request $request):View
    {
        $lots = Search::new()
            ->add(Lot::with('categories'), 'categories.name','name')
            ->paginate( 10)

            ->search(request('search'));
        $lots->appends($request->query());
//        dd($lots);
        return view('search', compact('lots'));
    }
}

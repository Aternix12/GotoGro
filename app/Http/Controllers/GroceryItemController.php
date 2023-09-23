<?php

namespace App\Http\Controllers;

use App\Models\GroceryItem;
use Illuminate\Http\Request;

class GroceryItemController extends Controller
{
    public function index()
    {
        $groceryItems = GroceryItem::all();
        return view('items.index', compact('groceryItems'));
    }

    public function create()
    {
        return view('items.create');
    }

    public function store(Request $request)
    {
        GroceryItem::create($request->all());
        return redirect()->route('items.index');
    }

    public function show(GroceryItem $item)
    {
        return view('items.show', compact('item'));
    }

    public function edit(GroceryItem $item)
    {
        return view('items.edit', compact('item'));
    }

    public function update(Request $request, GroceryItem $item)
    {
        $item->update($request->all());
        return redirect()->route('items.index');
    }

    public function destroy(GroceryItem $item)
    {
        $item->delete();
        return redirect()->route('items.index');
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('query');
        $items = GroceryItem::where('ProductName', 'LIKE', '%' . $searchTerm . '%')
            ->get();
        return response()->json($items);
    }
}

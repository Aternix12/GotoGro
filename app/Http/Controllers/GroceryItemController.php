<?php

namespace App\Http\Controllers;

use App\Models\GroceryItem;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Department;
use App\Rules\Price;

class GroceryItemController extends Controller
{
    public function index()
    {
        $groceryItems = GroceryItem::all();
        return view('items.index', compact('groceryItems'));
    }

    public function create()
    {
        $categories = Category::all();
        $departments = Department::all();

        return view('items.create', compact('categories', 'departments'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'ProductName' => 'required|string|max:64',
            'Stock' => 'required|numeric|max:9999999999',
            'Price' => ['required', new Price],
        ], [
            'Stock.max' => "The stock field must not be larger than 10 digits."
        ]);

        // dd($validatedData);

        $groceryItem = new GroceryItem($request->all());
        $category = Category::find($request->CategoryID);
        $department = Department::find($request->DepartmentID);
        $groceryItem->category()->associate($category);
        $groceryItem->department()->associate($department);
        $groceryItem->save();

        return redirect()->route('items.index');
    }

    public function show(GroceryItem $item)
    {
        $categories = Category::all();
        $departments = Department::all();
        return view('items.show', compact('item', 'categories', 'departments'));
    }

    public function update(Request $request, GroceryItem $item)
    {
        $item->update($request->all());

        $category = Category::find($request->CategoryID);
        $department = Department::find($request->DepartmentID);
        $item->category()->associate($category);
        $item->department()->associate($department);
        $item->save();

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

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Items;
use App\Models\SubCategory;
use App\Models\Tax;
use Illuminate\Http\Request;

class ItemsController extends Controller
{

    public function showItems()
    {
        $items = Items::with(['category', 'subcategory', 'interstateTax', 'intrastateTax'])->get();
        // return $items;
        return view('items/showItems', ['items' => $items]);
    }
    // Add Items form 
    public function createItems()
    {
        $category = Category::get();
        $taxes = Tax::get();
        return view('items/addItems', ['categories' => $category, 'taxes' => $taxes]);
    }

    // Store Item
    public function storeItem(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',

            'description' => 'nullable|string',

            'category_id' => 'required|exists:category,id',
            'subcategory_id' => 'required|exists:subcategory,id',


            'interstate_tax_id' => 'required|min:0|max:100',
            'intrastate_tax_id' => 'required|min:0|max:100',
        ], [
            'name.required' => 'Please enter item name',
            'price.required' => 'Please enter item price',
            'category_id.required' => 'Please select category',
            'subcategory_id.required' => 'Please select subcategory',
            'interstate_tax_id.required' => 'Please select interstate tax',
            'intrastate_tax_id.required' => 'Please select intrastate tax',


        ]);

        // Check for duplicate entry (based on name + category + subcategory)
        $exists = Items::where('name', $validated['name'])
            ->where('category_id', $validated['category_id'])
            ->when($validated['subcategory_id'], function ($query, $subcategory_id) {
                return $query->where('subcategory_id', $subcategory_id);
            })
            ->exists();

        if ($exists) {
            return redirect()->back()->with('error', 'Item with the same name already exists in this category/subcategory.')->withInput();
        }


        // If validation passes, insert the data
        Items::create($validated);
        return redirect()->back()->with('success', 'Item added successfully!');
    }


    //select  based on category 
    public function getSubcategories($category_id)
    {
        $subcategories = Subcategory::where('category_id', $category_id)->get();
        return response()->json($subcategories);
    }

    // edit Items 
    public function editItem(Request $request, $Id)
    {

        $id = decrypt($Id);
        $items = Items::with(['category', 'subcategory'])->findOrFail($id);
        $taxes = Tax::get();
        $category = Category::get();
        // return $items;  //for testing
        return view('items/editItems', ['items' => $items, 'categories' => $category, 'taxes' => $taxes]);
    }

    // Update Item
    public function updateItem(Request $request, $Id)
    {
        $id = decrypt($Id);
        $item = Items::findOrFail($id);

        // Validate inputs
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:category,id',
            'subcategory_id' => 'required|exists:subcategory,id',
            'interstate_tax_id' => 'nullable|exists:taxes,id',
            'intrastate_tax_id' => 'nullable|exists:taxes,id',
        ], [
            'name.required' => 'The item name is required.',
            'price.required' => 'Please enter a price.',
            'price.numeric' => 'Price must be a number.',
            'category_id.required' => 'Please select a category.',
            'category_id.exists' => 'The selected category is invalid.',
            'subcategory_id.required' => 'Please select a subcategory.',
            'subcategory_id.exists' => 'The selected subcategory is invalid.',
            'interstate_tax_id.exists' => 'Selected interstate tax is invalid.',
            'intrastate_tax_id.exists' => 'Selected intrastate tax is invalid.',
        ]);

        //  Check for duplicate (excluding current item)
        $duplicate = Items::where('name', $validated['name'])
            ->where('category_id', $validated['category_id'])
            ->where('subcategory_id', $validated['subcategory_id'])
            ->where('id', '!=', $id) // exclude current record
            ->exists();

        if ($duplicate) {
            return redirect()->back()
                ->withErrors(['name' => 'An item with the same name already exists in this category and subcategory.'])
                ->withInput();
        }


        // Update the item
        $item->update($validated);
        return redirect()->back()->with('success', 'Item updated successfully!')->withInput();
    }
}
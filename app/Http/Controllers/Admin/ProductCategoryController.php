<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class ProductCategoryController extends Controller
{
    public function index()
    {
        $categories = ProductCategory::with('parent')->orderBy('order')->paginate(10);
        return view('admin.product-categories.index', compact('categories'));
    }

    public function create()
    {
        $parentCategories = ProductCategory::where('status', 'active')->orderBy('name')->get();
        return view('admin.product-categories.create', compact('parentCategories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'parent_id' => 'nullable|exists:product_categories,id',
            'order' => 'nullable|integer',
            'status' => 'required|in:active,inactive',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'meta_keywords' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('product-categories', 'public');
            $validated['image'] = $imagePath;
        }

        ProductCategory::create($validated);

        Alert::success('Success', 'Product category created successfully.');
        return redirect()->route('admin.product-categories.index');
    }

    public function edit(ProductCategory $productCategory)
    {
        $parentCategories = ProductCategory::where('id', '!=', $productCategory->id)
            ->where('status', 'active')
            ->orderBy('name')
            ->get();
            
        return view('admin.product-categories.edit', compact('productCategory', 'parentCategories'));
    }

    public function update(Request $request, ProductCategory $productCategory)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'parent_id' => 'nullable|exists:product_categories,id',
            'order' => 'nullable|integer',
            'status' => 'required|in:active,inactive',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'meta_keywords' => 'nullable|string|max:255',
        ]);

        // Prevent category from being its own parent
        if ($request->parent_id == $productCategory->id) {
            $validated['parent_id'] = null;
        }

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($productCategory->image) {
                Storage::disk('public')->delete($productCategory->image);
            }
            
            $imagePath = $request->file('image')->store('product-categories', 'public');
            $validated['image'] = $imagePath;
        }

        $productCategory->update($validated);

        Alert::success('Success', 'Product category updated successfully.');
        return redirect()->route('admin.product-categories.index');
    }

    public function destroy(ProductCategory $productCategory)
    {
        // Check if category has products
        if ($productCategory->products()->count() > 0) {
            Alert::error('Error', 'Cannot delete category with associated products.');
            return redirect()->route('admin.product-categories.index');
        }
        
        // Check if category has children
        if ($productCategory->children()->count() > 0) {
            Alert::error('Error', 'Cannot delete category with subcategories.');
            return redirect()->route('admin.product-categories.index');
        }

        // Delete image if exists
        if ($productCategory->image) {
            Storage::disk('public')->delete($productCategory->image);
        }
        
        $productCategory->delete();

        Alert::success('Success', 'Product category deleted successfully.');
        return redirect()->route('admin.product-categories.index');
    }
}

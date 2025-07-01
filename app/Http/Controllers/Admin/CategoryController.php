<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with(['parent', 'children'])->paginate(10);
        $totalCategories = Category::count();
        $activeCategories = Category::where('status', 'active')->count();
        $subcategories = Category::whereNotNull('parent_category_id')->count();
        
        return view('admin.categories.index', compact(
            'categories',
            'totalCategories',
            'activeCategories',
            'subcategories'
        ));
    }
    /**
     * Show the form for creating a new category.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.categories.create', compact('categories'));
    }

    /**
     * Store a newly created category in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'parent_category_id' => 'nullable|exists:categories,id',
            'status' => 'required|in:active,inactive'
        ]);
        Category::create($validated);

        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'Category created successfully.');
    }

    /**
     * Display the specified category.
     */
    public function show(Category $category)
    {
        return view('admin.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified category.
     */
    public function edit(Category $category)
    {
        $categories = Category::where('id', '!=', $category->id)->get();
        return view('admin.categories.edit', compact('category', 'categories'));
    }

    /**
     * Update the specified category in storage.
     */
    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'category_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'parent_category_id' => 'nullable|exists:categories,id',
            'status' => 'required|in:active,inactive'
        ]);

        $category->update($validated);

        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified category from storage.
     */
    public function destroy(Category $category)
    {
        // Check if category has children
        if ($category->children()->count() > 0) {
            return redirect()
                ->route('admin.categories.index')
                ->with('error', 'Cannot delete category with subcategories.');
        }

        // Check if category has products
        if ($category->products()->count() > 0) {
            return redirect()
                ->route('admin.categories.index')
                ->with('error', 'Cannot delete category with associated products.');
        }

        $category->delete();

        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'Category deleted successfully.');
    }

     /**
     * Display a listing of trashed (soft deleted) categories.
     */
    public function trashed()
    {
        $trashedCategories = Category::onlyTrashed()->with(['parent', 'children'])->paginate(10);
        return view('admin.categories.trashed', compact('trashedCategories'));
    }
    
    /**
     * Restore a specific trashed category.
     */
    public function restore($id)
    {
        $category = Category::onlyTrashed()->findOrFail($id);
        $category->restore();

        return redirect()
            ->route('admin.categories.trashed')
            ->with('success', 'Category restored successfully.');
    }

    /**
     * Restore all trashed categories.
     */
    public function restoreAll()
    {
        Category::onlyTrashed()->restore();

        return redirect()
            ->route('admin.categories.trashed')
            ->with('success', 'All categories restored successfully.');
    }

    /**
     * Permanently delete all trashed categories.
     */
    public function forceDeleteAll()
    {
        Category::onlyTrashed()->forceDelete();

        return redirect()
            ->route('admin.categories.trashed')
            ->with('success', 'All trashed categories permanently deleted.');
    }

    /**
     * Permanently delete a specific trashed category.
     */
    public function forceDelete($id)
    {
        $category = Category::onlyTrashed()->findOrFail($id);
        $category->forceDelete();

        return redirect()
            ->route('admin.categories.trashed')
            ->with('success', 'Category permanently deleted.');
    }
}

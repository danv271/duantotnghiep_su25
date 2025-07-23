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
            ->with('Thành công', 'Danh mục được tạo thành công.');
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
            ->with('Thành công', 'Danh mục được cập nhật thành công.');
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
                ->with('Lỗi', 'Không thể xóa danh mục có danh mục con.');
        }

        // Check if category has products
        if ($category->products()->count() > 0) {
            return redirect()
                ->route('admin.categories.index')
                ->with('Lỗi', 'Không thể xóa danh mục có sản phẩm liên quan.');
        }

        $category->delete();

        return redirect()
            ->route('admin.categories.index')
            ->with('Thành công', 'Đã xóa danh mục thành công.');
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
            ->with('Thành công', 'Đã khôi phục danh mục thành công.');
    }

    /**
     * Restore all trashed categories.
     */
    public function restoreAll()
    {
        Category::onlyTrashed()->restore();

        return redirect()
            ->route('admin.categories.trashed')
            ->with('Thành công', 'Tất cả các danh mục được khôi phục thành công.');
    }

    /**
     * Permanently delete all trashed categories.
     */
    public function forceDeleteAll()
    {
        Category::onlyTrashed()->forceDelete();

        return redirect()
            ->route('admin.categories.trashed')
            ->with('Thành công', 'Tất cả các danh mục đã xóa sẽ bị xóa vĩnh viễn.');
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
            ->with('Thành công', 'Danh mục bị xóa vĩnh viễn.');
    }
}

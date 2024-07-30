<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with('parent')->where('status', 1)->get()->map(function ($category) {
            $category->full_path = $this->getCategoryPath($category);
            return $category;
        });
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('categories.create', ['categories' => $this->getCategoryDropdownList($categories)]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|in:1,2',
            'parent_id' => 'nullable|exists:categories,category_id',
        ]);

        Category::create($request->all());

        return redirect()->route('categories.index');
    }

 public function edit($id)
{
    $category = Category::findOrFail($id);

    $categories = Category::where('category_id', '<>', $id)
        ->pluck('name', 'category_id'); 

    $categoryPaths = $categories->mapWithKeys(function ($name, $categoryId) {
        $category = Category::find($categoryId);
        $path = $this->getCategoryPath($category);
        return [$categoryId => $path];
    });

    return view('categories.edit', compact('category', 'categoryPaths'));
}

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|in:1,2',
            'parent_id' => 'nullable|exists:categories,category_id',
        ]);

        $category->update($request->all());

        return redirect()->route('categories.index');
    }

    public function destroy(Category $category)
    {
        DB::transaction(function () use ($category) {
            // Reassign child categories
            $children = $category->children;
            $parent_id = $category->parent_id;

            foreach ($children as $child) {
                $child->update(['parent_id' => $parent_id]);
            }

            $category->delete();
        });

        return redirect()->route('categories.index');
    }

 private function getCategoryPath($category)
{
    $path = $category->name;
    while ($category->parent_id) {
        $category = Category::find($category->parent_id);
        $path = $category->name . ' > ' . $path;
    }
    return $path;
}

    private function getCategoryDropdownList($categories)
    {
        $dropdown = [];
        foreach ($categories as $category) {
            $dropdown[$category->category_id] = $this->getCategoryPath($category);
        }
        return $dropdown;
    }


}

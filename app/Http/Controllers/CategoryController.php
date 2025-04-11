<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    //
    public function index(Request $request)
    {
        // Fetch all categories
        $categories = Category::paginate(5);

        if ($request->ajax()) {
            return response()->json([
                'data' => $categories->items(),
                'current_page' => $categories->currentPage(),
                'last_page' => $categories->lastPage(),
                'total' => $categories->total(),
                'from' => $categories->firstItem(),
                'to' => $categories->lastItem(),
            ]);
        }   

        return view('admin.club.categories.index', compact('categories'));
    }

    public function store(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
        ]);

        // Create a new category
        $category = Category::create($validatedData);

        return response()->json([
            'success' => 'Employee saved successfully!',
            'category' => $category,
        ]);
    }

    public function update(Request $request, Category $category)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $category->update($validator->validated());

        return response()->json(['success' => 'Category updated successfully!', 'category' => $category]);
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('super_admin.categories.index')->with('success', 'Category deleted successfully!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Category;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(3);

        return view('category.index',compact('categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('category.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $category = new Category();
        $category->name = $request['name'];
        $category->save();
        return redirect()->route('category.index')->with('success', 'Thêm thành công!');

    }
    public function edit($id)
    {
        $categories = Category::find($id);
        return view('category.edit', compact('categories'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->name = $request->name;
        $category->save();

        return redirect()->route('category.index')->with('success', 'Sửa thành công!');
    }
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('category.index')->with('success', 'Xóa thành công!');
    }
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $categories = Category::where('name', 'LIKE', "%$keyword%")->paginate(3);
        return view('category.index', compact('categories'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ProductRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProductController extends Controller
{
    public function index()
    {
        try {
            $products = Product::with('category')->latest('created_at')->paginate(10);
            $startingNumber = ($products->currentPage() - 1) * $products->perPage() + 1;

            return view('product.index', compact('products', 'startingNumber'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Đã xảy ra lỗi khi tải danh sách sản phẩm: ' . $e->getMessage());
        }
    }

    public function create()
    {
        try {
            // $this->authorize('create', Product::class);

            $categories = Category::all();
            $products = Product::all();
            return view('product.create', compact('products', 'categories'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Đã xảy ra lỗi khi tạo sản phẩm: ' . $e->getMessage());
        }
    }

    public function store(ProductRequest $request)
    {
        try {
            $product = new Product();
            $product->name = $request->name;
            $product->price = $request->price;
            $product->description = $request->description;
            $product->description_ct = $request->description_ct;
            $product->quantity = $request->quantity;
            $product->status = $request->status;
            $product->category_id = $request->category_id;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $path = 'admin/uploads/product';
                $newImageName = $image->getClientOriginalName();
                $newImageName = pathinfo($newImageName, PATHINFO_FILENAME) . '_' . time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path($path), $newImageName);
                $product->image = $newImageName;
            }
            $product->save();

            if ($product->quantity == 0) {
                // Hiển thị thông báo "Hết hàng" hoặc thực hiện các hành động khác khi hết hàng
                return redirect()->back()->with('error', 'Hết hàng');
            }

            return redirect()->route('product.index')->with('success', 'Thêm thành công!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Đã xảy ra lỗi khi lưu sản phẩm: ' . $e->getMessage());
        }
    }

    public function trash()
    {
        try {
            $products = Product::onlyTrashed()->paginate(3);
            $param = ['products' => $products];
            return view('product.trash', $param);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Đã xảy ra lỗi khi tải danh sách sản phẩm đã xóa: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        try {
            if (!$id) {
                throw new \Exception('Không có ID sản phẩm được cung cấp.');
            }

            $product = Product::findOrFail($id);

            $categories = Category::all();

            return view('product.edit', compact('product', 'categories'));
        } catch (\Exception $e) {
            return redirect()->route('product.index')->with('error', 'Đã xảy ra lỗi khi chỉnh sửa sản phẩm: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $product = Product::find($id);
            $product->name = $request->name;
            $product->price = $request->price;
            $product->description = $request->description;
            $product->description_ct = $request->description_ct;
            $product->quantity = $request->quantity;
            $product->status = $request->status;
            $product->category_id = $request->category_id;
            $get_image = $request->image;
            if ($get_image) {
                $path = 'admin/uploads/product' . $product->image;
                if (file_exists($path)) {
                    unlink($path);
                }
                $path = 'admin/uploads/product';
                $get_name_image = $get_image->getClientOriginalName();
                $name_image = current(explode('.', $get_name_image));
                $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
                $get_image->move($path, $new_image);
                $product->image = $new_image;
            }
            $product->save();

            return redirect()->route('product.index')->with('success', 'Cập nhật thành công!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Đã xảy ra lỗi khi cập nhật sản phẩm: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $this->authorize('forceDelete', Product::class);
            $product = Product::onlyTrashed()->findOrFail($id);
            $product->forceDelete();
            return redirect()->route('product.index')->with('success', 'Xoá thành công!');
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Không tìm thấy sản phẩm có ID: ' . $id);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Đã xảy ra lỗi khi xoá sản phẩm: ' . $e->getMessage());
        }
    }
    public function search(Request $request)
    {
        $name = $request->input('name');
        $status = $request->input('status');
        $category = $request->input('category');

        $products = Product::query()
            ->when($name, function ($query) use ($name) {
                $query->where('name', 'like', "%$name%");
            })
            ->when($status, function ($query) use ($status) {
                if ($status === 'active') {
                    $query->where('quantity', '>', 0); // Kiểm tra số lượng > 0 để đảm bảo còn hàng
                } elseif ($status === 'inactive') {
                    $query->where('quantity', '=', 0); // Kiểm tra số lượng = 0 để đảm bảo hết hàng
                }
            })
            ->when($category, function ($query) use ($category) {
                $query->whereHas('category', function ($q) use ($category) {
                    $q->where('name', $category);
                });
            })
            ->get();

        return view('product.index', compact('products'));
    }
    public  function deleteProduct($id)
    {
        $this->authorize('delete', Product::class);
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $product = Product::findOrFail($id);
        $product->deleted_at = date("Y-m-d h:i:s");
        $product->save();
        return redirect()->route('product.index');
    }
    public function restoreProduct($id)
    {
        // $this->authorize('restore', Category::class);
        $products = Product::withTrashed()->where('id', $id);
        $products->restore();
        return redirect()->route('product.trash');
    }
}

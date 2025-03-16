<?php
namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->get();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'product_description' => 'required',
            'product_price' => 'required|numeric|min:0',
            'product_image' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'category_id' => 'required|exists:categories,id'
        ]);

        $data = $request->except('product_image');
        if ($request->hasFile('product_image')) {
            $file = $request->file('product_image');
            $fileName = time().'_'.$file->getClientOriginalName();
            $filePath = 'uploads/images/'; // Directory inside public/storage

            // Store the image in the storage/app/public/uploads/images directory
            $path = $file->storeAs($filePath, $fileName, 'public');
            echo $fileName,$path,'test';
            $data['product_image']=$fileName;
        }
    
        Product::create($data);
        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'product_description' => 'required',
            'product_price' => 'required|numeric|min:0',
            'product_image' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'category_id' => 'required|exists:categories,id'
        ]);
       
        $data = $request->except('image');
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('product_images', 'public');
        }

        $product->update($data);
        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}

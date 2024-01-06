<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;
use App\Models\CarModel;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::orderBy('created_at', 'asc')->get();
        $brands = Brand::all();
        $models = CarModel::all();


        return view('admin.productlist',compact('products', 'brands','models'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.productlist');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // Form verilerini al
            $data = $request->validate([
                'title' => 'required|string|max:255',
                'brand' => 'required',
                'model' => 'required',
                'year' => 'required',
                'kms' => 'required',
                'engine' => 'required',
                'carType' => 'required',
                'horsePower' => 'required',
                'color' => 'required',
                'description' => 'required',
                'price' => 'required',
                'image' => 'required',
            ]);
    
    // Ürünü oluştur ve veritabanına kaydet
            Product::create($data);
    
            // Kullanıcı oluşturulduktan sonra ürün sayfasına yönlendir
            return redirect()->route('admin.productlist')->with('success', 'Kullanıcı başarıyla oluşturuldu.');
        } catch (\Exception $e) {
            // Kullanıcı oluşturma sırasında bir hata oluşursa
            return redirect()->back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $products = Product::findOrFail($id);

        // Edit view'ini göster
        return view('admin.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'brand' => 'required',
            'model' => 'required',
            'year' => 'required',
            'kms' => 'required',
            'engine' => 'required',
            'carType' => 'required',
            'horsePower' => 'required',
            'color' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => 'required',
        ]);

        $product = Product::findOrFail($id);

        $product->update([
            'title' => $request->input('title'),
            'brand' => $request->input('brand'),
            'year' => $request->input('year'),
            'model' => $request->input('model'),
            'kms' => $request->input('kms'),
            'engine' => $request->input('engine'),
            'carType' => $request->input('carType'),
            'horsePower' => $request->input('horsePower'),
            'color' => $request->input('color'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'image' => $request->input('image'),
        ]);

        return redirect()->route('products.index')->with('success', 'Ürün başarıyla güncellendi.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);

        // Kullanıcıyı sil
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Kullanıcı başarıyla silindi.');
    }
}

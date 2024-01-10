<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CarModel;
use App\Models\Brand;


class ModelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $models = CarModel::all();
        $brands = Brand::all();

        return view('admin.modellist', compact('models', 'brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.modellist');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // Form verilerini al
            $data = $request->validate([
                'name' => 'required|string|max:255',
                'brand' => 'required',
            ]);
    
            // İsimle belirtilen markanın ID'sini al
            $brand = Brand::where('name', $data['brand'])->first();
    
            // Markanın varlığını kontrol et
            if (!$brand) {
                throw new \Exception('Seçilen marka mevcut değil.');
            }
    
            CarModel::create($data);
    
            // Kullanıcı oluşturulduktan sonra model sayfasına yönlendir
            return redirect()->route('admin.modellist')->with('success', 'Model başarıyla oluşturuldu.');
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
        $models = CarModel::findOrFail($id);

        // Edit view'ini göster
        return view('admin.modellist.edit', compact('models'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'brand' => 'required',
        ]);

        $models = CarModel::findOrFail($id);

        $models->update([
            'name' => $request->input('name'),
            'brand' => $request->input('brand'),

        ]);

        return redirect()->route('admin.modellist')->with('success', 'Kullanıcı başarıyla güncellendi.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $models = CarModel::findOrFail($id);

        // Kullanıcıyı sil
        $models->delete();

        return redirect()->route('admin.modellist')->with('success', 'Kullanıcı başarıyla silindi.');    
    }

    use App\Models\Product;
    
    }

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\CarModel;


class CarController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
    
        return view('admin.brand', ['brands' => $brands]);    
    }

    public function create()
    {
        return view('admin.brand');
    }

    public function store(Request $request)
        {
            try {
                // Form verilerini al
                $data = $request->validate([
                    'name' => 'required|string|max:255',
                ]);
        
        // Ürünü oluştur ve veritabanına kaydet
                Brand::create($data);
        
                // Kullanıcı oluşturulduktan sonra ürün sayfasına yönlendir
                return redirect()->route('admin.brand')->with('success', 'Marka başarıyla oluşturuldu.');
            } catch (\Exception $e) {
                // Kullanıcı oluşturma sırasında bir hata oluşursa
                return redirect()->back()->withInput()->withErrors(['error' => $e->getMessage()]);
            }
        }    

    public function edit($id)
    {
        $brands = Brand::findOrFail($id);

        // Edit view'ini göster
        return view('admin.brand.edit', compact('brands'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $brands = Brand::findOrFail($id);

        $brands->update([
            'name' => $request->input('name'),

        ]);

        return redirect()->route('admin.brand')->with('success', 'Kullanıcı başarıyla güncellendi.');
    }

    public function destroy($id)
    {
        $brands = Brand::findOrFail($id);

        // Kullanıcıyı sil
        $brands->delete();

        return redirect()->route('admin.brand')->with('success', 'Kullanıcı başarıyla silindi.');    }
}

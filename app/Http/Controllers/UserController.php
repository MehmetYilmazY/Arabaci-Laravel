<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('created_at', 'asc')->get();
    
        return view('admin.userlist', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.userlist');

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
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|min:8',
                'userType' => 'required|in:user,admin',
            ]);
    
            // Şifreyi bcrypt kullanarak şifrele
            $data['password'] = bcrypt($data['password']);
    
            // Kullanıcıyı oluştur ve veritabanına kaydet
            User::create($data);
    
            // Kullanıcı oluşturulduktan sonra index sayfasına yönlendir
            return redirect()->route('admin.userlist')->with('success', 'Kullanıcı başarıyla oluşturuldu.');
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
        $user = User::findOrFail($id);

        // Edit view'ini göster
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'userType' => 'required|in:user,admin',
        ]);

        $user = User::findOrFail($id);

        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'userType' => $request->input('userType'),
        ]);

        return redirect()->route('users.index')->with('success', 'Kullanıcı başarıyla güncellendi.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        // Kullanıcıyı sil
        $user->delete();

        return redirect()->route('users.index')->with('success', 'Kullanıcı başarıyla silindi.');
    }
}

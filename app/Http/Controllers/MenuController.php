<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::with('category')->latest()->get();

        return view('menus.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        return view('menus.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'category_id' => 'required',
        'name' => 'required',
        'price' => 'required|numeric',
        'stock' => 'required|numeric',
        'description' => 'nullable',
        'image' => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
    ]);

    // TAMBAHKAN INI
    $image = null;

    if ($request->hasFile('image')) {
        $image = $request->file('image')->store('menus', 'public');
    }

    Menu::create([
        'category_id' => $request->category_id,
        'name' => $request->name,
        'price' => $request->price,
        'stock' => $request->stock,
        'description' => $request->description,
        'image' => $image,
    ]);

    return redirect()->route('menus.index')
                     ->with('success', 'Menu berhasil ditambahkan');
}                                     
    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
         $categories = Category::all();

        return view('menus.edit', compact('menu', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'description' => 'nullable',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
        ]);

        $image = $menu->image;

        if ($request->hasFile('image')) {

            // Hapus gambar lama
            if ($menu->image) {
                Storage::disk('public')->delete($menu->image);
            }

            // Upload gambar baru
            $image = $request->file('image')->store('menus', 'public');
        }

        $menu->update([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'description' => $request->description,
            'image' => $image,
        ]);

        return redirect()->route('menus.index')
                        ->with('success', 'Menu berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        if ($menu->image) {
            Storage::disk('public')->delete($menu->image);
        }

        $menu->delete();

        return redirect()->route('menus.index')
                        ->with('success', 'Menu berhasil dihapus.');
    }
}

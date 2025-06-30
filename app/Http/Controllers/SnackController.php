<?php

namespace App\Http\Controllers;

use App\Models\Snack;
use App\Http\Requests\StoreSnackRequest;
use App\Http\Requests\UpdateSnackRequest;
use Illuminate\Http\Request;

class SnackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $snacks = Snack::all();
        return view('Snack.index', compact('snacks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Snack.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSnackRequest $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'description' => 'nullable|string|max:255',
            'status' => 'required|in:0,1',
            'price' => 'required|numeric|min:0',
        ]);

        $image_path = $request->file('image')->store('', 'public');

        Snack::create([
            'name' => $request->name,
            'image' => $image_path,
            'description' => $request->description,
            'status' => $request->status,
            'price' => $request->price,
        ]);

        return redirect()->route('snacks.index')->with('success', 'Thêm snack thành công!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Snack $snack)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Snack $snack)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSnackRequest $request, Snack $snack)
    {
        //
    }

    public function update_status(Request $request, $id) {
        $request->validate([
            'status' => 'required|in:0,1',
        ]);

        $snack = Snack::findOrFail($id);
        $snack->status = $request->status;
        $snack->save();

        return redirect()->back()->with('success', 'Cập nhật trạng thái thành công.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Snack $snack)
    {
        //
    }
}

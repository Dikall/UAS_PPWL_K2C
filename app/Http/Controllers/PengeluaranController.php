<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePengeluaranRequest;
use App\Http\Requests\UpdatePengeluaranRequest;
use App\Models\Pengeluaran;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class PengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $pengeluarans = Pengeluaran::with('user')->get();

        return response(view('pengeluaran.index', compact('pengeluarans')));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return response(view('pengeluaran.create'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePengeluaranRequest $request): RedirectResponse
    {
        $validatedData = $request->validated(); // Validasi data terlebih dahulu
        $user = auth()->user();

        // Menambahkan user_id dan name ke dalam data yang akan disimpan
        $validatedData['user_id'] = $user->id;
        $validatedData['name'] = $user->name;

        if (Pengeluaran::create($validatedData)) {
            return redirect()->route('pengeluarans.index')->with('success', 'Pengeluaran berhasil ditambahkan!');
        }

        return redirect()->back()->with('error', 'Gagal menambahkan pengeluaran!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): Response
    {
        $pengeluaran = Pengeluaran::with('user')->findOrFail($id);

        return response(view('pengeluarans.show', compact('pengeluaran')));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): Response
    {
        $pengeluaran = Pengeluaran::findOrFail($id);

        return response(view('pengeluaran.edit', ['pengeluaran' => $pengeluaran]));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePengeluaranRequest $request, string $id): RedirectResponse
    {
        $pengeluaran = Pengeluaran::findOrFail($id);
        $validatedData = $request->validated();

        if ($pengeluaran->update($validatedData)) {
            return redirect()->route('pengeluarans.index')->with('success', 'Pengeluaran berhasil diperbarui!');
        }

        return redirect()->back()->with('error', 'Failed to update!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $pengeluaran = Pengeluaran::findOrFail($id);

        if ($pengeluaran->delete()) {
            return redirect()->route('pengeluarans.index')->with('success', 'Deleted!');
        }

        return redirect()->route('pengeluarans.index')->with('error', 'Sorry, unable to delete this!');
    }
}

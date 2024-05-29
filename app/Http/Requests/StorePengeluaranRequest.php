<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePengeluaranRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            // 'name' => 'required|string|max:30',
            'tanggal_tranksaksi' => 'required|date',
            'total_pengeluaran' => 'required|numeric|min:0',
            'metode_pembayaran' => 'nullable|string',
            'catatan' => 'nullable|string',
        ];
    }
}

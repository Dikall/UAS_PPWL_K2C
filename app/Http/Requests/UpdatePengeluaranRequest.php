<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePengeluaranRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
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

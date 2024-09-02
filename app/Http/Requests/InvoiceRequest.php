<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvoiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'invoice_number' => 'nullable',
            'user_id' => 'required',
            'address' => 'required|string|min:10|max:100',
            'postal' => 'required|string|min:5|max:5',
            'total' => 'required|integer',
        ];
    }
}

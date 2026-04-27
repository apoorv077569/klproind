<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class UploadServicemanDocumentRequest extends FormRequest
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

            'identity_no' => 'required',
            'document_id' => 'required|exists:documents,id',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'notes' => 'nullable|string|max:255',
        ];
    }

    public function messages()
    {
        return [

            'identity_no.required' => 'Please enter the identity number.',
            'document_id.required' => 'Please select a document type.',
            'document_id.exists' => 'The selected document type is invalid.',
            'image.required' => 'Please upload a document image.',
            'image.image' => 'The file must be an image.',
            'image.mimes' => 'The image must be a JPG, JPEG, or PNG file.',
            'image.max' => 'The image must be less than 2MB.',
        ];
    }
}

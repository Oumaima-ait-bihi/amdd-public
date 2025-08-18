<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreActivityRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        // Check if the user is authenticated (admin or any user)
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after_or_equal:start_date',
            'location' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048', // 2MB max
            'video' => 'nullable|mimes:mp4,avi,mkv,mov|max:50000',
            'description' => 'string',
            'link' => 'nullable|url|max:255',
        ];
    }

    /**
     * Custom error messages (optional).
     */
    public function messages(): array
    {
        return [
            'title.required' => 'Le titre est requis.',
            'start_date.required' => 'La date de début est requise.',
            'start_date.after_or_equal' => 'La date de début doit être aujourd’hui ou après.',
            'end_date.required' => 'La date de fin est requise.',
            'end_date.after_or_equal' => 'La date de fin doit être après ou égale à la date de début.',
            'location.required' => 'Le lieu est requis.',
            'image.image' => 'Le fichier doit être une image.',
            'image.max' => 'L’image ne doit pas dépasser 2MB.',
            'link.url' => 'Le lien doit être une URL valide.',
        ];
    }
}

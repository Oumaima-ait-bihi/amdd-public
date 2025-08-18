<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAnnonceRequest extends FormRequest
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
            'titre_annonce_fr' => 'required|string|max:255',
            'titre_annonce_ar' => 'required|string|max:255',
            'date_annonce' => 'required|date',
            'description_annonce_fr' => 'nullable|string',
            'description_annonce_ar' => 'nullable|string',
            'image_annonce' => 'nullable|image|max:2048', // 2MB max
        ];
    }

    /**
     * Custom error messages (optional).
     */
    public function messages(): array
    {
        return [
            'titre_annonce_fr.required' => 'Le titre en français est requis.',
            'titre_annonce_ar.required' => 'Le titre en arabe est requis.',
            'date_annonce.required' => 'La date de l’annonce est requise.',
            'date_annonce.date' => 'La date doit être valide.',
            'image_annonce.image' => 'Le fichier doit être une image.',
            'image_annonce.max' => 'L’image ne doit pas dépasser 2MB.',
        ];
    }
}
<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEvenementRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // Check if the user is authenticated (admin or any user)
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'titre_fr' => 'required|string|max:255',
            'titre_ar' => 'required|string|max:255',
            'type_fr' => 'required|in:Conference,Workshop,Seminar,Meetup',
            'type_ar' => 'required|in:Conference,Workshop,Seminar,Meetup',
            'date_debut' => 'required|date|after_or_equal:today',
            'date_fin' => 'required|date|after_or_equal:date_debut',
            'status' => 'required|in:active,inactive',
            'image' => 'image|max:2048',
            'video' => 'nullable|mimes:mp4,avi,mkv,mov|max:50000',
            'gallery' => 'nullable|array',
            'gallery.*' => 'image|max:5120',
            'description_fr' => 'string',
            'description_ar' => 'nullable|string',
            'links' => 'nullable|array',
            'links.*' => 'nullable|url|max:255',
        ];
    }

    /**
     * Customize the error messages (optional).
     *
     * @return array<string, string>
     */
    public function messages()
    {
        return [
            'titre_fr.required' => 'Le titre en français est requis.',
            'titre_ar.required' => 'Le titre en arabe est requis.',
            'type_fr.required' => 'Le type en français est requis.',
            'type_fr.in' => 'Le type en français doit être Conférence, Atelier, Séminaire ou Rencontre.',
            'type_ar.required' => 'Le type en arabe est requis.',
            'type_ar.in' => 'Le type en arabe doit être مؤتمر, ورشة عمل, ندوة ou لقاء.',
            'date_debut.required' => 'La date de début est requise.',
            'date_debut.date' => 'La date de début doit être une date valide.',
            'date_debut.after_or_equal' => 'La date de début ne peut pas être dans le passé.',
            'date_fin.required' => 'La date de fin est requise.',
            'date_fin.date' => 'La date de fin doit être une date valide.',
            'date_fin.after_or_equal' => 'La date de fin doit être égale ou postérieure à la date de début.',
            'status.required' => 'Le statut est requis.',
            'status.in' => 'Le statut doit être "actif" ou "inactif".',
            'image.image' => 'Le fichier doit être une image (jpg, png, etc.).',
            'image.max' => 'L\'image ne doit pas dépasser 2 Mo.',
            'gallery.array' => 'La galerie doit être une liste d\'images.',
            'gallery.*.image' => 'Chaque fichier de la galerie doit être une image.',
            'gallery.*.max' => 'Chaque image de la galerie ne doit pas dépasser 5 Mo.',
            'links.*.url' => 'Chaque lien doit être une URL valide.',
            'links.*.max' => 'Chaque lien ne doit pas dépasser 255 caractères.',
        ];
    }
}

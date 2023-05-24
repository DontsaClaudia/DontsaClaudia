<?php

namespace App\Http\Requests;

use App\Models\Joueur;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreJoueurRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('joueur_create');
    }

    public function rules()
    {
        return [
            'nom_joueur' => [
                'string',
                'required',
            ],
            'prenom' => [
                'string',
                'required',
            ],
            'date_de_naissance' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'email' => [
                'required',
            ],
            'dossard' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'poste' => [
                'string',
                'required',
            ],
            'age' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'nom_equipe_id' => [
                'required',
                'integer',
            ],
        ];
    }
}

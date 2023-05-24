<?php

namespace App\Http\Requests;

use App\Models\Equipe;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateEquipeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('equipe_edit');
    }

    public function rules()
    {
        return [
            'nom_equipe' => [
                'string',
                'required',
            ],
            'nom_coach_id' => [
                'required',
                'integer',
            ],
        ];
    }
}

<?php

namespace App\Http\Requests;

use App\Models\Rencontre;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateRencontreRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('rencontre_edit');
    }

    public function rules()
    {
        return [
            'equipe_1_id' => [
                'required',
                'integer',
            ],
            'equipe_2_id' => [
                'required',
                'integer',
            ],
            'date_et_heure' => [
                'required',
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
            ],
            'resultat_1' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'resultat_2' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}

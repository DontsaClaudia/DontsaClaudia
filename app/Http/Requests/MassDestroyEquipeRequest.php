<?php

namespace App\Http\Requests;

use App\Models\Equipe;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyEquipeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('equipe_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:equipes,id',
        ];
    }
}

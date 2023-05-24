@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.rencontre.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.rencontres.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.rencontre.fields.id') }}
                        </th>
                        <td>
                            {{ $rencontre->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rencontre.fields.equipe_1') }}
                        </th>
                        <td>
                            {{ $rencontre->equipe_1->nom_equipe ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rencontre.fields.equipe_2') }}
                        </th>
                        <td>
                            {{ $rencontre->equipe_2->nom_equipe ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rencontre.fields.date_et_heure') }}
                        </th>
                        <td>
                            {{ $rencontre->date_et_heure }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rencontre.fields.resultat_1') }}
                        </th>
                        <td>
                            {{ $rencontre->resultat_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rencontre.fields.resultat_2') }}
                        </th>
                        <td>
                            {{ $rencontre->resultat_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rencontre.fields.arbitre') }}
                        </th>
                        <td>
                            {{ $rencontre->arbitre->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.rencontres.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
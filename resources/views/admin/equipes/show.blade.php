@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.equipe.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.equipes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.equipe.fields.id') }}
                        </th>
                        <td>
                            {{ $equipe->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.equipe.fields.nom_equipe') }}
                        </th>
                        <td>
                            {{ $equipe->nom_equipe }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.equipe.fields.nom_coach') }}
                        </th>
                        <td>
                            {{ $equipe->nom_coach->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.equipes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
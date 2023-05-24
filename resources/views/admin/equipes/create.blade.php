@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.equipe.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.equipes.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="nom_equipe">{{ trans('cruds.equipe.fields.nom_equipe') }}</label>
                <input class="form-control {{ $errors->has('nom_equipe') ? 'is-invalid' : '' }}" type="text" name="nom_equipe" id="nom_equipe" value="{{ old('nom_equipe', '') }}" required>
                @if($errors->has('nom_equipe'))
                    <span class="text-danger">{{ $errors->first('nom_equipe') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.equipe.fields.nom_equipe_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="nom_coach_id">{{ trans('cruds.equipe.fields.nom_coach') }}</label>
                <select class="form-control select2 {{ $errors->has('nom_coach') ? 'is-invalid' : '' }}" name="nom_coach_id" id="nom_coach_id" required>
                    @foreach($nom_coaches as $id => $entry)
                        <option value="{{ $id }}" {{ old('nom_coach_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('nom_coach'))
                    <span class="text-danger">{{ $errors->first('nom_coach') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.equipe.fields.nom_coach_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection
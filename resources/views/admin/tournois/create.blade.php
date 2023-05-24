@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.tournoi.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.tournois.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="nom_tournoi">{{ trans('cruds.tournoi.fields.nom_tournoi') }}</label>
                <input class="form-control {{ $errors->has('nom_tournoi') ? 'is-invalid' : '' }}" type="text" name="nom_tournoi" id="nom_tournoi" value="{{ old('nom_tournoi', '') }}" required>
                @if($errors->has('nom_tournoi'))
                    <span class="text-danger">{{ $errors->first('nom_tournoi') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tournoi.fields.nom_tournoi_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="date_de_debut">{{ trans('cruds.tournoi.fields.date_de_debut') }}</label>
                <input class="form-control date {{ $errors->has('date_de_debut') ? 'is-invalid' : '' }}" type="text" name="date_de_debut" id="date_de_debut" value="{{ old('date_de_debut') }}" required>
                @if($errors->has('date_de_debut'))
                    <span class="text-danger">{{ $errors->first('date_de_debut') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tournoi.fields.date_de_debut_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="date_de_fin">{{ trans('cruds.tournoi.fields.date_de_fin') }}</label>
                <input class="form-control date {{ $errors->has('date_de_fin') ? 'is-invalid' : '' }}" type="text" name="date_de_fin" id="date_de_fin" value="{{ old('date_de_fin') }}" required>
                @if($errors->has('date_de_fin'))
                    <span class="text-danger">{{ $errors->first('date_de_fin') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tournoi.fields.date_de_fin_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="nombre_equipes">{{ trans('cruds.tournoi.fields.nombre_equipes') }}</label>
                <input class="form-control {{ $errors->has('nombre_equipes') ? 'is-invalid' : '' }}" type="number" name="nombre_equipes" id="nombre_equipes" value="{{ old('nombre_equipes', '4') }}" step="1" required>
                @if($errors->has('nombre_equipes'))
                    <span class="text-danger">{{ $errors->first('nombre_equipes') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tournoi.fields.nombre_equipes_helper') }}</span>
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
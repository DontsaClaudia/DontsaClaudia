@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.joueur.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.joueurs.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="nom_joueur">{{ trans('cruds.joueur.fields.nom_joueur') }}</label>
                <input class="form-control {{ $errors->has('nom_joueur') ? 'is-invalid' : '' }}" type="text" name="nom_joueur" id="nom_joueur" value="{{ old('nom_joueur', '') }}" required>
                @if($errors->has('nom_joueur'))
                    <span class="text-danger">{{ $errors->first('nom_joueur') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.joueur.fields.nom_joueur_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="prenom">{{ trans('cruds.joueur.fields.prenom') }}</label>
                <input class="form-control {{ $errors->has('prenom') ? 'is-invalid' : '' }}" type="text" name="prenom" id="prenom" value="{{ old('prenom', '') }}" required>
                @if($errors->has('prenom'))
                    <span class="text-danger">{{ $errors->first('prenom') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.joueur.fields.prenom_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="date_de_naissance">{{ trans('cruds.joueur.fields.date_de_naissance') }}</label>
                <input class="form-control date {{ $errors->has('date_de_naissance') ? 'is-invalid' : '' }}" type="text" name="date_de_naissance" id="date_de_naissance" value="{{ old('date_de_naissance') }}" required>
                @if($errors->has('date_de_naissance'))
                    <span class="text-danger">{{ $errors->first('date_de_naissance') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.joueur.fields.date_de_naissance_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="email">{{ trans('cruds.joueur.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email') }}" required>
                @if($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.joueur.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="dossard">{{ trans('cruds.joueur.fields.dossard') }}</label>
                <input class="form-control {{ $errors->has('dossard') ? 'is-invalid' : '' }}" type="number" name="dossard" id="dossard" value="{{ old('dossard', '') }}" step="1" required>
                @if($errors->has('dossard'))
                    <span class="text-danger">{{ $errors->first('dossard') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.joueur.fields.dossard_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="poste">{{ trans('cruds.joueur.fields.poste') }}</label>
                <input class="form-control {{ $errors->has('poste') ? 'is-invalid' : '' }}" type="text" name="poste" id="poste" value="{{ old('poste', '') }}" required>
                @if($errors->has('poste'))
                    <span class="text-danger">{{ $errors->first('poste') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.joueur.fields.poste_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="age">{{ trans('cruds.joueur.fields.age') }}</label>
                <input class="form-control {{ $errors->has('age') ? 'is-invalid' : '' }}" type="number" name="age" id="age" value="{{ old('age', '') }}" step="1" required>
                @if($errors->has('age'))
                    <span class="text-danger">{{ $errors->first('age') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.joueur.fields.age_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="nom_equipe_id">{{ trans('cruds.joueur.fields.nom_equipe') }}</label>
                <select class="form-control select2 {{ $errors->has('nom_equipe') ? 'is-invalid' : '' }}" name="nom_equipe_id" id="nom_equipe_id" required>
                    @foreach($nom_equipes as $id => $entry)
                        <option value="{{ $id }}" {{ old('nom_equipe_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('nom_equipe'))
                    <span class="text-danger">{{ $errors->first('nom_equipe') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.joueur.fields.nom_equipe_helper') }}</span>
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
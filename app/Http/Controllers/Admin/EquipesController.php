<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyEquipeRequest;
use App\Http\Requests\StoreEquipeRequest;
use App\Http\Requests\UpdateEquipeRequest;
use App\Models\Equipe;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EquipesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('equipe_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $equipes = Equipe::with(['nom_coach'])->get();

        $users = User::get();

        return view('admin.equipes.index', compact('equipes', 'users'));
    }

    public function create()
    {
        abort_if(Gate::denies('equipe_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $nom_coaches = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.equipes.create', compact('nom_coaches'));
    }

    public function store(StoreEquipeRequest $request)
    {
        $equipe = Equipe::create($request->all());

        return redirect()->route('admin.equipes.index');
    }

    public function edit(Equipe $equipe)
    {
        abort_if(Gate::denies('equipe_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $nom_coaches = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $equipe->load('nom_coach');

        return view('admin.equipes.edit', compact('equipe', 'nom_coaches'));
    }

    public function update(UpdateEquipeRequest $request, Equipe $equipe)
    {
        $equipe->update($request->all());

        return redirect()->route('admin.equipes.index');
    }

    public function show(Equipe $equipe)
    {
        abort_if(Gate::denies('equipe_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $equipe->load('nom_coach');

        return view('admin.equipes.show', compact('equipe'));
    }

    public function destroy(Equipe $equipe)
    {
        abort_if(Gate::denies('equipe_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $equipe->delete();

        return back();
    }

    public function massDestroy(MassDestroyEquipeRequest $request)
    {
        $equipes = Equipe::find(request('ids'));

        foreach ($equipes as $equipe) {
            $equipe->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

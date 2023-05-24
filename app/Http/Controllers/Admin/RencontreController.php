<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyRencontreRequest;
use App\Http\Requests\StoreRencontreRequest;
use App\Http\Requests\UpdateRencontreRequest;
use App\Models\Equipe;
use App\Models\Rencontre;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RencontreController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('rencontre_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rencontres = Rencontre::with(['equipe_1', 'equipe_2', 'arbitre'])->get();

        return view('admin.rencontres.index', compact('rencontres'));
    }

    public function create()
    {
        abort_if(Gate::denies('rencontre_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $equipe_1s = Equipe::pluck('nom_equipe', 'id')->prepend(trans('global.pleaseSelect'), '');

        $equipe_2s = Equipe::pluck('nom_equipe', 'id')->prepend(trans('global.pleaseSelect'), '');

        $arbitres = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.rencontres.create', compact('arbitres', 'equipe_1s', 'equipe_2s'));
    }

    public function store(StoreRencontreRequest $request)
    {
        $rencontre = Rencontre::create($request->all());

        return redirect()->route('admin.rencontres.index');
    }

    public function edit(Rencontre $rencontre)
    {
        abort_if(Gate::denies('rencontre_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $equipe_1s = Equipe::pluck('nom_equipe', 'id')->prepend(trans('global.pleaseSelect'), '');

        $equipe_2s = Equipe::pluck('nom_equipe', 'id')->prepend(trans('global.pleaseSelect'), '');

        $arbitres = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $rencontre->load('equipe_1', 'equipe_2', 'arbitre');

        return view('admin.rencontres.edit', compact('arbitres', 'equipe_1s', 'equipe_2s', 'rencontre'));
    }

    public function update(UpdateRencontreRequest $request, Rencontre $rencontre)
    {
        $rencontre->update($request->all());

        return redirect()->route('admin.rencontres.index');
    }

    public function show(Rencontre $rencontre)
    {
        abort_if(Gate::denies('rencontre_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rencontre->load('equipe_1', 'equipe_2', 'arbitre');

        return view('admin.rencontres.show', compact('rencontre'));
    }

    public function destroy(Rencontre $rencontre)
    {
        abort_if(Gate::denies('rencontre_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rencontre->delete();

        return back();
    }

    public function massDestroy(MassDestroyRencontreRequest $request)
    {
        $rencontres = Rencontre::find(request('ids'));

        foreach ($rencontres as $rencontre) {
            $rencontre->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

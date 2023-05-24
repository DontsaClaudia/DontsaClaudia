<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEquipeRequest;
use App\Http\Requests\UpdateEquipeRequest;
use App\Http\Resources\Admin\EquipeResource;
use App\Models\Equipe;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EquipesApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('equipe_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new EquipeResource(Equipe::with(['nom_coach'])->get());
    }

    public function store(StoreEquipeRequest $request)
    {
        $equipe = Equipe::create($request->all());

        return (new EquipeResource($equipe))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Equipe $equipe)
    {
        abort_if(Gate::denies('equipe_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new EquipeResource($equipe->load(['nom_coach']));
    }

    public function update(UpdateEquipeRequest $request, Equipe $equipe)
    {
        $equipe->update($request->all());

        return (new EquipeResource($equipe))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Equipe $equipe)
    {
        abort_if(Gate::denies('equipe_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $equipe->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\CityHallRequest;
use App\Models\{City, CityHall};
use Illuminate\Http\{RedirectResponse};
use Inertia\{Inertia, Response as InertiaResponse};

class CityHallController extends Controller
{
    public function index(): InertiaResponse
    {
        $cityHalls = CityHall::query()
            ->select('id', 'name', 'phone_number', 'population', 'city_id')
            ->with('city:id,name')
            ->latest()
            ->paginate();


        return Inertia::render('CityHalls/Index', [
            'cityHalls' => $cityHalls,
        ]);
    }

    public function create(): InertiaResponse
    {
        $cities = City::orderBy('name')->get(['id', 'name']);

        return Inertia::render('CityHalls/Create', [
            'cities' => $cities,
        ]);
    }

    public function store(CityHallRequest $request): RedirectResponse
    {
        $cityHall = CityHall::create($request->validated());

        return redirect()->route('city-halls.show', $cityHall);
    }

    public function show(CityHall $cityHall): InertiaResponse
    {
        $cityHall->setRelation('contacts', $cityHall->contacts()
            ->select('id', 'name', 'mandate_ends_at', 'contact_type_id', 'city_hall_id')
            ->with('contactType:id,name')
            ->withCount('activities')
            ->latest()
            ->paginate(10)
            ->withQueryString()
        );

        $cities = City::orderBy('name')->get(['id', 'name']);


        return Inertia::render('CityHalls/Show', [
            'cityHall' => $cityHall,
            'cities' => $cities
        ]);
    }

    public function update(CityHallRequest $request, CityHall $cityHall): RedirectResponse
    {
        $cityHall->update($request->validated());

        return redirect()->route('city-halls.show', $cityHall)->with('success', 'Prefeitura atualizada.');
    }

    public function destroy(CityHall $cityHall): RedirectResponse
    {
        $cityHall->delete();

        return redirect()->route('city-halls.index')->with('success', "<b>$cityHall->name</b> foi removida.");
    }
}

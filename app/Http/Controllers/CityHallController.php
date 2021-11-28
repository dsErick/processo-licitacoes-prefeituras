<?php

namespace App\Http\Controllers;

use App\Models\{CityHall};
use Illuminate\Http\Request;
use Illuminate\Http\{RedirectResponse};
use Inertia\{Inertia, Response as InertiaResponse};

class CityHallController extends Controller
{
    public function index(): InertiaResponse
    {
        $cityHalls = CityHall::query()
            ->select('id', 'name', 'phone_number', 'population', 'city_id')
            ->with('city:id,name')
            ->paginate();


        return Inertia::render('CityHalls/Index', [
            'cityHalls' => $cityHalls,
        ]);
    }

    public function create(): InertiaResponse
    {
        return Inertia::render('CityHalls/Create');
    }

    public function store(Request $request): RedirectResponse
    {
        dd($request, $request->all());
    }

    public function show(CityHall $cityHall): InertiaResponse
    {
        return Inertia::render('CityHalls/Show', [
            'cityHall' => $cityHall
        ]);
    }

    public function edit(CityHall $cityHall): InertiaResponse
    {
        return Inertia::render('', [
            'cityHall' => $cityHall
        ]);
    }

    public function update(Request $request, CityHall $cityHall): RedirectResponse
    {
        dd($request, $cityHall);
    }

    public function destroy(CityHall $cityHall): RedirectResponse
    {
        dd($cityHall);
    }
}

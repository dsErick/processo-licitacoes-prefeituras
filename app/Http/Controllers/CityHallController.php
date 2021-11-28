<?php

namespace App\Http\Controllers;

use App\Models\CityHall;
use Illuminate\Http\Request;
use Illuminate\Http\{RedirectResponse};
use Inertia\{Inertia, Response as InertiaResponse};

class CityHallController extends Controller
{
    public function index(): InertiaResponse
    {
        return Inertia::render('');
    }

    public function create(): InertiaResponse
    {
        return Inertia::render('');
    }

    public function store(Request $request): RedirectResponse
    {
        dd($request, $request->all());
    }

    public function show(CityHall $cityHall): InertiaResponse
    {
        return Inertia::render('', [
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

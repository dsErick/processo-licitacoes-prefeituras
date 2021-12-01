<?php

namespace App\Http\Controllers;

use App\Models\{CityHall, Contact, ContactType};
use Illuminate\Http\Request;
use Illuminate\Http\{RedirectResponse};
use Inertia\{Inertia, Response as InertiaResponse};

class ContactController extends Controller
{
    // public function index(): InertiaResponse
    // {
    //     return Inertia::render('');
    // }

    public function create(): InertiaResponse
    {
        $contactTypes = ContactType::all(['id', 'name']);
        $cityHalls = CityHall::all(['id', 'name']);

        return Inertia::render('Contacts/Create', [
            'contactTypes' => $contactTypes,
            'cityHalls' => $cityHalls,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        dd($request, $request->all());
    }

    public function show(Contact $contact): InertiaResponse
    {
        return Inertia::render('', [
            'contact' => $contact
        ]);
    }

    // public function edit(Contact $contact): InertiaResponse
    // {
    //     return Inertia::render('', [
    //         'contact' => $contact
    //     ]);
    // }

    public function update(Request $request, Contact $contact): RedirectResponse
    {
        dd($request, $contact);
    }

    public function destroy(Contact $contact): RedirectResponse
    {
        dd($contact);
    }
}

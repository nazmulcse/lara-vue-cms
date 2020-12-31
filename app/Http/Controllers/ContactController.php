<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Http\Requests\Contact as ConatctRequest;
use Illuminate\Support\Facades\Redirect;

class ContactController extends Controller
{
    public function index()
    {
        $data = [
            'contacts' => Contact::paginate(10)
        ];
        return Inertia::render('Contacts/List', $data);
    }

    public function create()
    {
        return Inertia::render('Contacts/Create');
    }

    public function store(ConatctRequest $request)
    {
        Contact::create($request->all());

        return Redirect::route('contact.create')->with('success', 'Contact created.');
    }
}

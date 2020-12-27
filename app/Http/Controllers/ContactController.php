<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Inertia\Inertia;

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
}

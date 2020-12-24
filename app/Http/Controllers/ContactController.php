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
            'contacts' => Contact::all()->map(function ($contact) {
                return [
                    'id' => $contact->id,
                    'first_name' => $contact->first_name,
                    'last_name' => $contact->last_name,
                    'email' => $contact->email,
                    'phone' => $contact->phone,
                    'address' => $contact->address,
                    'edit_url' => "#",
                ];
            })
        ];
        return Inertia::render('Contacts/List', $data);
    }
}

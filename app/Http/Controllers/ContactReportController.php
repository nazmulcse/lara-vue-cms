<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ContactReportController extends Controller
{
    public function index()
    {
        $data = [
            'contacts' => Contact::orderBy('created_at', 'desc')->paginate(10)
        ];
        return Inertia::render('Reports/Contacts/Create', $data);
    }
}

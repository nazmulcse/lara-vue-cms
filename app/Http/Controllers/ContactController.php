<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Http\Requests\Contact as ConatctRequest;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Node\Stmt\Catch_;
use PhpParser\Node\Stmt\TryCatch;

class ContactController extends Controller
{
    public function index()
    {
        $data = [
            'contacts' => Contact::orderBy('created_at', 'desc')->paginate(10)
        ];
        return Inertia::render('Contacts/List', $data);
    }

    public function create()
    {
        return Inertia::render('Contacts/Create');
    }

    public function store(ConatctRequest $request)
    {
        try{

            Contact::create($request->all());
            return Redirect::route('contact.create')->with('success', 'Contact created.');

        } catch (\Exception $e) {
            return Redirect::back()->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $data = [
            'contact' => Contact::find($id)
        ];
        return Inertia::render('Contacts/Edit', $data);
    }

    public function update(ConatctRequest $request, $id)
    {
        try{
            
            $contact = Contact::find($id);
            $contact->update($request->all());
            return Redirect::back()->with('success', 'Contact updated.');   

        } catch (\Exception $e) {
            return Redirect::back()->with('error', $e->getMessage());
        }
    }
    
    public function destroy($id)
    {
        try{
            
            Contact::destroy($id);
            return Redirect::back()->with('success', 'Contact deleted.');   

        } catch (\Exception $e) {
            return Redirect::back()->with('error', $e->getMessage());
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Http\Requests\Contact as ContactRequest;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Node\Stmt\Catch_;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\Storage;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $data = [
            'contacts' => Contact::filter($request->all())->orderBy('created_at', 'desc')->paginate(10)
        ];
        return Inertia::render('Contacts/List', $data);
    }

    public function create()
    {
        for($i = 0; $i<900000; $i++){

        }
        return Inertia::render('Contacts/Create');
    }

    public function store(ContactRequest $request)
    {
        try{
            $contactInputs = $request->all();
            $contact = Contact::create($contactInputs);
            $contact->photo = $this->uploadImage($request->file('photo'));
            $contact->update();
            return Redirect::route('contact.create')->with('success', 'Contact created.');

        } catch (\Exception $e) {
            return Redirect::back()->with('error', $e->getMessage());
        }
    }

    public function uploadImage($image, $id = null){
        if(!empty($image)){
            if(!empty($id)){
                $this->deleteFileFromPath(Contact::find($id)->photo);
            }
            $image->storeAs('public/profile_photo', $image->getClientOriginalName());
            return 'profile_photo/' . $image->getClientOriginalName();
        }

        return null;
    }

    public function deleteFileFromPath($file){
        if(!empty($file)){
            Storage::delete('public/' .$file);
        }
    }

    public function edit($id)
    {
        $data = [
            'contact' => Contact::find($id)
        ];
        return Inertia::render('Contacts/Edit', $data);
    }

    public function update(ContactRequest $request, $id)
    {
        try{
            
            $contact = Contact::find($id);
            $inputs = $request->except('photo');
            //dd($request->all());
            if($request->file('photo')){
                $inputs['photo'] = $this->uploadImage($request->file('photo'), $id);
            }
            $contact->update($inputs);
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

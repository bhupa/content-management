<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\ContactRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    protected $contact;
    public function __construct(ContactRepository $contact)
    {
        $this->contact = $contact;
    }

    public function index(){
        auth()->user()->can('master-policy.perform',['contact', 'view']);
        $contacts = $this->contact->orderBy('created_at','desc')->paginate('20');

        return view('admin.contact.index')->withContacts($contacts);
    }

    public function show($id){
        $contact = $this->contact->find($id);
        return view('admin.contact.show')->withContact($contact);
    }
}

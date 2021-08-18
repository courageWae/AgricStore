<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function store()
    {
        Contact::create( request()->all() );
        return redirect()->back()->with(['message' => 'Your message was sent Successfully. You can also contact us the above contact', 'alert' => 'alert-success']);
    }

    public function delete( Contact $message )
    {
        $message->delete();
        return redirect()->back();
    }
}

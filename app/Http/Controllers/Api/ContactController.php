<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Contact;
use App\Mail\ContactMessage;

class ContactController extends Controller
{
    public function store(Request $request) {
        // VALIDAZIONE
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([ 'errors' => $validator->errors()]);
        }

        $data = $request->all();

        // SAVE ON DB
        $new_contact = new Contact();
        $new_contact->fill($data);
        $new_contact->save();

        // SEND EMAIL
        Mail::to('admin@site.com')->send(new ContactMessage($data));

        return response()->json($data);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    //add 
    public function index(Request $request){

        $data = $request->all();

        $rules = [
        'name' => 'required',
        'email' => 'required|email',
        'subject' => 'required',
        'message' => 'required',
        ];

        $validator = Validator::make( $data ,$rules);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }else{

            $contact = new Contact;
            $contact->name = $request->name;
            $contact->email = $request->email;
            $contact->subject = $request->subject;
            $contact->message = $request->message;
            $contact->save();
            return response()->json(['Send Message'=> $contact] );
        };





    }

    //show
    public function show(){
        $contact = Contact::all()
        ->select('id','name','email','subject','message');
        return response()->json($contact);

    }


    //showarticles
    public function showarticles(){

        $articles = Article::all()
        ->select('id', 'title','description','image','category_id','updated_at','created_at');
        return response()->json($articles);



    }



    
}
